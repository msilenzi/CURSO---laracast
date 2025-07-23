<?php
req_view('partials/head.php');
req_view('partials/nav.php');
req_view('partials/header.php', ['heading' => $heading]);
?>


<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <form method="post" action="/note" class="max-w-md mx-auto p-6 bg-white rounded-xl shadow-md space-y-5">
      <div>
        <input type="hidden" name="__req_method" value="PATCH">
        <input type="hidden" name="id" value="<?= $note['note_id'] ?>">
        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
        <input
          id="title"
          name="title"
          type="text"
          placeholder="Title"
          class="mt-1 w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:outline-2 focus:-outline-offset-1 focus:outline-indigo-500"
          value="<?= $note['title'] ?? '' ?>" />
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
          class="mt-1 w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:outline-2 focus:-outline-offset-1 focus:outline-indigo-500"><?= $note['body'] ?? '' ?></textarea>
        <?php if (isset($errors['body'])): ?>
          <p class="text-sm mt-1 text-red-600/80"><?= $errors['body'] ?></p>
        <?php endif ?>
      </div>

      <div class="flex flex-col gap-3">
        <button
          type="submit"
          class="w-full rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-600 focus-visible:outline-2">
          Update
        </button>
        <a
          href="/note?id=<?= $note['note_id'] ?>"
          class="w-full rounded-md bg-gray-500 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-gray-600 focus-visible:outline-2 text-center">Cancel</a>
      </div>
    </form>
  </div>
</main>

<?php req_view('partials/footer.php') ?>