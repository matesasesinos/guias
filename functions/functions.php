<?php

require '../start.php';
use Controllers\Guia;


if(isset($_GET['action']) && $_GET['action'] === 'add_guia') {
    $nombre = $_POST['nombre'];
    $dni = $_POST['dni'];
    $email = $_POST['email'];
    $transporte = $_POST['transporte'];
    $fecha = $_POST['fecha'];
    $guia = $_POST['guia'];
    $operacion = $_POST['operacion'];
    $cp = $_POST['cp'];
    $observaciones = $_POST['observaciones'];

    $guia = Guia::create_guia($nombre,$dni,$email,$transporte,$fecha,$guia,$operacion,$cp,$observaciones);

    if($guia) {
        header('Location: ../agregar_guia.php?msg=exito');
    } else {
        header('Location: ../agregar_guia.php?msg=error');
    }
}

if(isset($_GET['action']) && $_GET['action'] === 'edit_guia') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $dni = $_POST['dni'];
    $email = $_POST['email'];
    $transporte = $_POST['transporte'];
    $fecha = $_POST['fecha'];
    $guia = $_POST['guia'];
    $operacion = $_POST['operacion'];
    $cp = $_POST['cp'];
    $observaciones = $_POST['observaciones'];

    $guia = Guia::editar_guia($id,$nombre,$dni,$email,$transporte,$fecha,$guia,$operacion,$cp,$observaciones);

    if($guia) {
        header('Location: ../editar_guia.php?msg=exito&id='.$id);
    } else {
        header('Location: ../editar_guia.php?msg=error&id='.$id);
    }
}

if(isset($_GET['action']) && $_GET['action'] === 'delete_guia' && isset($_GET['id'])){
    $guia = Guia::delete_guia($_GET['id']);
    if($guia) {
        header('Location: ../guias.php?msg=exito_delete');
    } else {
        header('Location: ../guia.php?msg=error_delete');
    }
}

if(isset($_GET['action']) && $_GET['action'] === 'importar_guia'){
    $fileName = $_FILES['importar']['tmp_name'];
    $fila = 1;
    if ($_FILES["importar"]["size"] > 0) { 
        $file = fopen($fileName, "r");
        $flag = true;
        $row = 1;
        while (($column = fgetcsv($file, 10000, ";")) !== FALSE) {
            if($flag) { $flag = false; continue; }
            echo $column[0].'<br>';
            Guia::import_guia($column[0],$column[1],$column[2],$column[3],$column[4],$column[5],$column[6],$column[7],$column[8]);
        }
    }
}