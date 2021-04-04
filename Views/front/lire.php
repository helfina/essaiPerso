<section class="timeline">
    <div class="icon"></div>
    <article class="date-content">
        <div class="date-outer">
           <span class="date">
              <span class="month"><?= $cv->duree ?>Mois</span>
              <span class="year"><?= $cv->annee ?></span>
           </span>
        </div>
    </article>

    <article class="timeline-content">
        <h1 class="title"><a href="/cv/lire/<?= $cv->id ?>"><?= $cv->titre ?></a></h1>
        <p class="description">
            <?= $cv->description ?>
        </p>
    </article>
</section>
