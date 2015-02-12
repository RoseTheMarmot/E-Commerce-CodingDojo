<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>carts</title>
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
              <td><a href="#">Shopping Cart (<?= $this->session->userdata('cart_qty')?>) </a>
            </td>
          </table>
        </div>

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
              <td id="qty">
                <form action="/carts" method="post">
                  <input type="number" name="qty" value="1">
                  <input id="update" type="submit" value="update">  
                  <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete">
                  <span class="glyphicon glyphicon-trash"></span></button>
                </form>
              </td>

              <td>$19.99</td>
            </tr>
          </tbody> 
        </table>

        <table>
          <tr>
            <td><p id='total'>Order Total:<!--  $<?=$grand_total?> --></p></td>
          </tr>
          <tr>
            <td><a href="/products/show"><button type="button" class="btn btn-warning navbar-btn red-btn">Go Back</button></a></td>
          </tr>
            <br>
          <tr>
            <td><a href="/products/category"><button type="button" class="btn btn-success navbar-btn green-btn">Continue Shopping</button></a></td>
          </tr>  
        </table>

        <h4>Shipping Information</h4>
        <form action="/success" method="post">
          <table id="shipping">
            <tr>
              <td><h5 class="form-descriptions">First Name:</h5></td>
              <td><input type="text" name="first_name" class="form-area"></td>
            </tr>

            <tr>
              <td><h5 class="form-descriptions">Last Name:</h5></td>
              <td><input type="text" name="last_name" class="form-area"></td>
            </tr>

            <tr>
              <td><h5 class="form-descriptions">Address:</h5></td>
              <td><input type="text" name="address" class="form-area"></td>
            </tr>

            <tr>
              <td><h5 class="form-descriptions">Address 2:</h5></td>
              <td><input type="text" name="address_2" class="form-area"></td>
            </tr>

            <tr>
              <td><h5 class="form-descriptions">City:</h5></td>
              <td><input type="text" name="city" class="form-area"></td>
            </tr>

            <tr>
              <td><h5 class="form-descriptions">State:</h5></td>
              <td><input type="text" name="state" class="form-area"></td>
            </tr>

            <tr>
              <td><h5class="form-descriptions">Zipcode:</h5></td>
              <td><input type="text" name="zipcode" class="form-area"></td>
            </tr>
          </table>
          <button id="button2" type="submit" class="btn btn-primary">Submit</button>
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
