import { test, expect } from '@playwright/test';
import { login } from './helpers/login.js';

test.describe('Gestion des animaux', () => {

  test('Création d\'une annonce animal @regression', async ({ page }) => {
    const titre = `Test Playwright ${Date.now()}`;

    await login(page);
    await page.getByText('Ajouter une annonce').first().click();
    await expect(page).toHaveURL(/\/animals\/create$/);

    await page.locator('input[name="titre"]').fill(titre);
    await page.locator('input[name="race"]').fill('Chat de gouttière');
    await page.locator('input[name="age"]').fill('2');
    await page.locator('textarea[name="description"]').fill('Annonce créée par un test automatisé.');
    await page.locator('input[name="telephone"]').fill('20123456');

    // Photo factice (PNG 1x1), pas besoin de fichier sur le disque
    await page.locator('input[name="photo"]').setInputFiles({
      name: 'test.png',
      mimeType: 'image/png',
      buffer: Buffer.from(
        'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mNkYPhfDwAChwGA60e6kgAAAABJRU5ErkJggg==',
        'base64'
      ),
    });

    await page.screenshot({ path: 'e2e/screenshots/formulaire-rempli.png', fullPage: true });

    await page
      .locator('form:has(input[name="titre"]) button[type="submit"]')
      .click();

    // Après enregistrement, on ne doit plus être sur le formulaire
    await expect(page).not.toHaveURL(/\/animals\/create$/);
    console.log('URL après création :', page.url());

    await page.screenshot({ path: 'e2e/screenshots/apres-creation.png', fullPage: true });
  });

  test('Formulaire refusé si le titre est vide', async ({ page }) => {
    await login(page);
    await page.goto('/animals/create');

    await page
      .locator('form:has(input[name="titre"]) button[type="submit"]')
      .click();

    // Reste sur le formulaire (validation HTML ou Laravel)
    await expect(page).toHaveURL(/\/animals\/create/);
  });

});