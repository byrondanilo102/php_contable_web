<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\contabilidad\fuente\business\data;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\FuncionesSql;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\data\GetEntitiesDataAccessHelper;

/*use com\bydan\framework\contabilidad\business\entity\GeneralEntity;*/
use com\bydan\framework\contabilidad\business\entity\DatoGeneral;
use com\bydan\framework\contabilidad\business\entity\DatoGeneralMinimo;
use com\bydan\framework\contabilidad\business\entity\DatoGeneralMaximo;
use com\bydan\framework\contabilidad\business\logic\QueryWhereSelectParameters;
use com\bydan\framework\contabilidad\business\logic\Pagination;
use com\bydan\framework\contabilidad\business\data\DataAccessHelper;
use com\bydan\framework\contabilidad\util\Connexion;
use com\bydan\framework\contabilidad\util\ParametersType;

use com\bydan\contabilidad\contabilidad\fuente\business\entity\fuente;

//FK


//REL

use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\data\asiento_predefinido_data;
use com\bydan\contabilidad\contabilidad\asiento_automatico\business\data\asiento_automatico_data;
use com\bydan\contabilidad\contabilidad\asiento\business\data\asiento_data;


interface fuente_dataI {	
	
	/*MANTENIMIENTO*/
	public static function save(fuente $fuente,Connexion $connexion);	
	public static function savePrepared(fuente $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);	
	public static function insert(fuente $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);	
	public static function update(fuente $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);	
	public static function delete(fuente $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);
	
	/*EJECUTAR QUERY*/
	public function executeQuery(Connexion $connexion, string $sQueryExecute);	
	public function executeQueryValor(Connexion $connexion, string $sQueryExecuteValor,string $sNombreCampo);
	
	/*TRAER ENTITY*/
	public function getEntity(Connexion $connexion, ?int $id) : ?fuente;	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?fuente;
	 
	/*TRAER ENTITIES*/
	public function getEntities(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : array;	
	public function getEntitiesConnexionQuerySelectQueryWhere(Connexion $connexion,string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) : array;	
	public function getEntitiesSimpleQueryBuild(Connexion $connexion,string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) : array;
	
	/*----------------------- SELECT COUNT ------------------------*/	
	public function getCountSelect(Connexion $connexion) : int;	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,fuente $entity,Connexion $connexion);
		
	/*-------------------------------- AUXILIARES --------------------------------*/	
	public function getEntityBaseResult(string $strPrefijo,fuente $entity,$resultSet) : fuente;	
	public static function addPrepareStatementParams(string $type,fuente $fuente,$prepare_statement,Connexion $connexion);	
	public static function getPrepareStatementParamsArray(string $type,fuente $fuente,$prepare_statement,Connexion $connexion) : array;	
	public static function preparedQuery(string $sql,array $params) : string;
	
}
?>
