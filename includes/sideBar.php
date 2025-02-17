<?php
// require_once 'backend/database/db.php';  // Connexion à la base de données
// require_once 'backend/models/user.php';  // Modèle User
require_once '/home/ecoriders/backend/database/db.php';
require_once '/home/ecoriders/backend/models/user.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="container flex-column flex-md-row">
    <div class="sidebar col-3 col-md-3">
        <!-- NAVBAR VERTICALE -->
        <nav id="sidebar" class="bg-dark text-white">
            <button id="toggleSidebar" class="btn btn-primary text-dark">
                <i class="bi bi-chevron-double-left"></i>
            </button>
            <!-- Image de profil -->
            <div class="mb-4 mt-4">
                <img src="assets/images/img_profil_user.jpg" class="rounded-5 d-none d-md-block ms-3" alt="Profil" style="max-width: 80% ; max-height: 150px;">
            </div>
            <!-- Menu -->
            <ul class="nav flex-column">
                <?php if (isset($_SESSION['role_id']) && ($_SESSION['role_id'] == 3)): ?>
                <li class="nav-item mb-2 mt-2">
                    <a href="index.php?" class="sidebar-item nav-link text-white">
                        <i class="bi bi-luggage-fill fs-3"></i>
                        <span class="textSideBar d-none d-md-inline ms-3">C'est parti !</span>
                    </a>
                </li>
                <li class="nav-item mb-2 mt-2">
                    <a href="index.php?page=compte" class="sidebar-item nav-link text-white">
                        <i class="bi bi-person-fill fs-3"></i>
                        <span class="textSideBar d-none d-md-inline ms-3">Profil</span>
                    </a>
                </li>
                <li class="nav-item mb-2 mt-2">
                    <a href="index.php?page=voitures" class="sidebar-item nav-link text-white">
                        <i class="bi bi-car-front-fill fs-3"></i>
                        <span class="textSideBar d-none d-md-inline ms-3">Voitures</span>
                    </a>
                </li>
                <li class="nav-item mb-2 mt-2">
                    <a href="index.php?page=covoiturages" class="sidebar-item nav-link text-white">
                        <i class="bi bi-signpost-2-fill fs-3"></i>
                        <span class="textSideBar d-none d-md-inline ms-3">Covoiturages</span>
                    </a>
                </li>
                <li class="nav-item mb-2 mt-2">
                    <a href="index.php?page=reservations" class="sidebar-item nav-link text-white">
                        <i class="bi bi-calendar3-event-fill fs-3"></i>
                        <span class="textSideBar d-none d-md-inline ms-3">Réservations</span>
                    </a>
                </li>
                <li class="nav-item mb-2 mt-2">
                    <a href="index.php?page=avis" class="sidebar-item nav-link text-white">
                        <i class="bi bi-chat-right-text-fill fs-3"></i>
                        <span class="textSideBar d-none d-md-inline ms-3">Avis</span>
                    </a>
                </li>
                <li class="nav-item mb-2 mt-2">
                    <a href="/loads/logout.php" class="sidebar-item nav-link text-white">
                        <i class="bi bi-arrow-right-square-fill fs-3"></i>
                        <span class="textSideBar d-none d-md-inline ms-3">Déconnexion</span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (isset($_SESSION['role_id']) && ($_SESSION['role_id'] == 1 || $_SESSION['role_id'] == 2)): ?>
                <li class="nav-item mb-2 mt-2">
                    <a href="index.php?page=compte" class="sidebar-item nav-link text-white">
                        <i class="bi bi-person-fill fs-3"></i>
                        <span class="textSideBar d-none d-md-inline ms-3">Profil</span>
                    </a>
                </li>
                <li class="nav-item mb-2 mt-2">
                    <a href="index.php?page=gestionUtilisateurs" class="sidebar-item nav-link text-white">
                        <i class="bi bi-people fs-3"></i>
                        <span class="textSideBar d-none d-md-inline ms-3">Utilisateurs</span>
                    </a>
                </li>
                <li class="nav-item mb-2 mt-2">
                    <a href="index.php?page=gestionCovoiturages" class="sidebar-item nav-link text-white">
                        <i class="bi bi-signpost-2 fs-3"></i>
                        <span class="textSideBar d-none d-md-inline ms-3">Covoiturages</span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (isset($_SESSION['role_id']) && ($_SESSION['role_id'] == 1)): ?>
                <li class="nav-item mb-2 mt-2">
                    <a href="index.php?page=gestionEmployes" class="sidebar-item nav-link text-white">
                        <i class="bi bi-person-add fs-3"></i>
                        <span class="textSideBar d-none d-md-inline ms-3">Employés</span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (isset($_SESSION['role_id']) && ($_SESSION['role_id'] == 1 || $_SESSION['role_id'] == 2)): ?>
                <li class="nav-item mb-2 mt-2">
                    <a href="/loads/logout.php" class="sidebar-item nav-link text-white">
                        <i class="bi bi-arrow-right-square fs-3"></i>
                        <span class="textSideBar d-none d-md-inline ms-3">Déconnexion</span>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div> 
</div> 