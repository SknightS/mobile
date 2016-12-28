<div class="container">
<div class="row">
<div class="col-lg-6 col-lg-offset-3">   
<?php
$item_no            = $_REQUEST['item_number'];
$item_transaction   = $_REQUEST['tx']; 
$item_price         = $_REQUEST['amt']; 
$item_currency      = $_REQUEST['cc']; 
$this->cart->destroy();
?>
<table class="table table-striped table-bordered">
<tr><th colspan="2"> <div class="alert alert-success">Payment done successfully<br/>Thanks for Shopping..</div></th></tr>
<tr><td>Item Number</td><td><?php echo $item_no; ?></td></tr>
<tr><td>Transaction id</td><td><?php echo $item_transaction; ?></td></tr>
<tr><td>Amout </td><td><?php echo $item_price; ?></td></tr>
</table>
</div>			
</div><!-- row -->
</div><!--  container-->