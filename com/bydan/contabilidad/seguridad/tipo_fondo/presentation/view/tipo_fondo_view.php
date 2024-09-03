<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\seguridad\tipo_fondo\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Tipo Fondo Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/seguridad/tipo_fondo/util/tipo_fondo_carga.php');
	use com\bydan\contabilidad\seguridad\tipo_fondo\util\tipo_fondo_carga;
	
	//include_once('com/bydan/contabilidad/seguridad/tipo_fondo/presentation/view/tipo_fondo_web.php');
	//use com\bydan\contabilidad\seguridad\tipo_fondo\presentation\view\tipo_fondo_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	tipo_fondo_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	tipo_fondo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$tipo_fondo_web1= new tipo_fondo_web();	
	$tipo_fondo_web1->cargarDatosGenerales();
	
	//$moduloActual=$tipo_fondo_web1->moduloActual;
	//$usuarioActual=$tipo_fondo_web1->usuarioActual;
	//$sessionBase=$tipo_fondo_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$tipo_fondo_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/tipo_fondo/js/templating/tipo_fondo_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/tipo_fondo/js/templating/tipo_fondo_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/tipo_fondo/js/templating/tipo_fondo_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/tipo_fondo/js/templating/tipo_fondo_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			tipo_fondo_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					tipo_fondo_web::$GET_POST=$_GET;
				} else {
					tipo_fondo_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			tipo_fondo_web::$STR_NOMBRE_PAGINA = 'tipo_fondo_view.php';
			tipo_fondo_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			tipo_fondo_web::$BIT_ES_PAGINA_FORM = 'false';
				
			tipo_fondo_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {tipo_fondo_constante,tipo_fondo_constante1} from './webroot/js/JavaScript/contabilidad/seguridad/tipo_fondo/js/util/tipo_fondo_constante.js?random=1';
			import {tipo_fondo_funcion,tipo_fondo_funcion1} from './webroot/js/JavaScript/contabilidad/seguridad/tipo_fondo/js/util/tipo_fondo_funcion.js?random=1';
			
			let tipo_fondo_constante2 = new tipo_fondo_constante();
			
			tipo_fondo_constante2.STR_NOMBRE_PAGINA="<?php echo(tipo_fondo_web::$STR_NOMBRE_PAGINA); ?>";
			tipo_fondo_constante2.STR_TYPE_ON_LOADtipo_fondo="<?php echo(tipo_fondo_web::$STR_TYPE_ONLOAD); ?>";
			tipo_fondo_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(tipo_fondo_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			tipo_fondo_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(tipo_fondo_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			tipo_fondo_constante2.STR_ACTION="<?php echo(tipo_fondo_web::$STR_ACTION); ?>";
			tipo_fondo_constante2.STR_ES_POPUP="<?php echo(tipo_fondo_web::$STR_ES_POPUP); ?>";
			tipo_fondo_constante2.STR_ES_BUSQUEDA="<?php echo(tipo_fondo_web::$STR_ES_BUSQUEDA); ?>";
			tipo_fondo_constante2.STR_FUNCION_JS="<?php echo(tipo_fondo_web::$STR_FUNCION_JS); ?>";
			tipo_fondo_constante2.BIG_ID_ACTUAL="<?php echo(tipo_fondo_web::$BIG_ID_ACTUAL); ?>";
			tipo_fondo_constante2.BIG_ID_OPCION="<?php echo(tipo_fondo_web::$BIG_ID_OPCION); ?>";
			tipo_fondo_constante2.STR_OBJETO_JS="<?php echo(tipo_fondo_web::$STR_OBJETO_JS); ?>";
			tipo_fondo_constante2.STR_ES_RELACIONES="<?php echo(tipo_fondo_web::$STR_ES_RELACIONES); ?>";
			tipo_fondo_constante2.STR_ES_RELACIONADO="<?php echo(tipo_fondo_web::$STR_ES_RELACIONADO); ?>";
			tipo_fondo_constante2.STR_ES_SUB_PAGINA="<?php echo(tipo_fondo_web::$STR_ES_SUB_PAGINA); ?>";
			tipo_fondo_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(tipo_fondo_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			tipo_fondo_constante2.BIT_ES_PAGINA_FORM=<?php echo(tipo_fondo_web::$BIT_ES_PAGINA_FORM); ?>;
			tipo_fondo_constante2.STR_SUFIJO="<?php echo(tipo_fondo_web::$STR_SUF); ?>";//tipo_fondo
			tipo_fondo_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(tipo_fondo_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//tipo_fondo
			
			tipo_fondo_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(tipo_fondo_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			tipo_fondo_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($tipo_fondo_web1->moduloActual->getnombre()); ?>";
			tipo_fondo_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(tipo_fondo_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			tipo_fondo_constante2.BIT_ES_LOAD_NORMAL=true;
			/*tipo_fondo_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			tipo_fondo_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.tipo_fondo_constante2 = tipo_fondo_constante2;
			
		</script>
		
		<?php if(tipo_fondo_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.tipo_fondo_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.tipo_fondo_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="tipo_fondoActual" ></a>
	
	<div id="divResumentipo_fondoActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(tipo_fondo_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(tipo_fondo_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(tipo_fondo_web::$STR_ES_BUSQUEDA=='false' && tipo_fondo_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(tipo_fondo_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(tipo_fondo_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(tipo_fondo_web::$STR_ES_RELACIONADO=='false' && tipo_fondo_web::$STR_ES_POPUP=='false' && tipo_fondo_web::$STR_ES_SUB_PAGINA=='false') {?>
						<td align="left" style="width: 3%">
							<img id="imgIrMain" style="visibility:visible;text-align: center" src="/contabilidad0/webroot/img/Imagenes/ir_main.gif" title="IR A ARBOL DE OPCIONES PRINCIPAL" width="25" height="25"  onclick="funcionGeneral.irWindowAuxiliar('MENU PRINCIPAL','view=Main&action=index&typeonload=onloadhijos')"/>
						</td>
						<td align="left" style="width: 3%">
							<img id="imgCerrarSesion" style="visibility:visible;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar_sesion.gif" title="CERRAR SESION" width="25" height="25"/>
						</td>
						<?php }?>
						<td id="tdToolBar" align="center" style="width: 70%">
							<!-- SECCION/TOOLBAR -->
							<table id="tblToolBar">
								<tr>
									<td id="tdtipo_fondoNuevoToolBar">
										<img id="imgNuevoToolBartipo_fondo" name="imgNuevoToolBartipo_fondo" title="Nuevo Tipo Fondo" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(tipo_fondo_web::$STR_ES_BUSQUEDA=='false' && tipo_fondo_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdtipo_fondoNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBartipo_fondo" name="imgNuevoGuardarCambiosToolBartipo_fondo" title="Nuevo TABLA Tipo Fondo" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(tipo_fondo_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdtipo_fondoGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBartipo_fondo" name="imgGuardarCambiosToolBartipo_fondo" title="Guardar Tipo Fondo" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(tipo_fondo_web::$STR_ES_RELACIONADO=='false' && tipo_fondo_web::$STR_ES_RELACIONES=='false' && tipo_fondo_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdtipo_fondoCopiarToolBar">
										<img id="imgCopiarToolBartipo_fondo" name="imgCopiarToolBartipo_fondo" title="Copiar Tipo Fondo" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdtipo_fondoDuplicarToolBar">
										<img id="imgDuplicarToolBartipo_fondo" name="imgDuplicarToolBartipo_fondo" title="Duplicar Tipo Fondo" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(tipo_fondo_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdtipo_fondoRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBartipo_fondo" name="imgRecargarInformacionToolBartipo_fondo" title="Recargar Tipo Fondo" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdtipo_fondoAnterioresToolBar">
										<img id="imgAnterioresToolBartipo_fondo" name="imgAnterioresToolBartipo_fondo" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdtipo_fondoSiguientesToolBar">
										<img id="imgSiguientesToolBartipo_fondo" name="imgSiguientesToolBartipo_fondo" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdtipo_fondoAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBartipo_fondo" name="imgAbrirOrderByToolBartipo_fondo" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((tipo_fondo_web::$STR_ES_RELACIONADO=='false' && tipo_fondo_web::$STR_ES_RELACIONES=='false') || tipo_fondo_web::$STR_ES_BUSQUEDA=='true'  || tipo_fondo_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdtipo_fondoCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBartipo_fondo" name="imgCerrarPaginaToolBartipo_fondo" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trtipo_fondoCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedatipo_fondo" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedatipo_fondo',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trtipo_fondoCabeceraBusquedas/super -->

		<tr id="trBusquedatipo_fondo" class="busqueda" style="display:table-row">
			<td id="tdBusquedatipo_fondo" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedatipo_fondo" name="frmBusquedatipo_fondo">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedatipo_fondo" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trtipo_fondoBusquedas" class="busqueda" style="display:none"><td>
				<?php if(tipo_fondo_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
				
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscartipo_fondo" style="display:table-row">
					<td id="tdParamsBuscartipo_fondo">
		<?php if(tipo_fondo_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscartipo_fondo">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrostipo_fondo" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrostipo_fondo"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrostipo_fondo" name="ParamsBuscar-txtNumeroRegistrostipo_fondo" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformaciontipo_fondo">
							<td id="tdGenerarReportetipo_fondo" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodostipo_fondo" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodostipo_fondo" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformaciontipo_fondo" name="btnRecargarInformaciontipo_fondo" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginatipo_fondo" name="btnImprimirPaginatipo_fondo" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*tipo_fondo_web::$STR_ES_BUSQUEDA=='false'  &&*/ tipo_fondo_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBytipo_fondo">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBytipo_fondo" name="btnOrderBytipo_fondo" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByReltipo_fondo" name="btnOrderByReltipo_fondo" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(tipo_fondo_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdtipo_fondoConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodostipo_fondo -->

							</td><!-- tdGenerarReportetipo_fondo -->
						</tr><!-- trRecargarInformaciontipo_fondo -->
					</table><!-- tblParamsBuscarNumeroRegistrostipo_fondo -->
				</div> <!-- divParamsBuscartipo_fondo -->
		<?php } ?>
				</td> <!-- tdParamsBuscartipo_fondo -->
				</tr><!-- trParamsBuscartipo_fondo -->
				</table> <!-- tblBusquedatipo_fondo -->
				</form> <!-- frmBusquedatipo_fondo -->
				

			</td> <!-- tdBusquedatipo_fondo -->
		</tr> <!-- trBusquedatipo_fondo/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(tipo_fondo_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divtipo_fondoPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tbltipo_fondoPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmtipo_fondoAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btntipo_fondoAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="tipo_fondo_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btntipo_fondoAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmtipo_fondoAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tbltipo_fondoPopupAjaxWebPart -->
		</div> <!-- divtipo_fondoPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(tipo_fondo_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trtipo_fondoTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdatipo_fondo"></a>
		<img id="imgTablaParaDerechatipo_fondo" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechatipo_fondo'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdatipo_fondo" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdatipo_fondo'"/>
		<a id="TablaDerechatipo_fondo"></a>
	</td>
</tr> <!-- trtipo_fondoTablaNavegacion/super -->
<?php } ?>

<tr id="trtipo_fondoTablaDatos">
	<td colspan="3" id="htmlTableCelltipo_fondo">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatostipo_fondosAjaxWebPart">
		</div>
	</td>
</tr> <!-- trtipo_fondoTablaDatos/super -->
		
		
		<tr id="trtipo_fondoPaginacion" style="display:table-row">
			<td id="tdtipo_fondoPaginacion" align="center">
				<div id="divtipo_fondoPaginacionAjaxWebPart">
				<form id="frmPaginaciontipo_fondo" name="frmPaginaciontipo_fondo">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginaciontipo_fondo" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(tipo_fondo_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFktipo_fondo" name="btnSeleccionarLoteFktipo_fondo" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(tipo_fondo_web::$STR_ES_RELACIONADO=='false' /*&& tipo_fondo_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnteriorestipo_fondo" name="btnAnteriorestipo_fondo" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(tipo_fondo_web::$STR_ES_BUSQUEDA=='false' && tipo_fondo_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdtipo_fondoNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPreparartipo_fondo" name="btnNuevoTablaPreparartipo_fondo" title="NUEVO Tipo Fondo" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablatipo_fondo" name="ParamsPaginar-txtNumeroNuevoTablatipo_fondo" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(tipo_fondo_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdtipo_fondoConEditartipo_fondo">
							<label>
								<input id="ParamsBuscar-chbConEditartipo_fondo" name="ParamsBuscar-chbConEditartipo_fondo" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(tipo_fondo_web::$STR_ES_RELACIONADO=='false'/* && tipo_fondo_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientestipo_fondo" name="btnSiguientestipo_fondo" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginaciontipo_fondo -->
				</form> <!-- frmPaginaciontipo_fondo -->
				<form id="frmNuevoPreparartipo_fondo" name="frmNuevoPreparartipo_fondo">
				<table id="tblNuevoPreparartipo_fondo" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trtipo_fondoNuevo" height="10">
						<?php if(tipo_fondo_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdtipo_fondoNuevo" align="center">
							<input type="button" id="btnNuevoPreparartipo_fondo" name="btnNuevoPreparartipo_fondo" title="NUEVO Tipo Fondo" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdtipo_fondoGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiostipo_fondo" name="btnGuardarCambiostipo_fondo" title="GUARDAR Tipo Fondo" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(tipo_fondo_web::$STR_ES_RELACIONADO=='false' && tipo_fondo_web::$STR_ES_RELACIONES=='false' && tipo_fondo_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdtipo_fondoDuplicar" align="center">
							<input type="button" id="btnDuplicartipo_fondo" name="btnDuplicartipo_fondo" title="DUPLICAR Tipo Fondo" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdtipo_fondoCopiar" align="center">
							<input type="button" id="btnCopiartipo_fondo" name="btnCopiartipo_fondo" title="COPIAR Tipo Fondo" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(tipo_fondo_web::$STR_ES_RELACIONADO=='false' && ((tipo_fondo_web::$STR_ES_RELACIONADO=='false' && tipo_fondo_web::$STR_ES_RELACIONES=='false') || tipo_fondo_web::$STR_ES_BUSQUEDA=='true'  || tipo_fondo_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdtipo_fondoCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginatipo_fondo" name="btnCerrarPaginatipo_fondo" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPreparartipo_fondo -->
				</form> <!-- frmNuevoPreparartipo_fondo -->
				</div> <!-- divtipo_fondoPaginacionAjaxWebPart -->
			</td> <!-- tdtipo_fondoPaginacion -->
		</tr> <!-- trtipo_fondoPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(tipo_fondo_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionestipo_fondoAjaxWebPart">
			<td id="tdAccionesRelacionestipo_fondoAjaxWebPart">
				<div id="divAccionesRelacionestipo_fondoAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionestipo_fondoAjaxWebPart -->
		</tr> <!-- trAccionesRelacionestipo_fondoAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBytipo_fondo">
			<td id="tdOrderBytipo_fondo">
				<form id="frmOrderBytipo_fondo" name="frmOrderBytipo_fondo">
					<div id="divOrderBytipo_fondoAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByReltipo_fondo" name="frmOrderByReltipo_fondo">
					<div id="divOrderByReltipo_fondoAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBytipo_fondo -->
		</tr> <!-- trOrderBytipo_fondo/super -->
			
		
		
		
		
		
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
			
				import {tipo_fondo_webcontrol,tipo_fondo_webcontrol1} from './webroot/js/JavaScript/contabilidad/seguridad/tipo_fondo/js/webcontrol/tipo_fondo_webcontrol.js?random=1';
				
				tipo_fondo_webcontrol1.settipo_fondo_constante(window.tipo_fondo_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(tipo_fondo_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

