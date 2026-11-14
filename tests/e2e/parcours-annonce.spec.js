import { test, expect } from '@playwright/test';

// CT-57 : parcours critique, connexion -> creation d'une annonce -> verification
test('connexion, creation d\'une annonce et verification dans la liste', async ({ page }) => {
  const titre = 'Chat E2E ' + Date.now();

  // 1. Connexion
  await page.goto('/login');
  await page.fill('input[name="email"]', 'e2e@test.com');
  await page.fill('input[name="password"]', 'Password123!');
  await page.click('button[type="submit"]');
  await expect(page).not.toHaveURL(/\/login/);

  // 2. Creation d'une annonce
  await page.goto('/animals/create');
  await page.fill('[name="titre"]', titre);
  await page.fill('[name="race"]', 'Persan');
  await page.fill('[name="age"]', '2');
  await page.fill('[name="description"]', 'Un chat calme et gentil, cree par le test E2E.');
  await page.fill('[name="telephone"]', '12345678');
  await page.click('form[action$="/animals"] button[type="submit"]');

  // 3. Verification : on est sur la liste et l'annonce y apparait
  await expect(page).toHaveURL(/\/animals$/);
  await expect(page.getByText(titre).first()).toBeVisible();

  // 4. Verification dans "mes annonces"
  await page.goto('/my-animals');
  await expect(page.getByText(titre).first()).toBeVisible();
});

// CT-58 : un mauvais mot de passe est refuse
test('connexion refusee avec un mauvais mot de passe', async ({ page }) => {
  await page.goto('/login');
  await page.fill('input[name="email"]', 'e2e@test.com');
  await page.fill('input[name="password"]', 'mauvais-mot-de-passe');
  await page.click('button[type="submit"]');

  await expect(page).toHaveURL(/\/login/);
});