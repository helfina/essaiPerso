<?php


namespace App\Controllers;

use App\Models\AvisModel;
use App\Core\Form;


class AvisController extends Controller
{
    public function index()
    {

        //$donnees = ['a', 'b'];
        //include_once ROOT.'/Views/front/lister.php';

        //on instancie le modele correspondant a la table 'cv'
        $AvisModel = new AvisModel;

        // on va chercher toute les rubriques du cv active
        $avis = $AvisModel->findBy(['actif' => 1]);
        //var_dump($CVs);

        // On génère la vue
        $this->render('avis/lister', compact('avis'));

    }

    /**
     * affiche une rubrique (article)
     * @param int $id id de la rubrique avi
     * @return void
     */
    public function lire(int $id)
    {
        //echo $id;
        // On inctancie le modele
        $AvisModel = new AvisModel;

        // on va chercher une rubrique
        $avi = $AvisModel->find($id);

        // on envoie a la vue
        $this->render('avis/lire', compact('avi'));
    }

    /**
     * Ajouter un avis
     *
     */
    public function ajouter()
    {
        // on verifie si l'utilisateur est connecter
        if (isset($_SESSION['user']) && !empty($_SESSION['user']['id'])) {
            // l'utilisateur est connecté
            //on verifie si le formulaire est complet
            if (Form::validate($_POST, ['titre', 'description'])) {
                // le formulaire est complet
                // on se protege des faille xss
                // strip_tags, htmlentities, htmlspecialchars
                $titre = strip_tags($_POST['titre']);
                $description = strip_tags($_POST['description']);

                //on instancie le model
                $avis = new AvisModel();

                // on hydrate
                $avis->setTitre($titre)
                    ->setDescription($description)
                    ->setUsers_id(($_SESSION['user']['id']));

                // On enregistre
                $avis->create();

                // on redirige
                $_SESSION['message'] = "Votre avis a été enregistrée avec succès";
                header('Location: /users/profil');
                exit();
            } else {
                // le formulaire est incomplet

            }

            $form = new Form();
            $form->debutForm()
                ->ajoutLabelFor('titre', "Titre de l\'avis : ")
                ->ajoutInput('text', 'titre', ['id' => 'titre', 'class' => 'form-control'])
                ->ajoutLabelFor('description', 'description')
                ->ajoutTextarea('description', '', ['id' => 'description', 'class' => 'form-control'])
                ->ajoutBouton('Valider', ['class' => 'btn btn-primary']);
            $this->render('avis/ajouter', ['form' => $form->create()]);

        } else {
            //l'utilisateur n'est pas conneté
            $_SESSION['erreur'] = " Vous devez être connecté.e pour accéder à cette page";
            header('Location: /users/login');
            exit;
        }

    }

    /**
     * Modifier une avis
     * @param int $id
     * @return void
     */
    public function modifier(int $id)
    {
        // On vérifie si l'utilisateur est connecté
        if (isset($_SESSION['user']) && !empty($_SESSION['user']['id'])) {
            // On va vérifier si l'avis existe dans la base
            // On instancie notre modèle
            $avisModel = new avisModel;

            // On cherche l'avis avec l'id $id
            $avis = $avisModel->find($id);

            // Si l'avis n'existe pas, on retourne à la liste des avis
            if (!$avis) {
                http_response_code(404);
                $_SESSION['erreur'] = "L'avis recherchée n'existe pas";
                header('Location: /avis');
                exit;
            }

            // On vérifie si l'utilisateur est propriétaire de l'avis ou admin
            if ($avis->users_id !== $_SESSION['user']['id']) {
                if (!in_array('ROLE_ADMIN', $_SESSION['user']['roles'])) {
                    $_SESSION['erreur'] = "Vous n'avez pas accès à cette page";
                    header('Location: /avis');
                    exit;
                }
            }

            // On traite le formulaire
            if (Form::validate($_POST, ['titre', 'description'])) {
                // On se protège contre les failles XSS
                $titre = strip_tags($_POST['titre']);
                $description = strip_tags($_POST['description']);

                // On stocke l'avis
                $avisModif = new AvisModel;

                // On hydrate
                $avisModif->setId($avis->id)
                    ->setTitre($titre)
                    ->setDescription($description);

                // On met à jour l'avis
                $avisModif->update();

                // On redirige
                $_SESSION['message'] = "Votre avis a été modifiée avec succès";
                header('Location: /avis');
                exit;
            }

            $form = new Form;

            $form->debutForm()
                ->ajoutLabelFor('titre', 'Titre de l\'avis :')
                ->ajoutInput('text', 'titre', [
                    'id' => 'titre',
                    'class' => 'form-control',
                    'value' => $avis->titre
                ])
                ->ajoutLabelFor('description', 'Texte de l\'avis')
                ->ajoutTextarea('description', $avis->description, [
                    'id' => 'description',
                    'class' => 'form-control'
                ])
                ->ajoutBouton('Modifier', ['class' => 'btn btn-primary'])
                ->finForm();

            // On envoie à la vue
            $this->render('avis/modifier', ['form' => $form->create()]);

        } else {
            // L'utilisateur n'est pas connecté
            $_SESSION['erreur'] = "Vous devez être connecté(e) pour accéder à cette page";
            header('Location: /users/login');
            exit;
        }
    }

    public function mesAvis()
    {

        //on instancie le modele correspondant a la table 'cv'
        $AvisModel = new AvisModel;

        // on va chercher toute les rubriques du cv active
        $avis = $AvisModel->findBy(['users_id' => $_SESSION['user']['id']]);
        //var_dump($CVs);

        // On génère la vue (en utilisant la meme views mais un url different)
        $this->render('avis/lister', compact('avis'));

    }

}