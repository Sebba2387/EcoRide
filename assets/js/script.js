//SIDEBAR
const sidebar = document.getElementById("sidebar");
const toggleBtn = document.getElementById("toggleSidebar");
const icon = toggleBtn.querySelector("i");

// Ferme la sidebar par défaut au chargement de la page
sidebar.classList.add("collapsed");
icon.classList.replace("bi-chevron-double-left", "bi-chevron-double-right");

toggleBtn.addEventListener("click", () => {
    // Toggle la classe collapsed
    sidebar.classList.toggle("collapsed");

    // Gestion du bouton chevron
    if (sidebar.classList.contains("collapsed")) {
        icon.classList.replace("bi-chevron-double-left", "bi-chevron-double-right");
    } else {
        icon.classList.replace("bi-chevron-double-right", "bi-chevron-double-left");
    }
});
// Boite de dialogue "AVIS"
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("date_avis").value = new Date().toISOString().split('T')[0]; // Date actuelle
});

function ouvrirBoiteAvis(reservationId, covoiturageId) {
    document.getElementById("reservation_id").value = reservationId;
    document.getElementById("covoiturage_id").value = covoiturageId;
    document.getElementById("modal-avis").style.display = "block";
}

function fermerBoiteAvis() {
    document.getElementById("modal-avis").style.display = "none";
}

