<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Exceptions extends CI_Exceptions
{
    public function __construct()
    {
        parent::__construct();
    }

    public function show_custom_error($message)
    {
        //add your logic
        //assign your $header, $template, and $status values  
        //if needed you can also call the show_error method of the parent class.
        return $this->show_error($header, $message, $template, $status);  
    }

    public function show_403($page = '', $log_error = TRUE)
    {
        if (is_cli())
        {
            $heading = 'Not Found';
            $message = 'The controller/method pair you requested was not found.';
        }
        else
        {
            $heading = '403 Forbidden';
            $message = 'Anda tidak punya akses untuk melakukan ini.';
        }
        // By default we log this, but allow a dev to skip it
        if ($log_error)
        {
            log_message('error', $heading.': '.$page);
        }
        echo $this->show_error($heading, $message, 'error_403', 403);//custom404 is in APPPATH.'views/errors/html/custom404.php'
        exit(4); // EXIT_UNKNOWN_FILE
    }
}