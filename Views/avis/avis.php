<?php foreach ($avis as $avi) : ?>
    <article>
        <a href="/avis/lire/<?= $avi->id ?>"><?= $avi->titre ?></a>
        <p>
            <span><?= $avi->created_at ?></span>
            <?= $avi->description ?>
        </p>
    </article>
<?php endforeach; ?>
