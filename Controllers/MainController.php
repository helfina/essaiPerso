<?php
namespace App\Controllers;

class MainController extends Controller {

    public function index()
    {
        echo 'page accueil';
       $this->render('front/index', [], 'home');
    }
}
