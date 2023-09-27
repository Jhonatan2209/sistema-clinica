<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center " href="index.php">
        <div class="sidebar-brand-text mx-3">Hospital Carlos Showing</div>
        <div class="sidebar-brand-icon p-3">
            <img src="../logo.jpg" class="img-thumbnail">
        </div>

    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Opciones
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsepaciente"
            aria-expanded="true" aria-controls="collapsepaciente">
            <i class="fas fa-users"></i>
            <span>Pacientes</span>
        </a>
        <div id="collapsepaciente" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="nuevo_permiso.php">Registrar paciente</a>
                <a class="collapse-item" href="ver_permiso.php">Ficha del paciente</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-notes-medical"></i>
            <span>Informacion Medica</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="nuevo_permiso.php">Registrar Historia clinica</a>
                <a class="collapse-item" href="nuevo_permiso.php">Consultar Historia clinica</a>
                <a class="collapse-item" href="ver_permiso.php">Antecendentes </a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseexamenes"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-diagnoses"></i>
            <span>Examenes y pruebas</span>
        </a>
        <div id="collapseexamenes" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="nuevo_permiso.php">Registrar Examen</a>
                <a class="collapse-item" href="nuevo_permiso.php">Historial de examenes</a>

            </div>
        </div>
    </li>

    <!-- Nav Item - Clientes Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsecitas" aria-expanded="true"
            aria-controls="collapseUtilities">
            <i class="fas fa-calendar-alt"></i>
            <span>Citas y recordatorios</span>
        </a>
        <div id="collapsecitas" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="nuevo_reporte.php">Nueva cita</a>
                <a class="collapse-item" href="ver_reporte.php">Citas programadas</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseClientes"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-user-md"></i>
            <span>Medicos</span>
        </a>
        <div id="collapseClientes" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="nuevo_reporte.php">Registrar Medico</a>
                <a class="collapse-item" href="ver_reporte.php">Medicos</a>
            </div>
        </div>
    </li>



    <?php if ($_SESSION['rol'] == 1) { ?>
    <!-- Nav Item - Usuarios Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsuarios"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-user"></i>
            <span>Usuarios</span>
        </a>
        <div id="collapseUsuarios" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="registro_usuario.php">Nuevo Usuario</a>
                <a class="collapse-item" href="lista_usuarios.php">Usuarios</a>
            </div>
        </div>
    </li>
    <?php } ?>

</ul>