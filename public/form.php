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
    <title>Alta empleado</title>
    <link rel="stylesheet" href="../style/form.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chivo+Mono:ital,wght@0,100..900;1,100..900&family=DM+Serif+Text:ital@0;1&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=arrow_back_ios_new" />

</head>
<body>
    <header id="title">
        <a href="index.php">
            <span class="material-symbols-outlined">arrow_back_ios_new</span>
            <span id="volverInicio">Volver al inicio</span>
        </a>
        <h1>Alta de Empleado</h1>
    </header>
    <div id="formDiv">
        <form action="../src/validaciones.php" method="post" id="registerForm">
            <div id="registerFormDiv">
                <div id="formFieldsets">
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
            
                        <label for="telefono">Teléfono</label>
                        <input type="tel" name="telefono" id="telefono">
                    </fieldset>
            
                    <fieldset class="form-field" id="datosEmpresa">
                        <legend>Datos Empresa</legend>
            
                        <label for="fechaAlta">Fecha de alta</label>
                        <input type="date" name="fechaAlta" id="fechaAlta">
            
                        <?php
                            selectProvincia();
                            selectSede();
                            selectDepartamento();
                        ?>
                    </fieldset>
                </div>
                <input type="submit" value="Darse de alta en Alca Chofas" id="submit">
            </div>
        </form>
    </div>
</body>
</html>