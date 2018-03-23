Date.prototype.toString = function() { return this.getFullYear()+"-"+(this.getMonth()+1)+"-"+this.getDate(); }

function anularVenta(){
    var params = {
        'ventaId' : $('input[id=anulaVenta]').val()
    };
    if ($('input[id=anulaVenta]').val() === '') {
        alertify.error("Id de venta no debe ir vacia.");
    }else{
        $.ajax({
            url : '../controller/anularVenta.php',
            type : 'post',
            data : params,
            dataType : 'json'
        }).done(function(data){
            if(data.success==true){
                alertify.success("Venta anulada exitosamente.");
                $('input[id=anulaVenta]').val('');
            }else{
                alertify.error("Venta no existe.") ;
            }
        })
    };
};

function insertMarca(){
    var params = {
        'marNombre' : $('input[id=productBrand]').val()
    };
    if ($('input[id=productBrand]').val() === '') {
        alertify.error("Marca no debe ir vacia.");
    }else{
        $.ajax({
            url : '../controller/insertMarca.php',
            type : 'post',
            data : params,
            dataType : 'json'
        }).done(function(data){
            if(data.success==true){
                $("#addMarca").load('../controller/selectMarca.php');
                $("#addMarcaEdit").load('../controller/selectMarcaEdit.php');
                alertify.success("Marca agregada exitosamente.");
                $('input[id=productBrand]').val('');
            }else{
                alertify.error("Marca ya existe.");
            }
        })
    };
};

function insertColor(){
    var params = {
        'colNombre' : $('input[id=productColor]').val()
    };
    if ($('input[id=productColor').val() === '') {
        alertify.error("Color no debe ir vacío.");
    }else{
        $.ajax({
            url : '../controller/insertColor.php',
            type : 'post',
            data : params,
            dataType : 'json'
        }).done(function(data){
            if(data.success==true){
                $("#addColor").load('../controller/selectColor.php');
                $("#addColorEdit").load('../controller/selectColorEdit.php');
                alertify.success("Color agregado exitosamente.");
                $('input[id=productColor]').val('');
            }else{
                alertify.error("Color ya existe.");
            }
        })
    };
};

function loadModalProduct(id, codigo, marca, color, stock, descripcion){
    $('input[id=editCodigo]').val(codigo);
    $("select[id=editBrand] option").prop('selected', false).filter(function() {
        return $(this).text() == marca;
    }).prop('selected', true);
    $("select[id=editColor] option").prop('selected', false).filter(function() {
        return $(this).text() == color;  
    }).prop('selected', true);
    $('input[id=editStock]').val(stock);
    $('input[id=editId]').val(id);
    $('textarea[id=editDescripcion]').val(descripcion);
};

function insertProducto(){
    var params     = {
        'proCodigo': $('input[id=productCode]').val(),
        'proMarca' : $('select[id=productBrand]').val(),
        'proColor' : $('select[id=productColor]').val(),
        'proStock' : $('input[id=productStock]').val(),
        'proDesc'  : $('textarea[id=productDesc]').val()
    };

    if ($('input[id=productCode]').val() === '') {
        alertify.error('Ingrese un código.');
    } else if ($('select[id=productBrand]').val() <= '0') {
        alertify.error('Seleccione una marca.');
    } else if ($('select[id=productColor]').val()  <= '0') {
        alertify.error('Seleccione un color.');
    } else if ($('input[id=productStock]').val() === '') {
        alertify.error('Ingrese el stock');
    } else if ($('textarea[id=productDesc]').val() === '') {
        alertify.error('Ingrese una descripción');
    }else{
        $.ajax({
            url : '../controller/insertProduct.php',
            type : 'post',
            data : params,
            dataType : 'json'
        }).done(function(data){
            if(data.success==true){
                $("#tablaProducts").load('../controller/selectProductAll.php');
                alertify.success('Producto agregado.');
                $('input[id=productCode]').val('');
                $('select[id=productBrand]').val('');
                $('select[id=productColor]').val('');
                $('input[id=productStock]').val('');
                $('textarea[id=productDesc]').val('');
            }else{
                alertify.error('Producto ya existe.');
            }
        })
    };
};

function editProduct(){
    var params = {
        'proId'    : $('input[id=editId]').val(),
        'proCodigo': $('input[id=editCodigo]').val(),
        'proMarca' : $('select[id=editBrand]').val(),
        'proColor' : $('select[id=editColor]').val(),
        'proStock' : $('input[id=editStock]').val(),
        'proDescripcion' : $('textarea[id=editDescripcion]').val()
    };
    $.ajax({
        url : '../controller/updateProduct.php',
        type : 'post',
        data : params,
        dataType : 'json'
    }).done(function(data){
        if(data.success==true){
            $("#tablaProducts").load('../controller/selectProductAll.php');
            alertify.success('Producto modificado.');
            $('input[id=proId]').val('');
            $('input[id=productCode]').val('');
            $('select[id=productBrand]').val('');
            $('select[id=productColor]').val('');
            $('input[id=productStock]').val('');
            $('textarea[id=editDescripcion]').val('');
        }else{
            alertify.error('Producto no modificado.');
        }
    });
    location.href="#modal-close";
};

function deleteProduct(){
    var params = {
        'proId'    : $('input[id=editId]').val()
    };
    $.ajax({
        url : '../controller/deleteProduct.php',
        type : 'post',
        data : params,
        dataType : 'json'
    }).done(function(data){
        if(data.success==true){
            $("#tablaProducts").load('../controller/selectProductAll.php');
            alertify.success('Producto eliminado exitosamente.');
            $('input[id=proId]').val('');
            $('input[id=productCode]').val('');
            $('select[id=productBrand]').val('');
            $('select[id=productColor]').val('');
            $('input[id=productStock]').val('');
            $('textarea[id=productDesc]').val('');
        }else{
            alertify.error('Producto no eliminado.');
        }
        location.href="#modal-close";
    })
};

function loadModalClient(id, nombre, rut, fono, cel, direccion, comuna, giro){
    $('input[id=editId]').val(id);
    $('input[id=editName]').val(nombre);
    $('input[id=editRut]').val(rut);
    $('input[id=editPhone]').val(fono);
    $('input[id=editCel]').val(cel);
    $('input[id=editGir]').val(giro);
    $('input[id=editAddress]').val(direccion);
    $('input[id=editCom]').val(comuna);
};

function insertClient(){
    var params = {
        'clientName' : $('input[id=clientName]').val(),
        'clientRut' : $('input[id=clientRut]').val(),
        'clientPhone' : $('input[id=clientPhone]').val(),
        'clientCel' : $('input[id=clientCel]').val(),
        'clientGir' : $('input[id=clientGir]').val(),
        'clientAddress' : $('input[id=clientAddress]').val(),
        'clientCom' : $('input[id=clientCom]').val()
    };
    if ($('input[id=clientName]').val() === '') {
        alertify.error('Ingrese Nombre ');
    } else if ($('input[id=clientRut]').val() === '') {
        alertify.error('Ingrese Rut');
    }else if ($('input[id=clientPhone]').val() === '') {
        alertify.error('Ingrese Fono');
    }else if ($('input[id=clientCel]').val() === '') {
        alertify.error('Ingrese Celular');
    }else if ($('input[id=clientAddress]').val() === '') {
        alertify.error('Ingrese Dirección');
    }else if ($('input[id=clientCom]').val() === '') {
        alertify.error('Ingrese Comuna');
    }else{
        $.ajax({
            url : '../controller/insertClient.php',
            type : 'post',
            data : params,
            dataType : 'json'
        }).done(function(data){
            if(data.success==true){
                $("#tablaClients").load('../controller/selectClientAll.php');
                alertify.success('Cliente agregado exitosamente.');
                $('input[id=clientName]').val('');
                $('input[id=clientRut]').val('');
                $('input[id=clientPhone]').val('');
                $('input[id=clientCel]').val('');
                $('input[id=clientGir]').val('');
                $('input[id=clientAddress]').val('');
                $('input[id=clientCom]').val('');
            }else{
                alertify.error('cliente no agregado.');
            }
        })
    };
};

function editClient(){
    var params = {
        'cliId'         : $('input[id=editId]').val(),
        'clientName'    : $('input[id=editName]').val(),
        'clientRut'     : $('input[id=editRut]').val(),
        'clientPhone'   : $('input[id=editPhone]').val(),
        'clientCel'     : $('input[id=editCel]').val(),
        'clientGir'     : $('input[id=editGir]').val(),
        'clientAddress' : $('input[id=editAddress]').val(),
        'clientCom'     : $('input[id=editCom]').val()
    };
    $.ajax({
        url : '../controller/updateClient.php',
        type : 'post',
        data : params,
        dataType : 'json'
    }).done(function(data){
        if(data.success==true){
            $("#tablaClients").load('../controller/selectClientAll.php');
            alertify.success('Cliente modificado.');
            $('input[id=editId]').val('');
            $('input[id=editName]').val('');
            $('input[id=editRut]').val('');
            $('input[id=editPhone]').val('');
            $('input[id=editCel]').val('');
            $('input[id=editGir]').val('');
            $('input[id=editAddress]').val(''),
            $('input[id=editCom]').val('');
        }else{
            alertify.error('Cliente no modificado.');
        }
        location.href="#modal-close";
    })
};

function deleteClient(){
    var params = {
        'cliId'    : $('input[id=editId]').val()
    };
    $.ajax({
        url : '../controller/deleteClient.php',
        type : 'post',
        data : params,
        dataType : 'json'
    }).done(function(data){
        if(data.success==true){
            $("#tablaClients").load('../controller/selectClientAll.php');
            alertify.success('Cliente eliminado exitosamente.');
            $('input[id=cliId]').val('');
            $('input[id=clientName]').val('');
            $('input[id=clientRut]').val('');
            $('input[id=clientPhone]').val('');
            $('input[id=clientCel]').val('');
            $('input[id=clientGir]').val('');
            $('input[id=clientAddress]').val('');
            $('input[id=clientCom]').val('');
        }else{
            alertify.error('Cliente no eliminado.');
        }
        location.href="#modal-close";
    })
};

function login(){
    var params = {
        'userName'    : $('input[id=userName]').val(),
        'userPass'    : $('input[id=userPass]').val()
    };
    if($('input[id=userName]').val()===''){
        alertify.error('Ingrese un nombre');
    }else if($('input[id=userPass]').val()===''){
        alertify.error('Ingrese una password');
    }else{
        $.ajax({
            url : '../controller/loginUsuario.php',
            type : 'post',
            data : params,
            dataType : 'json'
        }).done(function(data){
            if(data.success==true){
                location.href="venta.php";
            }else{
                alertify.error('Datos erroneos.');
                $('input[id=userName]').val('');
                $('input[id=userPass]').val('');
            }
        })
    }
}

function logout(){
    $.ajax({
        url: '../controller/logoutUsuario.php'
    }).done(function(data){
        location.href="login.php"
    })
}

function loadModalCheque(id){
    var url = '../controller/selectCheque.php?client=';
    var client = id;
    $('#abrir').load(url.concat(id));
}

function addClient(id, nombre, rut){
    $('input[id=clientId]').val(id);
    $('input[id=clientName]').val(nombre);
    $('input[id=clientRut]').val(rut);
    location.href="#modal-close";
    alertify.success('Cliente agregado a la venta');
}

function updatePrice(id){
    var unit = $('input[id=addUnidad'+id+']').val();
    var price = $('input[id=addPrecio'+id+']').val();
    $('input[id=addTotal'+id+']').val(unit*price);
}

function addProduct(id, codigo, descripcion){
    if(($('input[id=stock'+id+']').val()-$('input[id=addUnidad'+id+']').val())<=0){
        alertify.error('No tiene stock suficiente');
        $('input[id=addUnidad'+id+']').val('');
        $('input[id=addPrecio'+id+']').val('');
        $('input[id=addTotal'+id+']').val('');
    }else{
        var params = {
            'id' : id,
            'cantidad' : $('input[id=addUnidad'+id+']').val(),
            'precio' : $('input[id=addPrecio'+id+']').val(),
            'codigo' : codigo,
            'descripcion' : descripcion
        };
        $.ajax({
            url : '../controller/functionCarrito.php?page=1',
            type : 'post',
            data : params,
            dataType : 'json'
        }).done(function(data){
            if(data.success==true){
                $("#tablaProductsDetail").load('../controller/selectProductSailDetail.php');
                $("#valor_total").load('../controller/functionCarrito.php?page=3');
                alertify.success("Producto agregado a la venta.");
                $('input[id=addUnidad'+id+']').val('');
                $('input[id=addPrecio'+id+']').val('');
                $('input[id=addTotal'+id+']').val('');
            }else{
                alertify.error("Producto no agregado.");
            }
        });
    }
};

function delProduct(id){
    var params = {
        'id' : id
    };
    $.ajax({
        url : '../controller/functionCarrito.php?page=2',
        type : 'post',
        data : params,
        dataType : 'json'
    }).done(function(data){
        if(data.success==true){
            $("#tablaProductsDetail").load('../controller/selectProductSailDetail.php');
            $("#valor_total").load('../controller/functionCarrito.php?page=3');
            alertify.error("Producto eliminado exitosamente");
        }else{
            alertify.error("Producto no eliminado.");
        }
    });
};

function updatePriceSail(id, codigo, descripcion){
    if($('input[id=sailUnidad'+id+']').val()>$('input[id=viejo'+id+']').val()){
        var unit = $('input[id=sailUnidad'+id+']').val()-$('input[id=viejo'+id+']').val();
    }
    if($('input[id=sailUnidad'+id+']').val()<$('input[id=viejo'+id+']').val()){
        var unit = $('input[id=sailUnidad'+id+']').val()-$('input[id=viejo'+id+']').val();
    }
    if($('input[id=sailUnidad'+id+']').val()<=$('input[id=stock'+id+']').val()){
        var params = {
        'id' : id,
        'cantidad' : unit,
        'precio' : $('input[id=sailPrecio'+id+']').val(),
        'codigo' : codigo,
        'descripcion' : descripcion
        };
        $.ajax({
            url : '../controller/functionCarrito.php?page=1',
            type : 'post',
            data : params,
            dataType : 'json'
        }).done(function(data){
            if(data.success==true){
                $("#tablaProductsDetail").load('../controller/selectProductSailDetail.php');
                $("#valor_total").load('../controller/functionCarrito.php?page=3');
                $('input[id=addUnidad'+id+']').val('');
                $('input[id=addPrecio'+id+']').val('');
                $('input[id=addTotal'+id+']').val('');
            }
        });
    }else{
        alertify.error('No tiene stock suficiente');
    }
    
}

function updateTotalIva(){
    if( $('#checkbox-iva').prop('checked') ) {
        var total = $('#amountSaleTotal').val()*1.2;
        $('#amountSaleTotal').val(Math.round(total));
    }else{
        $("#valor_total").load('../controller/functionCarrito.php?page=3');
    }
}

function verMontoEfectivo(){
    if( $('#checkbox-1').prop('checked') ) {
        document.getElementById('medioEfectivo').style.display='block';
    }else{
        document.getElementById('medioEfectivo').style.display='none';
    }
}

function verMontoCheque(){
    if( $('#checkbox-3').prop('checked') ) {
        document.getElementById('medioCheque').style.display='block';
        document.getElementById('medioCheque2').style.display='block';
    }else{
        document.getElementById('medioCheque').style.display='none';
        document.getElementById('medioCheque2').style.display='none';
    }
}

function cantCheque(){
    $("#cargaCheques").load('../controller/functionCheque.php?cheques='+$('#chequeSelect').val());
}

function actualizaMontoCheque(id){
    var total = 0;
    for (var i = 1; i < id; i++) {
        var cheque = $('input[id=amountSaleCheque'+i+']').val();
        total = Number(total)+Number(cheque);
        $('input[id=amountSaleCheque]').val(total);
    };   
}

function completarVenta(){
    var efectivo = $('input[id=amountSaleEfectivo]').val();
    var cheque = $('input[id=amountSaleCheque]').val();
    var total = $('input[id=amountSaleTotal]').val();
    
    if($('input[id=clientId]').val()==''){
        alertify.error("Debe seleccionar un cliente.");
    }else if($('input[id=amountSaleTotal]').val()==0){
        alertify.error("Debe ingresar algún producto.");
    }else if((Number(efectivo)+Number(cheque))!=Number(total)){
        alertify.error('Los montos no cuadran.');
    }else{
        location.href="#open-modal-closeSail";
    }
}

function realizarVenta(){
    var array; 
        var cheque1 = {
            'numero'    : $('input[id=checkSailNumber1]').val(),
            'banco'     : $('input[id=checkSailBank1]').val(),
            'fechaCheque':$('input[id=checkSailDate1]').val(),
            'titular'   : $('input[id=checkSailTitular1]').val(),
            'monto'     : $('input[id=amountSaleCheque1]').val()
        };
        var cheque2 = {
            'numero'    : $('input[id=checkSailNumber2]').val(),
            'banco'     : $('input[id=checkSailBank2]').val(),
            'fechaCheque':$('input[id=checkSailDate2]').val(),
            'titular'   : $('input[id=checkSailTitular2]').val(),
            'monto'     : $('input[id=amountSaleCheque2]').val()
        };
        var cheque3 = {
            'numero'    : $('input[id=checkSailNumber3]').val(),
            'banco'     : $('input[id=checkSailBank3]').val(),
            'fechaCheque':$('input[id=checkSailDate3]').val(),
            'titular'   : $('input[id=checkSailTitular3]').val(),
            'monto'     : $('input[id=amountSaleCheque3]').val()
        };
        var cheque4 = {
            'numero'    : $('input[id=checkSailNumber4]').val(),
            'banco'     : $('input[id=checkSailBank4]').val(),
            'fechaCheque':$('input[id=checkSailDate4]').val(),
            'titular'   : $('input[id=checkSailTitular4]').val(),
            'monto'     : $('input[id=amountSaleCheque4]').val()
        };
        var cheque5 = {
            'numero'    : $('input[id=checkSailNumber5]').val(),
            'banco'     : $('input[id=checkSailBank5]').val(),
            'fechaCheque':$('input[id=checkSailDate5]').val(),
            'titular'   : $('input[id=checkSailTitular5]').val(),
            'monto'     : $('input[id=amountSaleCheque5]').val()
        };

        array = {
            'cheque1'   : cheque1,
            'cheque2'   : cheque2,
            'cheque3'   : cheque3,
            'cheque4'   : cheque4,
            'cheque5'   : cheque5
        };

    var params = {
        'cliId'     : $('input[id=clientId]').val(),
        'valor'     : $('input[id=amountSaleTotal]').val(),
        'fecha'     : new Date(),
        'efectivo'  : $('input[id=amountSaleEfectivo]').val(),
        'cheque'    : $('input[id=amountSaleCheque]').val(),
        'array'     : array
    };
    $.ajax({
        url : '../controller/functionVenta.php',
        type : 'post',
        data : params,
        dataType : 'json'
    }).done(function(data){
        if(data.success==true){
            var url = '../pdf/pdf.php?id='.concat(data.id);
            alertify.success(url);
            window.open(url, '_blank');
        }
        location.href="#modal-close";
        location.href='../views/venta.php';
    });

}

$(document).ready(function(){
    var date = new Date();
    $('input[id=closingCashDate]').val(date);
    $('input[id=closingCashTime]').val(date.getHours()+":"+date.getMinutes()+":"+date.getSeconds());
    var params = {'date' : date};
    $.ajax({
        url : '../controller/functionDate.php',
        type : 'post',
        data : params,
        dataType : 'json'
    });
    
});

function cuadrarCaja(){
    var cash = $('input[id=closingCashMoneyReal]').val();
    var check =$('input[id=closingCashCheckReal]').val();
    $('input[id=closingCashTotalReal]').val(Number(cash)+Number(check));
    var sistema = $('input[id=closingCashTotalSis]').val();
    var real = $('input[id=closingCashTotalReal]').val();
    $('input[id=closingCashDif]').val(Number(sistema)-Number(real));
}

function imprimirVenta(){
    var params = {'id' : $('input[id=detalleVentaID]').val()};
    $.ajax({
            url : '../controller/functionImprimir.php',
            type : 'post',
            data : params,
            dataType : 'json'
        }).done(function(data){
            if(data.success==true){
                var url = "../pdf/pdf.php?id="+$('input[id=detalleVentaID]').val();
                window.open(url, '_blank');
            }else{
                alertify.error("Venta no existe.");
            }
        });
}

function cerrarCaja(){
    var caja = $('input[id=closingCashDif]').val();
    if(Number(caja)<1 && caja != "" && Number(caja)>-1){
        var url = "../pdf/cierreCaja.php";
        window.open(url, '_blank');
    }else{
       alertify.error("La caja no cuadra.");
    }
}

function ventaDiaria(date){
    var url = "../pdf/ventaDiaria.php?date="+date;
    window.open(url, '_blank');
}

function reporteDiario(){
    var fecha = $('input[id=dateSaleDaily]').val();
    if(fecha!=""){
        var url = "../pdf/ventaDiaria.php?date="+fecha;
        window.open(url, '_blank');
    }else{
        alertify.error("Seleccione una fecha.");
    }
}

function reporteMensual(){
    var mes = $('select[id=dateSaleMonth]').val();
    if(mes!=0){
        var url = "../pdf/ventaMensual.php?date="+mes;
        window.open(url, '_blank');
    }else{
        alertify.error("Seleccione una mes.");
    }
}