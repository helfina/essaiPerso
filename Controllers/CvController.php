<?php


namespace App\Controllers;


class CvController extends Controller
{
    public function index(){
        // On instancie le modèle
        $model = new AnnoncesModel;

        // On récupère les données
        $annonces = $model->findAll();
        $this->render('front/cv', [], 'cv');
    }

}