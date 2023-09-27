<?php include_once "vistas/header.php";
include "../conexion.php";
if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['nombre']) || empty($_POST['correo']) || empty($_POST['usuario']) || empty($_POST['clave']) || empty($_POST['rol'])) {
        $alert = '<div class="alert alert-primary" role="alert">
                    Todo los campos son obligatorios
                </div>';
    } else {
        if ($_POST['rol'] === "Seleccionar"){
            $alert = '<div class="alert alert-danger" role="alert">
                        Selecciona el tipo de usuario
                    </div>';
        }
        else{
        $nombre = $_POST['nombre'];
        $email = $_POST['correo'];
        $user = $_POST['usuario'];
        $clave = $_POST['clave'];
        $rol = $_POST['rol'];

        $query = mysqli_query($conexion, "SELECT * FROM usuario where correo = '$email'");
        $result = mysqli_fetch_array($query);

        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                        El correo ya existe
                    </div>';
        } else {
            $query_insert = mysqli_query($conexion, "INSERT INTO usuario(nombre,correo,usuario,clave,rol) values ('$nombre', '$email', '$user', '$clave', '$rol')");
            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">
                            Usuario registrado
                        </div>';
            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar
                    </div>';
            }
        }
    }}
}
?>



<div class="container my-5">

    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-8  col-md-8">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-4">
                                <form action="" method="post" autocomplete="off">
                                    <?php echo isset($alert) ? $alert : ''; ?>
                                    <h1 class="h3 text-gray-900 mb-2 text-center">Nuevo usuario</h1>
                                    <div class="form-group">
                                        <h1 class="h5 text-gray-900 mb-2">Nombre</h1>
                                        <input type="text" class="form-control" placeholder="Ingrese Nombre"
                                            name="nombre" id="nombre" required>
                                    </div>
                                    <div class="form-group">
                                        <h1 class="h5 text-gray-900 mb-2">Correo</h1>
                                        <input type="email" class="form-control"
                                            placeholder="Ingrese Correo Electrónico" name="correo" id="correo" required>
                                    </div>
                                    <div class="form-group">
                                        <h1 class="h5 text-gray-900 mb-2">Usuario</h1>
                                        <input type="text" class="form-control" placeholder="Ingrese Usuario"
                                            name="usuario" id="usuario" required>
                                    </div>
                                    <div class="form-group">
                                        <h1 class="h5 text-gray-900 mb-2">Contraseña</h1>
                                        <input type="password" class="form-control" placeholder="Ingrese Contraseña"
                                            name="clave" id="clave" required>
                                    </div>
                                    <div class="form-group">
                                        <h1 class="h5 text-gray-900 mb-2">Tipo de usuario</h1>
                                        <select name="rol" id="rol" class="custom-select" required>
                                            <option selected>Seleccionar</option>
                                            <?php
                                            $query_rol = mysqli_query($conexion, " select * from rol");
                                            mysqli_close($conexion);
                                            $resultado_rol = mysqli_num_rows($query_rol);
                                            if ($resultado_rol > 0) {
                                                while ($rol = mysqli_fetch_array($query_rol)) {
                                            ?>
                                            <option value="<?php echo $rol["idrol"]; ?>"><?php echo $rol["rol"] ?>
                                            </option>
                                            <?php

                                                }
                                            }

                                            ?>
                                        </select>
                                    </div>

                                    <div class="text-center">
                                        <input type="submit" value="Guardar" class="btn btn-success btn-lg mb-3">
                                        <a href="lista_usuarios.php" class="btn btn-danger btn-lg mb-3">Cancelar</a>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






</div>
<!-- End of Main Content -->
<?php include_once "vistas/footer.php"; ?>