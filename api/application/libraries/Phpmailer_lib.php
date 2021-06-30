<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PHPMailer_lib {
    function __construct(){
		// parent::__construct();
		/* $this->_auth(); */
        //$this->load->model("Clientes_model");
        log_message('Debug', "PHPMailer class is loaded");
    }
    
    public function load()
    {
        require_once APPPATH.'third_party/PHPMailer/Exception.php';
        require_once APPPATH.'third_party/PHPMailer/PHPMailer.php';
        require_once APPPATH.'third_party/PHPMailer/SMTP.php';

        $mail = new PHPMailer;
        return $mail;
    }
}