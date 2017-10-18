<?php
  header("Content-type: text/html; charset=utf-8");
  require 'database.php';

  $name = $createdBy = $image = $rating = $description = $category = "";

  $nameErr = "";

  if (!empty($_POST)) {

    $valid = true;

    if (empty($_POST["game_name"])) {
      $nameErr = "Name is required";
      $valid = false;
    } else {
      $name = test_input($_POST["game_name"]);
    }

    if (empty($_POST["image"])) {
      $image = "";
    } else {
      $image = test_input($_POST["image"]);
    }

    if (empty($_POST["created_by"])) {
      $createdBy = "";
    } else {
      $createdBy = test_input($_POST["created_by"]);
    }

    if (empty($_POST["rating"])) {
      $rating = NULL;
    } else {
      $rating = (int)$_POST["rating"];
    }

    if (empty($_POST["description"])) {
      $description = "";
    } else {
      $description = test_input($_POST["description"]);
    }

    if (empty($_POST["category"])) {
      $category = "";
    } else {
      $category = test_input($_POST["category"]);
    }

    if ($valid) {
      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "INSERT INTO games (name, created_by, image, description, rating, category) values(?, ?, ?, ?, ?, ?)";
      $q = $pdo->prepare($sql);
      $q->execute(array($name, $createdBy, $image, $description, $rating, $category));
      Database::disconnect();
      header("Location: index.php");
    }
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>
