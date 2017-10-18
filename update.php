<?php
  require 'database.php';

  $name = $createdBy = $image = $rating = $description = $category = "";

  $nameErr = "";

  $id = null;
  if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
  }

  if (null==$id) {
    header("Location: index.php");
  }

  if (!empty($_POST)) {

    $valid = true;

    if (empty($_POST["game_name"])) {
      $nameErr = "Name is required";
      $valid = false;
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
      $sql = "UPDATE games set name = ?, created_by = ?, image = ?, description = ?, rating = ?, category = ? WHERE id = ?";
      $q = $pdo->prepare($sql);
      $q->execute(array($name, $createdBy, $image, $description, $rating, $category, $id));
      Database::disconnect();
      header("Location: index.php");
    }
  } else {
      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "SELECT * FROM games where id = ?";
      $q = $pdo->prepare($sql);
      $q->execute(array($id));
      $data = $q->fetch(PDO::FETCH_ASSOC);
      $name = $data['name'];
      $createdBy = $data['created_by'];
      $description = $data['description'];
      $rating = $data['rating'];
      $category = $data['category'];
      $image = $data['image'];
      Database::disconnect();
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="style.css" type="text/css"/>
      <title>Update game</title>
  </head>
  <body>
    <form action="update.php" method="post">
        <div class="game_name">
          <label for="game_name">Game's name:</label>
          <input type="text" size="30" maxlength="30" name="game_name" value="<?php echo !empty($name)? $name :'';?>">
          <span class="error">* <?php echo $nameErr;?></span>
          <br/>
        </div>
        <div class="description">
          <label for="description"> Description:</label><br/>
          <textarea rows="20" cols="75" name="description" wrap="physical"><?php echo !empty($description) ? $description :'';?>
          </textarea>
          <br/>
        </div>
        <div class="category">
          <label for="category">Choose a category:</label>
          <select name="category">
            <option value="Yelenas spel">Yelenas spel</option>
            <option value="Toms spel">Toms spel</option>
            <option value="Båda gillar">Båda gillar</option>
          </select><br/>
        </div>
        <div class="image">
          <label for="image">Image:</label>
          <input type="text" size="30" maxlength="255" name="image" value="<?php echo !empty($image) ? $image :'';?>"><br/>
        </div>
        <div class="rating">
          <label for="rating">Rating:</label>
          <select name="rating">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select><br/>
        </div>
        <div class="created_by">
          <label for="created_by">Your name:</label>
          <input type="text" size="20" maxlength="20" name="created_by" value="<?php echo !empty($createdBy) ? $createdBy :'';?>"><br/>
        </div>
        <div class="form-actions">
          <a class="btn" href="index.php">Back</a>
          <input type="submit" value="Update" name="submit">
        </div>
      </form>
  </body>
</html>

