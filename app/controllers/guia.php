<?php

namespace App\Controllers;
use App\Models\Guias;
use \Infinitypaul\Validator\Validator;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Guia{
    
    public static function hola(){
        return "hola";
    }

    public static function email_mandar($email,$guia,$transporte,$nombre,$fecha,$observaciones) {
        $mensaje = '¡Hola '.$nombre.'! <br>Queríamos informarte que tu compra ya esta en camino.<br>';
        if($transporte === 'Andreani') {
            $mensaje .= 'El envío se realizo por Andreani y el numero de guia es <strong>'.$guia.'</strong>
            Podes seguir tu envio desde la pagina de Andreani. <br> 
            <a href="https://seguimiento.andreani.com/'.$guia.'" target="_blank">https://seguimiento.andreani.com/</a>
            ';
        }
        if($transporte === 'Expreso Cargo') {
            $mensaje .= 'El envío se realizo por Expreso Cargo y va a llegar a tu domicilio dentro de las próximas 48hs hábiles.';
        }
        if($transporte === 'Via Cargo') {
            $mensaje .= 'El envío se realizo por Vía Cargo y el numero de guía es <strong>'.$guia.'</strong>
            Podes seguir tu envio desde la pagina de Via Cargo. <br><a href="https://www.viacargo.com.ar/" target="_blank"> https://www.viacargo.com.ar/</a>';
        }
        if(!empty($observaciones) && $transporte !== 'Otros'){
            $mensaje .= '<p>Te queriamos comentar:<br>'.$observaciones.'</p>';
        }
        if($transporte === 'Otros'){
            $mensaje .= '<p>Te queriamos comentar:<br>'.$observaciones.'</p>';
        }
        $mensaje .= 'Ante cualquier duda o consulta te podes comunicar por wahtsapp al +54 9 3512 77-1274.<br>
        Muchas gracias por confiar en nosotros.<br>
        Saludos<br>
        TP3D';
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = false;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'in-v3.mailjet.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = '865b170d71fc29212af7a76c3b282391';                     // SMTP username
            $mail->Password   = '2837021e77bf57433ea3c3a47fc92e7e';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;
            $mail->CharSet      = 'UTF-8';                                  // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        
            //Recipients
            $mail->setFrom('guias@tp3d.com.ar', 'TP3D');
            $mail->addAddress($email, $nombre);     // Add a recipient

        
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = '¡Te realizamos un envio!';
            $mail->Body    = $mensaje;
        
            $mail->send();
            return 'Mensaje enviado';
        } catch (Exception $e) {
            return "Mensaje no pudo ser enviado: {$mail->ErrorInfo}";
        }
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
            $guias = Guias::create(['nombre' => $nombre,'dni' => $dni, 'email' => $email, 'transporte' => $transporte, 'fecha' => $fecha, 'guia' => $guia, 'operacion' => $operacion, 'cp' => $cp, 'observaciones' => $observaciones]);
            self::email_mandar($email,$guia,$transporte,$nombre,$fecha,$observaciones);
            return $guias;
           
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
            while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
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
                if($guias->save()){
                    self::email_mandar($email,$guia,$transporte,$nombre,$fecha,$observaciones);
                    return header('Location: ../importar.php?msg=exito');
                } 
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