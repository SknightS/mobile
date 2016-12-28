<div class="container">
<div class="row">
<div class="col-lg-6 col-lg-offset-3">   

<table class="table table-striped table-bordered">
<tr><th colspan="5">Cart</th></tr>
<tr>
	<th></th>
  <th>QTY</th>
  <th>Item Description</th>
  <th style="text-align:right">Item Price</th>
  <th style="text-align:right">Sub-Total</th>
</tr>

<?php $i = 1; ?>

<?php if($this->cart->total()>0){  foreach ($this->cart->contents() as $items): ?>

	

	<tr>
		<td>
			<button class="btn btn-danger " onclick="remove_cart('<?=$items['rowid'];?>')" >X</button>
			<button class="btn btn-success " onclick="update_cart('<?=$items['rowid'];?>')" >O</button>
		</td>
	  <td><?php echo form_input(array('name' => $items['rowid']."_qty",'id' => $items['rowid']."_qty", 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
	  <td>
		<?php echo $items['name']; ?>

			<?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

				<p>
					<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

						<strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

					<?php endforeach; ?>
				</p>

			<?php endif; ?>

	  </td>
	  <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
	  <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
	</tr>

<?php $i++; ?>

<?php endforeach; ?>
<?php
$paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr'; // Test Paypal API URL
$paypal_id='pureheartednils-facilitator@gmail.com'; // Business email ID
?>
<tr>
  <td colspan="3"> </td>
  <td class="right"><strong>Total</strong></td>
  <td class="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
</tr>
<tr><form action="<?php echo $paypal_url; ?>" method="post" name="frmPayPal1">
		<td colspan="5" align="center"><button trype="submit" 	 class="btn btn-primary">Checkout</button> </td>	
</td>

 
    <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="item_name" value="Mera mobile">
    <input type="hidden" name="item_number" value="1">
    <input type="hidden" name="credits" value="510">
    <input type="hidden" name="userid" value="1">
    <input type="hidden" name="qty" value="10">
    <input type="hidden" name="amount" value="<?php echo $this->cart->format_number($this->cart->total()); ?>">
    <input type="hidden" name="cpp_header_image" value="http://smart-webtech.com/wp-content/uploads/2013/05/logo3-300x128.png">
    <input type="hidden" name="no_shipping" value="1">
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="handling" value="0">
    <input type="hidden" name="cancel_return" value="<?php echo site_url('products/payment_cancel'); ?>">
    <input type="hidden" name="return" value="<?php echo site_url('products/payment_success'); ?>">
   
    </form><?php  }else{?><tr><td colspan="5" align='center'>Cart is empty</td></tr>
    <tr><td colspan="5" align='center'><a type="button" href="<?php echo site_url('products/store_list'); ?>"class="btn btn-primary">Back to store</a></td></tr><?php } ?>
</table>
</div>			
</div><!-- row -->
</div><!--  container-->