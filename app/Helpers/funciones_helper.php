<?php

function mensaje($texto, $tipo = 5, $titulo = ""){
    $mensaje = array();
    $mensaje['texto'] = $texto;
    $mensaje['tipo'] = $tipo;
    $mensaje['titulo'] = $titulo;

    $session = session();
    if ($session->get("mensaje") == NULL) {
        $fila_mensajes = array();
        $fila_mensajes[] = $mensaje;
        $session->set("mensaje", $fila_mensajes);
    } else {
        $fila_mensajes = $session->get("mensaje");
        $fila_mensajes[] = $mensaje;
        $session->set("mensaje", $fila_mensajes);
    }
} //end of function mensaje

function fecha_actual()
{
    return date("Y-m-d H:i:s");
} //end function fecha_actual

function mostrar_mensaje(){

    $session = session();
    $mensajes = $session->get("mensaje");
    $session->set("mensaje", null);
    if ($mensajes == null) {
        return "";
    }

    $html  = '';
    foreach ($mensajes as $key => $mensaje) {

        switch ($mensaje['tipo']) {
            case 1:
                $html .= "
                    iziToast.success({
                        title: '".$mensaje['titulo']."',
                        message: '".$mensaje['texto']."',
                        position: 'topRight',
                    });
                ";
                break;
            case 2:
                $html .= "
                    iziToast.error({
                        title: '".$mensaje['titulo']."',
                        message: '".$mensaje['texto']."',
                        position: 'topRight',
                    });
                ";
                break;
            case 3:
                $html .= "
                    iziToast.show({
                        title: '".$mensaje['titulo']."',
                        message: '".$mensaje['texto']."',
                        position: 'topRight',
                    });
                ";
                break;
            case 4:
                $html .= "
                    iziToast.warning({
                        title: '".$mensaje['titulo']."',
                        message: '".$mensaje['texto']."',
                        position: 'topRight',
                    });
                ";
                break;
            default:
                $html .= "
                    iziToast.show({
                        title: '".$mensaje['titulo']."',
                        message: '".$mensaje['texto']."',
                        position: 'topRight',
                    });
                ";
                break;
        } //end of switch

    } //end foreach $mensajes
    
    return $html;

}//end function mostrar_mensaje




?>