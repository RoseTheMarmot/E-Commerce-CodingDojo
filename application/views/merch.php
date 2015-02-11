<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Ninja Shirt</title>
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
  <link rel="stylesheet" href="/assets/css/merch_style.css">
  <link rel="stylesheet" href="/assets/css/header_style.css">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="./assets/images/favicon.png">

</head>
<body>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div id="container">
    <div id="header" class='col-md-12'>
      <a href="/">
        <h1>Dojo eCommerce</h1>
      </a>
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


      
<!--       LEFT SIDE PREVIEW ALONG WITH 'BACK BUTTON' -->

  
    <div class='row'>
      <div id='preview' class='col-md-5'>
        <a href="/">
          <button type='button' class='btn btn-info btn-xs'>
            <span class="glyphicon glyphicon-menu-left"></span><span class="glyphicon glyphicon-menu-left"></span> Go Back</button>
        </a>

        <h1><?= $results['name'];?></h1>
        <img src="/assets/images/<?=$results['image'];?>" class="img-thumbnail">


        

      </div>

      <div class='col-md-1'>    <!-- SPACER BETWEEN PREVIEW AND DESCRIPTION -->
      </div>

      
<!--           RIGHT SIDE DESCRIPTION -->
       
      <div id='description' class='col-md-5'>
        <h4>About this product:</h4>
        <p><?= $results['description'];?></p>
        <?php echo "Currently have " . "<b>" . $results['inventory'] . "</b>" . " in stock."; ?>
      </div>
    </div>      <!-- END OF THE TOP HALF OF THE PAGE FOR PREVIEW AND DESCRIPTION -->

<!-- START OF THE BOTTOM HALF WITH THE QUANTITY / BUY / AND SIMILAR ITEMS -->

  <div id='controls' class='col-md-12'>
    
    <button type='button' class='btn btn-info pull-right'>Buy</button>
    <div class="dropdown">
      <button class="btn btn-default dropdown-toggle pull-right" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
        Quantity
        <span class="caret"></span>
      </button>
      <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu1">
<?php if( $results['inventory'] > 5)
        {
        for($i = 1; $i < 6; $i++)
          { ?>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><?=$i?></a></li>
<?php     }
        }
        elseif( $results['inventory'] > 0)
        {
          for($i = 1; $i <= $results['inventory']; $i++)
            { ?>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><?=$i?></a></li>
<?php       }
        }
        else
        { ?>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Sold Out</a></li>
<?php   } ?>
      </ul>
    </div>
  </div>

  <div id='footer'>
    <h4>Similar Items:</h4>
<?php foreach($items as $item)
      { ?>
        <a href="/view/merch/<?=$item['id']?>" class="<?=$item['category'];?>">
          <div class='merch col-md-2'>
            <p><?=$item['name'];?></p>
            <img src="/assets/images/<?=$item['image'];?>" alt="..." class="img-thumbnail">
            <p><?=$item['price'];?></p>
          </div>
         </a>
<?php }
?> 

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
