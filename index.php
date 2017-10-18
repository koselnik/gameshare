<?php include 'prefix.php';?>
<?php include 'database.php';?>
<?php header("Content-type: text/html; charset=utf-8");?>

<!DOCTYPE games SYSTEM "games.dtd">
<?php
  $conn = Database::connect();

  // the query
  $query = "SELECT * FROM `games` ORDER BY created_at DESC";

  // execute the query
  $returnstring = "<games>";

  foreach ($conn->query($query) as $line) {
    // store content in variables
    $game_name = htmlspecialchars($line['name']);
    $created_at = htmlspecialchars($line['created_at']);
    $created_by = htmlspecialchars($line['created_by']);
    $image = htmlspecialchars($line['image']);
    $rating = htmlspecialchars($line['rating']);
    $description = htmlspecialchars($line['description']);
    $category = htmlspecialchars($line['category']);
    $game_id = htmlspecialchars($line['id']);

    $returnstring .= "<game>";
    $returnstring .= "<game_name>$game_name</game_name>";
    $returnstring .= "<created_at>$created_at</created_at>";
    $returnstring .= "<created_by>$created_by</created_by>";
    $returnstring .= "<image>$image</image>";
    $returnstring .= "<rating>$rating</rating>";
    $returnstring .= "<description>$description</description>";
    $returnstring .= "<category>$category</category>";
    $returnstring .= "<game_id>$game_id</game_id>";
    $returnstring .= "</game>";
  }

  $returnstring .= "</games>";
  Database::disconnect();
  print utf8_encode($returnstring);
?>
<?php include 'postfix.php';?>
