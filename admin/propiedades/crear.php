<?php

// Base de datos
require '../../includes/config/database.php';

$db = concetarDB();

// var_dump($db);



require '../../includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1> Crear </h1>
    <a href="/admin" class="boton boton-verde"> Volver </a>

    <form class="formulario" method="GET" action="/admin/propiedades/crear.php">
        <fieldset>
            <legend>Información general</legend>

            <label for="titulo">Titulo: </label>
            <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad">

            <label for="precio">Precio: </label>
            <input type="number" id="precio" name placeholder="Precio Propiedad">

            <label for="imagen">Imagen: </label>
            <input type="file" id="imagen" accept="image/jpeg, image/png">

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion"></textarea>
        </fieldset>

        <fieldset>
            <legend>Información de la Propiedad</legend>

            <label for="habitaciones">Habitaciones: </label>
            <input type="number" id="habitaciones" placeholder="Ej: 3" min = "1" max = "9">

            <label for="banos">Bañoz: </label>
            <input type="number" id="banos" placeholder="Ej: 3" min = "1" max = "9">

            <label for="estacionamiento">Estacionamiento: </label>
            <input type="number" id="estacionamiento" placeholder="Ej: 3" min = "1" max = "9">

        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>
            <select>
                <option value="1">José</option>
                <option value="2">Nicki</option>
                <option value="3">Santiago</option>
            </select>
        </fieldset>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>
</main>
<?php
incluirTemplate('footer');
?>