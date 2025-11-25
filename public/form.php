<?php
    include("../src/datos.php");

    function selectProvincia() {
        echo '<label for="provincia">Provincia</label>';
        
        $htmlProvincia = '<select name="provincia">';
        $htmlProvincia .= '<option value="">Selecciona una provincia</option>';
        
        $provinciasGlobal = $GLOBALS['provincias_alca_chofa'];
        foreach ($provinciasGlobal as $provincia => $value) {
            $htmlProvincia .= "<option value='$provincia'>$provincia</option>";
        }
        $htmlProvincia .= "</select>";
        echo $htmlProvincia;
    }
    function selectSede() {
        echo '<label for="sede">Sede</label>';

        $htmlSede = '<select name="sede">';
        $htmlSede .= '<option value="">Selecciona una sede</option>';

        $provinciasGlobal = $GLOBALS['provincias_alca_chofa'];
        foreach ($provinciasGlobal as $provincia => $value) {
            $sede = $provinciasGlobal[$provincia]['sede'];
            $htmlSede .= "<option value='$sede'>$sede</option>";
        }

        $htmlSede .= "</select>";
        echo $htmlSede;
    }

    function selectDepartamento() {
        echo '<label for="departamento">Departamento</label>';
        
        $htmlDep = '<select name="departamento">';
        $htmlDep .= '<option value="">Selecciona un departamento</option>';
        
        $departamentos = $GLOBALS['departamentos_base'];
        foreach ($departamentos as $departamento) {
            $htmlDep .= "<option value='$departamento'>$departamento</option>";
        }

        $htmlDep .= "</select>";
        echo $htmlDep;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/form.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chivo+Mono:ital,wght@0,100..900;1,100..900&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Lexend:wght@100..900&display=swap" rel="stylesheet"> 
</head>
<body>
    <header id="title">
        <h1>Alta de Empleado</h1>
    </header>
    <form action="../src/validaciones.php" method="post" id="registerForm">
        <fieldset class="form-field" id="datosPersonales">
            <legend>Datos personales</legend>

            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre">

            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" id="apellidos">

            <label for="dni">DNI</label>
            <input type="text" name="dni" id="dni">

            <label for="mail">Correo electrónico</label>
            <input type="email" name="mail" id="mail">

            <label for="telefono">Telefóno</label>
            <input type="tel" name="telefono" id="telefono">
        </fieldset>

        <fieldset class="form-field" id="datosEmpresa">
            <legend>Datos Empresa</legend>

            <label for="nombre">Fecha de alta</label>
            <input type="date" name="nombre" id="nombre">

            <?php
                selectProvincia();
                selectSede();
                selectDepartamento();
            ?>
        </fieldset>
        <input type="submit" value="Darse de alta en Alca Chofas" id="submit">
    </form>
</body>
</html>