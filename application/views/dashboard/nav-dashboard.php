<?php
  $orders =  "/dashboard/orders";
  $products = "/dashboard/products";
?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?=$orders?>">Dashboard</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php
          if(!empty($current)){
            if(strcmp($current, 'orders') === 0){?>
              <li><a class="active" href="<?=$orders?>">  Orders</a>  </li>
              <li><a                href="<?=$products?>">Products</a></li>
              <?php
            }else{?>
              <li><a                href="<?=$orders?>">  Orders</a>  </li>
              <li><a class="active" href="<?=$products?>">Products</a></li>
              <?php
            }
          }else{?>
            <li><a                  href="<?=$orders?>">  Orders</a>  </li>
            <li><a                  href="<?=$products?>">Products</a></li>
            <?php
          }
        ?>
      </ul> 
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/dashboard/logoff">log off</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

