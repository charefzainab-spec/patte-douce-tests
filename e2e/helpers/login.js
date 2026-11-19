import { expect } from '@playwright/test';

export async function login(page) {
  const email = process.env.TEST_EMAIL;
  const password = process.env.TEST_PASSWORD;

  expect(email, 'TEST_EMAIL manquant dans .env').toBeTruthy();
  expect(password, 'TEST_PASSWORD manquant dans .env').toBeTruthy();

  await page.goto('/login');
  await page.locator('input[name="email"]').fill(email);
  await page.locator('input[name="password"]').fill(password);
  await page.getByRole('button', { name: /se connecter/i }).click();
  await expect(page).toHaveURL(/\/user$/);
}