<?php include 'prefix.php';?>
<!DOCTYPE games SYSTEM "games.dtd">

<?php
    require 'database.php';
    $id = null;
    if (!empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if ( null==$id ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM games where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);

        $game_name = htmlspecialchars($data['name']);
        $created_at = htmlspecialchars($data['created_at']);
        $created_by = htmlspecialchars($data['created_by']);
        $image = htmlspecialchars($data['image']);
        $rating = htmlspecialchars($data['rating']);
        $description = htmlspecialchars($data['description']);
        $category = htmlspecialchars($data['category']);
        $game_id = htmlspecialchars($data['id']);

        $returnstring = "<game>";
        $returnstring .= "<game_name>$game_name</game_name>";
        $returnstring .= "<created_at>$created_at</created_at>";
        $returnstring .= "<created_by>$created_by</created_by>";
        $returnstring .= "<image>$image</image>";
        $returnstring .= "<rating>$rating</rating>";
        $returnstring .= "<description>$description</description>";
        $returnstring .= "<category>$category</category>";
        $returnstring .= "<game_id>$game_id</game_id>";
        $returnstring .= "</game>";
        Database::disconnect();
        print utf8_encode($returnstring);
    }
?>
<?php include 'read-postfix.php';?>
