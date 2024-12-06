<?php 

$carga = fn($clase)=> require("class/$clase.php");
spl_autoload_register($carga);



$examen = $_POST["examen"] ?? null;
$preguntaActual = $_POST["preguntaActual"] ?? 0;
$msj = '';

var_dump($preguntaActual);

if(is_null($examen)){
    $imagenes = Videojuegos::$videojuegos;
    foreach ($imagenes as $seccion => $contenido) {
        $secciones[] = $seccion;
    }
    $seccion = $secciones[rand(0,count($secciones)-1)];

    $examen = new Examen($seccion, $imagenes, 2);
    
    $img = $examen->url_first_img();

    $examen = $examen->serializa_examen(); // dentro lo serializaría

} else {
    $examen = Examen::unserialize_examen($examen);
    $img = $_POST['img'] ?? null;

}

$accion = $_POST['submit'] ?? null;

switch ($accion) {
    case 'GUESS':
        $userGuess = strtolower(trim($_POST['textUser']));
        $correctAnswer = $examen->get_correct_answer($img);

        if($correctAnswer === $userGuess){
            $lastImg = $img;
            $preguntaActual++;
            $img = $examen->siguienteImg($preguntaActual);
        } 

        if(is_null($img)){
            $img = $lastImg;
            $msj = "Has ganado!";
        }

     $examen = $examen->serializa_examen();
     break;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videogame Test</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="contenedor">
        <h1>Guess The Game</h1>
        <h2><?= $msj ?? "" ?></h2>   

        <div class="card">
        <img src="<?="images/$img"?>" alt="">
        </div>

        <fieldset>
            <form action="index.php" method="post">
                <input type="text" name="textUser" class="textUser">
                <input type="submit" value="GUESS" name="submit" class="guessBtn">

                <input type="hidden" name="examen" value="<?=htmlspecialchars($examen)?>">
                <input type="hidden" name="img" value="<?=htmlspecialchars($img)?>">
                <input type="hidden" name="preguntaActual" value="<?=$preguntaActual?>">
            </form>
        </fieldset>

    </div>
</body>
</html>