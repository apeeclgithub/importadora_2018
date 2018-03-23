<?php include('header.php');?>
<?php include('nav_menu.php') ?>
<div id ="content">
	<h2>ANULAR VENTA</h2>

	<div class="mdl-tabs__panel is-active" id="printDailyReportPanel">
		<form class="formAddProduct">
			<div class="fontItem">ANULAR VENTA</div>
			<br><p>INGRESE NÚMERO DE VENTA</p>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input id="anulaVenta" class="mdl-textfield__input" type="text">
			</div>
			<div class="anulaVenta">
				<a class="mdl-button mdl-button--raised mdl-button--colored" href="#open-modal-null-sell">ANULAR VENTA</a>
			</div>
		</form>
	</div>
		<div id="open-modal-null-sell" class="modal-window">
		<div>
			<h1>ANULAR VENTA</h1>
			<div>
				<div>CONFIRMA QUE DESEA ANULAR VENTA</div>
				<button onclick="anularVenta()" class="mdl-button mdl-button--raised mdl-button--colored"><a href="#modal-close" title="Close" id="modal-close">Aceptar</a></button>
				<button class="mdl-button mdl-button--raised mdl-button--colored" ><a href="#modal-close" title="Close" id="modal-close">Cancelar</a></button>
			</div>
		</div>
	</div>
</div>
<?php include('footer.php') ?>