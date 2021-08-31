<?php

$priceDrink = 500;
$priceHotDog = array(
    "normal" => 3000,
    "big" => 5000,
    "biggest" => 7000
);
$priceBurger = array(
    "normal" => 4000,
    "double" => 6000,
    "big" => 8000
);

$sale = $_POST["sale"];

echo '<form action="restaurant.php" method="POST">';
echo '<div>
    <label for="drink">Cantidad de bebida ($500 cada ml)</label>
    <input type="number" value="0" min="0" id="drink" required name="drink" />
</div>';
echo '<br /><div>
    <label for="hotDog">Perros</label>
    <select id="hotDog" name="hotDog">
        <option value="N" selected>No</option>
        <option value="normal">Normal ($3.000)</option>
        <option value="big">Grande ($5.000)</option>
        <option value="biggest">Enorme ($7.000)</option>
    </select>
    <input name="cantHotDog" type="number" min="0" placeholder="Cantidad de perros a comprar" />
    </div>';
    echo '<br /><div>
    <label for="burger">Hamburguesa</label>
    <select id="burger" name="burger">
    <option value="N" selected>No</option>
    <option value="normal">Sencilla ($4.000)</option>
    <option value="double">Doble ($6.000)</option>
    <option value="big">Gigante ($8.000)</option>
    </select>
    <input name="cantBurger" type="number" min="0" placeholder="Cantidad de hamburguesas a comprar" />
</div>';
echo '<br /><div>
    <label for="methodPay">Metodo de pago</label>
    <select id="methodPay" name="methodPay">
        <option value="cash" selected>Efectivo</option>
        <option value="card">Tarjeta</option>
    </select>
</div>';
echo '<br /><div>
    <button type="submit" value="sendUser" name="sale">Facturar</button>
    <button type="reset" id="buttonResetForm" value="resetUser">Limpiar</button>
</div>';
echo '</form>';

if(isset($sale)){
    $cantDrink = $_POST["drink"];
    $hotDog = $_POST['hotDog'];
    $burger = $_POST['burger'];
    $methodPay = $_POST['methodPay'];
    $cantHotDog = $_POST['cantHotDog'];
    $cantBurger = $_POST['cantBurger'];
    $totalDrinks = 0;
    $totalHotDog = 0;
    $totalBurger = 0;
    $total = 0;
    
    while($cantDrink > 0) {
        $totalDrinks += 500;
        $cantDrink -= 100;
    }

    switch($hotDog) {
        case 'normal':
            $totalHotDog += ($cantHotDog * 3000);
            break;
        case 'big':
            $totalHotDog += ($cantHotDog * 5000);
            break;
        case 'biggest':
            $totalHotDog += ($cantHotDog * 7000);
            break;
    }

    switch($burger) {
        case 'normal':
            $totalBurger += ($cantBurger * 4000);
            break;
        case 'double':
            $totalBurger += ($cantBurger * 6000);
            break;
        case 'big':
            $totalBurger += ($cantBurger * 8000);
            break;
    }

    $total += ($totalDrinks + $totalHotDog + $totalBurger);
    if($total > 30000){
        $total -= ($total * 0.3);
    }else if($total >= 26000){
        $total -= ($total * 0.25);
    }else if($total >= 16000){
        $total -= ($total * 0.2);
    }else if($total > 10000){
        $total -= ($total * 0.1);
    }

    switch($methodPay){
        case 'cash': 
            $total -= ($total * 0.05);
            break;
        case 'card':
            $total += ($total * 0.05);
            break;
    }

    $total = number_format($total, 2);
    echo "Valor a cobrar: $$total";
}
