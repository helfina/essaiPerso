<div class="main-timeline">

    <?php foreach ($CVs as $cv) : ?>
        <section class="timeline">
            <div class="icon"></div>
                <article class="date-content">
                    <div class="date-outer">
                        <span class="date">
                            <span class="month"><?= $cv->duree ?> Mois</span>
                                <span class="year"><?= $cv->annee ?></span>
                            </span>
                    </div>
                </article>

                <article class="timeline-content">
                    <h5 class="title"><a href="/cv/lire/<?= $cv->id?>"><?= $cv->titre ?></a></h5>
                    <h6 class="entreprise"><a target="_blank" href="<?= $cv->lien?>"><?= $cv->nom_entreprise ?></a></h6>
                        <p class="description">
                            <?= $cv->description ?>
                        </p>
                </article>
        </section>
    <?php endforeach; ?>

        <!-- start experience section--
                            <div class="timeline">
                                <div class="icon"></div>
                                <div class="date-content">
                                    <div class="date-outer">
                                            <span class="date">
                                                    <span class="month">2 Mois</span>
                                            <span class="year">2021</span>
                                            </span>
                                    </div>
                                </div>
                                <div class="timeline-content">
                                    <h5 class="title">Développeur Intégrateur Web</h5>
                                    <p class="description">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur ex sit amet massa
                                        scelerisque scelerisque. Aliquam erat volutpat. Aenean interdum finibus efficitur.
                                        Praesent dapibus dolor felis, eu ultrices elit molestie.
                                    </p>
                                </div>
                            </div>
                            <-- end experience section--

                            <-- start experience section--
                            <div class="timeline">
                                <div class="icon"></div>
                                <div class="date-content">
                                    <div class="date-outer">
                                            <span class="date">
                                                    <span class="month">2 mois</span>
                                            <span class="year">2020</span>
                                            </span>
                                    </div>
                                </div>
                                <div class="timeline-content">
                                    <h5 class="title">Développeur Intégrateur Web</h5>
                                    <p class="description">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur ex sit amet massa
                                        scelerisque scelerisque. Aliquam erat volutpat. Aenean interdum finibus efficitur.
                                        Praesent dapibus dolor felis, eu ultrices elit molestie.
                                    </p>
                                </div>
                            </div>
                            <-- end experience section--

                            <-- start experience section--
                            <div class="timeline">
                                <div class="icon"></div>
                                <div class="date-content">
                                    <div class="date-outer">
                                            <span class="date">
                                                    <span class="month">4 Mois</span>
                                            <span class="year">2019</span>
                                            </span>
                                    </div>
                                </div>
                                <div class="timeline-content">
                                    <h5 class="title">Développeur React Js</h5>
                                    <p class="description">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur ex sit amet massa
                                        scelerisque scelerisque. Aliquam erat volutpat. Aenean interdum finibus efficitur.
                                        Praesent dapibus dolor felis, eu ultrices elit molestie.


                                    </p>
                                </div>
                            </div>
                            <-- end experience section--

                            <-- start experience section--
                            <div class="timeline">
                                <div class="icon"></div>
                                <div class="date-content">
                                    <div class="date-outer">
                                            <span class="date">
                                                    <span class="month">6 Mois</span>
                                            <span class="year">2019</span>
                                            </span>
                                    </div>
                                </div>
                                <div class="timeline-content">
                                    <h5 class="title">Développeur Intégrateur en Réalisation d’application Web</h5>
                                    <span>NOVEMBRE 2019 – JUIN 2020</span>
                                    <p class="description">
                                        Kercode, est une formation de 6 mois intensive
                                    </p>
                                    <ul>
                                        <li>Langages et outils utilisée :</li>
                                        <li>HTML CSS – SASS, Bootstrap 4
                                        <li>Javascript, JQuery</li>
                                        <li>SEO, Ergonomie, Architecture</li>
                                        <li>PHP, MySQL, PostgreSQL</li>
                                        <li>WordPress, Laravel</li>
                                        <li>Composer, PHP Maile</li>
                                    </ul>

                                </div>
                            </div>
                            <-- end experience section-->

</div>
<!--librairy js-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</body>


</html>