<section class="d-flex flex-wrap">
<?php
//var_dump($_SESSION['user']['id']);
foreach ($avis as $avi) : ?>
    <article class="card border border-info rounded m-2 p-2">
        <div class="d-flex">
            <h3 class="mr-auto p-2"><?= $avi->titre ?></h3>
            <span class="p-2"><?= $avi->created_at ?></span></br>
        </div>
        <p class="card-body"><?= $avi->description ?></p>
          <a href="/avis/lire/<?= $avi->id ?>" class="btn btn-info">Read</a>
        <?php
            // si la session n'est pas vide et que la session est egale a l'user_id alors tu affiche le btn modifier
            if (!empty($_SESSION['user']['id']) && $_SESSION['user']['id'] == $avi->users_id ) :
        ?>

        <a href="/avis/modifier/<?= $avi->id ?>" class="btn btn-warning">Modifier</a>
        <?php endif;?>

    </article>
<?php endforeach; ?>
</section>