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
  <script src="<?php echo base_url("assets/js/bootbox.js");?>"></script>


  <script>
    $(document).ready(function() {
     
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
            data: { del_id:id }, //<--- here should be increase
            success:function(response){
              
     }
  });
          }
        });

    });

      });

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
      <li><a href="<?php echo site_url("products/product_list"); ?>" <?php if($selected_page=="products"){ echo "class='active'";} ?>>Product List</a></li>
     </li>
     <li <?php if($selected_page=="login"){ echo "class='active'";} ?>><a href="<?php echo site_url("user/logout"); ?>">Logout</a></li>
     <?php }else{ ?>

      <li <?php if($selected_page=="login"){ echo "class='active'";} ?>><a href="<?php echo site_url("user/login"); ?>">Login</a></li>
      <li <?php if($selected_page=="register"){ echo "class='active'";} ?>><a href="<?php echo site_url("user/register"); ?>">Register</a></li>
    <?php } ?>

      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      <li <?php if($selected_page=="aboutus"){ echo "class='active'";} ?>><a href="<?php echo site_url("pages/aboutus"); ?>">About us</a></li>

     
    </ul>
   

    <ul class="nav navbar-nav navbar-right">
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
	
 
 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
  </body>
</html>