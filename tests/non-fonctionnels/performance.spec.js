import { test, expect } from '@playwright/test';
import { login } from '../../e2e/helpers/login.js';

const SEUIL_LOAD_MS = 3000;

const pages = [
  { nom: 'Accueil', url: '/', connecte: false },
  { nom: 'Connexion', url: '/login', connecte: false },
  { nom: 'Liste des animaux', url: '/animals', connecte: true },
  { nom: 'Formulaire annonce', url: '/animals/create', connecte: true },
];

for (const p of pages) {
  test(`Performance : ${p.nom}`, async ({ page }) => {
    if (p.connecte) await login(page);

    // Observer LCP avant le chargement de la page
    await page.addInitScript(() => {
      window.__lcp = 0;
      new PerformanceObserver((list) => {
        const entries = list.getEntries();
        window.__lcp = entries[entries.length - 1].startTime;
      }).observe({ type: 'largest-contentful-paint', buffered: true });
    });

    await page.goto(p.url, { waitUntil: 'load' });
    await page.waitForTimeout(500);

    const m = await page.evaluate(() => {
      const nav = performance.getEntriesByType('navigation')[0];
      const fcp = performance.getEntriesByName('first-contentful-paint')[0];
      return {
        dcl: Math.round(nav.domContentLoadedEventEnd),
        load: Math.round(nav.loadEventEnd),
        fcp: fcp ? Math.round(fcp.startTime) : null,
        lcp: Math.round(window.__lcp),
      };
    });

    console.log(
      `${p.nom} (${p.url}) | DCL: ${m.dcl} ms | Load: ${m.load} ms | FCP: ${m.fcp} ms | LCP: ${m.lcp} ms`
    );

    expect(m.load, `Chargement de ${p.url} < ${SEUIL_LOAD_MS} ms`).toBeLessThan(SEUIL_LOAD_MS);
  });
}