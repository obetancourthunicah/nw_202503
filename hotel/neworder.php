<?php
require_once "library.php";
/*
PHP 4 formas de incluir codigo de otros archivos

include
include_once

require
require_once

*/


$txtCliente = "";
$numAdultos = 1;
$numInfantes = 0;
$codHabitacion = "NA";
$txtPhone = "";
$withVista = 0;

if (isset($_POST["btnCrearReserva"])) {
    $txtCliente = $_POST["txtCliente"];
    $numAdultos = intval($_POST["numAdultos"]);
    $numInfantes = intval($_POST["numInfantes"]);
    $codHabitacion = $_POST["codHabitacion"];
    $txtPhone = $_POST["txtPhone"];
    $withVista = intval($_POST["withVista"]);

    guardarReserva(
        [
            "cliente" => $txtCliente,
            "adultos" => $numAdultos,
            "infantes" => $numInfantes,
            "habitacion" => $codHabitacion,
            "telefono" => $txtPhone,
            "vista" => $withVista
        ]
    );
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Reserva de Hotel</title>
</head>

<body>
    <h1>Agregar Reserva de Hotel</h1>
    <form action="neworder.php" method="post">
        <label for="txtCliente">Reserva a Nombre de:</label>
        <input type="text" name="txtCliente" id="txtCliente" value="<?php echo $txtCliente; ?>"
            placeholder="Nombre Completo" />
        <br />
        <label for="numAdultos">Número de Adultos</label>
        <input type="number" name="numAdultos" id="numAdultos" value="<?php echo $numAdultos; ?>" />
        <br />
        <label for="numInfantes">Número de niños</label>
        <input type="number" name="numInfantes" id="numInfantes" value="<?php echo $numInfantes; ?>" />
        <br />
        <label for="codHabitacion">Habitación</label>
        <select name="codHabitacion" id="codHabitacion">
            <!-- Vamos a generar con PHP -->
            <?php
            $tmpHabitaciones =  obtenerHabitaciones();
            array_unshift($tmpHabitaciones, [
                "codigo" => "NA",
                "description" => "Seleccione Habitación",
                "estado" => "Neles",
                "camas" => "0",
                "conVista" => false
            ]);
            echo getSelectOptions(
                $tmpHabitaciones,
                "codigo",
                "description",
                $codHabitacion
            );
            ?>
        </select>
        <br />
        <label>Vista de la Habitación</label>
        <label for="withVista">Con Vista</label>
        <input type="radio" name="withVista" id="withVista" value="1" <?php echo ($withVista == 1) ? "checked" : ""; ?> />&nbsp;
        <label for="withoutVista">Sin Vista</label>
        <input type="radio" name="withVista" id="withoutVista" value="0" <?php echo ($withVista == 0) ? "checked" : ""; ?> />
        <br />
        <label for="txtPhone">Teléfono de Contacto:</label>
        <input type="text" name="txtPhone" id="txtPhone" value="<?php echo $txtPhone; ?>"
            placeholder="504 98989898" />
        <br />
        <button type="submit" name="btnCrearReserva" id="btnCrearReserva">Reservar</button>
    </form>
</body>

</html>