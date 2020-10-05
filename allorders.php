<?php
include('db_connection.php');
?>
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

    <div class="allOrdersWrapper">

        <div class="header">
            <h1>Welcome to OurStore</h1>
        </div>

        <div class="nav_top_menu">
            <a href="index.php">ORDER FORM</a>
            <a href="allorders.php">ALL ORDERS</a>
        </div>

        <div class="allOrders">

            <table class=" table">

                <tr>
                    <th>Order ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Post Code</th>
                    <th>Province</th>
                    <th>Product 1</th>
                    <th>Product 2</th>
                    <th>Product 3</th>
                    <th>Total</th>
                    <th>Delete</th>
                </tr>

                <?php

                //SQL query
                $sqlquery = 'SELECT * FROM orders';

                //Execute the SQL query
                $sqlresult = $db->query($sqlquery);

                //Check if there are results
                if ($sqlresult->num_rows > 0) {

                    //Loop through the database rows if there are results
                    while ($row = $sqlresult->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><?php echo $row['city']; ?></td>
                            <td><?php echo $row['postcode']; ?></td>
                            <td><?php echo $row['province']; ?></td>
                            <td><?php echo $row['product1']; ?></td>
                            <td><?php echo $row['product2']; ?></td>
                            <td><?php echo $row['product3']; ?></td>
                            <td><?php echo $row['totalCost']; ?></td>
                            <td><a href='delete.php?id=<?php echo $row['id']; ?>'>DELETE</a></td>
                        </tr>

                <?php
                    }
                }
                ?>

            </table>

        </div>
    </div>

</body>

</html>