
  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="container lightbox-item">
    <div class="row">
      <div class="col-md-12">
        <h3>Edit Product - ID <?=$product['id']?></h3>
        <form method="post" action="/dashboard/edit_product_process/<?=$product['id']?>" enctype="multipart/form-data">
          
          <div class="row">
            <div class="col-md-5">
              <label>Name</label>
            </div>
            <div class="col-md-7">
              <input type="text" name="name" value="<?=$product['name']?>">
            </div>
          </div>

          <div class="row">
            <div class="col-md-5">
               <label>Description</label>
            </div>
            <div class="col-md-7">
              <textarea name="description"><?=$product['description']?></textarea>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-5">
               <label>Categories</label>
            </div>
            <div class="col-md-7">
              <select class="form-control" name="category">
                <?php foreach($categories as $category){
                  if(strcmp($category['category'], $product['category'])===0){?>
                    <option selected="selected"><?=$category['category']?></option>
                    <?php
                  }else{?>
                    <option><?=$category['category']?></option>
                    <?php
                  }
                }?>
                
              </select>
            </div>
          </div>
         
          <div class="row">
            <div class="col-md-5">
               <label>or add new category:</label>
            </div>
            <div class="col-md-7">
              <input type="text" name="new-category">
            </div>
          </div>

          <div class="row">
            <div class="col-md-5">
               <label>Images</label>
            </div>
            <div class="col-md-7">
              <!--<button class="btn btn-default">Upload</button>-->
              <input type="file" name="image">
              <input type="hidden" name="image-title" value="<?=$product['image']?>">
              <img src="/assets/images/<?=$product['image']?>" alt="<?=$product['image']?>">
            </div>
          </div>
        </form>
          
        <div class="row buttons">
          <div class="col-md-6">
          </div>
          <div class="col-md-6">
            <button class="btn btn-default" id="cancel-edit-product">Cancel</button>
            <button class="btn btn-success" id="preview-edit-product">Preview</button>
            <button class="btn btn-primary" id="update-edit-product">Update</button>
          </div>
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
