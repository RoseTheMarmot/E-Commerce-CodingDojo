
  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="container">
    <div class="row">
      
      <div class="col-md-4">
        <div id="address-details-div" class="outlined">
          <p>Order ID: <?=$order['id']?></p>
          <p>
            Customer shipping info:
            <table>
              <tr>
                <th>name:</th>
                <td><?=$order['first_name']." ".$order['last_name']?></td>
              </tr>
              <tr>
                <th>address:</th>
                <td><?=$order['shipping_address']." ".$order['shipping_address2']?></td>
              </tr>
              <tr>
                <th>city:</th>
                <td><?=$order['shipping_city']?></td>
              </tr>
              <tr>
                <th>state:</th>
                <td><?=$order['shipping_state']?></td>
              </tr>
              <tr>
                <th>zip:</th>
                <td><?=$order['shipping_zipcode']?></td>
              </tr>
            </table>
          </p>
          <p>
            Customer billing info:
            <table>
              <tr>
                <th>name:</th>
                <td><?=$order['first_name']." ".$order['last_name']?></td>
              </tr>
              <tr>
                <th>address:</th>
                <td><?=$order['address']." ".$order['address2']?></td>
              </tr>
              <tr>
                <th>city:</th>
                <td><?=$order['city']?></td>
              </tr>
              <tr>
                <th>state:</th>
                <td><?=$order['state']?></td>
              </tr>
              <tr>
                <th>zip:</th>
                <td><?=$order['zipcode']?></td>
              </tr>
            </table>
          </p>
        </div>
      </div>
      <div class="col-md-8">
          
          <div class="row">
            <div class="col-md-12">
              <table id="order-details-table" class="table-bordered bordered">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  foreach($items as $item){ ?>
                    <tr>
                      <td><?=$item['id']?></td>
                      <td><?=$item['name']?></td>
                      <td>$<?=$item['price']?></td>
                      <td><?=$item['quantity']?></td>
                      <td><?=$item['total']?></td>
                    </tr>
                    <?php
                  }?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <?php 
              $status = "alert-success";
              if(strcmp($order['status'], 'order in') === 0){
                $status = "alert-danger";
              }elseif(strcmp($order['status'], 'process') === 0){
                $status = "alert-warning";
              }?>
              <p class="alert <?=$status?>">Status: <?=$order['status']?></p>
            </div>
            <div class="col-md-6">
              <table class="outlined">
                <tr>
                  <th>Sub total:</th>
                  <td>$<?=$order['total']?></td>
                </tr>
                <tr>
                  <th>Shipping:</th>
                  <td>$<?=$shipping?></td>
                </tr>
                <tr>
                  <th>Total Price:</th>
                  <td>$<?=$order['total']+$shipping?></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
    </div>
  </div>

  <!-- Scripts
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script type="text/javascript" src="/assets/js/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/assets/js/dashboard-orders-script.js"></script>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
