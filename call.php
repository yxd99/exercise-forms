<?php

$dictionary = array(
    "America_del_norte" => array(
        "min" => 12,
        "max" => 14,
        "price" => 2
    ),
    "America_central" => array(
        "min" => 15,
        "max" => 17,
        "price" => 2.2
    ),
    "America_del_sur" => array(
        "min" => 18,
        "max" => 20,
        "price" => 4.5
    ),
    "Europa" => array(
        "min" => 21,
        "max" => 23,
        "price" => 3.5
    ),
    "Asia" => array(
        "min" => 24,
        "max" => 27,
        "price" => 6
    ),
    "Africa" => array(
        "min" => 28,
        "max" => 30,
        "price" => 6
    ),
    "Oceania" => array(
        "min" => 31,
        "max" => 33,
        "price" => 5
    )
);

echo '<form action="call.php" method="POST">';
echo '<div>
    <label for="code">Código</label>
    <input type="number" min="12" max="33" id="code" required name="code" />
</div>';
echo '<div>
    <label for="minutes">Minutos ocupados</label>
    <input type="number" min="1" id="minutes" name="minutes" required />
</div>';
echo '<div>
    <button type="submit" value="sendUser">Enviar</button>
    <button type="reset" id="buttonResetForm" value="resetUser">Limpiar</button>
</div>';
echo '</form>';


if (isset($_POST['code'])) {
    $code =  $_POST['code'];
    $minutes = $_POST['minutes'];

    $keysDictionary = array_keys($dictionary);

    foreach ($keysDictionary as $value) {
        if (($code >= $dictionary[$value]["min"]) && ($code <= $dictionary[$value]["max"])) {
            $continent = $value;
            break;
        }
    }

    $total = number_format(($minutes * $dictionary[$continent]["price"]), 2);
    echo "
        <p>Continente: $continent</p>
        <p>Minutos: $minutes</p>
        <p>Total: $$total</p>
    ";
}
