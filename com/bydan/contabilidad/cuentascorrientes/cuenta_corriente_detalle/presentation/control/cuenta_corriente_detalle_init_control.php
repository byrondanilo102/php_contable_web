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

namespace com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\presentation\control;

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

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\business\entity\cuenta_corriente_detalle;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/cuenta_corriente_detalle/util/cuenta_corriente_detalle_carga.php');
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\util\cuenta_corriente_detalle_carga;

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\util\cuenta_corriente_detalle_util;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\util\cuenta_corriente_detalle_param_return;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\business\logic\cuenta_corriente_detalle_logic;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\presentation\session\cuenta_corriente_detalle_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;
use com\bydan\contabilidad\contabilidad\ejercicio\business\logic\ejercicio_logic;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_carga;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_util;

use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;
use com\bydan\contabilidad\contabilidad\periodo\business\logic\periodo_logic;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_carga;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_util;

use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\entity\cuenta_corriente;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\logic\cuenta_corriente_logic;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_util;

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

use com\bydan\contabilidad\general\tabla\business\entity\tabla;
use com\bydan\contabilidad\general\tabla\business\logic\tabla_logic;
use com\bydan\contabilidad\general\tabla\util\tabla_carga;
use com\bydan\contabilidad\general\tabla\util\tabla_util;

use com\bydan\contabilidad\general\estado\business\entity\estado;
use com\bydan\contabilidad\general\estado\business\logic\estado_logic;
use com\bydan\contabilidad\general\estado\util\estado_carga;
use com\bydan\contabilidad\general\estado\util\estado_util;

use com\bydan\contabilidad\contabilidad\asiento\business\entity\asiento;
use com\bydan\contabilidad\contabilidad\asiento\business\logic\asiento_logic;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_carga;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;

use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\entity\cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\logic\cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_util;

use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\entity\cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\logic\cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_util;

//REL


use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\util\clasificacion_cheque_carga;
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\util\clasificacion_cheque_util;
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\presentation\session\clasificacion_cheque_session;


/*CARGA ARCHIVOS FRAMEWORK*/
cuenta_corriente_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
cuenta_corriente_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
cuenta_corriente_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
cuenta_corriente_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*cuenta_corriente_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class cuenta_corriente_detalle_init_control extends ControllerBase {	
	
	public $cuenta_corriente_detalleClase=null;	
	public $cuenta_corriente_detallesModel=null;	
	public $cuenta_corriente_detallesListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idcuenta_corriente_detalle=0;	
	public ?int $idcuenta_corriente_detalleActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $cuenta_corriente_detalleLogic=null;
	
	public $cuenta_corriente_detalleActual=null;	
	
	public $cuenta_corriente_detalle=null;
	public $cuenta_corriente_detalles=null;
	public $cuenta_corriente_detallesEliminados=array();
	public $cuenta_corriente_detallesAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $cuenta_corriente_detallesLocal=array();
	public ?array $cuenta_corriente_detallesReporte=null;
	public ?array $cuenta_corriente_detallesSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadcuenta_corriente_detalle='onload';
	public string $strTipoPaginaAuxiliarcuenta_corriente_detalle='none';
	public string $strTipoUsuarioAuxiliarcuenta_corriente_detalle='none';
		
	public $cuenta_corriente_detalleReturnGeneral=null;
	public $cuenta_corriente_detalleParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $cuenta_corriente_detalleModel=null;
	public $cuenta_corriente_detalleControllerAdditional=null;
	
	
	

	public $clasificacionchequeLogic=null;

	public function  getclasificacion_chequeLogic() {
		return $this->clasificacionchequeLogic;
	}

	public function setclasificacion_chequeLogic($clasificacionchequeLogic) {
		$this->clasificacionchequeLogic =$clasificacionchequeLogic;
	}
 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_ejercicio='';
	public string $strMensajeid_periodo='';
	public string $strMensajeid_usuario='';
	public string $strMensajeid_cuenta_corriente='';
	public string $strMensajees_balance_inicial='';
	public string $strMensajees_cheque='';
	public string $strMensajees_deposito='';
	public string $strMensajees_retiro='';
	public string $strMensajenumero_cheque='';
	public string $strMensajefecha_emision='';
	public string $strMensajeid_cliente='';
	public string $strMensajeid_proveedor='';
	public string $strMensajemonto='';
	public string $strMensajedebito='';
	public string $strMensajecredito='';
	public string $strMensajebalance='';
	public string $strMensajefecha_hora='';
	public string $strMensajeid_tabla='';
	public string $strMensajeid_origen='';
	public string $strMensajedescripcion='';
	public string $strMensajeid_estado='';
	public string $strMensajeid_asiento='';
	public string $strMensajeid_cuenta_pagar='';
	public string $strMensajeid_cuenta_cobrar='';
	public string $strMensajetabla_origen='';
	public string $strMensajeorigen_empresa='';
	public string $strMensajemotivo_anulacion='';
	public string $strMensajeorigen_dato='';
	public string $strMensajecomputador_origen='';
	
	
	public string $strVisibleFK_Idasiento='display:table-row';
	public string $strVisibleFK_Idcliente='display:table-row';
	public string $strVisibleFK_Idcuenta_corriente='display:table-row';
	public string $strVisibleFK_Iddocumento_cuenta_cobrar='display:table-row';
	public string $strVisibleFK_Iddocumento_cuenta_pagar='display:table-row';
	public string $strVisibleFK_Idejercicio='display:table-row';
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idestado='display:table-row';
	public string $strVisibleFK_Idperiodo='display:table-row';
	public string $strVisibleFK_Idproveedor='display:table-row';
	public string $strVisibleFK_Idtabla='display:table-row';
	public string $strVisibleFK_Idusuario='display:table-row';

	
	public array $empresasFK=array();

	public function getempresasFK():array {
		return $this->empresasFK;
	}

	public function setempresasFK(array $empresasFK) {
		$this->empresasFK = $empresasFK;
	}

	public int $idempresaDefaultFK=-1;

	public function getIdempresaDefaultFK():int {
		return $this->idempresaDefaultFK;
	}

	public function setIdempresaDefaultFK(int $idempresaDefaultFK) {
		$this->idempresaDefaultFK = $idempresaDefaultFK;
	}

	public array $ejerciciosFK=array();

	public function getejerciciosFK():array {
		return $this->ejerciciosFK;
	}

	public function setejerciciosFK(array $ejerciciosFK) {
		$this->ejerciciosFK = $ejerciciosFK;
	}

	public int $idejercicioDefaultFK=-1;

	public function getIdejercicioDefaultFK():int {
		return $this->idejercicioDefaultFK;
	}

	public function setIdejercicioDefaultFK(int $idejercicioDefaultFK) {
		$this->idejercicioDefaultFK = $idejercicioDefaultFK;
	}

	public array $periodosFK=array();

	public function getperiodosFK():array {
		return $this->periodosFK;
	}

	public function setperiodosFK(array $periodosFK) {
		$this->periodosFK = $periodosFK;
	}

	public int $idperiodoDefaultFK=-1;

	public function getIdperiodoDefaultFK():int {
		return $this->idperiodoDefaultFK;
	}

	public function setIdperiodoDefaultFK(int $idperiodoDefaultFK) {
		$this->idperiodoDefaultFK = $idperiodoDefaultFK;
	}

	public array $usuariosFK=array();

	public function getusuariosFK():array {
		return $this->usuariosFK;
	}

	public function setusuariosFK(array $usuariosFK) {
		$this->usuariosFK = $usuariosFK;
	}

	public int $idusuarioDefaultFK=-1;

	public function getIdusuarioDefaultFK():int {
		return $this->idusuarioDefaultFK;
	}

	public function setIdusuarioDefaultFK(int $idusuarioDefaultFK) {
		$this->idusuarioDefaultFK = $idusuarioDefaultFK;
	}

	public array $cuenta_corrientesFK=array();

	public function getcuenta_corrientesFK():array {
		return $this->cuenta_corrientesFK;
	}

	public function setcuenta_corrientesFK(array $cuenta_corrientesFK) {
		$this->cuenta_corrientesFK = $cuenta_corrientesFK;
	}

	public int $idcuenta_corrienteDefaultFK=-1;

	public function getIdcuenta_corrienteDefaultFK():int {
		return $this->idcuenta_corrienteDefaultFK;
	}

	public function setIdcuenta_corrienteDefaultFK(int $idcuenta_corrienteDefaultFK) {
		$this->idcuenta_corrienteDefaultFK = $idcuenta_corrienteDefaultFK;
	}

	public array $clientesFK=array();

	public function getclientesFK():array {
		return $this->clientesFK;
	}

	public function setclientesFK(array $clientesFK) {
		$this->clientesFK = $clientesFK;
	}

	public int $idclienteDefaultFK=-1;

	public function getIdclienteDefaultFK():int {
		return $this->idclienteDefaultFK;
	}

	public function setIdclienteDefaultFK(int $idclienteDefaultFK) {
		$this->idclienteDefaultFK = $idclienteDefaultFK;
	}

	public array $proveedorsFK=array();

	public function getproveedorsFK():array {
		return $this->proveedorsFK;
	}

	public function setproveedorsFK(array $proveedorsFK) {
		$this->proveedorsFK = $proveedorsFK;
	}

	public int $idproveedorDefaultFK=-1;

	public function getIdproveedorDefaultFK():int {
		return $this->idproveedorDefaultFK;
	}

	public function setIdproveedorDefaultFK(int $idproveedorDefaultFK) {
		$this->idproveedorDefaultFK = $idproveedorDefaultFK;
	}

	public array $tablasFK=array();

	public function gettablasFK():array {
		return $this->tablasFK;
	}

	public function settablasFK(array $tablasFK) {
		$this->tablasFK = $tablasFK;
	}

	public int $idtablaDefaultFK=-1;

	public function getIdtablaDefaultFK():int {
		return $this->idtablaDefaultFK;
	}

	public function setIdtablaDefaultFK(int $idtablaDefaultFK) {
		$this->idtablaDefaultFK = $idtablaDefaultFK;
	}

	public array $estadosFK=array();

	public function getestadosFK():array {
		return $this->estadosFK;
	}

	public function setestadosFK(array $estadosFK) {
		$this->estadosFK = $estadosFK;
	}

	public int $idestadoDefaultFK=-1;

	public function getIdestadoDefaultFK():int {
		return $this->idestadoDefaultFK;
	}

	public function setIdestadoDefaultFK(int $idestadoDefaultFK) {
		$this->idestadoDefaultFK = $idestadoDefaultFK;
	}

	public array $asientosFK=array();

	public function getasientosFK():array {
		return $this->asientosFK;
	}

	public function setasientosFK(array $asientosFK) {
		$this->asientosFK = $asientosFK;
	}

	public int $idasientoDefaultFK=-1;

	public function getIdasientoDefaultFK():int {
		return $this->idasientoDefaultFK;
	}

	public function setIdasientoDefaultFK(int $idasientoDefaultFK) {
		$this->idasientoDefaultFK = $idasientoDefaultFK;
	}

	public array $cuenta_pagarsFK=array();

	public function getcuenta_pagarsFK():array {
		return $this->cuenta_pagarsFK;
	}

	public function setcuenta_pagarsFK(array $cuenta_pagarsFK) {
		$this->cuenta_pagarsFK = $cuenta_pagarsFK;
	}

	public int $idcuenta_pagarDefaultFK=-1;

	public function getIdcuenta_pagarDefaultFK():int {
		return $this->idcuenta_pagarDefaultFK;
	}

	public function setIdcuenta_pagarDefaultFK(int $idcuenta_pagarDefaultFK) {
		$this->idcuenta_pagarDefaultFK = $idcuenta_pagarDefaultFK;
	}

	public array $cuenta_cobrarsFK=array();

	public function getcuenta_cobrarsFK():array {
		return $this->cuenta_cobrarsFK;
	}

	public function setcuenta_cobrarsFK(array $cuenta_cobrarsFK) {
		$this->cuenta_cobrarsFK = $cuenta_cobrarsFK;
	}

	public int $idcuenta_cobrarDefaultFK=-1;

	public function getIdcuenta_cobrarDefaultFK():int {
		return $this->idcuenta_cobrarDefaultFK;
	}

	public function setIdcuenta_cobrarDefaultFK(int $idcuenta_cobrarDefaultFK) {
		$this->idcuenta_cobrarDefaultFK = $idcuenta_cobrarDefaultFK;
	}

	
	
	
	
	
	
	public $strTienePermisosclasificacion_cheque='none';
	
	
	public  $id_asientoFK_Idasiento=null;

	public  $id_clienteFK_Idcliente=null;

	public  $id_cuenta_corrienteFK_Idcuenta_corriente=null;

	public  $id_cuenta_cobrarFK_Iddocumento_cuenta_cobrar=null;

	public  $id_cuenta_pagarFK_Iddocumento_cuenta_pagar=null;

	public  $id_ejercicioFK_Idejercicio=null;

	public  $id_empresaFK_Idempresa=null;

	public  $id_estadoFK_Idestado=null;

	public  $id_periodoFK_Idperiodo=null;

	public  $id_proveedorFK_Idproveedor=null;

	public  $id_tablaFK_Idtabla=null;

	public  $id_usuarioFK_Idusuario=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->cuenta_corriente_detalleLogic==null) {
				$this->cuenta_corriente_detalleLogic=new cuenta_corriente_detalle_logic();
			}
			
		} else {
			if($this->cuenta_corriente_detalleLogic==null) {
				$this->cuenta_corriente_detalleLogic=new cuenta_corriente_detalle_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->cuenta_corriente_detalleClase==null) {
				$this->cuenta_corriente_detalleClase=new cuenta_corriente_detalle();
			}
			
			$this->cuenta_corriente_detalleClase->setId(0);	
				
				
			$this->cuenta_corriente_detalleClase->setid_empresa(-1);	
			$this->cuenta_corriente_detalleClase->setid_ejercicio(-1);	
			$this->cuenta_corriente_detalleClase->setid_periodo(-1);	
			$this->cuenta_corriente_detalleClase->setid_usuario(-1);	
			$this->cuenta_corriente_detalleClase->setid_cuenta_corriente(-1);	
			$this->cuenta_corriente_detalleClase->setes_balance_inicial(false);	
			$this->cuenta_corriente_detalleClase->setes_cheque(false);	
			$this->cuenta_corriente_detalleClase->setes_deposito(false);	
			$this->cuenta_corriente_detalleClase->setes_retiro(false);	
			$this->cuenta_corriente_detalleClase->setnumero_cheque('');	
			$this->cuenta_corriente_detalleClase->setfecha_emision(date('Y-m-d'));	
			$this->cuenta_corriente_detalleClase->setid_cliente(null);	
			$this->cuenta_corriente_detalleClase->setid_proveedor(null);	
			$this->cuenta_corriente_detalleClase->setmonto(0.0);	
			$this->cuenta_corriente_detalleClase->setdebito(0.0);	
			$this->cuenta_corriente_detalleClase->setcredito(0.0);	
			$this->cuenta_corriente_detalleClase->setbalance(0.0);	
			$this->cuenta_corriente_detalleClase->setfecha_hora(date('Y-m-d'));	
			$this->cuenta_corriente_detalleClase->setid_tabla(-1);	
			$this->cuenta_corriente_detalleClase->setid_origen(0);	
			$this->cuenta_corriente_detalleClase->setdescripcion('');	
			$this->cuenta_corriente_detalleClase->setid_estado(-1);	
			$this->cuenta_corriente_detalleClase->setid_asiento(null);	
			$this->cuenta_corriente_detalleClase->setid_cuenta_pagar(null);	
			$this->cuenta_corriente_detalleClase->setid_cuenta_cobrar(null);	
			$this->cuenta_corriente_detalleClase->settabla_origen('');	
			$this->cuenta_corriente_detalleClase->setorigen_empresa('');	
			$this->cuenta_corriente_detalleClase->setmotivo_anulacion('');	
			$this->cuenta_corriente_detalleClase->setorigen_dato('');	
			$this->cuenta_corriente_detalleClase->setcomputador_origen('');	
			
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
		$this->prepararEjecutarMantenimientoBase('cuenta_corriente_detalle');
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
		$this->cargarParametrosReporteBase('cuenta_corriente_detalle');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('cuenta_corriente_detalle');
	}
	
	public function actualizarControllerConReturnGeneral(cuenta_corriente_detalle_param_return $cuenta_corriente_detalleReturnGeneral) {
		if($cuenta_corriente_detalleReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajescuenta_corriente_detallesAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$cuenta_corriente_detalleReturnGeneral->getsMensajeProceso();
		}
		
		if($cuenta_corriente_detalleReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$cuenta_corriente_detalleReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($cuenta_corriente_detalleReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$cuenta_corriente_detalleReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$cuenta_corriente_detalleReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($cuenta_corriente_detalleReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($cuenta_corriente_detalleReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$cuenta_corriente_detalleReturnGeneral->getsFuncionJs();
		}
		
		if($cuenta_corriente_detalleReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(cuenta_corriente_detalle_session $cuenta_corriente_detalle_session){
		$this->strStyleDivArbol=$cuenta_corriente_detalle_session->strStyleDivArbol;	
		$this->strStyleDivContent=$cuenta_corriente_detalle_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$cuenta_corriente_detalle_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$cuenta_corriente_detalle_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$cuenta_corriente_detalle_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$cuenta_corriente_detalle_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$cuenta_corriente_detalle_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(cuenta_corriente_detalle_session $cuenta_corriente_detalle_session){
		$cuenta_corriente_detalle_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$cuenta_corriente_detalle_session->strStyleDivHeader='display:none';			
		$cuenta_corriente_detalle_session->strStyleDivContent='width:93%;height:100%';	
		$cuenta_corriente_detalle_session->strStyleDivOpcionesBanner='display:none';	
		$cuenta_corriente_detalle_session->strStyleDivExpandirColapsar='display:none';	
		$cuenta_corriente_detalle_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(cuenta_corriente_detalle_control $cuenta_corriente_detalle_control_session){
		$this->idNuevo=$cuenta_corriente_detalle_control_session->idNuevo;
		$this->cuenta_corriente_detalleActual=$cuenta_corriente_detalle_control_session->cuenta_corriente_detalleActual;
		$this->cuenta_corriente_detalle=$cuenta_corriente_detalle_control_session->cuenta_corriente_detalle;
		$this->cuenta_corriente_detalleClase=$cuenta_corriente_detalle_control_session->cuenta_corriente_detalleClase;
		$this->cuenta_corriente_detalles=$cuenta_corriente_detalle_control_session->cuenta_corriente_detalles;
		$this->cuenta_corriente_detallesEliminados=$cuenta_corriente_detalle_control_session->cuenta_corriente_detallesEliminados;
		$this->cuenta_corriente_detalle=$cuenta_corriente_detalle_control_session->cuenta_corriente_detalle;
		$this->cuenta_corriente_detallesReporte=$cuenta_corriente_detalle_control_session->cuenta_corriente_detallesReporte;
		$this->cuenta_corriente_detallesSeleccionados=$cuenta_corriente_detalle_control_session->cuenta_corriente_detallesSeleccionados;
		$this->arrOrderBy=$cuenta_corriente_detalle_control_session->arrOrderBy;
		$this->arrOrderByRel=$cuenta_corriente_detalle_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$cuenta_corriente_detalle_control_session->arrHistoryWebs;
		$this->arrSessionBases=$cuenta_corriente_detalle_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadcuenta_corriente_detalle=$cuenta_corriente_detalle_control_session->strTypeOnLoadcuenta_corriente_detalle;
		$this->strTipoPaginaAuxiliarcuenta_corriente_detalle=$cuenta_corriente_detalle_control_session->strTipoPaginaAuxiliarcuenta_corriente_detalle;
		$this->strTipoUsuarioAuxiliarcuenta_corriente_detalle=$cuenta_corriente_detalle_control_session->strTipoUsuarioAuxiliarcuenta_corriente_detalle;	
		
		$this->bitEsPopup=$cuenta_corriente_detalle_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$cuenta_corriente_detalle_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$cuenta_corriente_detalle_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$cuenta_corriente_detalle_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$cuenta_corriente_detalle_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$cuenta_corriente_detalle_control_session->strSufijo;
		$this->bitEsRelaciones=$cuenta_corriente_detalle_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$cuenta_corriente_detalle_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$cuenta_corriente_detalle_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$cuenta_corriente_detalle_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$cuenta_corriente_detalle_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$cuenta_corriente_detalle_control_session->strTituloTabla;
		$this->strTituloPathPagina=$cuenta_corriente_detalle_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$cuenta_corriente_detalle_control_session->strTituloPathElementoActual;
		
		if($this->cuenta_corriente_detalleLogic==null) {			
			$this->cuenta_corriente_detalleLogic=new cuenta_corriente_detalle_logic();
		}
		
		
		if($this->cuenta_corriente_detalleClase==null) {
			$this->cuenta_corriente_detalleClase=new cuenta_corriente_detalle();	
		}
		
		$this->cuenta_corriente_detalleLogic->setcuenta_corriente_detalle($this->cuenta_corriente_detalleClase);
		
		
		if($this->cuenta_corriente_detalles==null) {
			$this->cuenta_corriente_detalles=array();	
		}
		
		$this->cuenta_corriente_detalleLogic->setcuenta_corriente_detalles($this->cuenta_corriente_detalles);
		
		
		$this->strTipoView=$cuenta_corriente_detalle_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$cuenta_corriente_detalle_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$cuenta_corriente_detalle_control_session->datosCliente;
		$this->strAccionBusqueda=$cuenta_corriente_detalle_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$cuenta_corriente_detalle_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$cuenta_corriente_detalle_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$cuenta_corriente_detalle_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$cuenta_corriente_detalle_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$cuenta_corriente_detalle_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$cuenta_corriente_detalle_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$cuenta_corriente_detalle_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$cuenta_corriente_detalle_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$cuenta_corriente_detalle_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$cuenta_corriente_detalle_control_session->strTipoPaginacion;
		$this->strTipoAccion=$cuenta_corriente_detalle_control_session->strTipoAccion;
		$this->tiposReportes=$cuenta_corriente_detalle_control_session->tiposReportes;
		$this->tiposReporte=$cuenta_corriente_detalle_control_session->tiposReporte;
		$this->tiposAcciones=$cuenta_corriente_detalle_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$cuenta_corriente_detalle_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$cuenta_corriente_detalle_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$cuenta_corriente_detalle_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$cuenta_corriente_detalle_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$cuenta_corriente_detalle_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$cuenta_corriente_detalle_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$cuenta_corriente_detalle_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$cuenta_corriente_detalle_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$cuenta_corriente_detalle_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$cuenta_corriente_detalle_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$cuenta_corriente_detalle_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$cuenta_corriente_detalle_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$cuenta_corriente_detalle_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$cuenta_corriente_detalle_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$cuenta_corriente_detalle_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$cuenta_corriente_detalle_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$cuenta_corriente_detalle_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$cuenta_corriente_detalle_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$cuenta_corriente_detalle_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$cuenta_corriente_detalle_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$cuenta_corriente_detalle_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$cuenta_corriente_detalle_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$cuenta_corriente_detalle_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$cuenta_corriente_detalle_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$cuenta_corriente_detalle_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$cuenta_corriente_detalle_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$cuenta_corriente_detalle_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$cuenta_corriente_detalle_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$cuenta_corriente_detalle_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$cuenta_corriente_detalle_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$cuenta_corriente_detalle_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$cuenta_corriente_detalle_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$cuenta_corriente_detalle_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$cuenta_corriente_detalle_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$cuenta_corriente_detalle_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$cuenta_corriente_detalle_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$cuenta_corriente_detalle_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$cuenta_corriente_detalle_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$cuenta_corriente_detalle_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$cuenta_corriente_detalle_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$cuenta_corriente_detalle_control_session->resumenUsuarioActual;	
		$this->moduloActual=$cuenta_corriente_detalle_control_session->moduloActual;	
		$this->opcionActual=$cuenta_corriente_detalle_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$cuenta_corriente_detalle_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$cuenta_corriente_detalle_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$cuenta_corriente_detalle_session=unserialize($this->Session->read(cuenta_corriente_detalle_util::$STR_SESSION_NAME));
				
		if($cuenta_corriente_detalle_session==null) {
			$cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();
		}
		
		$this->strStyleDivArbol=$cuenta_corriente_detalle_session->strStyleDivArbol;	
		$this->strStyleDivContent=$cuenta_corriente_detalle_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$cuenta_corriente_detalle_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$cuenta_corriente_detalle_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$cuenta_corriente_detalle_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$cuenta_corriente_detalle_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$cuenta_corriente_detalle_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$cuenta_corriente_detalle_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$cuenta_corriente_detalle_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$cuenta_corriente_detalle_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$cuenta_corriente_detalle_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$cuenta_corriente_detalle_control_session->strMensajeid_empresa;
		$this->strMensajeid_ejercicio=$cuenta_corriente_detalle_control_session->strMensajeid_ejercicio;
		$this->strMensajeid_periodo=$cuenta_corriente_detalle_control_session->strMensajeid_periodo;
		$this->strMensajeid_usuario=$cuenta_corriente_detalle_control_session->strMensajeid_usuario;
		$this->strMensajeid_cuenta_corriente=$cuenta_corriente_detalle_control_session->strMensajeid_cuenta_corriente;
		$this->strMensajees_balance_inicial=$cuenta_corriente_detalle_control_session->strMensajees_balance_inicial;
		$this->strMensajees_cheque=$cuenta_corriente_detalle_control_session->strMensajees_cheque;
		$this->strMensajees_deposito=$cuenta_corriente_detalle_control_session->strMensajees_deposito;
		$this->strMensajees_retiro=$cuenta_corriente_detalle_control_session->strMensajees_retiro;
		$this->strMensajenumero_cheque=$cuenta_corriente_detalle_control_session->strMensajenumero_cheque;
		$this->strMensajefecha_emision=$cuenta_corriente_detalle_control_session->strMensajefecha_emision;
		$this->strMensajeid_cliente=$cuenta_corriente_detalle_control_session->strMensajeid_cliente;
		$this->strMensajeid_proveedor=$cuenta_corriente_detalle_control_session->strMensajeid_proveedor;
		$this->strMensajemonto=$cuenta_corriente_detalle_control_session->strMensajemonto;
		$this->strMensajedebito=$cuenta_corriente_detalle_control_session->strMensajedebito;
		$this->strMensajecredito=$cuenta_corriente_detalle_control_session->strMensajecredito;
		$this->strMensajebalance=$cuenta_corriente_detalle_control_session->strMensajebalance;
		$this->strMensajefecha_hora=$cuenta_corriente_detalle_control_session->strMensajefecha_hora;
		$this->strMensajeid_tabla=$cuenta_corriente_detalle_control_session->strMensajeid_tabla;
		$this->strMensajeid_origen=$cuenta_corriente_detalle_control_session->strMensajeid_origen;
		$this->strMensajedescripcion=$cuenta_corriente_detalle_control_session->strMensajedescripcion;
		$this->strMensajeid_estado=$cuenta_corriente_detalle_control_session->strMensajeid_estado;
		$this->strMensajeid_asiento=$cuenta_corriente_detalle_control_session->strMensajeid_asiento;
		$this->strMensajeid_cuenta_pagar=$cuenta_corriente_detalle_control_session->strMensajeid_cuenta_pagar;
		$this->strMensajeid_cuenta_cobrar=$cuenta_corriente_detalle_control_session->strMensajeid_cuenta_cobrar;
		$this->strMensajetabla_origen=$cuenta_corriente_detalle_control_session->strMensajetabla_origen;
		$this->strMensajeorigen_empresa=$cuenta_corriente_detalle_control_session->strMensajeorigen_empresa;
		$this->strMensajemotivo_anulacion=$cuenta_corriente_detalle_control_session->strMensajemotivo_anulacion;
		$this->strMensajeorigen_dato=$cuenta_corriente_detalle_control_session->strMensajeorigen_dato;
		$this->strMensajecomputador_origen=$cuenta_corriente_detalle_control_session->strMensajecomputador_origen;
			
		
		$this->empresasFK=$cuenta_corriente_detalle_control_session->empresasFK;
		$this->idempresaDefaultFK=$cuenta_corriente_detalle_control_session->idempresaDefaultFK;
		$this->ejerciciosFK=$cuenta_corriente_detalle_control_session->ejerciciosFK;
		$this->idejercicioDefaultFK=$cuenta_corriente_detalle_control_session->idejercicioDefaultFK;
		$this->periodosFK=$cuenta_corriente_detalle_control_session->periodosFK;
		$this->idperiodoDefaultFK=$cuenta_corriente_detalle_control_session->idperiodoDefaultFK;
		$this->usuariosFK=$cuenta_corriente_detalle_control_session->usuariosFK;
		$this->idusuarioDefaultFK=$cuenta_corriente_detalle_control_session->idusuarioDefaultFK;
		$this->cuenta_corrientesFK=$cuenta_corriente_detalle_control_session->cuenta_corrientesFK;
		$this->idcuenta_corrienteDefaultFK=$cuenta_corriente_detalle_control_session->idcuenta_corrienteDefaultFK;
		$this->clientesFK=$cuenta_corriente_detalle_control_session->clientesFK;
		$this->idclienteDefaultFK=$cuenta_corriente_detalle_control_session->idclienteDefaultFK;
		$this->proveedorsFK=$cuenta_corriente_detalle_control_session->proveedorsFK;
		$this->idproveedorDefaultFK=$cuenta_corriente_detalle_control_session->idproveedorDefaultFK;
		$this->tablasFK=$cuenta_corriente_detalle_control_session->tablasFK;
		$this->idtablaDefaultFK=$cuenta_corriente_detalle_control_session->idtablaDefaultFK;
		$this->estadosFK=$cuenta_corriente_detalle_control_session->estadosFK;
		$this->idestadoDefaultFK=$cuenta_corriente_detalle_control_session->idestadoDefaultFK;
		$this->asientosFK=$cuenta_corriente_detalle_control_session->asientosFK;
		$this->idasientoDefaultFK=$cuenta_corriente_detalle_control_session->idasientoDefaultFK;
		$this->cuenta_pagarsFK=$cuenta_corriente_detalle_control_session->cuenta_pagarsFK;
		$this->idcuenta_pagarDefaultFK=$cuenta_corriente_detalle_control_session->idcuenta_pagarDefaultFK;
		$this->cuenta_cobrarsFK=$cuenta_corriente_detalle_control_session->cuenta_cobrarsFK;
		$this->idcuenta_cobrarDefaultFK=$cuenta_corriente_detalle_control_session->idcuenta_cobrarDefaultFK;
		
		
		$this->strVisibleFK_Idasiento=$cuenta_corriente_detalle_control_session->strVisibleFK_Idasiento;
		$this->strVisibleFK_Idcliente=$cuenta_corriente_detalle_control_session->strVisibleFK_Idcliente;
		$this->strVisibleFK_Idcuenta_corriente=$cuenta_corriente_detalle_control_session->strVisibleFK_Idcuenta_corriente;
		$this->strVisibleFK_Iddocumento_cuenta_cobrar=$cuenta_corriente_detalle_control_session->strVisibleFK_Iddocumento_cuenta_cobrar;
		$this->strVisibleFK_Iddocumento_cuenta_pagar=$cuenta_corriente_detalle_control_session->strVisibleFK_Iddocumento_cuenta_pagar;
		$this->strVisibleFK_Idejercicio=$cuenta_corriente_detalle_control_session->strVisibleFK_Idejercicio;
		$this->strVisibleFK_Idempresa=$cuenta_corriente_detalle_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idestado=$cuenta_corriente_detalle_control_session->strVisibleFK_Idestado;
		$this->strVisibleFK_Idperiodo=$cuenta_corriente_detalle_control_session->strVisibleFK_Idperiodo;
		$this->strVisibleFK_Idproveedor=$cuenta_corriente_detalle_control_session->strVisibleFK_Idproveedor;
		$this->strVisibleFK_Idtabla=$cuenta_corriente_detalle_control_session->strVisibleFK_Idtabla;
		$this->strVisibleFK_Idusuario=$cuenta_corriente_detalle_control_session->strVisibleFK_Idusuario;
		
		
		$this->strTienePermisosclasificacion_cheque=$cuenta_corriente_detalle_control_session->strTienePermisosclasificacion_cheque;
		
		
		$this->id_asientoFK_Idasiento=$cuenta_corriente_detalle_control_session->id_asientoFK_Idasiento;
		$this->id_clienteFK_Idcliente=$cuenta_corriente_detalle_control_session->id_clienteFK_Idcliente;
		$this->id_cuenta_corrienteFK_Idcuenta_corriente=$cuenta_corriente_detalle_control_session->id_cuenta_corrienteFK_Idcuenta_corriente;
		$this->id_cuenta_cobrarFK_Iddocumento_cuenta_cobrar=$cuenta_corriente_detalle_control_session->id_cuenta_cobrarFK_Iddocumento_cuenta_cobrar;
		$this->id_cuenta_pagarFK_Iddocumento_cuenta_pagar=$cuenta_corriente_detalle_control_session->id_cuenta_pagarFK_Iddocumento_cuenta_pagar;
		$this->id_ejercicioFK_Idejercicio=$cuenta_corriente_detalle_control_session->id_ejercicioFK_Idejercicio;
		$this->id_empresaFK_Idempresa=$cuenta_corriente_detalle_control_session->id_empresaFK_Idempresa;
		$this->id_estadoFK_Idestado=$cuenta_corriente_detalle_control_session->id_estadoFK_Idestado;
		$this->id_periodoFK_Idperiodo=$cuenta_corriente_detalle_control_session->id_periodoFK_Idperiodo;
		$this->id_proveedorFK_Idproveedor=$cuenta_corriente_detalle_control_session->id_proveedorFK_Idproveedor;
		$this->id_tablaFK_Idtabla=$cuenta_corriente_detalle_control_session->id_tablaFK_Idtabla;
		$this->id_usuarioFK_Idusuario=$cuenta_corriente_detalle_control_session->id_usuarioFK_Idusuario;

		
		
		
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
	
	public function getcuenta_corriente_detalleControllerAdditional() {
		return $this->cuenta_corriente_detalleControllerAdditional;
	}

	public function setcuenta_corriente_detalleControllerAdditional($cuenta_corriente_detalleControllerAdditional) {
		$this->cuenta_corriente_detalleControllerAdditional = $cuenta_corriente_detalleControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getcuenta_corriente_detalleActual() : cuenta_corriente_detalle {
		return $this->cuenta_corriente_detalleActual;
	}

	public function setcuenta_corriente_detalleActual(cuenta_corriente_detalle $cuenta_corriente_detalleActual) {
		$this->cuenta_corriente_detalleActual = $cuenta_corriente_detalleActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidcuenta_corriente_detalle() : int {
		return $this->idcuenta_corriente_detalle;
	}

	public function setidcuenta_corriente_detalle(int $idcuenta_corriente_detalle) {
		$this->idcuenta_corriente_detalle = $idcuenta_corriente_detalle;
	}
	
	public function getcuenta_corriente_detalle() : cuenta_corriente_detalle {
		return $this->cuenta_corriente_detalle;
	}

	public function setcuenta_corriente_detalle(cuenta_corriente_detalle $cuenta_corriente_detalle) {
		$this->cuenta_corriente_detalle = $cuenta_corriente_detalle;
	}
		
	public function getcuenta_corriente_detalleLogic() : cuenta_corriente_detalle_logic {		
		return $this->cuenta_corriente_detalleLogic;
	}

	public function setcuenta_corriente_detalleLogic(cuenta_corriente_detalle_logic $cuenta_corriente_detalleLogic) {
		$this->cuenta_corriente_detalleLogic = $cuenta_corriente_detalleLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getcuenta_corriente_detallesModel() {		
		try {						
			/*cuenta_corriente_detallesModel.setWrappedData(cuenta_corriente_detalleLogic->getcuenta_corriente_detalles());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->cuenta_corriente_detallesModel;
	}
	
	public function setcuenta_corriente_detallesModel($cuenta_corriente_detallesModel) {
		$this->cuenta_corriente_detallesModel = $cuenta_corriente_detallesModel;
	}
	
	public function getcuenta_corriente_detalles() : array {		
		return $this->cuenta_corriente_detalles;
	}
	
	public function setcuenta_corriente_detalles(array $cuenta_corriente_detalles) {
		$this->cuenta_corriente_detalles= $cuenta_corriente_detalles;
	}
	
	public function getcuenta_corriente_detallesEliminados() : array {		
		return $this->cuenta_corriente_detallesEliminados;
	}
	
	public function setcuenta_corriente_detallesEliminados(array $cuenta_corriente_detallesEliminados) {
		$this->cuenta_corriente_detallesEliminados= $cuenta_corriente_detallesEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getcuenta_corriente_detalleActualFromListDataModel() {
		try {
			/*$cuenta_corriente_detalleClase= $this->cuenta_corriente_detallesModel->getRowData();*/
			
			/*return $cuenta_corriente_detalle;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
