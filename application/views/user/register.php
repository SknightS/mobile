<div class="container">
    <div class="row">


<div class="col-md-3"></div>   
<div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"></h3>
            </div>
            <div class="panel-body">
            


       
            <legend><i class="glyphicon glyphicon-globe"></i> Sign up!</legend>
            <form action="#" method="post" class="form" role="form">
            <div class="row">
                <div class="col-xs-6 col-md-6">
                    <input class="form-control" value="<?php echo  set_value('firstname'); ?>" name="firstname" placeholder="First Name" type="text"
                        required autofocus />
                </div>
                <div class="col-xs-6 col-md-6">
                    <input class="form-control" value="<?php  echo set_value('lastname'); ?>" name="lastname" placeholder="Last Name" type="text" required />
                </div>
            </div>
            <input class="form-control" name="youremail" value="<?php  echo set_value('youremail'); ?>" placeholder="Your Email" type="email" />
            <input class="form-control" name="reenteremail" value="<?php  echo  set_value('reenteremail'); ?>" placeholder="Re-enter Email" type="email" />
            <input class="form-control" name="password" placeholder="New Password" type="password" />
           
            
            <br />
            <br />
            <button class="btn btn-lg btn-primary btn-block" type="submit">
                Sign up</button>
                <br/>
                <br/>
               
               <?php  echo validation_errors();  ?>
           
            </form>
        
</div><!-- panel body -->
</div> <!-- panel over -->
</div> <!-- col-6 -->




    </div>
</div>