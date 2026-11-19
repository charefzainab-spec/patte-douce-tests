import { test, expect } from '@playwright/test';
import { login } from './helpers/login.js';

test.describe('Authentification', () => {

  test('Connexion utilisateur réussie @regression', async ({ page }) => {
    await login(page);

    await expect(page.getByText('Mon espace Patte Douce')).toBeVisible();
    await expect(page.getByText('Ajouter une annonce')).toBeVisible();
  });

  test('Connexion refusée avec un mauvais mot de passe', async ({ page }) => {
    await page.goto('/login');
    await page.locator('input[name="email"]').fill(process.env.TEST_EMAIL);
    await page.locator('input[name="password"]').fill('mauvais-mot-de-passe');
    await page.getByRole('button', { name: /se connecter/i }).click();

    await expect(page).toHaveURL(/\/login/);
    await expect(page.getByText('Mon espace Patte Douce')).toHaveCount(0);
  });

});