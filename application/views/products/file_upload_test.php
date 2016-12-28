<code><?php echo $msg;?></code>


<code>
<?php //if($upload_data != ''):?>
<?php //var_dump($upload_data);?>

</code>
<br/>This is Image
<?php 
if(isset($upload_data))
{
	echo "<img width='200px' height='200px' src='".site_url()."assets/uploads/".$upload_data['file_name']."' />";
}

?>
<?php //endif;?>

<?php echo form_open_multipart('products/file_upload_test');?>

<input type="file" name="productimage" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>