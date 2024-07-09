<?php
include '../includes/header.php';
include '../includes/db.php';

$result = $mysqli->query('SELECT b.title, b.author, b.genre, b.description, b.purpose, b.image, u.email, u.phone FROM books b JOIN users u ON u.id = b.user_id WHERE b.id =  ' . $_GET["book_id"]);
if ($result->num_rows != 1):
  ?>
  <div class="bg-white">
    <div
      class="mx-auto grid max-w-2xl grid-cols-1 items-center gap-x-8 gap-y-16 px-4 py-24 sm:px-6 sm:py-32 lg:max-w-7xl lg:grid-cols-2 lg:px-8">
      <div>
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">No Book Found</h2>
        <p class="mt-4 text-gray-500"> We're sorry, but we couldn't find the book you're looking for. It may have been
          removed, or perhaps it never existed. Please check the book ID or try searching for another title. If you
          believe this is an error, feel free to contact our support team for further assistance.
        </p>
      </div>
    </div>
  </div>
  <?php
else:
  $book = $result->fetch_assoc();
  ?>
  <div class="bg-white">
    <div
      class="mx-auto grid max-w-2xl grid-cols-1 items-center gap-x-8 gap-y-16 px-4 py-24 sm:px-6 sm:py-32 lg:max-w-7xl lg:grid-cols-2 lg:px-8">
      <div>
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
          <?php echo htmlspecialchars(ucfirst($book['title'])) ?>
        </h2>
        <p class="mt-4 text-gray-500"><?php echo htmlspecialchars($book['description']) ?></p>

        <dl class="mt-16 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-3 sm:gap-y-16 lg:gap-x-8">
          <div class="border-t border-gray-200 pt-4">
            <dt class="font-medium text-gray-900">Author</dt>
            <dd class="mt-2 text-sm text-gray-500"><?php echo htmlspecialchars(ucfirst($book['author'])) ?></dd>
          </div>
          <div class="border-t border-gray-200 pt-4">
            <dt class="font-medium text-gray-900">Genre</dt>
            <dd class="mt-2 text-sm text-gray-500"><?php echo htmlspecialchars(ucfirst($book['genre'])) ?></dd>
          </div>
          <div class="border-t border-gray-200 pt-4">
            <dt class="font-medium text-gray-900">Purpose</dt>
            <dd class="mt-2 text-sm text-gray-500"><?php echo htmlspecialchars(ucfirst($book['purpose'])) ?></dd>
          </div>
          <div class="border-t border-gray-200 pt-4">
            <dt class="font-medium text-gray-900">Email</dt>
            <dd class="mt-2 text-sm text-gray-500"><?php echo htmlspecialchars(ucfirst($book['email'])) ?></dd>
          </div>
          <div class="border-t border-gray-200 pt-4">
            <dt class="font-medium text-gray-900">Phone</dt>
            <dd class="mt-2 text-sm text-gray-500"><?php echo htmlspecialchars(ucfirst($book['phone'])) ?></dd>
          </div>
        </dl>
      </div>
      <div class="grid grid-cols-2 gap-4 sm:gap-6 lg:gap-8">
        <img src=<?php echo htmlspecialchars(ucfirst($book['image'])) ?> alt=<?php echo htmlspecialchars(ucfirst($book['title'])) ?> class="rounded-lg bg-gray-100">
      </div>
    </div>
  </div>
<?php endif; ?>
<?php
include '../includes/footer.php';