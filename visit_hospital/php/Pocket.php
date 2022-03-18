<?php

class Pocket{

    public $admin;
    public $password;
    public $contact;

    function __construct(){

        $this->holder = $this->createPortal();
        $this->admin = $this->holder->admin->user;
        $this->password = $this->holder->admin->password;
        $this->contact = $this->holder->admin->telephone;

    }

    function createPortal(){
        return json_decode(file_get_contents('./../json/index.json'));
    }
}

?>