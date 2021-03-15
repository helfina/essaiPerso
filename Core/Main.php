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
        session_start();

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
        //$params = [];
        var_dump($_GET);
        if(isset($_GET['page'])){
            /**
            pour eviter le duplicate content on explode , ce qui permet de gagner des point en seo ceci est une bonne pratique
             */
            //var_dump($_GET);
            $params = explode('/', $_GET['page']);

            var_dump($params);
            if($params[0] != '') {
                // On a au moins 1 paramètre
                var_dump($params);
                // On récupère le nom du contrôleur à instancier
                // On met une majuscule en 1ère lettre, on ajoute le namespace complet avant et on ajoute "Controller" après
                $controller = '\\App\\Controllers\\'.ucfirst(array_shift($params)).'Controller';

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

            }else{
                // On n'a pas de paramètres
                // On instancie le contrôleur par défaut
                $controller = new MainController;

                // On appelle la méthode index
                $controller->index();
            }
        }

        }
}