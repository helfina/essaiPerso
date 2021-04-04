<?php
namespace App\Core;

use App\Controllers\MainController;

/**
 * Routeur principal
 */
class Main
{
    /*
    * fonction qui permet de demarrer l'application c'est notre routeur
    * elle va chercher et lire nos url
    */
    public function start()
    {
        //var_dump($_GET);
        // On démarre la session
        //session_start();

        // On retire le "trailing slash" éventuel de l'URL
        // On récupère l'URL
        $uri = $_SERVER['REQUEST_URI'];

        // On vérifie que uri n'est pas vide et se termine par un /
        if(!empty($uri) && $uri != '/' && $uri[-1] === "/"){
            // On enlève le /
            $uri = substr($uri, 0, -1);

            // On envoie un code de redirection permanente
            http_response_code(301);

            // On redirige vers l'URL sans /
            header('Location: '.$uri);
            exit;
        }

        // On gère les paramètres d'URL
        // p=controleur/methode/paramètres
        // On sépare les paramètres dans un tableau $params
        $params = [];
        if(isset($_GET['page']))
        $params = explode('/', $_GET['page']);

        if($params[0] != ''){
            // on a au moins 1 parametre

            // affiche le tableau des parametres  => var_dump($params);

            /* on recupere le nom du controlleur a instancier
             * On met une majuscule en 1ère lettre, on ajoute le namespace complet avant et on ajoute "Controller" après
             */
            $controller = '\\App\\Controllers\\'.ucfirst(array_shift($params)).'Controller';
            //var_dump($controller);
            // On instancie le contrôleur
            $controller = new $controller();

            // On récupère le 2ème paramètre d'URL
            $action = (isset($params[0])) ? array_shift($params) : 'index';

            if(method_exists($controller, $action)){

                // Si il reste des paramètres on les passe à la méthode
                (isset($params[0])) ? call_user_func_array([$controller, $action], $params) : $controller->$action();


            }else{
                http_response_code(404);
                echo "La page recherchée n'existe pas";
            }



        }else {
            //on a pas de parametres
            //on instancie le controleur par default
            $controller = new MainController();
            // on appel la methode index
            $controller->index();
        }



    }
}