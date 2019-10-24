<div class="adm-grid aqua-gradient" id="adm-grid-all">
	<div class="adm-nav" style="background-image:url(<?php echo constant('URL'); ?>/public/img/cub2.png)">
		<div class="adm-title border-bottom border-white py-5">
			<h1 class="text-uppercase m-0">Administrador</h1>
		</div>
		<div class="adm-img cw-shadow-inset">
			<!-- <img src="" alt="" width="150px" height="150px" class="rounded shadow"> -->
			<i class="fa fa-grin-tears text-white bg-transparent fa-8x border-0 shadow-none"></i>
		</div>
		<nav class="adm-navbar overflow-auto">
			<ul>
				<li data-toggle="tooltip" data-placement="bottom" title="No funciono XD"><a href="#"><i class="fa fa-home"></i>&nbsp;&nbsp;<span class="small">Navegación</span></a></li>
				<li data-toggle="tooltip" data-placement="bottom" title="No funciono XD"><a href="#"><i class="fa fa-check"></i>&nbsp;&nbsp;<span class="small">Inicio</span></a></li>
				<li data-toggle="tooltip" data-placement="bottom" title="No funciono XD"><a href="#"><i class="fa fa-check"></i>&nbsp;&nbsp;<span class="small">¿Quiénes somos?</span></a></li>
				<li data-toggle="tooltip" data-placement="bottom" title="No funciono XD"><a href="#"><i class="fa fa-check"></i>&nbsp;&nbsp;<span class="small">Directorio</span></a></li>
				<li data-toggle="tooltip" data-placement="bottom" title="No funciono XD"><a href="#"><i class="fa fa-check"></i>&nbsp;&nbsp;<span class="small">Artículos</span></a></li>
				<li data-toggle="tooltip" data-placement="bottom" title="No funciono XD"><a href="#"><i class="fa fa-check"></i>&nbsp;&nbsp;<span class="small">Servicio Académico</span></a></li>
				<li data-toggle="tooltip" data-placement="bottom" title="No funciono XD"><a href="#"><i class="fa fa-check"></i>&nbsp;&nbsp;<span class="small">Redes</span></a></li>
				<li data-toggle="tooltip" data-placement="bottom" title="No funciono XD"><a href="#"><i class="fa fa-check"></i>&nbsp;&nbsp;<span class="small">Contáctanos</span></a></li>
			</ul>
		</nav>
	</div>
	<div class="adm-header  blue darken-2">
		<div class="container-fluid h-100">
			<div class="row h-100" style="position: relative">
				<div class="col-8 col-md-8 col-lg-5 col-xl-5 d-flex justify-content-start align-items-center h-100">
					<label for="adm-check-nav" class="rounded adm-btn-nav border btn-sm m-0"><i class="fa fa-times text-white" id="adm-icon-menu"></i></label>
					<input type="checkbox" id="adm-check-nav" autocomplete="off" class="d-none" onclick="checkAdmin()">
					<a href="#" data-toggle="tooltip" data-placement="bottom" title="No funciono XD" class="btn btn-outline-light btn-sm"><i class="fa fa-upload"></i>&nbsp;<span class="d-none d-md-block">Publicar Cambios</span></a>
				</div>
				<div class="col-lg-5 col-xl-6 d-none d-lg-flex justify-content-end align-items-center h-100">
					<span class="text-white text-uppercase font-weight-bold">User</span>
				</div>
				<div class="col-4 col-lg-2 col-xl-1 d-flex justify-content-end align-items-center h-100">
					<div class="btn-group dropleft" role="group">
						<button id="btnGroupDrop1" type="button" class="btn btn-outline-light rounded-circle dropdown-toggle d-flex px-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fa fa-cog"></i>
						</button>
						<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
							<!-- <button class="dropdown-item" data-toggle="modal" data-target="#cambiarClave"><i class="fa fa-key text-info"></i>&nbsp;Cambiar clave</button> -->
							<a href="./" class="dropdown-item"><i class="fa fa-power-off text-danger"></i>&nbsp;Salir</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="adm-body grey lighten-3 cw-shadow-inset overflow-auto position-relative">
		<div class="p-1 p-sm-3 p-md-4 p-lg-5">