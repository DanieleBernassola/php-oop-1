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

</body>

</html>