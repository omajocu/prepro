<body class="modern-ui">
    <div class="page secondary fixed-header">
        <div class="page-header ">
            <div class="page-header-content">
            
                <div class="user-login">
                    <a href="#">
                        <div class="name">
                            <span class="first-name">IE CGP</span>
                            <span class="last-name">dn10424</span>
                        </div>
                        <div class="avatar">
                            <img src="images/myface.jpg"/>
                        </div>
                    </a>
            	</div>
                <a href="index.php"><h1>CGP Iberia</h1></a>
            </div>
    	</div>
        
	<div class="page-region">
            <div class="span13">
                <div class="nav-bar">
                    <div class="nav-bar-inner">
                        <span class="element brand"></i>Gestion de Incidencias</span>
                        <span class="divider"></span>

                        <ul class="menu">
                            <li><a href="index.php"><i class="icon-home" title="Inicio"></i></a></li>
                            <li><a href="#" onclick="NuevaIncidencia()"><i class="icon-plus-2" title="Crear nueva incidencia"></i></a></li>
                            <li><a href="#" onclick="BuscaCerradas()"><i class="icon-search" title="Realizar busqueda en el historico"></i></a></li>
                            <li> </li>
                            <li> </li>
                            <li><a href="#" onclick="SelecAdmin()"><i class="icon-wrench" title="Administra las categorias"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="span13" style="background-color: #ccc; height: 100%;">
                <div class="page bg-color-white" style="width: 100%; padding: 20px;">
                    <div id="Listado" name="Listado">