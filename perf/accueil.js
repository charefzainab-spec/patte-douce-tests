import http from 'k6/http';
import { check, sleep } from 'k6';

const BASE = 'http://127.0.0.1:8001';

export const options = {
  vus: 10,
  duration: '30s',
  thresholds: {
    http_req_failed: ['rate<0.01'],
    http_req_duration: ['p(95)<800'],
  },
};

export default function () {
  const res = http.get(`${BASE}/login`);

  check(res, {
    'statut 200': (r) => r.status === 200,
  });

  sleep(1);
}