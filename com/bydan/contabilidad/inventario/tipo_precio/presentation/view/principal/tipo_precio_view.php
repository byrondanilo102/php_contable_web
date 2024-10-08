<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\tipo_precio\presentation\view\principal;

use com\bydan\contabilidad\inventario\tipo_precio\presentation\view\tipo_precio_web;

?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Tipo Precio Mantenimiento" markupType="html"> -->
		<head>
			
					<!-- <head> -->
		
			<meta http-equiv="Content-Type" content="text/html;charset=utf-8">

<?php

 /*
*AVISO LEGAL
(C) Copyright
*Este programa esta protegido por la ley de derechos de autor.
*La reproduccion o distribucion ilicita de este programa o de cualquiera de
*sus partes esta penado por la ley con severas sanciones civiles y penales,
*y seran objeto de todas las sanciones legales que correspondan.

*Su contenido no puede copiarse para fines comerciales o de otras,
*ni puede mostrarse, incluso en una version modificada, en otros sitios Web.
Solo esta permitido colocar hipervinculos al sitio web.
*/

	include_once('com/bydan/framework/contabilidad/util/Constantes.php');
	use com\bydan\framework\contabilidad\util\Constantes;
	
	//include_once('com/bydan/framework/contabilidad/util/Funciones.php');
	//use com\bydan\framework\contabilidad\util\Funciones;
	
	include_once('com/bydan/framework/contabilidad/util/PaqueteTipo.php');
	use com\bydan\framework\contabilidad\util\PaqueteTipo;
	
	include_once('com/bydan/contabilidad/inventario/tipo_precio/util/tipo_precio_carga.php');
	use com\bydan\contabilidad\inventario\tipo_precio\util\tipo_precio_carga;
	
	//include_once('com/bydan/contabilidad/inventario/tipo_precio/presentation/view/tipo_precio_web.php');
	//use com\bydan\contabilidad\inventario\tipo_precio\presentation\view\tipo_precio_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	tipo_precio_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	tipo_precio_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
			
	$tipo_precio_web1= new tipo_precio_web();	
	$tipo_precio_web1->cargarDatosGenerales();
	
		
	//$STR_SUFIJO_ESTILO_LETRA_USUARIO=Funciones::getParametroEstiloTipoLetraUsuario($parametroGeneralUsuarioActual);
?>
			
		
		<script type="module" src="webroot/js/JavaScript/Library/General/Constantes.js"></script>
		<script type="module" src="webroot/js/JavaScript/Library/Entity/GeneralEntityConstante.js"></script>
		<script type="module" src="webroot/js/JavaScript/Library/Entity/GeneralEntityFuncion.js"></script>
		<script type="module" src="webroot/js/JavaScript/Library/Entity/GeneralEntityWebControl.js"></script>
		<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneral.js"></script>
		<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralEventoJQuery.js"></script>		
		
		<!-- El Templating SOLO funciona con include desde Php -->
		<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/Library/Presentation/Templating/OrderByTemplate.js' ); ?>				
		<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/Library/Presentation/Templating/OrderByRelTemplate.js' ); ?>
		
		<script type="text/javascript" src="webroot/js/JavaScript/Library/Ajax/waiter.js"></script>
		<script type="module" src="webroot/js/JavaScript/Library/Validacion/Validacion.js"></script>
		
		
			
			<!-- El Templating SOLO funciona con include desde Php -->
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/tipo_precio/js/templating/tipo_precio_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/tipo_precio/js/templating/tipo_precio_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/tipo_precio/js/templating/tipo_precio_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/tipo_precio/js/templating/tipo_precio_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/tipo_precio/js/templating/tipo_precio_datos_relaciones_template.js'); ?>
			
		
		<?php 
		
			tipo_precio_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					tipo_precio_web::$GET_POST=$_GET;
				} else {
					tipo_precio_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			tipo_precio_web::$STR_NOMBRE_PAGINA = 'tipo_precio_view.php';
			tipo_precio_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			tipo_precio_web::$BIT_ES_PAGINA_FORM = 'false';
				
			tipo_precio_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {tipo_precio_constante,tipo_precio_constante1} from './webroot/js/JavaScript/contabilidad/inventario/tipo_precio/js/util/tipo_precio_constante.js?random=1';
			
			import {tipo_precio_funcion,tipo_precio_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/tipo_precio/js/util/principal/tipo_precio_funcion.js?random=1';
			
			let tipo_precio_constante2 = new tipo_precio_constante();
			
			tipo_precio_constante2.STR_NOMBRE_PAGINA="<?php echo(tipo_precio_web::$STR_NOMBRE_PAGINA); ?>";
			tipo_precio_constante2.STR_TYPE_ON_LOADtipo_precio="<?php echo(tipo_precio_web::$STR_TYPE_ONLOAD); ?>";
			tipo_precio_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(tipo_precio_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			tipo_precio_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(tipo_precio_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			tipo_precio_constante2.STR_ACTION="<?php echo(tipo_precio_web::$STR_ACTION); ?>";
			tipo_precio_constante2.STR_ES_POPUP="<?php echo(tipo_precio_web::$STR_ES_POPUP); ?>";
			tipo_precio_constante2.STR_ES_BUSQUEDA="<?php echo(tipo_precio_web::$STR_ES_BUSQUEDA); ?>";
			tipo_precio_constante2.STR_FUNCION_JS="<?php echo(tipo_precio_web::$STR_FUNCION_JS); ?>";
			tipo_precio_constante2.BIG_ID_ACTUAL="<?php echo(tipo_precio_web::$BIG_ID_ACTUAL); ?>";
			tipo_precio_constante2.BIG_ID_OPCION="<?php echo(tipo_precio_web::$BIG_ID_OPCION); ?>";
			tipo_precio_constante2.STR_OBJETO_JS="<?php echo(tipo_precio_web::$STR_OBJETO_JS); ?>";
			tipo_precio_constante2.STR_ES_RELACIONES="<?php echo(tipo_precio_web::$STR_ES_RELACIONES); ?>";
			tipo_precio_constante2.STR_ES_RELACIONADO="<?php echo(tipo_precio_web::$STR_ES_RELACIONADO); ?>";
			tipo_precio_constante2.STR_ES_SUB_PAGINA="<?php echo(tipo_precio_web::$STR_ES_SUB_PAGINA); ?>";
			tipo_precio_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(tipo_precio_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			tipo_precio_constante2.BIT_ES_PAGINA_FORM=<?php echo(tipo_precio_web::$BIT_ES_PAGINA_FORM); ?>;
			tipo_precio_constante2.STR_SUFIJO="<?php echo(tipo_precio_web::$STR_SUF); ?>";//tipo_precio
			tipo_precio_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(tipo_precio_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//tipo_precio
			
			tipo_precio_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(tipo_precio_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			tipo_precio_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($tipo_precio_web1->moduloActual->getnombre()); ?>";
			tipo_precio_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(tipo_precio_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			tipo_precio_constante2.BIT_ES_LOAD_NORMAL=true;
			/*tipo_precio_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			tipo_precio_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.tipo_precio_constante2 = tipo_precio_constante2;
			
		</script>
		
		<?php if(tipo_precio_web::$STR_ES_RELACIONADO=='false') {?>
				
		
		<script type="text/javascript" src="webroot/js/handlebars-4.7.6/handlebars.min.js"></script>
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/jquery-1.10.2.js"></script>
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/pluggin/jquery.form.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/pluggin/jquery.popupWindow.js"></script>
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/pluggin/jquery.validate.js"></script>		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/pluggin/jquery.datetimepicker.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/pluggin/jquery.uploadfile.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/pluggin/select2.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/pluggin/DataTables-1.10.0/media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/pluggin/jstree3_0/jstree.js"></script>
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.datepicker.js"></script>
		
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.core.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.core.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.effect.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.widget.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.tabs.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.mouse.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.draggable.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.position.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.slider.js"></script>
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.menu.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.autocomplete.js"></script>
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.resizable.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.dialog.js"></script>
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.effect-blind.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.effect-explode.js"></script>
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.button.js"></script>
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.tooltip.js"></script>
		
		<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/themes/<?php echo(Constantes::$STR_THEME);?>/jquery-ui.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/themes/<?php echo(Constantes::$STR_THEME);?>/jquery.ui.theme.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/pluggin/jquery.datetimepicker.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/pluggin/uploadfile.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/pluggin/select2.css" type="text/css"/>		
		<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/pluggin/DataTables-1.10.0/media/css/jquery.dataTables.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/pluggin/DataTables-1.10.0/media/css/dataTables.jqueryui.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/pluggin/jstree3_0/themes/default/style.css" type="text/css"/>
		
		<script type="text/javascript">
			
		</script>
		
				
		<?php if(!Constantes::$BIT_CON_CSS_PHP) {?>
		
		<link rel="stylesheet" type="text/css" href="webroot/scss/pagina.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="webroot/scss/general.css" media="screen" />		
		
		
		<link rel="stylesheet" href="webroot/css/bootstrap5/bootstrap.min.css" type="text/css"/>
		<script type="text/javascript" src="webroot/js/bootstrap5/bootstrap.bundle.min.js"></script>

		<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> -->
		<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script> -->
		<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script> -->	
		
		<?php } else { /*NO ES USADO, TALVEZ SE DEJA*/ ?>
		
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_layout.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_shared.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.tipo_precio_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.tipo_precio_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>

		
		<?php }?>
			
				
		
		<?php } ?>
		
			<title> </title>
			
		<!-- </head> -->
		

			
		</head>
		<body>
		

	<a id="tipo_precioActual" ></a>
	
	<div id="divResumentipo_precioActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(tipo_precio_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						<div id="divOpcionesBanner" >
							<!-- <jsp:include page="/Component/header.jsp" /> -->
						</div>						
						
			</div> <!-- sub-header -->
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(tipo_precio_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
				
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(tipo_precio_web::$STR_ES_BUSQUEDA=='false' && tipo_precio_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					
					<?php } ?>
				
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(tipo_precio_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								

 	<!-- </head> -->
	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
	<?php if(tipo_precio_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(tipo_precio_web::$STR_ES_RELACIONADO=='false' && tipo_precio_web::$STR_ES_POPUP=='false' && tipo_precio_web::$STR_ES_SUB_PAGINA=='false') {?>
						<td align="left" style="width: 3%">
							<img id="imgIrMain" style="visibility:visible;text-align: center" src="/contabilidad0/webroot/img/Imagenes/ir_main.gif" title="IR A ARBOL DE OPCIONES PRINCIPAL" width="25" height="25"  onclick="funcionGeneral.irWindowAuxiliar('MENU PRINCIPAL','view=Main&action=index&typeonload=onloadhijos')"/>
						</td>
						<td align="left" style="width: 3%">
							<img id="imgCerrarSesion" style="visibility:visible;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar_sesion.gif" title="CERRAR SESION" width="25" height="25"/>
						</td>
						<?php }?>
						<td id="tdToolBar" align="center" style="width: 70%">

			<?php include_once('com/bydan/contabilidad/inventario/tipo_precio/presentation/view/principal/component/tipo_precio_toolbar_component.php'); ?>
						</td> <!-- tdToolBar -->
						<td id="tdControlesSecciones" align="center" style="width: 20%">
							<a id="ControlesSecciones" ></a>

							<img id="imgAreaBusquedas" align="right" style="visibility:hidden" src="/contabilidad0/webroot/img/Imagenes/busqueda.gif" width="20" height="20"  onclick="funcionGeneral.irAreaDePagina('Busquedas')"/>
							<img id="imgAreaControles" align="right" style="visibility:hidden" src="/contabilidad0/webroot/img/Imagenes/controles.gif" width="20" height="20"  onclick="funcionGeneral.irAreaDePagina('Campos')"/>
							<img id="imgAreaAcciones" align="right" style="visibility:hidden" src="/contabilidad0/webroot/img/Imagenes/acciones.gif" width="20" height="20"  onclick="funcionGeneral.irAreaDePagina('Acciones')"/>
							<img id="imgAtras" align="right" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/atras.gif" width="20" height="20"  onclick="history.back()"/>
						</td> <!-- tdControlesSecciones -->
					</tr> <!-- trExpandirColapsar -->
				</table> <!-- tblExpandirColapsar -->
			</form> <!-- frmExpandirColapsar -->
		</td>
	</tr> <!-- trNavegacion/super -->
	<?php } ?> 
		
			

			<?php include_once('com/bydan/contabilidad/inventario/tipo_precio/presentation/view/principal/component/tipo_precio_search_component.php'); ?>
		
		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(tipo_precio_web::$STR_ES_RELACIONADO=='false' ) {?>

		<!-- SECCION/MENSAJE -->
		<div id="divMensajePage" class="ui-state-highlight ui-corner-all" style="display:none;margin-top: 20px; padding: 0 .7em;">
			<p id="parrMensajePage">
				<span id="spanIcoMensajePage" class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
				<span id="spanMensajePage"></span>
			</p>
		</div> <!-- divMensajePage -->

		<div id="divMensajePageDialog" title="Mensaje" class="ui-state-highlight ui-corner-all">
			<p id="parrMensajePageDialog">
				<span id="spanIcoMensajePageDialog" class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
				<span id="spanMensajePageDialog"></span>
			</p>
		</div> <!-- divMensajePageDialog -->
<?php }?>

		<div id="divtipo_precioPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tbltipo_precioPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmtipo_precioAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btntipo_precioAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="tipo_precio_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btntipo_precioAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmtipo_precioAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tbltipo_precioPopupAjaxWebPart -->
		</div> <!-- divtipo_precioPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(tipo_precio_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trtipo_precioTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdatipo_precio"></a>
		<img id="imgTablaParaDerechatipo_precio" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechatipo_precio'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdatipo_precio" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdatipo_precio'"/>
		<a id="TablaDerechatipo_precio"></a>
	</td>
</tr> <!-- trtipo_precioTablaNavegacion/super -->
<?php } ?>

<tr id="trtipo_precioTablaDatos">
	<td colspan="3" id="htmlTableCelltipo_precio">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatostipo_preciosAjaxWebPart">
		</div>
	</td>
</tr> <!-- trtipo_precioTablaDatos/super -->
		
		
		<tr id="trtipo_precioPaginacion" style="display:table-row">
			<td id="tdtipo_precioPaginacion" align="center">

			<?php include_once('com/bydan/contabilidad/inventario/tipo_precio/presentation/view/principal/component/tipo_precio_actions_component.php'); ?>
			</td> <!-- tdtipo_precioPaginacion -->
		</tr> <!-- trtipo_precioPaginacion/super -->
		
		
		
			
		<?php if(tipo_precio_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionestipo_precioAjaxWebPart">
			<td id="tdAccionesRelacionestipo_precioAjaxWebPart">
				<div id="divAccionesRelacionestipo_precioAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionestipo_precioAjaxWebPart -->
		</tr> <!-- trAccionesRelacionestipo_precioAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBytipo_precio">
			<td id="tdOrderBytipo_precio">
				<form id="frmOrderBytipo_precio" name="frmOrderBytipo_precio">
					<div id="divOrderBytipo_precioAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByReltipo_precio" name="frmOrderByReltipo_precio">
					<div id="divOrderByReltipo_precioAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBytipo_precio -->
		</tr> <!-- trOrderBytipo_precio/super -->			
		
		
	</table> <!-- super -->
	
			</div> <!-- content -->    

			


    	</div> <!-- main -->
	
 	</div> <!-- outerborder -->	
	
			<!-- <footer> -->
		
	
		<?php 
			if(array_key_exists('typeonload',$_REQUEST) && $_REQUEST['typeonload']!=null && $_REQUEST['typeonload']=='onloadhijos') {
		?>
		
		<?php 
			}
		?>	
		
		
		
		
				
				<script type="module">
			
				import {tipo_precio_webcontrol,tipo_precio_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/tipo_precio/js/webcontrol/principal/tipo_precio_webcontrol.js?random=51';
				
				tipo_precio_webcontrol1.settipo_precio_constante(window.tipo_precio_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(tipo_precio_web::$STR_ES_RELACIONADO=='false') {?>
	
	
	<?php 
		if(Constantes::$BIT_CON_ARBOL_MENU) { 
			/*$tree->writeJavascript();*/ 		
		}	
	?>
	

	
	<?php }?>

	<!-- </footer> -->
	
	<!-- <div name="footer"> -->    
	<!-- </div> -->					
		

	
</body>

</html>

