<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>

  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
  </style>
</head>

<body>
  <h1>Recommended Books</h1>

  <ul>
    <?php foreach ($filteredBooks as $book): ?>
      <li>
        <a href="<?= $book['purchaseUrl'] ?>" target="_blank" rel="noopener noreferrer">
          <?= $book['name']; ?> (<?= $book['releaseYear'] ?>) - By <?= $book['author'] ?>
        </a>
      </li>
    <?php endforeach ?>
  </ul>
</body>

</html>