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

namespace com\bydan\contabilidad\estimados\imagen_consignacion\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\estimados\imagen_consignacion\business\entity\imagen_consignacion;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\estimados\consignacion\business\entity\consignacion;
use com\bydan\contabilidad\estimados\consignacion\util\consignacion_util;

//REL


class imagen_consignacion_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='imagen_consignacion';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='estimados.imagen_consignacions';
	/*'Mantenimientoimagen_consignacion.jsf';*/
	public static string $STR_MODULO_OPCION='estimados';
	public static string $STR_NOMBRE_CLASE='Mantenimientoimagen_consignacion.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='imagen_consignacionPersistenceName';
	/*.imagen_consignacion_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='imagen_consignacion_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='imagen_consignacion_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='imagen_consignacion_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Imagenes Consignaciones';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='es';
	public static string $STR_CLASS_WEB_TITULO='Imagenes Consignacion';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $ESTIMADOS='estimados';
	public static string $STR_PREFIJO_TABLE='est_';
	public static string $STR_TABLE_NAME='imagen_consignacion';
	public static string $IMAGEN_CONSIGNACION='est_imagen_consignacion';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.imagen_consignacion';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_consignacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.imagen from '.imagen_consignacion_util::$SCHEMA.'.'.imagen_consignacion_util::$TABLENAME;*/
	
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
	//public $imagen_consignacionConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_CONSIGNACION='id_consignacion';
    public static string $IMAGEN='imagen';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_CONSIGNACION=' Consignacion';
    public static string $LABEL_IMAGEN='Imagen';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->imagen_consignacionConstantesFuncionesAdditional=new $imagen_consignacionConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $imagen_consignacions,int $iIdNuevoimagen_consignacion) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($imagen_consignacions as $imagen_consignacionAux) {
			if($imagen_consignacionAux->getId()==$iIdNuevoimagen_consignacion) {
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
	
	public static function getIndiceActual(array $imagen_consignacions,imagen_consignacion $imagen_consignacion,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($imagen_consignacions as $imagen_consignacionAux) {
			if($imagen_consignacionAux->getId()==$imagen_consignacion->getId()) {
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
	public static function getimagen_consignacionDescripcion(?imagen_consignacion $imagen_consignacion) : string {//imagen_consignacion NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($imagen_consignacion !=null) {
			/*&& imagen_consignacion->getId()!=0*/
			
			$sDescripcion=$imagen_consignacion->getimagen();
			
			/*imagen_consignacion;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setimagen_consignacionDescripcion(?imagen_consignacion $imagen_consignacion,string $sValor) {			
		if($imagen_consignacion !=null) {
			$imagen_consignacion->setimagen($sValor);
			/*imagen_consignacion;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $imagen_consignacions) : array {
		$imagen_consignacionsForeignKey=array();
		
		foreach ($imagen_consignacions as $imagen_consignacionLocal) {
			$imagen_consignacionsForeignKey[$imagen_consignacionLocal->getId()]=imagen_consignacion_util::getimagen_consignacionDescripcion($imagen_consignacionLocal);
		}
			
		return $imagen_consignacionsForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_consignacion() : string  { return ' Consignacion'; }
    public static function getColumnLabelimagen() : string  { return 'Imagen'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $imagen_consignacions) {		
		try {
			
			$imagen_consignacion = new imagen_consignacion();
			
			foreach($imagen_consignacions as $imagen_consignacion) {
				
				$imagen_consignacion->setid_consignacion_Descripcion(imagen_consignacion_util::getconsignacionDescripcion($imagen_consignacion->getconsignacion()));
			}
			
			if($imagen_consignacion!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(imagen_consignacion $imagen_consignacion) {		
		try {
			
			
				$imagen_consignacion->setid_consignacion_Descripcion(imagen_consignacion_util::getconsignacionDescripcion($imagen_consignacion->getconsignacion()));
							
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
		} else if($sNombreIndice=='FK_Idconsignacion') {
			$sNombreIndice='Tipo=  Por  Consignacion';
		}

		return $sNombreIndice;
	}
	
	/*INDICES PARAMETROS LABEL*/
	

	public static function getDetalleIndicePorId(int $id) : string 
	{
		return 'Parámetros -> Porid='.$id;
	}

	public static function getDetalleIndiceFK_Idconsignacion(int $id_consignacion) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Consignacion='+$id_consignacion; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return imagen_consignacion_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return imagen_consignacion_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(imagen_consignacion_util::$LABEL_ID_CONSIGNACION);
			$reporte->setsDescripcion(imagen_consignacion_util::$LABEL_ID_CONSIGNACION.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(imagen_consignacion_util::$LABEL_IMAGEN);
			$reporte->setsDescripcion(imagen_consignacion_util::$LABEL_IMAGEN);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=imagen_consignacion_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
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
				
				$classes[]=new Classe(consignacion::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==consignacion::$class) {
						$classes[]=new Classe(consignacion::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==consignacion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(consignacion::$class);
				}

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
				
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,imagen_consignacion_util::$LABEL_ID, imagen_consignacion_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,imagen_consignacion_util::$LABEL_ID_CONSIGNACION, imagen_consignacion_util::$ID_CONSIGNACION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,imagen_consignacion_util::$LABEL_IMAGEN, imagen_consignacion_util::$IMAGEN,false,""); $arrOrderBy[]=$orderBy;
		
		$arrOrderBy = OrderBy::ActualizarInformacion($arrOrderBy);
		
		return $arrOrderBy;
	}
	
	public static function getOrderByListaRel() : array {
		$arrOrderBy=array();
		$orderBy=new OrderBy();
		
		
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
		
		

		if(Funciones::existeCadenaArrayOrderBy(' Consignacion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Consignacion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Imagen',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Imagen',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',imagen_consignacion $imagen_consignacion,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy(' Consignacion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($imagen_consignacion->getid_consignacion_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Imagen',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($imagen_consignacion->getimagen(),40,6,1); $row[]=$cellReport;
		}
		
		return $row;
	}		
	
	/*XML DESCRIPCION*/
	
	public static function getconsignacionDescripcion(?consignacion $consignacion) : string {
		$sDescripcion='none';
		if($consignacion!==null) {
			$sDescripcion=consignacion_util::getconsignacionDescripcion($consignacion);
		}
		return $sDescripcion;
	}	
		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $classe=new Classe();
        
        if($classe!=null);                        
    }
	
	/*
	
	interface imagen_consignacion_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $imagen_consignacions,int $iIdNuevoimagen_consignacion) : int;	
		public static function getIndiceActual(array $imagen_consignacions,imagen_consignacion $imagen_consignacion,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getimagen_consignacionDescripcion(?imagen_consignacion $imagen_consignacion) : string {;	
		public static function setimagen_consignacionDescripcion(?imagen_consignacion $imagen_consignacion,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $imagen_consignacions) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $imagen_consignacions);	
		public static function refrescarFKDescripcion(imagen_consignacion $imagen_consignacion);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',imagen_consignacion $imagen_consignacion,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

