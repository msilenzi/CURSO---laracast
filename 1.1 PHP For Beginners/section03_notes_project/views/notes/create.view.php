<?php 
  req_view('partials/head.php');
  req_view('partials/nav.php');
  req_view('partials/header.php', ['heading' => $heading]);
?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <form method="post" action="/notes" class="max-w-md mx-auto p-6 bg-white rounded-xl shadow-md space-y-5">
      <div>
        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
        <input
          id="title"
          name="title"
          type="text"
          placeholder="Title"
          class="mt-1 w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:outline-2 focus:-outline-offset-1 focus:outline-indigo-500"
          value="<?= $_POST['title'] ?? '' ?>"
          />
        <?php if (isset($errors['title'])): ?>
          <p class="text-sm mt-1 text-red-600/80"><?= $errors['title'] ?></p>
        <?php endif ?>
      </div>

      <div>
        <label for="body" class="block text-sm font-medium text-gray-700">Note</label>
        <textarea
          id="body"
          name="body"
          placeholder="Your note..."
          rows="4"
          class="mt-1 w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:outline-2 focus:-outline-offset-1 focus:outline-indigo-500"><?= $_POST['body'] ?? '' ?></textarea>
        <?php if (isset($errors['body'])): ?>
          <p class="text-sm mt-1 text-red-600/80"><?= $errors['body'] ?></p>
        <?php endif ?>
      </div>

      <button
        type="submit"
        class="w-full rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-600 focus-visible:outline-2">
        Create note
      </button>
    </form>
  </div>
</main>

<?php req_view('partials/footer.php') ?>