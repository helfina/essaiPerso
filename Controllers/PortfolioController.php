<?php


namespace App\Controllers;


class PortfolioController extends Controller
{
    public function index(){

        $this->render('front/portfolio', [], 'default');
    }
}