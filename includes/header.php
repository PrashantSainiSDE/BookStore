<?php
session_start();
?>
<!DOCTYPE html>
<html class="scroll-smooth">

<head>
  <title>Bookstore</title>
  <link rel="stylesheet" type="text/css" href="/css/styles.css">
  <script src="https://cdn.tailwindcss.com?plugins=aspect-ratio,forms"></script>
  <script src="../js/scripts.js"></script>
  <script>
    tailwind.config = {
      content: ["*"],
      theme: {
        extend: {
          colors: {
            clifford: '#da373d',
          }
        }
      }
    }
  </script>
</head>

<body>
  <header class="absolute inset-x-0 top-0 z-50">
    <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
      <div class="flex lg:flex-1">
        <a href="#" class="-m-1.5 p-1.5">
          <span class="sr-only">Book Store</span>
          <img class="h-8 w-auto"
            src="https://cdn.dribbble.com/userupload/6810642/file/original-45a54e0571ae13ce154f565f49615607.png" alt="">
        </a>
      </div>
      <div class="flex lg:hidden">
        <button id="menuButton" type="button"
          class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
          <span class="sr-only">Open main menu</span>
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
        </button>
      </div>
      <div class="hidden lg:flex lg:gap-x-12">
        <a href="home.php" class="text-sm font-semibold leading-6 text-gray-900">Home</a>
        <?php if (isset($_SESSION['user_id'])): ?>
          <a href="share_book.php" class="text-sm font-semibold leading-6 text-gray-900">Share a Book</a>
        <?php endif; ?>
      </div>
      <div class="hidden lg:flex lg:flex-1 lg:justify-end">
        <?php if (isset($_SESSION['user_id'])): ?>
          <a href="logout.php" class="text-sm font-semibold leading-6 text-gray-900">Logout</a>
        <?php else: ?>
          <a href="login.php" class="mx-3 text-sm font-semibold leading-6 text-gray-900">Log in</a>
          <a href="register.php" class=" mx-3 text-sm font-semibold leading-6 text-gray-900">Register</a>
        <?php endif; ?>
      </div>
    </nav>

    <div id="mobileMenu" class="lg:hidden" role="dialog" aria-modal="true">
      <div
        class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
        <div class="flex items-center justify-between">
          <a href="#" class="-m-1.5 p-1.5">
            <span class="sr-only">Book Store</span>
            <img class="h-8 w-auto"
              src="https://cdn.dribbble.com/userupload/6810642/file/original-45a54e0571ae13ce154f565f49615607.png"
              alt="">
          </a>
          <button id="closeMenuButton" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
            <span class="sr-only">Close menu</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
              aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="mt-6 flow-root">
          <div class="-my-6 divide-y divide-gray-500/10">
            <div class="space-y-2 py-6">
              <a href="home.php"
                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Home</a>
              <a href="cart.php"
                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Cart</a>
              <?php if (isset($_SESSION['user_id'])): ?>
                <a href="share_book.php"
                  class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Share
                  a Book</a>
              <?php endif; ?>
            </div>
            <div class="py-6">
              <?php if (isset($_SESSION['user_id'])): ?>
                <a href="logout.php"
                  class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Logout</a>
              <?php else: ?>
                <a href="login.php"
                  class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Log
                  in</a>
                <a href="register.php"
                  class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Register</a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>