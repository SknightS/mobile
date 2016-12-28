
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_controller extends CI_Controller {


	public function __construct()
	{
		parent:: __construct();
		$this->load->database();
		
	}

	public function delete_product($id)
	{
	
		$this->load->model('product_model');
		$this->product_model->delete_product($id);

	}
	public function image_upload()
	{

		$config['upload_path'] = 'assets/uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
    	$this->upload->set_allowed_types('*');
    	 $pid=$this->input->post("pid");
    	if (!$this->upload->do_upload('img_upload')) 
				{
				echo $this->upload->display_errors();		
				}
				else
				{
							$upload_data=$this->upload->data();
							$product_data=array('img_name' =>$upload_data['file_name'] 
							);
							$this->db->where('product_id',$pid);
							$this->db->update('products',$product_data);
							echo "<img src='".base_url('assets/uploads')."/".$upload_data['file_name']."'  width='200px' height='200px' classs='img-responsive'/>";
				}
	}/* Product Image Upload*/

	public function show_product_image($id)
	{
		
	}/* show_product_image */

	public function add_to_cart($pid,$qty)
	{
		$this->load->model('product_model');
		$query=$this->product_model->get_product($pid);
		
		foreach ($query->result() as $row)
		{
    		$name=$row->product_name;
    		$price=$row->price;
    		$img=$row->img_name;
		}
		
		
			$data = array(
               'id'      => $pid,
               'qty'     => $qty,
               'price'   => $price,
               'name'    => $name,
               'options' => array('Status' => 'New')
            );

			$this->cart->insert($data);
			
			echo count($this->cart->contents());
	}

	public function view_cart()
	{
	 ?>

<table class="table table-striped table-bordered">

<tr>
	<th></th>
  <th>QTY</th>
  <th>Item Description</th>
  <th style="text-align:right">Item Price</th>
  <th style="text-align:right">Sub-Total</th>
</tr>

<?php $i = 1; ?>

<?php foreach ($this->cart->contents() as $items): ?>

	

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

<tr>
  <td colspan="3"> </td>
  <td class="right"><strong>Total</strong></td>
  <td class="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
</tr>

</table>


<?php
	}


	public function remove_cart($id)
	{
			$data = array(
               'rowid' => $id,
               'qty'   => 0
            );

		$this->cart->update($data); 
		$this->view_cart();
	}

	public function update_cart($id,$qty)
	{
			$data = array(
               'rowid' => $id,
               'qty'   => $qty
            );

		$this->cart->update($data); 
		$this->view_cart();
	}

}

/* End of file ajax_controller.php */
/* Location: ./application/controllers/ajax_controller.php */
 
?>