<?php

    try{

        $conection= new PDO("mysql: host=localhost; dbname=toscaniniec", "AngelMelendres", "123456");
        $conection ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conection->exec ("SET CHARACTER SET UTF8");

        
        $query = ("INSERT INTO inventario (nombre, precio, descripcion, codigo_barras, stock, costo, modelo, marca, categoria_producto) VALUES (:nombre, :precio, :descripcion, :codigo, :stock, :costo, :modelo, :marca, :categoria)");
        
        
        $statement=$conection->prepare($query);

        $nombre=htmlentities(addslashes($_POST["nombre"]));
        $precio=htmlentities(addslashes($_POST["precio"]));
        $descripcion=htmlentities(addslashes($_POST["descripcion"]));
        $codigo =htmlentities(addslashes($_POST["codigo"]));
        $stock =htmlentities(addslashes($_POST["stock"]));
        $costo=htmlentities(addslashes($_POST["costo"]));
        $modelo=htmlentities(addslashes($_POST["modelo"]));
        $marca=htmlentities(addslashes($_POST["marca"]));
        $categoria=htmlentities(addslashes($_POST["categoria"]));
        

        $statement->execute(array(":nombre"=>$nombre , ":precio"=>$precio , ":descripcion"=>$descripcion ,":codigo"=>$codigo ,":stock"=>$stock , ":costo"=>$costo, ":modelo"=>$modelo, ":marca"=>$marca, ":categoria"=>$categoria));

        
        header("location: inventario.php");  
        
        
    }catch(Exception $e){
        echo "ERROR DE CONECION 1 ---- ". $e->getLine(), $e->getMessage();
    }

?>