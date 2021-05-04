<?php

class DB
{
    private string $host = 'localhost';
    private string $db = 'eval';
    private string $user = 'root';
    private string $password = 'dev';
    private static ?PDO $dbInstance = null;

    /**
     *  my DB constructor.
     */
    public function __construct() {
        try {
            self::$dbInstance = new PDO("mysql:host=$this->host;dbname=$this->db;charset=utf8", $this->user, $this->password);
            self::$dbInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$dbInstance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        catch (PDOException $exception) {
            echo "Erreur: " . $exception->getMessage();
        }
    }

    /**
     * Return a new instance or an instance
     * @return PDO|null
     */
    public static function getInstance(): ?PDO {
        if(null === self::$dbInstance) {
            new self();
        }
        return self::$dbInstance;
    }

    /** My homemade function :)
     * Return string to have secure data to insert into the database.
     * the secureData fct returns secure data and insert it into the database.
     * @param $data
     * @return string
     */

    public static function secureData($data): string {
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = strip_tags($data);
        $data = addslashes($data);
        return trim($data);
    }

    /**
     * Encode a given plain password
     * @param $plainPassword
     * @return string
     */
    public static function encodePassword($plainPassword): string {
        // Encoding password.
        $password = self::secureData($plainPassword);
        return password_hash($password, PASSWORD_BCRYPT);
    }

    /**
     * avoid clone by another dev
     */
    public function __clone() {}
}