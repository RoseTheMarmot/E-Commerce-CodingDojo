<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Cart</title>
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
      <div class="one-half column">

        <div id="header">
              <h1 id="title">Dojo eCommerce</h1>
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



<!--         <table>
 -->     <!--      <tr>
            <td id="total"><p>Total:</p></td>
            <td id="amount"><p>$49.96</p></td>
          </tr> -->
<!-- 
          <tr>
            <td id="go-back"><a href="#">Go Back</a></td>
            <td id="continue-shop"><a href="#">Continue Shopping</a></td>
          </tr>
        </table>
     -->
    
        <h4>Shipping Information</h4>
        <form action="/pay" method="post">
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
       
 <!--          <br>

          <h4>Billing Information</h4>
          <table id="billing">
            <tr>
              <label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox1" value="option1"> Same as Shipping</label>
            </tr>

            <tr>
              <td><h5 class="form-descriptions">First Name:</h5></td>
              <td><input type="text" name="billing_first_name" class="form-area2"></td>
            </tr>

            <tr>
              <td><h5 class="form-descriptions">Last Name:</h5></td>
              <td><input type="text" name="billing_last_name" class="form-area2"></td>
            </tr>

            <tr>
              <td><h5 class="form-descriptions">Address:</h5></td>
              <td><input type="text" name="billing_address" class="form-area2"></td>
            </tr>

            <tr>
              <td><h5 class="form-descriptions">Address 2:</h5></td>
              <td><input type="text" name="billing_address_2" class="form-area2"></td>
            </tr>

            <tr>
              <td><h5 class="form-descriptions">City:</h5></td>
              <td><input type="text" name="billing_city" class="form-area2"></td>
            </tr>

            <tr>
              <td><h5 class="form-descriptions">State:</h5></td>
              <td><input type="text" name="billing_state" class="form-area2"></td>
            </tr>

            <tr>
              <td><h5 class="form-descriptions">Zipcode:</h5></td>
              <td><input type="text" name="billing_zipcode" class="form-area2"></td>
            </tr> -->

<!--             <tr>
              <td><h5 class="form-descriptions">Card:</h5></td>
              <td><input type="text" name="billing_card" class="form-area2"></td>
            </tr>

            <tr>
              <td><h5 class="form-descriptions">Security Code:</h5></td>
              <td><input type="text" name="billing_security_code" class="form-area2"></td>
            </tr>

            <tr>
              <td><h5 class="form-descriptions">Expiration:</h5></td>
              <td class="exp"><input type="text" name="billing_expiration_month" class="form-area3 col-md-4 col-xs-4" placeholder="(mm)"></td>
              <td class="exp"><p id='slash'>/</p></td>
              <td class="exp"><input type="text" name="billing_expiration_year" class="form-area3 col-md-4 col-xs-4" placeholder="(year)"></td>
            </tr> -->




          </table>
          <button id="button2" type="submit" class="btn btn-primary">Pay</button>
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
