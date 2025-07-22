<?php 
  req_view('partials/head.php');
  req_view('partials/nav.php');
  req_view('partials/header.php', ['heading' => $heading]);
?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <h1>About</h1>
  </div>
</main>

<?php req_view('partials/footer.php') ?>
