<?php

if (!empty($_GET['clubId'])) {
  $clubId = $_GET['clubId'];
} else {
  $clubId = null;
}

if (!empty($clubId)) {

    // connect to db
    $db = new PDO('mysql:host=172.31.22.43;dbname=Braden_W1095701', 'Braden_W1095701', 'P8TwvNsomx');

    // build the sql query
    $sql = "SELECT * FROM clubs WHERE clubId = :clubId";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':clubId', $clubId, PDO::PARAM_INT);
    $cmd->execute();

    // execute query and get data
    $club = $cmd->fetch();
    $clubName = $club['clubName'];
    $ground = $club['ground'];

    // disconnect from db
    $db = null;

} else {

  $clubName = null;
  $ground = null;

}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300|Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/master.css">
  </head>
  <body>
    <form action="update.php" method="post">
      <fieldset class="form-group">
        <label for="clubName">Club Name:</label>
        <input type="text" name="clubName" value=<?php echo $clubName; ?>>
      </fieldset>
      <fieldset>
        <label for="ground">Ground:</label>
        <input type="text" name="ground" value="<?php echo $ground; ?>">
      </fieldset>
      <input name="clubId" id="clubId" value="<?php echo $clubId; ?>" type="hidden" />
      <input type="submit" name="submit" value="Save">
    </form>
  </body>
</html>
