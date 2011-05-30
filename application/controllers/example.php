<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Example extends CI_Controller {

	public function index()
    {
    
	    //Load the library
	    $this->load->library('html2pdf');
	    
	    //Set folder to save PDF to
	    $this->html2pdf->folder('./assets/pdfs/');
	    
	    //Set the filename to save/download as
	    $this->html2pdf->filename('test.pdf');
	    
	    //Set the paper defaults
	    $this->html2pdf->paper('a4', 'portrait');
	    
	    $data = array(
	    	'title' => 'PDF Created',
	    	'message' => 'Hello World!'
	    );
	    
	    //Load html view
	    $this->html2pdf->html($this->load->view('pdf', $data, true));
	    
	    if($this->html2pdf->create('save')) {
	    	//PDF was successfully saved or downloaded
	    	echo 'PDF saved';
	    }
	    
    } 
}

/* End of file example.php */
/* Location: ./application/controllers/example.php */