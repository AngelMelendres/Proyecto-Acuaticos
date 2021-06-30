<?php


    try{

        $conection= new PDO("mysql: host=localhost; dbname=toscaniniec", "AngelMelendres", "123456");
        $conection ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conection->exec ("SET CHARACTER SET UTF8");
        
        
    }catch(Exception $e){
        echo "ERROR DE CONECION 1 ---- ". $e->getLine(), $e->getMessage();
    }

?>



