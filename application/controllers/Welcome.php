<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    function index() {
        redirect('front/beranda');
    }
}