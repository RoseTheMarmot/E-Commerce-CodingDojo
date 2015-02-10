
  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="container">
    <div class="row">
      <div class="col-md-9">

        <!-- product search form -->
        <form id="products-search-form" class="navbar-form navbar-left" role="search" method="post" action="get_products">
          <div class="form-group">
            <span class="glyphicon glyphicon-search icon-in-bar" aria-hidden="true"></span>
            <input type="text" name="filter" class="form-control search-with-icon" placeholder="Search">
          </div>
        </form>

      </div>
      <div class="col-md-3">
        <a href="/"><button id="add-product-button" class="btn btn-primary">Add new product</button></a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">

        <!-- products table -->
        <table id="products-table" class="table-bordered bordered">
          <thead>
            <tr>
              <th>Picture</th>
              <th>ID</th>
              <th>Name</th>
              <th>Inventory Count</th>
              <th>Quantity sold</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <!-- products -->
          </tbody>
        </table>

      </div>
    </div>
    <div class="row">
      <div class="col-md-12 centered">

        <!-- pagination -->
        <nav id="products-pagination">
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
  <script type="text/javascript" src="/assets/js/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/assets/js/dashboard-products-script.js"></script>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
