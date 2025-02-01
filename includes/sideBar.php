<div class="container flex-column flex-md-row">
    <div class="sidebar col-3 col-md-3">
        <!-- NAVBAR VERTICALE -->
        <nav id="sidebar" class="bg-dark text-white">
            <button id="toggleSidebar" class="btn btn-primary text-dark">
                <i class="bi bi-chevron-double-left"></i>
            </button>
            <!-- Image de profil -->
            <div class="mb-4 mt-4">
                <img src="images/photo_profil_0.jpg" class="rounded-5 d-none d-md-block ms-3" alt="Profil" style="max-width: 80% ; max-height: 150px;">
            </div>
            <!-- Menu -->
            <ul class="nav flex-column">
                <li class="nav-item mb-2 mt-2">
                    <a href="index.php?page=compte" class="sidebar-item nav-link text-white">
                        <i class="bi bi-person-fill fs-3"></i>
                        <span class="textSideBar d-none d-md-inline ms-3">Profil</span>
                    </a>
                </li>
                <li class="nav-item mb-2 mt-2">
                    <a href="index.php?page=vehicules" class="sidebar-item nav-link text-white">
                        <i class="bi bi-car-front-fill fs-3"></i>
                        <span class="textSideBar d-none d-md-inline ms-3">Véhicules</span>
                    </a>
                </li>
                <li class="nav-item mb-2 mt-2">
                    <a href="index.php?page=voyages" class="sidebar-item nav-link text-white">
                        <i class="bi bi-signpost-2-fill fs-3"></i>
                        <span class="textSideBar d-none d-md-inline ms-3">Voyages</span>
                    </a>
                </li>
                <li class="nav-item mb-2 mt-2">
                    <a href="index.php?page=avis" class="sidebar-item nav-link text-white">
                        <i class="bi bi-chat-right-text-fill fs-3"></i>
                        <span class="textSideBar d-none d-md-inline ms-3">Avis</span>
                    </a>
                </li>
                <li class="nav-item mb-2 mt-2">
                    <a href="index.php?page=signin" class="sidebar-item nav-link text-white">
                        <i class="bi bi-arrow-right-square fs-3"></i>
                        <span class="textSideBar d-none d-md-inline ms-3">Déconnexion</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div> 
</div> 
