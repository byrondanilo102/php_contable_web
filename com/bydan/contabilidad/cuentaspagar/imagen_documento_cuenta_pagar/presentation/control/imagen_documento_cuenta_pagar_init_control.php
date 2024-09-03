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

namespace com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\presentation\control;

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

use com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\business\entity\imagen_documento_cuenta_pagar;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/imagen_documento_cuenta_pagar/util/imagen_documento_cuenta_pagar_carga.php');
use com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\util\imagen_documento_cuenta_pagar_carga;

use com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\util\imagen_documento_cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\util\imagen_documento_cuenta_pagar_param_return;
use com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\business\logic\imagen_documento_cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\presentation\session\imagen_documento_cuenta_pagar_session;


//FK


use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\business\entity\documento_cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\business\logic\documento_cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\util\documento_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\util\documento_cuenta_pagar_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
imagen_documento_cuenta_pagar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
imagen_documento_cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
imagen_documento_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
imagen_documento_cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*imagen_documento_cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class imagen_documento_cuenta_pagar_init_control extends ControllerBase {	
	
	public $imagen_documento_cuenta_pagarClase=null;	
	public $imagen_documento_cuenta_pagarsModel=null;	
	public $imagen_documento_cuenta_pagarsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idimagen_documento_cuenta_pagar=0;	
	public ?int $idimagen_documento_cuenta_pagarActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $imagen_documento_cuenta_pagarLogic=null;
	
	public $imagen_documento_cuenta_pagarActual=null;	
	
	public $imagen_documento_cuenta_pagar=null;
	public $imagen_documento_cuenta_pagars=null;
	public $imagen_documento_cuenta_pagarsEliminados=array();
	public $imagen_documento_cuenta_pagarsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $imagen_documento_cuenta_pagarsLocal=array();
	public ?array $imagen_documento_cuenta_pagarsReporte=null;
	public ?array $imagen_documento_cuenta_pagarsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadimagen_documento_cuenta_pagar='onload';
	public string $strTipoPaginaAuxiliarimagen_documento_cuenta_pagar='none';
	public string $strTipoUsuarioAuxiliarimagen_documento_cuenta_pagar='none';
		
	public $imagen_documento_cuenta_pagarReturnGeneral=null;
	public $imagen_documento_cuenta_pagarParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $imagen_documento_cuenta_pagarModel=null;
	public $imagen_documento_cuenta_pagarControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeimagen='';
	public string $strMensajeid_documento_cuenta_pagar='';
	public string $strMensajenro_documento='';
	
	
	public string $strVisibleFK_Iddocumento_cuenta_pagar='display:table-row';

	
	public array $documento_cuenta_pagarsFK=array();

	public function getdocumento_cuenta_pagarsFK():array {
		return $this->documento_cuenta_pagarsFK;
	}

	public function setdocumento_cuenta_pagarsFK(array $documento_cuenta_pagarsFK) {
		$this->documento_cuenta_pagarsFK = $documento_cuenta_pagarsFK;
	}

	public int $iddocumento_cuenta_pagarDefaultFK=-1;

	public function getIddocumento_cuenta_pagarDefaultFK():int {
		return $this->iddocumento_cuenta_pagarDefaultFK;
	}

	public function setIddocumento_cuenta_pagarDefaultFK(int $iddocumento_cuenta_pagarDefaultFK) {
		$this->iddocumento_cuenta_pagarDefaultFK = $iddocumento_cuenta_pagarDefaultFK;
	}

	
	
	
	
	
	
	
	
	public  $id_documento_cuenta_pagarFK_Iddocumento_cuenta_pagar=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->imagen_documento_cuenta_pagarLogic==null) {
				$this->imagen_documento_cuenta_pagarLogic=new imagen_documento_cuenta_pagar_logic();
			}
			
		} else {
			if($this->imagen_documento_cuenta_pagarLogic==null) {
				$this->imagen_documento_cuenta_pagarLogic=new imagen_documento_cuenta_pagar_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->imagen_documento_cuenta_pagarClase==null) {
				$this->imagen_documento_cuenta_pagarClase=new imagen_documento_cuenta_pagar();
			}
			
			$this->imagen_documento_cuenta_pagarClase->setId(0);	
				
				
			$this->imagen_documento_cuenta_pagarClase->setimagen('');	
			$this->imagen_documento_cuenta_pagarClase->setid_documento_cuenta_pagar(-1);	
			$this->imagen_documento_cuenta_pagarClase->setnro_documento('');	
			
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
		$this->prepararEjecutarMantenimientoBase('imagen_documento_cuenta_pagar');
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
		$this->cargarParametrosReporteBase('imagen_documento_cuenta_pagar');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('imagen_documento_cuenta_pagar');
	}
	
	public function actualizarControllerConReturnGeneral(imagen_documento_cuenta_pagar_param_return $imagen_documento_cuenta_pagarReturnGeneral) {
		if($imagen_documento_cuenta_pagarReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesimagen_documento_cuenta_pagarsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$imagen_documento_cuenta_pagarReturnGeneral->getsMensajeProceso();
		}
		
		if($imagen_documento_cuenta_pagarReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$imagen_documento_cuenta_pagarReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($imagen_documento_cuenta_pagarReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$imagen_documento_cuenta_pagarReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$imagen_documento_cuenta_pagarReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($imagen_documento_cuenta_pagarReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($imagen_documento_cuenta_pagarReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$imagen_documento_cuenta_pagarReturnGeneral->getsFuncionJs();
		}
		
		if($imagen_documento_cuenta_pagarReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(imagen_documento_cuenta_pagar_session $imagen_documento_cuenta_pagar_session){
		$this->strStyleDivArbol=$imagen_documento_cuenta_pagar_session->strStyleDivArbol;	
		$this->strStyleDivContent=$imagen_documento_cuenta_pagar_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$imagen_documento_cuenta_pagar_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$imagen_documento_cuenta_pagar_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$imagen_documento_cuenta_pagar_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$imagen_documento_cuenta_pagar_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$imagen_documento_cuenta_pagar_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(imagen_documento_cuenta_pagar_session $imagen_documento_cuenta_pagar_session){
		$imagen_documento_cuenta_pagar_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$imagen_documento_cuenta_pagar_session->strStyleDivHeader='display:none';			
		$imagen_documento_cuenta_pagar_session->strStyleDivContent='width:93%;height:100%';	
		$imagen_documento_cuenta_pagar_session->strStyleDivOpcionesBanner='display:none';	
		$imagen_documento_cuenta_pagar_session->strStyleDivExpandirColapsar='display:none';	
		$imagen_documento_cuenta_pagar_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(imagen_documento_cuenta_pagar_control $imagen_documento_cuenta_pagar_control_session){
		$this->idNuevo=$imagen_documento_cuenta_pagar_control_session->idNuevo;
		$this->imagen_documento_cuenta_pagarActual=$imagen_documento_cuenta_pagar_control_session->imagen_documento_cuenta_pagarActual;
		$this->imagen_documento_cuenta_pagar=$imagen_documento_cuenta_pagar_control_session->imagen_documento_cuenta_pagar;
		$this->imagen_documento_cuenta_pagarClase=$imagen_documento_cuenta_pagar_control_session->imagen_documento_cuenta_pagarClase;
		$this->imagen_documento_cuenta_pagars=$imagen_documento_cuenta_pagar_control_session->imagen_documento_cuenta_pagars;
		$this->imagen_documento_cuenta_pagarsEliminados=$imagen_documento_cuenta_pagar_control_session->imagen_documento_cuenta_pagarsEliminados;
		$this->imagen_documento_cuenta_pagar=$imagen_documento_cuenta_pagar_control_session->imagen_documento_cuenta_pagar;
		$this->imagen_documento_cuenta_pagarsReporte=$imagen_documento_cuenta_pagar_control_session->imagen_documento_cuenta_pagarsReporte;
		$this->imagen_documento_cuenta_pagarsSeleccionados=$imagen_documento_cuenta_pagar_control_session->imagen_documento_cuenta_pagarsSeleccionados;
		$this->arrOrderBy=$imagen_documento_cuenta_pagar_control_session->arrOrderBy;
		$this->arrOrderByRel=$imagen_documento_cuenta_pagar_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$imagen_documento_cuenta_pagar_control_session->arrHistoryWebs;
		$this->arrSessionBases=$imagen_documento_cuenta_pagar_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadimagen_documento_cuenta_pagar=$imagen_documento_cuenta_pagar_control_session->strTypeOnLoadimagen_documento_cuenta_pagar;
		$this->strTipoPaginaAuxiliarimagen_documento_cuenta_pagar=$imagen_documento_cuenta_pagar_control_session->strTipoPaginaAuxiliarimagen_documento_cuenta_pagar;
		$this->strTipoUsuarioAuxiliarimagen_documento_cuenta_pagar=$imagen_documento_cuenta_pagar_control_session->strTipoUsuarioAuxiliarimagen_documento_cuenta_pagar;	
		
		$this->bitEsPopup=$imagen_documento_cuenta_pagar_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$imagen_documento_cuenta_pagar_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$imagen_documento_cuenta_pagar_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$imagen_documento_cuenta_pagar_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$imagen_documento_cuenta_pagar_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$imagen_documento_cuenta_pagar_control_session->strSufijo;
		$this->bitEsRelaciones=$imagen_documento_cuenta_pagar_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$imagen_documento_cuenta_pagar_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$imagen_documento_cuenta_pagar_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$imagen_documento_cuenta_pagar_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$imagen_documento_cuenta_pagar_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$imagen_documento_cuenta_pagar_control_session->strTituloTabla;
		$this->strTituloPathPagina=$imagen_documento_cuenta_pagar_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$imagen_documento_cuenta_pagar_control_session->strTituloPathElementoActual;
		
		if($this->imagen_documento_cuenta_pagarLogic==null) {			
			$this->imagen_documento_cuenta_pagarLogic=new imagen_documento_cuenta_pagar_logic();
		}
		
		
		if($this->imagen_documento_cuenta_pagarClase==null) {
			$this->imagen_documento_cuenta_pagarClase=new imagen_documento_cuenta_pagar();	
		}
		
		$this->imagen_documento_cuenta_pagarLogic->setimagen_documento_cuenta_pagar($this->imagen_documento_cuenta_pagarClase);
		
		
		if($this->imagen_documento_cuenta_pagars==null) {
			$this->imagen_documento_cuenta_pagars=array();	
		}
		
		$this->imagen_documento_cuenta_pagarLogic->setimagen_documento_cuenta_pagars($this->imagen_documento_cuenta_pagars);
		
		
		$this->strTipoView=$imagen_documento_cuenta_pagar_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$imagen_documento_cuenta_pagar_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$imagen_documento_cuenta_pagar_control_session->datosCliente;
		$this->strAccionBusqueda=$imagen_documento_cuenta_pagar_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$imagen_documento_cuenta_pagar_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$imagen_documento_cuenta_pagar_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$imagen_documento_cuenta_pagar_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$imagen_documento_cuenta_pagar_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$imagen_documento_cuenta_pagar_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$imagen_documento_cuenta_pagar_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$imagen_documento_cuenta_pagar_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$imagen_documento_cuenta_pagar_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$imagen_documento_cuenta_pagar_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$imagen_documento_cuenta_pagar_control_session->strTipoPaginacion;
		$this->strTipoAccion=$imagen_documento_cuenta_pagar_control_session->strTipoAccion;
		$this->tiposReportes=$imagen_documento_cuenta_pagar_control_session->tiposReportes;
		$this->tiposReporte=$imagen_documento_cuenta_pagar_control_session->tiposReporte;
		$this->tiposAcciones=$imagen_documento_cuenta_pagar_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$imagen_documento_cuenta_pagar_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$imagen_documento_cuenta_pagar_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$imagen_documento_cuenta_pagar_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$imagen_documento_cuenta_pagar_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$imagen_documento_cuenta_pagar_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$imagen_documento_cuenta_pagar_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$imagen_documento_cuenta_pagar_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$imagen_documento_cuenta_pagar_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$imagen_documento_cuenta_pagar_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$imagen_documento_cuenta_pagar_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$imagen_documento_cuenta_pagar_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$imagen_documento_cuenta_pagar_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$imagen_documento_cuenta_pagar_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$imagen_documento_cuenta_pagar_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$imagen_documento_cuenta_pagar_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$imagen_documento_cuenta_pagar_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$imagen_documento_cuenta_pagar_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$imagen_documento_cuenta_pagar_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$imagen_documento_cuenta_pagar_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$imagen_documento_cuenta_pagar_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$imagen_documento_cuenta_pagar_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$imagen_documento_cuenta_pagar_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$imagen_documento_cuenta_pagar_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$imagen_documento_cuenta_pagar_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$imagen_documento_cuenta_pagar_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$imagen_documento_cuenta_pagar_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$imagen_documento_cuenta_pagar_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$imagen_documento_cuenta_pagar_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$imagen_documento_cuenta_pagar_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$imagen_documento_cuenta_pagar_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$imagen_documento_cuenta_pagar_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$imagen_documento_cuenta_pagar_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$imagen_documento_cuenta_pagar_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$imagen_documento_cuenta_pagar_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$imagen_documento_cuenta_pagar_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$imagen_documento_cuenta_pagar_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$imagen_documento_cuenta_pagar_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$imagen_documento_cuenta_pagar_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$imagen_documento_cuenta_pagar_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$imagen_documento_cuenta_pagar_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$imagen_documento_cuenta_pagar_control_session->resumenUsuarioActual;	
		$this->moduloActual=$imagen_documento_cuenta_pagar_control_session->moduloActual;	
		$this->opcionActual=$imagen_documento_cuenta_pagar_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$imagen_documento_cuenta_pagar_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$imagen_documento_cuenta_pagar_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$imagen_documento_cuenta_pagar_session=unserialize($this->Session->read(imagen_documento_cuenta_pagar_util::$STR_SESSION_NAME));
				
		if($imagen_documento_cuenta_pagar_session==null) {
			$imagen_documento_cuenta_pagar_session=new imagen_documento_cuenta_pagar_session();
		}
		
		$this->strStyleDivArbol=$imagen_documento_cuenta_pagar_session->strStyleDivArbol;	
		$this->strStyleDivContent=$imagen_documento_cuenta_pagar_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$imagen_documento_cuenta_pagar_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$imagen_documento_cuenta_pagar_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$imagen_documento_cuenta_pagar_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$imagen_documento_cuenta_pagar_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$imagen_documento_cuenta_pagar_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$imagen_documento_cuenta_pagar_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$imagen_documento_cuenta_pagar_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$imagen_documento_cuenta_pagar_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$imagen_documento_cuenta_pagar_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeimagen=$imagen_documento_cuenta_pagar_control_session->strMensajeimagen;
		$this->strMensajeid_documento_cuenta_pagar=$imagen_documento_cuenta_pagar_control_session->strMensajeid_documento_cuenta_pagar;
		$this->strMensajenro_documento=$imagen_documento_cuenta_pagar_control_session->strMensajenro_documento;
			
		
		$this->documento_cuenta_pagarsFK=$imagen_documento_cuenta_pagar_control_session->documento_cuenta_pagarsFK;
		$this->iddocumento_cuenta_pagarDefaultFK=$imagen_documento_cuenta_pagar_control_session->iddocumento_cuenta_pagarDefaultFK;
		
		
		$this->strVisibleFK_Iddocumento_cuenta_pagar=$imagen_documento_cuenta_pagar_control_session->strVisibleFK_Iddocumento_cuenta_pagar;
		
		
		
		
		$this->id_documento_cuenta_pagarFK_Iddocumento_cuenta_pagar=$imagen_documento_cuenta_pagar_control_session->id_documento_cuenta_pagarFK_Iddocumento_cuenta_pagar;

		
		
		
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
	
	public function getimagen_documento_cuenta_pagarControllerAdditional() {
		return $this->imagen_documento_cuenta_pagarControllerAdditional;
	}

	public function setimagen_documento_cuenta_pagarControllerAdditional($imagen_documento_cuenta_pagarControllerAdditional) {
		$this->imagen_documento_cuenta_pagarControllerAdditional = $imagen_documento_cuenta_pagarControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getimagen_documento_cuenta_pagarActual() : imagen_documento_cuenta_pagar {
		return $this->imagen_documento_cuenta_pagarActual;
	}

	public function setimagen_documento_cuenta_pagarActual(imagen_documento_cuenta_pagar $imagen_documento_cuenta_pagarActual) {
		$this->imagen_documento_cuenta_pagarActual = $imagen_documento_cuenta_pagarActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidimagen_documento_cuenta_pagar() : int {
		return $this->idimagen_documento_cuenta_pagar;
	}

	public function setidimagen_documento_cuenta_pagar(int $idimagen_documento_cuenta_pagar) {
		$this->idimagen_documento_cuenta_pagar = $idimagen_documento_cuenta_pagar;
	}
	
	public function getimagen_documento_cuenta_pagar() : imagen_documento_cuenta_pagar {
		return $this->imagen_documento_cuenta_pagar;
	}

	public function setimagen_documento_cuenta_pagar(imagen_documento_cuenta_pagar $imagen_documento_cuenta_pagar) {
		$this->imagen_documento_cuenta_pagar = $imagen_documento_cuenta_pagar;
	}
		
	public function getimagen_documento_cuenta_pagarLogic() : imagen_documento_cuenta_pagar_logic {		
		return $this->imagen_documento_cuenta_pagarLogic;
	}

	public function setimagen_documento_cuenta_pagarLogic(imagen_documento_cuenta_pagar_logic $imagen_documento_cuenta_pagarLogic) {
		$this->imagen_documento_cuenta_pagarLogic = $imagen_documento_cuenta_pagarLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getimagen_documento_cuenta_pagarsModel() {		
		try {						
			/*imagen_documento_cuenta_pagarsModel.setWrappedData(imagen_documento_cuenta_pagarLogic->getimagen_documento_cuenta_pagars());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->imagen_documento_cuenta_pagarsModel;
	}
	
	public function setimagen_documento_cuenta_pagarsModel($imagen_documento_cuenta_pagarsModel) {
		$this->imagen_documento_cuenta_pagarsModel = $imagen_documento_cuenta_pagarsModel;
	}
	
	public function getimagen_documento_cuenta_pagars() : array {		
		return $this->imagen_documento_cuenta_pagars;
	}
	
	public function setimagen_documento_cuenta_pagars(array $imagen_documento_cuenta_pagars) {
		$this->imagen_documento_cuenta_pagars= $imagen_documento_cuenta_pagars;
	}
	
	public function getimagen_documento_cuenta_pagarsEliminados() : array {		
		return $this->imagen_documento_cuenta_pagarsEliminados;
	}
	
	public function setimagen_documento_cuenta_pagarsEliminados(array $imagen_documento_cuenta_pagarsEliminados) {
		$this->imagen_documento_cuenta_pagarsEliminados= $imagen_documento_cuenta_pagarsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getimagen_documento_cuenta_pagarActualFromListDataModel() {
		try {
			/*$imagen_documento_cuenta_pagarClase= $this->imagen_documento_cuenta_pagarsModel->getRowData();*/
			
			/*return $imagen_documento_cuenta_pagar;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
