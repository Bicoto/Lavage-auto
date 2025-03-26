<?php

class PdoLavage
{
    private static $serveur = 'mysql:host=localhost';
    private static $bdd = 'dbname=lavageauto';
    private static $user = 'root';
    private static $mdp = '';
    private static $monPdo;
    private static $monPdoLavage = null;

    /**
     * Constructeur privé, crée l'instance de PDO qui sera sollicitée
     * pour toutes les méthodes de la classe
     */
    public function __construct()
    {
        PdoLavage::$monPdo = new PDO(PdoLavage::$serveur . ';' . PdoLavage::$bdd, PdoLavage::$user, PdoLavage::$mdp);
        PdoLavage::$monPdo->query("SET CHARACTER SET utf8");
    }

    public function __destruct()
    {
        PdoLavage::$monPdo = null;
    }

    /**
     * Fonction statique qui crée l'unique instance de la classe
     *
     * Appel : $instancePdoLavage = PdoLavage::getPdoLavage();
     * @return l'unique objet de la classe PdoLavage
     */
    public static function getPdoLavage()
    {
        if (PdoLavage::$monPdoLavage == null) {
            PdoLavage::$monPdoLavage = new PdoLavage();
        }
        return PdoLavage::$monPdoLavage;
    }


    /**
     * Méthode pour enregistrer un nouvel utilisateur
     */
    public function registerUser($nom, $prenom, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $req = "INSERT INTO users (nom, prenom, email, password) VALUES (:nom, :prenom, :email, :password)";
        $stmt = PdoLavage::$monPdo->prepare($req);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        return $stmt->execute();
    }

    /**
     * Méthode pour authentifier un utilisateur
     */
    public function loginUser($email, $password)
    {
        $req = "SELECT * FROM users WHERE email = :email";
        $stmt = PdoLavage::$monPdo->prepare($req);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return false;
        }
    }

    /**
     * Méthode pour déconnecter un utilisateur
     */
    public function logoutUser()
    {
        session_start();
        session_destroy();
    }

    /**
     * Retourne toutes les prestations sous forme d'un tableau associatif
     *
     * @return le tableau associatif des prestations
     */
    public function getLesPrestations()
    {
        $req = "SELECT * FROM prestation";
        $res = PdoLavage::$monPdo->query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }

    public function getFieldsName($tableName)
    {
        $recordset = PdoLavage::$monPdo->query("SHOW COLUMNS FROM $tableName");
        $fields = $recordset->fetchAll(PDO::FETCH_ASSOC);
        foreach ($fields as $field) {
            $fieldNames[] = $field['Field'];
        }
        return $fieldNames;
    }

    public function supprPrestation($listeV)
    {
        foreach ($listeV as $cle => $val) {
            // A compléter
        }
        // return $res;
    }

    public function recupChamps()
    {
        $req = "SHOW COLUMNS FROM prestation";
        $res = PdoLavage::$monPdo->query($req);
        return $res;
    }

    public function getLesproduit()
    {
        $req = "SELECT * FROM produit";
        $res = PdoLavage::$monPdo->query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }
}
?>


