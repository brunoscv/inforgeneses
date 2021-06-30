<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Email extends CI_Email {

    function __construct($rules = array()) {
        parent::__construct($rules);
    }

    public function valid_email($address)
    {
       return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $address)) ? FALSE : TRUE;
    }

}