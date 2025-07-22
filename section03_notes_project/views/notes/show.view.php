<?php
req_view('partials/head.php');
req_view('partials/nav.php');
req_view('partials/header.php', ['heading' => $heading]);
?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <a href="/notes" class="text-blue-500 underline mb-6 block hover:text-blue-700">back to notes</a>
    <p><?= htmlspecialchars($note['body']) ?></p>

    <div class="flex gap-3 mt-6">
      <!-- <form method="post">
        <input value="DELETE" name="__req_method" type="hidden">
        <input value="<?= $note['id'] ?>" name="id" type="hidden">
        <button class="rounded-md bg-red-500 px-4 py-2 text-sm font-semibold text-white opacity-100 focus:outline-none hover:bg-red-400">Delete</button>
      </form> -->

      <a
        href="note/edit?id=<?= $note['note_id'] ?>"
        class="rounded-md text-blue-500 px-4 py-2 text-sm font-semibold border border-current focus:outline-none hover:bg-blue-500 hover:text-white">Edit</a>
    </div>
  </div>
</main>

<?php req_view('partials/footer.php') ?>
