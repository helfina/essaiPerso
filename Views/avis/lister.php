<?php
//var_dump($_SESSION['user']['id']);
foreach ($avis as $avi) : ?>
    <article>
        <a href="/avis/lire/<?= $avi->id ?>"><?= $avi->titre ?></a>
        <p>
            <span><?= $avi->created_at ?></span>
            <?= $avi->description ?>
        </p>
        <?php
            // si la session n'est pas vide et que la session est egale a l'user_id alors tu affiche le btn modifier
            if (!empty($_SESSION['user']['id']) && $_SESSION['user']['id'] == $avi->users_id ) :
        ?>

        <a href="/avis/modifier/<?= $avi->id ?>" class="btn btn-warning">Modifier</a>
        <?php endif;?>

    </article>
<?php endforeach; ?>
