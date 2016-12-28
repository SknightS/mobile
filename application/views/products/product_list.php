<div class="row">
<div class="col-lg-6 col-lg-offset-3">   

					
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Product Name</th>
								<th>Price</th>
								<th>Qty</th>
								<th>Image</th>
								<th class="td-actions"></th>
							</tr>
						</thead>
						<tbody>
							
							<?php
	if(!empty($product_result))
	{
foreach ($product_result->result() as $row)
{
    ?>



							<tr id="tr_<?php echo $row->product_id; ?>">
								<td><?php  echo $row->product_name ;?></td>
								<td><?php echo $row->price; ?></td>
								<td><?php echo $row->qty; ?></td>
								<td><img  src="<?php echo base_url("assets/uploads")."/".$row->img_name; ?>" width="100px" height="100px" ></td>
								<td class="td-actions">
									<a  id="edit_product" href="<?php echo site_url("products/edit_product/".$row->product_id) ?>" class="btn btn-xs btn-primary edit_product">
										Edit
									</a>
									<a  id="edit_product" data-id="<?php echo $row->product_id; ?>" class="btn btn-xs btn-danger delete_product">
										Delete
									</a>


								</td>
							</tr>

<?php }/* While Loop*/
}else
{
	echo "<tr><td colspan='5'> No Record Found</td></tr>";
}

  ?>							
<tr><td colspan="5"><ul class="pagination"><?php echo $p_link; ?></ul></td></tr>
							</tbody>
						</table>
</div>			
</div>