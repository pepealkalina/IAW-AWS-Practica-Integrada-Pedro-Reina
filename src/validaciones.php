<?php
include("datos.php");

foreach ($_POST as $key => $value) {
    // sanitizamos cada entrada de los caracteres especiales
    $$key = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function validateMail($mail) {
    //sanitizamos el mail
    $sanitizeMail = filter_var(trim($mail), FILTER_SANITIZE_EMAIL);

    //como html tiene un input que obliga a escribir el email con un formato solo voy a mirar si el correo es del dominio alcachofas.es
    if (!strstr($mail, "alcachofas.es")) {
        $returnMail = "El email es erroneo, tiene que ser de @alcachofas.es.";
    } else {
        $returnMail = $sanitizeMail;
    }
    return $returnMail;
}

function validateDni($dni) {
    $cleanDni = strtoupper(trim($dni));

    if (!preg_match("/^[0-9]{8}[A-Z]$/", $dni )) {
        $returnDni = "El DNI es erroneo, el formato tiene q ser 12345678A.";
    } else {
        $returnDni = $cleanDni;
    }
    return $returnDni;
}

function validateProvinciaSede($provincia, $sede) {
    if ($GLOBALS["provincias_alca_chofa"][$provincia]["sede"] == $sede) {
        $returnSede = $sede;
    } else {
        $returnSede = "La sede es erronea, esta tiene que coincidir con la provincia.";
    }
    return $returnSede;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validacion de datos</title>

    <link rel="stylesheet" href="../style/validaciones.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chivo+Mono:ital,wght@0,100..900;1,100..900&family=DM+Serif+Text:ital@0;1&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=arrow_back_ios_new" />
</head>
<body>
    <header>
        <h1>Validacion de datos</h1>
    </header>
    <div id="infoDiv">
        <?php
            $validatedDni = validateDni($dni);
            $validatedMail = validateMail($mail);
            $validatedSede = validateProvinciaSede($provincia, $sede);

            echo "<span class='infoSpan'><b>Nombre: </b> $nombre $apellidos</span>";
            echo '<span class="infoSpan"><b>DNI:</b> <span id="validatedInfo">'.$validatedDni.'</span></span>';
            echo '<span class="infoSpan"><b>Correo Electrónico:</b> <span id="validatedInfo">'.$validatedMail.'</span></span>';
            echo "<span class='infoSpan'><b>Teléfono: </b> $telefono</span>";
        
            echo "<span class='infoSpan'><b>Provincia:</b> $provincia</span>";
            echo '<span class="infoSpan"><b>Sede:</b> <span id="validatedInfo">'.$validatedSede.'</span></span>';
            echo "<span class='infoSpan'><b>Departamento:</b> $departamento</span>";
        ?>
    </div>
</body>
</html>