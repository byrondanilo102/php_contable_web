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
namespace com\bydan\contabilidad\inventario\orden_compra_detalle\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class orden_compra_detalle extends GeneralEntity {

	/*GENERAL*/
	public static string $class='orden_compra_detalle';
	
	/*AUXILIARES*/
	public ?orden_compra_detalle $orden_compra_detalle_Original=null;	
	public ?GeneralEntity $orden_compra_detalle_Additional=null;
	public array $map_orden_compra_detalle=array();	
		
	/*CAMPOS*/
	public int $id_orden_compra = -1;
	public string $id_orden_compra_Descripcion = '';

	public int $id_bodega = -1;
	public string $id_bodega_Descripcion = '';

	public int $id_producto = -1;
	public string $id_producto_Descripcion = '';

	public int $id_unidad = -1;
	public string $id_unidad_Descripcion = '';

	public float $cantidad = 0.0;
	public float $precio = 0.0;
	public float $sub_total = 0.0;
	public float $descuento_porciento = 0.0;
	public float $descuento_monto = 0.0;
	public float $iva_porciento = 0.0;
	public float $iva_monto = 0.0;
	public float $total = 0.0;
	public string $observacion = '';
	public float $recibido = 0.0;
	public float $impuesto2_porciento = 0.0;
	public float $impuesto2_monto = 0.0;
	
	/*FKs*/
	
	public ?orden_compra $orden_compra = null;
	public ?bodega $bodega = null;
	public ?producto $producto = null;
	public ?unidad $unidad = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->orden_compra_detalle_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_orden_compra=-1;
		$this->id_orden_compra_Descripcion='';

 		$this->id_bodega=-1;
		$this->id_bodega_Descripcion='';

 		$this->id_producto=-1;
		$this->id_producto_Descripcion='';

 		$this->id_unidad=-1;
		$this->id_unidad_Descripcion='';

 		$this->cantidad=0.0;
 		$this->precio=0.0;
 		$this->sub_total=0.0;
 		$this->descuento_porciento=0.0;
 		$this->descuento_monto=0.0;
 		$this->iva_porciento=0.0;
 		$this->iva_monto=0.0;
 		$this->total=0.0;
 		$this->observacion='';
 		$this->recibido=0.0;
 		$this->impuesto2_porciento=0.0;
 		$this->impuesto2_monto=0.0;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->orden_compra=new orden_compra();
			$this->bodega=new bodega();
			$this->producto=new producto();
			$this->unidad=new unidad();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->orden_compra_detalle_Additional=new orden_compra_detalle_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_orden_compra_detalle() {
		$this->map_orden_compra_detalle = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_orden_compra() : ?int {
		return $this->id_orden_compra;
	}
	
	public function  getid_orden_compra_Descripcion() : string {
		return $this->id_orden_compra_Descripcion;
	}
    
	public function  getid_bodega() : ?int {
		return $this->id_bodega;
	}
	
	public function  getid_bodega_Descripcion() : string {
		return $this->id_bodega_Descripcion;
	}
    
	public function  getid_producto() : ?int {
		return $this->id_producto;
	}
	
	public function  getid_producto_Descripcion() : string {
		return $this->id_producto_Descripcion;
	}
    
	public function  getid_unidad() : ?int {
		return $this->id_unidad;
	}
	
	public function  getid_unidad_Descripcion() : string {
		return $this->id_unidad_Descripcion;
	}
    
	public function  getcantidad() : ?float {
		return $this->cantidad;
	}
    
	public function  getprecio() : ?float {
		return $this->precio;
	}
    
	public function  getsub_total() : ?float {
		return $this->sub_total;
	}
    
	public function  getdescuento_porciento() : ?float {
		return $this->descuento_porciento;
	}
    
	public function  getdescuento_monto() : ?float {
		return $this->descuento_monto;
	}
    
	public function  getiva_porciento() : ?float {
		return $this->iva_porciento;
	}
    
	public function  getiva_monto() : ?float {
		return $this->iva_monto;
	}
    
	public function  gettotal() : ?float {
		return $this->total;
	}
    
	public function  getobservacion() : ?string {
		return $this->observacion;
	}
    
	public function  getrecibido() : ?float {
		return $this->recibido;
	}
    
	public function  getimpuesto2_porciento() : ?float {
		return $this->impuesto2_porciento;
	}
    
	public function  getimpuesto2_monto() : ?float {
		return $this->impuesto2_monto;
	}
	
    
	public function setid_orden_compra(?int $newid_orden_compra) {
		if($this->id_orden_compra!==$newid_orden_compra) {

				if($newid_orden_compra!==null && filter_var($newid_orden_compra,FILTER_VALIDATE_INT)===false) {
					throw new Exception('orden_compra_detalle:No es numero entero - id_orden_compra');
				}

			$this->id_orden_compra=$newid_orden_compra;
			$this->setIsChanged(true);
		}
	}

	
	public function setid_orden_compra_Descripcion(string $newid_orden_compra_Descripcion) {
		if($this->id_orden_compra_Descripcion!=$newid_orden_compra_Descripcion) {

			$this->id_orden_compra_Descripcion=$newid_orden_compra_Descripcion;
			//$this->setIsChanged(true);
		}
	}
    
	public function setid_bodega(?int $newid_bodega)
	{
		try {
			if($this->id_bodega!==$newid_bodega) {
				if($newid_bodega===null && $newid_bodega!='') {
					throw new Exception('orden_compra_detalle:Valor nulo no permitido en columna id_bodega');
				}

				if($newid_bodega!==null && filter_var($newid_bodega,FILTER_VALIDATE_INT)===false) {
					throw new Exception('orden_compra_detalle:No es numero entero - id_bodega='.$newid_bodega);
				}

				$this->id_bodega=$newid_bodega;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_bodega_Descripcion(string $newid_bodega_Descripcion)
	{
		try {
			if($this->id_bodega_Descripcion!=$newid_bodega_Descripcion) {
				if($newid_bodega_Descripcion===null && $newid_bodega_Descripcion!='') {
					throw new Exception('orden_compra_detalle:Valor nulo no permitido en columna id_bodega');
				}

				$this->id_bodega_Descripcion=$newid_bodega_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_producto(?int $newid_producto)
	{
		try {
			if($this->id_producto!==$newid_producto) {
				if($newid_producto===null && $newid_producto!='') {
					throw new Exception('orden_compra_detalle:Valor nulo no permitido en columna id_producto');
				}

				if($newid_producto!==null && filter_var($newid_producto,FILTER_VALIDATE_INT)===false) {
					throw new Exception('orden_compra_detalle:No es numero entero - id_producto='.$newid_producto);
				}

				$this->id_producto=$newid_producto;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_producto_Descripcion(string $newid_producto_Descripcion)
	{
		try {
			if($this->id_producto_Descripcion!=$newid_producto_Descripcion) {
				if($newid_producto_Descripcion===null && $newid_producto_Descripcion!='') {
					throw new Exception('orden_compra_detalle:Valor nulo no permitido en columna id_producto');
				}

				$this->id_producto_Descripcion=$newid_producto_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_unidad(?int $newid_unidad)
	{
		try {
			if($this->id_unidad!==$newid_unidad) {
				if($newid_unidad===null && $newid_unidad!='') {
					throw new Exception('orden_compra_detalle:Valor nulo no permitido en columna id_unidad');
				}

				if($newid_unidad!==null && filter_var($newid_unidad,FILTER_VALIDATE_INT)===false) {
					throw new Exception('orden_compra_detalle:No es numero entero - id_unidad='.$newid_unidad);
				}

				$this->id_unidad=$newid_unidad;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_unidad_Descripcion(string $newid_unidad_Descripcion)
	{
		try {
			if($this->id_unidad_Descripcion!=$newid_unidad_Descripcion) {
				if($newid_unidad_Descripcion===null && $newid_unidad_Descripcion!='') {
					throw new Exception('orden_compra_detalle:Valor nulo no permitido en columna id_unidad');
				}

				$this->id_unidad_Descripcion=$newid_unidad_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcantidad(?float $newcantidad)
	{
		try {
			if($this->cantidad!==$newcantidad) {
				if($newcantidad===null && $newcantidad!='') {
					throw new Exception('orden_compra_detalle:Valor nulo no permitido en columna cantidad');
				}

				if($newcantidad!=0) {
					if($newcantidad!==null && filter_var($newcantidad,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('orden_compra_detalle:No es numero decimal - cantidad='.$newcantidad);
					}
				}

				$this->cantidad=$newcantidad;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setprecio(?float $newprecio)
	{
		try {
			if($this->precio!==$newprecio) {
				if($newprecio===null && $newprecio!='') {
					throw new Exception('orden_compra_detalle:Valor nulo no permitido en columna precio');
				}

				if($newprecio!=0) {
					if($newprecio!==null && filter_var($newprecio,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('orden_compra_detalle:No es numero decimal - precio='.$newprecio);
					}
				}

				$this->precio=$newprecio;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setsub_total(?float $newsub_total)
	{
		try {
			if($this->sub_total!==$newsub_total) {
				if($newsub_total===null && $newsub_total!='') {
					throw new Exception('orden_compra_detalle:Valor nulo no permitido en columna sub_total');
				}

				if($newsub_total!=0) {
					if($newsub_total!==null && filter_var($newsub_total,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('orden_compra_detalle:No es numero decimal - sub_total='.$newsub_total);
					}
				}

				$this->sub_total=$newsub_total;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdescuento_porciento(?float $newdescuento_porciento)
	{
		try {
			if($this->descuento_porciento!==$newdescuento_porciento) {
				if($newdescuento_porciento===null && $newdescuento_porciento!='') {
					throw new Exception('orden_compra_detalle:Valor nulo no permitido en columna descuento_porciento');
				}

				if($newdescuento_porciento!=0) {
					if($newdescuento_porciento!==null && filter_var($newdescuento_porciento,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('orden_compra_detalle:No es numero decimal - descuento_porciento='.$newdescuento_porciento);
					}
				}

				$this->descuento_porciento=$newdescuento_porciento;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdescuento_monto(?float $newdescuento_monto)
	{
		try {
			if($this->descuento_monto!==$newdescuento_monto) {
				if($newdescuento_monto===null && $newdescuento_monto!='') {
					throw new Exception('orden_compra_detalle:Valor nulo no permitido en columna descuento_monto');
				}

				if($newdescuento_monto!=0) {
					if($newdescuento_monto!==null && filter_var($newdescuento_monto,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('orden_compra_detalle:No es numero decimal - descuento_monto='.$newdescuento_monto);
					}
				}

				$this->descuento_monto=$newdescuento_monto;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setiva_porciento(?float $newiva_porciento)
	{
		try {
			if($this->iva_porciento!==$newiva_porciento) {
				if($newiva_porciento===null && $newiva_porciento!='') {
					throw new Exception('orden_compra_detalle:Valor nulo no permitido en columna iva_porciento');
				}

				if($newiva_porciento!=0) {
					if($newiva_porciento!==null && filter_var($newiva_porciento,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('orden_compra_detalle:No es numero decimal - iva_porciento='.$newiva_porciento);
					}
				}

				$this->iva_porciento=$newiva_porciento;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setiva_monto(?float $newiva_monto)
	{
		try {
			if($this->iva_monto!==$newiva_monto) {
				if($newiva_monto===null && $newiva_monto!='') {
					throw new Exception('orden_compra_detalle:Valor nulo no permitido en columna iva_monto');
				}

				if($newiva_monto!=0) {
					if($newiva_monto!==null && filter_var($newiva_monto,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('orden_compra_detalle:No es numero decimal - iva_monto='.$newiva_monto);
					}
				}

				$this->iva_monto=$newiva_monto;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function settotal(?float $newtotal)
	{
		try {
			if($this->total!==$newtotal) {
				if($newtotal===null && $newtotal!='') {
					throw new Exception('orden_compra_detalle:Valor nulo no permitido en columna total');
				}

				if($newtotal!=0) {
					if($newtotal!==null && filter_var($newtotal,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('orden_compra_detalle:No es numero decimal - total='.$newtotal);
					}
				}

				$this->total=$newtotal;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setobservacion(?string $newobservacion) {
		if($this->observacion!==$newobservacion) {

				if(strlen($newobservacion)>1000) {
					try {
						throw new Exception('orden_compra_detalle:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=observacion en columna observacion');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newobservacion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('orden_compra_detalle:Formato incorrecto en la columna observacion='.$newobservacion);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->observacion=$newobservacion;
			$this->setIsChanged(true);
		}
	}
    
	public function setrecibido(?float $newrecibido)
	{
		try {
			if($this->recibido!==$newrecibido) {
				if($newrecibido===null && $newrecibido!='') {
					throw new Exception('orden_compra_detalle:Valor nulo no permitido en columna recibido');
				}

				if($newrecibido!=0) {
					if($newrecibido!==null && filter_var($newrecibido,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('orden_compra_detalle:No es numero decimal - recibido='.$newrecibido);
					}
				}

				$this->recibido=$newrecibido;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setimpuesto2_porciento(?float $newimpuesto2_porciento)
	{
		try {
			if($this->impuesto2_porciento!==$newimpuesto2_porciento) {
				if($newimpuesto2_porciento===null && $newimpuesto2_porciento!='') {
					throw new Exception('orden_compra_detalle:Valor nulo no permitido en columna impuesto2_porciento');
				}

				if($newimpuesto2_porciento!=0) {
					if($newimpuesto2_porciento!==null && filter_var($newimpuesto2_porciento,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('orden_compra_detalle:No es numero decimal - impuesto2_porciento='.$newimpuesto2_porciento);
					}
				}

				$this->impuesto2_porciento=$newimpuesto2_porciento;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setimpuesto2_monto(?float $newimpuesto2_monto)
	{
		try {
			if($this->impuesto2_monto!==$newimpuesto2_monto) {
				if($newimpuesto2_monto===null && $newimpuesto2_monto!='') {
					throw new Exception('orden_compra_detalle:Valor nulo no permitido en columna impuesto2_monto');
				}

				if($newimpuesto2_monto!=0) {
					if($newimpuesto2_monto!==null && filter_var($newimpuesto2_monto,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('orden_compra_detalle:No es numero decimal - impuesto2_monto='.$newimpuesto2_monto);
					}
				}

				$this->impuesto2_monto=$newimpuesto2_monto;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	public function getorden_compra() : ?orden_compra {
		return $this->orden_compra;
	}

	public function getbodega() : ?bodega {
		return $this->bodega;
	}

	public function getproducto() : ?producto {
		return $this->producto;
	}

	public function getunidad() : ?unidad {
		return $this->unidad;
	}

	
	
	public  function  setorden_compra(?orden_compra $orden_compra) {
		try {
			$this->orden_compra=$orden_compra;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setbodega(?bodega $bodega) {
		try {
			$this->bodega=$bodega;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setproducto(?producto $producto) {
		try {
			$this->producto=$producto;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setunidad(?unidad $unidad) {
		try {
			$this->unidad=$unidad;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_orden_compra_detalleValue(string $sKey,$oValue) {
		$this->map_orden_compra_detalle[$sKey]=$oValue;
	}
	
	public function getMap_orden_compra_detalleValue(string $sKey) {
		return $this->map_orden_compra_detalle[$sKey];
	}
	
	public function getorden_compra_detalle_Original() : ?orden_compra_detalle {
		return $this->orden_compra_detalle_Original;
	}
	
	public function setorden_compra_detalle_Original(orden_compra_detalle $orden_compra_detalle) {
		try {
			$this->orden_compra_detalle_Original=$orden_compra_detalle;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_orden_compra_detalle() : array {
		return $this->map_orden_compra_detalle;
	}

	public function setMap_orden_compra_detalle(array $map_orden_compra_detalle) {
		$this->map_orden_compra_detalle = $map_orden_compra_detalle;
	}
	
	/*
		campo1,campo2,campo3
		tabla1,tabla2,tabla3
		tablas1,tablas2,tablas3
		getcampo1,getcampo2,getcampo3
		settabla1,settabla2,settabla3
	*/
}
?>
