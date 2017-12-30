HTML2PDF-CI3
=========================

This is basically just a CI 3.0+ wrapper for the dompdf library. Very basic functions at the moment, you can find an example controller in the files.

Installation
------------

1.  Copy application/libraries/dompdf folder (the whole thing) to your application/libraries folder
2.  Copy application/libraries/html2pdf.php to your application/libraries folder

Usage
------

### Basic
	
There are 4 options you a required to set in order to create a PDF; folder, filename, paper and HTML
	
    //Load the library
    $this->load->library('html2pdf');
    
    //Set folder to save PDF to
    $this->html2pdf->folder('./assets/pdfs/');
    
    //Set the filename to save/download as
    $this->html2pdf->filename('test.pdf');
    
    //Set the paper defaults
    $this->html2pdf->paper('a4', 'portrait');
    
    //Load html view
    $this->html2pdf->html(<h1>Some Title</h1><p>Some content in here</p>);
    
The create function has two options 'save' and 'download'. Save will just write the PDF to the folder you choose in the settings. Download will force the PDF to download in the clients browser.
    
    //Create the PDF
    $this->html2pdf->create('save');

### Advanced usage

Theres no reason why you can't build and pass a view to the html() function. Also note the create() function will return the saved path if you choose the 'save' option.
  
    $data = array(
    	'title' => 'PDF Created',
    	'message' => 'Hello World!'
    );
    
    //Load html view
    $this->html2pdf->html($this->load->view('pdf', $data, true));
    
    if($path = $this->html2pdf->create('save')) {
    	//PDF was successfully saved or downloaded
    	echo 'PDF saved to: ' . $path;
    }

### Emailing a PDF

You can use the path returned by the create() function to email the PDF using the CI email class

    if($path = $this->html2pdf->create('save')) {
    	
		$this->load->library('email');

		$this->email->from('your@example.com', 'Your Name');
		$this->email->to('someone@example.com'); 
		
		$this->email->subject('Email PDF Test');
		$this->email->message('Testing the email a freshly created PDF');	

		$this->email->attach($path);

		$this->email->send();
					
    }


ChangeLog
---------
* 0.1 - Got up and running with GitHub
* 0.2 - Removed dapricated functions for php 7.0 + versions
