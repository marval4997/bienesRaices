<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController
{
    public static function inicio(Router $router)
    {

        $limite = 3;
        $propiedades = Propiedad::get($limite);

        $router->render('paginas/inicio', [
            'propiedades' => $propiedades,
            'limite' => $limite
        ]);
    }

    public static function nosotros(Router $router)
    {
        $router->render('paginas/nosotros', []);
    }

    public static function blog(Router $router)
    {
        $router->render('paginas/blog', []);
    }

    public static function anuncios(Router $router)
    {
        $propiedades = Propiedad::all();
        $router->render('paginas/anuncios', [
            'propiedades' => $propiedades
        ]);
    }

    public static function anuncio(Router $router)
    {
        $id = Redirecionar('/');
        $propiedades = Propiedad::find($id);
        $router->render('paginas/anuncio', [
            'anuncio' => $propiedades
        ]);
    }

    public static function contacto(Router $router)
    {
        $mensaje="";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            //crear una instancia de php mailer
            $respuestas = $_POST['contacto'];

            $mail = new PHPMailer(true);


            //Configurar SMTP
            $mail->isSMTP();
            $mail->Host = "sandbox.smtp.mailtrap.io";
            $mail->SMTPAuth = true;
            $mail->Username = '9a14e91de7bcbb';
            $mail->Password = '0e0786f23016d4';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 465;

            //configurar el contenido del email
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');


            //habilitar html
            $mail->isHTML(true);
            $mail->CharSet = "UTF-8";
            $mail->Subject = "Tienes un Nuevo Mensaje";

            $contenido = '<html>';
            $contenido .= '<p> Nombre:' . $respuestas['nombre'] . '</p>';
            $contenido .= '<p> Mensaje:' . $respuestas['mensaje'] . '</p>';
            $contenido .= '<p> Vende o Compra' . $respuestas['tipo'] . '</p>';
            $contenido .= '<p> Precio o Presupuesto' . $respuestas['presupuesto'] . '</p>';
            if ($respuestas['contactar'] === 'telefono') {
                $contenido.='<p>Eligió ser contactado por teléfono</p>';
                $contenido .= '<p> Telefono:' . $respuestas['telefono'] . '</p>';
                $contenido .= '<p> Fecha' . $respuestas['fecha'] . '</p>';
                $contenido .= '<p> Hora' . $respuestas['hora'] . '</p>';
            } else {
                $contenido.='<p>Eligió ser contactado por email</p>';
                $contenido .= '<p> Email:' . $respuestas['email'] . '</p>';
            }
            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            //Definir contenido


            //enviar email
            if ($mail->send()) {
                $mensaje= "mensaje enviado correctamente";
            } else {
                $mensaje= 'El mensaje no se puedo enviar....';
            }
        }
        $router->render('paginas/contacto', [
            'mensaje'=>$mensaje
        ]);
    }
}
