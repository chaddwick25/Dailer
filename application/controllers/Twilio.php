<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Twilio\Rest\Client;

require_once('vendor\twilio\sdk\Twilio\autoload.php');
require_once('application\config\twilio_credentials.php');

class Twilio extends CI_Controller {
	public function __construct(){
		  try{
					$this->client = new Twilio\Rest\Client(SID, TOKEN);
   	   }catch(Exception $e){
				 dump($e);
	    }

	}

	public function index(){
		$message = $this->client->messages->create(
		  RECEIVER, // Text this number
		  array(
		    'from' => SENDER, // From a valid Twilio number
		    'body' => 'IT WORKS '
		  )
		);

		print $message;

				// $this->load->view('twilio');
			}
}
