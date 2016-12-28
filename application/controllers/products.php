<?php

class products extends MY_Controller {

/* End of file products.php */
/* Location: ./application/controllers/products.php */
	function __construct()
	{
		parent::__construct();

	}
	
	function product_list()
	{

		    $this->view_data['selected_page']="products";
			$this->view_data['title']="Products List | Mera Mobile";
			$this->load->library('pagination');
			$this->load->model('product_model');
			$config['base_url'] = '/mobile_phones/products/product_list';
			$config['total_rows'] = $this->product_model->total_products();
 			$config["uri_segment"] = 3;
			$config['per_page'] = 7; 
			$this->pagination->initialize($config); 
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$this->view_data['product_result']=$this->product_model->show_products($config['per_page'],$page);
			$this->view_data['p_link']=$this->pagination->create_links();
	
	}
	function store_list()
	{
			$this->view_data['selected_page']="store";
			$this->view_data['title']="Store | Mera Mobile";
			$this->load->library('pagination');
			$this->load->model('product_model');
			
			$config['base_url'] = '/mobile_phones/products/store_list';
			$config['total_rows'] = $this->product_model->total_products();
 			$config["uri_segment"] = 3;
			$config['per_page'] = 7; 
			$this->pagination->initialize($config); 
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$this->view_data['product_result']=$this->product_model->show_products($config['per_page'],$page);
			$this->view_data['p_link']=$this->pagination->create_links();
			
	}
	function add_product()
	{

			$this->view_data['selected_page']="products";
			$this->view_data['title']="Add Product | Mera Mobile";	
			$this->form_validation->set_rules('product_name', 'Product Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('price', 'Price', 'trim|required|xss_clean');
			$this->form_validation->set_rules('qty', 'Qty', 'trim|required|xss_clean');
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

		$config['upload_path'] = 'assets/uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
    	$this->upload->set_allowed_types('*');


			if($this->form_validation->run()==TRUE)
			{



				$data['product_name']=$this->input->post("product_name");
				$data['price']=$this->input->post("price");
				$data['qty']=$this->input->post("qty");
				$data['img_name']="";
				$this->load->model('product_model');

				if (!$this->upload->do_upload('productimage')) 
				{
				$this->view_data['err_msg']=$this->view_data['err_msg']."<div class='alert alert-danger'>".$this->upload->display_errors()."</div>";	
				echo $this->upload->display_errors();		
				}
				else
				{
							$upload_data=$this->upload->data();
							$data['img_name']=$upload_data['file_name'];

							

				}

				if($this->product_model->insert_product($data))
				{
					

					$this->view_data['err_msg']="<div class='alert alert-success'>".$data['product_name']." Added Successfully </div>";
				}
				else
				{
					$this->view_data['err_msg']="<div class='alert alert-danger'>Error in inserting product </div>";	
				}
				
			}
			

			

	}/* add_product end*/


	function edit_product($id)
	{
			$this->load->model('product_model');
			$this->view_data['selected_page']="products";
			$this->view_data['title']="Edit Product | Mera Mobile";	
			$result=$this->product_model->get_product($id);
			if($result->num_rows()==0)
			{
				redirect('products/product_list', 'refresh');
			}
			else
			{
			$this->view_data['product_data']=$result;
			}
			$this->form_validation->set_rules('product_name', 'Product Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('price', 'Price', 'trim|required|xss_clean');
			$this->form_validation->set_rules('qty', 'Qty', 'trim|required|xss_clean');
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
			if($this->form_validation->run()==TRUE)
			{

				$data['product_name']=$this->input->post("product_name");
				$data['price']=$this->input->post("price");
				$data['qty']=$this->input->post("qty");
				$data['pid']=$id;
				
				if($this->product_model->update_product($data))
				{
					$this->view_data['err_msg']="<div class='alert alert-success'>".$data['product_name']." Updated Successfully </div>";
					$this->view_data['product_data']=$this->product_model->get_product($id);
					
				}
				else
				{
					$this->view_data['err_msg']="<div class='alert alert-danger'>Error in updating product </div>";	
				}
				
			}
			
	

	}/* edit_product end*/
	
	function delete_product($id)
	{
		$this->load->model("product_model");
		$this->product_model->delete_product($id);
	}

	function file_upload_test()
	{
		$this->load->model('product_model');
		$this->view_data['selected_page']="products";
		$this->view_data['title']="Edit Product | Mera Mobile";	
		$config['upload_path'] = 'assets/uploads/';
		
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
    	$this->upload->set_allowed_types('*');
		

		if (!$this->upload->do_upload('userfile')) {
			
			$this->view_data['msg']=$this->upload->display_errors();

		} else { //else, set the success message
		 
		 $this->view_data['upload_data']=$this->upload->data();
		 $this->view_data['msg']="success";

		}
		
	}/* file upload test*/

	function checkout_cart()
	{

		    $this->view_data['selected_page']="store";
			$this->view_data['title']="Check out | Mera Mobile";
	}
	function payment_success()
	{

		    $this->view_data['selected_page']="store";
			$this->view_data['title']="Payment done | Mera Mobile";
	}

	function payment_cancel()
	{

		    $this->view_data['selected_page']="store";
			$this->view_data['title']="Error | Mera Mobile";
	}

}