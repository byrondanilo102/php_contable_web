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

namespace com\bydan\contabilidad\inventario\imagen_devolucion\presentation\control;

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

use com\bydan\contabilidad\inventario\imagen_devolucion\business\entity\imagen_devolucion;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/imagen_devolucion/util/imagen_devolucion_carga.php');
use com\bydan\contabilidad\inventario\imagen_devolucion\util\imagen_devolucion_carga;

use com\bydan\contabilidad\inventario\imagen_devolucion\util\imagen_devolucion_util;
use com\bydan\contabilidad\inventario\imagen_devolucion\util\imagen_devolucion_param_return;
use com\bydan\contabilidad\inventario\imagen_devolucion\business\logic\imagen_devolucion_logic;
use com\bydan\contabilidad\inventario\imagen_devolucion\presentation\session\imagen_devolucion_session;


//FK


//REL



/*CARGA ARCHIVOS FRAMEWORK*/
imagen_devolucion_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
imagen_devolucion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
imagen_devolucion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
imagen_devolucion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*imagen_devolucion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class imagen_devolucion_init_control extends ControllerBase {	
	
	public $imagen_devolucionClase=null;	
	public $imagen_devolucionsModel=null;	
	public $imagen_devolucionsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idimagen_devolucion=0;	
	public ?int $idimagen_devolucionActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $imagen_devolucionLogic=null;
	
	public $imagen_devolucionActual=null;	
	
	public $imagen_devolucion=null;
	public $imagen_devolucions=null;
	public $imagen_devolucionsEliminados=array();
	public $imagen_devolucionsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $imagen_devolucionsLocal=array();
	public ?array $imagen_devolucionsReporte=null;
	public ?array $imagen_devolucionsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadimagen_devolucion='onload';
	public string $strTipoPaginaAuxiliarimagen_devolucion='none';
	public string $strTipoUsuarioAuxiliarimagen_devolucion='none';
		
	public $imagen_devolucionReturnGeneral=null;
	public $imagen_devolucionParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $imagen_devolucionModel=null;
	public $imagen_devolucionControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeimagen='';
	public string $strMensajenro_devolucion='';
	
	

	
	
	
	
	
	
	
	
	

	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->imagen_devolucionLogic==null) {
				$this->imagen_devolucionLogic=new imagen_devolucion_logic();
			}
			
		} else {
			if($this->imagen_devolucionLogic==null) {
				$this->imagen_devolucionLogic=new imagen_devolucion_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->imagen_devolucionClase==null) {
				$this->imagen_devolucionClase=new imagen_devolucion();
			}
			
			$this->imagen_devolucionClase->setId(0);	
				
				
			$this->imagen_devolucionClase->setimagen('');	
			$this->imagen_devolucionClase->setnro_devolucion('');	
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function actualizarEstadoCeldasBotones(string $strAccion,bool $bitGuardarCambiosEnLote=false,bool $bitEsMantenimientoRelacionado=false){
		$this->actualizarEstadoCeldasBotonesBase($strAccion,$bitGuardarCambiosEnLote,$bitEsMantenimientoRelacionado);
	}
	
	public function manejarRetornarExcepcion(Exception $e) {
		$this->manejarRetornarExcepcionBase($e);
	}
	
	public function cancelarControles() {			
		$this->cancelarControlesBase();
	}
	
	public function inicializarAuxiliares() {
		$this->inicializarAuxiliaresBase();				
	}
	
	public function inicializarMensajesTipo(string $tipo,$e=null) {
		$this->inicializarMensajesTipoBase($tipo,$e);
	}			
	
	public function prepararEjecutarMantenimiento() {
		$this->prepararEjecutarMantenimientoBase('imagen_devolucion');
	}
	
	public function setTipoAction(string $action='INDEX') {		
		$this->setTipoActionBase($action);
	}
	
	public function cargarDatosCliente() {
		$this->cargarDatosClienteBase();
	}
	
	public function cargarParametrosPagina() {		
		$this->cargarParametrosPaginaBase();
	}
	
	public function cargarParametrosEventosTabla() {
		$this->cargarParametrosEventosTablaBase();
	}
	
	public function cargarParametrosReporte() {
		$this->cargarParametrosReporteBase('imagen_devolucion');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('imagen_devolucion');
	}
	
	public function actualizarControllerConReturnGeneral(imagen_devolucion_param_return $imagen_devolucionReturnGeneral) {
		if($imagen_devolucionReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesimagen_devolucionsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$imagen_devolucionReturnGeneral->getsMensajeProceso();
		}
		
		if($imagen_devolucionReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$imagen_devolucionReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($imagen_devolucionReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$imagen_devolucionReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$imagen_devolucionReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($imagen_devolucionReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($imagen_devolucionReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$imagen_devolucionReturnGeneral->getsFuncionJs();
		}
		
		if($imagen_devolucionReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(imagen_devolucion_session $imagen_devolucion_session){
		$this->strStyleDivArbol=$imagen_devolucion_session->strStyleDivArbol;	
		$this->strStyleDivContent=$imagen_devolucion_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$imagen_devolucion_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$imagen_devolucion_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$imagen_devolucion_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$imagen_devolucion_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$imagen_devolucion_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(imagen_devolucion_session $imagen_devolucion_session){
		$imagen_devolucion_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$imagen_devolucion_session->strStyleDivHeader='display:none';			
		$imagen_devolucion_session->strStyleDivContent='width:93%;height:100%';	
		$imagen_devolucion_session->strStyleDivOpcionesBanner='display:none';	
		$imagen_devolucion_session->strStyleDivExpandirColapsar='display:none';	
		$imagen_devolucion_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(imagen_devolucion_control $imagen_devolucion_control_session){
		$this->idNuevo=$imagen_devolucion_control_session->idNuevo;
		$this->imagen_devolucionActual=$imagen_devolucion_control_session->imagen_devolucionActual;
		$this->imagen_devolucion=$imagen_devolucion_control_session->imagen_devolucion;
		$this->imagen_devolucionClase=$imagen_devolucion_control_session->imagen_devolucionClase;
		$this->imagen_devolucions=$imagen_devolucion_control_session->imagen_devolucions;
		$this->imagen_devolucionsEliminados=$imagen_devolucion_control_session->imagen_devolucionsEliminados;
		$this->imagen_devolucion=$imagen_devolucion_control_session->imagen_devolucion;
		$this->imagen_devolucionsReporte=$imagen_devolucion_control_session->imagen_devolucionsReporte;
		$this->imagen_devolucionsSeleccionados=$imagen_devolucion_control_session->imagen_devolucionsSeleccionados;
		$this->arrOrderBy=$imagen_devolucion_control_session->arrOrderBy;
		$this->arrOrderByRel=$imagen_devolucion_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$imagen_devolucion_control_session->arrHistoryWebs;
		$this->arrSessionBases=$imagen_devolucion_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadimagen_devolucion=$imagen_devolucion_control_session->strTypeOnLoadimagen_devolucion;
		$this->strTipoPaginaAuxiliarimagen_devolucion=$imagen_devolucion_control_session->strTipoPaginaAuxiliarimagen_devolucion;
		$this->strTipoUsuarioAuxiliarimagen_devolucion=$imagen_devolucion_control_session->strTipoUsuarioAuxiliarimagen_devolucion;	
		
		$this->bitEsPopup=$imagen_devolucion_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$imagen_devolucion_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$imagen_devolucion_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$imagen_devolucion_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$imagen_devolucion_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$imagen_devolucion_control_session->strSufijo;
		$this->bitEsRelaciones=$imagen_devolucion_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$imagen_devolucion_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$imagen_devolucion_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$imagen_devolucion_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$imagen_devolucion_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$imagen_devolucion_control_session->strTituloTabla;
		$this->strTituloPathPagina=$imagen_devolucion_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$imagen_devolucion_control_session->strTituloPathElementoActual;
		
		if($this->imagen_devolucionLogic==null) {			
			$this->imagen_devolucionLogic=new imagen_devolucion_logic();
		}
		
		
		if($this->imagen_devolucionClase==null) {
			$this->imagen_devolucionClase=new imagen_devolucion();	
		}
		
		$this->imagen_devolucionLogic->setimagen_devolucion($this->imagen_devolucionClase);
		
		
		if($this->imagen_devolucions==null) {
			$this->imagen_devolucions=array();	
		}
		
		$this->imagen_devolucionLogic->setimagen_devolucions($this->imagen_devolucions);
		
		
		$this->strTipoView=$imagen_devolucion_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$imagen_devolucion_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$imagen_devolucion_control_session->datosCliente;
		$this->strAccionBusqueda=$imagen_devolucion_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$imagen_devolucion_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$imagen_devolucion_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$imagen_devolucion_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$imagen_devolucion_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$imagen_devolucion_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$imagen_devolucion_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$imagen_devolucion_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$imagen_devolucion_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$imagen_devolucion_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$imagen_devolucion_control_session->strTipoPaginacion;
		$this->strTipoAccion=$imagen_devolucion_control_session->strTipoAccion;
		$this->tiposReportes=$imagen_devolucion_control_session->tiposReportes;
		$this->tiposReporte=$imagen_devolucion_control_session->tiposReporte;
		$this->tiposAcciones=$imagen_devolucion_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$imagen_devolucion_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$imagen_devolucion_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$imagen_devolucion_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$imagen_devolucion_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$imagen_devolucion_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$imagen_devolucion_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$imagen_devolucion_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$imagen_devolucion_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$imagen_devolucion_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$imagen_devolucion_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$imagen_devolucion_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$imagen_devolucion_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$imagen_devolucion_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$imagen_devolucion_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$imagen_devolucion_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$imagen_devolucion_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$imagen_devolucion_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$imagen_devolucion_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$imagen_devolucion_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$imagen_devolucion_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$imagen_devolucion_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$imagen_devolucion_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$imagen_devolucion_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$imagen_devolucion_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$imagen_devolucion_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$imagen_devolucion_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$imagen_devolucion_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$imagen_devolucion_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$imagen_devolucion_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$imagen_devolucion_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$imagen_devolucion_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$imagen_devolucion_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$imagen_devolucion_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$imagen_devolucion_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$imagen_devolucion_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$imagen_devolucion_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$imagen_devolucion_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$imagen_devolucion_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$imagen_devolucion_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$imagen_devolucion_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$imagen_devolucion_control_session->resumenUsuarioActual;	
		$this->moduloActual=$imagen_devolucion_control_session->moduloActual;	
		$this->opcionActual=$imagen_devolucion_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$imagen_devolucion_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$imagen_devolucion_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$imagen_devolucion_session=unserialize($this->Session->read(imagen_devolucion_util::$STR_SESSION_NAME));
				
		if($imagen_devolucion_session==null) {
			$imagen_devolucion_session=new imagen_devolucion_session();
		}
		
		$this->strStyleDivArbol=$imagen_devolucion_session->strStyleDivArbol;	
		$this->strStyleDivContent=$imagen_devolucion_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$imagen_devolucion_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$imagen_devolucion_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$imagen_devolucion_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$imagen_devolucion_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$imagen_devolucion_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$imagen_devolucion_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$imagen_devolucion_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$imagen_devolucion_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$imagen_devolucion_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeimagen=$imagen_devolucion_control_session->strMensajeimagen;
		$this->strMensajenro_devolucion=$imagen_devolucion_control_session->strMensajenro_devolucion;
			
		
		
		
		
		
		
		

		
		
		
		/*ACTUALIZA CON PARAMETROS ACTUALES*/
		$this->cargarParamsPostAccion();
		
		$this->cargarParametrosReporte();
		/*ACTUALIZA CON PARAMETROS ACTUALES*/
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function getidNuevo() : int {
		return $this->idNuevo;
	}

	public function setidNuevo(int $idNuevo) {
		$this->idNuevo = $idNuevo;
	}
	
	public function getimagen_devolucionControllerAdditional() {
		return $this->imagen_devolucionControllerAdditional;
	}

	public function setimagen_devolucionControllerAdditional($imagen_devolucionControllerAdditional) {
		$this->imagen_devolucionControllerAdditional = $imagen_devolucionControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getimagen_devolucionActual() : imagen_devolucion {
		return $this->imagen_devolucionActual;
	}

	public function setimagen_devolucionActual(imagen_devolucion $imagen_devolucionActual) {
		$this->imagen_devolucionActual = $imagen_devolucionActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidimagen_devolucion() : int {
		return $this->idimagen_devolucion;
	}

	public function setidimagen_devolucion(int $idimagen_devolucion) {
		$this->idimagen_devolucion = $idimagen_devolucion;
	}
	
	public function getimagen_devolucion() : imagen_devolucion {
		return $this->imagen_devolucion;
	}

	public function setimagen_devolucion(imagen_devolucion $imagen_devolucion) {
		$this->imagen_devolucion = $imagen_devolucion;
	}
		
	public function getimagen_devolucionLogic() : imagen_devolucion_logic {		
		return $this->imagen_devolucionLogic;
	}

	public function setimagen_devolucionLogic(imagen_devolucion_logic $imagen_devolucionLogic) {
		$this->imagen_devolucionLogic = $imagen_devolucionLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getimagen_devolucionsModel() {		
		try {						
			/*imagen_devolucionsModel.setWrappedData(imagen_devolucionLogic->getimagen_devolucions());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->imagen_devolucionsModel;
	}
	
	public function setimagen_devolucionsModel($imagen_devolucionsModel) {
		$this->imagen_devolucionsModel = $imagen_devolucionsModel;
	}
	
	public function getimagen_devolucions() : array {		
		return $this->imagen_devolucions;
	}
	
	public function setimagen_devolucions(array $imagen_devolucions) {
		$this->imagen_devolucions= $imagen_devolucions;
	}
	
	public function getimagen_devolucionsEliminados() : array {		
		return $this->imagen_devolucionsEliminados;
	}
	
	public function setimagen_devolucionsEliminados(array $imagen_devolucionsEliminados) {
		$this->imagen_devolucionsEliminados= $imagen_devolucionsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getimagen_devolucionActualFromListDataModel() {
		try {
			/*$imagen_devolucionClase= $this->imagen_devolucionsModel->getRowData();*/
			
			/*return $imagen_devolucion;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
