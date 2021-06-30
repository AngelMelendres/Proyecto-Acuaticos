<?php

    try{

        $conection= new PDO("mysql: host=localhost; dbname=toscaniniec", "AngelMelendres", "123456");
        $conection ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conection->exec ("SET CHARACTER SET UTF8");

        $correo=htmlentities(addslashes($_POST["correo"]));
        $pass=htmlentities(addslashes($_POST["pass"]));

        $query =("SELECT * FROM empleados WHERE correo= :correo AND contraseña= :pass");

        $result=$conection->prepare($query);

        $result->bindValue(":correo", $correo);
        $result->bindValue(":pass", $pass);

        $result->execute();

        if($result->rowCount()!=0){
            session_start();
            $_SESSION["correo"]=$correo;

            header("location: home.php");
        }
        else{
            header("location: index.php");
            
        }


    }catch(Exception $e){
        echo "ERROR DE CONECION 1 ---- ". $e->getLine(), $e->getMessage();
    }

?>