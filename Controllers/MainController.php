<?php
namespace App\Controllers;

use App\Models\cvModel;

class MainController extends Controller {

    public function index()
    {
        //$this->template = 'home';
        $this->render('front/home', [], 'home');

    }
}
