
<?php
require_once ROOT . '/Views/includes/head.php';
?>
<?php


require_once ROOT . '/Controllers/AvisController.php';
//var_dump($donnees);
?>



    <?php foreach ($avis as $avi) : ?>
    <article>
        <a href="/avis/lire/<?= $avi->id?>"><?= $avi->titre ?></a>
        <p>
            <span><?= $avi->created_at ?></span>
            <?= $avi->description ?>

        </p>
    </article>

    <?php endforeach; ?>



<?php
require_once ROOT . '/Views/includes/footer.php';
?>

</body>


</html>