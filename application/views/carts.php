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
              <td id="shop-cart">ShoppingCart</td>
              <td id="cart-quantity">(5)</td>
            </tr>
          </table>
        </div>

        <table class="table table-bordered">
        <div class="panel panel-default">
          <tr>
            <th>Item</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
          </tr>
        </div>

        <tbody>
          <tr>
            <td>Black Belt for Staff</td>
            <td>$19.99</td>
            <td>1 
              <a href="/users/show/edit/[user_id]">updpate</a>  

              <button class="btn btn-danger btn-xl" data-title="Delete" data-toggle="modal" data-target="#delete">
                <span class="glyphicon glyphicon-trash"></span>
              </button>
            </td>

            <td>$19.99</td>
          </tr>
        </tbody> 

        
    




      
        <h4>Shipping Information</h4>
        <form action="/" method="post">
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
              <td><h5class="form-descriptions" >Zipcode:</h5></td>
              <td><input type="text" name="zipcode" class="form-area"></td>
            </tr>
          </table>
       

          <br>


          <h4>Billing Information</h4>
          <table id="billing">
            <tr>
              <label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox1" value="option1"> Same as Shipping</label>
            </tr>

            <tr>
              <td><h5 class="form-descriptions">First Name:</h5></td>
              <td><input type="text" name="first_name" class="form-area2"></td>
            </tr>

            <tr>
              <td><h5 class="form-descriptions">Last Name:</h5></td>
              <td><input type="text" name="last_name" class="form-area2"></td>
            </tr>

            <tr>
              <td><h5 class="form-descriptions">Address:</h5></td>
              <td><input type="text" name="address" class="form-area2"></td>
            </tr>

            <tr>
              <td><h5 class="form-descriptions">Address 2:</h5></td>
              <td><input type="text" name="address_2" class="form-area2"></td>
            </tr>

            <tr>
              <td><h5 class="form-descriptions">City:</h5></td>
              <td><input type="text" name="city" class="form-area2"></td>
            </tr>

            <tr>
              <td><h5 class="form-descriptions">State:</h5></td>
              <td><input type="text" name="state" class="form-area2"></td>
            </tr>

            <tr>
              <td><h5 class="form-descriptions">Zipcode:</h5></td>
              <td><input type="text" name="zipcode" class="form-area2"></td>
            </tr>

            <tr>
              <td><h5 class="form-descriptions">Card:</h5></td>
              <td><input type="text" name="card" class="form-area2"></td>
            </tr>

            <tr>
              <td><h5 class="form-descriptions">Security Code:</h5></td>
              <td><input type="text" name="security_code" class="form-area2"></td>
            </tr>

            <tr>
              <td><h5 class="form-descriptions">Expiration:</h5></td>
              <td><input type="text" name="expiration" class="form-area2"></td>
              <td>/</td>
              <td><input type="text" name="expiration" class="form-area2"></td>
            </tr>

          </table>
          <button id="button2">Pay</button>
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
