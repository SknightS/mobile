<div class="row">
<div class="col-lg-6  col-lg-offset-3">
<div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Add Product</h3>
            </div>
            <div class="panel-body">
              <?php 
              if(isset($err_msg)){ echo $err_msg;}
               form_open(); 
              echo validation_errors();  ?>
             <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo site_url("products/add_product"); ?>" role="form">
  <div class="form-group">
    <label for="product_name" class="col-sm-3 control-label">Poduct Name</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Name">
    </div>
  </div>
  <div class="form-group">
    <label for="price" class="col-sm-3 control-label">Price</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="price" name="price" placeholder="Price">
    </div>
  </div>
  <div class="form-group">
    <label for="qty" class="col-sm-3 control-label">Qty</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="qty" name="qty" placeholder="Quantity">
    </div>
  </div>


  <div class="form-group">
    <label for="qty" class="col-sm-3 control-label">Image</label>
    <div class="col-sm-9">
        <input type="file" name="productimage" size="20" />
    </div>
  </div>


  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit" class="btn btn-success">Save</button>
    </div>
  </div>
</form>
<?php form_close(); ?>
            </div><!-- panel body-->
          </div><!-- end panel -->

</div><!-- col-6-->
</div><!-- row-->











