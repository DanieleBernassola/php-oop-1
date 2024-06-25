<?php

// CLASSE ATTORI
class Actor
{
  // VARIABILI D'ISTANZA ATTORI
  private string $name;
  private string $surname;

  public function __construct(string $name, string $surname)
  {
    $this->name = $name;
    $this->surname = $surname;
  }

  // METODO GET PER NOME ATTORE
  public function getFullName(): string
  {
    return "{$this->name} {$this->surname}";
  }
}
// CLASSE FILM
class Movie
{
  // VARIABILI D'ISTANZA
  private string $title;
  private array $genres; // PIù DI UN GENERE
  private int $year;
  private array $actors; // PIù DI UN ATTORE

  // COSTRUTTORE
  public function __construct(string $title, array $genres, int $year, array $actors = [])
  {
    $this->title = $title;
    $this->setGenres($genres);
    $this->year = $year;
    $this->actors = $actors;
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

  // SET ATTORI
  public function setActors(array $actors)
  {
    $this->actors = $actors;
  }

  // METODO GET PER INFO FILM
  public function getInfo()
  {
    // GENERI COME STRINGA
    $genresString = '';
    foreach ($this->genres as $genre) {
      $genresString .= $genre . ', ';
    }
    // ATTORI COME STRINGA
    $actorsString = '';
    foreach ($this->actors as $actor) {
      $actorsString .= $actor->getFullName() . ', ';
    }
    return "Titolo: {$this->title}, Generi: {$genresString}, Anno: {$this->year}, Attori: {$actorsString}";
  }
}

// CREAZIONE ATTORI
$actor1 = new Actor("Leonardo", "DiCaprio");
$actor2 = new Actor("Joseph", "Gordon-Levitt");
$actor3 = new Actor("Keanu", "Reeves");
$actor4 = new Actor("Laurence", "Fishburne");

// ISTANZIATI DUE OGGETTI MOVIE CON EXCEPTION
try {
  $movies = [
    new Movie("Inception", ["Sci-fi", "Thriller"], 2010, [$actor1, $actor2]),
    new Movie("The Matrix", ["Sci-fi", "Action"], 1999, [$actor3, $actor4])
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