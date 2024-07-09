<?php
require_once '../includes/db.php';
include '../includes/header.php'; 

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $mysqli->real_escape_string($_POST['title']);
    $author = $mysqli->real_escape_string($_POST['author']);
    $genre = $mysqli->real_escape_string($_POST['genre']);
    $description = $mysqli->real_escape_string($_POST['description']);
    $purpose = $mysqli->real_escape_string($_POST['purpose']);
    $image = $mysqli->real_escape_string($_POST['image']);
    $user_id = $_SESSION['user_id'];

    $stmt = $mysqli->prepare('INSERT INTO books (title, author, genre, description, purpose, image, user_id) VALUES (?, ?, ?, ?, ?, ?, ?)');
    $stmt->bind_param('ssssssi', $title, $author, $genre, $description, $purpose, $image, $user_id);
    $stmt->execute();

    header('Location: home.php');
    exit;
}
?>

<div class="isolate bg-white px-6 py-24 sm:py-32 lg:px-8">
  <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]" aria-hidden="true">
    <div class="relative left-1/2 -z-10 aspect-[1155/678] w-[36.125rem] max-w-none -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
  </div>
  <div class="mx-auto max-w-2xl text-center">
    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Share a Book</h2>
    <p class="mt-2 text-lg leading-8 text-gray-600">Books are expensive! By sharing your paper books with friends and family using BookStore you save money, save trees and read more books.</p>
  </div>
  <form action="#" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20">
    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
      <div class="sm:col-span-2">
        <label for="title" class="block text-sm font-semibold leading-6 text-gray-900">Title</label>
        <div class="mt-2.5">
          <input type="text" name="title" id="title" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      <div class="sm:col-span-2">
        <label for="author" class="block text-sm font-semibold leading-6 text-gray-900">Author</label>
        <div class="mt-2.5">
          <input type="text" name="author" id="author" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      <div class="sm:col-span-2">
        <label for="genre" class="block text-sm font-semibold leading-6 text-gray-900">Genre</label>
        <div class="mt-2.5">
          <input type="text" name="genre" id="genre" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      <div class="sm:col-span-2">
          <label for="description" class="block text-sm font-semibold leading-6 text-gray-900">Description</label>
          <div class="mt-2.5">
              <textarea name="description" id="description" rows="4" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
            </div>
        </div>
        <div class="sm:col-span-2">
            <label for="purpose" class="block text-sm font-semibold leading-6 text-gray-900">Purpose</label>
            <div class="mt-2.5">
                <select id="purpose" name="purpose" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    <option value="sell">Sell</option>
                    <option value="exchange">Exchange</option>
                    <option value="rent">Rent</option>
                    <option value="donate">Donate</option>
                    <option value="lend">Lend</option>
                    <option value="giveaway">Giveaway</option>
                </select>
            </div>
        </div>
        <div class="sm:col-span-2">
          <label for="image" class="block text-sm font-semibold leading-6 text-gray-900">Image URL</label>
          <div class="mt-2.5">
            <input type="text" name="image" id="image" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
    </div>
    <div class="mt-10">
      <button type="submit" class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Share Book</button>
    </div>
  </form>
</div>

<?php include '../includes/footer.php'; ?>
