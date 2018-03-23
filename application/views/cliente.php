<?php include('header.php');?>
<?php include('nav_menu.php') ?>
<div id="content">
	<h2>CLIENTES</h2>
	<div id="addClientForm">
		<div id="dataClient">
			<div class="fontItem">AGREGAR CLIENTE</div><br><br>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" pattern="[w-\.]" id="clientName">
				<label class="mdl-textfield__label" for="clientName">Nombre</label>
				<span class="mdl-textfield__error">No puede ser vacío</span>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-input__expandable-holder	">
				<input class="mdl-textfield__input" type="text" pattern="^\d{1,2}\d{3}\d{3}[-][0-9kK]{1}$" id="clientRut" placeholder="1234567-9">
				<label class="mdl-textfield__label" for="clientRut">Rut</label>
				<span class="mdl-textfield__error">Ingrese rut válido</span>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" pattern="[0-9]*" id="clientPhone">
				<label class="mdl-textfield__label" for="clientPhone">Teléfono</label>
				<span class="mdl-textfield__error">Sólo números</span>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" pattern="[0-9]*" id="clientCel">
				<label class="mdl-textfield__label" for="clientCel">Celular</label>
				<span class="mdl-textfield__error">Sólo números</span>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="clientGir">
				<label class="mdl-textfield__label" for="clientGir">Giro</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" pattern="[w-\.]" id="clientAddress">
				<label class="mdl-textfield__label" for="clientAddress">Dirección</label>
				<span class="mdl-textfield__error">No puede ser vacío</span>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" pattern="[w-\.]" id="clientCom">
				<label class="mdl-textfield__label" for="clientCom">Comuna</label>
				<span class="mdl-textfield__error">No puede ser vacío</span>
			</div>
			<div class="submitProduct">
				<button onclick="insertClient()" class="mdl-button mdl-button--raised mdl-button--colored">Guardar Cliente</button>
			</div>
		</div>
		<div id="tablaClients">
			<?php require '../controller/selectClientAll.php'; ?>
		</div>
		<div>
			<button class="mdl-button mdl-button--raised mdl-button--colored noColor"><a href="../pdf/cliente.php" target="_blank">Listado Clientes</a></button>
		</div>
	</div>
	<!--modal editar cliente -->
	<div id="open-modal-edit-client" class="modal-window">
		<div>
			<h1>EDITAR CLIENTE</h1>
			<div>
				<input type="hidden" id="editId">
				<div class="mdl-textfield mdl-js-textfield ">
					<input class="mdl-textfield__input" type="text" pattern="[w-\.]" id="editName">
					<label  for="clientName">Nombre</label>
					<span class="mdl-textfield__error">No puede ser vacío</span>
				</div>
				<div class="mdl-textfield mdl-js-textfield ">
					<input class="mdl-textfield__input" type="text" pattern="^\d{1,2}\d{3}\d{3}[-][0-9kK]{1}$" id="editRut">
					<label  for="clientRut">Rut</label>
					<span class="mdl-textfield__error">Ingrese rut válido</span>
				</div>
				<div class="mdl-textfield mdl-js-textfield ">
					<input class="mdl-textfield__input" type="text" pattern="[0-9]*" id="editPhone">
					<label  for="clientPhone">Teléfono</label>
					<span class="mdl-textfield__error">Sólo números</span>
				</div>
				<div class="mdl-textfield mdl-js-textfield ">
					<input class="mdl-textfield__input" type="text" pattern="[0-9]*" id="editCel">
					<label  for="editCel">Celular</label>
					<span class="mdl-textfield__error">Sólo números</span>
				</div>
				<div class="mdl-textfield mdl-js-textfield ">
					<input class="mdl-textfield__input" type="text" id="editGir">
					<label for="clientGir">Giro</label>
				</div>
				<div class="mdl-textfield mdl-js-textfield ">
					<input class="mdl-textfield__input" type="text" pattern="[w-\.]" id="editAddress">
					<label for="clientAddress">Dirección</label>
					<span class="mdl-textfield__error">No puede ser vacío</span>
				</div>
				<div class="mdl-textfield mdl-js-textfield ">
					<input class="mdl-textfield__input" type="text" pattern="[w-\.]" id="editCom">
					<label for="editCom">Comuna</label>
					<span class="mdl-textfield__error">No puede ser vacío</span>
				</div>
				<button onclick="editClient()" class="mdl-button mdl-button--raised mdl-button--colored">Aceptar</button>
				<button class="mdl-button mdl-button--raised mdl-button--colored" ><a href="#modal-close" title="Close" id="modal-close">Cancelar</a></button>
			</div>
		</div>
	</div>
	<!--modal eliminar cliente -->
	<div id="open-modal-delete-client" class="modal-window">
		<div>
			<h1>ELIMINAR CLIENTE</h1>
			<div>
				<button onclick="deleteClient()" class="mdl-button mdl-button--raised mdl-button--colored">Aceptar</button>
				<button class="mdl-button mdl-button--raised mdl-button--colored" ><a href="#modal-close" title="Close" id="modal-close">Cancelar</a></button>
			</div>
		</div>
	</div>
	<!--modal cheque cliente -->
	<div id="open-modal-cheque" class="modal-window abrir">
	<div>
		<h1>CHEQUES CLIENTE</h1>
		<div id="abrir">
			<?php require_once '../controller/selectCheque.php'; ?>
		</div>
			<div>
				<button class="mdl-button mdl-button--raised mdl-button--colored" ><a href="#modal-close" title="Close" id="modal-close">Cerrar</a></button>
			</div>
		</div>
	</div>
</div>
<?php include('footer.php') ?>