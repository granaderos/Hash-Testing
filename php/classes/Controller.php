<?php

    include "DatabaseConnection.php";
    
    class Controller extends DatabaseConnection {
        /*------------FOR TRANSACTIONS-----------*/

    	function displayIt(){

    		$this->open_connection();

    			$sql= "SELECT * FROM data ORDER BY dataId DESC";
                $stmt = $this->db_holder->query($sql);

    		$this->close_connection();


            $output = "";
            while($data = $stmt->fetch()) {
                $output .= "<tr>
                                <td>".$data[1]."</td>
                                <td>".$data[2]."</td>
                                <td>".$data[3]."</td>
                            </tr>";
            }

            if($output != "") $output = "<tr><td>Plain Text</td><td>Hash Values</td><td>Algorithm</td></tr>".$output;
            echo $output;
    	}

        function hashIt($algo, $plainText) {
            $this->open_connection();

            if($algo == "md5") {
                $sql = $this->db_holder->prepare("INSERT INTO data VALUES (null, ?, md5(?), ?);");
                $sql->execute(array($plainText, $plainText, "md5"));
            } else if($algo == "password"){
                $sql = $this->db_holder->prepare("INSERT INTO data VALUES (null, ?, password(?), ?);");
                $sql->execute(array($plainText, $plainText, "password"));
            } else {
                $sql = $this->db_holder->prepare("INSERT INTO data VALUES (null, ?, crypt(?), ?);");
                $sql->execute(array($plainText, $plainText, "crypt"));
            }

            $this->close_connection();
        }

    }
