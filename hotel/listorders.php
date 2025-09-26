<?php
require_once "library.php";

$reservasDeHotel = obtenerReservas();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Reservas</title>
</head>

<body>
    <h1>Listado de Reservas</h1>

    <table>
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Adultos</th>
                <th>Niños</th>
                <th>Habitación</th>
                <th>Vista</th>
                <th>Contacto</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($reservasDeHotel as $laReserva) { ?>
                <tr>
                    <td><?php echo $laReserva["cliente"]; ?></td>
                    <td><?php echo $laReserva["adultos"]; ?></td>
                    <td><?php echo $laReserva["infantes"]; ?></td>
                    <td>
                        <?php  //echo $laReserva["habitacion"]; 
                        $habitacion = getHabitacionDetail($laReserva["habitacion"]);
                        echo $habitacion["description"] . "<br/>";
                        echo "No. Camas: " . $habitacion["camas"];
                        ?>
                    </td>
                    <td><?php echo $laReserva["vista"]; ?></td>
                    <td><?php echo $laReserva["telefono"]; ?></td>
                </tr>
            <?php } //foreach $reservasDeHotel 
            ?>
        </tbody>
    </table>
</body>

</html>