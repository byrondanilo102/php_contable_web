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

namespace com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\business\entity\giro_negocio_cliente;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK


//REL

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

class giro_negocio_cliente_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='giro_negocio_cliente';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='cuentas_cobrar.giro_negocio_clientes';
	/*'Mantenimientogiro_negocio_cliente.jsf';*/
	public static string $STR_MODULO_OPCION='cuentascobrar';
	public static string $STR_NOMBRE_CLASE='Mantenimientogiro_negocio_cliente.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='giro_negocio_clientePersistenceName';
	/*.giro_negocio_cliente_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='giro_negocio_cliente_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='giro_negocio_cliente_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='giro_negocio_cliente_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Giro Negocioes';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='es';
	public static string $STR_CLASS_WEB_TITULO='Giro Negocio';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $CUENTASCOBRAR='cuentascobrar';
	public static string $STR_PREFIJO_TABLE='cc_';
	public static string $STR_TABLE_NAME='giro_negocio_cliente';
	public static string $GIRO_NEGOCIO_CLIENTE='cc_giro_negocio_cliente';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.giro_negocio_cliente';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.predeterminado from '.giro_negocio_cliente_util::$SCHEMA.'.'.giro_negocio_cliente_util::$TABLENAME;*/
	
	/*PARAMETROS
	AUDITORIA*/
	public static bool $BIT_CON_AUDITORIA=false;	
	public static bool $BIT_CON_AUDITORIA_DETALLE=true;	
	
	/*WEB PAGINA FORMULARIO*/
	public static bool $CON_PAGINA_FORM=true;		
	
	/*GLOBAL*/
	public static string $ID='id';
	public static string $VERSIONROW='updated_at';
	
	/*AUXILIAR*/
	//public $giro_negocio_clienteConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $NOMBRE='nombre';
    public static string $PREDETERMINADO='predeterminado';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_NOMBRE='Nombre';
    public static string $LABEL_PREDETERMINADO='Predeterminado';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->giro_negocio_clienteConstantesFuncionesAdditional=new $giro_negocio_clienteConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $giro_negocio_clientes,int $iIdNuevogiro_negocio_cliente) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($giro_negocio_clientes as $giro_negocio_clienteAux) {
			if($giro_negocio_clienteAux->getId()==$iIdNuevogiro_negocio_cliente) {
				$existe=true;
				break;
			}
				
			$iIndice++;
		}

		if(!$existe) {
			/*SI NO EXISTE TOMA LA ULTIMA FILA*/
			$iIndice=$iIndice-1;
		}
		
		return $iIndice;
	}
	
	public static function getIndiceActual(array $giro_negocio_clientes,giro_negocio_cliente $giro_negocio_cliente,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($giro_negocio_clientes as $giro_negocio_clienteAux) {
			if($giro_negocio_clienteAux->getId()==$giro_negocio_cliente->getId()) {
				$existe=true;
				break;
			}
				
			$iIndice++;
		}		
	
		if(!$existe) {
			/*SI NO EXISTE TOMA LA ULTIMA FILA*/
			$iIndice=$iIndiceActual;
		}
		
		return $iIndice;
	}
	
	/*DESCRIPCION*/
	public static function getgiro_negocio_clienteDescripcion(?giro_negocio_cliente $giro_negocio_cliente) : string {//giro_negocio_cliente NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($giro_negocio_cliente !=null) {
			/*&& giro_negocio_cliente->getId()!=0*/
			
			$sDescripcion=($giro_negocio_cliente->getnombre());
			
			/*giro_negocio_cliente;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setgiro_negocio_clienteDescripcion(?giro_negocio_cliente $giro_negocio_cliente,string $sValor) {			
		if($giro_negocio_cliente !=null) {
			$giro_negocio_cliente->setnombre($sValor);;
			/*giro_negocio_cliente;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $giro_negocio_clientes) : array {
		$giro_negocio_clientesForeignKey=array();
		
		foreach ($giro_negocio_clientes as $giro_negocio_clienteLocal) {
			$giro_negocio_clientesForeignKey[$giro_negocio_clienteLocal->getId()]=giro_negocio_cliente_util::getgiro_negocio_clienteDescripcion($giro_negocio_clienteLocal);
		}
			
		return $giro_negocio_clientesForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelnombre() : string  { return 'Nombre'; }
    public static function getColumnLabelpredeterminado() : string  { return 'Predeterminado'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
		
	public static function getpredeterminadoDescripcion($giro_negocio_cliente) {
		$sDescripcion='Verdadero';
		if(!$giro_negocio_cliente->getpredeterminado()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $giro_negocio_clientes) {		
		try {
			
			$giro_negocio_cliente = new giro_negocio_cliente();
			
			foreach($giro_negocio_clientes as $giro_negocio_cliente) {
				
			}
			
			if($giro_negocio_cliente!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(giro_negocio_cliente $giro_negocio_cliente) {		
		try {
			
			
							
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}		 
	
	/*FKs LISTA*/
			
	
	/*INDICES LABEL*/
	
	public static function getNombreIndice(string $sNombreIndice) : string {
		if($sNombreIndice=='Todos') {
			$sNombreIndice='Tipo=Todos';
		} else if($sNombreIndice=='PorId') {
			$sNombreIndice='Tipo=Por Id';
		}

		return $sNombreIndice;
	}
	
	/*INDICES PARAMETROS LABEL*/
	

	public static function getDetalleIndicePorId(int $id) : string 
	{
		return 'Parámetros -> Porid='.$id;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return giro_negocio_cliente_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return giro_negocio_cliente_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(giro_negocio_cliente_util::$LABEL_NOMBRE);
			$reporte->setsDescripcion(giro_negocio_cliente_util::$LABEL_NOMBRE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(giro_negocio_cliente_util::$LABEL_PREDETERMINADO);
			$reporte->setsDescripcion(giro_negocio_cliente_util::$LABEL_PREDETERMINADO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=giro_negocio_cliente_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
		return $arrColumnasGlobales;
	}		
	
	public static function getArrayColumnasGlobalesConNoColumnas(array $arrDatoGeneral,array $arrColumnasGlobalesNo) : array {
		$arrColumnasGlobales=array();
		//$noExiste=false;
		
		
		
		return $arrColumnasGlobales;
	}
	
	public static function getArrayColumnasGlobalesNo(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		
		
		return $arrColumnasGlobales;
	}
	
	/*DEEP CLASSES*/
	public static function getClassesFKsOf(array $classesP,string $deepLoadType) : array {
		try {
			$classes=array();	
			
			if($deepLoadType==DeepLoadType::$NONE) {
				
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
			}
			
			return $classes;
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	
	public static function getClassesRelsOf(array $classesP,string $deepLoadType) : array {
		try {
			$classes=array();			
			
			if($deepLoadType==DeepLoadType::$NONE) {
				
				$classes[]=new Classe(cliente::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==cliente::$class) {
						$classes[]=new Classe(cliente::$class); break;
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==cliente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cliente::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	
	/*ORDER*/
	public static function getOrderByLista() : array {
		$arrOrderBy=array();
		$orderBy=new OrderBy();
		
		
		$orderBy=OrderBy::NewOrderBy(false,giro_negocio_cliente_util::$LABEL_ID, giro_negocio_cliente_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,giro_negocio_cliente_util::$LABEL_NOMBRE, giro_negocio_cliente_util::$NOMBRE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,giro_negocio_cliente_util::$LABEL_PREDETERMINADO, giro_negocio_cliente_util::$PREDETERMINADO,false,""); $arrOrderBy[]=$orderBy;
		
		$arrOrderBy = OrderBy::ActualizarInformacion($arrOrderBy);
		
		return $arrOrderBy;
	}
	
	public static function getOrderByListaRel() : array {
		$arrOrderBy=array();
		$orderBy=new OrderBy();
		
		
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$STR_CLASS_WEB_TITULO, cliente_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		
		$arrOrderBy = OrderBy::ActualizarInformacion($arrOrderBy);
		
		if($orderBy!=null);
		
		return $arrOrderBy;
	}
	
	/*REPORTES*/
		
	
	/*REPORTES CODIGO*/
	public static function getHeaderReportRow(string $tipo='NORMAL',array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$header=array();
		$cellReport=new CellReport();
		$blnFill=false;
		
		if($tipo=='RELACIONADO') {
			$blnFill=true;
			
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,7,1); $cellReport->setblnFill($blnFill); $header[]=$cellReport;			
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Nombre',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Predeterminado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Predeterminado',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',giro_negocio_cliente $giro_negocio_cliente,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Nombre',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($giro_negocio_cliente->getnombre(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Predeterminado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($giro_negocio_cliente->getpredeterminado()),40,6,1); $row[]=$cellReport;
		}
		
		return $row;
	}		
	
	/*XML DESCRIPCION*/
		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $classe=new Classe();
        
        if($classe!=null);                        
    }
	
	/*
	
	interface giro_negocio_cliente_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $giro_negocio_clientes,int $iIdNuevogiro_negocio_cliente) : int;	
		public static function getIndiceActual(array $giro_negocio_clientes,giro_negocio_cliente $giro_negocio_cliente,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getgiro_negocio_clienteDescripcion(?giro_negocio_cliente $giro_negocio_cliente) : string {;	
		public static function setgiro_negocio_clienteDescripcion(?giro_negocio_cliente $giro_negocio_cliente,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $giro_negocio_clientes) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $giro_negocio_clientes);	
		public static function refrescarFKDescripcion(giro_negocio_cliente $giro_negocio_cliente);
				
		//SELECCIONAR
		public static function getTiposSeleccionar(bool $conFk) : array;	
		public static function getTiposSeleccionar2() : array;	
		public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array;
		
		//GLOBAL
		public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array;	
		public static function getArrayColumnasGlobalesConNoColumnas(array $arrDatoGeneral,array $arrColumnasGlobalesNo) : array;	
		public static function getArrayColumnasGlobalesNo(array $arrDatoGeneral) : array;
		
		//DEEP CLASSES
		public static function getClassesFKsOf(array $classesP,string $deepLoadType) : array;
		
		
		public static function getClassesRelsOf(array $classesP,string $deepLoadType) : array;
		
		
		//ORDER
		public static function getOrderByLista() : array;	
		public static function getOrderByListaRel() : array;	
		
		//REPORTES CODIGO
		public static function getHeaderReportRow(string $tipo='NORMAL',array $arrOrderBy,bool $bitParaReporteOrderBy) : array;	
		public static function getDataReportRow(string $tipo='NORMAL',giro_negocio_cliente $giro_negocio_cliente,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

