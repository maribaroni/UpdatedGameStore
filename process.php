<?php
if (empty($_POST)) {
    header('Location: index.php');
}
include('db_connection.php');
?>
<!DOCTYPE html>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Welcome to Our Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="js/script.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat+Subrayada&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baloo|Radley|Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

    <div class="wrapper">

        <div class="header">
            <h1>Welcome to OurStore</h1>
        </div>

        <div class="nav_top_menu">
            <a href="index.php">ORDER FORM</a>
            <a href="allorders.php">ALL ORDERS</a>
        </div>

        <div class="products">

            <h2>You choose, We deliver</h2>

            <div class="images">
                <img id="image" src="images/gtav.png">
                <img id="image" src="images/uncharted4.png">
                <img id="image" src="images/deadpool.png">
            </div>

        </div>

        <div class="fillForm" id="fillForm">

            <!-- <pre>
            <?php
            //print_r($_POST); // to check the POST array   
            ?>
            </pre> -->

            <?php

            //Store errors
            $errors = "";

            //Store receipt
            $message = "";

            //Empty variable to do calculations
            $totalAmount = 0;
            $totalPayment = 0;
            $subTotal = 0;
            $tax = 0;

            //Fetch all the input values
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $postcode = $_POST['postcode'];
            $province = $_POST['province'];
            $product1 = $_POST['product1'];
            $product2 = $_POST['product2'];
            $product3 = $_POST['product3'];
            $deliveryTime = $_POST['deliveryTime'];

            //---Validations

            //Regular expressions
            $postcodeRegex = '/^[A-Z][0-9][A-Z]\s?[0-9][A-Z][0-9]$/';
            $numberRegex = '/^[0-9]+$/';
            $phoneRegex = '/^[0-9]{3}\-?[0-9]{3}\-?[0-9]{4}$/';

            //PHP function to check regular expressions
            function checkRegex($reg, $userInput, $message)
            {
                if (!preg_match($reg, $userInput)) {
                    return $message . '<br>';
                } else {
                    return '';
                }
            }

            //Name - Required
            if (trim($name) == '') {
                $errors .= "*Name is required <br>";
            }
            //Email - Required 
            if (trim($email) == '') {
                $errors .= "*Email is required <br>";
            } //else if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            //  $errors .= `#Email is not in correct format <br>`;
            //}
            //Phone - Required and regular expression
            if (trim($phone) == '') {
                $errors .= "*Phone is required <br>";
            }
            $errors .=  checkRegex($phoneRegex, trim($phone), "#Phone is not in correct format <br>");
            //Address - Required
            if (trim($address) == '') {
                $errors .= "*Address is required <br>";
            }
            //City - Required
            if (trim($city) == '') {
                $errors .= "*City is required <br>";
            }
            //Postcode - Required and regular expression
            if (trim($postcode) == '') {
                $errors .= "*Post code is required <br>";
            }
            $errors .=  checkRegex($postcodeRegex, trim($postcode), "#Postcode not in correct format <br>");
            //Province  - Required
            if (trim($province) == '') {
                $errors .= "*Province is required <br>";
            }
            //Products - Regular expression and at least one product
            if ($product1 != '' && !preg_match($numberRegex, $product1)) {
                $errors .= "#Quantity of GTA V is not in correct format <br>";
            }
            if ($product2 != '' && !preg_match($numberRegex, $product2)) {
                $errors .= "#Quantity of Uncharted 4 is not in correct format <br>";
            }
            if ($product3 != '' && !preg_match($numberRegex, $product3)) {
                $errors .= "#Quantity of Lego Deadpool is not in correct format <br>";
            }
            if ($product1 == "0" && $product2 == "0" && $product3 == "0") {
                $errors .= "#Choose at least one game.";
            }
            if ($product1 == "0" && $product2 == '' && $product3 == '') {
                $errors .= "#Choose at least one game.";
            }
            if ($product1 == '' && $product2 == "0" && $product3 == '') {
                $errors .= "#Choose at least one game.";
            }
            if ($product1 == '' && $product2 == '' && $product3 == "0") {
                $errors .= "#Choose at least one game.";
            }
            if ($product1 == '' && $product2 == '' && $product3 == '') {
                $errors .= "#Choose at least one game <br>";
            }
            if ($product1 == '' && $product2 == "0" && $product3 == "0") {
                $errors .= "#Choose at least one game.";
            }
            if ($product1 == "0" && $product2 == '' && $product3 == "0") {
                $errors .= "#Choose at least one game.";
            }
            if ($product1 == "0" && $product2 == "0" && $product3 == '') {
                $errors .= "#Choose at least one game.";
            }

            //---------Checking for errors---------
            if ($errors != '') {
            ?>

                <h2>Warning</h2>

                <div id="invoice">

                <?php
                echo $errors; //Displaying errors
                $greetings = ""; //In case of errors, do not display thanks

            } else {

                //Preparing the calculations to invoice
                if ($product1 != '') {
                    $product1 = intval($product1);
                } else {
                    $product1 = 0;
                }

                if ($product2 != '') {
                    $product2 = intval($product2);
                } else {
                    $product2 = 0;
                }

                if ($product3 != '') {
                    $product3 = intval($product3);
                } else {
                    $product3 = 0;
                }

                $totalPayment = floatval(($product1 * 10) + ($product2 * 20) + ($product3 * 30));

                switch ($deliveryTime) {
                    case "1":
                        $deliveryCost = 30;
                        break;
                    case "2":
                        $deliveryCost = 25;
                        break;
                    case "3":
                        $deliveryCost = 20;
                        break;
                    case "4":
                        $deliveryCost = 15;
                        break;
                    default:
                        $deliveryCost = 0;
                }

                $subTotal = round(($totalPayment + $deliveryCost), 2);

                $deliveryCost = round($deliveryCost, 2);

                switch ($province) {
                    case "Alberta":
                    case "Northwest Territories":
                    case "Nunavut":
                    case "Yukon":
                        $taxPercent = 5;
                        break;
                    case "British Columbia":
                        $taxPercent = 12;
                        break;
                    case "Manitoba":
                    case "Ontario":
                        $taxPercent = 13;
                        break;
                    case "New Brunswick":
                    case "Newfoundland and Labrador":
                    case "Nova Scotia":
                    case "Prince Edward Island":
                        $taxPercent = 15;
                        break;
                    case "Quebec":
                        $taxPercent = 14.975;
                        break;
                    case "Saskatchewan":
                        $taxPercent = 11;
                        break;
                }

                $tax = round(($taxPercent * $subTotal / 100), 2);

                $totalAmount = round(($subTotal + $tax), 2);

                //Formatting the receipt
                $message .= "
                        <h2>Your invoice</h2>
                        <div id=\"invoice\">       
                        <table>
                        <tr><td align=\"left\">Name</td>             <td align=\"center\" width = \"80px\">:</td> <td align=\"right\">$name</td> </tr>     
                        <tr><td align=\"left\">Email</td>            <td align=\"center\" width = \"80px\">:</td> <td align=\"right\">$email</td> </tr>
                        <tr><td align=\"left\">Phone</td>            <td align=\"center\" width = \"80p\">:</td> <td align=\"right\">$phone</td> </tr>
                        <tr><td align=\"left\">Delivery Address</td> <td align=\"center\" width = \"80px\">:</td> <td align = \"start\">$address <br> $city <br> $province, $postcode </td></tr>";

                if ($product1 != '') {
                    $product1 *= 10;
                    $message .= "<tr><td align=\"left\">$product1 GTA V @ $10.00 </td> <td align=\"center\" width = \"80px\">:</td> <td align=\"right\">$$product1 </td></tr>";
                }

                if ($product2 != '') {
                    $product2 *= 20;
                    $message .= "<tr><td align=\"left\">$product2 Uncharted 4 @ $20.00</td> <td align=\"center\" width = \"80px\">:</td> <td align=\"right\">$$product2 </td></tr>";
                }

                if ($product3 != '') {
                    $product2 *= 30;
                    $message .= "<tr><td align=\"left\">$product3 Lego Deadpool @ $30.00</td> <td align=\"center\" width = \"80px\">:</td> <td align=\"right\">$$product3 </td></tr>";
                }

                $message .= "
                        <tr><td align=\"left\">Shipping Charges</td> <td align=\"center\" width =\ \"80px\">:</td> <td align=\"right\">$$deliveryCost </td></tr>
                        <tr><td align=\"left\">Sub Total</td> <td align=\"center\" width = \"80px\">:</td> <td align=\"right\">$$subTotal</td></tr>
                        <tr><td align=\"left\">Taxes @ $taxPercent%</td> <td align=\"center\" width = \"80px\">:</td> <td align=\"right\">$$tax</td></tr>
                        <tr><td align=\"left\">Total</td> <td align=\"center\" width = \"80px\">:</td> <td align=\"right\">$$totalAmount</td></tr>
                        </table>
                        </div>";

                //Store the new order into the database
                $sqlquery = "
                INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `city`, `postcode`, `province`, `product1`, `product2`, `product3`, `totalCost`) VALUES (NULL, '$name', '$email', '$phone', '$address', '$city', '$postcode', '$province', '$product1', '$product2', '$product3', '$totalAmount')
                ";

                //Execute the sql query
                $sqlresult = $db->query($sqlquery);

                //Check result
                if (!$sqlresult) {
                    exit('Some error occured');
                    exit($db->error);
                }

                //Displaying the receipt
                echo $message;

                //Populates greetings
                $greetings = "<h2 style=\"font-size: 30px; text-align: center; display: flex; justify-content: center;\">Thank you for buying with us! <br> Have a great day!<br> :D </h2>;";
            }
                ?>

                <?php
                if ($greetings != "") {
                    echo $greetings;
                }
                ?>

                </div>

        </div>

    </div>

</body>

</html>