<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Carts</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="/assets/css/header_style.css">
  <link rel="stylesheet" href="/assets/css/carts_style.css">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="./assets/images/favicon.png">

</head>
<body>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div id="container">
<!--     START OF HEADER -->
    <div id="header" class='col-md-12'>
      <a href="/">
        <h1>Dojo eCommerce</h1>
      </a>
      <a href="/main/carts">
        <button type="button" class="btn btn-info pull-right">
          <?php 
          $cart_qty = "";
          if($this->session->userdata('cart_qty')){
            $cart_qty = "(".$this->session->userdata('cart_qty').")";
          }?>
          <span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart <?=$cart_qty?>
        </button>
      </a>
    </div>
<!--     END OF HEADER // START OF SHOPPING CART-->
    <div id='body' class='col-md-8'>
      <div id='shopping_cart'>
        <table class="table table-bordered">
          <thead>
            <th>Item</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
          </thead>
          <tbody>
            <tr>
              <td>Black Belt for Staff</td>   <!-- NEEDS TO DYNAMICALLY CHANGE -->
              <td>$19.99</td>   <!-- NEEDS TO DYNAMICALLY CHANGE -->
              <td id="qty">
                <form action="/carts" method="POST">
                  <input type="number" name="qty" value="1">
                  <input id="update" type="submit" value="update">  
                  <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete">
                  <span class="glyphicon glyphicon-trash"></span></button>
                </form>
              </td>
              <td>$19.99</td>   <!-- NEEDS TO DYNAMICALLY CHANGE -->
            </tr>
          </tbody>
        </table>
      </div>

<!--       END OF THE SHOPPING CART // START OF THE ORDER SUMMARY -->
      <div id='order_summary'>
        <h3>Order Total:<!--  $<?=$grand_total?> --></h3>
        <a href="/"><button type="button" class="btn btn-info">
          <span class="glyphicon glyphicon-menu-left"></span><span class="glyphicon glyphicon-menu-left"></span>Go Back</button></a>
          <a href="/"><button type="button" class="btn btn-success pull-right">Continue Shopping</button></a>
      </div>

<!--         END OF THE ORDER SUMMARY // START OF THE SHIPPING INFORMATION -->
      <div id='shipping'>
        <h3>Shipping Information</h3>
          <form action="/pay" method="POST">
            <label>First Name:</label>
              <input type='text' name='first_name' placeholder='John'>
            <label>Last Name:</label>
              <input type='text' name='last_name' placeholder='Smith'>
            <label>Address:</label>
              <input type='text' name='address' placeholder='123 Ninja LN'>
            <label>Address 2:</label>
              <input type='text' name='address2' placeholder='Dojo #1337'>
            <label>City:</label>
              <input type='text' name='city' placeholder='Akatsuki'>
            <label>State:</label>
              <input type='text' name='state' placeholder='WA'>
            <label>Zipcode:</label>
              <input type='text' name='zipcode' placeholder='31337'>
          </form>
      </div>  
<!--       END OF SHIPPING INFORMATION // START OF BILLING INFORMATION -->

      <div id='billing'>
        <h3>Billing Information</h3>
          <input type='checkbox' id="billing_same"><label id="billing_text">Same as shipping</label>
            <form action='/billing' method='POST'>
              <label>First Name:</label>
                <input type='text' name='billinig_first_name' placeholder='John'>
              <label>Last Name:</label>
                <input type='text' name='billinig_last_name' placeholder='Smith'>
              <label>Address:</label>
                <input type='text' name='billinig_address' placeholder='123 Ninja LN'>
              <label>Address 2:</label>
                <input type='text' name='billinig_address2' placeholder='Dojo #1337'>
              <label>City:</label>
                <input type='text' name='billinig_city' placeholder='Akatsuki'>
              <label>State:</label>
                <input type='text' name='billinig_state' placeholder='WA'>
              <label>Zipcode:</label>
                <input type='text' name='billinig_zipcode' placeholder='31337'>
              <button id="button" type="submit" class="btn btn-primary">Pay</button>
            </form>
      </div>
   </div>
</div>

  <!-- Scripts
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script type="text/javascript" src="/assets/js/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/assets/js/script.js"></script>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
