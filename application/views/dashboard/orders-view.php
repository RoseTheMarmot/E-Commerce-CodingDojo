
  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="container">
    <div class="row">
      <div class="col-md-9">

        <!-- orders search form -->
        <form id="orders-search-form" class="navbar-form navbar-left" role="search" method="post" action="/dashboard/get_orders">
          <div class="form-group">
            <span class="glyphicon glyphicon-search icon-in-bar" aria-hidden="true"></span>
            <input type="text" class="form-control search-with-icon" name="filter" placeholder="Search">
          </div>
        </form>

      </div>
      <div class="col-md-3">

        <!-- filter menu -->
        <form id="orders-filter-form" method="post" action="/dashboard/get_orders_by_status">
          <select class="form-control" name="filter">
            <option value="show all">Show All</option>
            <option value="order in progress">Order in progress</option>
            <option value="shipped">Shipped</option>
          </select>
        </form>

      </div>
    </div>
    <div class="row">
      <div class="col-md-12">

        <!-- orders table -->
        <table id="orders-table" class="table-bordered bordered">
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
            <!-- orders here -->
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
              <span aria-label="Previous" aria-hidden="true">&laquo;</span>
            </li>
            <!-- page numbers here -->
            <li class="next">
              <span aria-label="Next" aria-hidden="true">&raquo;</span>
            </li>
          </ul>
        </nav>
      </div>

    </div>
  </div>

  <!-- Scripts
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script type="text/javascript" src="/assets/js/dashboard-orders-script.js"></script>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
