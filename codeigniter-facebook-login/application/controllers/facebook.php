<?php

  class Facebook extends CI_Controller
  {


    function index(){
        $this->load->view('facebook');
    }

    function facebookLogin(){

      if (@_POST['login_facebook']) echo "connect";            

    }


  }

?>
