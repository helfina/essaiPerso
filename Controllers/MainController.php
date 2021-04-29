<?php
namespace App\Controllers;


class MainController extends Controller {

    public function index()
    {
        //$this->template = 'home';
        $this->render('front/home', [], 'home');

    }
}
