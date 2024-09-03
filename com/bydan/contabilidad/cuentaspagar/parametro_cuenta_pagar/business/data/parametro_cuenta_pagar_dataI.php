<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentaspagar\parametro_cuenta_pagar\business\data;

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

use com\bydan\contabilidad\cuentaspagar\parametro_cuenta_pagar\business\entity\parametro_cuenta_pagar;

//FK


use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\entity\empresa;

//REL



interface parametro_cuenta_pagar_dataI {	
	
	/*MANTENIMIENTO*/
	public static function save(parametro_cuenta_pagar $parametro_cuenta_pagar,Connexion $connexion);	
	public static function savePrepared(parametro_cuenta_pagar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);	
	public static function insert(parametro_cuenta_pagar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);	
	public static function update(parametro_cuenta_pagar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);	
	public static function delete(parametro_cuenta_pagar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);
	
	/*EJECUTAR QUERY*/
	public function executeQuery(Connexion $connexion, string $sQueryExecute);	
	public function executeQueryValor(Connexion $connexion, string $sQueryExecuteValor,string $sNombreCampo);
	
	/*TRAER ENTITY*/
	public function getEntity(Connexion $connexion, ?int $id) : ?parametro_cuenta_pagar;	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?parametro_cuenta_pagar;
	 
	/*TRAER ENTITIES*/
	public function getEntities(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : array;	
	public function getEntitiesConnexionQuerySelectQueryWhere(Connexion $connexion,string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) : array;	
	public function getEntitiesSimpleQueryBuild(Connexion $connexion,string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) : array;
	
	/*----------------------- SELECT COUNT ------------------------*/	
	public function getCountSelect(Connexion $connexion) : int;	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,parametro_cuenta_pagar $entity,Connexion $connexion);
		
	/*-------------------------------- AUXILIARES --------------------------------*/	
	public function getEntityBaseResult(string $strPrefijo,parametro_cuenta_pagar $entity,$resultSet) : parametro_cuenta_pagar;	
	public static function addPrepareStatementParams(string $type,parametro_cuenta_pagar $parametro_cuenta_pagar,$prepare_statement,Connexion $connexion);	
	public static function getPrepareStatementParamsArray(string $type,parametro_cuenta_pagar $parametro_cuenta_pagar,$prepare_statement,Connexion $connexion) : array;	
	public static function preparedQuery(string $sql,array $params) : string;
	
}
?>
