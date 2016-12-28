<?php
class MY_Controller extends CI_Controller
{
	protected $userdata=NULL;
	protected $layout_view="layouts/default";
	protected $content_view="";
	protected $view_data="";
	public function __construct()
	{
		parent:: __construct();
		$this->load->database();
		
	}

	public function _output()
	{
		
		if ($this->content_view !== FALSE && empty($this->content_view))
			$this->content_view = $this->router->class .'/'. $this->router->method;
		
		

		// selecting view and make data
		$content_data = file_exists(APPPATH. 'views/'.$this->content_view.EXT) ? $this->load->view($this->content_view,$this->view_data,TRUE):FALSE;
		
		
		

		// put data into the layout
		if($content_data)
		{
			echo $this->load->view($this->layout_view,array("data" => $content_data),TRUE);
		}
		else
		{
			echo "file does not exists";
		}
		
		
			
	}


}

?>