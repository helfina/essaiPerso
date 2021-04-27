<?php


namespace App\Controllers;
use App\Models\AvisModel;
use App\Core\Form;


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
        $this->render('avis/avis',compact('avis'));

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
        $this->render('avis/lire',compact('avi'));
    }
    /**
    * Ajouter un avis
    *
    */
    public function  ajouter(){
        // on verifie si l'utilisateur est connecter
        if(isset($_SESSION['user']) && !empty($_SESSION['user']['id'])){
            // l'utilisateur est connecté
            //on verifie si le formulaire est complet
            if(Form::validate($_POST, ['titre', 'description'])){
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
            }else{
                // le formulaire est incomplet

            }
            $form = new Form();
            $form->debutForm()
                ->ajoutLabelFor('titre', 'Titre de l\'avis : ')
                ->ajoutInput('text', 'titre', ['class' => 'form-control'])
                ->ajoutLabelFor('description', 'Description')
                ->ajoutTextarea('description', '', ['class' => 'form-control'])
                ->ajoutBouton('Valider', ['class' => 'btn btn-primary'])
            ;
            $this->render('avis/ajouter', ['form' => $form->create()]);

        }else{
            //l'utilisateur n'est pas conneté
            $_SESSION['erreur'] = " Vous devez être connecté.e pour accéder à cette page";
            header('Location: /users/login');
            exit;
        }

    }
}