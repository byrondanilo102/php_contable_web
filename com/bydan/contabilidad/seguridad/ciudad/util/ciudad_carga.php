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

namespace com\bydan\contabilidad\seguridad\ciudad\util;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\PaqueteTipo;

//FK

use com\bydan\contabilidad\seguridad\provincia\util\provincia_carga;

//REL

use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;//1-M,M-M
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;//1-M,M-M
use com\bydan\contabilidad\general\sucursal\util\sucursal_carga;//1-M,M-M
use com\bydan\contabilidad\general\empresa\util\empresa_carga;//1-M,M-M

//SEGURIDAD GENERAL

use com\bydan\contabilidad\seguridad\perfil\util\perfil_carga;
use com\bydan\contabilidad\seguridad\perfil_usuario\util\perfil_usuario_carga;
use com\bydan\contabilidad\seguridad\perfil_opcion\util\perfil_opcion_carga;
use com\bydan\contabilidad\seguridad\accion\util\accion_carga;
use com\bydan\contabilidad\seguridad\perfil_accion\util\perfil_accion_carga;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;

use com\bydan\contabilidad\seguridad\resumen_usuario\util\resumen_usuario_carga;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\util\parametro_general_usuario_carga;
use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_carga;
use com\bydan\contabilidad\seguridad\parametro_general_sg\util\parametro_general_sg_carga;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_carga;
use com\bydan\contabilidad\seguridad\opcion\util\opcion_carga;
use com\bydan\contabilidad\seguridad\sistema\util\sistema_carga;
use com\bydan\contabilidad\seguridad\auditoria\util\auditoria_carga;
use com\bydan\contabilidad\seguridad\historial_cambio_clave\util\historial_cambio_clave_carga;


class ciudad_carga {
		
	function __construct() {			
	
    } 
	
	/*PARAMETROS*/
	public static bool $DATA_ACCESS=false;
	public static bool $ENTITIES=false;
	public static bool $INTERFACE=false;
	public static bool $LOGIC=false;
	public static bool $CONSTANTES_FUNCIONES=false;
	public static bool $CONTROLLER=false;
	public static bool $WEB=false;
	public static bool $WEB_SESSION=false;
	public static bool $REPORTE=false;
		
	public static function cargarArchivosFrameworkBase(string $paqueteTipo='CONTROLLER') {
		Funciones::cargarArchivosFrameworkBase($paqueteTipo);
	}
	
	/*GENERAL*/
	public static function cargarArchivosPaquetesBase(string $paqueteTipo='CONTROLLER') {
		
		if($paqueteTipo==PaqueteTipo::$CONTROLLER || $paqueteTipo==PaqueteTipo::$LOGIC) {
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/ciudad/util/ciudad_util.php');			
			
			
			/*include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/ciudad/util/ciudadParameterGeneral.php');*/
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/ciudad/util/ciudad_param_return.php');
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/ciudad/business/entity/ciudad.php');						
			/*include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/ciudad/business/entity/ciudadForeignKey.php');*/
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/ciudad/business/data/ciudad_dataI.php');
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/ciudad/business/data/ciudad_data.php');
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/ciudad/business/logic/ciudad_logicI.php');
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/ciudad/business/logic/ciudad_logic.php');
		}
		
		if($paqueteTipo==PaqueteTipo::$CONTROLLER) {
			
			
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/ciudad/presentation/session/ciudad_session.php');
						
			/*SEGURIDAD*/
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/perfil_usuario/util/perfil_usuario_carga.php');
			perfil_usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/perfil_opcion/util/perfil_opcion_carga.php');
			perfil_opcion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/accion/util/accion_carga.php');
			accion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/perfil_accion/util/perfil_accion_carga.php');
			perfil_accion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/usuario/util/usuario_carga.php');
			usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);
			/*ENTITIES*/
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/resumen_usuario/util/resumen_usuario_carga.php');
			resumen_usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/parametro_general_usuario/util/parametro_general_usuario_carga.php');
			parametro_general_usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$ENTITIES);
			parametro_general_usuario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/parametro_general_sg/util/parametro_general_sg_carga.php');
			parametro_general_sg_carga::cargarArchivosPaquetesBase(PaqueteTipo::$ENTITIES);
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/resumen_usuario/util/resumen_usuario_carga.php');
			resumen_usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$ENTITIES);
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/modulo/util/modulo_carga.php');
			modulo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$ENTITIES);
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/opcion/util/opcion_carga.php');
			opcion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$ENTITIES);
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/sistema/util/sistema_carga.php');
			sistema_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);
			sistema_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/opcion/util/opcion_carga.php');
			opcion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);
			/*SEGURIDAD_FIN*/
			
		} else if($paqueteTipo==PaqueteTipo::$ENTITIES) {
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/ciudad/business/entity/ciudad.php');
		
		} else if($paqueteTipo==PaqueteTipo::$CONSTANTES_FUNCIONES) {
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/ciudad/util/ciudad_util.php');
			
						
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/ciudad/util/ciudad_param_return.php');
			
		} else if($paqueteTipo==PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS) {
			
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/ciudad/util/ciudad_util.php');		
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/ciudad/business/entity/ciudad.php');
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/ciudad/business/data/ciudad_dataI.php');
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/ciudad/business/data/ciudad_data.php');
			
		
		} else if($paqueteTipo==PaqueteTipo::$ENTITIES.PaqueteTipo::$WEB_SESSION) {

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/ciudad/util/ciudad_util.php');
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/ciudad/business/entity/ciudad.php');
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/ciudad/presentation/session/ciudad_session.php');		
		
		} else if($paqueteTipo==PaqueteTipo::$WEB) {
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/ciudad/presentation/view/ciudad_web.php');
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/parametro_general_usuario/business/entity/parametro_general_usuario.php');
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/modulo/business/entity/modulo.php');
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/usuario/business/entity/usuario.php');
		}
		
		Funciones::cargarArchivosPaquetesBase($paqueteTipo);
	}
	
	/*AUXILIAR*/
	public static function cargarArchivosPaquetes(array $arrPaquetesTipos=array()) {
		
		if(!Constantes::$BIT_CONCARGA_INICIAL) {
			
			foreach($arrPaquetesTipos as $sPaqueteTipo) {
				
				if($sPaqueteTipo==PaqueteTipo::$ENTITIES) {
					if((!ciudad_carga::$ENTITIES && Constantes::$CON_CONTROL_CARGAR) || !Constantes::$CON_CONTROL_CARGAR) {
						include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/ciudad/business/entity/ciudad.php');				
						ciudad_carga::$ENTITIES=true;
						continue;
					}    			    			
				} else if($sPaqueteTipo==PaqueteTipo::$DATA_ACCESS) {
					if((!ciudad_carga::$DATA_ACCESS && Constantes::$CON_CONTROL_CARGAR) || !Constantes::$CON_CONTROL_CARGAR) {
						include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/ciudad/business/data/ciudad_dataI.php');
						include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/ciudad/business/data/ciudad_data.php');
						ciudad_carga::$DATA_ACCESS=true;
						continue;
					}    			
				} else if($sPaqueteTipo==PaqueteTipo::$INTERFACE) {
					if((!ciudad_carga::$INTERFACE && Constantes::$CON_CONTROL_CARGAR) || !Constantes::$CON_CONTROL_CARGAR) {
						continue;
					}    			
				} else if($sPaqueteTipo==PaqueteTipo::$LOGIC) {
					if((!ciudad_carga::$LOGIC && Constantes::$CON_CONTROL_CARGAR) || !Constantes::$CON_CONTROL_CARGAR) {
						include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/ciudad/business/logic/ciudad_logic.php');
						ciudad_carga::$LOGIC=true;
						continue;
					}
				} else if($sPaqueteTipo==PaqueteTipo::$CONSTANTES_FUNCIONES) {
					if((!ciudad_carga::$CONSTANTES_FUNCIONES && Constantes::$CON_CONTROL_CARGAR) || !Constantes::$CON_CONTROL_CARGAR) {
						include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/ciudad/util/ciudad_util.php');
						ciudad_carga::$CONSTANTES_FUNCIONES=true;
						continue;
					}
				} else if($sPaqueteTipo==PaqueteTipo::$CONTROLLER) {
					/* && Constantes::$CON_CONTROL_CARGAR
					Es Raiz de todo
					*/
					continue;
					
				} else if($sPaqueteTipo==PaqueteTipo::$REPORTE) {
					/* && Constantes::$CON_CONTROL_CARGAR
					Esta en controller
					*/
					continue;
					
				} else if($sPaqueteTipo==PaqueteTipo::$WEB) {
					/* && Constantes::$CON_CONTROL_CARGAR
					Esta en controller y es Html
					*/
					continue;
					
				} else if($sPaqueteTipo==PaqueteTipo::$WEB_SESSION) {
					if((!ciudad_carga::$WEB_SESSION && Constantes::$CON_CONTROL_CARGAR) || !Constantes::$CON_CONTROL_CARGAR) {
						include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/ciudad/presentation/session/ciudad_session.php');
						ciudad_carga::$WEB_SESSION=true;
						continue;
					}
				}
			}
		}
		
		Funciones::cargarArchivosPaquetes($arrPaquetesTipos);
	}
	
	/*FKs*/
	public static function cargarArchivosPaquetesForeignKeys(string $paqueteTipo='LOGIC') {
		

		include_once('com/bydan/contabilidad/seguridad/provincia/util/provincia_carga.php');
		provincia_carga::cargarArchivosPaquetesBase($paqueteTipo);
		
		Funciones::cargarArchivosPaquetesForeignKeys($paqueteTipo);
		
	}
	
	/*RELACIONES*/
	public static function cargarArchivosPaquetesRelaciones(string $paqueteTipo='LOGIC') {
		
		include_once('com/bydan/contabilidad/cuentaspagar/proveedor/util/proveedor_carga.php');
		proveedor_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/cuentaspagar/proveedor/presentation/session/proveedor_session.php');
		//use com\bydan\contabilidad\cuentaspagar\proveedor\presentation\session\proveedor_session;

		include_once('com/bydan/contabilidad/cuentascobrar/cliente/util/cliente_carga.php');
		cliente_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/cuentascobrar/cliente/presentation/session/cliente_session.php');
		//use com\bydan\contabilidad\cuentascobrar\cliente\presentation\session\cliente_session;

		include_once('com/bydan/contabilidad/seguridad/dato_general_usuario/util/dato_general_usuario_carga.php');
		dato_general_usuario_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/seguridad/dato_general_usuario/presentation/session/dato_general_usuario_session.php');
		//use com\bydan\contabilidad\seguridad\dato_general_usuario\presentation\session\dato_general_usuario_session;

		include_once('com/bydan/contabilidad/general/sucursal/util/sucursal_carga.php');
		sucursal_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/general/sucursal/presentation/session/sucursal_session.php');
		//use com\bydan\contabilidad\general\sucursal\presentation\session\sucursal_session;

		include_once('com/bydan/contabilidad/general/empresa/util/empresa_carga.php');
		empresa_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/general/empresa/presentation/session/empresa_session.php');
		//use com\bydan\contabilidad\general\empresa\presentation\session\empresa_session;

		
		Funciones::cargarArchivosPaquetesRelaciones($paqueteTipo);
	}
	
	/*
	interface ciudad_carga {
		public static function cargarArchivosFrameworkBase(string $paqueteTipo='CONTROLLER');
		public static function cargarArchivosPaquetesBase(string $paqueteTipo='CONTROLLER');
		public static function cargarArchivosPaquetes(array $arrPaquetesTipos=array());
		public static function cargarArchivosPaquetesForeignKeys(string $paqueteTipo='LOGIC');
		public static function cargarArchivosPaquetesRelaciones(string $paqueteTipo='LOGIC');
	}
	*/
}
?>
