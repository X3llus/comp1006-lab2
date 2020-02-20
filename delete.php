<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Deleted</title>
  </head>
  <body>
    <?php

    $clubId = $_GET["clubId"];

    if (empty($clubId)) {
      echo "club id not present";
    } else {
      // connect to db
      $db = new PDO('mysql:host=172.31.22.43;dbname=Braden_W1095701', 'Braden_W1095701', 'P8TwvNsomx');

      // create and execute the query for deleting club
      $sql = "DELETE FROM clubs WHERE clubId = :clubId";
      $cmd = $db->prepare($sql);
      $cmd->bindParam(':clubId', $clubId, PDO::PARAM_INT);
      $cmd->execute();

      // disconnect from db
      $db = null;

      echo "Deleted";
    }

    ?>

    <a href="/labTwo/" class="btn btn-outline-success" role="button">Okay</a>

  </body>
</html>
