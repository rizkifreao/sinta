<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Defines common exception functions that are globally available
 */
 
if ( ! function_exists('show_403'))
{
    function show_403($message)
    {
        $_error =& load_class('Exceptions', 'core');
        echo $_error->show_403($message);
        exit;
    }
}

if ( ! function_exists('show_custom_error'))
{
    function show_custom_error($message)
    {
        $_error =& load_class('Exceptions', 'core');
        echo $_error->show_custom_error($message);
        exit;
    }
}