<?php


namespace App\Controllers;


use App\Models\AvisModel;

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
            $this->render('admin/avis', compact('avis'), 'admin');
        }
    }
}