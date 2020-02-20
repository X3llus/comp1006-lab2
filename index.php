<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Clubs - Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300|Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/master.css">
    <script src="./scripts/index.js" charset="utf-8"></script>
  </head>
  <body>
    <header>
      <h1>Clubs</h1>
      <a href="edit.php">Add new club</a>
    </header>
    <table class="table table-striped table-hover">
      <thead><th>Club</th><th>Ground</th><th></th></thead>
      <?php

      // Connect to my database
      $db = new PDO('mysql:host=172.31.22.43;dbname=Braden_W1095701', 'Braden_W1095701', 'P8TwvNsomx');

      // Make sql command to get our data
      $select = "SELECT * FROM clubs";
      $cmd = $db->prepare($select);
      $cmd->execute();

      $clubs = $cmd->fetchAll();

      // Build out the table rows with the data
      foreach ($clubs as $club) {
        echo "<tr><td><a href='edit.php?clubId=" . $club["clubId"] . "'>" . $club["clubName"] . "</td><td>" . $club["ground"] . "</td><td><a class='btn btn-outline-danger btn-sm' href='delete.php?clubId=" . $club["clubId"] . "' onclick='return confirmDelete();'>Delete</a></tr>";
      }

      $db = null;

      ?>
     </table>
  </body>
</html>
