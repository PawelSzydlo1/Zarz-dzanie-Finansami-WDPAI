<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
    {
        $this->render('start_page');
    }

    public function your_expanses()
    {
        $this->render('your_expanses');
    }
    public function registration()
    {
        $this->render('registration');
    }
    public function login()
    {
        $this->render('login');
    }
    public function contact()
    {
        $this->render('contact');
    }
    public function logout()
    {
        $this->render('logout');
    }

}