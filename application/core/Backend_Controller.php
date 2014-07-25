<?php

class Backend_Controller extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        /* 		if($this->data['user']['group'] !== 'admin')
                {
                    show_error('You are not allowed to access this area.');
                } */
    }
}