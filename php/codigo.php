function generarEAN13() {
    $codigo = '';
    for ($i = 0; $i < 12; $i++) {
        $codigo .= mt_rand(0, 9);
    }
    return $codigo . calcularDigitoControlEAN13($codigo);
}

function calcularDigitoControlEAN13($codigo) {
    $suma = 0;
    for ($i = 0; $i < 12; $i++) {
        $num = (int)$codigo[$i];
        $suma += ($i % 2 === 0) ? $num : $num * 3;
    }
    $resto = $suma % 10;
    return ($resto === 0) ? 0 : 10 - $resto;
}

// Generar 10 códigos válidos:
for ($i = 0; $i < 10; $i++) {
    echo generarEAN13() . "<br>";
}
