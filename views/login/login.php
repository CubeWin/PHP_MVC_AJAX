		<div class="cw-full-screen d-flex justify-content-center align-items-center" style="background-image:url(<?php echo constant('URL'); ?>/public/img/cub2.png)">
			<div class="wrapper d-flex justify-content-center align-items-center blue-gradient">
				<form autocomplete="off" onsubmit="return false" class="cw-form-login text-center" id="login">
					<h1 class="cw-font-futura font-weight-bold text-white">Bienvenido</h1>
					<input type="text" class="font-weight-bold" required name="usuario" placeholder="Usuario" id="usuarioInput" minlength="4">
					<label for="usuarioInput" class="error yellow-text small d-block"></label>
					<input type="password" class="font-weight-bold" required name="password" placeholder="clave" id="passwordInput" minlength="4">
					<label for="passwordInput" class="error yellow-text small d-block"></label>
					<button id="enviar" type="submit" onclick="loginUser();">Validar <i class="fa fa-sign-in-alt"></i></button>
					<div>
						<div id="respuestaPost" class="card-body">
						</div>
					</div>
				</form>
				<ul class="bg-bubbles">
					<li></li>
					<li></li>
					<li></li>
					<li class="d-flex align-items-center justify-content-center"><i class="fa fa-grin-tears text-white fa-2x"></i></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
				</ul>
			</div>
		</div>