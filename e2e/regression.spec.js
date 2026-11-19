import { test, expect } from '@playwright/test';
import { login } from './helpers/login.js';

test('Parcours critique : connexion, création, vérification @regression', async ({ page }) => {
  const titre = `Regression ${Date.now()}`;

  await login(page);
  await page.getByText('Ajouter une annonce').first().click();
  await expect(page).toHaveURL(/\/animals\/create$/);

  await page.locator('input[name="titre"]').fill(titre);
  await page.locator('input[name="race"]').fill('Chat');
  await page.locator('input[name="age"]').fill('2');
  await page.locator('textarea[name="description"]').fill('Test de régression.');
  await page.locator('input[name="telephone"]').fill('20123456');
  await page.locator('input[name="photo"]').setInputFiles({
    name: 'test.png',
    mimeType: 'image/png',
    buffer: Buffer.from(
      'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mNkYPhfDwAChwGA60e6kgAAAABJRU5ErkJggg==',
      'base64'
    ),
  });

  await page.locator('form:has(input[name="titre"]) button[type="submit"]').click();

  await expect(page).toHaveURL(/\/animals$/);
  await expect(page.getByText(titre).first()).toBeVisible();
});