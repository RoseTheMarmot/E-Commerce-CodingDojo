
  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="container lightbox-item">
    <div class="row">
      <div class="col-md-12">
        <h3>Edit Product - ID <?=$product['id']?></h3>
        <form method="post" action="/dashboard/update_product/<?=$product['id']?>">
          
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
              <select class="form-control" name="categories">
                <option>option</option>
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
              <button class="btn btn-default">Upload</button>
              <img>
            </div>
          </div>
          
          <div class="row buttons">
            <div class="col-md-6">
            </div>
            <div class="col-md-6">
              <button class="btn btn-default">Cancel</button>
              <button class="btn btn-success">Preview</button>
              <button class="btn btn-primary">Update</button>
            </div>
          </div>
             
      </form>
    </div>
  </div>

  <!-- Scripts
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script type="text/javascript" src="/assets/js/dashboard-orders-script.js"></script>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
