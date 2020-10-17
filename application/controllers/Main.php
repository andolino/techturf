<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Main extends MY_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->view('index');
	}

  public function submit_contact(){
    $from    		 = str_replace(' ', '', strtolower($this->input->post('email')));//"smtptech@techturf.com.ph";
    $to    	 		 = "sales@techturf.com.ph";//strtolower($this->input->post('email'));
    $title    	 = "Contact Us";
    $subject  	 = "Contact Us - ";
    $message     = "Name: " . strtoupper($this->input->post('last-name')) . ', ' . strtoupper($this->input->post('name')) . "<br>";
    $message     .= "Email: ".strtoupper($this->input->post('email'))." <br>";
    $message     .= "Message: ".strtoupper($this->input->post('message'))." <br><br>";
    $this->sendEmail($from, $to, $subject, $message, $title);
    echo json_encode(array('msg'=>'success'));
  }

}
