<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\contabilidad\saldo_cuenta\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Saldo Cuenta Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/contabilidad/saldo_cuenta/util/saldo_cuenta_carga.php');
	use com\bydan\contabilidad\contabilidad\saldo_cuenta\util\saldo_cuenta_carga;
	
	//include_once('com/bydan/contabilidad/contabilidad/saldo_cuenta/presentation/view/saldo_cuenta_web.php');
	//use com\bydan\contabilidad\contabilidad\saldo_cuenta\presentation\view\saldo_cuenta_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	saldo_cuenta_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	saldo_cuenta_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$saldo_cuenta_web1= new saldo_cuenta_web();	
	$saldo_cuenta_web1->cargarDatosGenerales();
	
	//$moduloActual=$saldo_cuenta_web1->moduloActual;
	//$usuarioActual=$saldo_cuenta_web1->usuarioActual;
	//$sessionBase=$saldo_cuenta_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$saldo_cuenta_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/saldo_cuenta/js/templating/saldo_cuenta_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/saldo_cuenta/js/templating/saldo_cuenta_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/saldo_cuenta/js/templating/saldo_cuenta_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/saldo_cuenta/js/templating/saldo_cuenta_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			saldo_cuenta_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					saldo_cuenta_web::$GET_POST=$_GET;
				} else {
					saldo_cuenta_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			saldo_cuenta_web::$STR_NOMBRE_PAGINA = 'saldo_cuenta_view.php';
			saldo_cuenta_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			saldo_cuenta_web::$BIT_ES_PAGINA_FORM = 'false';
				
			saldo_cuenta_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {saldo_cuenta_constante,saldo_cuenta_constante1} from './webroot/js/JavaScript/contabilidad/contabilidad/saldo_cuenta/js/util/saldo_cuenta_constante.js?random=1';
			import {saldo_cuenta_funcion,saldo_cuenta_funcion1} from './webroot/js/JavaScript/contabilidad/contabilidad/saldo_cuenta/js/util/saldo_cuenta_funcion.js?random=1';
			
			let saldo_cuenta_constante2 = new saldo_cuenta_constante();
			
			saldo_cuenta_constante2.STR_NOMBRE_PAGINA="<?php echo(saldo_cuenta_web::$STR_NOMBRE_PAGINA); ?>";
			saldo_cuenta_constante2.STR_TYPE_ON_LOADsaldo_cuenta="<?php echo(saldo_cuenta_web::$STR_TYPE_ONLOAD); ?>";
			saldo_cuenta_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(saldo_cuenta_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			saldo_cuenta_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(saldo_cuenta_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			saldo_cuenta_constante2.STR_ACTION="<?php echo(saldo_cuenta_web::$STR_ACTION); ?>";
			saldo_cuenta_constante2.STR_ES_POPUP="<?php echo(saldo_cuenta_web::$STR_ES_POPUP); ?>";
			saldo_cuenta_constante2.STR_ES_BUSQUEDA="<?php echo(saldo_cuenta_web::$STR_ES_BUSQUEDA); ?>";
			saldo_cuenta_constante2.STR_FUNCION_JS="<?php echo(saldo_cuenta_web::$STR_FUNCION_JS); ?>";
			saldo_cuenta_constante2.BIG_ID_ACTUAL="<?php echo(saldo_cuenta_web::$BIG_ID_ACTUAL); ?>";
			saldo_cuenta_constante2.BIG_ID_OPCION="<?php echo(saldo_cuenta_web::$BIG_ID_OPCION); ?>";
			saldo_cuenta_constante2.STR_OBJETO_JS="<?php echo(saldo_cuenta_web::$STR_OBJETO_JS); ?>";
			saldo_cuenta_constante2.STR_ES_RELACIONES="<?php echo(saldo_cuenta_web::$STR_ES_RELACIONES); ?>";
			saldo_cuenta_constante2.STR_ES_RELACIONADO="<?php echo(saldo_cuenta_web::$STR_ES_RELACIONADO); ?>";
			saldo_cuenta_constante2.STR_ES_SUB_PAGINA="<?php echo(saldo_cuenta_web::$STR_ES_SUB_PAGINA); ?>";
			saldo_cuenta_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(saldo_cuenta_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			saldo_cuenta_constante2.BIT_ES_PAGINA_FORM=<?php echo(saldo_cuenta_web::$BIT_ES_PAGINA_FORM); ?>;
			saldo_cuenta_constante2.STR_SUFIJO="<?php echo(saldo_cuenta_web::$STR_SUF); ?>";//saldo_cuenta
			saldo_cuenta_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(saldo_cuenta_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//saldo_cuenta
			
			saldo_cuenta_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(saldo_cuenta_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			saldo_cuenta_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($saldo_cuenta_web1->moduloActual->getnombre()); ?>";
			saldo_cuenta_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(saldo_cuenta_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			saldo_cuenta_constante2.BIT_ES_LOAD_NORMAL=true;
			/*saldo_cuenta_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			saldo_cuenta_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.saldo_cuenta_constante2 = saldo_cuenta_constante2;
			
		</script>
		
		<?php if(saldo_cuenta_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.saldo_cuenta_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.saldo_cuenta_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="saldo_cuentaActual" ></a>
	
	<div id="divResumensaldo_cuentaActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(saldo_cuenta_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(saldo_cuenta_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(saldo_cuenta_web::$STR_ES_BUSQUEDA=='false' && saldo_cuenta_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(saldo_cuenta_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(saldo_cuenta_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(saldo_cuenta_web::$STR_ES_RELACIONADO=='false' && saldo_cuenta_web::$STR_ES_POPUP=='false' && saldo_cuenta_web::$STR_ES_SUB_PAGINA=='false') {?>
						<td align="left" style="width: 3%">
							<img id="imgIrMain" style="visibility:visible;text-align: center" src="/contabilidad0/webroot/img/Imagenes/ir_main.gif" title="IR A ARBOL DE OPCIONES PRINCIPAL" width="25" height="25"  onclick="funcionGeneral.irWindowAuxiliar('MENU PRINCIPAL','view=Main&action=index&typeonload=onloadhijos')"/>
						</td>
						<td align="left" style="width: 3%">
							<img id="imgCerrarSesion" style="visibility:visible;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar_sesion.gif" title="CERRAR SESION" width="25" height="25"/>
						</td>
						<?php }?>
						<td id="tdToolBar" align="left" style="width: 70%">
							<!-- SECCION/TOOLBAR -->
							<table id="tblToolBar">
								<tr>
									<td id="tdsaldo_cuentaNuevoToolBar">
										<img id="imgNuevoToolBarsaldo_cuenta" name="imgNuevoToolBarsaldo_cuenta" title="Nuevo Saldo Cuenta" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(saldo_cuenta_web::$STR_ES_BUSQUEDA=='false' && saldo_cuenta_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdsaldo_cuentaNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarsaldo_cuenta" name="imgNuevoGuardarCambiosToolBarsaldo_cuenta" title="Nuevo TABLA Saldo Cuenta" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(saldo_cuenta_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdsaldo_cuentaGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarsaldo_cuenta" name="imgGuardarCambiosToolBarsaldo_cuenta" title="Guardar Saldo Cuenta" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(saldo_cuenta_web::$STR_ES_RELACIONADO=='false' && saldo_cuenta_web::$STR_ES_RELACIONES=='false' && saldo_cuenta_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdsaldo_cuentaCopiarToolBar">
										<img id="imgCopiarToolBarsaldo_cuenta" name="imgCopiarToolBarsaldo_cuenta" title="Copiar Saldo Cuenta" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdsaldo_cuentaDuplicarToolBar">
										<img id="imgDuplicarToolBarsaldo_cuenta" name="imgDuplicarToolBarsaldo_cuenta" title="Duplicar Saldo Cuenta" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(saldo_cuenta_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdsaldo_cuentaRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarsaldo_cuenta" name="imgRecargarInformacionToolBarsaldo_cuenta" title="Recargar Saldo Cuenta" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdsaldo_cuentaAnterioresToolBar">
										<img id="imgAnterioresToolBarsaldo_cuenta" name="imgAnterioresToolBarsaldo_cuenta" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdsaldo_cuentaSiguientesToolBar">
										<img id="imgSiguientesToolBarsaldo_cuenta" name="imgSiguientesToolBarsaldo_cuenta" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdsaldo_cuentaAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarsaldo_cuenta" name="imgAbrirOrderByToolBarsaldo_cuenta" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((saldo_cuenta_web::$STR_ES_RELACIONADO=='false' && saldo_cuenta_web::$STR_ES_RELACIONES=='false') || saldo_cuenta_web::$STR_ES_BUSQUEDA=='true'  || saldo_cuenta_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdsaldo_cuentaCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarsaldo_cuenta" name="imgCerrarPaginaToolBarsaldo_cuenta" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
									</td>
									<?php } ?>
								</tr>
							</table> <!-- tblToolBar -->
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
	
		
		<tr id="trsaldo_cuentaCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedasaldo_cuenta" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedasaldo_cuenta',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trsaldo_cuentaCabeceraBusquedas/super -->

		<tr id="trBusquedasaldo_cuenta" class="busqueda" style="display:table-row">
			<td id="tdBusquedasaldo_cuenta" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedasaldo_cuenta" name="frmBusquedasaldo_cuenta">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedasaldo_cuenta" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trsaldo_cuentaBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(saldo_cuenta_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 80%">
					<ul>
						<li id="listrVisibleFK_Idcuenta" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcuenta"> Por  Cuenta</a></li>
						<li id="listrVisibleFK_Idejercicio" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idejercicio"> Por  Ejercicio</a></li>
						<li id="listrVisibleFK_Idperiodo" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idperiodo"> Por  Periodo</a></li>
						<li id="listrVisibleFK_Idtipo_cuenta" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idtipo_cuenta"> Por  Tipo Cuenta</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idcuenta">
					<table id="tblstrVisibleFK_Idcuenta" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Cuenta</span>
						</td>
						<td align="center">
							<select id="FK_Idcuenta-cmbid_cuenta" name="FK_Idcuenta-cmbid_cuenta" title=" Cuenta" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarsaldo_cuentaFK_Idcuenta" name="btnBuscarsaldo_cuentaFK_Idcuenta" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idejercicio">
					<table id="tblstrVisibleFK_Idejercicio" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Ejercicio</span>
						</td>
						<td align="center">
							<select id="FK_Idejercicio-cmbid_ejercicio" name="FK_Idejercicio-cmbid_ejercicio" title=" Ejercicio" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarsaldo_cuentaFK_Idejercicio" name="btnBuscarsaldo_cuentaFK_Idejercicio" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idperiodo">
					<table id="tblstrVisibleFK_Idperiodo" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Periodo</span>
						</td>
						<td align="center">
							<select id="FK_Idperiodo-cmbid_periodo" name="FK_Idperiodo-cmbid_periodo" title=" Periodo" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarsaldo_cuentaFK_Idperiodo" name="btnBuscarsaldo_cuentaFK_Idperiodo" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idtipo_cuenta">
					<table id="tblstrVisibleFK_Idtipo_cuenta" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Tipo Cuenta</span>
						</td>
						<td align="center">
							<select id="FK_Idtipo_cuenta-cmbid_tipo_cuenta" name="FK_Idtipo_cuenta-cmbid_tipo_cuenta" title=" Tipo Cuenta" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarsaldo_cuentaFK_Idtipo_cuenta" name="btnBuscarsaldo_cuentaFK_Idtipo_cuenta" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarsaldo_cuenta" style="display:table-row">
					<td id="tdParamsBuscarsaldo_cuenta">
		<?php if(saldo_cuenta_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarsaldo_cuenta">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrossaldo_cuenta" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrossaldo_cuenta"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrossaldo_cuenta" name="ParamsBuscar-txtNumeroRegistrossaldo_cuenta" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionsaldo_cuenta">
							<td id="tdGenerarReportesaldo_cuenta" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodossaldo_cuenta" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodossaldo_cuenta" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionsaldo_cuenta" name="btnRecargarInformacionsaldo_cuenta" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
										</td>
										<td>
											<select id="ParamsBuscar-cmbPaginacion" name="ParamsBuscar-cmbPaginacion" title="TIPOS DE PAGINACION" style="width:100px"></select>
											<input id="ParamsBuscar-chbConPaginacionInterna" name="ParamsBuscar-chbConPaginacionInterna" title="CON PAGINACION INTERNA" type="checkbox"></input>
										</td>
										<td>
											<label>
												<input id="ParamsBuscar-chbConAltoMaximoTabla" name="ParamsBuscar-chbConAltoMaximoTabla" title="CON ALTO MAXIMO DE TABLA" type="checkbox" checked></input>Alt Max.
											</label>
										</td>							
										<td>							
											<select id="ParamsBuscar-cmbGenerarReporte" name="ParamsBuscar-cmbGenerarReporte" title="TIPOS IMPRESION DE REPORTES" style="width:100px"></select>							
											<input id="ParamsBuscar-chbConReportico" name="ParamsBuscar-chbConReportico" title="CON REPORTICO" type="checkbox">							
										</td>							
										<td>							
											<select id="ParamsBuscar-cmbTiposReporte" name="ParamsBuscar-cmbTiposReporte" title="TIPOS DE REPORTES" style="width:100px"></select>							
										</td>							
										<td>							
											<input type="button" id="btnImprimirPaginasaldo_cuenta" name="btnImprimirPaginasaldo_cuenta" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*saldo_cuenta_web::$STR_ES_BUSQUEDA=='false'  &&*/ saldo_cuenta_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBysaldo_cuenta">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBysaldo_cuenta" name="btnOrderBysaldo_cuenta" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
												</tr>
											</table>
										</td>
										<td>
											<select id="ParamsBuscar-cmbTiposColumnasSelect" name="ParamsBuscar-cmbTiposColumnasSelect" title="TIPOS DE COLUMNAS DE TABLA" style="width:125px"></select>
											<label>
												<input id="ParamsBuscar-chbParaActualizarFk" name="ParamsBuscar-chbParaActualizarFk" title="ABRIR VENTANA ACTUALIZAR DATOS RELACIONADOS" type="checkbox">
											</label>
										</td>
										<td>
											<label>
												<input id="ParamsBuscar-chbSelTodos" name="ParamsBuscar-chbSelTodos" title="SELECCIONAR TODOS LOS REGISTROS" type="checkbox">Sel.Todos
											</label>
										</td>

										<?php if(saldo_cuenta_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdsaldo_cuentaConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodossaldo_cuenta -->

							</td><!-- tdGenerarReportesaldo_cuenta -->
						</tr><!-- trRecargarInformacionsaldo_cuenta -->
					</table><!-- tblParamsBuscarNumeroRegistrossaldo_cuenta -->
				</div> <!-- divParamsBuscarsaldo_cuenta -->
		<?php } ?>
				</td> <!-- tdParamsBuscarsaldo_cuenta -->
				</tr><!-- trParamsBuscarsaldo_cuenta -->
				</table> <!-- tblBusquedasaldo_cuenta -->
				</form> <!-- frmBusquedasaldo_cuenta -->
				

			</td> <!-- tdBusquedasaldo_cuenta -->
		</tr> <!-- trBusquedasaldo_cuenta/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(saldo_cuenta_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divsaldo_cuentaPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblsaldo_cuentaPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmsaldo_cuentaAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnsaldo_cuentaAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="saldo_cuenta_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnsaldo_cuentaAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmsaldo_cuentaAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblsaldo_cuentaPopupAjaxWebPart -->
		</div> <!-- divsaldo_cuentaPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(saldo_cuenta_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trsaldo_cuentaTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdasaldo_cuenta"></a>
		<img id="imgTablaParaDerechasaldo_cuenta" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechasaldo_cuenta'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdasaldo_cuenta" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdasaldo_cuenta'"/>
		<a id="TablaDerechasaldo_cuenta"></a>
	</td>
</tr> <!-- trsaldo_cuentaTablaNavegacion/super -->
<?php } ?>

<tr id="trsaldo_cuentaTablaDatos">
	<td colspan="3" id="htmlTableCellsaldo_cuenta">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatossaldo_cuentasAjaxWebPart">
		</div>
	</td>
</tr> <!-- trsaldo_cuentaTablaDatos/super -->
		
		
		<tr id="trsaldo_cuentaPaginacion" style="display:table-row">
			<td id="tdsaldo_cuentaPaginacion" align="left">
				<div id="divsaldo_cuentaPaginacionAjaxWebPart">
				<form id="frmPaginacionsaldo_cuenta" name="frmPaginacionsaldo_cuenta">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionsaldo_cuenta" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(saldo_cuenta_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFksaldo_cuenta" name="btnSeleccionarLoteFksaldo_cuenta" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(saldo_cuenta_web::$STR_ES_RELACIONADO=='false' /*&& saldo_cuenta_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioressaldo_cuenta" name="btnAnterioressaldo_cuenta" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(saldo_cuenta_web::$STR_ES_BUSQUEDA=='false' && saldo_cuenta_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdsaldo_cuentaNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararsaldo_cuenta" name="btnNuevoTablaPrepararsaldo_cuenta" title="NUEVO Saldo Cuenta" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablasaldo_cuenta" name="ParamsPaginar-txtNumeroNuevoTablasaldo_cuenta" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(saldo_cuenta_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdsaldo_cuentaConEditarsaldo_cuenta">
							<label>
								<input id="ParamsBuscar-chbConEditarsaldo_cuenta" name="ParamsBuscar-chbConEditarsaldo_cuenta" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(saldo_cuenta_web::$STR_ES_RELACIONADO=='false'/* && saldo_cuenta_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientessaldo_cuenta" name="btnSiguientessaldo_cuenta" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionsaldo_cuenta -->
				</form> <!-- frmPaginacionsaldo_cuenta -->
				<form id="frmNuevoPrepararsaldo_cuenta" name="frmNuevoPrepararsaldo_cuenta">
				<table id="tblNuevoPrepararsaldo_cuenta" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trsaldo_cuentaNuevo" height="10">
						<?php if(saldo_cuenta_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdsaldo_cuentaNuevo" align="center">
							<input type="button" id="btnNuevoPrepararsaldo_cuenta" name="btnNuevoPrepararsaldo_cuenta" title="NUEVO Saldo Cuenta" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdsaldo_cuentaGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiossaldo_cuenta" name="btnGuardarCambiossaldo_cuenta" title="GUARDAR Saldo Cuenta" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(saldo_cuenta_web::$STR_ES_RELACIONADO=='false' && saldo_cuenta_web::$STR_ES_RELACIONES=='false' && saldo_cuenta_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdsaldo_cuentaDuplicar" align="center">
							<input type="button" id="btnDuplicarsaldo_cuenta" name="btnDuplicarsaldo_cuenta" title="DUPLICAR Saldo Cuenta" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdsaldo_cuentaCopiar" align="center">
							<input type="button" id="btnCopiarsaldo_cuenta" name="btnCopiarsaldo_cuenta" title="COPIAR Saldo Cuenta" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(saldo_cuenta_web::$STR_ES_RELACIONADO=='false' && ((saldo_cuenta_web::$STR_ES_RELACIONADO=='false' && saldo_cuenta_web::$STR_ES_RELACIONES=='false') || saldo_cuenta_web::$STR_ES_BUSQUEDA=='true'  || saldo_cuenta_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdsaldo_cuentaCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginasaldo_cuenta" name="btnCerrarPaginasaldo_cuenta" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararsaldo_cuenta -->
				</form> <!-- frmNuevoPrepararsaldo_cuenta -->
				</div> <!-- divsaldo_cuentaPaginacionAjaxWebPart -->
			</td> <!-- tdsaldo_cuentaPaginacion -->
		</tr> <!-- trsaldo_cuentaPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(saldo_cuenta_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionessaldo_cuentaAjaxWebPart">
			<td id="tdAccionesRelacionessaldo_cuentaAjaxWebPart">
				<div id="divAccionesRelacionessaldo_cuentaAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionessaldo_cuentaAjaxWebPart -->
		</tr> <!-- trAccionesRelacionessaldo_cuentaAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBysaldo_cuenta">
			<td id="tdOrderBysaldo_cuenta">
				<form id="frmOrderBysaldo_cuenta" name="frmOrderBysaldo_cuenta">
					<div id="divOrderBysaldo_cuentaAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBysaldo_cuenta -->
		</tr> <!-- trOrderBysaldo_cuenta/super -->
			
		
		
		
		
		
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
			
				import {saldo_cuenta_webcontrol,saldo_cuenta_webcontrol1} from './webroot/js/JavaScript/contabilidad/contabilidad/saldo_cuenta/js/webcontrol/saldo_cuenta_webcontrol.js?random=1';
				
				saldo_cuenta_webcontrol1.setsaldo_cuenta_constante(window.saldo_cuenta_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(saldo_cuenta_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

