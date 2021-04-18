<header>
    <nav>
        <p>Gk</p>

        <button id="burger" class="burger">
            <div class="bar"></div>
            <div class="bar"></div>
        </button>

        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Service</a></li>
            <li><a href="/contact">Contact</a></li>
        </ul>

        <ul>
            <?php if(isset($_SESSION['user']) && !empty($_SESSION['user']['id'])): ?>
            <li><a href="/users/profil">Profil</a></li>
            <li><a href="/users/logout">Déconnexion</a></li>
            <?php else: ?>
            <li><a href="/users/login">Connexion</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>