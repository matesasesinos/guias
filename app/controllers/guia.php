<?php

namespace Controllers;
use Models\Guias;
use \Infinitypaul\Validator\Validator;
class Guia{
    
    public static function hola(){
        return "hola";
    }

    public static function create_guia($nombre,$dni,$email,$transporte,$fecha,$guia,$operacion,$cp,$observaciones) {
        $error = true;
        $validator = new Validator([
            'nombre' => $nombre,
            'transporte' => $transporte,
            'guia' => $guia
        ]);
        $validator->setRules([
            'nombre' => ['required'],
            'transporte' => ['required'],
            'guia' => ['required']
        ]);
        if($validator->validate()) {
            $guia = Guias::create(['nombre' => $nombre,'dni' => $dni, 'email' => $email, 'transporte' => $transporte, 'fecha' => $fecha, 'guia' => $guia, 'operacion' => $operacion, 'cp' => $cp, 'observaciones' => $observaciones]);
            return $guia;
        } else {
            return $error;
        }
    }

    public static function guias(){
        $guias = Guias::orderBy('id','DESC')->get();
        return $guias;
    }

    public static function get_guia($id) {
        return Guias::findOrFail($id);
    }

    public static function editar_guia($id,$nombre,$dni,$email,$transporte,$fecha,$guia,$operacion,$cp,$observaciones) {
        
        $guias = Guias::find($id);
        $guias->nombre = $nombre;
        $guias->dni = $dni;
        $guias->email = $email;
        $guias->transporte = $transporte;
        $guias->fecha = $fecha;
        $guias->guia = $guia;
        $guias->operacion = $operacion;
        $guias->cp = $cp;
        $guias->observaciones = $observaciones;
        $guias->save();

        return $guias;
    }

    public static function delete_guia($id) {
        $guia = Guias::find($id);
        $guia->delete();
        return $guia;
    }

    public static function import_guia($nombre,$dni,$email,$transporte,$fecha,$observaciones,$guia,$operacion,$cp) {
        $fileName = $_FILES['importar']['tmp_name'];
        if ($_FILES["importar"]["size"] > 0) {

            $file = fopen($fileName, "r");
            $flag = true;
            $row = 1;
            while (($column = fgetcsv($file, 10000, ";")) !== FALSE) {
                $guias = new Guias();
                $guias->nombre = $nombre;
                $guias->dni = $dni;
                $guias->email = $email;
                $guias->transporte = $transporte;
                $guias->fecha = $fecha;
                $guias->observaciones = $observaciones;
                $guias->guia = $guia;
                $guias->operacion = $operacion;
                $guias->cp = $cp;
                $guias->save();
                return header('Location: ../importar.php?msg=exito');
            }
        } else {
            return header('Location: ../importar.php?msg=error');
        } 
    }

    public static function buscar($dni) {
        $guias = Guias::where('dni','like','%'.$dni.'%')->orderBy('fecha','DESC')->get()->toArray();
        return $guias;
    }

    public static function eliminar_fecha($fecha) {
        $borrar = date("Y-m-d",strtotime($fecha."- 30 days"));
        return Guias::where('fecha', '<', $borrar)->delete();
    }

}