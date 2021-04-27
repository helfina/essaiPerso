<?php


namespace App\Controllers;
use App\Models\AvisModel;


class AvisController extends Controller
{
    public function index()
    {

        //$donnees = ['a', 'b'];
        //include_once ROOT.'/Views/front/avis.php';

        //on instancie le modele correspondant a la table 'cv'
        $AvisModel = new AvisModel;

        // on va chercher toute les rubriques du cv active
        $avis = $AvisModel->findBy(['actif' => 1]);
        //var_dump($CVs);

        // On génère la vue
        $this->render('front/avis',compact('avis'));

    }
    /**
     * affiche une rubrique (article)
     * @param int $id id de la rubrique avi
     *@return void
     */
    public function lire(int $id){
        echo $id;
        // On inctancie le modele
        $AvisModel = new AvisModel;

        // on va chercher une rubrique
        $avi = $AvisModel->find($id);

        // on envoie a la vue
        $this->render('front/lireAvi',compact('avi'));
    }
}