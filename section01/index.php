<?php

$books = [
  [
    'name' => 'Do Androids Dream of Electric Sheep',
    'author' => 'Philip K. Dick',
    'releaseYear' => 1968,
    'purchaseUrl' => 'http://example.com/book/1234'
  ],
  [
    'name' => 'Project Hail Mary',
    'author' => 'Andy Weir',
    'releaseYear' => 2021,
    'purchaseUrl' => 'http://example.com/book/2345'
  ],
  [
    'name' => 'The Martian',
    'author' => 'Andy Weir',
    'releaseYear' => 2011,
    'purchaseUrl' => 'http://example.com/book/3456'
  ],
];

function filter($items, $fn)
{
  $filteredItems = [];
  foreach ($items as $item) {
    if ($fn($item)) $filteredItems[] = $item;
  }
}

$filteredBooks = array_filter($books, function ($book) {
  return $book['author'] === 'Andy Weir';
});

require "index.view.php";
