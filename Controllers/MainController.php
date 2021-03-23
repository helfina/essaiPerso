<?php
namespace App\Controllers;

use App\Models\cvModel;

class MainController {

    public function index()
    {

        echo 'ceci est la page d\'acceuil';
        // $model = new cvModel;
        // On récupère les données
        //$annonces = $model->findAll();
        //$this->render('/front/home', [], 'home');
    }
}
