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
    <!--close div products -->

    <div class="fillForm" id="fillForm">

      <h2>Fill the form</h2>

      <form name="myform" method="POST" action="process.php" onsubmit="return formSubmit();">
        <label for="name">Name*</label>
        <input id="name" autofocus placeholder="First and Last name" type="text" name="name"><br />

        <label for="email">Email*</label>
        <input id="email" placeholder="email@domain.com" type="email" name="email"><br />

        <label for="phone">Phone*</label>
        <input id="phone" placeholder="123-123-1234" type="text" name="phone"><br />

        <label for="address">Address*</label>
        <input id="address" placeholder="2000 Trafalgar Road" type="text" name="address"><br />

        <label for="city">City*</label>
        <input id="city" placeholder="Oakville" type="text" name="city"><br />

        <label for="postcode">Post Code*</label>
        <input id="postcode" placeholder="X9X 9X9" type="text" name="postcode"><br />

        <label for="province">Province*</label>
        <select name="province" id="province">
          <option value="">----- Select -----</option>
          <option value="Alberta">Alberta</option>
          <option value="British Columbia">British Columbia</option>
          <option value="Manitoba">Manitoba</option>
          <option value="New Brunswick">New Brunswick</option>
          <option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
          <option value="Northwest Territories">Northwest Territories</option>
          <option value="Nova Scotia">Nova Scotia</option>
          <option value="Nunavut">Nunavut</option>
          <option value="Ontario">Ontario</option>
          <option value="Prince Edward Island">Prince Edward Island</option>
          <option value="Quebec">Quebec</option>
          <option value="Saskatchewan">Saskatchewan</option>
          <option value="Yukon">Yukon</option>
        </select><br /><br>

        <label for="product1">GTA V</label>
        <input id="product1" placeholder="1" type="text" name="product1"><br />

        <label for="product2">Uncharted 4</label>
        <input id="product2" placeholder="1" type="text" name="product2"><br />

        <label for="product3">Lego Deadpool</label>
        <input id="product3" placeholder="1" type="text" name="product3"><br />

        <label for="deliveryTime">Delivery Time</label>
        <select name="deliveryTime" id="deliveryTime">
          <option value="">----- Select -----</option>
          <option value="1">1 day</option>
          <option value="2">2 days</option>
          <option value="3">3 days</option>
          <option value="4">4 days</option>
        </select><br />

        <br>

        <input type="submit" value="Place Order">

      </form>

    </div>
    <!--close fillForm and invoice div -->

  </div>
  <!--close wrapper -->

</body>

</html>