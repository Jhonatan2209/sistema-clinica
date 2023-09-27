<?php
include "vistas/header.php";
include "../conexion.php";
if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['nombre']) || empty($_POST['correo']) || empty($_POST['usuario']) || empty($_POST['rol'])) {
        $alert = '<p class"error">Todo los campos son requeridos</p>';
    } else {
        $idusuario = $_GET['id'];
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $usuario = $_POST['usuario'];
        $contra = $data['clave'];
        $rol = $_POST['rol'];

        $sql_update = mysqli_query($conexion, "UPDATE usuario SET nombre = '$nombre', correo = '$correo' , usuario = '$usuario', clave='$contra', rol = $rol WHERE idusuario = $idusuario");
        $alert = '<p>Usuario Actualizado</p>';
    }
}

// Mostrar Datos

if (empty($_REQUEST['id'])) {
    header("Location: lista_usuarios.php");
}
$idusuario = $_REQUEST['id'];
$sql = mysqli_query($conexion, "SELECT * FROM usuario WHERE idusuario = $idusuario");
$result_sql = mysqli_num_rows($sql);
if ($result_sql == 0) {
    header("Location: lista_usuarios.php");
} else {
    if ($data = mysqli_fetch_array($sql)) {
        $idcliente = $data['idusuario'];
        $nombre = $data['nombre'];
        $correo = $data['correo'];
        $contra = $data['clave'];
        $usuario = $data['usuario'];
        $rol = $data['rol'];
    }
}
?>

<div class="container my-5">

    <div class="row justify-content-center">
        <div class="col-xl-8  col-md-8">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-4">
                                <form action="" method="post" autocomplete="off">
                                    <?php echo isset($alert) ? $alert : ''; ?>
                                    <h1 class="h3 text-gray-900 mb-2 text-center">Editar usuario</h1>
                                    <div class="form-group">
                                        <h1 class="h5 text-gray-900 mb-2">Nombre</h1>
                                        <input type="text" placeholder="Ingrese nombre" class="form-control"
                                            name="nombre" id="nombre" value="<?php echo $nombre; ?>">
                                    </div>
                                    <div class="form-group">
                                        <h1 class="h5 text-gray-900 mb-2">Correo</h1>
                                        <input type="text" placeholder="Ingrese correo" class="form-control"
                                            name="correo" id="correo" value="<?php echo $correo; ?>">
                                    </div>
                                    <div class="form-group">
                                        <h1 class="h5 text-gray-900 mb-2">Usuario</h1>
                                        <input type="text" placeholder="Ingrese usuario" class="form-control"
                                            name="usuario" id="usuario" value="<?php echo $usuario; ?>">
                                    </div>
                                    <div class="form-group">
                                        <h1 class="h5 text-gray-900 mb-2">Contraseña</h1>
                                        <input type="password" placeholder="Ingrese contraseña" class="form-control"
                                            name="contra" id="contra" value="<?php echo $contra; ?>">
                                    </div>
                                    <div class="form-group">
                                        <h1 class="h5 text-gray-900 mb-2">Tipo de usuario</h1>
                                        <select name="rol" id="rol" class="form-control">
                                            <option value="1" <?php
                                                                if ($rol == 1) {
                                                                    echo "selected";
                                                                }
                                                                ?>>Administrador</option>
                                            <option value="2" <?php
                                                                if ($rol == 2) {
                                                                    echo "selected";
                                                                }
                                                                ?>>Docente</option>
                                            <option value="3" <?php
                                                                if ($rol == 3) {
                                                                    echo "selected";
                                                                }
                                                                ?>>Auxiliar</option>
                                            <option value="4" <?php
                                                                if ($rol == 4) {
                                                                    echo "selected";
                                                                }
                                                                ?>>Tecnico</option>
                                            <option value="5" <?php
                                                                if ($rol == 5) {
                                                                    echo "selected";
                                                                }
                                                                ?>>Psicologico</option>
                                            <option value="6" <?php
                                                                if ($rol == 6) {
                                                                    echo "selected";
                                                                }
                                                                ?>>Enfermero</option>
                                        </select>
                                    </div>

                                    <div class="text-center">
                                        <input type="submit" value="Actualizar" class="btn btn-success btn-lg mb-3">
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

<?php include_once "vistas/footer.php"; ?>