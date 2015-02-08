
  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="container">
    <div class="row">
      <div class="col-md-9">

        <!-- orders search form -->
        <form id="orders-search-form" class="navbar-form navbar-left" role="search" method="post" action="">
          <div class="form-group">
            <span class="glyphicon glyphicon-search icon-in-bar" aria-hidden="true"></span>
            <input type="text" class="form-control search-with-icon" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>

      </div>
      <div class="col-md-3">

        <!-- filter menu -->
        <form id="orders-filter-form" method="post" action="">
          <select class="form-control" name="filter">
            <option>Show All</option>
            <option>Order in</option>
            <option>Process</option>
            <option>Shipped</option>
          </select>
        </form>

      </div>
    </div>
    <div class="row">
      <div class="col-md-12">

        <!-- orders table -->
        <table id="orders-table" class="table-bordered">
          <thead>
            <tr>
              <th>Order ID</th>
              <th>Name</th>
              <th>Date</th>
              <th>Billing Address</th>
              <th>Total</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>

            <?php 
            if(!empty($orders)){
              for($i = 0; $i < count($orders); $i++){?>
                <tr>
                  <td><?=$orders[$i]['id']?></td>
                  <td><?=$orders[$i]['first_name']." ".$orders[$i]['last_name']?></td>
                  <td><?=$orders[$i]['created_at']?></td>
                  <td><?=$orders[$i]['address']." ".$orders[$i]['address2']." ".$orders[$i]['city'].", ".$orders[$i]['state']?></td>
                  <td><?="$".$orders[$i]['total']?></td>
                  <td><?=$orders[$i]['status']?></td>
                </tr>
                <?php
              }
            }?>

          </tbody>
        </table>

      </div>
    </div>
    <div class="row">
      <div class="col-md-12 centered">

        <!-- pagination -->
        <nav id="orders-pagination">
          <ul class="pagination">
            <li class="previous">
              <a href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>

            <li class="page"><a href="#">1</a></li>

            <li class="next">
              <a href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
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
