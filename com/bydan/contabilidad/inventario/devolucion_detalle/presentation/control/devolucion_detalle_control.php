<?php declare(strict_types = 1);
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

namespace com\bydan\contabilidad\inventario\devolucion_detalle\presentation\control;

use Exception;

include_once('com/bydan/framework/contabilidad/util/Constantes.php');
use com\bydan\framework\contabilidad\util\Constantes;

include_once(Constantes::$PATH_REL.'com/bydan/framework/contabilidad/util/Funciones.php');
use com\bydan\framework\contabilidad\util\Funciones;

use com\bydan\framework\contabilidad\util\FuncionesWebArbol;

include_once(Constantes::$PATH_REL.'com/bydan/framework/contabilidad/util/PaqueteTipo.php');
use com\bydan\framework\contabilidad\util\PaqueteTipo;

use com\bydan\framework\contabilidad\util\ControlTipo;
use com\bydan\framework\contabilidad\util\DeepLoadType;
use com\bydan\framework\contabilidad\util\EventoTipo;
use com\bydan\framework\contabilidad\util\EventoSubTipo;
use com\bydan\framework\contabilidad\util\EventoGlobalTipo;
use com\bydan\framework\contabilidad\util\FuncionesObject;
use com\bydan\framework\contabilidad\util\Connexion;

use com\bydan\framework\contabilidad\util\excel\ExcelHelper;
use com\bydan\framework\contabilidad\util\pdf\FpdfHelper;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Mensajes;
use com\bydan\framework\contabilidad\business\entity\SelectItem;

//use com\bydan\framework\contabilidad\business\entity\DatoGeneralMinimo;
//use com\bydan\framework\contabilidad\business\logic\DatosDeep;

use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\ConexionController;

use com\bydan\framework\contabilidad\business\data\ModelBase;

use com\bydan\framework\contabilidad\business\logic\DatosCliente;
use com\bydan\framework\contabilidad\business\logic\Pagination;

use com\bydan\framework\contabilidad\presentation\report\CellReport;
use com\bydan\framework\contabilidad\presentation\templating\Template;

use com\bydan\framework\contabilidad\presentation\web\control\ControllerBase;

use com\bydan\framework\contabilidad\presentation\web\SessionBase;
use com\bydan\framework\contabilidad\presentation\web\PaginationLink;
use com\bydan\framework\contabilidad\presentation\web\HistoryWeb;

use com\bydan\framework\contabilidad\business\entity\MaintenanceType;
use com\bydan\framework\contabilidad\business\entity\ParameterDivSecciones;
//use com\bydan\framework\contabilidad\business\entity\Classe;
//use com\bydan\framework\contabilidad\presentation\web\SessionBase;

use com\bydan\framework\globales\seguridad\logic\GlobalSeguridad;

use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
use com\bydan\contabilidad\seguridad\perfil_opcion\business\entity\perfil_opcion;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_param_return;
use com\bydan\contabilidad\seguridad\sistema\util\sistema_param_return;
use com\bydan\contabilidad\seguridad\usuario\business\logic\usuario_logic;
use com\bydan\contabilidad\seguridad\sistema\business\logic\sistema_logic_add;
use com\bydan\contabilidad\seguridad\resumen_usuario\business\logic\resumen_usuario_logic_add;

use com\bydan\contabilidad\inventario\devolucion_detalle\business\entity\devolucion_detalle;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/devolucion_detalle/util/devolucion_detalle_carga.php');
use com\bydan\contabilidad\inventario\devolucion_detalle\util\devolucion_detalle_carga;

use com\bydan\contabilidad\inventario\devolucion_detalle\util\devolucion_detalle_util;
use com\bydan\contabilidad\inventario\devolucion_detalle\util\devolucion_detalle_param_return;
use com\bydan\contabilidad\inventario\devolucion_detalle\business\logic\devolucion_detalle_logic;
use com\bydan\contabilidad\inventario\devolucion_detalle\business\logic\devolucion_detalle_logic_add;
use com\bydan\contabilidad\inventario\devolucion_detalle\presentation\session\devolucion_detalle_session;


//FK


use com\bydan\contabilidad\inventario\devolucion\business\entity\devolucion;
use com\bydan\contabilidad\inventario\devolucion\business\logic\devolucion_logic;
use com\bydan\contabilidad\inventario\devolucion\util\devolucion_carga;
use com\bydan\contabilidad\inventario\devolucion\util\devolucion_util;

use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;
use com\bydan\contabilidad\inventario\bodega\business\logic\bodega_logic;
use com\bydan\contabilidad\inventario\bodega\util\bodega_carga;
use com\bydan\contabilidad\inventario\bodega\util\bodega_util;

use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\util\producto_carga;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

use com\bydan\contabilidad\inventario\unidad\business\entity\unidad;
use com\bydan\contabilidad\inventario\unidad\business\logic\unidad_logic;
use com\bydan\contabilidad\inventario\unidad\util\unidad_carga;
use com\bydan\contabilidad\inventario\unidad\util\unidad_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
devolucion_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
devolucion_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
devolucion_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
devolucion_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*devolucion_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/inventario/devolucion_detalle/presentation/control/devolucion_detalle_init_control.php');
use com\bydan\contabilidad\inventario\devolucion_detalle\presentation\control\devolucion_detalle_init_control;

include_once('com/bydan/contabilidad/inventario/devolucion_detalle/presentation/control/devolucion_detalle_base_control.php');
use com\bydan\contabilidad\inventario\devolucion_detalle\presentation\control\devolucion_detalle_base_control;

class devolucion_detalle_control extends devolucion_detalle_base_control {	
	
	public function inicializarParametrosQueryString(mixed $post1=null) {
		$post=null;			
		
		if($_POST) {
			$post=$_POST;	
			
		} else if($_GET) {
			$post=$_GET;
		
		} else if($post1) {
			$post=$post1;
		}
		
		if($_POST || $_GET) {
			
			if($post!=null && count($post)>0) {
				
				$this->inicializarParametrosQueryStringBase($post);
				
				/*TIENE PARAMETROS DE MANTENIMIENTO DE DATOS*/			
				if($this->tieneParametrosMantenimientoDatos()) {
					
				}
			}
		
		} else {
			$this->data = $post;
		}
		
		$this->cargarParametrosReporte();
		
		$this->cargarParamsPostAccion();
		
		$this->cargarParamsPaginar();
		
		$this->cargarParametrosEventosTabla();
	}

	public function ejecutarParametrosQueryString() {
		/*$post=$_POST;*/	
		$action='';
		$return_json=true;
		
		$bitEsPopup=false;
		
		/*
		if(count($_GET) > 1) {
			$post=$_GET;
		}
		*/
		
		
		$action = $this->getDataAction();
			
		if($action!=null) {
			
			$this->action=$action;
			
			$this->bitEsAndroid=false;
				
			$this->bitEsAndroid = $this->getDataEsAndroid();

			/*NO SE GUARDA EN SESSION PERO SIEMPRE SE INICIALIZA DEFECTO
			INICIALIZA VARIABLES PARA QUE RECARGE TODOS COMBOS*/
			$this->setstrRecargarFkInicializar();
				
			if($action=='load' || $action=='index') {
				$this->loadIndex();				
				
			} else if($action=='indexRecargarRelacionado') {
				$this->indexRecargarRelacionado();								
				
			} else if($action=='unload') {
				$this->eliminarVariablesDeSesion();
				
			} else if($action=='recargarInformacion') {
				$this->recargarInformacionAction();								
				
			} else if($action=='buscarPorIdGeneral') {
				$this->buscarPorIdGeneralAction();	
				
			} else if($action=='anteriores') {
				$this->anterioresAction();				
				
			} else if($action=='siguientes') {
				$this->siguientesAction();	
				
			} else if($action=='recargarUltimaInformacion') {
				$this->recargarUltimaInformacionAction();								
				
			} else if($action=='seleccionarLoteFk') {
				$this->seleccionarLoteFkAction();								
				
			} else if($action=='nuevo') {
				$this->nuevoAction();				
				
			} else if($action=='actualizar') {
				$this->actualizarAction();				
				
			} else if($action=='eliminar') {
				$this->eliminarAction();			
				
			} else if($action=='cancelar') {
				$this->cancelarAction();				
				
			} else if($action=='guardarCambios') {
				$this->guardarCambiosAction();				
				
			} else if($action=='duplicar') {
				$this->duplicarAction();				
				
			}  else if($action=='copiar') {
				$this->copiarAction();				
				
			} else if($action=='nuevoPreparar') {//Para Pagina con Formulario											
				$this->nuevoPrepararAction();
				
			} else if($action=='nuevoPrepararPaginaForm') {
				$this->nuevoPrepararPaginaFormAction();							
				
			} else if($action=='nuevoPrepararAbrirPaginaForm') {//Para Pagina Formulario
				$this->nuevoPrepararAbrirPaginaFormAction();														
				
			} else if($action=='nuevoTablaPreparar') {
				$this->nuevoTablaPrepararAction();				
				
			} else if($action=='seleccionarActual') {
				$this->seleccionarActualAction();	
				
			} else if($action=='seleccionarActualPaginaForm') {
				$this->seleccionarActualPaginaFormAction();
									
			} else if($action=='seleccionarActualAbrirPaginaForm') {
				$this->seleccionarActualAbrirPaginaFormAction();
				
			} else if($action=='editarTablaDatos') {
				$this->editarTablaDatosAction();				
				
			}
			else if($action=='eliminarTabla' ) {
				$this->eliminarTablaAction();	
				
			} else if($action=='quitarElementosTabla' ) {
				$this->quitarElementosTablaAction();
				
			} 
			else if($action=='recargarReferencias' ) {
				$this->recargarReferenciasAction();
				
			}
			else if($action=='manejarEventos' ) {
				$this->manejarEventosAction();
			}
			else if($action=='recargarFormularioGeneral' ) {
				$this->recargarFormularioGeneralAction();
			} 
			
			
			else if($action=='generarFpdf') {		
				$this->generarFpdfAction();
				
			} else if($action=='generarHtmlReporte') {
				$this->generarHtmlReporteAction();
				
			} else if($action=='generarHtmlFormReporte') {
				$this->generarHtmlFormReporteAction();
				
			} else if($action=='generarHtmlRelacionesReporte') {
				$this->generarHtmlRelacionesReporteAction();
				
			} else if($action=='quitarRelacionesReporte') {
				$this->quitarRelacionesReporte();
				
			} else if($action=='generarReporteConPhpExcel') {
				$return_json=$this->generarReporteConPhpExcelAction();
				
			} else if($action=='generarReporteConPhpExcelVertical') {
				$return_json=$this->generarReporteConPhpExcelVerticalAction();
				
			} else if($action=='generarReporteConPhpExcelRelaciones') {
				$return_json=$this->generarReporteConPhpExcelRelacionesAction();
				
			}  
			
			
			else if($action=="FK_Idbodega"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdbodegaParaProcesar();
			}
			else if($action=="FK_Iddevolucion"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IddevolucionParaProcesar();
			}
			else if($action=="FK_Idproducto"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdproductoParaProcesar();
			}
			else if($action=="FK_Idunidad"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdunidadParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParadevolucion') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$iddevolucion_detalleActual=$this->getDataId();
				$this->abrirBusquedaParadevolucion();//$iddevolucion_detalleActual
			}
			else if($action=='abrirBusquedaParabodega') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$iddevolucion_detalleActual=$this->getDataId();
				$this->abrirBusquedaParabodega();//$iddevolucion_detalleActual
			}
			else if($action=='abrirBusquedaParaproducto') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$iddevolucion_detalleActual=$this->getDataId();
				$this->abrirBusquedaParaproducto();//$iddevolucion_detalleActual
			}
			else if($action=='abrirBusquedaParaunidad') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$iddevolucion_detalleActual=$this->getDataId();
				$this->abrirBusquedaParaunidad();//$iddevolucion_detalleActual
			}
			
			else {
				/*ACCIONES ADDITIONAL*/
				
				$this->strProceso=$action;
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				
				$return_json=$this->procesarAccionJson($return_json,$action);				
			}
			
			
			$this->setTipoAction($action);
			
			//$this->setActualizarParameterDivSecciones();
			
			
			if($return_json==true) {
				
				if(!$this->bitEsAndroid) {
					
					$devolucion_detalleController = new devolucion_detalle_control();
					
					$devolucion_detalleController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($devolucion_detalleController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$devolucion_detalleController = new devolucion_detalle_control();
						$devolucion_detalleController = $this;
						
						$jsonResponse = json_encode($devolucion_detalleController->devolucion_detalles);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->devolucion_detalleReturnGeneral==null) {
					$this->devolucion_detalleReturnGeneral=new devolucion_detalle_param_return();
				}
				
				echo($this->devolucion_detalleReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$devolucion_detalleController=new devolucion_detalle_control();
		
		$devolucion_detalleController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$devolucion_detalleController->usuarioActual=new usuario();
		
		$devolucion_detalleController->usuarioActual->setId($this->usuarioActual->getId());
		$devolucion_detalleController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$devolucion_detalleController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$devolucion_detalleController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$devolucion_detalleController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$devolucion_detalleController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$devolucion_detalleController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$devolucion_detalleController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $devolucion_detalleController;
	}
	
	public function loadIndex() {
		$strTypeOnLoaddevolucion_detalle= $this->getDataGeneralString('strTypeOnLoaddevolucion_detalle');
		$strTipoPaginaAuxiliardevolucion_detalle= $this->getDataGeneralString('strTipoPaginaAuxiliardevolucion_detalle');
		$strTipoUsuarioAuxiliardevolucion_detalle= $this->getDataGeneralString('strTipoUsuarioAuxiliardevolucion_detalle');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoaddevolucion_detalle,$strTipoPaginaAuxiliardevolucion_detalle,$strTipoUsuarioAuxiliardevolucion_detalle,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoaddevolucion_detalle!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('devolucion_detalle','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->commitNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->rollbackNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	public function indexRecargarRelacionado() {
		$this->cargarParametrosPagina();
									
		$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);
		
		$this->saveGetSessionControllerAndPageAuxiliar(false);
		
		//SE DUPLICA
		//$this->getHtmlTablaDatos(false);
		
		$this->returnHtml(true);
	}
	
	public function recargarInformacionAction() {
		$this->setCargarParameterDivSecciones(false,true,false,false,true,false,false,false,false,false,false,false);				
		$this->recargarInformacion();
	}
	
	public function buscarPorIdGeneralAction() {
		$this->setCargarParameterDivSecciones(false,true,false,false,true,false,false,false,false,false,false,false);				
				
		$idActual=$this->getDataId();
		
		$this->buscarPorIdGeneral($idActual);
	}
	
	public function anterioresAction() {
		$this->setCargarParameterDivSecciones(false,true,false,false,true,false,false,false,false,false,false,false);				
		$this->anteriores();
	}
		
	public function siguientesAction() {	
		$this->setCargarParameterDivSecciones(false,true,false,false,true,false,false,false,false,false,false,false);			
		$this->siguientes();
	}
	
	public function recargarUltimaInformacionAction() {
		$this->setCargarParameterDivSecciones(false,true,false,false,true,false,false,false,false,false,false,false);				
		$this->recargarUltimaInformacion();
	}
	
	public function seleccionarLoteFkAction() {
		$this->setCargarParameterDivSecciones(false,true,false,false,true,false,false,false,false,false,false,false);				
		$this->seleccionarLoteFk();
	}
	
	public function nuevoAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);
		$this->nuevo();
	}
	
	public function actualizarAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);
		$this->actualizar();
	}
	
	public function eliminarAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);
					
		$idActual=$this->getDataId();
					
		$this->eliminar($idActual);	
	}
	
	public function cancelarAction() {
		$this->setCargarParameterDivSecciones(false,false,false,true,true,false,false,true,false,false,false,false);
		$this->cancelar();
	}
	
	public function guardarCambiosAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);
		$this->guardarCambios();
	}
	
	public function duplicarAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);
		$this->duplicar();
	}
	
	public function copiarAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);
		$this->copiar();
	}
	
	public function nuevoPrepararAction() {
		$this->setCargarParameterDivSecciones(false,false,false,true,true,false,false,true,false,false,false,false);
				
		$this->nuevoPreparar();
	}
	
	public function nuevoPrepararPaginaFormAction() {
		$this->cargarParametrosPagina();
									
		//TALVEZ ELIMINAR, TALVEZ MISMA PAGINA FORM
		$this->setCargarParameterDivSecciones(false,false,true,true,true,false,false,true,false,false,false,true);
				
		$this->nuevoPreparar();
	}
	
	public function nuevoPrepararAbrirPaginaFormAction() {
		$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);										
					
		//Se llama desde Load de Javascript a nuevoPrepararPaginaForm
		//$this->nuevoPreparar();
					
		if($this->Session->read('opcionActual')!=null) {
			$this->opcionActual=unserialize($this->Session->read('opcionActual'));
		}
					
		$this->bitEsAbrirVentanaAuxiliarUrl=true;
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(devolucion_detalle_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'inventario','','POPUP',$this->strTipoPaginaAuxiliardevolucion_detalle,$this->strTipoUsuarioAuxiliardevolucion_detalle,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
		$this->strAuxiliarTipo='POPUP';
	}
	
	public function nuevoTablaPrepararAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);
				
		$this->nuevoTablaPreparar();
	}
	
	public function seleccionarActualAction() {
		$this->setCargarParameterDivSecciones(false,false,false,true,true,false,false,true,false,false,false,false);
		$idActual=$this->getDataId();
					
		$this->seleccionarActual($idActual);
	}
	
	public function seleccionarActualPaginaFormAction() {
		$this->cargarParametrosPagina();
									
		$this->setCargarParameterDivSecciones(false,false,true,true,true,false,false,true,false,false,false,true);
					
		$idActual=$this->getDataId();
					
		$this->seleccionarActual($idActual);
	}
	
	public function seleccionarActualAbrirPaginaFormAction() {
		$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);										
					
		$idActual=$this->getDataId();
					
		//Se llama desde Load de Javascript a seleccionarActualPaginaForm
		//$this->seleccionarActual($idActual);
					
		if($this->Session->read('opcionActual')!=null) {
			$this->opcionActual=$this->Session->unserialize('opcionActual');
		}
		
		$this->bitEsAbrirVentanaAuxiliarUrl=true;
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(devolucion_detalle_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'inventario','','POPUP',$this->strTipoPaginaAuxiliardevolucion_detalle,$this->strTipoUsuarioAuxiliardevolucion_detalle,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
		$this->strAuxiliarUrlPagina=$this->strAuxiliarUrlPagina.'&id='.$idActual;
		$this->strAuxiliarTipo='POPUP';
	}
	
	public function editarTablaDatosAction() {
		$this->setCargarParameterDivSecciones(false,true,false,false,true,false,false,false,false,false,false,false);
		$this->editarTablaDatos();
	}
	
	public function eliminarTablaAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);			
					
		$idActual=$this->getDataId();
		
		$this->eliminarTabla($idActual);
	}
	
	public function quitarElementosTablaAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);								
					
		$this->quitarElementosTabla();
	}
	
	public function generarFpdfAction() {
		$return_json=false;
		$this->generarFpdf();
	}
	
	public function generarHtmlReporteAction() {
		//$return_json=false;
					
		$htmlReporteAuxiliar='';
		
		//$htmlReporteIniAuxiliar='';
		//$htmlReporteFinAuxiliar='';				
		
		$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,true,false,false,false);
		
		$this->htmlTablaReporteAuxiliars='';
		
		$this->generarHtmlReporte();
		
		$htmlReporteAuxiliar=$this->htmlTablaReporteAuxiliars;
		
		//$htmlReporteIniAuxiliar=$this->getHtmlReporteIniAuxiliar();
		
		//$htmlReporteFinAuxiliar=$this->getHtmlReporteFinAuxiliar();								
		
		/*HTML FINAL*/
		//$this->htmlTablaReporteAuxiliars=$htmlReporteIniAuxiliar;
		$this->htmlTablaReporteAuxiliars=$htmlReporteAuxiliar;
		//$this->htmlTablaReporteAuxiliars.=$htmlReporteFinAuxiliar;				
		
		//echo($this->htmlTablaReporteAuxiliars);
		
		//ABRIR PAGINA Report con SessionStorage
		$this->devolucion_detalleReturnGeneral=new devolucion_detalle_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->devolucion_detalleReturnGeneral->conGuardarReturnSessionJs=true;
		$this->devolucion_detalleReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->devolucion_detalleReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->devolucion_detalleReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->devolucion_detalleReturnGeneral);
	}
	
	public function generarHtmlFormReporteAction() {
		//$return_json=false;
					
		$htmlReporteAuxiliar='';
		//$htmlReporteIniAuxiliar='';
		//$htmlReporteFinAuxiliar='';								
		
		$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,true,false,false,false);
		
		$this->htmlTablaReporteAuxiliars='';
		
		$this->generarHtmlFormReporte();
				
		$htmlReporteAuxiliar=$this->htmlTablaReporteAuxiliars;
		
		//$htmlReporteIniAuxiliar=$this->getHtmlReporteIniAuxiliar();
		
		//$htmlReporteFinAuxiliar=$this->getHtmlReporteFinAuxiliar();
		
		/*HTML FINAL*/
			//$this->htmlTablaReporteAuxiliars=$htmlReporteIniAuxiliar;
		//$this->htmlTablaReporteAuxiliars=$htmlReporteAuxiliar;
			//$this->htmlTablaReporteAuxiliars.=$htmlReporteFinAuxiliar;
		
		//echo($this->htmlTablaReporteAuxiliars);
		
		//ABRIR PAGINA Report con SessionStorage
		$this->devolucion_detalleReturnGeneral=new devolucion_detalle_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->devolucion_detalleReturnGeneral->conGuardarReturnSessionJs=true;
		$this->devolucion_detalleReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->devolucion_detalleReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->devolucion_detalleReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->devolucion_detalleReturnGeneral);
	}
	
	public function generarHtmlRelacionesReporteAction() {
		//$return_json=false;
					
		$htmlReporteAuxiliar='';
		//$htmlReporteIniAuxiliar='';
		//$htmlReporteFinAuxiliar='';								
		
		$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,true,false,false,false);
		
		$this->htmlTablaReporteAuxiliars='';
		
		$this->generarHtmlRelacionesReporte();
				
		$htmlReporteAuxiliar=$this->htmlTablaReporteAuxiliars;
		
		//$htmlReporteIniAuxiliar=$this->getHtmlReporteIniAuxiliar();
		
		//$htmlReporteFinAuxiliar=$this->getHtmlReporteFinAuxiliar();
		
		/*HTML FINAL*/
			//$this->htmlTablaReporteAuxiliars=$htmlReporteIniAuxiliar;
		//$this->htmlTablaReporteAuxiliars=$htmlReporteAuxiliar;
			//$this->htmlTablaReporteAuxiliars.=$htmlReporteFinAuxiliar;
		
		//echo($this->htmlTablaReporteAuxiliars);
		
		//ABRIR PAGINA Report con SessionStorage
		$this->devolucion_detalleReturnGeneral=new devolucion_detalle_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->devolucion_detalleReturnGeneral->conGuardarReturnSessionJs=true;
		$this->devolucion_detalleReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->devolucion_detalleReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->devolucion_detalleReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->devolucion_detalleReturnGeneral);
	}
	
	
	public function recargarReferenciasAction() {
		try {
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->getNewConnexionToDeep();
			}

			/*CARGA VARIABLES PARA TALVEZ RECARGAR POR PARTES*/
			$this->getDataRecargarPartes();
			/*CARGA VARIABLES PARA TALVEZ RECARGAR POR PARTES_FIN*/
			
			$bitDivsEsCargarFKsAjaxWebPart=false;
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			
			if($this->strRecargarFkTipos!='NINGUNO') {
				$bitDivsEsCargarFKsAjaxWebPart=true;
				
				/*$this->setCargarParameterDivSecciones(false,false,false,false,true,false,false,false,false,false,false,true);*/
				
				$this->cargarCombosFK(false);					
			} else {
				/*$bitDivEsCargarMantenimientosAjaxWebPart=true;				
				$this->setCargarParameterDivSecciones(false,false,false,false,true,false,false,false,false,false,false,false);*/
			}
											
			$sTipoControl='';
			$sTipoEvento='';
			
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
			
			
			$this->devolucion_detalleReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->devolucion_detalleReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->devolucion_detalleReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->devolucion_detalleReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->devolucion_detalleReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->devolucion_detalleReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->commitNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->rollbackNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->devolucion_detalleReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->devolucion_detalleReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->devolucion_detalleReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->devolucion_detalleReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->devolucion_detalleReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->devolucion_detalleReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->commitNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->rollbackNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->devolucion_detalleReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->devolucion_detalleReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->devolucion_detalleReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->devolucion_detalleReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->devolucion_detalleReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->devolucion_detalleReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->commitNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->rollbackNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}
	
			$this->manejarRetornarExcepcion($e);
		}	
	}
	
	
	
	
	public function generarReporteConPhpExcelAction() {
		$tipo_reporte=$this->getDataTipoReporte();				
		$this->generarReporteConPhpExcel($tipo_reporte);				
		return false;			
	}
	
	public function generarReporteConPhpExcelVerticalAction() {
		$tipo_reporte=$this->getDataTipoReporte();				
		$this->generarReporteConPhpExcelVertical($tipo_reporte);				
		return false;						
	}
	
	public function generarReporteConPhpExcelRelacionesAction() {
		$tipo_reporte=$this->getDataTipoReporte();				
		$this->generarReporteConPhpExcelRelaciones($tipo_reporte);				
		return false;
	}

	function __construct () {
		
		parent::__construct();
		
		$this->devolucion_detalleLogic=new devolucion_detalle_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->devolucion_detalle=new devolucion_detalle();
		
		$this->strTypeOnLoaddevolucion_detalle='onload';
		$this->strTipoPaginaAuxiliardevolucion_detalle='none';
		$this->strTipoUsuarioAuxiliardevolucion_detalle='none';	

		$this->intNumeroPaginacion=devolucion_detalle_util::$INT_NUMERO_PAGINACION;
		
		$this->devolucion_detalleModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->devolucion_detalleControllerAdditional=new devolucion_detalle_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(devolucion_detalle_session $devolucion_detalle_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($devolucion_detalle_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoaddevolucion_detalle='',?string $strTipoPaginaAuxiliardevolucion_detalle='',?string $strTipoUsuarioAuxiliardevolucion_detalle='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoaddevolucion_detalle=$strTypeOnLoaddevolucion_detalle;
			$this->strTipoPaginaAuxiliardevolucion_detalle=$strTipoPaginaAuxiliardevolucion_detalle;
			$this->strTipoUsuarioAuxiliardevolucion_detalle=$strTipoUsuarioAuxiliardevolucion_detalle;
	
			if($strTipoUsuarioAuxiliardevolucion_detalle=='webroot' || $strFuncionBusquedaRapida=='webroot') {
				return ;
			}
			
			/*$this->activarSession();*/
									
	
	
			/*ACTUALIZAR VALORES*/
			$this->bitEsPopup=$bitEsPopup;
			$this->bitConBusquedaRapida=$bitConBusquedaRapida;
			
			$this->indexBase($bitEsPopup,$bitConBusquedaRapida);			
			
			
			$this->strTipoView=$strTipoView;			
			$this->strValorBusquedaRapida=$strValorBusquedaRapida;
			$this->strFuncionBusquedaRapida=$strFuncionBusquedaRapida;
			
			$this->devolucion_detalle=new devolucion_detalle();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Devolucion Detalles';
			
			
			$devolucion_detalle_session=unserialize($this->Session->read(devolucion_detalle_util::$STR_SESSION_NAME));
							
			if($devolucion_detalle_session==null) {
				$devolucion_detalle_session=new devolucion_detalle_session();
				
				/*$this->Session->write('devolucion_detalle_session',$devolucion_detalle_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($devolucion_detalle_session->strFuncionJsPadre!=null && $devolucion_detalle_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$devolucion_detalle_session->strFuncionJsPadre;
				
				$devolucion_detalle_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($devolucion_detalle_session);
			
			if($strTypeOnLoaddevolucion_detalle!=null && $strTypeOnLoaddevolucion_detalle=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$devolucion_detalle_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$devolucion_detalle_session->setPaginaPopupVariables(true);
				}
				
				if($devolucion_detalle_session->intNumeroPaginacion==devolucion_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=devolucion_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$devolucion_detalle_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,devolucion_detalle_util::$STR_SESSION_NAME,'inventario');																
			
			} else if($strTypeOnLoaddevolucion_detalle!=null && $strTypeOnLoaddevolucion_detalle=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$devolucion_detalle_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=devolucion_detalle_util::$INT_NUMERO_PAGINACION;*/
				
				if($devolucion_detalle_session->intNumeroPaginacion==devolucion_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=devolucion_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$devolucion_detalle_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliardevolucion_detalle!=null && $strTipoPaginaAuxiliardevolucion_detalle=='none') {
				/*$devolucion_detalle_session->strStyleDivHeader='display:table-row';*/
				
				/*$devolucion_detalle_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliardevolucion_detalle!=null && $strTipoPaginaAuxiliardevolucion_detalle=='iframe') {
					/*
					$devolucion_detalle_session->strStyleDivArbol='display:none';
					$devolucion_detalle_session->strStyleDivHeader='display:none';
					$devolucion_detalle_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$devolucion_detalle_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->devolucion_detalleClase=new devolucion_detalle();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=devolucion_detalle_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(devolucion_detalle_util::getTiposSeleccionar(true) as $reporte) {
				$this->tiposColumnasSelect[]=$reporte;
			}			
			
			/*RELACIONES*/
			$this->tiposRelaciones[]=Reporte::NewReporte(Constantes::$STR_RELACIONES,Constantes::$STR_RELACIONES);
			
			foreach($this->getTiposRelacionesReporte() as $reporte) {
				$this->tiposRelaciones[]=$reporte;
			}
			
			/*FORMULARIO*/
			$this->tiposRelacionesFormulario[]=Reporte::NewReporte(Constantes::$STR_RELACIONES,Constantes::$STR_RELACIONES);
			
			foreach($this->getTiposRelacionesReporte() as $reporte) {
				$this->tiposRelacionesFormulario[]=$reporte;
			}
			/*RELACIONES*/
						
			$this->sistemaLogicAdditional=new sistema_logic_add();
			$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
			
			$this->sistemaLogicAdditional->setConnexion($this->devolucion_detalleLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->devolucion_detalleLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->devolucion_detalleLogic=new devolucion_detalle_logic();*/
			
			
			$this->devolucion_detallesModel=null;
			/*new ListDataModel();*/
			
			/*$this->devolucion_detallesModel.setWrappedData(devolucion_detalleLogic->getdevolucion_detalles());*/
						
			$this->devolucion_detalles= array();
			$this->devolucion_detallesEliminados=array();
			$this->devolucion_detallesSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= devolucion_detalle_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			/*ORDER BY FIN*/
			
			$this->devolucion_detalle= new devolucion_detalle();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idbodega='display:table-row';
			$this->strVisibleFK_Iddevolucion='display:table-row';
			$this->strVisibleFK_Idproducto='display:table-row';
			$this->strVisibleFK_Idunidad='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliardevolucion_detalle!=null && $strTipoUsuarioAuxiliardevolucion_detalle!='none' && $strTipoUsuarioAuxiliardevolucion_detalle!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliardevolucion_detalle);
																
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$usuarioLogic->getEntity($idUsuarioAutomatico);/*WithConnection*/
						
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
											
					}					
												
					$this->usuarioActual=$usuarioLogic->getUsuario();								
														
					if($this->usuarioActual!=null && $this->usuarioActual->getId()>0) {
						$this->Session->write('usuarioActual',serialize($this->usuarioActual));
					}
				}
			} else {
				if($strTipoUsuarioAuxiliardevolucion_detalle!=null && $strTipoUsuarioAuxiliardevolucion_detalle!='none' && $strTipoUsuarioAuxiliardevolucion_detalle!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliardevolucion_detalle);
																
					if($idUsuarioAutomatico>0) {
						$this->usuarioActual=new usuario();
						
						$this->usuarioActual->setId($idUsuarioAutomatico);
						
						$this->Session->write('usuarioActual',serialize($this->usuarioActual));
					}																	
				}
			}
			
			/*SI NO EXISTE SEGURIDAD*/
			//if($this->Session->read('usuarioActual')==null) {
			//	$this->usuarioActual=new usuario();
			//	$this->Session->write('usuarioActual',serialize($this->usuarioActual));
			//}
			
			if($this->Session->read('usuarioActual')!=null) {
				$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));
				
				if($this->usuarioActual!=null) {
					$this->bigIdUsuarioSesion=$this->usuarioActual->getId();	
				}
			
			} else {	
				if($strTipoUsuarioAuxiliardevolucion_detalle==null || $strTipoUsuarioAuxiliardevolucion_detalle=='none' || $strTipoUsuarioAuxiliardevolucion_detalle=='undefined') {
					throw new Exception("Reinicie la sesion");
				}				
			}
			
			/*VALIDAR CARGAR SESION USUARIO*/			
			$this->sistemaReturnGeneral=new sistema_param_return();
			$this->arrNombresClasesRelacionadas=array();
			$bigIdOpcion=$this->bigIdOpcion;
			
			$this->arrNombresClasesRelacionadas=$this->getClasesRelacionadas();
			
			if(!Constantes::$CON_LLAMADA_SIMPLE) {
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					
					/*SI ES RELACIONADO, FORZAR PERMISOS*/
					if($this->bitEsRelacionado) {
						$bigIdOpcion=0;
					}
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliardevolucion_detalle,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, devolucion_detalle_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
					$this->opcionActual=$this->sistemaReturnGeneral->getOpcionActual();
					
					//SI ES RELACIONADO, SE MANTENGA PANTALLA PRINCIPAL RELACIONES COMO opcionActual
					if(!$this->bitEsRelacionado) {						
						$this->Session->write('opcionActual',serialize($this->opcionActual));
					}
					/*$this->sistemaReturnGeneral->settiene_permisos_paginaweb(true);*/
					
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
			}
			/*VALIDAR CARGAR SESION USUARIO*/
			
			
			/*ACTUALIZAR SESION USUARIO*/
			if($this->sistemaReturnGeneral->getUsuarioActual()->getId()!=$this->usuarioActual->getId()) {
				$this->Session->write('usuarioActual',serialize($this->sistemaReturnGeneral->getUsuarioActual()));
			}
			/*ACTUALIZAR SESION USUARIO*/
			
			
			
			/*VALIDACION_LICENCIA*/		
			$sUsuarioPCCliente=array_key_exists(Constantes::$REMOTE_USER,$_SERVER)? $_SERVER[Constantes::$REMOTE_USER]:''; 
			$sNamePCCliente=array_key_exists(Constantes::$REMOTE_USER,$_SERVER)? $_SERVER[Constantes::$REMOTE_HOST]:''; 
			$sIPPCCliente=array_key_exists(Constantes::$REMOTE_USER,$_SERVER)? $_SERVER[Constantes::$REMOTE_ADDR]:'';
			$sMacAddressPCCliente=array_key_exists(Constantes::$REMOTE_USER,$_SERVER)? $_SERVER[Constantes::$REMOTE_ADDR]:''; 
			$dFechaServer=date('Y-m-d');
			$idUsuario=$this->usuarioActual->getId();
			$sNombreModuloActual='';
			
			if($this->moduloActual!=null) {
				$sNombreModuloActual=$this->moduloActual->getnombre();
				/*'INVENTARIO';*/
			}
						
			$sNombreUsuarioActual=$this->usuarioActual->getuser_name();
			/*'ADMIN';*/
			
			/*if($sUsuarioPCCliente=='') {
				$sUsuarioPCCliente=$sNombreUsuarioActual;
			}*/
			
			if(!GlobalSeguridad::validarLicenciaCliente($sUsuarioPCCliente, $sNamePCCliente, $sIPPCCliente, $sMacAddressPCCliente, $dFechaServer, $idUsuario, $sNombreModuloActual, $sNombreUsuarioActual)) {
				throw new Exception(Mensajes::$SERROR_LICENCIA);
			}
			/*VALIDACION_LICENCIA_FIN*/
			
			
			/*VALIDACION_RESUMEN_USUARIO*/
			$validar_resumen_usuario=true;
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$validar_resumen_usuario=$this->resumenUsuarioLogicAdditional->validarResumenUsuarioController($this->usuarioActual,$this->resumenUsuarioActual);	/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
			} else {
				$validar_resumen_usuario=$this->sistemaReturnGeneral->getvalidar_resumen_usuario();
			}
			
			if($validar_resumen_usuario==false) {
				throw new Exception('Usuario ingresado mas de una vez, debe reingresar al sistema');
			}
			/*VALIDACION_RESUMEN_USUARIO_FIN*/
			
						
			
			/*VALIDACION_PAGINA*/
			$tiene_permisos_paginaweb=true;
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, devolucion_detalle_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina devolucion_detalle');
			}
			/*VALIDACION_PAGINA_FIN*/
									
			
			
			$this->inicializarPermisos();
						
			$this->setPermisosUsuario();
			
			$this->inicializarSetPermisosUsuarioClasesRelacionadas();
			
			/*ACCIONES*/
			$this->setAccionesUsuario();
			
			if($this->bitEsPopup || $this->bitEsSubPagina) {
				$this->strPermisoPopup='table-row';
			}
			
			
			$this->inicializarFKsDefault();
			
			
			
			$this->cargarCombosFK(false);
			
			
			//$existe_history=false;
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($devolucion_detalle_session);
			
			$this->getSetBusquedasSesionConfig($devolucion_detalle_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReportedevolucion_detalles($this->strAccionBusqueda,$this->devolucion_detalleLogic->getdevolucion_detalles());*/
				} else if($this->strGenerarReporte=='Html')	{
					$devolucion_detalle_session->strServletGenerarHtmlReporte='devolucion_detalleServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(devolucion_detalle_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(devolucion_detalle_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($devolucion_detalle_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$devolucion_detalle_session=unserialize($this->Session->read(devolucion_detalle_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliardevolucion_detalle!=null && $strTipoUsuarioAuxiliardevolucion_detalle=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($devolucion_detalle_session);
			}
								
			$this->set(devolucion_detalle_util::$STR_SESSION_NAME, $devolucion_detalle_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($devolucion_detalle_session);
			
			/*
			$this->devolucion_detalle->recursive = 0;
			
			$this->devolucion_detalles=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('devolucion_detalles', $this->devolucion_detalles);
			
			$this->set(devolucion_detalle_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->devolucion_detalleActual =$this->devolucion_detalleClase;
			
			/*$this->devolucion_detalleActual =$this->migrarModeldevolucion_detalle($this->devolucion_detalleClase);*/
			
			$this->returnHtml(false);
			
			$this->set(devolucion_detalle_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=devolucion_detalle_util::$STR_NOMBRE_OPCION;
				
			if(devolucion_detalle_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=devolucion_detalle_util::$STR_MODULO_OPCION.devolucion_detalle_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(devolucion_detalle_util::$STR_SESSION_NAME,serialize($devolucion_detalle_session));
			/*GUARDAR SESSION*/
			
			/*$this->strAuxiliarMensajeAlert=Funciones::mostrarMemoriaActual();*/
			
			$this->render('/'.Constantes::$STR_CARPETA_VIEWS.'/'.$strNombreViewIndex.'/'.$this->strTipoView);
		}
		catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function seleccionar() {
		try {
			/*$devolucion_detalleClase= (devolucion_detalle) devolucion_detallesModel.getRowData();*/
			
			$this->devolucion_detalleClase->setId($this->devolucion_detalle->getId());	
			$this->devolucion_detalleClase->setVersionRow($this->devolucion_detalle->getVersionRow());	
			$this->devolucion_detalleClase->setVersionRow($this->devolucion_detalle->getVersionRow());	
			$this->devolucion_detalleClase->setid_devolucion($this->devolucion_detalle->getid_devolucion());	
			$this->devolucion_detalleClase->setid_bodega($this->devolucion_detalle->getid_bodega());	
			$this->devolucion_detalleClase->setid_producto($this->devolucion_detalle->getid_producto());	
			$this->devolucion_detalleClase->setid_unidad($this->devolucion_detalle->getid_unidad());	
			$this->devolucion_detalleClase->setnumero_item($this->devolucion_detalle->getnumero_item());	
			$this->devolucion_detalleClase->setcantidad($this->devolucion_detalle->getcantidad());	
			$this->devolucion_detalleClase->setprecio($this->devolucion_detalle->getprecio());	
			$this->devolucion_detalleClase->setsub_total($this->devolucion_detalle->getsub_total());	
			$this->devolucion_detalleClase->setdescuento_porciento($this->devolucion_detalle->getdescuento_porciento());	
			$this->devolucion_detalleClase->setdescuento_monto($this->devolucion_detalle->getdescuento_monto());	
			$this->devolucion_detalleClase->setiva_porciento($this->devolucion_detalle->getiva_porciento());	
			$this->devolucion_detalleClase->setiva_monto($this->devolucion_detalle->getiva_monto());	
			$this->devolucion_detalleClase->settotal($this->devolucion_detalle->gettotal());	
			$this->devolucion_detalleClase->setobservacion($this->devolucion_detalle->getobservacion());	
			$this->devolucion_detalleClase->setimpuesto2_porciento($this->devolucion_detalle->getimpuesto2_porciento());	
			$this->devolucion_detalleClase->setimpuesto2_monto($this->devolucion_detalle->getimpuesto2_monto());	
		
			/*$this->Session->write('devolucion_detalleVersionRowActual', devolucion_detalle.getVersionRow());*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function seleccionarActual(int $id = null) {
		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			$this->idActual=$id;
			
			$devolucion_detalle_session=unserialize($this->Session->read(devolucion_detalle_util::$STR_SESSION_NAME));
						
			if($devolucion_detalle_session==null) {
				$devolucion_detalle_session=new devolucion_detalle_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('devolucion_detalle', $this->devolucion_detalle->read(null, $id));
	
			
			$this->devolucion_detalle->recursive = 0;
			
			$this->devolucion_detalles=$this->paginate();
			
			$this->set('devolucion_detalles', $this->devolucion_detalles);
	
			if (empty($this->data)) {
				$this->data = $this->devolucion_detalle->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->devolucion_detalleLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->devolucion_detalleClase);
			
			$this->devolucion_detalleActual=$this->devolucion_detalleClase;
			
			/*$this->devolucion_detalleActual =$this->migrarModeldevolucion_detalle($this->devolucion_detalleClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->devolucion_detalleLogic->getdevolucion_detalles(),$this->devolucion_detalleActual);
			
			$this->actualizarControllerConReturnGeneral($this->devolucion_detalleReturnGeneral);
			
			//$this->devolucion_detalleReturnGeneral=$this->devolucion_detalleLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->devolucion_detalleLogic->getdevolucion_detalles(),$this->devolucion_detalleActual,$this->devolucion_detalleParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->commitNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->rollbackNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$devolucion_detalle_session=unserialize($this->Session->read(devolucion_detalle_util::$STR_SESSION_NAME));
						
			if($devolucion_detalle_session==null) {
				$devolucion_detalle_session=new devolucion_detalle_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevodevolucion_detalle', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->devolucion_detalleClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->devolucion_detalleClase);
			
			$this->devolucion_detalleActual =$this->devolucion_detalleClase;
			
			/*$this->devolucion_detalleActual =$this->migrarModeldevolucion_detalle($this->devolucion_detalleClase);*/
			
			$this->setdevolucion_detalleFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->devolucion_detalleLogic->getdevolucion_detalles(),$this->devolucion_detalle);
			
			$this->actualizarControllerConReturnGeneral($this->devolucion_detalleReturnGeneral);
			
			//this->devolucion_detalleReturnGeneral=$this->devolucion_detalleLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->devolucion_detalleLogic->getdevolucion_detalles(),$this->devolucion_detalle,$this->devolucion_detalleParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->iddevolucionDefaultFK!=null && $this->iddevolucionDefaultFK > -1) {
				$this->devolucion_detalleReturnGeneral->getdevolucion_detalle()->setid_devolucion($this->iddevolucionDefaultFK);
			}

			if($this->idbodegaDefaultFK!=null && $this->idbodegaDefaultFK > -1) {
				$this->devolucion_detalleReturnGeneral->getdevolucion_detalle()->setid_bodega($this->idbodegaDefaultFK);
			}

			if($this->idproductoDefaultFK!=null && $this->idproductoDefaultFK > -1) {
				$this->devolucion_detalleReturnGeneral->getdevolucion_detalle()->setid_producto($this->idproductoDefaultFK);
			}

			if($this->idunidadDefaultFK!=null && $this->idunidadDefaultFK > -1) {
				$this->devolucion_detalleReturnGeneral->getdevolucion_detalle()->setid_unidad($this->idunidadDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->devolucion_detalleReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->devolucion_detalleReturnGeneral->getdevolucion_detalle(),$this->devolucion_detalleActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeydevolucion_detalle($this->devolucion_detalleReturnGeneral->getdevolucion_detalle());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormulariodevolucion_detalle($this->devolucion_detalleReturnGeneral->getdevolucion_detalle());*/
			}
			
			if($this->devolucion_detalleReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->devolucion_detalleReturnGeneral->getdevolucion_detalle(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualdevolucion_detalle($this->devolucion_detalle,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->commitNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->rollbackNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->devolucion_detallesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->devolucion_detallesAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->devolucion_detallesAuxiliar=array();
			}
			
			if(count($this->devolucion_detallesAuxiliar)==2) {
				$devolucion_detalleOrigen=$this->devolucion_detallesAuxiliar[0];
				$devolucion_detalleDestino=$this->devolucion_detallesAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($devolucion_detalleOrigen,$devolucion_detalleDestino,true,false,false);
				
				$this->actualizarLista($devolucion_detalleDestino,$this->devolucion_detalles);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->commitNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->rollbackNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->devolucion_detallesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->devolucion_detallesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->devolucion_detallesAuxiliar=array();
			}
			
			if(count($this->devolucion_detallesAuxiliar) > 0) {
				foreach ($this->devolucion_detallesAuxiliar as $devolucion_detalleSeleccionado) {
					$this->devolucion_detalle=new devolucion_detalle();
					
					$this->setCopiarVariablesObjetos($devolucion_detalleSeleccionado,$this->devolucion_detalle,true,true,false);
						
					$this->devolucion_detalles[]=$this->devolucion_detalle;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->commitNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->rollbackNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->devolucion_detallesEliminados as $devolucion_detalleEliminado) {
				$this->devolucion_detalleLogic->devolucion_detalles[]=$devolucion_detalleEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->commitNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->rollbackNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->devolucion_detalle=new devolucion_detalle();
							
				$this->devolucion_detalles[]=$this->devolucion_detalle;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->commitNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->rollbackNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function editarTablaDatos() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);						
			
			if($this->bitConEditar) {
				$this->bitConAltoMaximoTabla=true;
			}
			
			$this->getHtmlTablaDatos(false);
															
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	function guardarCambiosTablas() {
		$indice=0;
		$maxima_fila=0;
		
		if($this->existDataTabla('t'.$this->strSufijo)) {
			$maxima_fila=$this->getDataMaximaFila();
		}
		
		$devolucion_detalleActual=new devolucion_detalle();
		
		if($maxima_fila!=null && $maxima_fila>0) {
			for($i=1;$i<=$maxima_fila;$i++) {
				/*CUANDO NO EXISTE DATOS TABLA*/
				if($this->existDataCampoFormTabla('cel_'.$i.'_0','t'.$this->strSufijo)) {
					if($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_0')==null) {
						break;	
					}
				} else {
					break;
				}
				
				$indice=$i-1;								
				
				$devolucion_detalleActual=$this->devolucion_detalles[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $devolucion_detalleActual->setid_devolucion((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $devolucion_detalleActual->setid_bodega((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $devolucion_detalleActual->setid_producto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $devolucion_detalleActual->setid_unidad((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $devolucion_detalleActual->setnumero_item((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $devolucion_detalleActual->setcantidad((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $devolucion_detalleActual->setprecio((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $devolucion_detalleActual->setsub_total((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $devolucion_detalleActual->setdescuento_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $devolucion_detalleActual->setdescuento_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $devolucion_detalleActual->setiva_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $devolucion_detalleActual->setiva_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $devolucion_detalleActual->settotal((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $devolucion_detalleActual->setobservacion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $devolucion_detalleActual->setimpuesto2_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $devolucion_detalleActual->setimpuesto2_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_18'));  }
			}
		}
	}
	
	
	
	
	
	
	
	public function cancelarAccionesRelaciones() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			$this->strVisibleTablaAccionesRelaciones='none';	
			
			$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_INFO;
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function recargarInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=devolucion_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->commitNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->rollbackNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoaddevolucion_detalle='',string $strTipoPaginaAuxiliardevolucion_detalle='',string $strTipoUsuarioAuxiliardevolucion_detalle='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoaddevolucion_detalle,$strTipoPaginaAuxiliardevolucion_detalle,$strTipoUsuarioAuxiliardevolucion_detalle,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->devolucion_detalles) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->commitNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->rollbackNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=devolucion_detalle_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=devolucion_detalle_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=devolucion_detalle_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
		$finalQueryGlobal=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,!$esBusqueda,$esBusqueda,$arrColumnasGlobales);
		
		
		/*QUERY GLOBAL GLOBAL + SELECCIONAR_LOTE + ORDER_QUERY
		SELECCIONAR_LOTE*/
		if($this->strFinalQuerySeleccionarLote!='') {			
			$finalQueryPaginacion=$finalQueryPaginacion.$this->strFinalQuerySeleccionarLote;
		}
		
		/*GLOBAL*/
		if($finalQueryGlobal!='') {
			$finalQueryPaginacion=$finalQueryGlobal.$finalQueryPaginacion;
		}
				
		/*ORDER_QUERY*/
		if($this->orderByQuery!='') {
			$finalQueryPaginacion=$finalQueryPaginacion.$this->orderByQuery;
		}	
		
		/*QUERY GLOBAL GLOBAL + SELECCIONAR_LOTE + ORDER_QUERY*/
		
		try {				
			
			$devolucion_detalle_session=unserialize($this->Session->read(devolucion_detalle_util::$STR_SESSION_NAME));
						
			if($devolucion_detalle_session==null) {
				$devolucion_detalle_session=new devolucion_detalle_session();
			}
			
			/*$this->cargarParametrosReporte();
			
			$this->cargarParamsPostAccion();*/
			
			$this->inicializarVariables('NORMAL');
			
			if($this->strTipoPaginacion!='TODOS' && $this->strTipoPaginacion!='') { //Combo Paginacion 5-10-15
				$this->intNumeroPaginacion=(int)$this->strTipoPaginacion;				
			} else {
				if($this->strTipoPaginacion=='TODOS') {
					$this->pagination->setBlnConNumeroMaximo(true);
				} else {
					/*$this->intNumeroPaginacion=devolucion_detalle_util::$INT_NUMERO_PAGINACION;*/
					
					if($devolucion_detalle_session->intNumeroPaginacion==devolucion_detalle_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=devolucion_detalle_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$devolucion_detalle_session->intNumeroPaginacion;
					}
				}
			}
			
			$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
			$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
			/*$this->pagination->setBlnConNumeroMaximo(true);*/
						
			/*
			//DESHABILITADO AQUI, LA PAGINACION EN DATAACCESS
			if($this->intNumeroPaginacion!=null && $this->intNumeroPaginacionPagina!=null){ 						
				$finalQueryPaginacion=' LIMIT '.$this->intNumeroPaginacion.','.$this->intNumeroPaginacionPagina;
			}
			*/
			
			$this->devolucion_detallesEliminados=array();
			
			/*$this->devolucion_detalleLogic->setConnexion($connexion);*/
			
			$this->devolucion_detalleLogic->setIsConDeep(true);
			
			$this->devolucion_detalleLogic->getdevolucion_detalleDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('devolucion');$classes[]=$class;
			$class=new Classe('bodega');$classes[]=$class;
			$class=new Classe('producto');$classes[]=$class;
			$class=new Classe('unidad');$classes[]=$class;
			
			$this->devolucion_detalleLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->devolucion_detalleLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->devolucion_detalleLogic->getdevolucion_detalles()==null|| count($this->devolucion_detalleLogic->getdevolucion_detalles())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->devolucion_detalles=$this->devolucion_detalleLogic->getdevolucion_detalles();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->devolucion_detalleLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->devolucion_detallesReporte=$this->devolucion_detalleLogic->getdevolucion_detalles();
									
						/*$this->generarReportes('Todos',$this->devolucion_detalleLogic->getdevolucion_detalles());*/
					
						$this->devolucion_detalleLogic->setdevolucion_detalles($this->devolucion_detalles);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->devolucion_detalleLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->devolucion_detalleLogic->getdevolucion_detalles()==null|| count($this->devolucion_detalleLogic->getdevolucion_detalles())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->devolucion_detalles=$this->devolucion_detalleLogic->getdevolucion_detalles();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->devolucion_detalleLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->devolucion_detallesReporte=$this->devolucion_detalleLogic->getdevolucion_detalles();
									
						/*$this->generarReportes('Todos',$this->devolucion_detalleLogic->getdevolucion_detalles());*/
					
						$this->devolucion_detalleLogic->setdevolucion_detalles($this->devolucion_detalles);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->iddevolucion_detalle=0;*/
				
				if($devolucion_detalle_session->bitBusquedaDesdeFKSesionFK!=null && $devolucion_detalle_session->bitBusquedaDesdeFKSesionFK==true) {
					if($devolucion_detalle_session->bigIdActualFK!=null && $devolucion_detalle_session->bigIdActualFK!=0)	{
						$this->iddevolucion_detalle=$devolucion_detalle_session->bigIdActualFK;	
					}
					
					$devolucion_detalle_session->bitBusquedaDesdeFKSesionFK=false;
					
					$devolucion_detalle_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					iddevolucion_detalle=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					iddevolucion_detalle=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->devolucion_detalleLogic->getEntity($this->iddevolucion_detalle);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*devolucion_detalleLogicAdditional::getDetalleIndicePorId($iddevolucion_detalle);*/

				
				if($this->devolucion_detalleLogic->getdevolucion_detalle()!=null) {
					$this->devolucion_detalleLogic->setdevolucion_detalles(array());
					$this->devolucion_detalleLogic->devolucion_detalles[]=$this->devolucion_detalleLogic->getdevolucion_detalle();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idbodega')
			{

				if($devolucion_detalle_session->bigidbodegaActual!=null && $devolucion_detalle_session->bigidbodegaActual!=0)
				{
					$this->id_bodegaFK_Idbodega=$devolucion_detalle_session->bigidbodegaActual;
					$devolucion_detalle_session->bigidbodegaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->devolucion_detalleLogic->getsFK_Idbodega($finalQueryPaginacion,$this->pagination,$this->id_bodegaFK_Idbodega);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//devolucion_detalleLogicAdditional::getDetalleIndiceFK_Idbodega($this->id_bodegaFK_Idbodega);


					if($this->devolucion_detalleLogic->getdevolucion_detalles()==null || count($this->devolucion_detalleLogic->getdevolucion_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$devolucion_detalles=$this->devolucion_detalleLogic->getdevolucion_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->devolucion_detalleLogic->getsFK_Idbodega('',$this->pagination,$this->id_bodegaFK_Idbodega);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->devolucion_detallesReporte=$this->devolucion_detalleLogic->getdevolucion_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportedevolucion_detalles("FK_Idbodega",$this->devolucion_detalleLogic->getdevolucion_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->devolucion_detalleLogic->setdevolucion_detalles($devolucion_detalles);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Iddevolucion')
			{

				if($devolucion_detalle_session->bigiddevolucionActual!=null && $devolucion_detalle_session->bigiddevolucionActual!=0)
				{
					$this->id_devolucionFK_Iddevolucion=$devolucion_detalle_session->bigiddevolucionActual;
					$devolucion_detalle_session->bigiddevolucionActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->devolucion_detalleLogic->getsFK_Iddevolucion($finalQueryPaginacion,$this->pagination,$this->id_devolucionFK_Iddevolucion);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//devolucion_detalleLogicAdditional::getDetalleIndiceFK_Iddevolucion($this->id_devolucionFK_Iddevolucion);


					if($this->devolucion_detalleLogic->getdevolucion_detalles()==null || count($this->devolucion_detalleLogic->getdevolucion_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$devolucion_detalles=$this->devolucion_detalleLogic->getdevolucion_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->devolucion_detalleLogic->getsFK_Iddevolucion('',$this->pagination,$this->id_devolucionFK_Iddevolucion);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->devolucion_detallesReporte=$this->devolucion_detalleLogic->getdevolucion_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportedevolucion_detalles("FK_Iddevolucion",$this->devolucion_detalleLogic->getdevolucion_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->devolucion_detalleLogic->setdevolucion_detalles($devolucion_detalles);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idproducto')
			{

				if($devolucion_detalle_session->bigidproductoActual!=null && $devolucion_detalle_session->bigidproductoActual!=0)
				{
					$this->id_productoFK_Idproducto=$devolucion_detalle_session->bigidproductoActual;
					$devolucion_detalle_session->bigidproductoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->devolucion_detalleLogic->getsFK_Idproducto($finalQueryPaginacion,$this->pagination,$this->id_productoFK_Idproducto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//devolucion_detalleLogicAdditional::getDetalleIndiceFK_Idproducto($this->id_productoFK_Idproducto);


					if($this->devolucion_detalleLogic->getdevolucion_detalles()==null || count($this->devolucion_detalleLogic->getdevolucion_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$devolucion_detalles=$this->devolucion_detalleLogic->getdevolucion_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->devolucion_detalleLogic->getsFK_Idproducto('',$this->pagination,$this->id_productoFK_Idproducto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->devolucion_detallesReporte=$this->devolucion_detalleLogic->getdevolucion_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportedevolucion_detalles("FK_Idproducto",$this->devolucion_detalleLogic->getdevolucion_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->devolucion_detalleLogic->setdevolucion_detalles($devolucion_detalles);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idunidad')
			{

				if($devolucion_detalle_session->bigidunidadActual!=null && $devolucion_detalle_session->bigidunidadActual!=0)
				{
					$this->id_unidadFK_Idunidad=$devolucion_detalle_session->bigidunidadActual;
					$devolucion_detalle_session->bigidunidadActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->devolucion_detalleLogic->getsFK_Idunidad($finalQueryPaginacion,$this->pagination,$this->id_unidadFK_Idunidad);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//devolucion_detalleLogicAdditional::getDetalleIndiceFK_Idunidad($this->id_unidadFK_Idunidad);


					if($this->devolucion_detalleLogic->getdevolucion_detalles()==null || count($this->devolucion_detalleLogic->getdevolucion_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$devolucion_detalles=$this->devolucion_detalleLogic->getdevolucion_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->devolucion_detalleLogic->getsFK_Idunidad('',$this->pagination,$this->id_unidadFK_Idunidad);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->devolucion_detallesReporte=$this->devolucion_detalleLogic->getdevolucion_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportedevolucion_detalles("FK_Idunidad",$this->devolucion_detalleLogic->getdevolucion_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->devolucion_detalleLogic->setdevolucion_detalles($devolucion_detalles);
					}
				//}

			} 
		
		$devolucion_detalle_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$devolucion_detalle_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->devolucion_detalleLogic->loadForeignsKeysDescription();*/
		
		$this->devolucion_detalles=$this->devolucion_detalleLogic->getdevolucion_detalles();
		
		if($this->devolucion_detallesEliminados==null) {
			$this->devolucion_detallesEliminados=array();
		}
		
		$this->Session->write(devolucion_detalle_util::$STR_SESSION_NAME.'Lista',serialize($this->devolucion_detalles));
		$this->Session->write(devolucion_detalle_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->devolucion_detallesEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(devolucion_detalle_util::$STR_SESSION_NAME,serialize($devolucion_detalle_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->iddevolucion_detalle=$idGeneral;
			
			$this->intNumeroPaginacion=devolucion_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->commitNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->rollbackNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->getNewConnexionToDeep();
			}
			
			
			if($this->intNumeroPaginacionPagina - $this->intNumeroPaginacion < $this->intNumeroPaginacion) {
				$this->intNumeroPaginacionPagina=0;		
			} else {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina - $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->commitNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->rollbackNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->getNewConnexionToDeep();
			}

			if(count($this->devolucion_detalles) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->commitNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->rollbackNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsFK_IdbodegaParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=devolucion_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_bodegaFK_Idbodega=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idbodega','cmbid_bodega');

			$this->strAccionBusqueda='FK_Idbodega';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->commitNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->rollbackNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IddevolucionParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=devolucion_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_devolucionFK_Iddevolucion=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Iddevolucion','cmbid_devolucion');

			$this->strAccionBusqueda='FK_Iddevolucion';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->commitNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->rollbackNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdproductoParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=devolucion_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_productoFK_Idproducto=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idproducto','cmbid_producto');

			$this->strAccionBusqueda='FK_Idproducto';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->commitNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->rollbackNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdunidadParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=devolucion_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_unidadFK_Idunidad=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idunidad','cmbid_unidad');

			$this->strAccionBusqueda='FK_Idunidad';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->commitNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->rollbackNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idbodega($strFinalQuery,$id_bodega)
	{
		try
		{

			$this->devolucion_detalleLogic->getsFK_Idbodega($strFinalQuery,new Pagination(),$id_bodega);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Iddevolucion($strFinalQuery,$id_devolucion)
	{
		try
		{

			$this->devolucion_detalleLogic->getsFK_Iddevolucion($strFinalQuery,new Pagination(),$id_devolucion);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idproducto($strFinalQuery,$id_producto)
	{
		try
		{

			$this->devolucion_detalleLogic->getsFK_Idproducto($strFinalQuery,new Pagination(),$id_producto);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idunidad($strFinalQuery,$id_unidad)
	{
		try
		{

			$this->devolucion_detalleLogic->getsFK_Idunidad($strFinalQuery,new Pagination(),$id_unidad);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	
		
	
	function cargarCombosFK(bool $cargarControllerDesdeSession=true) {		
		
		try {
			
			if($cargarControllerDesdeSession) {
				/*SOLO SI ES NECESARIO*/
				$this->saveGetSessionControllerAndPageAuxiliar(false);
			}
			
			
			$devolucion_detalleForeignKey=new devolucion_detalle_param_return(); //devolucion_detalleForeignKey();
			
			$devolucion_detalle_session=unserialize($this->Session->read(devolucion_detalle_util::$STR_SESSION_NAME));
						
			if($devolucion_detalle_session==null) {
				$devolucion_detalle_session=new devolucion_detalle_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$devolucion_detalleForeignKey=$this->devolucion_detalleLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$devolucion_detalle_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_devolucion',$this->strRecargarFkTipos,',')) {
				$this->devolucionsFK=$devolucion_detalleForeignKey->devolucionsFK;
				$this->iddevolucionDefaultFK=$devolucion_detalleForeignKey->iddevolucionDefaultFK;
			}

			if($devolucion_detalle_session->bitBusquedaDesdeFKSesiondevolucion) {
				$this->setVisibleBusquedasParadevolucion(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_bodega',$this->strRecargarFkTipos,',')) {
				$this->bodegasFK=$devolucion_detalleForeignKey->bodegasFK;
				$this->idbodegaDefaultFK=$devolucion_detalleForeignKey->idbodegaDefaultFK;
			}

			if($devolucion_detalle_session->bitBusquedaDesdeFKSesionbodega) {
				$this->setVisibleBusquedasParabodega(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_producto',$this->strRecargarFkTipos,',')) {
				$this->productosFK=$devolucion_detalleForeignKey->productosFK;
				$this->idproductoDefaultFK=$devolucion_detalleForeignKey->idproductoDefaultFK;
			}

			if($devolucion_detalle_session->bitBusquedaDesdeFKSesionproducto) {
				$this->setVisibleBusquedasParaproducto(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_unidad',$this->strRecargarFkTipos,',')) {
				$this->unidadsFK=$devolucion_detalleForeignKey->unidadsFK;
				$this->idunidadDefaultFK=$devolucion_detalleForeignKey->idunidadDefaultFK;
			}

			if($devolucion_detalle_session->bitBusquedaDesdeFKSesionunidad) {
				$this->setVisibleBusquedasParaunidad(true);
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			
			
			/*//RECARGAR COMBOS SIN ELEMENTOS
			if($this->strRecargarFkTiposNinguno!=null && $this->strRecargarFkTiposNinguno!='NINGUNO' && $this->strRecargarFkTiposNinguno!='') {*/
			/*}*/
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	function cargarCombosFKFromReturnGeneral($devolucion_detalleReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$devolucion_detalleReturnGeneral->strRecargarFkTipos;
			
			


			if($devolucion_detalleReturnGeneral->con_devolucionsFK==true) {
				$this->devolucionsFK=$devolucion_detalleReturnGeneral->devolucionsFK;
				$this->iddevolucionDefaultFK=$devolucion_detalleReturnGeneral->iddevolucionDefaultFK;
			}


			if($devolucion_detalleReturnGeneral->con_bodegasFK==true) {
				$this->bodegasFK=$devolucion_detalleReturnGeneral->bodegasFK;
				$this->idbodegaDefaultFK=$devolucion_detalleReturnGeneral->idbodegaDefaultFK;
			}


			if($devolucion_detalleReturnGeneral->con_productosFK==true) {
				$this->productosFK=$devolucion_detalleReturnGeneral->productosFK;
				$this->idproductoDefaultFK=$devolucion_detalleReturnGeneral->idproductoDefaultFK;
			}


			if($devolucion_detalleReturnGeneral->con_unidadsFK==true) {
				$this->unidadsFK=$devolucion_detalleReturnGeneral->unidadsFK;
				$this->idunidadDefaultFK=$devolucion_detalleReturnGeneral->idunidadDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(devolucion_detalle_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$devolucion_detalle_session=unserialize($this->Session->read(devolucion_detalle_util::$STR_SESSION_NAME));
		
		if($devolucion_detalle_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($devolucion_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==devolucion_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='devolucion';
			}
			else if($devolucion_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==bodega_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='bodega';
			}
			else if($devolucion_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==producto_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='producto';
			}
			else if($devolucion_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==unidad_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='unidad';
			}
			
			$devolucion_detalle_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->getNewConnexionToDeep();
			}						
			
			$this->devolucion_detallesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->devolucion_detallesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->devolucion_detallesAuxiliar=array();
			}
			
			if(count($this->devolucion_detallesAuxiliar) > 0) {
				
				foreach ($this->devolucion_detallesAuxiliar as $devolucion_detalleSeleccionado) {
					$this->eliminarTablaBase($devolucion_detalleSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->commitNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->rollbackNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getTiposRelacionesReporte() : array {
		$arrTiposRelacionesReportes=array();
				
		$tipoRelacionReporte=new Reporte();
		
		/*$tipoRelacionReporte->setsCodigo(PerfilConstantesFunciones::$LABEL_IDSISTEMA);
		$tipoRelacionReporte->setsDescripcion(PerfilConstantesFunciones::$LABEL_IDSISTEMA);

		$arrTiposRelacionesReportes[]=$tipoRelacionReporte;*/
		
		if(!$this->bitEsRelaciones) {
		}
		
		if($tipoRelacionReporte!=null);
		
		return $arrTiposRelacionesReportes;
	}	
	
	public function getClasesRelacionadas() : array {
		$arrNombresClasesRelacionadasLocal=array();
		
		
		
		return $arrNombresClasesRelacionadasLocal;
	}
	
	
	public function setstrRecargarFkInicializar() {
		$this->setstrRecargarFk('TODOS','NINGUNO',0,'');		
	}
	
	
	
	public function getdevolucionsFKListSelectItem() 
	{
		$devolucionsList=array();

		$item=null;

		foreach($this->devolucionsFK as $devolucion)
		{
			$item=new SelectItem();
			$item->setLabel($devolucion>getId());
			$item->setValue($devolucion->getId());
			$devolucionsList[]=$item;
		}

		return $devolucionsList;
	}


	public function getbodegasFKListSelectItem() 
	{
		$bodegasList=array();

		$item=null;

		foreach($this->bodegasFK as $bodega)
		{
			$item=new SelectItem();
			$item->setLabel($bodega->getcodigo());
			$item->setValue($bodega->getId());
			$bodegasList[]=$item;
		}

		return $bodegasList;
	}


	public function getproductosFKListSelectItem() 
	{
		$productosList=array();

		$item=null;

		foreach($this->productosFK as $producto)
		{
			$item=new SelectItem();
			$item->setLabel($producto->getcodigo());
			$item->setValue($producto->getId());
			$productosList[]=$item;
		}

		return $productosList;
	}


	public function getunidadsFKListSelectItem() 
	{
		$unidadsList=array();

		$item=null;

		foreach($this->unidadsFK as $unidad)
		{
			$item=new SelectItem();
			$item->setLabel($unidad->getnombre());
			$item->setValue($unidad->getId());
			$unidadsList[]=$item;
		}

		return $unidadsList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=devolucion_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			*/
			
			/*$this->strNombreCampoBusqueda*/
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				
			} else {
				
			}
			
			$IdsFksSeleccionados=$this->getIdsFksSeleccionados($maxima_fila);
			$strQueryIn='';
			$esPrimero=true;
			
			foreach($IdsFksSeleccionados as $idFkSeleccionado) {
				
				if(!$esPrimero) {
					$strQueryIn.=',';
				} else {
					$esPrimero=false;	
				}
				
				$strQueryIn.=$idFkSeleccionado;
			}
			
			$this->strFinalQuerySeleccionarLote=' and '.$this->strNombreCampoBusqueda.' in('.$strQueryIn.')';
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			$this->validarCargarSeleccionarLoteFk($IdsFksSeleccionados);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->commitNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->rollbackNewConnexionToDeep();
				$this->devolucion_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$devolucion_detallesNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->devolucion_detalles as $devolucion_detalleLocal) {
				if($devolucion_detalleLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->devolucion_detalle=new devolucion_detalle();
				
				$this->devolucion_detalle->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->devolucion_detalles[]=$this->devolucion_detalle;*/
				
				$devolucion_detallesNuevos[]=$this->devolucion_detalle;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('devolucion');$classes[]=$class;
				$class=new Classe('bodega');$classes[]=$class;
				$class=new Classe('producto');$classes[]=$class;
				$class=new Classe('unidad');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_detalleLogic->setdevolucion_detalles($devolucion_detallesNuevos);
					
				$this->devolucion_detalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($devolucion_detallesNuevos as $devolucion_detalleNuevo) {
					$this->devolucion_detalles[]=$devolucion_detalleNuevo;
				}
				
				/*$this->devolucion_detalles[]=$devolucion_detallesNuevos;*/
				
				$this->devolucion_detalleLogic->setdevolucion_detalles($this->devolucion_detalles);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($devolucion_detallesNuevos!=null);
	}
					
	
	public function cargarCombosdevolucionsFK($connexion=null,$strRecargarFkQuery=''){
		$devolucionLogic= new devolucion_logic();
		$pagination= new Pagination();
		$this->devolucionsFK=array();

		$devolucionLogic->setConnexion($connexion);
		$devolucionLogic->getdevolucionDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$devolucion_detalle_session=unserialize($this->Session->read(devolucion_detalle_util::$STR_SESSION_NAME));

		if($devolucion_detalle_session==null) {
			$devolucion_detalle_session=new devolucion_detalle_session();
		}
		
		if($devolucion_detalle_session->bitBusquedaDesdeFKSesiondevolucion!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=devolucion_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobaldevolucion=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaldevolucion=Funciones::GetFinalQueryAppend($finalQueryGlobaldevolucion, '');
				$finalQueryGlobaldevolucion.=devolucion_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaldevolucion.$strRecargarFkQuery;		

				$devolucionLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosdevolucionsFK($devolucionLogic->getdevolucions());

		} else {
			$this->setVisibleBusquedasParadevolucion(true);


			if($devolucion_detalle_session->bigiddevolucionActual!=null && $devolucion_detalle_session->bigiddevolucionActual > 0) {
				$devolucionLogic->getEntity($devolucion_detalle_session->bigiddevolucionActual);//WithConnection

				$this->devolucionsFK[$devolucionLogic->getdevolucion()->getId()]=devolucion_detalle_util::getdevolucionDescripcion($devolucionLogic->getdevolucion());
				$this->iddevolucionDefaultFK=$devolucionLogic->getdevolucion()->getId();
			}
		}
	}

	public function cargarCombosbodegasFK($connexion=null,$strRecargarFkQuery=''){
		$bodegaLogic= new bodega_logic();
		$pagination= new Pagination();
		$this->bodegasFK=array();

		$bodegaLogic->setConnexion($connexion);
		$bodegaLogic->getbodegaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$devolucion_detalle_session=unserialize($this->Session->read(devolucion_detalle_util::$STR_SESSION_NAME));

		if($devolucion_detalle_session==null) {
			$devolucion_detalle_session=new devolucion_detalle_session();
		}
		
		if($devolucion_detalle_session->bitBusquedaDesdeFKSesionbodega!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=bodega_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalbodega=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalbodega=Funciones::GetFinalQueryAppend($finalQueryGlobalbodega, '');
				$finalQueryGlobalbodega.=bodega_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalbodega.$strRecargarFkQuery;		

				$bodegaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosbodegasFK($bodegaLogic->getbodegas());

		} else {
			$this->setVisibleBusquedasParabodega(true);


			if($devolucion_detalle_session->bigidbodegaActual!=null && $devolucion_detalle_session->bigidbodegaActual > 0) {
				$bodegaLogic->getEntity($devolucion_detalle_session->bigidbodegaActual);//WithConnection

				$this->bodegasFK[$bodegaLogic->getbodega()->getId()]=devolucion_detalle_util::getbodegaDescripcion($bodegaLogic->getbodega());
				$this->idbodegaDefaultFK=$bodegaLogic->getbodega()->getId();
			}
		}
	}

	public function cargarCombosproductosFK($connexion=null,$strRecargarFkQuery=''){
		$productoLogic= new producto_logic();
		$pagination= new Pagination();
		$this->productosFK=array();

		$productoLogic->setConnexion($connexion);
		$productoLogic->getproductoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$devolucion_detalle_session=unserialize($this->Session->read(devolucion_detalle_util::$STR_SESSION_NAME));

		if($devolucion_detalle_session==null) {
			$devolucion_detalle_session=new devolucion_detalle_session();
		}
		
		if($devolucion_detalle_session->bitBusquedaDesdeFKSesionproducto!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=producto_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalproducto=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalproducto=Funciones::GetFinalQueryAppend($finalQueryGlobalproducto, '');
				$finalQueryGlobalproducto.=producto_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalproducto.$strRecargarFkQuery;		

				$productoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosproductosFK($productoLogic->getproductos());

		} else {
			$this->setVisibleBusquedasParaproducto(true);


			if($devolucion_detalle_session->bigidproductoActual!=null && $devolucion_detalle_session->bigidproductoActual > 0) {
				$productoLogic->getEntity($devolucion_detalle_session->bigidproductoActual);//WithConnection

				$this->productosFK[$productoLogic->getproducto()->getId()]=devolucion_detalle_util::getproductoDescripcion($productoLogic->getproducto());
				$this->idproductoDefaultFK=$productoLogic->getproducto()->getId();
			}
		}
	}

	public function cargarCombosunidadsFK($connexion=null,$strRecargarFkQuery=''){
		$unidadLogic= new unidad_logic();
		$pagination= new Pagination();
		$this->unidadsFK=array();

		$unidadLogic->setConnexion($connexion);
		$unidadLogic->getunidadDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$devolucion_detalle_session=unserialize($this->Session->read(devolucion_detalle_util::$STR_SESSION_NAME));

		if($devolucion_detalle_session==null) {
			$devolucion_detalle_session=new devolucion_detalle_session();
		}
		
		if($devolucion_detalle_session->bitBusquedaDesdeFKSesionunidad!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=unidad_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalunidad=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalunidad=Funciones::GetFinalQueryAppend($finalQueryGlobalunidad, '');
				$finalQueryGlobalunidad.=unidad_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalunidad.$strRecargarFkQuery;		

				$unidadLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosunidadsFK($unidadLogic->getunidads());

		} else {
			$this->setVisibleBusquedasParaunidad(true);


			if($devolucion_detalle_session->bigidunidadActual!=null && $devolucion_detalle_session->bigidunidadActual > 0) {
				$unidadLogic->getEntity($devolucion_detalle_session->bigidunidadActual);//WithConnection

				$this->unidadsFK[$unidadLogic->getunidad()->getId()]=devolucion_detalle_util::getunidadDescripcion($unidadLogic->getunidad());
				$this->idunidadDefaultFK=$unidadLogic->getunidad()->getId();
			}
		}
	}

	
	
	public function prepararCombosdevolucionsFK($devolucions){

		foreach ($devolucions as $devolucionLocal ) {
			if($this->iddevolucionDefaultFK==0) {
				$this->iddevolucionDefaultFK=$devolucionLocal->getId();
			}

			$this->devolucionsFK[$devolucionLocal->getId()]=devolucion_detalle_util::getdevolucionDescripcion($devolucionLocal);
		}
	}

	public function prepararCombosbodegasFK($bodegas){

		foreach ($bodegas as $bodegaLocal ) {
			if($this->idbodegaDefaultFK==0) {
				$this->idbodegaDefaultFK=$bodegaLocal->getId();
			}

			$this->bodegasFK[$bodegaLocal->getId()]=devolucion_detalle_util::getbodegaDescripcion($bodegaLocal);
		}
	}

	public function prepararCombosproductosFK($productos){

		foreach ($productos as $productoLocal ) {
			if($this->idproductoDefaultFK==0) {
				$this->idproductoDefaultFK=$productoLocal->getId();
			}

			$this->productosFK[$productoLocal->getId()]=devolucion_detalle_util::getproductoDescripcion($productoLocal);
		}
	}

	public function prepararCombosunidadsFK($unidads){

		foreach ($unidads as $unidadLocal ) {
			if($this->idunidadDefaultFK==0) {
				$this->idunidadDefaultFK=$unidadLocal->getId();
			}

			$this->unidadsFK[$unidadLocal->getId()]=devolucion_detalle_util::getunidadDescripcion($unidadLocal);
		}
	}

	
	
	public function cargarDescripciondevolucionFK($iddevolucion,$connexion=null){
		$devolucionLogic= new devolucion_logic();
		$devolucionLogic->setConnexion($connexion);
		$devolucionLogic->getdevolucionDataAccess()->isForFKData=true;
		$strDescripciondevolucion='';

		if($iddevolucion!=null && $iddevolucion!='' && $iddevolucion!='null') {
			if($connexion!=null) {
				$devolucionLogic->getEntity($iddevolucion);//WithConnection
			} else {
				$devolucionLogic->getEntityWithConnection($iddevolucion);//
			}

			$strDescripciondevolucion=devolucion_detalle_util::getdevolucionDescripcion($devolucionLogic->getdevolucion());

		} else {
			$strDescripciondevolucion='null';
		}

		return $strDescripciondevolucion;
	}

	public function cargarDescripcionbodegaFK($idbodega,$connexion=null){
		$bodegaLogic= new bodega_logic();
		$bodegaLogic->setConnexion($connexion);
		$bodegaLogic->getbodegaDataAccess()->isForFKData=true;
		$strDescripcionbodega='';

		if($idbodega!=null && $idbodega!='' && $idbodega!='null') {
			if($connexion!=null) {
				$bodegaLogic->getEntity($idbodega);//WithConnection
			} else {
				$bodegaLogic->getEntityWithConnection($idbodega);//
			}

			$strDescripcionbodega=devolucion_detalle_util::getbodegaDescripcion($bodegaLogic->getbodega());

		} else {
			$strDescripcionbodega='null';
		}

		return $strDescripcionbodega;
	}

	public function cargarDescripcionproductoFK($idproducto,$connexion=null){
		$productoLogic= new producto_logic();
		$productoLogic->setConnexion($connexion);
		$productoLogic->getproductoDataAccess()->isForFKData=true;
		$strDescripcionproducto='';

		if($idproducto!=null && $idproducto!='' && $idproducto!='null') {
			if($connexion!=null) {
				$productoLogic->getEntity($idproducto);//WithConnection
			} else {
				$productoLogic->getEntityWithConnection($idproducto);//
			}

			$strDescripcionproducto=devolucion_detalle_util::getproductoDescripcion($productoLogic->getproducto());

		} else {
			$strDescripcionproducto='null';
		}

		return $strDescripcionproducto;
	}

	public function cargarDescripcionunidadFK($idunidad,$connexion=null){
		$unidadLogic= new unidad_logic();
		$unidadLogic->setConnexion($connexion);
		$unidadLogic->getunidadDataAccess()->isForFKData=true;
		$strDescripcionunidad='';

		if($idunidad!=null && $idunidad!='' && $idunidad!='null') {
			if($connexion!=null) {
				$unidadLogic->getEntity($idunidad);//WithConnection
			} else {
				$unidadLogic->getEntityWithConnection($idunidad);//
			}

			$strDescripcionunidad=devolucion_detalle_util::getunidadDescripcion($unidadLogic->getunidad());

		} else {
			$strDescripcionunidad='null';
		}

		return $strDescripcionunidad;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(devolucion_detalle $devolucion_detalleClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
			
			
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	
	

	public function setVisibleBusquedasParadevolucion($isParadevolucion){
		$strParaVisibledevolucion='display:table-row';
		$strParaVisibleNegaciondevolucion='display:none';

		if($isParadevolucion) {
			$strParaVisibledevolucion='display:table-row';
			$strParaVisibleNegaciondevolucion='display:none';
		} else {
			$strParaVisibledevolucion='display:none';
			$strParaVisibleNegaciondevolucion='display:table-row';
		}


		$strParaVisibleNegaciondevolucion=trim($strParaVisibleNegaciondevolucion);

		$this->strVisibleFK_Idbodega=$strParaVisibleNegaciondevolucion;
		$this->strVisibleFK_Iddevolucion=$strParaVisibledevolucion;
		$this->strVisibleFK_Idproducto=$strParaVisibleNegaciondevolucion;
		$this->strVisibleFK_Idunidad=$strParaVisibleNegaciondevolucion;
	}

	public function setVisibleBusquedasParabodega($isParabodega){
		$strParaVisiblebodega='display:table-row';
		$strParaVisibleNegacionbodega='display:none';

		if($isParabodega) {
			$strParaVisiblebodega='display:table-row';
			$strParaVisibleNegacionbodega='display:none';
		} else {
			$strParaVisiblebodega='display:none';
			$strParaVisibleNegacionbodega='display:table-row';
		}


		$strParaVisibleNegacionbodega=trim($strParaVisibleNegacionbodega);

		$this->strVisibleFK_Idbodega=$strParaVisiblebodega;
		$this->strVisibleFK_Iddevolucion=$strParaVisibleNegacionbodega;
		$this->strVisibleFK_Idproducto=$strParaVisibleNegacionbodega;
		$this->strVisibleFK_Idunidad=$strParaVisibleNegacionbodega;
	}

	public function setVisibleBusquedasParaproducto($isParaproducto){
		$strParaVisibleproducto='display:table-row';
		$strParaVisibleNegacionproducto='display:none';

		if($isParaproducto) {
			$strParaVisibleproducto='display:table-row';
			$strParaVisibleNegacionproducto='display:none';
		} else {
			$strParaVisibleproducto='display:none';
			$strParaVisibleNegacionproducto='display:table-row';
		}


		$strParaVisibleNegacionproducto=trim($strParaVisibleNegacionproducto);

		$this->strVisibleFK_Idbodega=$strParaVisibleNegacionproducto;
		$this->strVisibleFK_Iddevolucion=$strParaVisibleNegacionproducto;
		$this->strVisibleFK_Idproducto=$strParaVisibleproducto;
		$this->strVisibleFK_Idunidad=$strParaVisibleNegacionproducto;
	}

	public function setVisibleBusquedasParaunidad($isParaunidad){
		$strParaVisibleunidad='display:table-row';
		$strParaVisibleNegacionunidad='display:none';

		if($isParaunidad) {
			$strParaVisibleunidad='display:table-row';
			$strParaVisibleNegacionunidad='display:none';
		} else {
			$strParaVisibleunidad='display:none';
			$strParaVisibleNegacionunidad='display:table-row';
		}


		$strParaVisibleNegacionunidad=trim($strParaVisibleNegacionunidad);

		$this->strVisibleFK_Idbodega=$strParaVisibleNegacionunidad;
		$this->strVisibleFK_Iddevolucion=$strParaVisibleNegacionunidad;
		$this->strVisibleFK_Idproducto=$strParaVisibleNegacionunidad;
		$this->strVisibleFK_Idunidad=$strParaVisibleunidad;
	}
	
	

	public function abrirBusquedaParadevolucion() {//$iddevolucion_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->iddevolucion_detalleActual=$iddevolucion_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.devolucion_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.devolucion_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_devolucion(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',devolucion_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.devolucion_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_devolucion(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(devolucion_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliardevolucion_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParabodega() {//$iddevolucion_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->iddevolucion_detalleActual=$iddevolucion_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.bodega_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.devolucion_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_bodega(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',bodega_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.devolucion_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_bodega(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(bodega_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliardevolucion_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaproducto() {//$iddevolucion_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->iddevolucion_detalleActual=$iddevolucion_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.producto_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.devolucion_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_producto(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',producto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.devolucion_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_producto(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(producto_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliardevolucion_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaunidad() {//$iddevolucion_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->iddevolucion_detalleActual=$iddevolucion_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.unidad_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.devolucion_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_unidad(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',unidad_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.devolucion_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_unidad(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(unidad_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliardevolucion_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(devolucion_detalle_util::$STR_SESSION_NAME,devolucion_detalle_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$devolucion_detalle_session=$this->Session->read(devolucion_detalle_util::$STR_SESSION_NAME);
				
		if($devolucion_detalle_session==null) {
			$devolucion_detalle_session=new devolucion_detalle_session();		
			//$this->Session->write('devolucion_detalle_session',$devolucion_detalle_session);							
		}
		*/
		
		$devolucion_detalle_session=new devolucion_detalle_session();
    	$devolucion_detalle_session->strPathNavegacionActual=devolucion_detalle_util::$STR_CLASS_WEB_TITULO;
    	$devolucion_detalle_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(devolucion_detalle_util::$STR_SESSION_NAME,serialize($devolucion_detalle_session));		
	}	
	
	public function getSetBusquedasSesionConfig(devolucion_detalle_session $devolucion_detalle_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($devolucion_detalle_session->bitBusquedaDesdeFKSesionFK!=null && $devolucion_detalle_session->bitBusquedaDesdeFKSesionFK==true) {
			if($devolucion_detalle_session->bigIdActualFK!=null && $devolucion_detalle_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$devolucion_detalle_session->bigIdActualFKParaPosibleAtras=$devolucion_detalle_session->bigIdActualFK;*/
			}
				
			$devolucion_detalle_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$devolucion_detalle_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(devolucion_detalle_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($devolucion_detalle_session->bitBusquedaDesdeFKSesiondevolucion!=null && $devolucion_detalle_session->bitBusquedaDesdeFKSesiondevolucion==true)
			{
				if($devolucion_detalle_session->bigiddevolucionActual!=0) {
					$this->strAccionBusqueda='FK_Iddevolucion';

					$existe_history=HistoryWeb::ExisteElemento(devolucion_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(devolucion_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(devolucion_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($devolucion_detalle_session->bigiddevolucionActualDescripcion);
						$historyWeb->setIdActual($devolucion_detalle_session->bigiddevolucionActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=devolucion_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$devolucion_detalle_session->bigiddevolucionActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$devolucion_detalle_session->bitBusquedaDesdeFKSesiondevolucion=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=devolucion_detalle_util::$INT_NUMERO_PAGINACION;

				if($devolucion_detalle_session->intNumeroPaginacion==devolucion_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=devolucion_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$devolucion_detalle_session->intNumeroPaginacion;
				}
			}
			else if($devolucion_detalle_session->bitBusquedaDesdeFKSesionbodega!=null && $devolucion_detalle_session->bitBusquedaDesdeFKSesionbodega==true)
			{
				if($devolucion_detalle_session->bigidbodegaActual!=0) {
					$this->strAccionBusqueda='FK_Idbodega';

					$existe_history=HistoryWeb::ExisteElemento(devolucion_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(devolucion_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(devolucion_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($devolucion_detalle_session->bigidbodegaActualDescripcion);
						$historyWeb->setIdActual($devolucion_detalle_session->bigidbodegaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=devolucion_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$devolucion_detalle_session->bigidbodegaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$devolucion_detalle_session->bitBusquedaDesdeFKSesionbodega=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=devolucion_detalle_util::$INT_NUMERO_PAGINACION;

				if($devolucion_detalle_session->intNumeroPaginacion==devolucion_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=devolucion_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$devolucion_detalle_session->intNumeroPaginacion;
				}
			}
			else if($devolucion_detalle_session->bitBusquedaDesdeFKSesionproducto!=null && $devolucion_detalle_session->bitBusquedaDesdeFKSesionproducto==true)
			{
				if($devolucion_detalle_session->bigidproductoActual!=0) {
					$this->strAccionBusqueda='FK_Idproducto';

					$existe_history=HistoryWeb::ExisteElemento(devolucion_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(devolucion_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(devolucion_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($devolucion_detalle_session->bigidproductoActualDescripcion);
						$historyWeb->setIdActual($devolucion_detalle_session->bigidproductoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=devolucion_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$devolucion_detalle_session->bigidproductoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$devolucion_detalle_session->bitBusquedaDesdeFKSesionproducto=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=devolucion_detalle_util::$INT_NUMERO_PAGINACION;

				if($devolucion_detalle_session->intNumeroPaginacion==devolucion_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=devolucion_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$devolucion_detalle_session->intNumeroPaginacion;
				}
			}
			else if($devolucion_detalle_session->bitBusquedaDesdeFKSesionunidad!=null && $devolucion_detalle_session->bitBusquedaDesdeFKSesionunidad==true)
			{
				if($devolucion_detalle_session->bigidunidadActual!=0) {
					$this->strAccionBusqueda='FK_Idunidad';

					$existe_history=HistoryWeb::ExisteElemento(devolucion_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(devolucion_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(devolucion_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($devolucion_detalle_session->bigidunidadActualDescripcion);
						$historyWeb->setIdActual($devolucion_detalle_session->bigidunidadActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=devolucion_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$devolucion_detalle_session->bigidunidadActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$devolucion_detalle_session->bitBusquedaDesdeFKSesionunidad=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=devolucion_detalle_util::$INT_NUMERO_PAGINACION;

				if($devolucion_detalle_session->intNumeroPaginacion==devolucion_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=devolucion_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$devolucion_detalle_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$devolucion_detalle_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$devolucion_detalle_session=unserialize($this->Session->read(devolucion_detalle_util::$STR_SESSION_NAME));
		
		if($devolucion_detalle_session==null) {
			$devolucion_detalle_session=new devolucion_detalle_session();
		}
		
		$devolucion_detalle_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$devolucion_detalle_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$devolucion_detalle_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idbodega') {
			$devolucion_detalle_session->id_bodega=$this->id_bodegaFK_Idbodega;	

		}
		else if($this->strAccionBusqueda=='FK_Iddevolucion') {
			$devolucion_detalle_session->id_devolucion=$this->id_devolucionFK_Iddevolucion;	

		}
		else if($this->strAccionBusqueda=='FK_Idproducto') {
			$devolucion_detalle_session->id_producto=$this->id_productoFK_Idproducto;	

		}
		else if($this->strAccionBusqueda=='FK_Idunidad') {
			$devolucion_detalle_session->id_unidad=$this->id_unidadFK_Idunidad;	

		}
		
		$this->Session->write(devolucion_detalle_util::$STR_SESSION_NAME,serialize($devolucion_detalle_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(devolucion_detalle_session $devolucion_detalle_session) {
		
		if($devolucion_detalle_session==null) {
			$devolucion_detalle_session=unserialize($this->Session->read(devolucion_detalle_util::$STR_SESSION_NAME));
		}
		
		if($devolucion_detalle_session==null) {
		   $devolucion_detalle_session=new devolucion_detalle_session();
		}
		
		if($devolucion_detalle_session->strUltimaBusqueda!=null && $devolucion_detalle_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$devolucion_detalle_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$devolucion_detalle_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$devolucion_detalle_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idbodega') {
				$this->id_bodegaFK_Idbodega=$devolucion_detalle_session->id_bodega;
				$devolucion_detalle_session->id_bodega=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Iddevolucion') {
				$this->id_devolucionFK_Iddevolucion=$devolucion_detalle_session->id_devolucion;
				$devolucion_detalle_session->id_devolucion=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idproducto') {
				$this->id_productoFK_Idproducto=$devolucion_detalle_session->id_producto;
				$devolucion_detalle_session->id_producto=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idunidad') {
				$this->id_unidadFK_Idunidad=$devolucion_detalle_session->id_unidad;
				$devolucion_detalle_session->id_unidad=-1;

			}
		}
		
		$devolucion_detalle_session->strUltimaBusqueda='';
		//$devolucion_detalle_session->intNumeroPaginacion=10;
		$devolucion_detalle_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(devolucion_detalle_util::$STR_SESSION_NAME,serialize($devolucion_detalle_session));		
	}
	
	public function devolucion_detallesControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->iddevolucionDefaultFK = 0;
		$this->idbodegaDefaultFK = 0;
		$this->idproductoDefaultFK = 0;
		$this->idunidadDefaultFK = 0;
	}
	
	public function setdevolucion_detalleFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_devolucion',$this->iddevolucionDefaultFK);
		$this->setExistDataCampoForm('form','id_bodega',$this->idbodegaDefaultFK);
		$this->setExistDataCampoForm('form','id_producto',$this->idproductoDefaultFK);
		$this->setExistDataCampoForm('form','id_unidad',$this->idunidadDefaultFK);
	}
	
	/*VIEW_LAYER-FIN*/
			
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $selectItem=new SelectItem();
        
		$upr=new usuario_param_return();$upr->conAbrirVentana;
		
        if($selectItem!=null);
		
		//FKs
		

		devolucion::$class;
		devolucion_carga::$CONTROLLER;

		bodega::$class;
		bodega_carga::$CONTROLLER;

		producto::$class;
		producto_carga::$CONTROLLER;

		unidad::$class;
		unidad_carga::$CONTROLLER;
		
		//REL
		
    }
		
	public function irPagina(int $paginacion_pagina=0){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			$this->intNumeroPaginacionPagina=$paginacion_pagina;
						
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	/*
		interface devolucion_detalle_controlI {	
		
		public function inicializarParametrosQueryString(mixed $post1=null);
		public function ejecutarParametrosQueryString();	
		public function getBuildControllerResponse();
		
		public function loadIndex();	
		public function indexRecargarRelacionado();	
		public function recargarInformacionAction();
		
		public function buscarPorIdGeneralAction();	
		public function anterioresAction();		
		public function siguientesAction();	
		public function recargarUltimaInformacionAction();	
		public function seleccionarLoteFkAction();
		
		public function nuevoAction();	
		public function actualizarAction();	
		public function eliminarAction();	
		public function cancelarAction();	
		public function guardarCambiosAction();
		
		public function duplicarAction();	
		public function copiarAction();	
		public function nuevoPrepararAction();	
		public function nuevoPrepararPaginaFormAction();	
		public function nuevoPrepararAbrirPaginaFormAction();	
		public function nuevoTablaPrepararAction();
		
		public function seleccionarActualAction();	
		public function seleccionarActualPaginaFormAction();	
		public function seleccionarActualAbrirPaginaFormAction();
		
		public function editarTablaDatosAction();	
		public function eliminarTablaAction();	
		public function quitarElementosTablaAction();
		
		public function generarFpdfAction();	
		public function generarHtmlReporteAction();	
		public function generarHtmlFormReporteAction();	
		public function generarHtmlRelacionesReporteAction();
		
		
		public function recargarReferenciasAction();
		
		
		public function manejarEventosAction();
		public function recargarFormularioGeneralAction();
		
		
		
		public function generarReporteConPhpExcelAction();	
		public function generarReporteConPhpExcelVerticalAction();	
		public function generarReporteConPhpExcelRelacionesAction();
		
		public function onLoad(devolucion_detalle_session $devolucion_detalle_session=null);	
		function index(?string $strTypeOnLoaddevolucion_detalle='',?string $strTipoPaginaAuxiliardevolucion_detalle='',?string $strTipoUsuarioAuxiliardevolucion_detalle='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
		public function seleccionar();	
		public function seleccionarActual(int $id = null);
		
		
		public function nuevoPreparar();	
		public function copiar();	
		public function duplicar();	
		public function guardarCambios();	
		public function nuevoTablaPreparar();	
		public function editarTablaDatos();	
		function guardarCambiosTablas();
		
			
		
		public function cancelarAccionesRelaciones();	
		public function recargarInformacion();	
		public function search(string $strTypeOnLoaddevolucion_detalle='',string $strTipoPaginaAuxiliardevolucion_detalle='',string $strTipoUsuarioAuxiliardevolucion_detalle='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($devolucion_detalleReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(devolucion_detalle $devolucion_detalleClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(devolucion_detalle_session $devolucion_detalle_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(devolucion_detalle_session $devolucion_detalle_session);	
		public function devolucion_detallesControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setdevolucion_detalleFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
