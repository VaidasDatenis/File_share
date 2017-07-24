<?php
 
class DB {
 
    static $db_hostname = "localhost";
    private static $db_username = "root";
    private static $db_password = "";
    private static $db = "file share";
    private static $conn;
 
    // ivykdom uzklausa ir grazinam reiksmes
    public function query($sql) {
        $result = [];
        $query = $this->conn->query($sql);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_ASSOC);
       
        while($row = $query->fetchObject()) {
            array_push($result, $row);
        }
        return $result;
    }
 
    public static function store($sql) {
        try {
            DB::$conn = new PDO("mysql:host=localhost;dbname=file share;charset=utf8", DB::$db_username, DB::$db_password);
            // set the PDO error mode to exception
            DB::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
        }
        catch(PDOException $e)  {
            echo "Connection failed: " . $e->getMessage();
        }
 
        $query = DB::$conn->query($sql);
 
        DB::$conn = null;
    }
 
}