<?php 
	use com\bydan\framework\contabilidad\util\Funciones;

$aux=false;
	$strEstiloFuente='Verdana';
	
    if($aux) { 
        echo "some message";
        
    } else { 
    	
   $strParametroEstiloTipoLetraUsuario=Funciones::getParametroEstiloTipoLetraUsuario($parametroGeneralUsuarioActual);	
   $strEstiloFuente=$strParametroEstiloTipoLetraUsuario; 
?>

<style type="text/css">

body {
	background: #FFFFFF;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	line-height: 17px;
	color: #333;
}

.login {
	height: 90px;
}

.login h1 { 
	font-size: 25px;
	letter-spacing: -1px;
	padding: 23px 0 0 20px;
	color: #00007f;
}

.login h2 {
	font-size: 20px;
	font-weight: bold;
	color: #00007f;
	padding: 5px 0 0 20px;
	letter-spacing: -1px;
}

#wrap {
	margin: 0 auto;
	width: 780px;
	background: #fff;
}

.cabecera {
	background: #192666;
}

.cabecera h1 { 
	font-size: 20px;
	letter-spacing: -1px;
	padding: 23px 0 0 20px;
	color: #FFFFFF;
	background: #192666;
}

.cabecera h2 {
	font-size: 19px;
	color: #000099;
	padding: 5px 0 0 20px;
	letter-spacing: -1px;
	font-weight: 100;
}

.busquedacabecera {
	height: 25px;
	/*background: #045FB4;*/
	background-image:url('webroot/img/Imagenes/fondo-cabecera.gif');
}

.busquedacabecera h1 { 
	font-size: 15px;
	letter-spacing: -1px;
	padding: 23px 0 0 20px;
	color: #B5C4E3;
}

.busquedacabecera font { 
	font-size: 15px;
	color: #FFFFFF;
	font-weight: bold
	
}

tr table tr table.busqueda, tr.impresion,table.general,tr.acciones,table.impresion {
	/*text-align: center;*/
	
	-moz-box-shadow:0 0 25px #000000;
	-webkit-box-shadow:0 0 25px #000000;
    box-shadow:0 0 5px #000000;
    
    -moz-border-radius: 12px;
	border-radius: 12px;
	
	/*INTERNET EXPLORER*/
	filter:progid:DXImageTransform.Microsoft.dropshadow(OffX=3, OffY=3, Color='gray', Positive='true');
	background-color:#FFFFFF;
	border:solid 1px #000000;
	
	background-image:url('webroot/img/Imagenes/fondo-formulario.gif');
}

tr.busqueda {
	height: 90px;
}

.busqueda h1 { 
	font-size: 15px;
	letter-spacing: -1px;
	padding: 23px 0 0 20px;
	color: #000000;
}

.busqueda h2 {
	font-size: 15px;
	color: #004990;
	padding: 5px 0 0 20px;
	letter-spacing: -1px;
	font-weight: 100;
}
/*
.busqueda span {
	font-size: 12px;
	color: #004990;
	padding: 0px 0 0 0px;
	letter-spacing: -1px;
	font-weight: 100;
}
*/
.busquedatitulocampo {
	font-size: 14px;
	color: #004990;	
	padding: 0px 0 0 0px;
	letter-spacing: -1px;
	font-weight: 100;
	font-family:<?php echo($strEstiloFuente)?>;
}

.busqueda tabla {
	margin-left: auto;
	margin-right: auto;
}

.busqueda td { 
	padding: 5px;
}
   
.elementos {
	height: 90px;
}

/*table tr.elementos {*/
table.elementos{
	/*text-align: center;*/
	
	-moz-box-shadow:0 0 25px #000000;
	-webkit-box-shadow:0 0 25px #000000;
    box-shadow:0 0 5px #000000;
    
    -moz-border-radius: 12px;
	border-radius: 12px;
	
	/*INTERNET EXPLORER*/
	filter:progid:DXImageTransform.Microsoft.dropshadow(OffX=3, OffY=3, Color='gray', Positive='true');
	background-color:#FFFFFF;
	border:solid 1px #000000;
	
	background-image:url('webroot/img/Imagenes/fondo-formulario.gif');
}

table.tablaficha {
	/*text-align: center;*/
	
	-moz-box-shadow:0 0 25px #000000;
	-webkit-box-shadow:0 0 25px #000000;
    box-shadow:0 0 5px #000000;
    
    -moz-border-radius: 12px;
	border-radius: 12px;
	
	/*INTERNET EXPLORER*/
	filter:progid:DXImageTransform.Microsoft.dropshadow(OffX=3, OffY=3, Color='gray', Positive='true');
	background-color:#FFFFFF;
	border:solid 1px #000000;
	
	background-image:url('webroot/img/Imagenes/fondo-formulario.gif');
}

.elementos h1 { 
	font-size: 28px;
	letter-spacing: -1px;
	padding: 23px 0 0 20px;
	color: #000000;
}

.elementos h2 {
	font-size: 12px;
	letter-spacing: -1px;
	padding: 0px 0 0 0px;
	color: #004990;
	background: #F1F4F0;
}
/*
.elementos span {
	font-size: 12px;
	letter-spacing: -1px;
	padding: 0px 0 0 0px;
	color: #004990;
	background: #F1F4F0;
}
*/

.elementotitulocampo {
	font-size: 12px;
	letter-spacing: -1px;
	padding: 0px 0 0 0px;
	color: #004990;
	/*background: #F1F4F0;*/
}

.elementos table {
	margin-left: auto;
	margin-right: auto;
}

.elementos td { 
	padding: 5px;
}

.acciones {
	height: 90px;
}

.acciones h1 { 
	font-size: 28px;
	letter-spacing: -1px;
	padding: 23px 0 0 20px;
	color: #000000;
}

.acciones h2 {
	font-size: 13px;
	letter-spacing: -1px;
	padding: 23px 0 0 20px;
	color: #000000;
}

.acciones table {

}

#content {
	padding: 0 20px 20px 20px;
}

#footer {
	height: 30px;
	line-height: 30px;
	background: #657983;
	text-align: center;
	font-size: 11px;
	color: #fff;
}

#footer a {
	color: #fff; 
}

.right {
	float: right;
	width: 520px;
	text-align: justify;
}

.right h2 {
	font-size: 18px;
	font-weight: 100;
	padding: 15px 0 7px 0;
}

.left {
	float: left;
	width: 200px;
	margin-top: 0px;
	background: #004990;
}

.leftauxleftsideslider {
	width: 15%;
	height: 15px;
	margin-top: 0px;	
}

#divLeftSideSlider,#divContentSlider {
  width: 100%;
  height: 15px;
  margin: 0px;
  background: #BBBBBB;
  position: relative;
}


/*DA LA FORMA DEL CONTROL DEL SLIDER*/
.ui-slider-handle {
  width: 8px;
  height: 14px;
  position: absolute;
  top: -4px;
  background: #478AFF;
  border: solid 1px black;
}

.left h2 {
	margin: 10px 0 0 0;
	padding-left: 10px;
	height: 28px;
	line-height: 28px;
	color: #fff;
	font-size: 13px;
	background: #788BBD;
}

.left ul {
	padding: 10px 0 15px 20px;
	list-style-type: square;
	color: #788BBD;
}

div.left{
	background: #EFF3FE;
}

div.content {
	background: #FFFFFF;
}

div.links A:link {
	color: #FFF; text-decoration: none; 
}

div.links A:hover {
	color: #B5C4E3; text-decoration: none; 
}

div.links A:visited {
	color: #B5C4E3; text-decoration: none; 
}

div.links A:active {
	color: #B5C4E3; text-decoration: none; 
}

table.super {
	background-image:url('webroot/img/Imagenes/fondo.gif');
	border-width:0px;
}

.superrichdatatable {
	/*background-image:url('../Imagenes/fondo.gif');*/
}

.superrichpanelmantenimientoajaxwebpart {
	/*background-image:url('../Imagenes/fondo.gif');*/
}

.busquedatitulo {
	/*background: #89A8F0;*/
	background-image:url('webroot/img/Imagenes/fondo-cabecera-tabla.gif');
	color: #192666;
}

td.busquedatitulocampo {
	/*background: #A0B9F3;
	color: #192666;
	*/
	color: #192666;
}

td.titulocampo {
	/*color: #004990;*/	
}

td.titulocampo h2{
	/*color: #004990;*/
	background-image:url('webroot/img/Imagenes/fondo-cabecera-tabla.gif');
}

.titulobanner { 
	font-size: 20px;
	color: #000000;
}

.mensajeinfo {
	color: green;
	font-weight: bold; 
	/*font-size: 19px;
	color: #000099;
	padding: 5px 0 0 20px;
	letter-spacing: -1px;
	font-weight: 100;*/
}

.mensajeadvertencia {
	color: yellow;
	font-weight: bold; 
	/*font-size: 19px;
	color: #000099;
	padding: 5px 0 0 20px;
	letter-spacing: -1px;
	font-weight: 100;*/
}

.mensajeerror {
	color: red;
	font-weight: bold; 
	/*font-size: 19px;
	color: #000099;
	padding: 5px 0 0 20px;
	letter-spacing: -1px;
	font-weight: 100;*/
}

/*Validacion por campo*/
.error {
	color: red;
	font-weight: bold; 
	/*font-size: 19px;
	color: #000099;
	padding: 5px 0 0 20px;
	letter-spacing: -1px;
	font-weight: 100;*/
}

.divmensajegeneral {
	/*ESTA PARTE ESTABA HABILITADO*/
	/*
	background:yellow;
	color: blue;
	font-weight: bold; 
	*/
	
	/*font-size: 19px;
	color: #000099;
	padding: 5px 0 0 20px;
	letter-spacing: -1px;
	font-weight: 100;*/
}

/*CAKE*/
/*
table .altrow td {
	background: #f5f5f5;
}

dl .altrow {
	background: #f4f4f4;
}
*/

tr.filazebra {
	/*background-color: #d8da3d;*/
	/*background-color: #D6E8FC;*//*#EFF5FC;*/
	background-color: #D6E8FC;
}

tr.filazebraanti {
	background-color: #FFFFFF;
}

tr.filaactivo {
	background-color: #FFFF00;
}

.botonnormal {
    border: 1px solid #006;
   /* background: #9cf;*/
    background-image: url('webroot/img/Imagenes/button.gif');
    background-color:Transparent;
}

.botonactivo {
    border: 1px solid #006;
    background: #FFFF00;
}

.inputnormal {
    border: 1px solid #006;
    background: #ffc;
}

tr.cabeceratabla {
	/*background-color: #D8D8D8;*/
	background-image:url('webroot/img/Imagenes/fondo-cabecera-tabla.gif');
}

span.titulotabla {
	/*background-color: #D8D8D8;*/
	font-weight: bold;
	color:blue;
}

@media print {
	*{
	 background-color: white !important;
	 background-image: none !important;
	}
 }
 
.ButtonImagenRecargarInformacion {
    background-image: url('webroot/img/Imagenes/recargar.gif');   
    background-repeat: no-repeat;      
    background-position:left;
    border: none;   
}

.ButtonImagenOrderBy {
    background-image: url('webroot/img/Imagenes/orden.gif');   
    background-repeat: no-repeat;      
    background-position:left;
    border: none;   
}

.ButtonImagenBuscar {
    background-image: url('webroot/img/Imagenes/buscar.gif');   
    background-repeat: no-repeat;      
    background-position:left;
    border: none;   
}

 .ButtonImagenNuevoTablaPreparar {
    background-image: url('webroot/img/Imagenes/nuevoguardarcambios.gif');   
    background-repeat: no-repeat; 
    background-position:left;
    border: none;
}

.ButtonImagenAnteriores {
    background-image: url('webroot/img/Imagenes/anteriores.gif');   
    background-repeat: no-repeat; 
    background-position:center;
    border: none;
}

.ButtonImagenSiguientes {
    background-image: url('webroot/img/Imagenes/siguientes.gif');   
    background-repeat: no-repeat; 
    background-position:center;
    border: none;
}

.ButtonImagenNuevoPreparar {
    background-image: url('webroot/img/Imagenes/nuevo.gif');   
    background-repeat: no-repeat; 
    background-position:left;
    border: none;
}

.ButtonImagenGuardarCambios {
    background-image: url('webroot/img/Imagenes/guardarcambiostabla.gif');   
    background-repeat: no-repeat; 
    background-position:left;
    border: none;
}

.ButtonImagenDuplicar {
    background-image: url('webroot/img/Imagenes/duplicar.gif');   
    background-repeat: no-repeat;      
    background-position:left;
    border: none;   
}

.ButtonImagenCopiar {
    background-image: url('webroot/img/Imagenes/copiar.gif');   
    background-repeat: no-repeat;      
    background-position:left;
    border: none;   
}

.ButtonImagenCerrarPagina {
    background-image: url('webroot/img/Imagenes/cerrar.gif');   
    background-repeat: no-repeat;      
    background-position:left;
    border: none;   
}

.ButtonImagenActualizar {
    background-image: url('webroot/img/Imagenes/actualizar.gif');   
    background-repeat: no-repeat;      
    background-position:left;
    border: none;   
}

.ButtonImagenEliminar {
    background-image: url('webroot/img/Imagenes/eliminar.gif');   
    background-repeat: no-repeat;      
    background-position:left;
    border: none;   
}

.ButtonImagenCancelar {
    background-image: url('webroot/img/Imagenes/cancelar.gif');   
    background-repeat: no-repeat;      
    background-position:left;
    border: none;   
}

</style>
 
<?php
    }
?>