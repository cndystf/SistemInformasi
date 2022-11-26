<?php

class Hello extends CI_Controller
{
    function index()
    {
        $this->load->view('helloworld');
    }
    function getResult()
    {
        //echo ("<h1> Sukses ke server</h1>");
        echo base_url();
    }
}
