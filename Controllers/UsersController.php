<?php


namespace App\Controllers;

use App\Core\Form;
use App\Models\UsersModel;

class UsersController extends Controller
{
    /**
     * Connexion de l'utilisateur
     * @return void
     */
    public function login()
    {
        //var_dump($_SESSION);
        // On vérifie si le formulaire est complet
        if (Form::validate($_POST, ['email', 'password'])) {
            // Le formulaire est complet
            // On va chercher dans la base de données l'utilisateur avec l'email entré
            $usersModel = new UsersModel;
            $userArray = $usersModel->findOneByEmail(strip_tags($_POST['email']));

            // Si l'utilisateur n'existe pas
            if (!$userArray) {
                // On envoie un message de session
                $_SESSION['erreur'] = 'L\'adresse e-mail et/ou le mot de passe est incorrect';
                header('Location: /users/login');
                exit;
            }

            // L'utilisateur existe
            $user = $usersModel->hydrate($userArray);

            // On vérifie si le mot de passe est correct
            if (password_verify($_POST['password'], $user->getPassword())) {
                // Le mot de passe est bon
                // On crée la session
                $user->setSession();
                // TODO verifier le role  admin si c'est le role admin alors on redirige vers index admin
                $adminController = new AdminController;

                if($adminController->isAdmin(false)){
                    $url = '/admin/index';
                }else{
                    $url =  '/users/profil';
                }

                header('Location: '. $url);
                exit;

            } else {
                // Mauvais mot de passe
                $_SESSION['erreur'] = 'L\'adresse e-mail et/ou le mot de passe est incorrect';
                header('Location: /users/login');
                exit;
            }
        }

        //On instancie le formulaire
        $form = new Form;

        // On ajoute chacune des parties qui nous intéressent
        $form->debutForm()
            ->ajoutLabelFor('email', 'Email')
            ->ajoutInput('email', 'email', ['id' => 'email', 'class' => 'form-control'])
            ->ajoutLabelFor('password', 'Mot de passe')
            ->ajoutInput('password', 'password', ['id' => 'password', 'class' => 'form-control'])
            ->ajoutBouton('Me connecter', ['class' => 'btn btn-primary'])
            ->finForm();
        // On envoie le formulaire à la vue en utilisant notre méthode "create"
        $this->render('users/login', ['loginForm' => $form->create()]);

    }

    /**
     * Inscription des utilisateur
     * @return void
     */
    public function register()
    {
        //var_dump($_POST);
        // On vérifie si le formulaire est valide
        if (Form::validate($_POST, ['email', 'password'])) {
            // Le formulaire est valide
            // On "nettoie" l'adresse email pour eviter les failles xss qui inject du script dans une base de donnée
            $email = strip_tags($_POST['email']);

            // On chiffre le mot de passe
            $pass = password_hash($_POST['password'], PASSWORD_ARGON2I);

            // On hydrate l'utilisateur,(on le stocke dans la base de donnée)
            $user = new UsersModel;

            $user->setEmail($email)
                ->setPassword($pass);

            // On stocke l'utilisateur
            $user->create();
        }
        //On instancie le formulaire
        $form = new Form;

        // On ajoute chacune des parties qui nous intéressent
        $form->debutForm()
            ->ajoutLabelFor('email', 'E-mail')
            ->ajoutInput('email', 'email', ['id' => 'email', 'class' => 'form-control'])
            ->ajoutLabelFor('password', 'Mot de passe')
            ->ajoutInput('password', 'password', ['id' => 'password', 'class' => 'form-control'])
            ->ajoutBouton('M\'inscrire', ['class' => 'btn btn-primary'])
            ->finForm();

        // On envoie le formulaire à la vue en utilisant notre méthode "create"
        $this->render('users/register', ['registerForm' => $form->create()]);
    }

    /**
     * Déconnexion de l'utilisateur
     * @return exit
     */
    public function logout(){
        unset($_SESSION['user']);
        $_SESSION['message'] = 'Vous etes bien déconnecter';

        /*redirection vers la page referente
         * header('Location: '. $_SERVER['HTTP_REFERER']);
         */
        header('Location:  /' );
        exit;
    }

    public function profil(){
        // On génère la vue
        $this->render('users/profil');
    }
}