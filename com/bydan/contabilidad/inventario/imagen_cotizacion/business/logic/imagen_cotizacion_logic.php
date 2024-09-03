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

namespace com\bydan\contabilidad\inventario\imagen_cotizacion\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\inventario\imagen_cotizacion\util\imagen_cotizacion_carga;
use com\bydan\contabilidad\inventario\imagen_cotizacion\util\imagen_cotizacion_param_return;


use com\bydan\framework\contabilidad\util\Connexion;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\ParameterDbType;



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

use com\bydan\contabilidad\inventario\imagen_cotizacion\util\imagen_cotizacion_util;
use com\bydan\contabilidad\inventario\imagen_cotizacion\business\entity\imagen_cotizacion;
use com\bydan\contabilidad\inventario\imagen_cotizacion\business\data\imagen_cotizacion_data;

//FK


//REL


//REL DETALLES




class imagen_cotizacion_logic  extends GeneralEntityLogic implements imagen_cotizacion_logicI {	
	/*GENERAL*/
	public imagen_cotizacion_data $imagen_cotizacionDataAccess;
	//public ?imagen_cotizacion_logic_add $imagen_cotizacionLogicAdditional=null;
	public ?imagen_cotizacion $imagen_cotizacion;
	public array $imagen_cotizacions;
	
	/*CLASES COMPUESTOS*/
	
	function __construct(Connexion $newConnexion=null){		
		try {
			
			parent::__construct();
			
			/*GENERAL*/
			$this->imagen_cotizacionDataAccess = new imagen_cotizacion_data();			
			$this->imagen_cotizacions = array();
			$this->imagen_cotizacion = new imagen_cotizacion();
			
			/*AUXILIAR*/
			$this->connexion = $newConnexion;
			$this->parameterDbType = ParameterDbType::$MYSQL;								
			
			/*AUTOREFERENCIA INFINITA TALVEZ
			$this->imagen_cotizacionLogicAdditional = new imagen_cotizacion_logic_add();
			CLASES COMPUESTOS*/
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	  	}	 
    }	
	
	public function inicializarLogicAdditional() {
		//if($this->imagen_cotizacionLogicAdditional==null) {
		//	$this->imagen_cotizacionLogicAdditional=new imagen_cotizacion_logic_add();
		//}
	}
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute) {
		try {			
			$this->connexion=Connexion::getNewConnexion();					
			$this->imagen_cotizacionDataAccess->executeQuery($this->connexion, $sQueryExecute);			
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
			$this->imagen_cotizacionDataAccess->executeQuery($this->connexion, $sQueryExecute);   	       	 			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	} 		
	}
	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo) {
		try {
			$valor=null;			
			$this->connexion=Connexion::getNewConnexion();					
			$valor=$this->imagen_cotizacionDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo);			
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
			$valor=$this->imagen_cotizacionDataAccess->executeQueryValor($this->connexion, $sQueryExecute,$sNombreCampo); 			
			return $valor;	
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodos(string $strFinalQuery,Pagination $pagination) {		
		$this->imagen_cotizacions = array();
		
		try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_cotizacions=$this->imagen_cotizacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_cotizacion_util::refrescarFKDescripciones($this->imagen_cotizacions);
			}
			
			//imagen_cotizacion_logic_add::checkimagen_cotizacionToGets($this->imagen_cotizacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_cotizacions);

		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination) {		
		$this->imagen_cotizacions = array();
		
		try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters("");	
			$queryWhereSelectParameters->setPagination($pagination);
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_cotizacions=$this->imagen_cotizacionDataAccess->getEntities($this->connexion,$queryWhereSelectParameters);				
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_cotizacion_util::refrescarFKDescripciones($this->imagen_cotizacions);
			}
			
			//imagen_cotizacion_logic_add::checkimagen_cotizacionToGets($this->imagen_cotizacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_cotizacions);
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
		$this->imagen_cotizacion = new imagen_cotizacion();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();							
			$this->imagen_cotizacion=$this->imagen_cotizacionDataAccess->getEntity($this->connexion, $id);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_cotizacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_cotizacion_util::refrescarFKDescripcion($this->imagen_cotizacion);
			}
						
			//imagen_cotizacion_logic_add::checkimagen_cotizacionToGet($this->imagen_cotizacion,$this->datosCliente);
			//imagen_cotizacion_logic_add::updateimagen_cotizacionToGet($this->imagen_cotizacion);
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
		$this->imagen_cotizacion = new  imagen_cotizacion();
		  		  
        try {		
			$this->imagen_cotizacion=$this->imagen_cotizacionDataAccess->getEntity($this->connexion, $id);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_cotizacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_cotizacion_util::refrescarFKDescripcion($this->imagen_cotizacion);
			}
			
			//imagen_cotizacion_logic_add::checkimagen_cotizacionToGet($this->imagen_cotizacion,$this->datosCliente);
			//imagen_cotizacion_logic_add::updateimagen_cotizacionToGet($this->imagen_cotizacion);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?imagen_cotizacion {
		$imagen_cotizacionLogic = new  imagen_cotizacion_logic();
		  		  
        try {		
			$imagen_cotizacionLogic->setConnexion($connexion);			
			$imagen_cotizacionLogic->getEntity($id);			
			return $imagen_cotizacionLogic->getimagen_cotizacion();			
		
		} catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='')  {
		$this->imagen_cotizacion = new  imagen_cotizacion();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();				
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);
			
			$this->imagen_cotizacion=$this->imagen_cotizacionDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       	 
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_cotizacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_cotizacion_util::refrescarFKDescripcion($this->imagen_cotizacion);
			}
			
			//imagen_cotizacion_logic_add::checkimagen_cotizacionToGet($this->imagen_cotizacion,$this->datosCliente);
			//imagen_cotizacion_logic_add::updateimagen_cotizacionToGet($this->imagen_cotizacion);
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
		$this->imagen_cotizacion = new  imagen_cotizacion();
		  		  
        try {		
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_cotizacion=$this->imagen_cotizacionDataAccess->getEntityConnexionWhereSelect($this->connexion, $queryWhereSelectParameters);   	       							
			
			if($this->isConDeep) {
				$this->deepLoad($this->imagen_cotizacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());				
				imagen_cotizacion_util::refrescarFKDescripcion($this->imagen_cotizacion);
			}
			
			//imagen_cotizacion_logic_add::checkimagen_cotizacionToGet($this->imagen_cotizacion,$this->datosCliente);
			//imagen_cotizacion_logic_add::updateimagen_cotizacionToGet($this->imagen_cotizacion);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?imagen_cotizacion {
		$imagen_cotizacionLogic = new  imagen_cotizacion_logic();
		  		  
        try {		
			$imagen_cotizacionLogic->setConnexion($connexion);			
			$imagen_cotizacionLogic->getEntityWithFinalQuery($strFinalQuery);			
			return $imagen_cotizacionLogic->getimagen_cotizacion();			
		
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}		
	}
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->imagen_cotizacions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->imagen_cotizacions=$this->imagen_cotizacionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_cotizacion_util::refrescarFKDescripciones($this->imagen_cotizacions);
			}
			
			//imagen_cotizacion_logic_add::checkimagen_cotizacionToGets($this->imagen_cotizacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_cotizacions);			
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
		$this->imagen_cotizacions = array();
		  		  
        try {			
			$this->imagen_cotizacions=$this->imagen_cotizacionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_cotizacion_util::refrescarFKDescripciones($this->imagen_cotizacions);
			}
			
			//imagen_cotizacion_logic_add::checkimagen_cotizacionToGets($this->imagen_cotizacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_cotizacions);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery) {	
		$this->imagen_cotizacions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_cotizacions=$this->imagen_cotizacionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_cotizacion_util::refrescarFKDescripciones($this->imagen_cotizacions);
			}
			
			//imagen_cotizacion_logic_add::checkimagen_cotizacionToGets($this->imagen_cotizacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_cotizacions);
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
		$this->imagen_cotizacions = array();
		  		  
        try {			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_cotizacions=$this->imagen_cotizacionDataAccess->getEntities($this->connexion, $queryWhereSelectParameters);    	       	 			
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_cotizacion_util::refrescarFKDescripciones($this->imagen_cotizacions);
			}
			
			//imagen_cotizacion_logic_add::checkimagen_cotizacionToGets($this->imagen_cotizacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_cotizacions);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array {
		$imagen_cotizacionLogic = new  imagen_cotizacion_logic();
		  		  
        try {		
			$imagen_cotizacionLogic->setConnexion($connexion);			
			$imagen_cotizacionLogic->getEntitiesWithFinalQuery($strFinalQuery);			
			return $imagen_cotizacionLogic->getimagen_cotizacions();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {
		$this->imagen_cotizacions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$this->imagen_cotizacions=$this->imagen_cotizacionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_cotizacion_util::refrescarFKDescripciones($this->imagen_cotizacions);
			}
			
			//imagen_cotizacion_logic_add::checkimagen_cotizacionToGets($this->imagen_cotizacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_cotizacions);
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
		$this->imagen_cotizacions = array();
		  		  
        try {
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_cotizacions=$this->imagen_cotizacionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_cotizacion_util::refrescarFKDescripciones($this->imagen_cotizacions);
			}
			
			//imagen_cotizacion_logic_add::checkimagen_cotizacionToGets($this->imagen_cotizacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_cotizacions);

		}  catch(Exception $e) {				
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery) {
		$this->imagen_cotizacions = array();
		  		  
        try {
			$this->connexion=Connexion::getNewConnexion();						
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);			
			$this->imagen_cotizacions=$this->imagen_cotizacionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_cotizacion_util::refrescarFKDescripciones($this->imagen_cotizacions);
			}
			
			//imagen_cotizacion_logic_add::checkimagen_cotizacionToGets($this->imagen_cotizacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_cotizacions);
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
		$this->imagen_cotizacions = array();
		  		  
        try {			
			$this->imagen_cotizacions=$this->imagen_cotizacionDataAccess->getEntitiesConnexionQuerySelectQueryWhere($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_cotizacion_util::refrescarFKDescripciones($this->imagen_cotizacions);
			}	
			
			//imagen_cotizacion_logic_add::checkimagen_cotizacionToGets($this->imagen_cotizacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_cotizacions);

		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) {	
		$this->imagen_cotizacions = array();
		  		  
        try {			
			$this->connexion=Connexion::getNewConnexion();						
			$this->imagen_cotizacions=$this->imagen_cotizacionDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_cotizacion_util::refrescarFKDescripciones($this->imagen_cotizacions);
			}
			
			//imagen_cotizacion_logic_add::checkimagen_cotizacionToGets($this->imagen_cotizacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_cotizacions);
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
		$this->imagen_cotizacions = array();
		  		  
        try {		
			$this->imagen_cotizacions=$this->imagen_cotizacionDataAccess->getEntitiesSimpleQueryBuild($this->connexion,$strQuerySelect, $queryWhereSelectParameters);    	       	 						
			
			if($this->isConDeep) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_cotizacion_util::refrescarFKDescripciones($this->imagen_cotizacions);
			}
			
			//imagen_cotizacion_logic_add::checkimagen_cotizacionToGets($this->imagen_cotizacions,$this->datosCliente);			
			$this->updateToGetsAuxiliar($this->imagen_cotizacions);

		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
				
	
	/*MANTENIMIENTO*/
	public function saveWithConnection() {	
		 try {	
			$this->connexion = Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
						
			//imagen_cotizacion_logic_add::checkimagen_cotizacionToSave($this->imagen_cotizacion,$this->datosCliente,$this->connexion);	       
			//imagen_cotizacion_logic_add::updateimagen_cotizacionToSave($this->imagen_cotizacion);			
			imagen_cotizacion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->imagen_cotizacion,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());			
			//$this->imagen_cotizacionLogicAdditional->checkGeneralEntityToSave($this,$this->imagen_cotizacion,$this->datosCliente,$this->connexion);
			
			
			imagen_cotizacion_data::save($this->imagen_cotizacion, $this->connexion);	    	       	 				
			//imagen_cotizacion_logic_add::checkimagen_cotizacionToSaveAfter($this->imagen_cotizacion,$this->datosCliente,$this->connexion);			
			//$this->imagen_cotizacionLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->imagen_cotizacion,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->imagen_cotizacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->imagen_cotizacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				imagen_cotizacion_util::refrescarFKDescripcion($this->imagen_cotizacion);				
			}
			
			$this->connexion->getConnection()->commit();						
			
			if($this->imagen_cotizacion->getIsDeleted()) {
				$this->imagen_cotizacion=null;
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
						
			/*imagen_cotizacion_logic_add::checkimagen_cotizacionToSave($this->imagen_cotizacion,$this->datosCliente,$this->connexion);*/	        
			//imagen_cotizacion_logic_add::updateimagen_cotizacionToSave($this->imagen_cotizacion);			
			//$this->imagen_cotizacionLogicAdditional->checkGeneralEntityToSave($this,$this->imagen_cotizacion,$this->datosCliente,$this->connexion);			
			imagen_cotizacion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$this->imagen_cotizacion,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
			
			
			imagen_cotizacion_data::save($this->imagen_cotizacion, $this->connexion);	    	       	 						
			/*imagen_cotizacion_logic_add::checkimagen_cotizacionToSaveAfter($this->imagen_cotizacion,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_cotizacionLogicAdditional->checkGeneralEntityToSaveAfter($this,$this->imagen_cotizacion,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSave($this->imagen_cotizacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),false);
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoad($this->imagen_cotizacion,$this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases());					
				imagen_cotizacion_util::refrescarFKDescripcion($this->imagen_cotizacion);				
			}
			
			if($this->imagen_cotizacion->getIsDeleted()) {
				$this->imagen_cotizacion=null;
			}			
		}  catch(Exception $e) {			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SaveStatic(imagen_cotizacion $imagen_cotizacion,Connexion $connexion)  {
		$imagen_cotizacionLogic = new  imagen_cotizacion_logic();		  		  
        try {		
			$imagen_cotizacionLogic->setConnexion($connexion);			
			$imagen_cotizacionLogic->setimagen_cotizacion($imagen_cotizacion);			
			$imagen_cotizacionLogic->save();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	} 		
	}
	
	public function savesWithConnection() {			
		 try {	
			$this->connexion=Connexion::getNewConnexion();						
			$this->inicializarLogicAdditional();			
			/*imagen_cotizacion_logic_add::checkimagen_cotizacionToSaves($this->imagen_cotizacions,$this->datosCliente,$this->connexion);*/	        	
			//$this->imagen_cotizacionLogicAdditional->checkGeneralEntitiesToSaves($this,$this->imagen_cotizacions,$this->datosCliente,$this->connexion);
			
	   		foreach($this->imagen_cotizacions as $imagen_cotizacionLocal) {				
								
				//imagen_cotizacion_logic_add::updateimagen_cotizacionToSave($imagen_cotizacionLocal);	        	
				imagen_cotizacion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$imagen_cotizacionLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   
			
				imagen_cotizacion_data::save($imagen_cotizacionLocal, $this->connexion);				
			}
			
			/*imagen_cotizacion_logic_add::checkimagen_cotizacionToSavesAfter($this->imagen_cotizacions,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_cotizacionLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->imagen_cotizacions,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_cotizacion_util::refrescarFKDescripciones($this->imagen_cotizacions);
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
			/*imagen_cotizacion_logic_add::checkimagen_cotizacionToSaves($this->imagen_cotizacions,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_cotizacionLogicAdditional->checkGeneralEntitiesToSaves($this,$this->imagen_cotizacions,$this->datosCliente,$this->connexion);
			
	   		foreach($this->imagen_cotizacions as $imagen_cotizacionLocal) {				
								
				//imagen_cotizacion_logic_add::updateimagen_cotizacionToSave($imagen_cotizacionLocal);	        	
				imagen_cotizacion_logic::registrarAuditoria($this->connexion,$this->datosCliente->getIdUsuario(),$imagen_cotizacionLocal,$this->datosCliente->getstrUsuarioPC(),$this->datosCliente->getstrNamePC(),$this->datosCliente->getstrIPPC());
	   			
				
				imagen_cotizacion_data::save($imagen_cotizacionLocal, $this->connexion);				
			}			
			
			/*imagen_cotizacion_logic_add::checkimagen_cotizacionToSavesAfter($this->imagen_cotizacions,$this->datosCliente,$this->connexion);*/			
			//$this->imagen_cotizacionLogicAdditional->checkGeneralEntitiesToSavesAfter($this,$this->imagen_cotizacions,$this->datosCliente,$this->connexion);
			
			if($this->isConDeep) {
				$this->deepSaves($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());
			}
			
			if($this->isConDeepLoad) {
				$this->deepLoads($this->datosDeep->getIsDeep(),$this->datosDeep->getDeepLoadType(), $this->datosDeep->getClases(),$this->datosDeep->getStrTituloMensaje());				
				imagen_cotizacion_util::refrescarFKDescripciones($this->imagen_cotizacions);
			}
			
			$this->quitarEliminados();
			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
	
	public static function SavesStatic(array $imagen_cotizacions,Connexion $connexion)  {
		$imagen_cotizacionLogic = new  imagen_cotizacion_logic();
		  		  
        try {		
			$imagen_cotizacionLogic->setConnexion($connexion);			
			$imagen_cotizacionLogic->setimagen_cotizacions($imagen_cotizacions);			
			$imagen_cotizacionLogic->saves();			
		}  catch(Exception $e) {						
			Funciones::logShowExceptionMessages($e);			
			throw $e;			
      	}
	}
	
	public function quitarEliminados() {						
		$imagen_cotizacionsAux=array();
		
		foreach($this->imagen_cotizacions as $imagen_cotizacion) {
			if($imagen_cotizacion->getIsDeleted()==false) {
				$imagen_cotizacionsAux[]=$imagen_cotizacion;
			}
		}
		
		$this->imagen_cotizacions=$imagen_cotizacionsAux;
	}
	
	public function updateToGetsAuxiliar(array &$imagen_cotizacions) {
	}
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription() {		
		try {
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;			
  		}
	}
	
	/*CARGAR FKs*/
	
	
	
	public function saveRelacionesWithConnection($imagen_cotizacion) {
		$this->saveRelacionesBase($imagen_cotizacion,true);
	}

	public function saveRelaciones($imagen_cotizacion) {
		$this->saveRelacionesBase($imagen_cotizacion,false);
	}

	public function saveRelacionesBase($imagen_cotizacion,$conWithConnection=false) {//WithConnection
		try {
			if($conWithConnection){
				$this->getNewConnexionToDeep();
			}
	
			$this->setimagen_cotizacion($imagen_cotizacion);

			if(true) {

				//imagen_cotizacion_logic_add::updateRelacionesToSave($imagen_cotizacion,$this);

				if(($this->imagen_cotizacion->getIsNew() || $this->imagen_cotizacion->getIsChanged()) && !$this->imagen_cotizacion->getIsDeleted()) {
					$this->save();
					$this->saveRelacionesDetalles();

				} else if($this->imagen_cotizacion->getIsDeleted()) {
					$this->saveRelacionesDetalles();
					$this->save();
				}

				//imagen_cotizacion_logic_add::updateRelacionesToSaveAfter($imagen_cotizacion,$this);

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
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $imagen_cotizacions,imagen_cotizacion_param_return $imagen_cotizacionParameterGeneral) : imagen_cotizacion_param_return {
		$imagen_cotizacionReturnGeneral=new imagen_cotizacion_param_return();
	
		 try {	
			
						
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $imagen_cotizacionReturnGeneral;			
	}
	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $imagen_cotizacions,imagen_cotizacion_param_return $imagen_cotizacionParameterGeneral) : imagen_cotizacion_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$imagen_cotizacionReturnGeneral=new imagen_cotizacion_param_return();
	
			
			$this->connexion->getConnection()->commit();			
			
			return $imagen_cotizacionReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_cotizacions,imagen_cotizacion $imagen_cotizacion,imagen_cotizacion_param_return $imagen_cotizacionParameterGeneral,bool $isEsNuevoimagen_cotizacion,array $clases) : imagen_cotizacion_param_return {
		 try {	
			$imagen_cotizacionReturnGeneral=new imagen_cotizacion_param_return();
	
			$imagen_cotizacionReturnGeneral->setimagen_cotizacion($imagen_cotizacion);
			$imagen_cotizacionReturnGeneral->setimagen_cotizacions($imagen_cotizacions);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$imagen_cotizacionReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			return $imagen_cotizacionReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
	}
		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_cotizacions,imagen_cotizacion $imagen_cotizacion,imagen_cotizacion_param_return $imagen_cotizacionParameterGeneral,bool $isEsNuevoimagen_cotizacion,array $clases) : imagen_cotizacion_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$imagen_cotizacionReturnGeneral=new imagen_cotizacion_param_return();
	
			$imagen_cotizacionReturnGeneral->setimagen_cotizacion($imagen_cotizacion);
			$imagen_cotizacionReturnGeneral->setimagen_cotizacions($imagen_cotizacions);
			
			/*SI ES PARA FORMULARIO-> NUEVO PREPARAR, RECARGAR POR DEFECTO FORMULARIO (PARA MANEJAR VALORES POR DEFECTO)*/
			if($eventoGlobalTipo==EventoGlobalTipo::$FORM_RECARGAR && $controlTipo==ControlTipo::$FORM 
				&& $eventoTipo==EventoTipo::$LOAD && $eventoSubTipo==EventoSubTipo::$NEW 
				&& $sTipo=='FORM') {
				
				$imagen_cotizacionReturnGeneral->setConRecargarPropiedades(true);
			}
			
			
			$this->connexion->getConnection()->commit();			
			
			return $imagen_cotizacionReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();		
		}
	}
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_cotizacions,imagen_cotizacion $imagen_cotizacion,imagen_cotizacion_param_return $imagen_cotizacionParameterGeneral,bool $isEsNuevoimagen_cotizacion,array $clases) : imagen_cotizacion_param_return {
		 try {	
			$imagen_cotizacionReturnGeneral=new imagen_cotizacion_param_return();
	
			$imagen_cotizacionReturnGeneral->setimagen_cotizacion($imagen_cotizacion);
			$imagen_cotizacionReturnGeneral->setimagen_cotizacions($imagen_cotizacions);
			
			
			
			return $imagen_cotizacionReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $imagen_cotizacions,imagen_cotizacion $imagen_cotizacion,imagen_cotizacion_param_return $imagen_cotizacionParameterGeneral,bool $isEsNuevoimagen_cotizacion,array $clases) : imagen_cotizacion_param_return {
		 try {	
			$this->connexion=Connexion::getNewConnexion();
			
			$imagen_cotizacionReturnGeneral=new imagen_cotizacion_param_return();
	
			$imagen_cotizacionReturnGeneral->setimagen_cotizacion($imagen_cotizacion);
			$imagen_cotizacionReturnGeneral->setimagen_cotizacions($imagen_cotizacions);
			
			
			
			$this->connexion->getConnection()->commit();			
			
			return $imagen_cotizacionReturnGeneral;
			
		} catch(Exception $e) {
			$this->connexion->getConnection()->rollback();
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	} finally {
			$this->connexion->getConnection()->close();
		}
	}
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,imagen_cotizacion $imagen_cotizacion,string $strUsuarioPC,string $strNamePC,string $strIPPC){
		/*NO GENERATED*/
	}
	
	public static function registrarAuditoriaDetalles(Connexion $connexion,imagen_cotizacion $imagen_cotizacion,auditoria $auditoriaObj) {		
		/*NO GENERATED*/
	}
	
	
	/*DEEP*/
	
	
	
	public function deepLoad(imagen_cotizacion $imagen_cotizacion,bool $isDeep,string $deepLoadType,array $clases) {
		
		
		try {
			
			
			
			//imagen_cotizacion_logic_add::updateimagen_cotizacionToGet($this->imagen_cotizacion);
			
			
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}
		
		
	}
	
	public function deepSave(imagen_cotizacion $imagen_cotizacion,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false) {		
		
		
		try {
			
			
			//imagen_cotizacion_logic_add::updateimagen_cotizacionToSave($this->imagen_cotizacion);			
			
			if(!$paraDeleteCascade) {				
				imagen_cotizacion_data::save($imagen_cotizacion, $this->connexion);
			}
			
			
			
			if($paraDeleteCascade) {				
				imagen_cotizacion_data::save($imagen_cotizacion, $this->connexion);
			}
			
		}catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
  		}	
		
		
	}
		
	public function deepLoadWithConnection(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje) {		
		try {
			$this->getNewConnexionToDeep();
			
			$this->deepLoad($this->imagen_cotizacion,$isDeep,$deepLoadType,$clases);		
			
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
			
			foreach($this->imagen_cotizacions as $imagen_cotizacion) {
				$this->deepLoad($imagen_cotizacion,$isDeep,$deepLoadType,$clases);
								
				imagen_cotizacion_util::refrescarFKDescripciones($this->imagen_cotizacions);
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
			
			foreach($this->imagen_cotizacions as $imagen_cotizacion) {
				$this->deepLoad($imagen_cotizacion,$isDeep,$deepLoadType,$clases);
				
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
			
			$this->deepSave($this->imagen_cotizacion,$isDeep,$deepLoadType,$clases,false);	
			
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
			
			foreach($this->imagen_cotizacions as $imagen_cotizacion) {
				$this->deepSave($imagen_cotizacion,$isDeep,$deepLoadType,$clases,false);
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
			foreach($this->imagen_cotizacions as $imagen_cotizacion) {
				$this->deepSave($imagen_cotizacion,$isDeep,$deepLoadType,$clases,false);
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
				
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
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
	
	
	
	
	
	
	
	public function getimagen_cotizacion() : ?imagen_cotizacion {	
		/*
		imagen_cotizacion_logic_add::checkimagen_cotizacionToGet($this->imagen_cotizacion,$this->datosCliente);
		imagen_cotizacion_logic_add::updateimagen_cotizacionToGet($this->imagen_cotizacion);
		*/
			
		return $this->imagen_cotizacion;
	}
		
	public function setimagen_cotizacion(imagen_cotizacion $newimagen_cotizacion) {
		$this->imagen_cotizacion = $newimagen_cotizacion;
	}
	
	public function getimagen_cotizacions() : array {		
		/*
		imagen_cotizacion_logic_add::checkimagen_cotizacionToGets($this->imagen_cotizacions,$this->datosCliente);
		
		foreach ($this->imagen_cotizacions as $imagen_cotizacionLocal ) {
			imagen_cotizacion_logic_add::updateimagen_cotizacionToGet($imagen_cotizacionLocal);
		}
		*/
		
		return $this->imagen_cotizacions;
	}
	
	public function setimagen_cotizacions(array $newimagen_cotizacions) {
		$this->imagen_cotizacions = $newimagen_cotizacions;
	}
	
	public function getimagen_cotizacionDataAccess() : imagen_cotizacion_data {
		return $this->imagen_cotizacionDataAccess;
	}
	
	public function setimagen_cotizacionDataAccess(imagen_cotizacion_data $newimagen_cotizacionDataAccess) {
		$this->imagen_cotizacionDataAccess = $newimagen_cotizacionDataAccess;
	}		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {
        $sAuxiliar='';
        $classe=new Classe();
        
        $sAuxiliar=PaqueteTipo::$CONTROLLER;
        $sAuxiliar=Constantes::$STR_ACCIONES;
        
        if($sAuxiliar!=null);
        if($classe!=null);
        
        imagen_cotizacion_carga::$CONTROLLER;;        
		
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
