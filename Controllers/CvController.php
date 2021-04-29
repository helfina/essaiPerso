<?php


namespace App\Controllers;


use App\Models\cvModel;

class CvController extends Controller
{
    /**
    *cette methode affichera  une page listant toutes entrer de la bdd pour la table cv
    */
    public function index()
    {

        //$donnees = ['a', 'b'];
        //include_once ROOT.'/Views/front/cv.php';

        //on instancie le modele correspondant a la table 'cv'
        $cvModel = new cvModel;

        // on va chercher toute les rubriques du cv active
        $CVs = $cvModel->findBy(['actif' => 1]);
        //var_dump($CVs);

        // On génère la vue
        $this->render('front/cv',compact('CVs') /*['CVs' => $CVs]*/);

    }
    /**
     * affiche une rubrique (article)
     * @param int $id id de la rubrique
     *@return void
    */
    public function lire(int $id){
        //echo $id;
        // On inctancie le modele
        $cvModel = new cvModel;

        // on va chercher une rubrique
        $cv = $cvModel->find($id);

        // on envoie a la vue
        $this->render('front/lire',compact('cv'));
    }

}