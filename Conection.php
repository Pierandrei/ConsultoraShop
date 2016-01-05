<?php

class conection {

    private $ip = "localhost";
    private $database = "consultorashop";
    private $user = "root";
    private $pass = "";
    private $porta = "3306";
    var $conn = null;

    function Open() {
        try {
            if ($this->conn != null) {
                return $this->conn;
            }
            $this->conn = mysql_connect(($this->ip . ":" . $this->porta), $this->user, $this->pass);            
            mysql_select_db($this->database, $this->conn);
        } catch (Exception $e) {
            echo ($e->getMessage());
        }
        return $this->conn;
    }

    function Closed() {
        mysql_close($this->conn); // aqui fecho a conexão se baseando na variável acima declarada
    }

}

?>
