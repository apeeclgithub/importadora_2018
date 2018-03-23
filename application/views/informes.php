<?php include('header.php');?>
<?php include('nav_menu.php') ?>
<div id ="content">
	<h2>REPORTES</h2>
	<!-- 
	<div class="fontItem" style="float:left;">REPORTE DIARIO (Incluye detalle de venta)
		<pre>Seleccione Fecha</pre>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<input id="dateSaleDaily" class="mdl-textfield__input" type="date">
		</div>
		<div class="dateSaleDaily">
			<input class="mdl-button mdl-button--raised mdl-button--colored" type="submit" value="Reporte diario">
		</div>
	</div><br>
	<div class="fontItem" style="float:left;">REPORTE MENSUAL (Incluye detalle de venta)
		<pre>Seleccione Mes</pre>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<input id="dateSaleMonth" class="mdl-textfield__input" type="date">	
		</div>
		<div class="dateSaleMonth">
			<input class="mdl-button mdl-button--raised mdl-button--colored" type="submit" value="REPORTE MENSUAL">
		</div>
	</div><br>
	<div class="fontItem" >REPORTE SALDO PENDIENTE
		<pre>Seleccione Fecha</pre>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<input id="dateBalance" class="mdl-textfield__input" type="date">	
		</div>
		<div class="dateBalance">
			<input class="mdl-button mdl-button--raised mdl-button--colored" type="submit" value="Reporte Saldo">
		</div>
	</div><br>
	<div class="fontItem" >Exportar Detalle Inventario
		<button>Detalle Inventario</button>
	</div><br>
	<div class="fontItem" >Exportar Productos más vendidos
		<button>Productos más Vendidos</button>
	</div><br>
	<div class="fontItem" >Exportar Listado Clientes
		<button>Exportar Listado</button>
	</div>
-->
	<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
		<div class="mdl-tabs__tab-bar">
			<a href="#printDailyReportPanel" class="mdl-tabs__tab is-active">REPORTE DIARIO</a>
			<a href="#printMonthReportPanel" class="mdl-tabs__tab">REPORTE MENSUAL</a>
			<a href="#printSailDetail" class="mdl-tabs__tab">DETALLE POR N. VENTA</a>
		</div>

		<div class="mdl-tabs__panel is-active" id="printDailyReportPanel">
			<form class="formAddProduct">
				<div class="fontItem">REPORTE DIARIO</div>
				<br><p>Seleccione Fecha</p>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<input id="dateSaleDaily" class="mdl-textfield__input" type="date">
				</div>
				<div class="dateSaleDaily">
			<a class="mdl-button mdl-button--raised mdl-button--colored" onclick="reporteDiario()">Imprimir</a>
				</div>
			</form>
		</div>
		<div class="mdl-tabs__panel" id="printMonthReportPanel">
			<div class="contentProducts">
				<div class="fontItem" style="float:left;">REPORTE MENSUAL</div>
				<br><br><p>Seleccione Fecha</p>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <select id="dateSaleMonth">
                        <option value="0">Seleccione un mes</option>
                        <option value="1">Enero</option>
                        <option value="2">Febrero</option>
                        <option value="3">Marzo</option>
                        <option value="4">Abril</option>
                        <option value="5">Mayo</option>
                        <option value="6">Junio</option>
                        <option value="7">Julio</option>
                        <option value="8">Agosto</option>
                        <option value="9">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                    </select>
						
				</div>
				<div class="dateSaleMonth">
					<input onclick="reporteMensual()" class="mdl-button mdl-button--raised mdl-button--colored" type="submit" value="REPORTE MENSUAL">
				</div>
			</div>
		</div>
		<div class="mdl-tabs__panel" id="printSailDetail">
			<div class="contentProducts">
				<div class="fontItem" >REPORTE DETALLE DE VENTA</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<input class="mdl-textfield__input" type="text" pattern="[0-9]*" id="detalleVentaID">
					<label class="mdl-textfield__label" for="clientPhone">Número de Venta</label>
					<span class="mdl-textfield__error">Sólo números</span>
				</div>
				<div>
					<button onclick="imprimirVenta()"  class="mdl-button mdl-button--raised mdl-button--colored" >Imprimir</button>
				</div>
			</div><br>
		</div>
		<div class="interior">
			<button class="mdl-button mdl-button--raised mdl-button--colored noColor"><a href="../pdf/cliente.php" target="_blank">LISTADO CLIENTES</a></button>
		</div>
		<div class="interior">
			<button class="mdl-button mdl-button--raised mdl-button--colored noColor"><a href="../pdf/masVendidos.php" target="_blank">MAS VENDIDOS</a></button>
		</div>
		<div class="interior">
			<button class="mdl-button mdl-button--raised mdl-button--colored noColor"><a href="../pdf/detalleInventario.php" target="_blank">Exportar Inventario</a></button>	
		</div>
</div>
<?php include('footer.php') ?>