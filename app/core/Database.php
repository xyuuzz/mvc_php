<?php


class Database 
{
    private $host = DB_HOST, $username = DB_USERNAME, $pass = DB_PASSWORD, $name = DB_NAME;

    private $dbh, $stmt; # database handler & statement

    public function __construct()
    {
        $dsn = "mysql:host={$this->host};dbname={$this->name}"; # data source name : host db & db name
        
        // option/pengaturan/konfigurasi untuk db pdo
        $option = [
            PDO::ATTR_PERSISTENT => true, # untuk membuat koneksi db kita terus terjaga
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION # mengatur error mode menjadi exeption
        ];

        // try catch, untuk konesi pdo
        try
        {
            $this->dbh = new PDO($dsn, $this->username, $this->pass, $option); # instansiasi object pdo dengan dsn, username & pass db
        }
        catch(PDOException $err)
        {
            die($err->getMessage());
        }
    }

    # method yang menerima query yang nanti akan dikirimkan
    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    # bind value agar terhindar dari resiko sql injection
    public function bind($param, $value, $type = null)
    {
        if(is_null($type))
        {
            switch( true ) 
            {
                case is_int( $value ) :
                    $type = PDO::PARAM_INT; # jika value nya adalah int, maka set type menjadi int
                    break;
                case is_bool( $value ) :
                    $type = PDO::PARAM_BOOL; # jika value nya adalah boolean, maka set type menjadi boolean
                    break;
                case is_null( $value ) :
                    $type = PDO::PARAM_NULL; # jika value nya adalah null, maka set type menjadi null
                    break;
                default :
                    $type = PDO::PARAM_STR; # jika value nya adalah string, maka set type menjadi string
            }
        }
        
        $this->stmt->bindValue($param, $value, $type); # lalu bind value nya menggunakan method bindValue
    }

    # execute statement db
    public function execute()
    {
        $this->stmt->execute();
    }

    # mengambil/fetch semua data
    public function resultAll()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    # mengambil/fetch data pertama yang ditemukan
    public function single() 
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount()
    {
        return $this->stmt->rowCount();
    }

}