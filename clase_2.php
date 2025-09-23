<?php
const MESSAGE_TO_SHOW = "Mensaje a mostrar: ";

$intCiclos = 1;
$htmlResult = "";

$arrMensajes = [];
$assocMessage = [];
$fake5Element = [];


if (isset($_POST["btnEnviar"])) {
    $intCiclos = intval($_POST["txtCiclos"]) ?? 0;
    for ($i = $intCiclos; $i >= 1; $i--) {
        $htmlResult .= MESSAGE_TO_SHOW . $i . '<br/>';
        $arrMensajes[] = MESSAGE_TO_SHOW . $i . '<br/>';
        $assocMessage['llave' . $i] = MESSAGE_TO_SHOW . $i . '<br/>';
        $fake5Element[] = MESSAGE_TO_SHOW . $i . '<br/>';
        if (($i % 5) == 0) {
            $fake5Element[4] = 'Special ' . MESSAGE_TO_SHOW . $i . '<br/>';
            $fake5Element[10] = 'Special 10 ' . MESSAGE_TO_SHOW . $i . '<br/>';
        }
    }
    $j = 0;
    while ($j < $intCiclos) {
        $htmlResult .= 'while - ' . MESSAGE_TO_SHOW . ($j + 1) . '<br/>';
        $j++;
    }
    $k = -2;
    do {
        $htmlResult .= 'do while - ' . MESSAGE_TO_SHOW . ($k + 1) . '<br/>';
        $k++;
    } while ($k == 0);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ciclos</title>
</head>

<body>
    <h1>Ciclos en PHP</h1>
    <form action="clase_2.php" method="post">
        <label for="txtCiclos">Ciclos</label>
        <input type="number" name="txtCiclos" id="txtCiclos" placeholder="1 - 100"
            min="1" max="100" step="1" value="<?php echo $intCiclos; ?>" />

        <br />
        <button type="submit" name="btnEnviar" id="btnEnviar">Enviar</button>
    </form>
    <?php
    if (!empty($htmlResult)) {
        echo '<div>' . $htmlResult . '</div>';
    }
    if (count($arrMensajes) > 0) {
        echo count($arrMensajes);
        foreach ($arrMensajes as $msg) {
            echo 'from array ' . $msg;
        }
    }
    if (count($assocMessage) > 0) {
        echo count($assocMessage);
        echo "5to Elemento: " . $assocMessage["llave5"];
        foreach ($assocMessage as $llave => $msg) {
            echo 'from array ' . $llave . ' -> ' . $msg;
        }
    }
    if (count($fake5Element) > 0) {
        echo count($fake5Element);
        echo "5to Elemento: " . $fake5Element[6];
        foreach ($fake5Element as $llave => $msg) {
            echo 'from array ord ' . $llave . ' -> ' . $msg;
        }
    }
    ?>
</body>

</html>