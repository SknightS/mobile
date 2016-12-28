<?php
$r=$product_data->result();
$row=$r[0];

?>
<div class="row">
<div class="col-lg-6  col-lg-offset-3">
<div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $row->product_name; ?></h3>
            </div>
            <div class="panel-body">
              <?php 
              if(isset($err_msg)){ echo $err_msg;}
               form_open(); 
              echo validation_errors();  ?>
             <form class="form-horizontal" method="POST" action="<?php echo site_url("products/edit_product/".$row->product_id); ?>" role="form">
  <div class="form-group">
    <label for="product_name" class="col-sm-3 control-label">Poduct Name</label>
    <div class="col-sm-9">
      <input type="text" class="form-control"  name="product_name" id="product_name" value="<?php echo $row->product_name; ?>" placeholder="Name">
    </div>
  </div>
  <div class="form-group">
    <label for="price" class="col-sm-3 control-label">Price</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="price"  name="price" value="<?php echo  $row->price; ?>" placeholder="Price">
    </div>
  </div>
  <div class="form-group">
    <label for="qty" class="col-sm-3 control-label">Qty</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="qty"  name="qty" value="<?php echo $row->qty; ?>" placeholder="Quantity">
    </div>
  </div>
  <input type="hidden" id="product_id" name="product_id" value="<?php echo $row->product_id; ?>" />
 
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit" class="btn btn-success">Update</button>
    </div>
  </div>
</form>

            </div><!-- panel body-->
          </div><!-- end panel -->

</div><!-- col-6-->
</div><!-- row-->



<div class="row">
<div class="col-lg-6  col-lg-offset-3">
<div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Image</h3>
            </div>
            <div class="panel-body">
               <form class="form-horizontal">
                 <div class="form-group">
              <center id="image_container">
            <img src="<?php echo base_url('assets/uploads')."/".$row->img_name;  ?>" width="200px" height="200px" classs="img-responsive" />
              </center >
             </div>
                
                <div class="form-group">
                    <label for="qty" class="col-sm-3 control-label">Image</label>
                    <div class="col-sm-9">
                       <input type="file" id="productimage" name="productimage" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-3 col-sm-offset-5">
                     <button type="button" id="img_upload_button" class="btn btn-info upload_image">Upload</button>
                    </div>
                </div>
                <div class="form-group" >
                  <div class="col-sm-5" id="status_image">
                  </div>
                  <div class="col-sm-7">
                      <div class="progress">
  <div class="progress-bar" role="progressbar" id="progressBar_image" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
    
  </div>
</div>
                  </div>
                </div>
                </form>
              
            </div><!-- panel body-->
          </div><!-- end panel -->

</div><!-- col-6-->
</div><!-- row-->


<?php form_close(); ?>



