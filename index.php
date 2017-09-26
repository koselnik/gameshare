<?php include 'prefix.php';?>
<?php header("Content-type: text/html; charset=utf-8");?>

<!DOCTYPE games SYSTEM "games.dtd">
<?php
  $servername = "localhost";
  $username = "root";
  $password = "password";

  // Create connection
  $conn = new mysqli($servername, $username, $password);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  // the query
  $query = "SELECT * FROM `gameshare`.`Games` ORDER BY created_at DESC";

    // execute the query
  if (($result = mysqli_query($conn, $query)) === false) {
     printf("Query failed: %s<br />\n%s", $query, mysqli_error($conn));
     exit();
  }

  $returnstring = "<games>";

  while ($line = mysqli_fetch_object($result)) {
    // store content in variables
    $game_name = htmlspecialchars($line->game_name);
    $created_at = htmlspecialchars($line->created_at);
    $created_by = htmlspecialchars($line->created_by);
    $image = htmlspecialchars($line->image);
    $rating = htmlspecialchars($line->rating);
    $description = strtotime($line->description);
    $category = htmlspecialchars($line->category);
    $game_id = htmlspecialchars($line->game_id);

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
  print utf8_encode($returnstring);
?>
<?php include 'postfix.php';?>
