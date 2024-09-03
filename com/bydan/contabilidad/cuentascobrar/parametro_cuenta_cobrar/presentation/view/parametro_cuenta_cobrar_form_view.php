<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentascobrar\parametro_cuenta_cobrar\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Parametro Cuentas Cobrar Mantenimiento" markupType="html"> -->
		<head>
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
	
	include_once('com/bydan/contabilidad/cuentascobrar/parametro_cuenta_cobrar/util/parametro_cuenta_cobrar_carga.php');
	use com\bydan\contabilidad\cuentascobrar\parametro_cuenta_cobrar\util\parametro_cuenta_cobrar_carga;
	
	//include_once('com/bydan/contabilidad/cuentascobrar/parametro_cuenta_cobrar/presentation/view/parametro_cuenta_cobrar_web.php');
	//use com\bydan\contabilidad\cuentascobrar\parametro_cuenta_cobrar\presentation\view\parametro_cuenta_cobrar_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	parametro_cuenta_cobrar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	parametro_cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$parametro_cuenta_cobrar_web1= new parametro_cuenta_cobrar_web();	
	$parametro_cuenta_cobrar_web1->cargarDatosGenerales();
	
	//$moduloActual=$parametro_cuenta_cobrar_web1->moduloActual;
	//$usuarioActual=$parametro_cuenta_cobrar_web1->usuarioActual;
	//$sessionBase=$parametro_cuenta_cobrar_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$parametro_cuenta_cobrar_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/cuentascobrar/parametro_cuenta_cobrar/js/util/parametro_cuenta_cobrar_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			parametro_cuenta_cobrar_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					parametro_cuenta_cobrar_web::$GET_POST=$_GET;
				} else {
					parametro_cuenta_cobrar_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			parametro_cuenta_cobrar_web::$STR_NOMBRE_PAGINA = 'parametro_cuenta_cobrar_form_view.php';
			parametro_cuenta_cobrar_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			parametro_cuenta_cobrar_web::$BIT_ES_PAGINA_FORM = 'true';
				
			parametro_cuenta_cobrar_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {parametro_cuenta_cobrar_constante,parametro_cuenta_cobrar_constante1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/parametro_cuenta_cobrar/js/util/parametro_cuenta_cobrar_constante.js?random=1';
			import {parametro_cuenta_cobrar_funcion,parametro_cuenta_cobrar_funcion1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/parametro_cuenta_cobrar/js/util/parametro_cuenta_cobrar_funcion.js?random=1';
			
			let parametro_cuenta_cobrar_constante2 = new parametro_cuenta_cobrar_constante();
			
			parametro_cuenta_cobrar_constante2.STR_NOMBRE_PAGINA="<?php echo(parametro_cuenta_cobrar_web::$STR_NOMBRE_PAGINA); ?>";
			parametro_cuenta_cobrar_constante2.STR_TYPE_ON_LOADparametro_cuenta_cobrar="<?php echo(parametro_cuenta_cobrar_web::$STR_TYPE_ONLOAD); ?>";
			parametro_cuenta_cobrar_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(parametro_cuenta_cobrar_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			parametro_cuenta_cobrar_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(parametro_cuenta_cobrar_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			parametro_cuenta_cobrar_constante2.STR_ACTION="<?php echo(parametro_cuenta_cobrar_web::$STR_ACTION); ?>";
			parametro_cuenta_cobrar_constante2.STR_ES_POPUP="<?php echo(parametro_cuenta_cobrar_web::$STR_ES_POPUP); ?>";
			parametro_cuenta_cobrar_constante2.STR_ES_BUSQUEDA="<?php echo(parametro_cuenta_cobrar_web::$STR_ES_BUSQUEDA); ?>";
			parametro_cuenta_cobrar_constante2.STR_FUNCION_JS="<?php echo(parametro_cuenta_cobrar_web::$STR_FUNCION_JS); ?>";
			parametro_cuenta_cobrar_constante2.BIG_ID_ACTUAL="<?php echo(parametro_cuenta_cobrar_web::$BIG_ID_ACTUAL); ?>";
			parametro_cuenta_cobrar_constante2.BIG_ID_OPCION="<?php echo(parametro_cuenta_cobrar_web::$BIG_ID_OPCION); ?>";
			parametro_cuenta_cobrar_constante2.STR_OBJETO_JS="<?php echo(parametro_cuenta_cobrar_web::$STR_OBJETO_JS); ?>";
			parametro_cuenta_cobrar_constante2.STR_ES_RELACIONES="<?php echo(parametro_cuenta_cobrar_web::$STR_ES_RELACIONES); ?>";
			parametro_cuenta_cobrar_constante2.STR_ES_RELACIONADO="<?php echo(parametro_cuenta_cobrar_web::$STR_ES_RELACIONADO); ?>";
			parametro_cuenta_cobrar_constante2.STR_ES_SUB_PAGINA="<?php echo(parametro_cuenta_cobrar_web::$STR_ES_SUB_PAGINA); ?>";
			parametro_cuenta_cobrar_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(parametro_cuenta_cobrar_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			parametro_cuenta_cobrar_constante2.BIT_ES_PAGINA_FORM=<?php echo(parametro_cuenta_cobrar_web::$BIT_ES_PAGINA_FORM); ?>;
			parametro_cuenta_cobrar_constante2.STR_SUFIJO="<?php echo(parametro_cuenta_cobrar_web::$STR_SUF); ?>";//parametro_cuenta_cobrar
			parametro_cuenta_cobrar_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(parametro_cuenta_cobrar_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//parametro_cuenta_cobrar
			
			parametro_cuenta_cobrar_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(parametro_cuenta_cobrar_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			parametro_cuenta_cobrar_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($parametro_cuenta_cobrar_web1->moduloActual->getnombre()); ?>";
			parametro_cuenta_cobrar_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(parametro_cuenta_cobrar_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			parametro_cuenta_cobrar_constante2.BIT_ES_LOAD_NORMAL=true;
			/*parametro_cuenta_cobrar_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			parametro_cuenta_cobrar_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.parametro_cuenta_cobrar_constante2 = parametro_cuenta_cobrar_constante2;
			
		</script>
		
		<?php if(parametro_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.parametro_cuenta_cobrar_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.parametro_cuenta_cobrar_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="parametro_cuenta_cobrarActual" ></a>
	
	<div id="divResumenparametro_cuenta_cobrarActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(parametro_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(parametro_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(parametro_cuenta_cobrar_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(parametro_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divparametro_cuenta_cobrarPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblparametro_cuenta_cobrarPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmparametro_cuenta_cobrarAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnparametro_cuenta_cobrarAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="parametro_cuenta_cobrar_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnparametro_cuenta_cobrarAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmparametro_cuenta_cobrarAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblparametro_cuenta_cobrarPopupAjaxWebPart -->
		</div> <!-- divparametro_cuenta_cobrarPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trparametro_cuenta_cobrarElementosFormulario">
	<td>
		<div id="divMantenimientoparametro_cuenta_cobrarAjaxWebPart" title="PARAMETRO CUENTAS COBRAR" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientoparametro_cuenta_cobrar" name="frmMantenimientoparametro_cuenta_cobrar">

			</br>

			<?php if(parametro_cuenta_cobrar_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tblparametro_cuenta_cobrarToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tblparametro_cuenta_cobrarToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdparametro_cuenta_cobrarActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBarparametro_cuenta_cobrar" name="imgActualizarToolBarparametro_cuenta_cobrar" title="ACTUALIZAR Parametro Cuentas Cobrar ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdparametro_cuenta_cobrarEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBarparametro_cuenta_cobrar" name="imgEliminarToolBarparametro_cuenta_cobrar" title="ELIMINAR Parametro Cuentas Cobrar ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdparametro_cuenta_cobrarCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBarparametro_cuenta_cobrar" name="imgCancelarToolBarparametro_cuenta_cobrar" title="CANCELAR Parametro Cuentas Cobrar ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdparametro_cuenta_cobrarRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosparametro_cuenta_cobrar',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tblparametro_cuenta_cobrarToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tblparametro_cuenta_cobrarToolBarFormularioExterior -->

			<table id="tblparametro_cuenta_cobrarElementos">
			<tr id="trparametro_cuenta_cobrarElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(parametro_cuenta_cobrar_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>


				<div id="tabs_elementos" class="tabs" style="width: 100%">
					<ul>
						<li class="titulotab"><a href="#cobrar">COBRAR</a></li>
						<li class="titulotab"><a href="#clientes">CLIENTES</a></li>
					</ul>


				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosparametro_cuenta_cobrar" class="elementos" style="width: 400px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
					
						<td colspan="2" style="visibility:hidden;display:none">
							<table style="width:100%">
								<tr style="visibility:hidden;display:none">
								<td id="td_title-created_at" class="titulocampo">
								</td>
								<td id="td_control-created_at" align="left" class="controlcampo">
									<input id="form-created_at" name="form-created_at" type="text" class="form-control"  placeholder="Created At"  title="Created At"   readonly>
									<span id="spanstrMensajecreated_at" class="mensajeerror"></span>
								</td>
								</tr>
							</table>
						</td>
					</tr>
					
						<td colspan="2" style="visibility:hidden;display:none">
							<table style="width:100%">
								<tr style="visibility:hidden;display:none">
								<td id="td_title-updated_at" class="titulocampo">
								</td>
								<td id="td_control-updated_at" align="left" class="controlcampo">
									<input id="form-updated_at" name="form-updated_at" type="text" class="form-control"  placeholder="Updated At"  title="Updated At"   readonly>
									<span id="spanstrMensajeupdated_at" class="mensajeerror"></span>
								</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr id="trparametro_cuenta_cobrarcobrarElementos">
						<td id="tdparametro_cuenta_cobrarcobrarElementos" >
			<div id="cobrar">
				<table class="elementos" style="width:300px;text-align:left; padding: 0px; border-spacing: 0px; border-collapse: collapse;">
					<caption class="busquedacabecera"><span>COBRAR</span></caption>
					<tr id="tr_fila_1">
						<td id="td_title-id" class="titulocampo">
							<label class="form-label">Cod. Único</label>
						</td>
						<td id="td_control-id" align="left">
							<input id="form-id" name="form-id" type="text" class="form-control" readonly size="10">
						</td>
					</tr>
					<tr id="tr_fila_2">
						<td id="td_title-numero_cuenta_cobrar" class="titulocampo">
							<label class="form-label">Numero Cuenta Cobrar.(*)</label>
						</td>
						<td id="td_control-numero_cuenta_cobrar" align="left" class="controlcampo">
							<input id="form-numero_cuenta_cobrar" name="form-numero_cuenta_cobrar" type="text" class="form-control"  placeholder="Numero Cuenta Cobrar"  title="Numero Cuenta Cobrar"    maxlength="19" size="10" >
							<span id="spanstrMensajenumero_cuenta_cobrar" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_3">
						<td id="td_title-numero_debito" class="titulocampo">
							<label class="form-label">Numero Debito.(*)</label>
						</td>
						<td id="td_control-numero_debito" align="left" class="controlcampo">
							<input id="form-numero_debito" name="form-numero_debito" type="text" class="form-control"  placeholder="Numero Debito"  title="Numero Debito"    maxlength="19" size="10" >
							<span id="spanstrMensajenumero_debito" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_4">
						<td id="td_title-numero_credito" class="titulocampo">
							<label class="form-label">Numero Credito.(*)</label>
						</td>
						<td id="td_control-numero_credito" align="left" class="controlcampo">
							<input id="form-numero_credito" name="form-numero_credito" type="text" class="form-control"  placeholder="Numero Credito"  title="Numero Credito"    maxlength="19" size="10" >
							<span id="spanstrMensajenumero_credito" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-numero_pago" class="titulocampo">
							<label class="form-label">Numero Pago.(*)</label>
						</td>
						<td id="td_control-numero_pago" align="left" class="controlcampo">
							<input id="form-numero_pago" name="form-numero_pago" type="text" class="form-control"  placeholder="Numero Pago"  title="Numero Pago"    maxlength="19" size="10" >
							<span id="spanstrMensajenumero_pago" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-mostrar_anulado" class="titulocampo">
							<label class="form-label">Mostrar Anulado</label>
						</td>
						<td id="td_control-mostrar_anulado" align="left" class="controlcampo">
							<input id="form-mostrar_anulado" name="form-mostrar_anulado" type="checkbox" >
							<span id="spanstrMensajemostrar_anulado" class="mensajeerror"></span>
						</td>
					</tr>
				</table>
			</div>
				</td></tr>
					<tr id="trparametro_cuenta_cobrarclientesElementos">
						<td id="tdparametro_cuenta_cobrarclientesElementos" >
			<div id="clientes">
				<table class="elementos" style="width:300px;text-align:left; padding: 0px; border-spacing: 0px; border-collapse: collapse;">
					<caption class="busquedacabecera"><span>CLIENTES</span></caption>
					
						<td id="td_title-numero_cliente" class="titulocampo">
							<label class="form-label">Numero Cliente.(*)</label>
						</td>
						<td id="td_control-numero_cliente" align="left" class="controlcampo">
							<input id="form-numero_cliente" name="form-numero_cliente" type="text" class="form-control"  placeholder="Numero Cliente"  title="Numero Cliente"    maxlength="19" size="10" >
							<span id="spanstrMensajenumero_cliente" class="mensajeerror"></span>
						</td>
					
					<tr id="tr_fila_1">
						<td id="td_title-con_cliente_inactivo" class="titulocampo">
							<label class="form-label">Con Cliente Inactivo</label>
						</td>
						<td id="td_control-con_cliente_inactivo" align="left" class="controlcampo">
							<input id="form-con_cliente_inactivo" name="form-con_cliente_inactivo" type="checkbox" >
							<span id="spanstrMensajecon_cliente_inactivo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_2">
						<td id="td_title-nombre_registro_tributario" class="titulocampo">
							<label class="form-label">Nombre Registro Tributario.(*)</label>
						</td>
						<td id="td_control-nombre_registro_tributario" align="left" class="controlcampo">
							<input id="form-nombre_registro_tributario" name="form-nombre_registro_tributario" type="text" class="form-control"  placeholder="Nombre Registro Tributario"  title="Nombre Registro Tributario"    size="20"  maxlength="30"/>
							<span id="spanstrMensajenombre_registro_tributario" class="mensajeerror"></span>
						</td>
					</tr>
				</table>
			</div>
				</td></tr>
				</table> <!-- tblElementosparametro_cuenta_cobrar -->
				</div>

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosparametro_cuenta_cobrar" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
					
						<td id="td_title-id_empresa" class="titulocampo">
							<label class="form-label">Empresa</label>
						</td>
						<td id="td_control-id_empresa" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_empresa" name="form-id_empresa" title="Empresa" ></select></td>
									<td><a><img id="form-id_empresa_img" name="form-id_empresa_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_empresa_img_busqueda" name="form-id_empresa_img_busqueda" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_empresa" class="mensajeerror"></span>
						</td>
					
				</table> <!-- tblCamposOcultosparametro_cuenta_cobrar -->

			</td></tr> <!-- trparametro_cuenta_cobrarElementos -->
			</table> <!-- tblparametro_cuenta_cobrarElementos -->
			</form> <!-- frmMantenimientoparametro_cuenta_cobrar -->


			

				<form id="frmAccionesMantenimientoparametro_cuenta_cobrar" name="frmAccionesMantenimientoparametro_cuenta_cobrar">

			<?php if(parametro_cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tblparametro_cuenta_cobrarAcciones" class="elementos" style="text-align: center">
		<tr id="trparametro_cuenta_cobrarAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(parametro_cuenta_cobrar_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientoparametro_cuenta_cobrar" class="busqueda" style="width: 50%;text-align: left">

						<?php if(parametro_cuenta_cobrar_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientoparametro_cuenta_cobrarBasicos">
							<td id="tdbtnNuevoparametro_cuenta_cobrar" style="visibility:visible">
								<div id="divNuevoparametro_cuenta_cobrar" style="display:table-row">
									<input type="button" id="btnNuevoparametro_cuenta_cobrar" name="btnNuevoparametro_cuenta_cobrar" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizarparametro_cuenta_cobrar" style="visibility:visible">
								<div id="divActualizarparametro_cuenta_cobrar" style="display:table-row">
									<input type="button" id="btnActualizarparametro_cuenta_cobrar" name="btnActualizarparametro_cuenta_cobrar" title="ACTUALIZAR Parametro Cuentas Cobrar ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminarparametro_cuenta_cobrar" style="visibility:visible">
								<div id="divEliminarparametro_cuenta_cobrar" style="display:table-row">
									<input type="button" id="btnEliminarparametro_cuenta_cobrar" name="btnEliminarparametro_cuenta_cobrar" title="ELIMINAR Parametro Cuentas Cobrar ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirparametro_cuenta_cobrar" style="visibility:visible">
								<input type="button" id="btnImprimirparametro_cuenta_cobrar" name="btnImprimirparametro_cuenta_cobrar" title="IMPRIMIR PAGINA Parametro Cuentas Cobrar ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelarparametro_cuenta_cobrar" style="visibility:visible">
								<input type="button" id="btnCancelarparametro_cuenta_cobrar" name="btnCancelarparametro_cuenta_cobrar" title="CANCELAR Parametro Cuentas Cobrar ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientoparametro_cuenta_cobrarGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosparametro_cuenta_cobrar" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosparametro_cuenta_cobrar" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormularioparametro_cuenta_cobrar" name="btnGuardarCambiosFormularioparametro_cuenta_cobrar" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientoparametro_cuenta_cobrar -->
			</td>
		</tr> <!-- trparametro_cuenta_cobrarAcciones -->
		<?php if(parametro_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trparametro_cuenta_cobrarParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tblparametro_cuenta_cobrarParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trparametro_cuenta_cobrarFilaParametrosAcciones">
						<td>
							<select id="ParamsPostAccion-cmbAccionesFormulario" name="ParamsPostAccion-cmbAccionesFormulario" title="TIPOS DE ACCIONES" style="width:200px"></select>
						</td>
						<td>
							<label>
								<input id="ParamsPostAccion-chbPostAccionNuevo" name="ParamsPostAccion-chbPostAccionNuevo" title="OTRO NUEVO REGISTRO" type="checkbox">Nuevo
							</label>
						</td>
						<td>
							<label>
								<input id="ParamsPostAccion-chbPostAccionSinCerrar" name="ParamsPostAccion-chbPostAccionSinCerrar" title="SIN CERRAR FORMULARIO" type="checkbox">Sin Cerrar
							</label>
						</td>
						<td>
							<label>
								<input id="ParamsPostAccion-chbPostAccionSinMensaje" name="ParamsPostAccion-chbPostAccionSinMensaje" title="SIN MENSAJE CONFIRMACION" type="checkbox">Sin Mensaje
							</label>
						</td>
					</tr>
				</table> <!-- tblparametro_cuenta_cobrarParametrosAcciones -->
			</td>
		</tr> <!-- trparametro_cuenta_cobrarParametrosAcciones -->
		<?php }?>
		<tr id="trparametro_cuenta_cobrarMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trparametro_cuenta_cobrarMensajes -->
			</table> <!-- tblparametro_cuenta_cobrarAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientoparametro_cuenta_cobrar -->
			</div> <!-- divMantenimientoparametro_cuenta_cobrarAjaxWebPart -->
		</td>
	</tr> <!-- trparametro_cuenta_cobrarElementosFormulario/super -->
		<?php if(parametro_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' ) {?>

		<tr><td>
		</td></tr>
		<?php }?>
			
			
		
		
		
		
		
		
	</table> <!-- super -->
	
		
	
			</div> <!-- content -->    

			


    	</div> <!-- main -->
	
 	</div> <!-- outerborder -->	
	
	
		<?php 
			if(array_key_exists('typeonload',$_REQUEST) && $_REQUEST['typeonload']!=null && $_REQUEST['typeonload']=='onloadhijos') {
		?>
		
		<?php 
			}
		?>	
		
		
		
		
			
				<script type="module">
			
				import {parametro_cuenta_cobrar_webcontrol,parametro_cuenta_cobrar_webcontrol1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/parametro_cuenta_cobrar/js/webcontrol/parametro_cuenta_cobrar_form_webcontrol.js?random=1';
				
				parametro_cuenta_cobrar_webcontrol1.setparametro_cuenta_cobrar_constante(window.parametro_cuenta_cobrar_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(parametro_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false') {?>
	
	
	<?php 
		if(Constantes::$BIT_CON_ARBOL_MENU) { 
			 /*$tree->writeJavascript();*/ 		
		}	
	?>
	

	
	<?php }?>



	<!-- <div name="footer"> -->    
	<!-- </div> -->
</body>

</html>

