<div class="container">
  <div class="row">

<div class="col-md-3"></div>   
<div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"></h3>
            </div>
            <div class="panel-body">
            <center>  <h3>Please Log In, or <a href="<?php echo site_url("user/register"); ?>">Sign Up</a></h3></center>
          <?php if(isset($err_msg)){ echo $err_msg;} ?>   
           <?php  echo validation_errors();  ?>         

      <form role="form" method="post"  action="<?php echo site_url("user/login"); ?>">
        <div class="form-group">
          <label for="inputUsernameEmail">Username or email</label>
          <input type="text" name="email"  <?php echo set_value('email'); ?> class="form-control" id="inputUsernameEmail">
        </div>
        <div class="form-group">
          <a class="pull-right" href="#">Forgot password?</a>
          <label for="inputPassword">Password</label>
          <input type="password" name="password" class="form-control" id="inputPassword">
        </div>
        <div class="checkbox pull-right">
          <label>
            <input type="checkbox">
            Remember me </label>
        </div>
        <button type="submit" name="login" class="btn btn btn-primary">
          Log In
        </button>
      </form>


            </div><!-- panel body ends -->
          </div>
         
</div><!-- col-4 -->



      
     

    
    
  
  </div>
</div>