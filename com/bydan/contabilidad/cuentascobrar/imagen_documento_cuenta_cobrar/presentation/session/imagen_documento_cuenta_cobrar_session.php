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

namespace com\bydan\contabilidad\cuentascobrar\imagen_documento_cuenta_cobrar\presentation\session;

//use Exception;
//use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntitySessionBean;
use com\bydan\contabilidad\cuentascobrar\imagen_documento_cuenta_cobrar\util\imagen_documento_cuenta_cobrar_util;

class imagen_documento_cuenta_cobrar_session extends GeneralEntitySessionBean {
	
	
	
	//ADDITIONAL
	//public $imagen_documento_cuenta_cobrar_sessionAdditional=null;
	
	/*BUSQUEDA*/
	
	public ?bool $bitBusquedaDesdeFKSesiondocumento_cuenta_cobrar=null;
	public ?int $bigiddocumento_cuenta_cobrarActual=null;
	public ?string $bigiddocumento_cuenta_cobrarActualDescripcion=null;
	
	/*BUSQUEDA PARAMETROS*/
	public int $id=0;
	public int $id_documento_cuenta_cobrar=-1;
		
	function __construct () {	
		
		parent::__construct();
		
		$this->intNumeroPaginacion = imagen_documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
		
		$this->strPermiteRecargarInformacion = 'display:table-row';
		
		
		
		$this->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';
		$this->strStyleDivContent='width:93%;height:100%';
		$this->strStyleDivOpcionesBanner='display:none';
		$this->strStyleDivExpandirColapsar='display:none';
		$this->bitPaginaPopup=true;		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->imagen_documento_cuenta_cobrar_sessionAdditional=new imagen_documento_cuenta_cobrar_sessionAdditional();
		*/
		
		
		
		/*DEFAULT BUSQUEDA FKs PARAMETROS*/
		
		$this->bitBusquedaDesdeFKSesiondocumento_cuenta_cobrar=false;
		$this->bigiddocumento_cuenta_cobrarActual=0;
		$this->bigiddocumento_cuenta_cobrarActualDescripcion=''; 
		
		/*DEFAULT PK ACTUAL FKs*/
		
		
		/*DEFAULT BUSQUEDA PARAMETROS*/
 		$this->id_documento_cuenta_cobrar=-1;
    }
}
?>
