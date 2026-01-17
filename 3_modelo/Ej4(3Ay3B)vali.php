<?php

function limpiar($valor) {

    if (trim($valor)===''){
        $valor_limpio='El campo está vac&iacuteo';
        exit;
    } else {
        $valor_limpio=trim($valor);
        exit;
    }

    return $valor_limpio;
}

function validar_rol($r) {

    if (trim($r)==="") {
        
        $permisos='Rol no recibido';
        return $permisos;

    } else {

        switch ($r) {
        case 'admin':
            $permisos="Tienes acceso completo al panel de administración.";
            break;
        case 'user':
            $permisos="Tienes acceso a tus datos y opciones de usuario.";
            break;
        case 'invitado':
            $permisos="Tienes acceso solo de lectura a algunas secciones.";
            break;
        default:
            $permisos="Error: rol no válido.<br>";
            exit;
        return $permisos;
        }
    }
}
?>