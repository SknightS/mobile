<?php

 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model {

public function __construct()
{
	parent:: __construct();
}

			
public function insert_product($data)
{

$product_data=array('product_name' =>$data['product_name'] ,
				'price'=>$data['price'],
				'qty'=>$data['qty'],
				'img_name'=>$data['img_name']

);

return $this->db->insert('products',$product_data);

}/* insert product end*/


public function update_product($data)
{
$product_data=array('product_name' =>$data['product_name'] ,
				'price'=>$data['price'],
				'qty'=>$data['qty']

);
$this->db->where('product_id',$data['pid']);
return $this->db->update('products',$product_data);


}/* update product end*/



public function show_products($limit,$start)
{
		$this->db->limit($limit, $start);
		$query= $result=$this->db->get('products');

	if ($query->num_rows() > 0) {
           
            return $query;
        }
        return false;

}/* Show_products*/

public function get_product($id)
{
	$this->db->where('product_id', $id);
	return $this->db->get('products');
}/* Edit Product*/

public function total_products()
{
	$result=$this->db->get('products');
	return $result->num_rows();
}

public function delete_product($id)
{
	$this->db->where('product_id', $id);
$this->db->delete('products'); 
	
}

}/* model end*/

/* End of file product_model.php */
/* Location: ./application/models/product_model.php */

?>