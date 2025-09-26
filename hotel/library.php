<?php
session_start();
// $_SESSION
$habitaciones = [
    [
        "codigo" => "001",
        "estado" => "Libre",
        "camas" => "2",
        "description" => "Habitación 1",
        "conVista" => true
    ],
    [
        "codigo" => "002",
        "estado" => "Libre",
        "camas" => "2",
        "description" => "Habitacion 2",
        "conVista" => true
    ],
    [
        "codigo" => "003",
        "estado" => "Libre",
        "camas" => "2",
        "description" => "Habitación 3",
        "conVista" => true
    ],
    [
        "codigo" => "004",
        "estado" => "Libre",
        "camas" => "1",
        "description" => "Habitación 4",
        "conVista" => false
    ],
    [
        "codigo" => "005",
        "estado" => "Libre",
        "camas" => "1",
        "description" => "Habitación 5",
        "conVista" => false
    ],
];
function obtenerHabitaciones()
{
    global $habitaciones;
    return $habitaciones;
}
// Obtener todos los html options con su valor y descripcion y seleccionado si correcponde
function getSelectOptions(
    $arreglo,
    $llaveCodigo,
    $llaveTexto,
    $valorSeleccionado = ""
) {
    $htmlBuffer = [];
    // if (!is_array($arreglo)) {
    //     return "";
    // }
    foreach ($arreglo as $item) {
        // <option value="" selected>texto</select>
        $tmp = '<option value="' . $item[$llaveCodigo] . '" ' . (($item[$llaveCodigo] == $valorSeleccionado) ? " selected " : "") . '>' . $item[$llaveTexto] . '</option>';
        $htmlBuffer[] = $tmp;
    }
    return implode("", $htmlBuffer);
}

function obtenerReservas()
{
    $reservas = [];
    if (isset($_SESSION["reservas_hotel"])) {
        $reservas = $_SESSION["reservas_hotel"];
    }
    return $reservas;
}

function getHabitacionDetail($codigo)
{
    $habitacion = [];
    $habitaciones = obtenerHabitaciones();
    foreach ($habitaciones as $fhabitacion) {
        if ($fhabitacion["codigo"] === $codigo) {
            $habitacion = $fhabitacion;
            break;
        }
    }
    return $habitacion;
}

function guardarReserva($arrReserva)
{
    /*
    Si existe la colección de reservas en sesión
        Extraer las reservas ya guardadas
    Sino
        Crear la colección de reservas
    
    Vamos a adjuntar a la colección la nueva reserva

    Guardar la colección actualizada en la sesión de php

    */
    $reservas = [];
    if (isset($_SESSION["reservas_hotel"])) {
        $reservas = $_SESSION["reservas_hotel"];
    }

    $reservas[] = $arrReserva;
    $_SESSION["reservas_hotel"] = $reservas;
}
