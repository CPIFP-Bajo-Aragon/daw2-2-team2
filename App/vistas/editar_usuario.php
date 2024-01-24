<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
</head>
<body>
<h1>Editar Usuarios</h1>
<table>
    <tr>
        <td>#</td>
        <td>Nombre</td>
        <td>email</td>
        <td>Telefono</td>
    </tr>
    <?php foreach($datos['usuarios'] as $usuario):    ?>
        <tr>
            <td><?php echo $usuario->id_usuario ?></td>
            <td><?php echo $usuario->nombre ?></td>
            <td><?php echo $usuario->email ?></td>
            <td><?php echo $usuario->telefono ?></td>

        </tr>
    <?php endforeach?>
</table>
<?php
    print_r($datos['usuarios']);
?>
</body>
</html>