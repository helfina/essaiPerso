<?php


namespace App\Controllers;


 abstract class Controller
{
    //protected $template= 'home
     //public function render(string $fichier, array $donnees = [], string $template = 'default')
    public function render(string $fichier, array $donnees = [], string $template = 'default'){

        //on extrait le contenu de $donnes
        extract($donnees);

        //On demarre le buffer de sortie
        ob_start();
        // a partir de ce point toutes sortie est conserver en memoire


        //on cree le chemin vers la vue
        require_once ROOT.'/Views/'. $fichier .'.php';

        //Transfere le buffer dans $contenu
        $contenu = ob_get_clean();

        //template de page
        //require_once ROOT.'/Views/'.$this->template.'.php';
        require_once ROOT.'/Views/'.$template.'.php';
        //var_dump($contenu);

    }
}