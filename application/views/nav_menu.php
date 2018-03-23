<header class="mdl-layout__header">
	<div class="mdl-layout__header-row">
		<div class="mdl-layout-spacer"></div>
		<nav class="mdl-navigation">
			<a class="mdl-navigation__link" href="venta.php">Nueva Venta</a>
			<a class="mdl-navigation__link" href="anular.php">Anular Venta</a>
			<a class="mdl-navigation__link" href="cierre-caja.php">Cierre Caja</a>
			<a class="mdl-navigation__link" href="inventario.php">Inventario</a>			
			<a class="mdl-navigation__link" href="cliente.php">Cliente</a>
			<a class="mdl-navigation__link" href="informes.php">Informes</a>
			<a onclick="logout()" class="mdl-navigation__link" href="#"><i class="material-icons powerIcon">power_settings_new</i></a>
		</nav>            
	</div>
</header>
<?php 
	session_start();
	if('/Intranet-optica/application/views/login.php'!=$_SERVER['REQUEST_URI']){
		if(!is_numeric(@$_SESSION['usuario'])){
		echo "<script>location.href='login.php'</script>";
		}
	}
	
?>