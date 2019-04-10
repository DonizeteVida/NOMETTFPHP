<?php

$dimensions = [
    1920, 
    1080
];

$names = [
    "aaaaaaaa",
    "Donizete Junior Ribeiro Vida",
    "Rafael dos Santos",
    "José de Morais",
    "Cláudio Aparecido"
];

function writeWord($word, $img, $color, $posX, $poxY, $size)
{
    imagettftext($img, $size, 0, $posX, $poxY, $color, "C:/xampp/htdocs/charlotte.ttf",
    $word);
}

function getWord($arrayNames = [], $dimensions = [], $size, $img, $color, $spaceY, $extraSizeOfLetter){

    for($i = count($arrayNames) - 1; $i >= 0; $i--){

        $actualName = $arrayNames[$i];
        $lengthName = strlen($actualName);

        $localX = $dimensions[0] - ($lengthName * $size);

        $localX += $extraSizeOfLetter * $lengthName;

        $localY = $dimensions[1] - (($size / $spaceY) * ($i * 2));

        debug([$actualName, $localX]);

        writeWord($actualName, $img, $color, $localX, $localY, $size);
    }
}

function debug($itens = []){
    var_dump($itens);
}

$im = imagecreate($dimensions[0], $dimensions[1]);

$white = imagecolorallocate($im, 0, 0, 255);
$black = imagecolorallocate($im, 0, 0, 0);

getWord($names, $dimensions, 50, $im, $black, 1.5, 5);
//os nomes, o tamanho da imagem, o tamanho da letra
//a imagem, a cor da letra, o espacamento, e o espaço extra de uma letra sozinha

imagejpeg($im, "imagem.jpeg", 100);
imagedestroy($im);


?>