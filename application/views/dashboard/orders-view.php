
  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="container">
    <div class="row">
      <div class="col-md-9">

        <!-- product search form -->
        <form class="navbar-form navbar-left" role="search" method="post" action="">
          <div class="form-group">
            <span class="glyphicon glyphicon-search icon-in-bar" aria-hidden="true"></span>
            <input type="text" class="form-control search-with-icon" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>

      </div>
      <div class="col-md-3">

        <!-- filter menu -->
        <form id="orders-filter-menu" method="post" action="">
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

            <tr>
              <td>X</td>
              <td>X</td>
              <td>X</td>
              <td>X</td>
              <td>X</td>
              <td>X</td>
            </tr>

          </tbody>
        </table>

      </div>
    </div>
    <div class="row">
      <div class="col-md-12 centered">

        <!-- pagination -->
        <nav id="orders-pagination">
          <ul class="pagination">
            <li>
              <a href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li>
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
  <script type="text/javascript" src="/assets/js/script.js"></script>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
