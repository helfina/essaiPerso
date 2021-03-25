<?php


namespace App\Controllers;


 abstract class Controller
{
    public function render(string $fichier, array $donnees = []){

        //on extrait le contenu de $donnes
        extract($donnees);
        //on cree le chemin vers la vue
        require_once ROOT.'/Views/'. $fichier .'.php';

    }
}