import { test, expect } from '@playwright/test';
import { login } from './helpers/login.js';

test.describe('Navigation', () => {

  test('Pages publiques accessibles @regression', async ({ page }) => {
    for (const url of ['/', '/login']) {
      const response = await page.goto(url);
      expect(response.status(), `Statut de ${url}`).toBeLessThan(400);
    }
  });

  test('Navigation par le menu après connexion @regression', async ({ page }) => {
    await login(page);

    await page.getByText('Modifier mon profil').click();
    await expect(page).toHaveURL(/\/profile$/);

    await page.getByRole('link', { name: /Patte Douce/ }).first().click();
    await expect(page).toHaveURL(/127\.0\.0\.1:8000\/(dashboard)?$/);
  });

  test('Accès à /user refusé sans connexion @regression', async ({ page }) => {
    await page.goto('/user');
    await expect(page).toHaveURL(/\/login/);
  });

  test('Accès à /animals refusé sans connexion', async ({ page }) => {
    await page.goto('/animals');
    await expect(page).toHaveURL(/\/login/);
  });

});