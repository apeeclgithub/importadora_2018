<?php include('header.php');?>
<?php include('nav_menu.php') ?>
<div id="content">
	<h2>CIERRE DE CAJA</h2>
	<div>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text"  id="closingCashDate" >
			<label class="mdl-textfield__label" for="closingCashDate">Fecha</label>
		</div>
	</div>	
	<div class="closingCash">
		<div id="dataClient">
			<div class="fontItem">SISTEMA</div>
			<?php require '../controller/functionSistema.php'; ?>
		</div>
		<div id="dataClient">
			<div class="fontItem">REAL</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input onkeyup="cuadrarCaja()" class="mdl-textfield__input" type="text" pattern="[0-9]*" id="closingCashMoneyReal" >
				<label for="closingCashMoneyReal">Efectivo</label>
				<span class="mdl-textfield__error">Ingresar solo números</span>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input onkeyup="cuadrarCaja()" class="mdl-textfield__input" type="text" pattern="[0-9]*" id="closingCashCheckReal" >
				<label  for="closingCashCheckReal">Cheque</label>
				<span class="mdl-textfield__error">Ingresar solo números</span>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" pattern="[0-9]*" id="closingCashTotalReal" >
				<label  for="closingCashTotalReal">Total</label>
				<span class="mdl-textfield__error">Ingresar solo números</span>
			</div>
		</div>
		<div id="dataClient">
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" pattern="[0-9]*" id="closingCashDif" >
				<label for="closingCashDif">Diferencia</label>
				<span class="mdl-textfield__error">Ingresar solo números</span>
			</div>
			<div>
				<input onclick="ventaDiaria('<?php echo $_SESSION['date']; ?>')" class="mdl-button mdl-button--raised mdl-button--colored" type="submit" value="RESUMEN VENTA DIARIA">
				<input onclick="cerrarCaja()" class="mdl-button mdl-button--raised mdl-button--colored" type="submit" value="CERRAR CAJA">
			</div>
		</div>
	</div>

</div>
<?php include('footer.php') ?>