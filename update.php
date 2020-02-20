<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Update</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300|Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/master.css">
  </head>
  <body style="margin: 2%;">
    <?php

    $clubId = $_POST["clubId"];
    $clubName = htmlspecialchars($_POST["clubName"]);
    $ground = htmlspecialchars($_POST["ground"]);

    $valid = true;

    if (empty($clubName)){
      $valid = false;
      echo "Club name required";
    }
    if (empty($ground)) {
      $valid = false;
      echo "Ground required";
    }

    if ($valid) {
      $db = new PDO('mysql:host=172.31.22.43;dbname=Braden_W1095701', 'Braden_W1095701', 'P8TwvNsomx');

      // make sql
      if (empty($clubId)) {
        $sql = "INSERT INTO clubs (clubName, ground) VALUES (:clubName, :ground)";
      } else {
        $sql = "UPDATE clubs SET clubName = :clubName, ground = :ground WHERE clubId = :clubId";
      }

      // build and execute the sql query
      $cmd = $db->prepare($sql);
      $cmd->bindParam(':clubName', $clubName, PDO::PARAM_STR, 50);
      $cmd->bindParam(':ground', $ground, PDO::PARAM_STR, 50);
      if (!empty($clubId)) {
        $cmd->bindParam(':clubId', $clubId, PDO::PARAM_INT);
      }
      $cmd->execute();

      $db = null;

      echo $clubName . " is saved.";

    }

    ?>
    <br>
    <a href="/labTwo/" class="btn btn-outline-success" role="button">Okay</a>
  </body>
</html>
