<div class="container">
<div class="row">

<?php
$i=0;
	if(!empty($product_result))
	{
foreach ($product_result->result() as $row)
{
	
    ?>

<div class="col-lg-3"  id="td_<?php echo $row->product_id; ?>">   		
<img src="<?php echo base_url("assets/uploads")."/".$row->img_name; ?>" alt="<?php  echo $row->product_name ;?>" style="height:263px"class="img-thumbnail">
<br/>
<div  class="row">
	<div class="col-lg-12">
			<h4><center><?php  echo $row->product_name ;?></center></h4>
	</div>
</div>
<div class="row">
	<div class="col-lg-4 col-lg-offset-3">
		<h4> &#36; <?php echo $row->price; ?></h4>
	</div>
	<div class="col-lg-3">
		<input type="number" min="0" value="" style="width:50px;" id="item_<?php echo $row->product_id; ?>" class="form-control" />
	</div>
</div>
<div class="row">
	<div class="col-lg-4 col-lg-offset-3">
			<a  id="edit_product" data-id="<?php echo $row->product_id; ?>" class="btn btn-xs btn-primary add_to_cart">
										Add to Cart
		</a>
	</div>
</div>

</div><!-- col-lg-3 -->

<?php 


}/* While Loop*/

}else
{
	echo "<div class='col-lg-12'><center> No Record Found</center></div>";
}

  ?>		

</div>	

<div class="row">
	<div class="col-lg-12"><ul class="pagination"><?php echo $p_link; ?></ul></div>
</div>



							
		
</div><!-- container -->
