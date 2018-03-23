<?php
session_start();
require_once '../model/classCarrito.php';

if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 0;
}

switch($page){

    case 1          :
    
    $articulo       = array(
    "id"            => intval(@$_POST["id"]),
    "cantidad"      => intval(@$_POST["cantidad"]),
    "precio"        => intval(@$_POST["precio"]),
    "codigo"        => @$_POST["codigo"],
    "descripcion"   => @$_POST["descripcion"]
    );
    $carrito->add($articulo);
    
    $json['success']= true;
    echo json_encode($json);
    
    break;
    
    
    case 2          :
    
    $articulo       = $_POST["id"];
    
    $carrito->remove_producto($articulo);
    
    $json['success']= true;
    echo json_encode($json);
    
    break;
    
    case 3:
    ?>
    <div id="dataClient">
        <div class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="text" pattern="[0-9]*" id="amountSaleTotal" 
            value="<?php echo $carrito->precio_total();?>">
            <label for="amountSaleTotal">Total</label>
            <span class="mdl-textfield__error">Ingresar solo números</span>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-iva">
                <input onclick="updateTotalIva()" type="checkbox" id="checkbox-iva" class="mdl-checkbox__input">
                <span class="mdl-checkbox__label">CON IVA</span>
            </label>    
        </div>
    </div>
    
    <?php
    break;
    
}

?>