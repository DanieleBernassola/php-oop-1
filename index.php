<?php

class Movie
{
  // VARIABILI D'ISTANZA
  private string $title;
  private string $genre;
  private int $year;

  // COSTRUTTORE
  public function __construct(string $title, string $genre, int $year)
  {
    $this->title = $title;
    $this->genre = $genre;
    $this->year = $year;
  }

  // METODO GET PER INFO FILM
  public function getInfo()
  {
    return "Titolo: {$this->title}, Genere: {$this->genre}, Anno: {$this->year}";
  }
}

// ISTANZIATI DUE OGGETTI MOVIE CON EXCEPTION
try {
  $movies = [
    new Movie("Inception", "Sci-fi", 2010),
    new Movie("The Matrix", "Sci-fi", 1999)
  ];
} catch (Exception $e) {
  echo "Eccezione: " . $e->getMessage();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP OOP</title>
</head>

<body>
  <!-- TITOLO -->
  <h1>Movies</h1>
  <!-- LISTA FILM -->
  <ul>
    <?php foreach ($movies as $movie) : ?>
      <li><?php echo $movie->getInfo() ?></li>
    <?php endforeach; ?>
  </ul>
</body>

</html>