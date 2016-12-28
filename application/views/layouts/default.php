<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="<?php echo base_url("assets/css/bootstrap.min.css");?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/css/style.css");?>" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url("assets/js/bootstrap.js");?>"></script>
     <script src="<?php echo base_url("assets/js/bootstrap.min.js");?>"></script>
  <script src="<?php echo base_url("assets/js/bootbox.js");?>"></script>


  <script>

function remove_cart(itemid)
{
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url("ajax_controller/remove_cart/'+itemid+'")?>',
            data: { id:itemid }, 
            success:function(response){
             $("#cart_container").html(response);
                $("#myModal_cart").modal('show');
     }
  });

}  

function update_cart(itemid)
{
  var qty= document.getElementById(itemid+"_qty").value;
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url("ajax_controller/update_cart/'+itemid+'/'+qty+'")?>',
            data: { id:itemid }, 
            success:function(response){
             $("#cart_container").html(response);
                $("#myModal_cart").modal('show');
     }
  });

}  



  var pid="";
    $(document).ready(function() {


$(".view_cart").click(function(event) {

 $.ajax({
            type: 'POST',
            url: '<?php echo site_url("ajax_controller/view_cart")?>',
            data: { id:'1' }, 
            success:function(response){
              $("#cart_container").html(response);
                $("#myModal_cart").modal('show');
     }
  });/* Aajx */



}); 


$(".add_to_cart").click(function(event) {

  var id=$(this).data('id');
  $("#item_"+id).css("border-color","");
  var qty=$("#item_"+id).val();
  if(qty=="")
  {
    $("#item_"+id).css("border-color","red");
    return;
  }
  
  $.ajax({
            type: 'POST',
            url: '<?php echo site_url("ajax_controller/add_to_cart/'+id+'/'+qty+'")?>',
            data: { id:id }, 
            success:function(response){
            $("#total_items").html(response);
            $(".view_cart").click();
     }
  });/* Aajx */

});/* Add to cart clicked */

      $('.edit_product').click(function(event) {
        //var id=$(this).data('id');
      });



      $('.delete_product').click(function(event) {
        var id=$(this).data('id');
        bootbox.confirm("Want to delete this?", function(result) {
          if(result)
          {
              $("#tr_"+id).hide('slow');
             $.ajax({
            type: 'POST',
            url: '<?php echo site_url("ajax_controller/delete_product/'+id+'")?>',
            data: { del_id:id }, 
            success:function(response){
              
     }
  });
          }
        });

    });/* Delete Product*/


$(".upload_image").click(function(event) {
  
  var file = document.getElementById("productimage").files[0];

if(file)
{  
 if(file.type=="image/jpeg" || file.type=="image/png")
 {

     pid =$("#product_id").val();
    var formdata= new FormData();
    formdata.append('pid',pid);
    formdata.append('img_upload',file);
    var ajax = new XMLHttpRequest();
  ajax.upload.addEventListener("progress", img_progressHandler, false);
  ajax.addEventListener("load", img_completeHandler, false);
  ajax.addEventListener("error", img_errorHandler, false);
  ajax.addEventListener("abort", img_abortHandler, false);
  ajax.open("POST", '<?php echo site_url("ajax_controller/image_upload")?>');
  ajax.send(formdata);

 }
 else
 {
  bootbox.alert("Please Select JPG/PNG Only");
 }/* File Type Matched*/
 
}/* If file selected */       
else
{
  alert("Please Select Image");
}
});/* Upload Image */


      });/*document */


function img_progressHandler(event){
  var percent = (event.loaded / event.total) * 100;
  document.getElementById("progressBar_image").style.width = Math.round(percent)+"%";
}
function img_completeHandler(event){
  document.getElementById("progressBar_image").style.width = "0%";
  (event.target.responseText=="1")
  
$("#image_container").html(event.target.responseText);
     /* bootbox.alert("Image Uploaed Sucessfully");
      $.ajax({
            url: '<?php echo site_url("ajax_controller/show_product_image/'+pid+'")?>',
            success:function(response){  }
  }); */
  
   
}
function img_errorHandler(event){
  bootbox.alert("Upload Failed");
}
function img_abortHandler(event){
  bootbox.alert("Upload Aborted");
}

  </script>
    
  </head>
  <body>
 
<nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Mera Mobile</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <?php 
      $r=$this->session->userdata('email');
      if($r)
      {
     ?>
     <li <?php if($selected_page=="myaccount"){ echo "class='active'";} ?>><a href="<?php echo site_url("user/myaccount"); ?>">My Account</a></li>
      
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url("products/add_product"); ?>">Add Product</a></li>
           <li class="divider"></li>
           <li><a href="<?php echo site_url("products/product_list"); ?>" <?php if($selected_page=="products"){ echo "class='active'";} ?>>Product List</a></li>
            
          </ul>
      </li>

     
     <li <?php if($selected_page=="login"){ echo "class='active'";} ?>><a href="<?php echo site_url("user/logout"); ?>">Logout</a></li>
     <?php }else{ ?>

      <li <?php if($selected_page=="login"){ echo "class='active'";} ?>><a href="<?php echo site_url("user/login"); ?>">Login</a></li>
      <li <?php if($selected_page=="register"){ echo "class='active'";} ?>><a href="<?php echo site_url("user/register"); ?>">Register</a></li>
    <?php } ?>

      <li <?php if($selected_page=="store"){ echo "class='active'";} ?>><a href="<?php echo site_url("products/store_list"); ?>">Store</a></li>

      <li <?php if($selected_page=="aboutus"){ echo "class='active'";} ?>><a href="<?php echo site_url("pages/aboutus"); ?>">About us</a></li>

     
    </ul>
   

    <ul class="nav navbar-nav navbar-right">
      <li><a href="javascript:void(0);"  class="view_cart" > <span id="total_items"><?=count($this->cart->contents()); ?></span> Items</a></li>
      <?php if($r){ ?>
      <li><a href="#"><?php  echo $this->session->userdata('email'); ?></a></li>
      <?php } ?>
      </ul>
  </div><!-- /.navbar-collapse -->
</nav>
  <!-- Collect the nav links, forms, and other content for toggling -->
  
<!----- main content area-->

<?=$data;?>
<!--main content area ends-->
  
  
 
	<div class="well">
<center>
			 www.meramobile.com
</center>
      
		</div>
	
 
<div class="modal fade" id="myModal_cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">My cart</h4>
      </div>
      <div class="modal-body" id="cart_container">
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a type="button" href="<?php echo site_url("products/checkout_cart"); ?>" class="btn btn-primary">Check out</a>
      </div>
    </div>
  </div>
</div>
 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
  </body>
</html>