<?php

class Movie
{
  // VARIABILI D'ISTANZA
  private string $title;
  private array $genres; // PIù DI UN GENERE
  private int $year;

  // COSTRUTTORE
  public function __construct(string $title, array $genres, int $year)
  {
    $this->title = $title;
    $this->setGenres($genres);
    $this->year = $year;
  }

  // SET GENERI CON ECCEZIONI
  public function setGenres(array $genres)
  {
    if (empty($genres)) {
      throw new InvalidArgumentException("Il genere deve essere una lista non vuota.");
    }
    foreach ($genres as $genre) {
      if (!is_string($genre) || empty($genre)) {
        throw new InvalidArgumentException("Ogni genere deve essere una stringa non vuota.");
      }
    }
    $this->genres = $genres;
  }

  // METODO GET PER INFO FILM
  public function getInfo()
  {
    $genres = implode(", ", $this->genres); // GENERI DIVENTA UNA STRINGA, VENGONO SEPARATE DA ", "
    return "Titolo: {$this->title}, Generi: {$genres}, Anno: {$this->year}";
  }
}

// ISTANZIATI DUE OGGETTI MOVIE CON EXCEPTION
try {
  $movies = [
    new Movie("Inception", ["Sci-fi", "Thriller"], 2010),
    new Movie("The Matrix", ["Sci-fi", "Action"], 1999)
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