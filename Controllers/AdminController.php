<?php


namespace App\Controllers;


use App\Models\AvisModel;
use App\Models\UsersModel;

class AdminController extends Controller
{
    public function index()
    {
        //var_dump($_SESSION);
        //on verifie si on est admin
        if ($this->isAdmin()) {
            $this->render('admin/index', [], 'admin');
        }

    }

    /**
     * vérifie si on est admin
     */
    private function isAdmin()
    {
        //on  verifie si on est connecté et si "ROLE_ADMIN" est dans nos roles
        if (isset($_SESSION['user']) && in_array("ROLE_ADMIN", $_SESSION['user']['roles'])) {
            // on est admin
            return true;

        } else {
            $_SESSION['erreur'] = "Vous n'avez pas acces a cette zone";
            header('Location: /');
            exit;
        }

    }

    /*
     * affiche la listes des avis sous forme de tableau
     */
    public function avis()
    {
        if ($this->isAdmin()) {
            // On inctancie le modele
            $AvisModel = new AvisModel;

            // on va chercher une rubrique
            $avis = $AvisModel->findAll();

            // on envoie a la vue
            $this->render('admin/avisList', compact('avis'), 'admin');
        }
    }
        /**
        * Supprime une annonce si on est admin
        * @param int $id
        * @return void
        */
    public function supprimeAvis(int $id){
        if($this->isAdmin()){
            $avi = new AvisModel;
            $avi->delete($id);
            header('Location: '.$_SERVER['HTTP_REFERER']);
        }
    }

    /**
     * Active ou désactive un avis
     * @param int $id
     * @return void
     */
    public function activeAvis(int $id)
    {
        if($this->isAdmin()){
            $avisModel = new AvisModel;

            $avisArray = $avisModel->find($id);

            if($avisArray){
                $avi = $avisModel->hydrate($avisArray);

                $avi->setActif($avi->getActif() ? 0 : 1);

                $avi->update();
            }
        }
    }

    /**
    * affiche la listes des utilisateur sous forme de tableau
    */
    public function listUser()
    {
        if ($this->isAdmin()) {
            // On inctancie le modele
            $UsersModel = new UsersModel;

            // on va chercher une rubrique
            $users = $UsersModel->findAll();

            // on envoie a la vue
            $this->render('admin/listUser', compact('users'), 'admin');
        }
    }

}