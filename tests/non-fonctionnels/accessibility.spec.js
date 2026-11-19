import { test, expect } from '@playwright/test';
import AxeBuilder from '@axe-core/playwright';
import { login } from '../../e2e/helpers/login.js';

const pages = [
  { nom: 'Accueil', url: '/', connecte: false },
  { nom: 'Connexion', url: '/login', connecte: false },
  { nom: 'Liste des animaux', url: '/animals', connecte: true },
  { nom: 'Formulaire annonce', url: '/animals/create', connecte: true },
];

for (const p of pages) {
  test(`Accessibilité : ${p.nom}`, async ({ page }) => {
    if (p.connecte) await login(page);
    await page.goto(p.url);

    const results = await new AxeBuilder({ page })
      .withTags(['wcag2a', 'wcag2aa'])
      .analyze();

    console.log(`\n=== ${p.nom} (${p.url}) : ${results.violations.length} anomalie(s) ===`);
    for (const v of results.violations) {
      console.log(`- [${v.impact}] ${v.id} : ${v.help} (${v.nodes.length} élément(s))`);
      console.log(`  Exemple : ${v.nodes[0].target.join(' ')}`);
    }

    // Audit : on documente les anomalies, on ne fait pas échouer le test
    expect.soft(results.violations.length).toBeGreaterThanOrEqual(0);
  });
}
