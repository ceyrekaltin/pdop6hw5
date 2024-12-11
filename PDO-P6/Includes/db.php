<?php

class DB {
    private $dbh;
    protected $stmt;

    public function __construct($servername = "localhost", $username = "root", $password = "", $db = "p6") {
        try {
            $this->dbh = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function execute($sql, $placeholders = []) {
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute($placeholders);
        return $stmt;
    }

    public function updateProduct($id, $code, $omschrijving, $fotoUrl, $prijsPerStuk) {
        $sql = "UPDATE producten SET code = :code, omschrijving = :omschrijving, foto = :foto, prijsPerStuk = :prijsPerStuk WHERE id = :id";
        $placeholders = [
            ':code' => $code,
            ':omschrijving' => $omschrijving,
            ':foto' => $fotoUrl,
            ':prijsPerStuk' => $prijsPerStuk,
            ':id' => $id
        ];

        try {
            $stmt = $this->dbh->prepare($sql);
            return $stmt->execute($placeholders);
        } catch (PDOException $e) {
            echo "Update mislukt: " . $e->getMessage();
            return false;
        }
    }
}
?>
