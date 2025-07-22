<?php 
  req_view('partials/head.php');
  req_view('partials/nav.php');
  req_view('partials/header.php', ['heading' => $heading]);
?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <div class="mb-8 w-full">
      <a href="/notes/create" class="rounded-md bg-indigo-500 px-4 py-2 text-sm font-semibold text-white opacity-100 focus:outline-none hover:bg-indigo-400">Create Note</a>
    </div>
    <ul>
      <?php foreach ($notes as $note): ?>
        <li class="pb-6">
          <a href="/note?id=<?= $note['note_id'] ?>" class="hover:underline">
            <h2 class="text-xl font-bold"><?= htmlspecialchars($note['title']) ?></h2>
          </a>
          <p class="text-sm/6"><?= htmlspecialchars($note['body']) ?></p>
        </li>
      <?php endforeach ?>
    </ul>
  </div>
</main>

<?php req_view('partials/footer.php') ?>
