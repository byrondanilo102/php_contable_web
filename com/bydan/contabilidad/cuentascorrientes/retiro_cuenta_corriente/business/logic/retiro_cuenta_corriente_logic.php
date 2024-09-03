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

namespace com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\util\retiro_cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\util\retiro_cuenta_corriente_param_return;

use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\presentation\session\retiro_cuenta_corriente_session;

use com\bydan\framework\contabilidad\util\Connexion;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\ParameterDbType;


use com\bydan\framework\contabilidad\util\ParameterType;
use com\bydan\framework\contabilidad\util\ParameterTypeOperator;
use com\bydan\framework\contabilidad\business\logic\ParameterSelectionGeneral;

use com\bydan\framework\contabilidad\util\PaqueteTipo;
use com\bydan\framework\contabilidad\util\DeepLoadType;
use com\bydan\framework\contabilidad\util\EventoTipo;
use com\bydan\framework\contabilidad\util\EventoSubTipo;
use com\bydan\framework\contabilidad\util\ControlTipo;
use com\bydan\framework\contabilidad\util\EventoGlobalTipo;
use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\DatoGeneralMinimo;
use com\bydan\framework\contabilidad\business\logic\DatosCliente;
use com\bydan\framework\contabilidad\business\logic\DatosDeep;
use com\bydan\framework\contabilidad\business\logic\Pagination;
use com\bydan\framework\contabilidad\business\logic\QueryWhereSelectParameters;

use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
use com\bydan\contabilidad\seguridad\opcion\business\entity\opcion;
use com\bydan\contabilidad\seguridad\auditoria\business\entity\auditoria;

use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\util\retiro_cuenta_corriente_util;
use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\business\entity\retiro_cuenta_corriente;
use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\business\data\retiro_cuenta_corriente_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;
use com\bydan\contabilidad\general\sucursal\business\data\sucursal_data;
use com\bydan\contabilidad\general\sucursal\business\logic\sucursal_logic;
use com\bydan\contabilidad\general\sucursal\util\sucursal_util;

use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;
use com\bydan\contabilidad\contabilidad\ejercicio\business\data\ejercicio_data;
use com\bydan\contabilidad\contabilidad\ejercicio\business\logic\ejercicio_logic;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_util;

use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;
use com\bydan\contabilidad\contabilidad\periodo\business\data\periodo_data;
use com\bydan\contabilidad\contabilidad\periodo\business\logic\periodo_logic;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_util;

use com\bydan\contabilidad\seguridad\usuario\business\data\usuario_data;
use com\bydan\contabilidad\seguridad\usuario\business\logic\usuario_logic;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\entity\cuenta_corriente;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\data\cuenta_corriente_data;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\logic\cuenta_corriente_logic;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_util;

use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\business\entity\estado_deposito_retiro;
use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\business\data\estado_deposito_retiro_data;
use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\business\logic\estado_deposito_retiro_logic;
use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\util\estado_deposito_retiro_util;

//REL


//REL DETALLES




class retiro_cuenta_corriente_logic  extends GeneralEntityLogic implements retiro_cuenta_corriente_logicI {	
	/*GENERAL*/
	public retiro_cuenta_corriente_data $retiro_cuenta_corrienteDataAccess;
	public ?retiro_cuenta_corriente_logic_add $retiro_cuenta_corrienteLogicAdditional=null;
	public ?retiro_cuenta_corriente $retiro_cuenta_corriente;
	public array $retiro_cuenta_corrientes;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->retiro_cuenta_corrienteDataAccess = new retiro_cuenta_corriente_data();			
			$this->retiro_cuenta_corrientes = array();
			$this->retiro_cuenta_corriente = new retiro_cuenta_corriente();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->retiro_cuenta_corrienteLogicAdditional = new retiro_cuenta_corriente_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		if($this->retiro_cuenta_corrienteLogicAdditional==null) {
			$this->retiro_cuenta_corrienteLogicAdditional=new retiro_cuenta_corriente_logic_add();
		}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->retiro_cuenta_corrienteDataAccess->executeQuery($this->connexion, $sQueryExecute);			
			$this->connexion->getConnection()->commit();
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	public function executeQuery(string $sQueryExecute) {
		try {			
			$this->retiro_cuenta_corrienteDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->retiro_cuenta_corrienteDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
			$this->connexion->getConnection()->commit();							
			return $valor;	
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} finally {
			$this->connexion->getConnection()->close();			
		}
	}
	
	public function executeQueryValor(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$valor=$this->retiro_cuenta_corrienteDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->retiro_cuenta_corrientes = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->retiro_cuenta_corrientes=$this->retiro_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retiro_cuenta_corriente_util::refrescarFKDescripciones($this->retiro_cuenta_corrientes);
			}
			
			retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToGets($this->retiro_cuenta_corrientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->retiro_cuenta_corrientes);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->retiro_cuenta_corrientes = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->retiro_cuenta_corrientes=$this->retiro_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retiro_cuenta_corriente_util::refrescarFKDescripciones($this->retiro_cuenta_corrientes);
			}
			
			retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToGets($this->retiro_cuenta_corrientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->retiro_cuenta_corrientes);
			$this->connexion->getConnection()->commit();						
			
		}  catch(Exception $e) {
			$this->connexion->getConnection()->rollback();								
			Funciones::logShowExceptionMessages($e);
			throw $e;			      	
		} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*TRAER UN OBJETO*/
	public function getEntityWithConnection(?int $id)  {
		$this->retiro_cuenta_corriente = new retiro_cuenta_corriente();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->retiro_cuenta_corriente=$this->retiro_cuenta_corrienteDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->retiro_cuenta_corriente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				retiro_cuenta_corriente_util::refrescarFKDescripcion($this->retiro_cuenta_corriente);
			}
						
			retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToGet($this->retiro_cuenta_corriente,$this->datosCliente);
			retiro_cuenta_corriente_logic_add::updateretiro_cuenta_corrienteToGet($this->retiro_cuenta_corriente);
			$this->connexion->getConnection()->commit();								
			
		}  catch(Exception $e) {
			$this->connexion->getConnection()->rollback();						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	public function getEntity(?int $id)  {
		$this->retiro_cuenta_corriente = new  retiro_cuenta_corriente();
		  		  
        try {		
			$this->retiro_cuenta_corriente=$this->retiro_cuenta_corrienteDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->retiro_cuenta_corriente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				retiro_cuenta_corriente_util::refrescarFKDescripcion($this->retiro_cuenta_corriente);
			}
			
			retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToGet($this->retiro_cuenta_corriente,$this->datosCliente);
			retiro_cuenta_corriente_logic_add::updateretiro_cuenta_corrienteToGet($this->retiro_cuenta_corriente);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?retiro_cuenta_corriente {
		$retiro_cuenta_corrienteLogic = new  retiro_cuenta_corriente_logic();
		  		  
        try {		
			$retiro_cuenta_corrienteLogic->setConnexion($connexion);			
			$retiro_cuenta_corrienteLogic->getEntity($id);			
			return $retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->retiro_cuenta_corriente = new  retiro_cuenta_corriente();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->retiro_cuenta_corriente=$this->retiro_cuenta_corrienteDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->retiro_cuenta_corriente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				retiro_cuenta_corriente_util::refrescarFKDescripcion($this->retiro_cuenta_corriente);
			}
			
			retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToGet($this->retiro_cuenta_corriente,$this->datosCliente);
			retiro_cuenta_corriente_logic_add::updateretiro_cuenta_corrienteToGet($this->retiro_cuenta_corriente);
			$this->connexion->getConnection()->commit();								
			
		}  catch(Exception $e) {
			$this->connexion->getConnection()->rollback();			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	public function getEntityWithFinalQuery(string $strFinalQuery='')  {
		$this->retiro_cuenta_corriente = new  retiro_cuenta_corriente();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->retiro_cuenta_corriente=$this->retiro_cuenta_corrienteDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->retiro_cuenta_corriente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				retiro_cuenta_corriente_util::refrescarFKDescripcion($this->retiro_cuenta_corriente);
			}
			
			retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToGet($this->retiro_cuenta_corriente,$this->datosCliente);
			retiro_cuenta_corriente_logic_add::updateretiro_cuenta_corrienteToGet($this->retiro_cuenta_corriente);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?retiro_cuenta_corriente {
		$retiro_cuenta_corrienteLogic = new  retiro_cuenta_corriente_logic();
		  		  
        try {		
			$retiro_cuenta_corrienteLogic->setConnexion($connexion);			
			$retiro_cuenta_corrienteLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $retiro_cuenta_corrienteLogic->getretiro_cuenta_corriente();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->retiro_cuenta_corrientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->retiro_cuenta_corrientes=$this->retiro_cuenta_corrienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retiro_cuenta_corriente_util::refrescarFKDescripciones($this->retiro_cuenta_corrientes);
			}
			
			retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToGets($this->retiro_cuenta_corrientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->retiro_cuenta_corrientes);			
			$this->connexion->getConnection()->commit();					
			
		}  catch(Exception $e) {
			$this->connexion->getConnection()->rollback();			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	public function getEntities(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->retiro_cuenta_corrientes = array();
		  		  
        try {			
			$this->retiro_cuenta_corrientes=$this->retiro_cuenta_corrienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retiro_cuenta_corriente_util::refrescarFKDescripciones($this->retiro_cuenta_corrientes);
			}
			
			retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToGets($this->retiro_cuenta_corrientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->retiro_cuenta_corrientes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->retiro_cuenta_corrientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->retiro_cuenta_corrientes=$this->retiro_cuenta_corrienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retiro_cuenta_corriente_util::refrescarFKDescripciones($this->retiro_cuenta_corrientes);
			}
			
			retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToGets($this->retiro_cuenta_corrientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->retiro_cuenta_corrientes);
			$this->connexion->getConnection()->commit();						
			
		}  catch(Exception $e) {
			$this->connexion->getConnection()->rollback();			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	public function getEntitiesWithFinalQuery(string $strFinalQuery) {	
		$this->retiro_cuenta_corrientes = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->retiro_cuenta_corrientes=$this->retiro_cuenta_corrienteDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retiro_cuenta_corriente_util::refrescarFKDescripciones($this->retiro_cuenta_corrientes);
			}
			
			retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToGets($this->retiro_cuenta_corrientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->retiro_cuenta_corrientes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$retiro_cuenta_corrienteLogic = new  retiro_cuenta_corriente_logic();
		  		  
        try {		
			$retiro_cuenta_corrienteLogic->setConnexion($connexion);			
			$retiro_cuenta_corrienteLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $retiro_cuenta_corrienteLogic->getretiro_cuenta_corrientes();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->retiro_cuenta_corrientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->retiro_cuenta_corrientes=$this->retiro_cuenta_corrienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retiro_cuenta_corriente_util::refrescarFKDescripciones($this->retiro_cuenta_corrientes);
			}
			
			retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToGets($this->retiro_cuenta_corrientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->retiro_cuenta_corrientes);
			$this->connexion->getConnection()->commit();					
			
		}  catch(Exception $e) {
			$this->connexion->getConnection()->rollback();								
			Funciones::logShowExceptionMessages($e);
			throw $e;						
      	} finally{
			$this->connexion->getConnection()->close();
		}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQuery(string $strQuerySelect,string $strFinalQuery) {
		$this->retiro_cuenta_corrientes = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->retiro_cuenta_corrientes=$this->retiro_cuenta_corrienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retiro_cuenta_corriente_util::refrescarFKDescripciones($this->retiro_cuenta_corrientes);
			}
			
			retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToGets($this->retiro_cuenta_corrientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->retiro_cuenta_corrientes);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->retiro_cuenta_corrientes = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->retiro_cuenta_corrientes=$this->retiro_cuenta_corrienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retiro_cuenta_corriente_util::refrescarFKDescripciones($this->retiro_cuenta_corrientes);
			}
			
			retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToGets($this->retiro_cuenta_corrientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->retiro_cuenta_corrientes);
			$this->connexion->getConnection()->commit();						
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} finally{
			$this->connexion->getConnection()->close();
		}
	}
	
	public function getEntitiesWithQuerySelect(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->retiro_cuenta_corrientes = array();
		  		  
        try {			
			$this->retiro_cuenta_corrientes=$this->retiro_cuenta_corrienteDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retiro_cuenta_corriente_util::refrescarFKDescripciones($this->retiro_cuenta_corrientes);
			}	
			
			retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToGets($this->retiro_cuenta_corrientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->retiro_cuenta_corrientes);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->retiro_cuenta_corrientes = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->retiro_cuenta_corrientes=$this->retiro_cuenta_corrienteDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retiro_cuenta_corriente_util::refrescarFKDescripciones($this->retiro_cuenta_corrientes);
			}
			
			retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToGets($this->retiro_cuenta_corrientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->retiro_cuenta_corrientes);
			$this->connexion->getConnection()->commit();						
			
		}  catch(Exception $e) {
			$this->connexion->getConnection()->rollback();			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	public function getEntitiesSimpleQueryBuild(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->retiro_cuenta_corrientes = array();
		  		  
        try {		
			$this->retiro_cuenta_corrientes=$this->retiro_cuenta_corrienteDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retiro_cuenta_corriente_util::refrescarFKDescripciones($this->retiro_cuenta_corrientes);
			}
			
			retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToGets($this->retiro_cuenta_corrientes,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->retiro_cuenta_corrientes);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
		
	public function getsFK_Idcuenta_corrienteWithConnection(string $strFinalQuery,Pagination $pagination,int $id_cuenta_corriente) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_corriente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_corriente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_corriente,retiro_cuenta_corriente_util::$ID_CUENTA_CORRIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_corriente);

			$this->retiro_cuenta_corrientes=$this->retiro_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				retiro_cuenta_corriente_util::refrescarFKDescripciones($this->retiro_cuenta_corrientes);
			}
			retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToGets($this->retiro_cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->retiro_cuenta_corrientes);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idcuenta_corriente(string $strFinalQuery,Pagination $pagination,int $id_cuenta_corriente) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_cuenta_corriente= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_cuenta_corriente->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_cuenta_corriente,retiro_cuenta_corriente_util::$ID_CUENTA_CORRIENTE,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_cuenta_corriente);

			$this->retiro_cuenta_corrientes=$this->retiro_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				retiro_cuenta_corriente_util::refrescarFKDescripciones($this->retiro_cuenta_corrientes);
			}
			retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToGets($this->retiro_cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->retiro_cuenta_corrientes);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdejercicioWithConnection(string $strFinalQuery,Pagination $pagination,int $id_ejercicio) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_ejercicio= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,retiro_cuenta_corriente_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->retiro_cuenta_corrientes=$this->retiro_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				retiro_cuenta_corriente_util::refrescarFKDescripciones($this->retiro_cuenta_corrientes);
			}
			retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToGets($this->retiro_cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->retiro_cuenta_corrientes);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idejercicio(string $strFinalQuery,Pagination $pagination,int $id_ejercicio) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_ejercicio= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_ejercicio->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_ejercicio,retiro_cuenta_corriente_util::$ID_EJERCICIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_ejercicio);

			$this->retiro_cuenta_corrientes=$this->retiro_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				retiro_cuenta_corriente_util::refrescarFKDescripciones($this->retiro_cuenta_corrientes);
			}
			retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToGets($this->retiro_cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->retiro_cuenta_corrientes);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdempresaWithConnection(string $strFinalQuery,Pagination $pagination,int $id_empresa) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_empresa= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,retiro_cuenta_corriente_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->retiro_cuenta_corrientes=$this->retiro_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				retiro_cuenta_corriente_util::refrescarFKDescripciones($this->retiro_cuenta_corrientes);
			}
			retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToGets($this->retiro_cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->retiro_cuenta_corrientes);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idempresa(string $strFinalQuery,Pagination $pagination,int $id_empresa) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_empresa= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_empresa->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_empresa,retiro_cuenta_corriente_util::$ID_EMPRESA,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_empresa);

			$this->retiro_cuenta_corrientes=$this->retiro_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				retiro_cuenta_corriente_util::refrescarFKDescripciones($this->retiro_cuenta_corrientes);
			}
			retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToGets($this->retiro_cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->retiro_cuenta_corrientes);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_Idestado_deposito_retiroWithConnection(string $strFinalQuery,Pagination $pagination,int $id_estado_deposito_retiro) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_estado_deposito_retiro= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_estado_deposito_retiro->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estado_deposito_retiro,retiro_cuenta_corriente_util::$ID_ESTADO_DEPOSITO_RETIRO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estado_deposito_retiro);

			$this->retiro_cuenta_corrientes=$this->retiro_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				retiro_cuenta_corriente_util::refrescarFKDescripciones($this->retiro_cuenta_corrientes);
			}
			retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToGets($this->retiro_cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->retiro_cuenta_corrientes);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idestado_deposito_retiro(string $strFinalQuery,Pagination $pagination,int $id_estado_deposito_retiro) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_estado_deposito_retiro= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_estado_deposito_retiro->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_estado_deposito_retiro,retiro_cuenta_corriente_util::$ID_ESTADO_DEPOSITO_RETIRO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_estado_deposito_retiro);

			$this->retiro_cuenta_corrientes=$this->retiro_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				retiro_cuenta_corriente_util::refrescarFKDescripciones($this->retiro_cuenta_corrientes);
			}
			retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToGets($this->retiro_cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->retiro_cuenta_corrientes);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdperiodoWithConnection(string $strFinalQuery,Pagination $pagination,int $id_periodo) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_periodo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,retiro_cuenta_corriente_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->retiro_cuenta_corrientes=$this->retiro_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				retiro_cuenta_corriente_util::refrescarFKDescripciones($this->retiro_cuenta_corrientes);
			}
			retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToGets($this->retiro_cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->retiro_cuenta_corrientes);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idperiodo(string $strFinalQuery,Pagination $pagination,int $id_periodo) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_periodo= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_periodo->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_periodo,retiro_cuenta_corriente_util::$ID_PERIODO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_periodo);

			$this->retiro_cuenta_corrientes=$this->retiro_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				retiro_cuenta_corriente_util::refrescarFKDescripciones($this->retiro_cuenta_corrientes);
			}
			retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToGets($this->retiro_cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->retiro_cuenta_corrientes);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdsucursalWithConnection(string $strFinalQuery,Pagination $pagination,int $id_sucursal) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_sucursal= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,retiro_cuenta_corriente_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->retiro_cuenta_corrientes=$this->retiro_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				retiro_cuenta_corriente_util::refrescarFKDescripciones($this->retiro_cuenta_corrientes);
			}
			retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToGets($this->retiro_cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->retiro_cuenta_corrientes);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idsucursal(string $strFinalQuery,Pagination $pagination,int $id_sucursal) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_sucursal= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_sucursal->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_sucursal,retiro_cuenta_corriente_util::$ID_SUCURSAL,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_sucursal);

			$this->retiro_cuenta_corrientes=$this->retiro_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				retiro_cuenta_corriente_util::refrescarFKDescripciones($this->retiro_cuenta_corrientes);
			}
			retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToGets($this->retiro_cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->retiro_cuenta_corrientes);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function getsFK_IdusuarioWithConnection(string $strFinalQuery,Pagination $pagination,int $id_usuario) {
		try
		{
			$this->connexion=Connexion::getNewConnexion();

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_usuario= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,retiro_cuenta_corriente_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->retiro_cuenta_corrientes=$this->retiro_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				retiro_cuenta_corriente_util::refrescarFKDescripciones($this->retiro_cuenta_corrientes);
			}
			retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToGets($this->retiro_cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->retiro_cuenta_corrientes);

			$this->connexion->getConnection()->commit();
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		} 
		finally {
			$this->connexion->getConnection()->close();;
		}
	}

	public function getsFK_Idusuario(string $strFinalQuery,Pagination $pagination,int $id_usuario) {
		try
		{

			$queryWhereSelectParameters=new QueryWhereSelectParameters(ParameterDbType::$MYSQL,'');

			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parameterSelectionGeneralid_usuario= new ParameterSelectionGeneral();
			$parameterSelectionGeneralid_usuario->setParameterSelectionGeneralEqual(ParameterType::$LONG,$id_usuario,retiro_cuenta_corriente_util::$ID_USUARIO,ParameterTypeOperator::$NONE);
			$queryWhereSelectParameters->addParameter($parameterSelectionGeneralid_usuario);

			$this->retiro_cuenta_corrientes=$this->retiro_cuenta_corrienteDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);

			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());

				retiro_cuenta_corriente_util::refrescarFKDescripciones($this->retiro_cuenta_corrientes);
			}
			retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToGets($this->retiro_cuenta_corrientes,$this->datosCliente);
			$this->updateToGetsAuxiliar($this->retiro_cuenta_corrientes);
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
		
	
	/*MANTENIMIENTO*/
	public function saveWithConnection() {	
		 try {	
			$this->connexion = Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
						
			//retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToSave($this->retiro_cuenta_corriente,$this->datosCliente,$this->connexion);	       
			retiro_cuenta_corriente_logic_add::updateretiro_cuenta_corrienteToSave($this->retiro_cuenta_corriente);			
			retiro_cuenta_corriente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->retiro_cuenta_corriente,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			$this->retiro_cuenta_corrienteLogicAdditional->checkGeneralEntityToSave($this,$this->retiro_cuenta_corriente,$this->datosCliente,$this->connexion);
			
			
			retiro_cuenta_corriente_data::save($this->retiro_cuenta_corriente, $this->connexion);	    	       	 				
			//retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToSaveAfter($this->retiro_cuenta_corriente,$this->datosCliente,$this->connexion);			
			$this->retiro_cuenta_corrienteLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->retiro_cuenta_corriente,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->retiro_cuenta_corriente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->retiro_cuenta_corriente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				retiro_cuenta_corriente_util::refrescarFKDescripcion($this->retiro_cuenta_corriente);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->retiro_cuenta_corriente->getIsDeleted()) {
				$this->retiro_cuenta_corriente=null;
			}			
		}  catch(Exception $e) {
			$this->connexion->getConnection()->rollback();			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	public function save() {	
		 try {				
			$this->inicializarLogicAdditional();			
						
			/*retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToSave($this->retiro_cuenta_corriente,$this->datosCliente,$this->connexion);*/	        
			retiro_cuenta_corriente_logic_add::updateretiro_cuenta_corrienteToSave($this->retiro_cuenta_corriente);			
			$this->retiro_cuenta_corrienteLogicAdditional->checkGeneralEntityToSave($this,$this->retiro_cuenta_corriente,$this->datosCliente,$this->connexion);			
			retiro_cuenta_corriente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->retiro_cuenta_corriente,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			retiro_cuenta_corriente_data::save($this->retiro_cuenta_corriente, $this->connexion);	    	       	 						
			/*retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToSaveAfter($this->retiro_cuenta_corriente,$this->datosCliente,$this->connexion);*/			
			$this->retiro_cuenta_corrienteLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->retiro_cuenta_corriente,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->retiro_cuenta_corriente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->retiro_cuenta_corriente,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				retiro_cuenta_corriente_util::refrescarFKDescripcion($this->retiro_cuenta_corriente);				
			}
			
			if($this->retiro_cuenta_corriente->getIsDeleted()) {
				$this->retiro_cuenta_corriente=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(retiro_cuenta_corriente $retiro_cuenta_corriente,Connexion $connexion)  {
		$retiro_cuenta_corrienteLogic = new  retiro_cuenta_corriente_logic();		  		  
        try {		
			$retiro_cuenta_corrienteLogic->setConnexion($connexion);			
			$retiro_cuenta_corrienteLogic->setretiro_cuenta_corriente($retiro_cuenta_corriente);			
			$retiro_cuenta_corrienteLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToSaves($this->retiro_cuenta_corrientes,$this->datosCliente,$this->connexion);*/	        	
			$this->retiro_cuenta_corrienteLogicAdditional->checkGeneralEntitiesToSaves($this,$this->retiro_cuenta_corrientes,$this->datosCliente,$this->connexion);
			
	   		foreach($this->retiro_cuenta_corrientes as $retiro_cuenta_corrienteLocal) {				
								
				retiro_cuenta_corriente_logic_add::updateretiro_cuenta_corrienteToSave($retiro_cuenta_corrienteLocal);	        	
				retiro_cuenta_corriente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$retiro_cuenta_corrienteLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				retiro_cuenta_corriente_data::save($retiro_cuenta_corrienteLocal, $this->connexion);				
			}
			
			/*retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToSavesAfter($this->retiro_cuenta_corrientes,$this->datosCliente,$this->connexion);*/			
			$this->retiro_cuenta_corrienteLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->retiro_cuenta_corrientes,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retiro_cuenta_corriente_util::refrescarFKDescripciones($this->retiro_cuenta_corrientes);
			}
			
			$this->connexion->getConnection()->commit();								
			$this->quitarEliminados();
			
		}  catch(Exception $e) {
			$this->connexion->getConnection()->rollback();			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	public function saves() {			
		 try {			
			$this->inicializarLogicAdditional();			
			/*retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToSaves($this->retiro_cuenta_corrientes,$this->datosCliente,$this->connexion);*/			
			$this->retiro_cuenta_corrienteLogicAdditional->checkGeneralEntitiesToSaves($this,$this->retiro_cuenta_corrientes,$this->datosCliente,$this->connexion);
			
	   		foreach($this->retiro_cuenta_corrientes as $retiro_cuenta_corrienteLocal) {				
								
				retiro_cuenta_corriente_logic_add::updateretiro_cuenta_corrienteToSave($retiro_cuenta_corrienteLocal);	        	
				retiro_cuenta_corriente_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$retiro_cuenta_corrienteLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				retiro_cuenta_corriente_data::save($retiro_cuenta_corrienteLocal, $this->connexion);				
			}			
			
			/*retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToSavesAfter($this->retiro_cuenta_corrientes,$this->datosCliente,$this->connexion);*/			
			$this->retiro_cuenta_corrienteLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->retiro_cuenta_corrientes,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				retiro_cuenta_corriente_util::refrescarFKDescripciones($this->retiro_cuenta_corrientes);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $retiro_cuenta_corrientes,Connexion $connexion)  {
		$retiro_cuenta_corrienteLogic = new  retiro_cuenta_corriente_logic();
		  		  
        try {		
			$retiro_cuenta_corrienteLogic->setConnexion($connexion);			
			$retiro_cuenta_corrienteLogic->setretiro_cuenta_corrientes($retiro_cuenta_corrientes);			
			$retiro_cuenta_corrienteLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$retiro_cuenta_corrientesAux=array();
		
		foreach($this->retiro_cuenta_corrientes as $retiro_cuenta_corriente) {
			if($retiro_cuenta_corriente->getIsDeleted()==false) {
				$retiro_cuenta_corrientesAux[]=$retiro_cuenta_corriente;
			}
		}
		
		$this->retiro_cuenta_corrientes=$retiro_cuenta_corrientesAux;
	}
	
	public function updateToGetsAuxiliar(array &$retiro_cuenta_corrientes) {
		if($this->retiro_cuenta_corrienteLogicAdditional==null) {
			$this->retiro_cuenta_corrienteLogicAdditional=new retiro_cuenta_corriente_logic_add();
		}
		
		
		$this->retiro_cuenta_corrienteLogicAdditional->updateToGets($retiro_cuenta_corrientes,$this);					
		$this->retiro_cuenta_corrienteLogicAdditional->updateToGetsReferencia($retiro_cuenta_corrientes,$this);			
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			foreach($this->retiro_cuenta_corrientes as $retiro_cuenta_corriente) {
				
				$retiro_cuenta_corriente->setid_empresa_Descripcion(retiro_cuenta_corriente_util::getempresaDescripcion($retiro_cuenta_corriente->getempresa()));
				$retiro_cuenta_corriente->setid_sucursal_Descripcion(retiro_cuenta_corriente_util::getsucursalDescripcion($retiro_cuenta_corriente->getsucursal()));
				$retiro_cuenta_corriente->setid_ejercicio_Descripcion(retiro_cuenta_corriente_util::getejercicioDescripcion($retiro_cuenta_corriente->getejercicio()));
				$retiro_cuenta_corriente->setid_periodo_Descripcion(retiro_cuenta_corriente_util::getperiodoDescripcion($retiro_cuenta_corriente->getperiodo()));
				$retiro_cuenta_corriente->setid_usuario_Descripcion(retiro_cuenta_corriente_util::getusuarioDescripcion($retiro_cuenta_corriente->getusuario()));
				$retiro_cuenta_corriente->setid_cuenta_corriente_Descripcion(retiro_cuenta_corriente_util::getcuenta_corrienteDescripcion($retiro_cuenta_corriente->getcuenta_corriente()));
				$retiro_cuenta_corriente->setid_estado_deposito_retiro_Descripcion(retiro_cuenta_corriente_util::getestado_deposito_retiroDescripcion($retiro_cuenta_corriente->getestado_deposito_retiro()));
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$retiro_cuenta_corriente_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$retiro_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,false);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}		
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$retiro_cuenta_corriente_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo) {		
		try {
			
			return $this->cargarCombosLoteFKBase(
											$strRecargarFkTipos,$strRecargarFkQuery,$strRecargarFkColumna,$intRecargarFkIdPadre,$strRecargarFkTiposNinguno
											,$retiro_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo,true);
			
		} catch(Exception $e) {
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}			
	}
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$retiro_cuenta_corriente_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection) {		
		try {
			
			if($conWithConnection) {
				$this->connexion=Connexion::getNewConnexion();
			}
			
			$retiro_cuenta_corrienteForeignKey=new retiro_cuenta_corriente_param_return();//retiro_cuenta_corrienteForeignKey();
			
			/*PARA RECARGAR COMBOS*/
			if($strRecargarFkTipos!=null && $strRecargarFkTipos!='TODOS' && $strRecargarFkTipos!='') {
				$strRecargarFkQuery=' where '.$strRecargarFkColumna.'='.$intRecargarFkIdPadre;
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTipos,',')) {
				$this->cargarCombosempresasFK($this->connexion,$strRecargarFkQuery,$retiro_cuenta_corrienteForeignKey,$retiro_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTipos,',')) {
				$this->cargarCombossucursalsFK($this->connexion,$strRecargarFkQuery,$retiro_cuenta_corrienteForeignKey,$retiro_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTipos,',')) {
				$this->cargarCombosejerciciosFK($this->connexion,$strRecargarFkQuery,$retiro_cuenta_corrienteForeignKey,$retiro_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTipos,',')) {
				$this->cargarCombosperiodosFK($this->connexion,$strRecargarFkQuery,$retiro_cuenta_corrienteForeignKey,$retiro_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTipos,',')) {
				$this->cargarCombosusuariosFK($this->connexion,$strRecargarFkQuery,$retiro_cuenta_corrienteForeignKey,$retiro_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_corriente',$strRecargarFkTipos,',')) {
				$this->cargarComboscuenta_corrientesFK($this->connexion,$strRecargarFkQuery,$retiro_cuenta_corrienteForeignKey,$retiro_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}

			if($strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_estado_deposito_retiro',$strRecargarFkTipos,',')) {
				$this->cargarCombosestado_deposito_retirosFK($this->connexion,$strRecargarFkQuery,$retiro_cuenta_corrienteForeignKey,$retiro_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
			}	
			
			
			/*RECARGAR COMBOS SIN ELEMENTOS*/
			if($strRecargarFkTiposNinguno!=null && $strRecargarFkTiposNinguno!='NINGUNO' && $strRecargarFkTiposNinguno!='') {						
			

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_empresa',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosempresasFK($this->connexion,' where id=-1 ',$retiro_cuenta_corrienteForeignKey,$retiro_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_sucursal',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombossucursalsFK($this->connexion,' where id=-1 ',$retiro_cuenta_corrienteForeignKey,$retiro_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_ejercicio',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosejerciciosFK($this->connexion,' where id=-1 ',$retiro_cuenta_corrienteForeignKey,$retiro_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_periodo',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosperiodosFK($this->connexion,' where id=-1 ',$retiro_cuenta_corrienteForeignKey,$retiro_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_usuario',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosusuariosFK($this->connexion,' where id=-1 ',$retiro_cuenta_corrienteForeignKey,$retiro_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_cuenta_corriente',$strRecargarFkTiposNinguno,',')) {
					$this->cargarComboscuenta_corrientesFK($this->connexion,' where id=-1 ',$retiro_cuenta_corrienteForeignKey,$retiro_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}

				if($strRecargarFkTiposNinguno!='NINGUNO' && Funciones::existeCadenaSplit('id_estado_deposito_retiro',$strRecargarFkTiposNinguno,',')) {
					$this->cargarCombosestado_deposito_retirosFK($this->connexion,' where id=-1 ',$retiro_cuenta_corrienteForeignKey,$retiro_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo);
				}	
			}
			
			if($conWithConnection) {
				$this->connexion->getConnection()->commit();				
			}
			
			return $retiro_cuenta_corrienteForeignKey;
			
		} catch(Exception $e) {
			
			if($conWithConnection) {
				$this->connexion->getConnection()->rollback();						
			}
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
		} finally {
			if($conWithConnection) {
				$this->connexion->getConnection()->close();	
			}
		}
	}
	
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery='',$retiro_cuenta_corrienteForeignKey,$retiro_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$retiro_cuenta_corrienteForeignKey->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($retiro_cuenta_corriente_session==null) {
			$retiro_cuenta_corriente_session=new retiro_cuenta_corriente_session();
		}
		
		if($retiro_cuenta_corriente_session->bitBusquedaDesdeFKSesionempresa!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=empresa_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalempresa=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalempresa=Funciones::GetFinalQueryAppend($finalQueryGlobalempresa, '');
				$finalQueryGlobalempresa.=empresa_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalempresa.$strRecargarFkQuery;		

				$empresaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($empresaLogic->getempresas() as $empresaLocal ) {
				if($retiro_cuenta_corrienteForeignKey->idempresaDefaultFK==0) {
					$retiro_cuenta_corrienteForeignKey->idempresaDefaultFK=$empresaLocal->getId();
				}

				$retiro_cuenta_corrienteForeignKey->empresasFK[$empresaLocal->getId()]=retiro_cuenta_corriente_util::getempresaDescripcion($empresaLocal);
			}

		} else {

			if($retiro_cuenta_corriente_session->bigidempresaActual!=null && $retiro_cuenta_corriente_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($retiro_cuenta_corriente_session->bigidempresaActual);//WithConnection

				$retiro_cuenta_corrienteForeignKey->empresasFK[$empresaLogic->getempresa()->getId()]=retiro_cuenta_corriente_util::getempresaDescripcion($empresaLogic->getempresa());
				$retiro_cuenta_corrienteForeignKey->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombossucursalsFK($connexion=null,$strRecargarFkQuery='',$retiro_cuenta_corrienteForeignKey,$retiro_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$sucursalLogic= new sucursal_logic();
		$pagination= new Pagination();
		$retiro_cuenta_corrienteForeignKey->sucursalsFK=array();

		$sucursalLogic->setConnexion($connexion);
		$sucursalLogic->getsucursalDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($retiro_cuenta_corriente_session==null) {
			$retiro_cuenta_corriente_session=new retiro_cuenta_corriente_session();
		}
		
		if($retiro_cuenta_corriente_session->bitBusquedaDesdeFKSesionsucursal!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=sucursal_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalsucursal=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalsucursal=Funciones::GetFinalQueryAppend($finalQueryGlobalsucursal, '');
				$finalQueryGlobalsucursal.=sucursal_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalsucursal.$strRecargarFkQuery;		

				$sucursalLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($sucursalLogic->getsucursals() as $sucursalLocal ) {
				if($retiro_cuenta_corrienteForeignKey->idsucursalDefaultFK==0) {
					$retiro_cuenta_corrienteForeignKey->idsucursalDefaultFK=$sucursalLocal->getId();
				}

				$retiro_cuenta_corrienteForeignKey->sucursalsFK[$sucursalLocal->getId()]=retiro_cuenta_corriente_util::getsucursalDescripcion($sucursalLocal);
			}

		} else {

			if($retiro_cuenta_corriente_session->bigidsucursalActual!=null && $retiro_cuenta_corriente_session->bigidsucursalActual > 0) {
				$sucursalLogic->getEntity($retiro_cuenta_corriente_session->bigidsucursalActual);//WithConnection

				$retiro_cuenta_corrienteForeignKey->sucursalsFK[$sucursalLogic->getsucursal()->getId()]=retiro_cuenta_corriente_util::getsucursalDescripcion($sucursalLogic->getsucursal());
				$retiro_cuenta_corrienteForeignKey->idsucursalDefaultFK=$sucursalLogic->getsucursal()->getId();
			}
		}
	}

	public function cargarCombosejerciciosFK($connexion=null,$strRecargarFkQuery='',$retiro_cuenta_corrienteForeignKey,$retiro_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$ejercicioLogic= new ejercicio_logic();
		$pagination= new Pagination();
		$retiro_cuenta_corrienteForeignKey->ejerciciosFK=array();

		$ejercicioLogic->setConnexion($connexion);
		$ejercicioLogic->getejercicioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($retiro_cuenta_corriente_session==null) {
			$retiro_cuenta_corriente_session=new retiro_cuenta_corriente_session();
		}
		
		if($retiro_cuenta_corriente_session->bitBusquedaDesdeFKSesionejercicio!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=ejercicio_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalejercicio=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalejercicio=Funciones::GetFinalQueryAppend($finalQueryGlobalejercicio, '');
				$finalQueryGlobalejercicio.=ejercicio_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalejercicio.$strRecargarFkQuery;		

				$ejercicioLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($ejercicioLogic->getejercicios() as $ejercicioLocal ) {
				if($retiro_cuenta_corrienteForeignKey->idejercicioDefaultFK==0) {
					$retiro_cuenta_corrienteForeignKey->idejercicioDefaultFK=$ejercicioLocal->getId();
				}

				$retiro_cuenta_corrienteForeignKey->ejerciciosFK[$ejercicioLocal->getId()]=retiro_cuenta_corriente_util::getejercicioDescripcion($ejercicioLocal);
			}

		} else {

			if($retiro_cuenta_corriente_session->bigidejercicioActual!=null && $retiro_cuenta_corriente_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($retiro_cuenta_corriente_session->bigidejercicioActual);//WithConnection

				$retiro_cuenta_corrienteForeignKey->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=retiro_cuenta_corriente_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
				$retiro_cuenta_corrienteForeignKey->idejercicioDefaultFK=$ejercicioLogic->getejercicio()->getId();
			}
		}
	}

	public function cargarCombosperiodosFK($connexion=null,$strRecargarFkQuery='',$retiro_cuenta_corrienteForeignKey,$retiro_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$periodoLogic= new periodo_logic();
		$pagination= new Pagination();
		$retiro_cuenta_corrienteForeignKey->periodosFK=array();

		$periodoLogic->setConnexion($connexion);
		$periodoLogic->getperiodoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($retiro_cuenta_corriente_session==null) {
			$retiro_cuenta_corriente_session=new retiro_cuenta_corriente_session();
		}
		
		if($retiro_cuenta_corriente_session->bitBusquedaDesdeFKSesionperiodo!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=periodo_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalperiodo=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalperiodo=Funciones::GetFinalQueryAppend($finalQueryGlobalperiodo, '');
				$finalQueryGlobalperiodo.=periodo_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalperiodo.$strRecargarFkQuery;		

				$periodoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($periodoLogic->getperiodos() as $periodoLocal ) {
				if($retiro_cuenta_corrienteForeignKey->idperiodoDefaultFK==0) {
					$retiro_cuenta_corrienteForeignKey->idperiodoDefaultFK=$periodoLocal->getId();
				}

				$retiro_cuenta_corrienteForeignKey->periodosFK[$periodoLocal->getId()]=retiro_cuenta_corriente_util::getperiodoDescripcion($periodoLocal);
			}

		} else {

			if($retiro_cuenta_corriente_session->bigidperiodoActual!=null && $retiro_cuenta_corriente_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($retiro_cuenta_corriente_session->bigidperiodoActual);//WithConnection

				$retiro_cuenta_corrienteForeignKey->periodosFK[$periodoLogic->getperiodo()->getId()]=retiro_cuenta_corriente_util::getperiodoDescripcion($periodoLogic->getperiodo());
				$retiro_cuenta_corrienteForeignKey->idperiodoDefaultFK=$periodoLogic->getperiodo()->getId();
			}
		}
	}

	public function cargarCombosusuariosFK($connexion=null,$strRecargarFkQuery='',$retiro_cuenta_corrienteForeignKey,$retiro_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$usuarioLogic= new usuario_logic();
		$pagination= new Pagination();
		$retiro_cuenta_corrienteForeignKey->usuariosFK=array();

		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($retiro_cuenta_corriente_session==null) {
			$retiro_cuenta_corriente_session=new retiro_cuenta_corriente_session();
		}
		
		if($retiro_cuenta_corriente_session->bitBusquedaDesdeFKSesionusuario!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=usuario_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalusuario=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalusuario=Funciones::GetFinalQueryAppend($finalQueryGlobalusuario, '');
				$finalQueryGlobalusuario.=usuario_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalusuario.$strRecargarFkQuery;		

				$usuarioLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($usuarioLogic->getusuarios() as $usuarioLocal ) {
				if($retiro_cuenta_corrienteForeignKey->idusuarioDefaultFK==0) {
					$retiro_cuenta_corrienteForeignKey->idusuarioDefaultFK=$usuarioLocal->getId();
				}

				$retiro_cuenta_corrienteForeignKey->usuariosFK[$usuarioLocal->getId()]=retiro_cuenta_corriente_util::getusuarioDescripcion($usuarioLocal);
			}

		} else {

			if($retiro_cuenta_corriente_session->bigidusuarioActual!=null && $retiro_cuenta_corriente_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($retiro_cuenta_corriente_session->bigidusuarioActual);//WithConnection

				$retiro_cuenta_corrienteForeignKey->usuariosFK[$usuarioLogic->getusuario()->getId()]=retiro_cuenta_corriente_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$retiro_cuenta_corrienteForeignKey->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	public function cargarComboscuenta_corrientesFK($connexion=null,$strRecargarFkQuery='',$retiro_cuenta_corrienteForeignKey,$retiro_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$cuenta_corrienteLogic= new cuenta_corriente_logic();
		$pagination= new Pagination();
		$retiro_cuenta_corrienteForeignKey->cuenta_corrientesFK=array();

		$cuenta_corrienteLogic->setConnexion($connexion);
		$cuenta_corrienteLogic->getcuenta_corrienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($retiro_cuenta_corriente_session==null) {
			$retiro_cuenta_corriente_session=new retiro_cuenta_corriente_session();
		}
		
		if($retiro_cuenta_corriente_session->bitBusquedaDesdeFKSesioncuenta_corriente!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=cuenta_corriente_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalcuenta_corriente=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcuenta_corriente=Funciones::GetFinalQueryAppend($finalQueryGlobalcuenta_corriente, '');
				$finalQueryGlobalcuenta_corriente.=cuenta_corriente_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcuenta_corriente.$strRecargarFkQuery;		

				$cuenta_corrienteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($cuenta_corrienteLogic->getcuenta_corrientes() as $cuenta_corrienteLocal ) {
				if($retiro_cuenta_corrienteForeignKey->idcuenta_corrienteDefaultFK==0) {
					$retiro_cuenta_corrienteForeignKey->idcuenta_corrienteDefaultFK=$cuenta_corrienteLocal->getId();
				}

				$retiro_cuenta_corrienteForeignKey->cuenta_corrientesFK[$cuenta_corrienteLocal->getId()]=retiro_cuenta_corriente_util::getcuenta_corrienteDescripcion($cuenta_corrienteLocal);
			}

		} else {

			if($retiro_cuenta_corriente_session->bigidcuenta_corrienteActual!=null && $retiro_cuenta_corriente_session->bigidcuenta_corrienteActual > 0) {
				$cuenta_corrienteLogic->getEntity($retiro_cuenta_corriente_session->bigidcuenta_corrienteActual);//WithConnection

				$retiro_cuenta_corrienteForeignKey->cuenta_corrientesFK[$cuenta_corrienteLogic->getcuenta_corriente()->getId()]=retiro_cuenta_corriente_util::getcuenta_corrienteDescripcion($cuenta_corrienteLogic->getcuenta_corriente());
				$retiro_cuenta_corrienteForeignKey->idcuenta_corrienteDefaultFK=$cuenta_corrienteLogic->getcuenta_corriente()->getId();
			}
		}
	}

	public function cargarCombosestado_deposito_retirosFK($connexion=null,$strRecargarFkQuery='',$retiro_cuenta_corrienteForeignKey,$retiro_cuenta_corriente_session,$parametroGeneralUsuarioActual,$moduloActual,$arrDatoGeneral,$arrDatoGeneralNo){
		$estado_deposito_retiroLogic= new estado_deposito_retiro_logic();
		$pagination= new Pagination();
		$retiro_cuenta_corrienteForeignKey->estado_deposito_retirosFK=array();

		$estado_deposito_retiroLogic->setConnexion($connexion);
		$estado_deposito_retiroLogic->getestado_deposito_retiroDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		if($retiro_cuenta_corriente_session==null) {
			$retiro_cuenta_corriente_session=new retiro_cuenta_corriente_session();
		}
		
		if($retiro_cuenta_corriente_session->bitBusquedaDesdeFKSesionestado_deposito_retiro!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$arrDatoGeneral= array();
				$arrDatoGeneralNo= array();

				$arrColumnasGlobales=estado_deposito_retiro_util::getArrayColumnasGlobales($arrDatoGeneral,$arrDatoGeneralNo);
				$finalQueryGlobalestado_deposito_retiro=Funciones::GetWhereGlobalConstants($parametroGeneralUsuarioActual,$moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalestado_deposito_retiro=Funciones::GetFinalQueryAppend($finalQueryGlobalestado_deposito_retiro, '');
				$finalQueryGlobalestado_deposito_retiro.=estado_deposito_retiro_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalestado_deposito_retiro.$strRecargarFkQuery;		

				$estado_deposito_retiroLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}

			foreach ($estado_deposito_retiroLogic->getestado_deposito_retiros() as $estado_deposito_retiroLocal ) {
				if($retiro_cuenta_corrienteForeignKey->idestado_deposito_retiroDefaultFK==0) {
					$retiro_cuenta_corrienteForeignKey->idestado_deposito_retiroDefaultFK=$estado_deposito_retiroLocal->getId();
				}

				$retiro_cuenta_corrienteForeignKey->estado_deposito_retirosFK[$estado_deposito_retiroLocal->getId()]=retiro_cuenta_corriente_util::getestado_deposito_retiroDescripcion($estado_deposito_retiroLocal);
			}

		} else {

			if($retiro_cuenta_corriente_session->bigidestado_deposito_retiroActual!=null && $retiro_cuenta_corriente_session->bigidestado_deposito_retiroActual > 0) {
				$estado_deposito_retiroLogic->getEntity($retiro_cuenta_corriente_session->bigidestado_deposito_retiroActual);//WithConnection

				$retiro_cuenta_corrienteForeignKey->estado_deposito_retirosFK[$estado_deposito_retiroLogic->getestado_deposito_retiro()->getId()]=retiro_cuenta_corriente_util::getestado_deposito_retiroDescripcion($estado_deposito_retiroLogic->getestado_deposito_retiro());
				$retiro_cuenta_corrienteForeignKey->idestado_deposito_retiroDefaultFK=$estado_deposito_retiroLogic->getestado_deposito_retiro()->getId();
			}
		}
	}

	
	
	
	
	public function saveRelacionesWithConnection($retiro_cuenta_corriente) {
		$this->saveRelacionesBase($retiro_cuenta_corriente,true);
	}

	public function saveRelaciones($retiro_cuenta_corriente) {
		$this->saveRelacionesBase($retiro_cuenta_corriente,false);
	}

	public function saveRelacionesBase($retiro_cuenta_corriente,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setretiro_cuenta_corriente($retiro_cuenta_corriente);

			if(retiro_cuenta_corriente_logic_add::validarSaveRelaciones($retiro_cuenta_corriente,$this)) {

				retiro_cuenta_corriente_logic_add::updateRelacionesToSave($retiro_cuenta_corriente,$this);

				if(($this->retiro_cuenta_corriente->getIsNew() || $this->retiro_cuenta_corriente->getIsChanged()) && !$this->retiro_cuenta_corriente->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->retiro_cuenta_corriente->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				retiro_cuenta_corriente_logic_add::updateRelacionesToSaveAfter($retiro_cuenta_corriente,$this);

			} else {
				throw new Exception('LOS DATOS SON INVALIDOS');
			}

			if($conWithConnection){
				$this->connexion->getConnection()->commit();
			}

		} catch(Exception $e) {
			if($conWithConnection){
				$this->connexion->getConnection()->rollback();
			}

			Funciones::logShowExceptionMessages($e);

			throw $e;
		} 
		finally {

			if($conWithConnection){
				$this->connexion->getConnection()->close();
			}
		}
	}
	
	
	public function saveRelacionesDetalles() {
		try {
	

		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
	
	/*PROCESAR ACCIONES*/
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $retiro_cuenta_corrientes,retiro_cuenta_corriente_param_return $retiro_cuenta_corrienteParameterGeneral) : retiro_cuenta_corriente_param_return {
		$retiro_cuenta_corrienteReturnGeneral=new retiro_cuenta_corriente_param_return();
	
		 try {	
			
			if($this->retiro_cuenta_corrienteLogicAdditional==null) {
				$this->retiro_cuenta_corrienteLogicAdditional=new retiro_cuenta_corriente_logic_add();
			}
			
			$this->retiro_cuenta_corrienteLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$sProceso,$retiro_cuenta_corrientes,$retiro_cuenta_corrienteParameterGeneral,$retiro_cuenta_corrienteReturnGeneral);
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $retiro_cuenta_corrienteReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $retiro_cuenta_corrientes,retiro_cuenta_corriente_param_return $retiro_cuenta_corrienteParameterGeneral) : retiro_cuenta_corriente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$retiro_cuenta_corrienteReturnGeneral=new retiro_cuenta_corriente_param_return();
	
			
			if($this->retiro_cuenta_corrienteLogicAdditional==null) {
				$this->retiro_cuenta_corrienteLogicAdditional=new retiro_cuenta_corriente_logic_add();
			}
			
			$this->retiro_cuenta_corrienteLogicAdditional->procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$this,$strProceso,$retiro_cuenta_corrientes,$retiro_cuenta_corrienteParameterGeneral,$retiro_cuenta_corrienteReturnGeneral);
			
			$this->connexion->getConnection()->commit();			
			
			return $retiro_cuenta_corrienteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $retiro_cuenta_corrientes,retiro_cuenta_corriente $retiro_cuenta_corriente,retiro_cuenta_corriente_param_return $retiro_cuenta_corrienteParameterGeneral,bool $isEsNuevoretiro_cuenta_corriente,array $clases) : retiro_cuenta_corriente_param_return {
		 try {	
			$retiro_cuenta_corrienteReturnGeneral=new retiro_cuenta_corriente_param_return();
	
			$retiro_cuenta_corrienteReturnGeneral->setretiro_cuenta_corriente($retiro_cuenta_corriente);
			$retiro_cuenta_corrienteReturnGeneral->setretiro_cuenta_corrientes($retiro_cuenta_corrientes);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$retiro_cuenta_corrienteReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			if($this->retiro_cuenta_corrienteLogicAdditional==null) {
				$this->retiro_cuenta_corrienteLogicAdditional=new retiro_cuenta_corriente_logic_add();
			}
			
			$retiro_cuenta_corrienteReturnGeneral=$this->retiro_cuenta_corrienteLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$retiro_cuenta_corrientes,$retiro_cuenta_corriente,$retiro_cuenta_corrienteParameterGeneral,$retiro_cuenta_corrienteReturnGeneral,$isEsNuevoretiro_cuenta_corriente,$clases);
			
			/*retiro_cuenta_corrienteLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$retiro_cuenta_corrientes,$retiro_cuenta_corriente,$retiro_cuenta_corrienteParameterGeneral,$retiro_cuenta_corrienteReturnGeneral,$isEsNuevoretiro_cuenta_corriente,$clases);*/
			
			return $retiro_cuenta_corrienteReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $retiro_cuenta_corrientes,retiro_cuenta_corriente $retiro_cuenta_corriente,retiro_cuenta_corriente_param_return $retiro_cuenta_corrienteParameterGeneral,bool $isEsNuevoretiro_cuenta_corriente,array $clases) : retiro_cuenta_corriente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$retiro_cuenta_corrienteReturnGeneral=new retiro_cuenta_corriente_param_return();
	
			$retiro_cuenta_corrienteReturnGeneral->setretiro_cuenta_corriente($retiro_cuenta_corriente);
			$retiro_cuenta_corrienteReturnGeneral->setretiro_cuenta_corrientes($retiro_cuenta_corrientes);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$retiro_cuenta_corrienteReturnGeneral->setConRecargarPropiedades(true);
			}
			
			if($this->retiro_cuenta_corrienteLogicAdditional==null) {
				$this->retiro_cuenta_corrienteLogicAdditional=new retiro_cuenta_corriente_logic_add();
			}
			
			$retiro_cuenta_corrienteReturnGeneral=$this->retiro_cuenta_corrienteLogicAdditional->procesarEventosGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$retiro_cuenta_corrientes,$retiro_cuenta_corriente,$retiro_cuenta_corrienteParameterGeneral,$retiro_cuenta_corrienteReturnGeneral,$isEsNuevoretiro_cuenta_corriente,$clases);
			
			/*retiro_cuenta_corrienteLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$retiro_cuenta_corrientes,$retiro_cuenta_corriente,$retiro_cuenta_corrienteParameterGeneral,$retiro_cuenta_corrienteReturnGeneral,$isEsNuevoretiro_cuenta_corriente,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $retiro_cuenta_corrienteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $retiro_cuenta_corrientes,retiro_cuenta_corriente $retiro_cuenta_corriente,retiro_cuenta_corriente_param_return $retiro_cuenta_corrienteParameterGeneral,bool $isEsNuevoretiro_cuenta_corriente,array $clases) : retiro_cuenta_corriente_param_return {
		 try {	
			$retiro_cuenta_corrienteReturnGeneral=new retiro_cuenta_corriente_param_return();
	
			$retiro_cuenta_corrienteReturnGeneral->setretiro_cuenta_corriente($retiro_cuenta_corriente);
			$retiro_cuenta_corrienteReturnGeneral->setretiro_cuenta_corrientes($retiro_cuenta_corrientes);
			
			
			
			if($this->retiro_cuenta_corrienteLogicAdditional==null) {
				$this->retiro_cuenta_corrienteLogicAdditional=new retiro_cuenta_corriente_logic_add();
			}
			
			$retiro_cuenta_corrienteReturnGeneral=$this->retiro_cuenta_corrienteLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$retiro_cuenta_corrientes,$retiro_cuenta_corriente,$retiro_cuenta_corrienteParameterGeneral,$retiro_cuenta_corrienteReturnGeneral,$isEsNuevoretiro_cuenta_corriente,$clases);
			
			/*retiro_cuenta_corrienteLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$retiro_cuenta_corrientes,$retiro_cuenta_corriente,$retiro_cuenta_corrienteParameterGeneral,$retiro_cuenta_corrienteReturnGeneral,$isEsNuevoretiro_cuenta_corriente,$clases);*/
			
			return $retiro_cuenta_corrienteReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $retiro_cuenta_corrientes,retiro_cuenta_corriente $retiro_cuenta_corriente,retiro_cuenta_corriente_param_return $retiro_cuenta_corrienteParameterGeneral,bool $isEsNuevoretiro_cuenta_corriente,array $clases) : retiro_cuenta_corriente_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$retiro_cuenta_corrienteReturnGeneral=new retiro_cuenta_corriente_param_return();
	
			$retiro_cuenta_corrienteReturnGeneral->setretiro_cuenta_corriente($retiro_cuenta_corriente);
			$retiro_cuenta_corrienteReturnGeneral->setretiro_cuenta_corrientes($retiro_cuenta_corrientes);
			
			
			if($this->retiro_cuenta_corrienteLogicAdditional==null) {
				$this->retiro_cuenta_corrienteLogicAdditional=new retiro_cuenta_corriente_logic_add();
			}
			
			$retiro_cuenta_corrienteReturnGeneral=$this->retiro_cuenta_corrienteLogicAdditional->procesarPostAccionGeneral($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$retiro_cuenta_corrientes,$retiro_cuenta_corriente,$retiro_cuenta_corrienteParameterGeneral,$retiro_cuenta_corrienteReturnGeneral,$isEsNuevoretiro_cuenta_corriente,$clases);
			
			/*retiro_cuenta_corrienteLogicAdditional::procesarEventos($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$this,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$retiro_cuenta_corrientes,$retiro_cuenta_corriente,$retiro_cuenta_corrienteParameterGeneral,$retiro_cuenta_corrienteReturnGeneral,$isEsNuevoretiro_cuenta_corriente,$clases);*/
			
			$this->connexion->getConnection()->commit();			
			
			return $retiro_cuenta_corrienteReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,retiro_cuenta_corriente $retiro_cuenta_corriente,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,retiro_cuenta_corriente $retiro_cuenta_corriente,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo) {
		retiro_cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys($paqueteTipo);	
	}
	
	
	
	public function deepLoad(retiro_cuenta_corriente $retiro_cuenta_corriente,bool $isDeep,string $deepLoadType,array $clases) {
		$existe=false;
		
		try {
			
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			retiro_cuenta_corriente_logic_add::updateretiro_cuenta_corrienteToGet($this->retiro_cuenta_corriente);
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		$retiro_cuenta_corriente->setempresa($this->retiro_cuenta_corrienteDataAccess->getempresa($this->connexion,$retiro_cuenta_corriente));
		$retiro_cuenta_corriente->setsucursal($this->retiro_cuenta_corrienteDataAccess->getsucursal($this->connexion,$retiro_cuenta_corriente));
		$retiro_cuenta_corriente->setejercicio($this->retiro_cuenta_corrienteDataAccess->getejercicio($this->connexion,$retiro_cuenta_corriente));
		$retiro_cuenta_corriente->setperiodo($this->retiro_cuenta_corrienteDataAccess->getperiodo($this->connexion,$retiro_cuenta_corriente));
		$retiro_cuenta_corriente->setusuario($this->retiro_cuenta_corrienteDataAccess->getusuario($this->connexion,$retiro_cuenta_corriente));
		$retiro_cuenta_corriente->setcuenta_corriente($this->retiro_cuenta_corrienteDataAccess->getcuenta_corriente($this->connexion,$retiro_cuenta_corriente));
		$retiro_cuenta_corriente->setestado_deposito_retiro($this->retiro_cuenta_corrienteDataAccess->getestado_deposito_retiro($this->connexion,$retiro_cuenta_corriente));
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$retiro_cuenta_corriente->setempresa($this->retiro_cuenta_corrienteDataAccess->getempresa($this->connexion,$retiro_cuenta_corriente));
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$retiro_cuenta_corriente->setsucursal($this->retiro_cuenta_corrienteDataAccess->getsucursal($this->connexion,$retiro_cuenta_corriente));
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$retiro_cuenta_corriente->setejercicio($this->retiro_cuenta_corrienteDataAccess->getejercicio($this->connexion,$retiro_cuenta_corriente));
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$retiro_cuenta_corriente->setperiodo($this->retiro_cuenta_corrienteDataAccess->getperiodo($this->connexion,$retiro_cuenta_corriente));
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$retiro_cuenta_corriente->setusuario($this->retiro_cuenta_corrienteDataAccess->getusuario($this->connexion,$retiro_cuenta_corriente));
				continue;
			}

			if($clas->clas==cuenta_corriente::$class.'') {
				$retiro_cuenta_corriente->setcuenta_corriente($this->retiro_cuenta_corrienteDataAccess->getcuenta_corriente($this->connexion,$retiro_cuenta_corriente));
				continue;
			}

			if($clas->clas==estado_deposito_retiro::$class.'') {
				$retiro_cuenta_corriente->setestado_deposito_retiro($this->retiro_cuenta_corrienteDataAccess->getestado_deposito_retiro($this->connexion,$retiro_cuenta_corriente));
				continue;
			}
		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {

		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$retiro_cuenta_corriente->setempresa($this->retiro_cuenta_corrienteDataAccess->getempresa($this->connexion,$retiro_cuenta_corriente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$retiro_cuenta_corriente->setsucursal($this->retiro_cuenta_corrienteDataAccess->getsucursal($this->connexion,$retiro_cuenta_corriente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$retiro_cuenta_corriente->setejercicio($this->retiro_cuenta_corrienteDataAccess->getejercicio($this->connexion,$retiro_cuenta_corriente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$retiro_cuenta_corriente->setperiodo($this->retiro_cuenta_corrienteDataAccess->getperiodo($this->connexion,$retiro_cuenta_corriente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$retiro_cuenta_corriente->setusuario($this->retiro_cuenta_corrienteDataAccess->getusuario($this->connexion,$retiro_cuenta_corriente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$retiro_cuenta_corriente->setcuenta_corriente($this->retiro_cuenta_corrienteDataAccess->getcuenta_corriente($this->connexion,$retiro_cuenta_corriente));
		}
		$existe=false;

		foreach($clases as $clas) {
			if($clas->clas==estado_deposito_retiro::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$retiro_cuenta_corriente->setestado_deposito_retiro($this->retiro_cuenta_corrienteDataAccess->getestado_deposito_retiro($this->connexion,$retiro_cuenta_corriente));
		}
	}
}
else {

	if($deepLoadType==DeepLoadType::$NONE) {

		$retiro_cuenta_corriente->setempresa($this->retiro_cuenta_corrienteDataAccess->getempresa($this->connexion,$retiro_cuenta_corriente));
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepLoad($retiro_cuenta_corriente->getempresa(),$isDeep,$deepLoadType,$clases);
				
		$retiro_cuenta_corriente->setsucursal($this->retiro_cuenta_corrienteDataAccess->getsucursal($this->connexion,$retiro_cuenta_corriente));
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepLoad($retiro_cuenta_corriente->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		$retiro_cuenta_corriente->setejercicio($this->retiro_cuenta_corrienteDataAccess->getejercicio($this->connexion,$retiro_cuenta_corriente));
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepLoad($retiro_cuenta_corriente->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		$retiro_cuenta_corriente->setperiodo($this->retiro_cuenta_corrienteDataAccess->getperiodo($this->connexion,$retiro_cuenta_corriente));
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepLoad($retiro_cuenta_corriente->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		$retiro_cuenta_corriente->setusuario($this->retiro_cuenta_corrienteDataAccess->getusuario($this->connexion,$retiro_cuenta_corriente));
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepLoad($retiro_cuenta_corriente->getusuario(),$isDeep,$deepLoadType,$clases);
				
		$retiro_cuenta_corriente->setcuenta_corriente($this->retiro_cuenta_corrienteDataAccess->getcuenta_corriente($this->connexion,$retiro_cuenta_corriente));
		$cuenta_corrienteLogic= new cuenta_corriente_logic($this->connexion);
		$cuenta_corrienteLogic->deepLoad($retiro_cuenta_corriente->getcuenta_corriente(),$isDeep,$deepLoadType,$clases);
				
		$retiro_cuenta_corriente->setestado_deposito_retiro($this->retiro_cuenta_corrienteDataAccess->getestado_deposito_retiro($this->connexion,$retiro_cuenta_corriente));
		$estado_deposito_retiroLogic= new estado_deposito_retiro_logic($this->connexion);
		$estado_deposito_retiroLogic->deepLoad($retiro_cuenta_corriente->getestado_deposito_retiro(),$isDeep,$deepLoadType,$clases);
				
	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$retiro_cuenta_corriente->setempresa($this->retiro_cuenta_corrienteDataAccess->getempresa($this->connexion,$retiro_cuenta_corriente));
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepLoad($retiro_cuenta_corriente->getempresa(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				$retiro_cuenta_corriente->setsucursal($this->retiro_cuenta_corrienteDataAccess->getsucursal($this->connexion,$retiro_cuenta_corriente));
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepLoad($retiro_cuenta_corriente->getsucursal(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				$retiro_cuenta_corriente->setejercicio($this->retiro_cuenta_corrienteDataAccess->getejercicio($this->connexion,$retiro_cuenta_corriente));
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepLoad($retiro_cuenta_corriente->getejercicio(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				$retiro_cuenta_corriente->setperiodo($this->retiro_cuenta_corrienteDataAccess->getperiodo($this->connexion,$retiro_cuenta_corriente));
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepLoad($retiro_cuenta_corriente->getperiodo(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				$retiro_cuenta_corriente->setusuario($this->retiro_cuenta_corrienteDataAccess->getusuario($this->connexion,$retiro_cuenta_corriente));
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepLoad($retiro_cuenta_corriente->getusuario(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==cuenta_corriente::$class.'') {
				$retiro_cuenta_corriente->setcuenta_corriente($this->retiro_cuenta_corrienteDataAccess->getcuenta_corriente($this->connexion,$retiro_cuenta_corriente));
				$cuenta_corrienteLogic= new cuenta_corriente_logic($this->connexion);
				$cuenta_corrienteLogic->deepLoad($retiro_cuenta_corriente->getcuenta_corriente(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

			if($clas->clas==estado_deposito_retiro::$class.'') {
				$retiro_cuenta_corriente->setestado_deposito_retiro($this->retiro_cuenta_corrienteDataAccess->getestado_deposito_retiro($this->connexion,$retiro_cuenta_corriente));
				$estado_deposito_retiroLogic= new estado_deposito_retiro_logic($this->connexion);
				$estado_deposito_retiroLogic->deepLoad($retiro_cuenta_corriente->getestado_deposito_retiro(),$isDeep,$deepLoadType,$clases);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$retiro_cuenta_corriente->setempresa($this->retiro_cuenta_corrienteDataAccess->getempresa($this->connexion,$retiro_cuenta_corriente));
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepLoad($retiro_cuenta_corriente->getempresa(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$retiro_cuenta_corriente->setsucursal($this->retiro_cuenta_corrienteDataAccess->getsucursal($this->connexion,$retiro_cuenta_corriente));
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepLoad($retiro_cuenta_corriente->getsucursal(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$retiro_cuenta_corriente->setejercicio($this->retiro_cuenta_corrienteDataAccess->getejercicio($this->connexion,$retiro_cuenta_corriente));
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepLoad($retiro_cuenta_corriente->getejercicio(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$retiro_cuenta_corriente->setperiodo($this->retiro_cuenta_corrienteDataAccess->getperiodo($this->connexion,$retiro_cuenta_corriente));
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepLoad($retiro_cuenta_corriente->getperiodo(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$retiro_cuenta_corriente->setusuario($this->retiro_cuenta_corrienteDataAccess->getusuario($this->connexion,$retiro_cuenta_corriente));
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepLoad($retiro_cuenta_corriente->getusuario(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$retiro_cuenta_corriente->setcuenta_corriente($this->retiro_cuenta_corrienteDataAccess->getcuenta_corriente($this->connexion,$retiro_cuenta_corriente));
			$cuenta_corrienteLogic= new cuenta_corriente_logic($this->connexion);
			$cuenta_corrienteLogic->deepLoad($retiro_cuenta_corriente->getcuenta_corriente(),$isDeep,$deepLoadType,$clases);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado_deposito_retiro::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			$retiro_cuenta_corriente->setestado_deposito_retiro($this->retiro_cuenta_corrienteDataAccess->getestado_deposito_retiro($this->connexion,$retiro_cuenta_corriente));
			$estado_deposito_retiroLogic= new estado_deposito_retiro_logic($this->connexion);
			$estado_deposito_retiroLogic->deepLoad($retiro_cuenta_corriente->getestado_deposito_retiro(),$isDeep,$deepLoadType,$clases);
				
		}
	}
}
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		if($existe!=null);
	}
	
	public function deepSave(retiro_cuenta_corriente $retiro_cuenta_corriente,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		$existe=false;
		
		try {
			if($isDeep) {
				$this->cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			}
			
			
			retiro_cuenta_corriente_logic_add::updateretiro_cuenta_corrienteToSave($this->retiro_cuenta_corriente);			
			
			if(!$paraDeleteCascade) {				
				retiro_cuenta_corriente_data::save($retiro_cuenta_corriente, $this->connexion);
			}
			
			
if(!$isDeep) {

	if($deepLoadType==DeepLoadType::$NONE) {

		empresa_data::save($retiro_cuenta_corriente->getempresa(),$this->connexion);
		sucursal_data::save($retiro_cuenta_corriente->getsucursal(),$this->connexion);
		ejercicio_data::save($retiro_cuenta_corriente->getejercicio(),$this->connexion);
		periodo_data::save($retiro_cuenta_corriente->getperiodo(),$this->connexion);
		usuario_data::save($retiro_cuenta_corriente->getusuario(),$this->connexion);
		cuenta_corriente_data::save($retiro_cuenta_corriente->getcuenta_corriente(),$this->connexion);
		estado_deposito_retiro_data::save($retiro_cuenta_corriente->getestado_deposito_retiro(),$this->connexion);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($retiro_cuenta_corriente->getempresa(),$this->connexion);
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($retiro_cuenta_corriente->getsucursal(),$this->connexion);
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($retiro_cuenta_corriente->getejercicio(),$this->connexion);
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($retiro_cuenta_corriente->getperiodo(),$this->connexion);
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($retiro_cuenta_corriente->getusuario(),$this->connexion);
				continue;
			}

			if($clas->clas==cuenta_corriente::$class.'') {
				cuenta_corriente_data::save($retiro_cuenta_corriente->getcuenta_corriente(),$this->connexion);
				continue;
			}

			if($clas->clas==estado_deposito_retiro::$class.'') {
				estado_deposito_retiro_data::save($retiro_cuenta_corriente->getestado_deposito_retiro(),$this->connexion);
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			empresa_data::save($retiro_cuenta_corriente->getempresa(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($retiro_cuenta_corriente->getsucursal(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($retiro_cuenta_corriente->getejercicio(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($retiro_cuenta_corriente->getperiodo(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($retiro_cuenta_corriente->getusuario(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_corriente_data::save($retiro_cuenta_corriente->getcuenta_corriente(),$this->connexion);
		}


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado_deposito_retiro::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estado_deposito_retiro_data::save($retiro_cuenta_corriente->getestado_deposito_retiro(),$this->connexion);
		}

	}
}
else {
	if($deepLoadType==DeepLoadType::$NONE) {


		empresa_data::save($retiro_cuenta_corriente->getempresa(),$this->connexion);
		$empresaLogic= new empresa_logic($this->connexion);
		$empresaLogic->deepSave($retiro_cuenta_corriente->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		sucursal_data::save($retiro_cuenta_corriente->getsucursal(),$this->connexion);
		$sucursalLogic= new sucursal_logic($this->connexion);
		$sucursalLogic->deepSave($retiro_cuenta_corriente->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		ejercicio_data::save($retiro_cuenta_corriente->getejercicio(),$this->connexion);
		$ejercicioLogic= new ejercicio_logic($this->connexion);
		$ejercicioLogic->deepSave($retiro_cuenta_corriente->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		periodo_data::save($retiro_cuenta_corriente->getperiodo(),$this->connexion);
		$periodoLogic= new periodo_logic($this->connexion);
		$periodoLogic->deepSave($retiro_cuenta_corriente->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		usuario_data::save($retiro_cuenta_corriente->getusuario(),$this->connexion);
		$usuarioLogic= new usuario_logic($this->connexion);
		$usuarioLogic->deepSave($retiro_cuenta_corriente->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		cuenta_corriente_data::save($retiro_cuenta_corriente->getcuenta_corriente(),$this->connexion);
		$cuenta_corrienteLogic= new cuenta_corriente_logic($this->connexion);
		$cuenta_corrienteLogic->deepSave($retiro_cuenta_corriente->getcuenta_corriente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);

		estado_deposito_retiro_data::save($retiro_cuenta_corriente->getestado_deposito_retiro(),$this->connexion);
		$estado_deposito_retiroLogic= new estado_deposito_retiro_logic($this->connexion);
		$estado_deposito_retiroLogic->deepSave($retiro_cuenta_corriente->getestado_deposito_retiro(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);	}
	else if($deepLoadType==DeepLoadType::$INCLUDE) {

		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				empresa_data::save($retiro_cuenta_corriente->getempresa(),$this->connexion);
				$empresaLogic= new empresa_logic($this->connexion);
				$empresaLogic->deepSave($retiro_cuenta_corriente->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==sucursal::$class.'') {
				sucursal_data::save($retiro_cuenta_corriente->getsucursal(),$this->connexion);
				$sucursalLogic= new sucursal_logic($this->connexion);
				$sucursalLogic->deepSave($retiro_cuenta_corriente->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==ejercicio::$class.'') {
				ejercicio_data::save($retiro_cuenta_corriente->getejercicio(),$this->connexion);
				$ejercicioLogic= new ejercicio_logic($this->connexion);
				$ejercicioLogic->deepSave($retiro_cuenta_corriente->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==periodo::$class.'') {
				periodo_data::save($retiro_cuenta_corriente->getperiodo(),$this->connexion);
				$periodoLogic= new periodo_logic($this->connexion);
				$periodoLogic->deepSave($retiro_cuenta_corriente->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==usuario::$class.'') {
				usuario_data::save($retiro_cuenta_corriente->getusuario(),$this->connexion);
				$usuarioLogic= new usuario_logic($this->connexion);
				$usuarioLogic->deepSave($retiro_cuenta_corriente->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==cuenta_corriente::$class.'') {
				cuenta_corriente_data::save($retiro_cuenta_corriente->getcuenta_corriente(),$this->connexion);
				$cuenta_corrienteLogic= new cuenta_corriente_logic($this->connexion);
				$cuenta_corrienteLogic->deepSave($retiro_cuenta_corriente->getcuenta_corriente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

			if($clas->clas==estado_deposito_retiro::$class.'') {
				estado_deposito_retiro_data::save($retiro_cuenta_corriente->getestado_deposito_retiro(),$this->connexion);
				$estado_deposito_retiroLogic= new estado_deposito_retiro_logic($this->connexion);
				$estado_deposito_retiroLogic->deepSave($retiro_cuenta_corriente->getestado_deposito_retiro(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);				
				continue;
			}

		}
	}
	else if($deepLoadType==DeepLoadType::$EXCLUDE) {


		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==empresa::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			empresa_data::save($retiro_cuenta_corriente->getempresa(),$this->connexion);
			$empresaLogic= new empresa_logic($this->connexion);
			$empresaLogic->deepSave($retiro_cuenta_corriente->getempresa(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==sucursal::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			sucursal_data::save($retiro_cuenta_corriente->getsucursal(),$this->connexion);
			$sucursalLogic= new sucursal_logic($this->connexion);
			$sucursalLogic->deepSave($retiro_cuenta_corriente->getsucursal(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==ejercicio::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			ejercicio_data::save($retiro_cuenta_corriente->getejercicio(),$this->connexion);
			$ejercicioLogic= new ejercicio_logic($this->connexion);
			$ejercicioLogic->deepSave($retiro_cuenta_corriente->getejercicio(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==periodo::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			periodo_data::save($retiro_cuenta_corriente->getperiodo(),$this->connexion);
			$periodoLogic= new periodo_logic($this->connexion);
			$periodoLogic->deepSave($retiro_cuenta_corriente->getperiodo(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==usuario::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			usuario_data::save($retiro_cuenta_corriente->getusuario(),$this->connexion);
			$usuarioLogic= new usuario_logic($this->connexion);
			$usuarioLogic->deepSave($retiro_cuenta_corriente->getusuario(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==cuenta_corriente::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			cuenta_corriente_data::save($retiro_cuenta_corriente->getcuenta_corriente(),$this->connexion);
			$cuenta_corrienteLogic= new cuenta_corriente_logic($this->connexion);
			$cuenta_corrienteLogic->deepSave($retiro_cuenta_corriente->getcuenta_corriente(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}

		$existe=false;


		foreach($clases as $clas) {
			if($clas->clas==estado_deposito_retiro::$class.'') {
				$existe=true;
				break;
			}
		}

		if(!$existe) {
			estado_deposito_retiro_data::save($retiro_cuenta_corriente->getestado_deposito_retiro(),$this->connexion);
			$estado_deposito_retiroLogic= new estado_deposito_retiro_logic($this->connexion);
			$estado_deposito_retiroLogic->deepSave($retiro_cuenta_corriente->getestado_deposito_retiro(),$isDeep,$deepLoadType,$clases,$paraDeleteCascade);
				
		}
	}
}
			
			if($paraDeleteCascade) {				
				retiro_cuenta_corriente_data::save($retiro_cuenta_corriente, $this->connexion);
			}
			
		}catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}	
		
		if($existe!=null);
	}
		
	public function deepLoadWithConnection(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje) {		
		try {
			$this->getNewConnexionToDeep();
			
			$this->deepLoad($this->retiro_cuenta_corriente,$isDeep,$deepLoadType,$clases);		
			
			$this->connexion->getConnection()->commit();			
			
		}  catch(Exception $e) {
			$this->connexion->getConnection()->rollback();			
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		} finally {
			$this->closeNewConnexionToDeep();
  		}
	}
	
	public function deepLoadsWithConnection(bool $isDeep,string $deepLoadType, array $clases,string $strTituloMensaje) {		
		try {
			$this->getNewConnexionToDeep();
			
			foreach($this->retiro_cuenta_corrientes as $retiro_cuenta_corriente) {
				$this->deepLoad($retiro_cuenta_corriente,$isDeep,$deepLoadType,$clases);
								
				retiro_cuenta_corriente_util::refrescarFKDescripciones($this->retiro_cuenta_corrientes);
			}
			
			Funciones::resetearActivoClasses($clases);
								
			$this->connexion->getConnection()->commit();			
			
		}  catch(Exception $e) {
			$this->connexion->getConnection()->rollback();			
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		} finally{
			$this->closeNewConnexionToDeep();
  		}
	}
	
	public function deepLoads(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje) {		
		try {
			
			foreach($this->retiro_cuenta_corrientes as $retiro_cuenta_corriente) {
				$this->deepLoad($retiro_cuenta_corriente,$isDeep,$deepLoadType,$clases);
				
				Funciones::resetearActivoClasses($clases);
			}
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
		
	public function deepSaveWithConnection(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje) {		
		try {	
			$this->getNewConnexionToDeep();
			
			$this->deepSave($this->retiro_cuenta_corriente,$isDeep,$deepLoadType,$clases,false);	
			
			$this->connexion->getConnection()->commit();			
			
		}  catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		} finally {
			$this->closeNewConnexionToDeep();
  		}
	}
	
	public function deepSavesWithConnection(bool $isDeep,string $deepLoadType, array $clases,string $strTituloMensaje) {		
		try {				
			$this->getNewConnexionToDeep();
			
			foreach($this->retiro_cuenta_corrientes as $retiro_cuenta_corriente) {
				$this->deepSave($retiro_cuenta_corriente,$isDeep,$deepLoadType,$clases,false);
				Funciones::resetearActivoClasses($clases);
			}		
			
			$this->connexion->getConnection()->commit();
			
		}  catch(Exception $e) {
			$this->connexion->getConnection()->rollback();			
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		} finally {
			$this->closeNewConnexionToDeep();
  		}
	}
	
	public function deepSaves(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje) {		
		try {				
			foreach($this->retiro_cuenta_corrientes as $retiro_cuenta_corriente) {
				$this->deepSave($retiro_cuenta_corriente,$isDeep,$deepLoadType,$clases,false);
				Funciones::resetearActivoClasses($clases);
			}		
					
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function getClassesFKsOf(array $classesP,string $deepLoadType) : array {
		try {
			$classes=array();	
			
			if($deepLoadType==DeepLoadType::$NONE) {
				
				$classes[]=new Classe(empresa::$class);
				$classes[]=new Classe(sucursal::$class);
				$classes[]=new Classe(ejercicio::$class);
				$classes[]=new Classe(periodo::$class);
				$classes[]=new Classe(usuario::$class);
				$classes[]=new Classe(cuenta_corriente::$class);
				$classes[]=new Classe(estado_deposito_retiro::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas)
				{
					if($clas->clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==sucursal::$class) {
						$classes[]=new Classe(sucursal::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==ejercicio::$class) {
						$classes[]=new Classe(ejercicio::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==periodo::$class) {
						$classes[]=new Classe(periodo::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==usuario::$class) {
						$classes[]=new Classe(usuario::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==cuenta_corriente::$class) {
						$classes[]=new Classe(cuenta_corriente::$class);
					}
				}

				foreach($classesP as $clas)
				{
					if($clas->clas==estado_deposito_retiro::$class) {
						$classes[]=new Classe(estado_deposito_retiro::$class);
					}
				}

			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==empresa::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(empresa::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==sucursal::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(sucursal::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==ejercicio::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(ejercicio::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==periodo::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(periodo::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==usuario::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(usuario::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==cuenta_corriente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta_corriente::$class);
				}

				$existe=false;

				foreach($classesP as $clas)
				{
					if($clas->clas==estado_deposito_retiro::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(estado_deposito_retiro::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
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
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	
	
		
	
	/*CLASES COMPUESTOS GETs SETs*/
	
	
	
	
	
	
	
	public function getretiro_cuenta_corriente() : ?retiro_cuenta_corriente {	
		/*
		retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToGet($this->retiro_cuenta_corriente,$this->datosCliente);
		retiro_cuenta_corriente_logic_add::updateretiro_cuenta_corrienteToGet($this->retiro_cuenta_corriente);
		*/
			
		return $this->retiro_cuenta_corriente;
	}
		
	public function setretiro_cuenta_corriente(retiro_cuenta_corriente $newretiro_cuenta_corriente) {
		$this->retiro_cuenta_corriente = $newretiro_cuenta_corriente;
	}
	
	public function getretiro_cuenta_corrientes() : array {		
		/*
		retiro_cuenta_corriente_logic_add::checkretiro_cuenta_corrienteToGets($this->retiro_cuenta_corrientes,$this->datosCliente);
		
		foreach ($this->retiro_cuenta_corrientes as $retiro_cuenta_corrienteLocal ) {
			retiro_cuenta_corriente_logic_add::updateretiro_cuenta_corrienteToGet($retiro_cuenta_corrienteLocal);
		}
		*/
		
		return $this->retiro_cuenta_corrientes;
	}
	
	public function setretiro_cuenta_corrientes(array $newretiro_cuenta_corrientes) {
		$this->retiro_cuenta_corrientes = $newretiro_cuenta_corrientes;
	}
	
	public function getretiro_cuenta_corrienteDataAccess() : retiro_cuenta_corriente_data {
		return $this->retiro_cuenta_corrienteDataAccess;
	}
	
	public function setretiro_cuenta_corrienteDataAccess(retiro_cuenta_corriente_data $newretiro_cuenta_corrienteDataAccess) {
		$this->retiro_cuenta_corrienteDataAccess = $newretiro_cuenta_corrienteDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        retiro_cuenta_corriente_carga::$CONTROLLER;;        
		
		//REL DETALLES
		
    }
	
	
	/*
		executeQuery,executeQueryValor
		getTodos,getsFK_Idempresa
		getEntity,getEntityWithFinalQuery
		getEntities,getEntitiesWithFinalQuery
		getEntitiesWithQuerySelect,getEntitiesWithQuerySelect
		getEntitiesSimpleQueryBuild
		save,saves
		saveRelaciones,saveRelacionesDetalles
		quitarEliminados,deleteCascade
		loadFKsDescription
		cargarCombosLoteFK
		procesarAccions,procesarEventos,procesarPostAccions
		cargarArchivosPaquetesForeignKeys,cargarArchivosPaquetesRelaciones
		getClassesFKsOf,getClassesRelsOf
		getentity,getentities
		deepLoad,deepSave
	*/
}
?>
