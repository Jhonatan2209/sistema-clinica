<?php include_once "vistas/header.php"; ?>

<?php
include "../conexion.php";
$alert = '';

if (!empty($_POST)) {
    if (empty($_POST['actual']) || empty($_POST['nueva']) || empty($_POST['confirmar'])) {
        $alert = '<div class="alert alert-danger" role="alert">
                    Por favor, completa todos los campos.
                </div>';
    } else {
        // Obtén el ID de usuario de la sesión actual
        $id = $_SESSION['idUser'];
        
        // Obtén los valores del formulario
        $contrasena_actual = $_POST['actual'];
        $nueva_clave = $_POST['nueva'];
        $confirmar_clave = $_POST['confirmar'];

        // Obtén la contraseña actual del usuario desde la base de datos
        $query = "SELECT clave FROM usuario WHERE idusuario = $id";
        $result = mysqli_query($conexion, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $contrasena_actual_bd = $row['clave'];

            // Verifica si la contraseña actual coincide con la almacenada en la base de datos
            if ($contrasena_actual === $contrasena_actual_bd) {
                // La contraseña actual es correcta, ahora verifica que la nueva contraseña y la confirmación coincidan
                if ($nueva_clave === $confirmar_clave) {
                    // Actualiza la contraseña en la base de datos (sin hash)
                    $update_query = "UPDATE usuario SET clave = '$nueva_clave' WHERE idusuario = $id";

                    if (mysqli_query($conexion, $update_query)) {
                        mysqli_close($conexion);
                        $alert = '<div class="alert alert-success" role="alert">
                                    Contraseña actualizada exitosamente.
                                </div>';
                    } else {
                        $alert = '<div class="alert alert-danger" role="alert">
                                    Error al actualizar la contraseña: ' . mysqli_error($conexion) . '
                                </div>';
                    }
                } else {
                    $alert = '<div class="alert alert-danger" role="alert">
                                La nueva contraseña y la confirmación no coinciden. Por favor, verifica.
                            </div>';
                }
            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                            La contraseña actual es incorrecta.
                        </div>';
            }
        } else {
            $alert = '<div class="alert alert-danger" role="alert">
                        Error al obtener la contraseña actual desde la base de datos.
                    </div>';
        }
    }
}
?>


<!-- Contenedor -->
<div class="container-fluid">

    <!-- Encabezado de página -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Opciones</h1>
    </div>

    <!-- Fila de contenido -->
    <div class="row">

        <!-- tarjetas-->
        <a class="col-xl-3 col-md-6 mb-4" href="lista_usuarios.php">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Permisos</div>

                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>

        <!-- tarjetas-->
        <a class="col-xl-3 col-md-6 mb-4" href="apoyo.php">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Solicitar apoyo</div>

                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>

        <!-- tarjetas-->
        <a class="col-xl-3 col-md-6 mb-4" href="lista_productos.php">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Reportes</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">

                                </div>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>

        <!-- tarjetas-->
        <a class="col-xl-3 col-md-6 mb-4" href="informacion.php">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Informacion</div>

                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!-- Perfil -->
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
                                    <div class="card-body">
                                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                            <h1 class="h3 mb-0 text-gray-800">Perfil</h1>
                                        </div>
                                        <div class="form-group">
                                            <label>Nombre: <strong><?php echo $_SESSION['nombre']; ?></strong></label>
                                        </div>
                                        <div class="form-group">
                                            <label>Correo: <strong><?php echo $_SESSION['email']; ?></strong></label>
                                        </div>
                                        <div class="form-group">
                                            <label>Rol: <strong><?php echo $_SESSION['rol_name']; ?></strong></label>
                                        </div>
                                        <div class="form-group">
                                            <label>Usuario: <strong><?php echo $_SESSION['user']; ?></strong></label>
                                        </div>
                                        <ul class="list-group">
                                            <li class="list-group-item active">Cambiar Contraseña</li>
                                            <form method="post" name="frmChangePass" id="frmChangePass" class="p-3">
                                                <?php echo isset($alert) ? $alert : ""; ?>
                                                <div class="form-group">
                                                    <label>Contraseña Actual</label>
                                                    <input type="password" name="actual" id="actual"
                                                        placeholder="Clave Actual" required class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Nueva Contraseña</label>
                                                    <input type="password" name="nueva" id="nueva"
                                                        placeholder="Nueva Clave" required class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Confirmar Contraseña</label>
                                                    <input type="password" name="confirmar" id="confirmar"
                                                        placeholder="Confirmar clave" required class="form-control">
                                                </div>
                                                <div class="alertChangePass" style="display:none;">
                                                </div>
                                                <div>
                                                    <button type="submit" class="btn btn-primary btnChangePass">Cambiar
                                                        Contraseña</button>
                                                </div>
                                            </form>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- /.Fin contenedor -->

</div>
<!-- Fin contenido principal -->

<?php include_once "vistas/footer.php"; ?>