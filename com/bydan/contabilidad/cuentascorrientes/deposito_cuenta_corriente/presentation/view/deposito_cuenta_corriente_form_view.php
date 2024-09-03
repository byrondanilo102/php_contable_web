<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Deposito Cta Corriente Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/cuentascorrientes/deposito_cuenta_corriente/util/deposito_cuenta_corriente_carga.php');
	use com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\util\deposito_cuenta_corriente_carga;
	
	//include_once('com/bydan/contabilidad/cuentascorrientes/deposito_cuenta_corriente/presentation/view/deposito_cuenta_corriente_web.php');
	//use com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\presentation\view\deposito_cuenta_corriente_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	deposito_cuenta_corriente_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	deposito_cuenta_corriente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$deposito_cuenta_corriente_web1= new deposito_cuenta_corriente_web();	
	$deposito_cuenta_corriente_web1->cargarDatosGenerales();
	
	//$moduloActual=$deposito_cuenta_corriente_web1->moduloActual;
	//$usuarioActual=$deposito_cuenta_corriente_web1->usuarioActual;
	//$sessionBase=$deposito_cuenta_corriente_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$deposito_cuenta_corriente_web1->parametroGeneralUsuarioActual;
	
	
		
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
		
		
			<script type="module" src="webroot/js/JavaScript/contabilidad/cuentascorrientes/deposito_cuenta_corriente/js/util/deposito_cuenta_corriente_form_funcion.js?random=1"></script>
						
		
		
		<?php 
			
		
			deposito_cuenta_corriente_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					deposito_cuenta_corriente_web::$GET_POST=$_GET;
				} else {
					deposito_cuenta_corriente_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			deposito_cuenta_corriente_web::$STR_NOMBRE_PAGINA = 'deposito_cuenta_corriente_form_view.php';
			deposito_cuenta_corriente_web::$BIT_ES_PAGINA_PRINCIPAL = 'false';
			deposito_cuenta_corriente_web::$BIT_ES_PAGINA_FORM = 'true';
				
			deposito_cuenta_corriente_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {deposito_cuenta_corriente_constante,deposito_cuenta_corriente_constante1} from './webroot/js/JavaScript/contabilidad/cuentascorrientes/deposito_cuenta_corriente/js/util/deposito_cuenta_corriente_constante.js?random=1';
			import {deposito_cuenta_corriente_funcion,deposito_cuenta_corriente_funcion1} from './webroot/js/JavaScript/contabilidad/cuentascorrientes/deposito_cuenta_corriente/js/util/deposito_cuenta_corriente_funcion.js?random=1';
			
			let deposito_cuenta_corriente_constante2 = new deposito_cuenta_corriente_constante();
			
			deposito_cuenta_corriente_constante2.STR_NOMBRE_PAGINA="<?php echo(deposito_cuenta_corriente_web::$STR_NOMBRE_PAGINA); ?>";
			deposito_cuenta_corriente_constante2.STR_TYPE_ON_LOADdeposito_cuenta_corriente="<?php echo(deposito_cuenta_corriente_web::$STR_TYPE_ONLOAD); ?>";
			deposito_cuenta_corriente_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(deposito_cuenta_corriente_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			deposito_cuenta_corriente_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(deposito_cuenta_corriente_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			deposito_cuenta_corriente_constante2.STR_ACTION="<?php echo(deposito_cuenta_corriente_web::$STR_ACTION); ?>";
			deposito_cuenta_corriente_constante2.STR_ES_POPUP="<?php echo(deposito_cuenta_corriente_web::$STR_ES_POPUP); ?>";
			deposito_cuenta_corriente_constante2.STR_ES_BUSQUEDA="<?php echo(deposito_cuenta_corriente_web::$STR_ES_BUSQUEDA); ?>";
			deposito_cuenta_corriente_constante2.STR_FUNCION_JS="<?php echo(deposito_cuenta_corriente_web::$STR_FUNCION_JS); ?>";
			deposito_cuenta_corriente_constante2.BIG_ID_ACTUAL="<?php echo(deposito_cuenta_corriente_web::$BIG_ID_ACTUAL); ?>";
			deposito_cuenta_corriente_constante2.BIG_ID_OPCION="<?php echo(deposito_cuenta_corriente_web::$BIG_ID_OPCION); ?>";
			deposito_cuenta_corriente_constante2.STR_OBJETO_JS="<?php echo(deposito_cuenta_corriente_web::$STR_OBJETO_JS); ?>";
			deposito_cuenta_corriente_constante2.STR_ES_RELACIONES="<?php echo(deposito_cuenta_corriente_web::$STR_ES_RELACIONES); ?>";
			deposito_cuenta_corriente_constante2.STR_ES_RELACIONADO="<?php echo(deposito_cuenta_corriente_web::$STR_ES_RELACIONADO); ?>";
			deposito_cuenta_corriente_constante2.STR_ES_SUB_PAGINA="<?php echo(deposito_cuenta_corriente_web::$STR_ES_SUB_PAGINA); ?>";
			deposito_cuenta_corriente_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(deposito_cuenta_corriente_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			deposito_cuenta_corriente_constante2.BIT_ES_PAGINA_FORM=<?php echo(deposito_cuenta_corriente_web::$BIT_ES_PAGINA_FORM); ?>;
			deposito_cuenta_corriente_constante2.STR_SUFIJO="<?php echo(deposito_cuenta_corriente_web::$STR_SUF); ?>";//deposito_cuenta_corriente
			deposito_cuenta_corriente_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(deposito_cuenta_corriente_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//deposito_cuenta_corriente
			
			deposito_cuenta_corriente_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(deposito_cuenta_corriente_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			deposito_cuenta_corriente_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($deposito_cuenta_corriente_web1->moduloActual->getnombre()); ?>";
			deposito_cuenta_corriente_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(deposito_cuenta_corriente_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			deposito_cuenta_corriente_constante2.BIT_ES_LOAD_NORMAL=true;
			/*deposito_cuenta_corriente_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			deposito_cuenta_corriente_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.deposito_cuenta_corriente_constante2 = deposito_cuenta_corriente_constante2;
			
		</script>
		
		<?php if(deposito_cuenta_corriente_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.deposito_cuenta_corriente_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.deposito_cuenta_corriente_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="deposito_cuenta_corrienteActual" ></a>
	
	<div id="divResumendeposito_cuenta_corrienteActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(deposito_cuenta_corriente_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(deposito_cuenta_corriente_web::$STR_ES_RELACIONADO=='false') {?>
			
			
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(deposito_cuenta_corriente_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(deposito_cuenta_corriente_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divdeposito_cuenta_corrientePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tbldeposito_cuenta_corrientePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmdeposito_cuenta_corrienteAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btndeposito_cuenta_corrienteAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="deposito_cuenta_corriente_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btndeposito_cuenta_corrienteAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmdeposito_cuenta_corrienteAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tbldeposito_cuenta_corrientePopupAjaxWebPart -->
		</div> <!-- divdeposito_cuenta_corrientePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->		
		
		
		
			
<tr id="trdeposito_cuenta_corrienteElementosFormulario">
	<td>
		<div id="divMantenimientodeposito_cuenta_corrienteAjaxWebPart" title="DEPOSITO CTA CORRIENTE" style="height: 90%;width: 90%;position: relative;top: 30px;left: 30px;">
			<form id="frmMantenimientodeposito_cuenta_corriente" name="frmMantenimientodeposito_cuenta_corriente">

			</br>

			<?php if(deposito_cuenta_corriente_web::$STR_ES_RELACIONES=='false' ) {?>
			</br>
			<?php } ?>

			<!-- SECCION/TOOLBAR -->
			<table id="tbldeposito_cuenta_corrienteToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tbldeposito_cuenta_corrienteToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tddeposito_cuenta_corrienteActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBardeposito_cuenta_corriente" name="imgActualizarToolBardeposito_cuenta_corriente" title="ACTUALIZAR Deposito Cta Corriente ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tddeposito_cuenta_corrienteEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBardeposito_cuenta_corriente" name="imgEliminarToolBardeposito_cuenta_corriente" title="ELIMINAR Deposito Cta Corriente ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tddeposito_cuenta_corrienteCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBardeposito_cuenta_corriente" name="imgCancelarToolBardeposito_cuenta_corriente" title="CANCELAR Deposito Cta Corriente ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tddeposito_cuenta_corrienteRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultosdeposito_cuenta_corriente',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tbldeposito_cuenta_corrienteToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tbldeposito_cuenta_corrienteToolBarFormularioExterior -->

			<table id="tbldeposito_cuenta_corrienteElementos">
			<tr id="trdeposito_cuenta_corrienteElementos" class="elementos" style="display:table-row">
			<td align="center">

			<a id="Campos"></a>

				<?php if(deposito_cuenta_corriente_web::$STR_ES_RELACIONES=='false' ) {?>
				<div id="divFlechaArribaElementos" align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
					<span></span>
				</div>
				<?php } ?>

				<!-- SECCION/FORMULARIO -->
				<table id="tblElementosdeposito_cuenta_corriente" class="elementos" style="width: 400px; padding: 0px; border-spacing: 0px; border-collapse: collapse; text-align: left;">
					<tr id="tr_fila_1">
						<td id="td_title-id" class="titulocampo">
							<label class="form-label">Cod. Único</label>
						</td>
						<td id="td_control-id" align="left">
							<input id="form-id" name="form-id" type="text" class="form-control" readonly size="10">
						</td>
					</tr>
					<tr id="tr_fila_2">
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
					<tr id="tr_fila_3">
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
					<tr id="tr_fila_4">
						<td id="td_title-id_cuenta_corriente" class="titulocampo">
							<label class="form-label"> Cuenta Corriente.(*)</label>
						</td>
						<td id="td_control-id_cuenta_corriente" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_cuenta_corriente" name="form-id_cuenta_corriente" title=" Cuenta Corriente" ></select></td>
									<td><a><img id="form-id_cuenta_corriente_img" name="form-id_cuenta_corriente_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_cuenta_corriente_img_busqueda" name="form-id_cuenta_corriente_img_busqueda" title="Buscar Cuenta Corriente" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_cuenta_corriente" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-fecha_emision" class="titulocampo">
							<label class="form-label">Fecha Emision.(*)</label>
						</td>
						<td id="td_control-fecha_emision" align="left" class="controlcampo">
							<input id="form-fecha_emision" name="form-fecha_emision" type="text" class="form-control"  placeholder="Fecha Emision"  title="Fecha Emision"    size="10" >
							<span id="spanstrMensajefecha_emision" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-monto" class="titulocampo">
							<label class="form-label">Monto.(*)</label>
						</td>
						<td id="td_control-monto" align="left" class="controlcampo">
							<input id="form-monto" name="form-monto" type="text" class="form-control"  placeholder="Monto"  title="Monto"    maxlength="18" size="12" >
							<span id="spanstrMensajemonto" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_7">
						<td id="td_title-monto_texto" class="titulocampo">
							<label class="form-label">Monto Texto</label>
						</td>
						<td id="td_control-monto_texto" align="left" class="controlcampo">
							<textarea id="form-monto_texto" name="form-monto_texto" class="form-control"  placeholder="Monto Texto"  title="Monto Texto"   style="font-size: 13px;" rows="3" cols="25" size="20" ></textarea>
							<span id="spanstrMensajemonto_texto" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_8">
						<td id="td_title-saldo" class="titulocampo">
							<label class="form-label">Saldo Actual.(*)</label>
						</td>
						<td id="td_control-saldo" align="left" class="controlcampo">
							<input id="form-saldo" name="form-saldo" type="text" class="form-control"  placeholder="Saldo Actual"  title="Saldo Actual"    maxlength="18" size="12"  readonly="readonly">
							<span id="spanstrMensajesaldo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_9">
						<td id="td_title-descripcion" class="titulocampo">
							<label class="form-label">Descripcion</label>
						</td>
						<td id="td_control-descripcion" align="left" class="controlcampo">
							<textarea id="form-descripcion" name="form-descripcion" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;"  rows ="0" cols= "25"></textarea>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_10">
						<td id="td_title-es_balance_inicial" class="titulocampo">
							<label class="form-label">Es Balance Inicial</label>
						</td>
						<td id="td_control-es_balance_inicial" align="left" class="controlcampo">
							<input id="form-es_balance_inicial" name="form-es_balance_inicial" type="checkbox"  disabled="disabled">
							<span id="spanstrMensajees_balance_inicial" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_11">
						<td id="td_title-id_estado_deposito_retiro" class="titulocampo">
							<label class="form-label"> Estado Deposito Retiro.(*)</label>
						</td>
						<td id="td_control-id_estado_deposito_retiro" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_estado_deposito_retiro" name="form-id_estado_deposito_retiro" title=" Estado Deposito Retiro" ></select></td>
									<td><a><img id="form-id_estado_deposito_retiro_img" name="form-id_estado_deposito_retiro_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_estado_deposito_retiro_img_busqueda" name="form-id_estado_deposito_retiro_img_busqueda" title="Buscar Estado Deposito Retiro Cheque" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_estado_deposito_retiro" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblElementosdeposito_cuenta_corriente -->

				<!-- SECCION/OCULTOS -->
				<table id="tblCamposOcultosdeposito_cuenta_corriente" class="elementos" style="display: table-row;">
					<caption class="busquedacabecera">
						<span>Campos Ocultos</span>
					</caption>
					
						<td id="td_title-id_empresa" class="titulocampo">
							<label class="form-label"> Empresa.(*)</label>
						</td>
						<td id="td_control-id_empresa" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_empresa" name="form-id_empresa" title=" Empresa" ></select></td>
									<td><a><img id="form-id_empresa_img" name="form-id_empresa_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_empresa_img_busqueda" name="form-id_empresa_img_busqueda" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_empresa" class="mensajeerror"></span>
						</td>
					
					<tr id="tr_fila_1">
						<td id="td_title-id_sucursal" class="titulocampo">
							<label class="form-label"> Sucursal.(*)</label>
						</td>
						<td id="td_control-id_sucursal" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_sucursal" name="form-id_sucursal" title=" Sucursal" ></select></td>
									<td><a><img id="form-id_sucursal_img" name="form-id_sucursal_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_sucursal_img_busqueda" name="form-id_sucursal_img_busqueda" title="Buscar Sucursal" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_sucursal" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_2">
						<td id="td_title-id_ejercicio" class="titulocampo">
							<label class="form-label"> Ejercicio.(*)</label>
						</td>
						<td id="td_control-id_ejercicio" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_ejercicio" name="form-id_ejercicio" title=" Ejercicio" ></select></td>
									<td><a><img id="form-id_ejercicio_img" name="form-id_ejercicio_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_ejercicio_img_busqueda" name="form-id_ejercicio_img_busqueda" title="Buscar ejercicio" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_ejercicio" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_3">
						<td id="td_title-id_periodo" class="titulocampo">
							<label class="form-label"> Periodo.(*)</label>
						</td>
						<td id="td_control-id_periodo" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_periodo" name="form-id_periodo" title=" Periodo" ></select></td>
									<td><a><img id="form-id_periodo_img" name="form-id_periodo_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_periodo_img_busqueda" name="form-id_periodo_img_busqueda" title="Buscar periodo" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_periodo" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_4">
						<td id="td_title-id_usuario" class="titulocampo">
							<label class="form-label"> Usuario.(*)</label>
						</td>
						<td id="td_control-id_usuario" align="left" class="controlcombo">
							
							<table align="left" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td><select id="form-id_usuario" name="form-id_usuario" title=" Usuario" ></select></td>
									<td><a><img id="form-id_usuario_img" name="form-id_usuario_img" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="/contabilidad0/webroot/img/Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a></td>
									<td><img id="form-id_usuario_img_busqueda" name="form-id_usuario_img_busqueda" title="Buscar Usuario" style="width: 15px; height: 15px;text-align: center; visibility:hidden;" src="/contabilidad0/webroot/img/Imagenes/buscar.gif" width="15" height="15"/></td>
								</tr>
							</table>
							<span id="spanstrMensajeid_usuario" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_5">
						<td id="td_title-debito" class="titulocampo">
							<label class="form-label">Debito.(*)</label>
						</td>
						<td id="td_control-debito" align="left" class="controlcampo">
							<input id="form-debito" name="form-debito" type="text" class="form-control"  placeholder="Debito"  title="Debito"    maxlength="18" size="12" >
							<span id="spanstrMensajedebito" class="mensajeerror"></span>
						</td>
					</tr>
					<tr id="tr_fila_6">
						<td id="td_title-credito" class="titulocampo">
							<label class="form-label">Credito.(*)</label>
						</td>
						<td id="td_control-credito" align="left" class="controlcampo">
							<input id="form-credito" name="form-credito" type="text" class="form-control"  placeholder="Credito"  title="Credito"    maxlength="18" size="12" >
							<span id="spanstrMensajecredito" class="mensajeerror"></span>
						</td>
					</tr>
				</table> <!-- tblCamposOcultosdeposito_cuenta_corriente -->

			</td></tr> <!-- trdeposito_cuenta_corrienteElementos -->
			</table> <!-- tbldeposito_cuenta_corrienteElementos -->
			</form> <!-- frmMantenimientodeposito_cuenta_corriente -->


			

				<form id="frmAccionesMantenimientodeposito_cuenta_corriente" name="frmAccionesMantenimientodeposito_cuenta_corriente">

			<?php if(deposito_cuenta_corriente_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tbldeposito_cuenta_corrienteAcciones" class="elementos" style="text-align: center">
		<tr id="trdeposito_cuenta_corrienteAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(deposito_cuenta_corriente_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientodeposito_cuenta_corriente" class="busqueda" style="width: 50%;text-align: left">

						<?php if(deposito_cuenta_corriente_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientodeposito_cuenta_corrienteBasicos">
							<td id="tdbtnNuevodeposito_cuenta_corriente" style="visibility:visible">
								<div id="divNuevodeposito_cuenta_corriente" style="display:table-row">
									<input type="button" id="btnNuevodeposito_cuenta_corriente" name="btnNuevodeposito_cuenta_corriente" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizardeposito_cuenta_corriente" style="visibility:visible">
								<div id="divActualizardeposito_cuenta_corriente" style="display:table-row">
									<input type="button" id="btnActualizardeposito_cuenta_corriente" name="btnActualizardeposito_cuenta_corriente" title="ACTUALIZAR Deposito Cta Corriente ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminardeposito_cuenta_corriente" style="visibility:visible">
								<div id="divEliminardeposito_cuenta_corriente" style="display:table-row">
									<input type="button" id="btnEliminardeposito_cuenta_corriente" name="btnEliminardeposito_cuenta_corriente" title="ELIMINAR Deposito Cta Corriente ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirdeposito_cuenta_corriente" style="visibility:visible">
								<input type="button" id="btnImprimirdeposito_cuenta_corriente" name="btnImprimirdeposito_cuenta_corriente" title="IMPRIMIR PAGINA Deposito Cta Corriente ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelardeposito_cuenta_corriente" style="visibility:visible">
								<input type="button" id="btnCancelardeposito_cuenta_corriente" name="btnCancelardeposito_cuenta_corriente" title="CANCELAR Deposito Cta Corriente ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientodeposito_cuenta_corrienteGuardar" style="display:none">
							<td id="tdbtnGuardarCambiosdeposito_cuenta_corriente" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiosdeposito_cuenta_corriente" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariodeposito_cuenta_corriente" name="btnGuardarCambiosFormulariodeposito_cuenta_corriente" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientodeposito_cuenta_corriente -->
			</td>
		</tr> <!-- trdeposito_cuenta_corrienteAcciones -->
		<?php if(deposito_cuenta_corriente_web::$STR_ES_RELACIONADO=='false' ) {?>
		<tr id="trdeposito_cuenta_corrienteParametrosAcciones" class="impresion"  style="display:table-row">
			<td align="center">
				<!-- SECCION/POST -->
				<table id="tbldeposito_cuenta_corrienteParametrosAcciones" style="text-align: center;border: 0px solid black;padding: 0px; border-spacing: 0px">
					<caption class="busquedacabecera" style="padding: 0px;caption-side: top;">
						<span>Acciones Extra/Post</span>
					</caption>
					<tr id="trdeposito_cuenta_corrienteFilaParametrosAcciones">
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
				</table> <!-- tbldeposito_cuenta_corrienteParametrosAcciones -->
			</td>
		</tr> <!-- trdeposito_cuenta_corrienteParametrosAcciones -->
		<?php }?>
		<tr id="trdeposito_cuenta_corrienteMensajes" class="mensajes">
			<td align="center">
				<a id="Mensajes"></a>
			</td>
		</tr> <!-- trdeposito_cuenta_corrienteMensajes -->
			</table> <!-- tbldeposito_cuenta_corrienteAcciones -->
			<?php } ?>
			</form> <!-- frmMantenimientodeposito_cuenta_corriente -->
			</div> <!-- divMantenimientodeposito_cuenta_corrienteAjaxWebPart -->
		</td>
	</tr> <!-- trdeposito_cuenta_corrienteElementosFormulario/super -->
		<?php if(deposito_cuenta_corriente_web::$STR_ES_RELACIONADO=='false' ) {?>

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
			
				import {deposito_cuenta_corriente_webcontrol,deposito_cuenta_corriente_webcontrol1} from './webroot/js/JavaScript/contabilidad/cuentascorrientes/deposito_cuenta_corriente/js/webcontrol/deposito_cuenta_corriente_form_webcontrol.js?random=1';
				
				deposito_cuenta_corriente_webcontrol1.setdeposito_cuenta_corriente_constante(window.deposito_cuenta_corriente_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(deposito_cuenta_corriente_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

