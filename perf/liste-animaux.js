import http from 'k6/http';
import { check, sleep } from 'k6';
import { Counter } from 'k6/metrics';

const BASE = 'http://127.0.0.1:8001';
const reponses429 = new Counter('reponses_429');

export const options = {
  vus: 10,
  duration: '30s',
  thresholds: {
    http_req_failed: ['rate<0.01'],
    http_req_duration: ['p(95)<800'],
  },
};

export default function () {
  const res = http.get(`${BASE}/api/animals`, { headers: { Accept: 'application/json' } });

  if (res.status === 429) {
    reponses429.add(1);
  }

  check(res, {
    'statut 200': (r) => r.status === 200,
    'reponse JSON': (r) => (r.headers['Content-Type'] || '').includes('application/json'),
  });

  sleep(1);
}