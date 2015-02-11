
  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="container lightbox-item">
    <div class="row">
      <div class="col-md-12">
        <h3>Add Product</h3>
        <form method="post" action="/dashboard/add_product_process">
          
          <div class="row">
            <div class="col-md-5">
              <label>Name</label>
            </div>
            <div class="col-md-7">
              <input type="text" name="name">
            </div>
          </div>

          <div class="row">
            <div class="col-md-5">
               <label>Description</label>
            </div>
            <div class="col-md-7">
              <textarea name="description"></textarea>
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
            </div>
          </div>
        </form>
          
        <div class="row buttons">
          <div class="col-md-6">
          </div>
          <div class="col-md-6">
            <button class="btn btn-default" id="cancel-edit-product">Cancel</button>
            <button class="btn btn-success" id="preview-edit-product">Preview</button>
            <button class="btn btn-primary" id="update-edit-product">Add</button>
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
