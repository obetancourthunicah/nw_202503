<?php
/*
GET
POST


PostBack
*/
$txtNombre = "";
$txtEmail = "";
$intEdad = 10;
$txtMensaje = "";

if (isset($_POST["btnEnviar"])) {
    $txtNombre = $_POST["txtNombre"];
    $txtEmail = $_POST["txtEmail"];
    $intEdad = intval($_POST["intEdad"]);
    $txtMensaje = $intEdad . " " . $txtNombre . " " . $txtEmail;
}

if (isset($_POST["btnEnviar2"])) {
    $txtNombre = $_POST["txtNombre"];
    $txtEmail = $_POST["txtEmail"];
    $intEdad = intval($_POST["intEdad"]);
    $txtMensaje = $txtNombre . " " . $txtEmail . " " . $intEdad;
}

// + - * / 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario en PHP</title>
</head>

<body>
    <h1>Formulario HTML para procesar en PHP</h1>
    <form action="clase_1.php" method="post">
        <div>
            <label for="txtNombre">Nombre Completo:</label>
            <input type="text" required name="txtNombre" id="txtNombre" placeholder="John Doe" value="<?php echo $txtNombre; ?>" />
        </div>
        <div>
            <label for="txtEmail">Correo Electrónico:</label>
            <input type="email" required name="txtEmail" id="txtEmail" placeholder="johndoe@email.com" value="<?php echo $txtEmail; ?>" />
        </div>
        <div>
            <label for="intEdad">Edad:</label>
            <input type="number" required name="intEdad" id="intEdad" placeholder="25" value="<?php echo $intEdad; ?>" />
        </div>
        <div>
            <button type="submit" name="btnEnviar" id="btnEnviar">Enviar</button>
            <button type="submit" name="btnEnviar2" id="btnEnviar2">Enviar 2</button>
        </div>
    </form>
    <div>
        <?php
        echo $txtMensaje;
        ?>
    </div>
</body>

</html>