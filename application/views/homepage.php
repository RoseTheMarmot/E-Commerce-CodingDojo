<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Dojo eCommerce</title>
  <meta name="description" content="A great e-commerce website">
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
  <link rel="stylesheet" href="/assets/css/homepage_style.css">
  <link rel="stylesheet" href="/assets/css/header_style.css">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="./assets/images/favicon.png">

</head>
<body>
  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div id="container">
   <!-- START OF HEADER
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <div id="header" class='col-md-12'>
      <h1>Dojo eCommerce</h1>
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

 <!-- END OF HEADER // START OF LEFT SIDE MENU
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

    <div id='menu' class='col-md-4'>

 <!-- SEARCH BAR
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

      <div class='row col-md-9'>
        <input type="text" class="form-control" placeholder="Search">
      </div>

   <!-- SEARCH BUTTON
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

      <div class='row col-md-4'>
        <button type='button' class='btn btn-info'>
          <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search
        </button>
      </div>

 <!-- CATERGORY SEARCH AREA
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

      <ul><p>Categories</p>
<?php   foreach($categories as $category)
        { ?>
        <li><a href="/view/<?=$category['category']?>" class='merch_link'><?=$category['category']?></a></li>
<?php   }; ?>
        <li><a href="/">Show All</a></li>
      </ul>
    </div>

     <!-- END OF LEFT SIDE MENU // START OF RIGHT SIDE BODY
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

    <div id='body' class='col-md-7'>
      <h1>All Products (page nth)</h1>   <!-- NEED TO DYNAMICALLY CHANGE PAGE COUNT -->
      <nav class='pull-right'>
        <ul class="pagination">
            <li>
              <a href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
   <!-- NEED TO MAKE THIS PAGINATION DYNAMIC
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
            <li><a href="#">First</a></li>
            <li><a href="#">Prev</a></li>
            <li><a href="#">nth</a></li>
            <li><a href="#">Next</a></li>
            <li><a href="#">Last</a></li>
            <li>
              <a href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
          </li>
        </ul>
      </nav>

 <!-- NEED TO MAKE THIS DROP DOWN DYNAMIC
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
      <div class="dropdown">
        <button class="btn btn-default dropdown-toggle pull-right" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">Search By<span class="caret"></span></button>
        <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu1">
          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Price Low-to-high</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Price High-to-low</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">A-to-Z</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Z-to-A</a></li>
        </ul>
      </div>
      
      <div id='content' class='col-md-12'>
              

<!-- PHP CODE TO GENERATE MERCH DIVS -->


<?php
  foreach($results as $result)
  { ?>   <a href="view/merch/<?=$result['id']?>" class="<?=$result['category']?>">
          <div class='merch col-md-3'>
            <p><?=$result['name']?></p>
            <img src="/assets/images/<?=$result['image']?>" alt="..." class="img-thumbnail">
            <p><?=$result['price']?></p>
          </div>
        </a>
<?php  }
?>  


<!-- END OF PHP CODE TO GENERATE MERCH DIVS -->

      </div>

      <div id='footer'>
        <nav>
          <ul class="pagination pagination-sm">
            <li>
              <a href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
 <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">6</a></li>
            <li><a href="#">7</a></li>
            <li><a href="#">8</a></li>
            <li><a href="#">9</a></li>
            <li><a href="#">10</a></li>
            <li>
              <a href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>

    </div>  <!-- BODY DIV ENDS -->

  </div> <!-- DIV CONTAINER ENDS -->

  <!-- Scripts
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script type="text/javascript" src="/assets/js/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/assets/js/script.js"></script>
  <script type="text/javascript" src="/assets/js/homepage_script.js"></script>
  
<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>