<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Order Success</title>
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
  <link rel="stylesheet" href="/assets/css/style.css">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="./assets/images/favicon.png">

</head>
<body>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="container">
    <div class="row">
      <div class="one-half column" style="margin-top: 25%">

        <div id="header">
          <table>
            <tr> 
              <td id="title">Dojo eCommerce</td>
            </td>
          </table>
        </div>

      <!-- date goes here -->
      <h2>Order Summary:</h2>

      <table class="table table-bordered">
        <div class="panel panel-default">
          <thead>
            <th>Item</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
          </thead>
        </div>

          <tbody>
            <tr>
              <td>Black Belt for Staff</td>
              <td>$19.99</td>
              <td>1</td>
              <td>$19.99</td>
            </tr>
          </tbody> 
        </table>

        <br>

        <table>
          <tr> 
            <td><h4>Order Total:</h4></td>
            <td><h4>$8</h4></td>
          </tr>
          <tr>
            <td><h4>Shipping To:</h4></td>
          </tr>
          <tr>
            <td><h4>123 abc way</h4></td>
          </tr>
          <tr>
            <td><h4>City</h4></td>
            <td><h4>State</h4></td>
            <td><h4>99999</h4></td>
          </tr>
        </table>

        <br>

        <!-- begin stripe -->
        <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
       
        <!-- punch in 4242 and it recognizes that it is a visa card. used test publishable key -->
        <form action="" method="POST">
        <div id="payment-errors"></div>
          <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="pk_test_x8tCUDyovOgeQcygQYsyZpqx" 
            data-image="/square-image.png"
            data-name="Demo Site"
            data-description="2 widgets ($20.00)"
            data-amount="2000">
          </script>
        </form>
        <!-- end stripe -->

        <h3>Thank you shopping with Dojo eCommerce. I believe you will be vey satisfied with the quality of our products. It is our superior quality that sets our company apart from the competition.</h3>

        <br>

        <h3>Thank you and please shop again.<h3> 

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
