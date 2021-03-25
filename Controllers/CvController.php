<?php


namespace App\Controllers;


use App\Models\cvModel;

class CvController extends Controller
{
    public function index()
    {
        echo 'ceci est la page cv';

        //on instancie le modele correspondant a la table 'cv'
        $cvModel = new cvModel();

        // on va chercher toute les rubriques du cv active
        $curriculumVitae = $cvModel->findBy(['actif' => 1]);
        //var_dump($curriclumVitae);

        // On génère la vue
        $this->render('front/cv', compact($curriculumVitae));

    }

}