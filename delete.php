<!DOCTYPE html>

<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Welcome to Our Store</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="text/javascript" src="js/script.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Montserrat+Subrayada&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Baloo|Radley|Pacifico&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

  <div class="deleteWrapper">

    <div class="header">
      <h1>Welcome to OurStore</h1>
    </div>

    <div class="nav_top_menu">
      <a href="index.php">ORDER FORM</a>
      <a href="allorders.php">ALL ORDERS</a>
    </div>

    <?php //PHP code to delete a row from database

    include('db_connection.php');
    $id = $_GET['id'];

    //SQL Query
    $sqlquery = "
        DELETE FROM orders WHERE id = $id
      ";

    //Execute SQL Query
    $sqlresult = $db->query($sqlquery);

    //Check result from SQL Query
    if ($sqlresult) {
    ?>
      <h2>Successfully deleted.</h2>
    <?php
    } else {
    ?>
      <h2>Could not delete. Please try again.</h2>
    <?php
    }

    ?>

  </div>
  </div>
  </div>

</body>

</html>