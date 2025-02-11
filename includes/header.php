<header>
        <!-- NAVBAR HORIZONTALE -->
        <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="images/EcoRide_logo.png" alt="Logo" width="165" height="35">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item me-5">
                            <a class="nav-link active text-dark fw-bold" aria-current="page" href="index.php?page=presentation">Qui sommes-nous ?</a>
                        </li>
                        <li class="nav-item me-5">
                            <a class="nav-link active text-dark fw-bold" aria-current="page" href="index.php?page=services">Nos services</a>
                        </li>
                        <li class="nav-item me-5">
                            <a class="nav-link active text-dark fw-bold" aria-current="page" href="index.php?page=contact">Nous contacter</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="images/connexion_btn.png" alt="Profil" width="28" height="28">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="index.php?page=signup" data-show="disconnected">Inscription</a></li>
                                <li><a class="dropdown-item" href="index.php?page=signin" data-show="disconnected">Connexion</a></li>
                                <li><button class="dropdown-item" href="index.php?" id="btnSignout" data-show="connected">Déconnexion</button></li>
                                <li><a class="dropdown-item" href="index.php?page=compte" data-show="connected">Mon compte</a></li>

                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>