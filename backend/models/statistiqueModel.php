<?php
class StatistiqueModel {
    private $conn;
    
    public function __construct($db) {
        $this->conn = $db;
    }

    public function getCovoituragesParMois() {
        $sql = "SELECT MONTH(date_depart) AS mois, COUNT(*) AS total FROM covoiturage WHERE YEAR(date_depart) = YEAR(CURRENT_DATE) GROUP BY mois ORDER BY mois";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getRevenusParMois() {
        $sql = "SELECT MONTH(date_depart) AS mois, SUM(prix) AS total FROM covoiturage WHERE YEAR(date_depart) = YEAR(CURRENT_DATE) GROUP BY mois ORDER BY mois";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getStatistiquesGenerales() {
        $sqlCovoiturages = "SELECT COUNT(*) AS total FROM covoiturage";
        $sqlUtilisateurs = "SELECT COUNT(*) AS total FROM utilisateur";
        $sqlRevenus = "SELECT SUM(prix) AS total FROM covoiturage";

        $totalCovoiturages = mysqli_fetch_assoc(mysqli_query($this->conn, $sqlCovoiturages))["total"];
        $totalUtilisateurs = mysqli_fetch_assoc(mysqli_query($this->conn, $sqlUtilisateurs))["total"];
        $totalRevenus = mysqli_fetch_assoc(mysqli_query($this->conn, $sqlRevenus))["total"];

        return [
            "total_covoiturages" => $totalCovoiturages,
            "total_utilisateurs" => $totalUtilisateurs,
            "total_revenus" => $totalRevenus
        ];
    }
}

?>