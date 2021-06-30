<?php

    try{

        $conection= new PDO("mysql: host=localhost; dbname=toscaniniec", "AngelMelendres", "123456");
        $conection ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conection->exec ("SET CHARACTER SET UTF8");
        

        
        $query = ("INSERT INTO empleados (usuario_empleado, nombre, apellido, correo, telefono, contraseña, cedula) VALUES (:usuario, :nombre, :apellido, :correo, :telefono, :pass, :cedula");
        
        
        $statement=$conection->prepare($query);

        $usuario=htmlentities(addslashes($_POST["usuario"]));
        $nombre=htmlentities(addslashes($_POST["nombre"]));
        $apellido=htmlentities(addslashes($_POST["apellido"]));
        $correo=htmlentities(addslashes($_POST["correo"]));
        $telefono=htmlentities(addslashes($_POST["telefono"]));
        $pass=htmlentities(addslashes($_POST["pass"]));
        $cedula=htmlentities(addslashes($_POST["cedula"]));

        

        $statement->execute(array(":usuario"=>$usuario, ":nombre"=>$nombre, ":apellido"=>$apellido, ":correo"=>$correo, ":telefono"=>$telefono, ":pass"=>$pass, ":cedula"=>$cedula));

        
        header("location: empleados.php");  
        
        
    }catch(Exception $e){
        echo "ERROR DE CONECION 1 ---- ". $e->getLine(), $e->getMessage();
    }

?>