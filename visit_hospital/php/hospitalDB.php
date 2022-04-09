<?php
session_start();

class DataBase
{
    private $localhost;
    private $UserDB;
    private $Pass;
    private $DB_name;
    private $MySQL_CON;

	function __construct(){
		$this->localhost = "localhost";
		$this->UserDB = "root";
		$this->Pass = ""; //Change to name from url
		$this->DB_name = "hospital";
		$this->MySQL_CON = $this->connection();
	}
	function connection(){

        try {
          $conn = new PDO(
                           "mysql:host=$this->localhost;dbname=$this->DB_name",
                           $this->UserDB,
                           $this->Pass,
                           array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
                         );
          // set the PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          return $conn;
        } catch(PDOException $e) {
          return "Connection failed: " . $e->getMessage();
        }
	}


    function logIn($table, $username, $password)
    {
        $statement = "SELECT SQL_CALC_FOUND_ROWS * from " . $table . " WHERE Email = '" . $username . "' AND Password = '$password'";

        $stmt = $this->MySQL_CON->prepare($statement);
        $stmt->execute();

        if (count($stmt->fetchAll()) == 1){
            return true;
        }else
            return false;
    }
    function deleteData($statement)
    {
         $conn = $this->MySQL_CON->exec($statement);
         if($conn)
            return true;
        else
            return false;
    }
    function getData($statement)
    {
        $stmt = $this->MySQL_CON->prepare($statement);
        $stmt->execute();
        $data = $stmt->fetchAll();

        if (count($data) > 0)
            return $data;
        else
            return [];
    }
    function updateData($statement)
    {
        $stmt = $this->MySQL_CON->prepare($statement);

        if($stmt->execute())
            return true;
        else
            return false;
    }
    function insertData($table,$values)
    {

        $statementOne = "";
        $statementTwo = "";
        $r = -1;
        $fin = count($values);
        foreach($values as $v){
            $r++;
            if($r == 0){
                $statementOne .= "(";
                $statementTwo .= "VALUES (";
            }
            $statementOne .= $v['key'];
            $statementTwo .= "'".$v['value']."'";
            if($r !== ($fin - 1)){
                $statementOne .= ",";
                $statementTwo .= ",";
            }else{
                $statementOne .= ")";
                $statementTwo .= ")";
            }

        }

        $statement = "INSERT INTO " .$table. "".$statementOne. "".$statementTwo;

        $stmt = $this->MySQL_CON->prepare($statement);
        if($stmt->execute())
            return true;
        else
            return false;
    }
}

?>
