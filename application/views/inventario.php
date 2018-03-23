<?php include('header.php');?>
<?php include('nav_menu.php');?>

<div id ="content">
	<h2>INVENTARIO</h2>
	<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
		<div class="mdl-tabs__tab-bar">
			<a href="#addProductPanel" class="mdl-tabs__tab is-active">AGREGAR PRODUCTO</a>
			<a href="#addBrandPanel" class="mdl-tabs__tab">AGREGAR MARCA</a>
			<a href="#addColorPanel" class="mdl-tabs__tab">AGREGAR COLOR</a>
		</div>

		<div class="mdl-tabs__panel is-active formAddProduct" id="addProductPanel">
			<!--<form class="formAddProduct">-->
			<div class="fontItem" id="">AGREGAR PRODUCTO</div>
			<div id="dataProducts">
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<input class="mdl-textfield__input" type="text" pattern="[w-\.]" id="productCode" >
					<label class="mdl-textfield__label" for="productCode">Código</label>
					<span class="mdl-textfield__error">No puede ser vacío</span>
				</div>
				<div id="addMarca" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<?php require '../controller/selectMarca.php'; ?>
				</div>
				<div id="addColor" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<?php require '../controller/selectColor.php'; ?>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<input class="mdl-textfield__input" type="text" pattern="[0-9]*" id="productStock" >
					<label class="mdl-textfield__label" for="productStock">Stock</label>
					<span class="mdl-textfield__error">Ingresar solo números</span>
				</div>
			</div>
			<div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="textAreaDesc">
					<textarea class="mdl-textfield__input" type="text" pattern="[w-\.]" rows= "4" id="productDesc" ></textarea>
					<label class="mdl-textfield__label" for="productDesc">Descripción</label>
					<span class="mdl-textfield__error">No puede ser vacío</span>
				</div>
			</div>
			<div class="submitProduct">
				<input onclick="insertProducto()" class="mdl-button mdl-button--raised mdl-button--colored" type="submit" value="GUARDAR PRODUCTO">
			</div>
			<!--</form>-->
		</div>
		<div class="mdl-tabs__panel" id="addBrandPanel">
			<div class="contentProducts">
				<div class="fontItem">AGREGAR MARCA</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<input class="mdl-textfield__input" type="text" pattern="[w-\.]" id="productBrand">
					<label class="mdl-textfield__label" for="productBrand">Marca</label>
					<span class="mdl-textfield__error">No puede ser vacío</span>
				</div>
				<div>
					<button onclick="insertMarca()" class="mdl-button mdl-button--raised mdl-button--colored">Guardar Marca</button>
				</div>
			</div>
		</div>
		<div class="mdl-tabs__panel" id="addColorPanel">
			<div class="contentProducts">
				<div class="fontItem">AGREGAR COLOR</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<input class="mdl-textfield__input" type="text" pattern="[w-\.]" id="productColor" >
					<label class="mdl-textfield__label" for="productColor">Color</label>
					<span class="mdl-textfield__error">No puede ser vacío</span>
				</div>
				<div>
					<button onclick="insertColor()" class="mdl-button mdl-button--raised mdl-button--colored">Guardar Color</button>
				</div>
			</div>
		</div>
	</div>
	<div id="tablaProducts">
		<?php require '../controller/selectProductAll.php'; ?>
	</div>
	<div class="buttonProducts"><br><br>
		<div class="interior">
			<button class="mdl-button mdl-button--raised mdl-button--colored noColor"><a href="../pdf/detalleInventario.php" target="_blank">Exportar Detalle Inventario</a></button>	
		</div>
		<div class="interior">
			<button class="mdl-button mdl-button--raised mdl-button--colored"><a href="../pdf/masVendidos.php" target="_blank">Exportar Productos más vendidos</a></button>
		</div>
	</div>

	<!--modal editar -->
	<div id="open-modal-edit" class="modal-window">
		<div>
			<h1>EDITAR PRODUCTO</h1>
			<div id="dataProductsEdit">
				<input type="hidden" id="editId">
				<div class="mdl-textfield mdl-js-textfield ">
					<input id="editCodigo" class="mdl-textfield__input" type="text" pattern="[w-\.]" id="editCode">
					<label for="productCode">Código</label>
					<span class="mdl-textfield__error">No puede ser vacío</span>
				</div>
				<div id="addMarcaEdit" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<?php require '../controller/selectMarcaEdit.php'; ?>
				</div>
				<div id="addColorEdit" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<?php require '../controller/selectColorEdit.php'; ?>
				</div>
				<div class="mdl-textfield mdl-js-textfield ">
					<input id="editStock" class="mdl-textfield__input" type="text" pattern="[0-9]*" id="editStock">
					<label for="productStock">Stock</label>
					<span class="mdl-textfield__error">Ingresar solo números</span>
				</div>				
				<div class="mdl-textfield mdl-js-textfield" id="textAreaDesc">
					<textarea class="mdl-textfield__input" type="text" pattern="[w-\.]" id="editDescripcion" ></textarea>
					<label for="productDesc">Descripción</label>
					<span class="mdl-textfield__error">No puede ser vacío</span>
				</div>
			</div>
			<div>
				<button onclick="editProduct()" class="mdl-button mdl-button--raised mdl-button--colored">Guardar</button>
				<button class="mdl-button mdl-button--raised mdl-button--colored" ><a href="#modal-close" title="Close" id="modal-close">Cancelar</a></button>
			</div>
		</div>
	</div>
	<!--modal eliminar -->
	<div id="open-modal-delete" class="modal-window">
		<div>
			<h1>ELIMINAR PRODUCTO</h1>
			<div>
				<button onclick="deleteProduct()" class="mdl-button mdl-button--raised mdl-button--colored">Aceptar</button>
				<button class="mdl-button mdl-button--raised mdl-button--colored" ><a href="#modal-close" title="Close" id="modal-close">Cancelar</a></button>
			</div>
		</div>
	</div>
</div>
<?php include('footer.php') ?>