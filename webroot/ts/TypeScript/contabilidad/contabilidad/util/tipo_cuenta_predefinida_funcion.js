//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {tipo_cuenta_predefinida_constante,tipo_cuenta_predefinida_constante1} from '../util/tipo_cuenta_predefinida_constante.js';

class tipo_cuenta_predefinida_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/


//---------- Clic-Buscar ----------

	buscarOnClick() {
		this.procesarInicioBusqueda();
	}
	
	buscarOnComplete() {
		this.procesarFinalizacionBusqueda();
	}
	
	buscarFksOnClick() {
		super.procesarInicioProceso(tipo_cuenta_predefinida_constante1);
	}
	
	

//---------- Clic-Buscar-Auxiliar ----------
	
	procesarInicioBusqueda() {
		funcionGeneral.procesarInicioBusquedaPrincipal(tipo_cuenta_predefinida_constante1.STR_RELATIVE_PATH,"tipo_cuenta_predefinida");		
	}
	
	procesarFinalizacionBusqueda() {
		funcionGeneral.procesarFinalizacionBusquedaPrincipal(tipo_cuenta_predefinida_constante1.STR_RELATIVE_PATH,tipo_cuenta_predefinida_constante1.STR_NOMBRE_OPCION,"tipo_cuenta_predefinida");		
	}	
	
//---------- Clic-Siguiente ----------

	siguientesOnClick() {
		this.procesarInicioBusqueda();
	}
		
	siguientesOnComplete() {
		this.procesarFinalizacionBusqueda();
	}
	
//----------- Clic-Anteriores ---------

	anterioresOnClick() {
		this.procesarInicioBusqueda();
	}
	
	anterioresOnComplete() {
		this.procesarFinalizacionBusqueda();
	}

//---------- Clic-Seleccionar ----------

	seleccionarOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"tipo_cuenta_predefinida");
		
		super.procesarInicioProceso(tipo_cuenta_predefinida_constante1);
	}
	
	seleccionarOnComplete() {
		super.procesarFinalizacionProceso(tipo_cuenta_predefinida_constante1,"tipo_cuenta_predefinida");
	}
	
	
	seleccionarMostrarDivAccionesRelacionesActualOnClick() {
		super.procesarInicioProceso(tipo_cuenta_predefinida_constante1);
	}
		
	seleccionarMostrarDivAccionesRelacionesActualOnComplete() {
		funcionGeneral.seleccionarMostrarDivAccionesRelacionesActualOnComplete("tipo_cuenta_predefinida",this,tipo_cuenta_predefinida_constante1);
	}
	
//---------- Clic-Reporte ----------------

	generarReporteOnClick() {
		this.generarReporteInicio();
	}
		
	generarReporteOnComplete() {
		this.generarReporteFinalizacion();
	}
	
	generarReporteInicio() {
		funcionGeneral.mostrarOcultarProcesando(true,null);
	}	
	
	generarReporteFinalizacion() {
		funcionGeneral.generarReporteFinalizacion(tipo_cuenta_predefinida_constante1.STR_RELATIVE_PATH,tipo_cuenta_predefinida_constante1.STR_NOMBRE_OPCION);
	}
	
//---------- Clic-Generar-Html -----------

	generarHtmlReporteOnClick() {
		super.procesarInicioProceso(tipo_cuenta_predefinida_constante1);
	}		
	
	generarHtmlReporteOnComplete() {
		super.procesarFinalizacionProceso(tipo_cuenta_predefinida_constante1,"tipo_cuenta_predefinida");
	}

//------------- Clic-Actualizar -------------
	
	editarTablaDatosOnClick() {
		super.procesarInicioProceso(tipo_cuenta_predefinida_constante1);
	}		
	
	editarTablaDatosOnComplete() {
		super.procesarFinalizacionProceso(tipo_cuenta_predefinida_constante1,"tipo_cuenta_predefinida");
	}

//------------- Clic-Eliminar --------------

	eliminarTablaOnClick() {
		//super.resaltarRestaurarDivMantenimiento(true,"tipo_cuenta_predefinida");		
		super.procesarInicioProceso(tipo_cuenta_predefinida_constante1);
	}
		
	eliminarTablaOnComplete() {
		super.procesarFinalizacionProceso(tipo_cuenta_predefinida_constante1,"tipo_cuenta_predefinida");
	}
	
//------------ Clic-Guardar-Cambios --------------

	guardarCambiosOnClick() {
		super.procesarInicioProceso(tipo_cuenta_predefinida_constante1);
	}		
	
	guardarCambiosOnComplete() {
		super.procesarFinalizacionProceso(tipo_cuenta_predefinida_constante1,"tipo_cuenta_predefinida");
	}
	
//------------ Clic-Duplicar --------------------

	duplicarOnClick() {
		super.procesarInicioProceso(tipo_cuenta_predefinida_constante1);
	}
	
	duplicarOnComplete() {
		super.procesarFinalizacionProceso(tipo_cuenta_predefinida_constante1,"tipo_cuenta_predefinida");
	}
	
//-------------- Clic-Copiar -------------------

	copiarOnClick() {
		super.procesarInicioProceso(tipo_cuenta_predefinida_constante1);
	}
	
	copiarOnComplete() {
		super.procesarFinalizacionProceso(tipo_cuenta_predefinida_constante1,"tipo_cuenta_predefinida");
	}

	/*---------------------------------- AREA:TABLA ---------------------------*/

//------------- Tabla-Validacion -------------------

	registrarControlesTableValidacionEdition(tipo_cuenta_predefinida_control,tipo_cuenta_predefinida_webcontrol1,tipo_cuenta_predefinida_constante1) {
		
		var strSuf=tipo_cuenta_predefinida_constante1.STR_SUFIJO;
		
		var maxima_fila = jQuery("#t"+strSuf+"-maxima_fila").val();
		var control_name="";
		var control_name_id="";
		var idActual="";
		
		//VALIDACION
		var strRules="";
		var strRulesMessage="";
		var strRulesTotal="";
		
		strRules="{\r\nrules: {";
		strRulesMessage=",messages: {\r\n";
		
		var esPrimerRule=true;
		//VALIDACION
		
		if(maxima_fila!=null && maxima_fila > 0) {
			for (var i = 1; i <= maxima_fila; i++) { 
				/*		
				control_name="t-cel_"+i+"_8";							
				jQuery("#"+control_name).datepicker({ dateFormat: 'yy-mm-dd' });							
				alert(jQuery("#"+control_name).val());
				*/
				
				//ADD CONTROLES FECHA-HORA
				//ADD CONTROLES FECHA-HORA FIN
				
				//FK
				
				//FK FIN																												
				
				//VALIDACION
				// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
				
				
				control_name="t"+strSuf+"-cel_"+i+"_2";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:25';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_3";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:50';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_4";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:150';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

			
				
				
				control_name="t"+strSuf+"-cel_"+i+"_2";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_3";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_4";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
			
				if(esPrimerRule==true) {
					esPrimerRule=false;
				}
				//VALIDACION	
				
				
				//SI SE SUBE ARRIBA CON FK, NO FUNCIONA, ES EXTRA?O
				//FK CHECKBOX EVENTOS
				control_name_id="t"+strSuf+"-cel_"+i+"_0";
				
				
				//FK CHECKBOX EVENTOS FIN
			}					
		}
		
		
		//VALIDACION
		strRules=strRules+'\r\n}\r\n';
		strRulesMessage=strRulesMessage+'\r\n}\r\n}';		
		strRulesTotal=strRules + strRulesMessage;
		
		var json_rules = {};
		
		//alert(strRulesTotal);		
		
		json_rules = eval ('(' + strRulesTotal + ')');				
						
		//alert(json_rules);
		
		jQuery("#frmTablaDatostipo_cuenta_predefinida").validate(json_rules);
		
		//VALIDACION	
	}
	
	//---------- Clic-Nuevo --------------

	nuevoPrepararOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"tipo_cuenta_predefinida");
		
		super.procesarInicioProceso(tipo_cuenta_predefinida_constante1);
	}		
		
	nuevoPrepararOnComplete() {		
		super.procesarFinalizacionProceso(tipo_cuenta_predefinida_constante1,"tipo_cuenta_predefinida");
	}
	
	nuevoTablaPrepararOnClick() {
		super.procesarInicioProceso(tipo_cuenta_predefinida_constante1);
	}
	
	nuevoTablaPrepararOnComplete() {		
		super.procesarFinalizacionProceso(tipo_cuenta_predefinida_constante1,"tipo_cuenta_predefinida");
	}
	






	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(tipo_cuenta_predefinida_constante1.STR_RELATIVE_PATH,"tipo_cuenta_predefinida");		
	}
	
	eliminarOnComplete() {
		
		super.procesarFinalizacionProceso(tipo_cuenta_predefinida_constante1,"tipo_cuenta_predefinida");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(tipo_cuenta_predefinida_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(tipo_cuenta_predefinida_constante1,"tipo_cuenta_predefinida");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(tipo_cuenta_predefinida_constante1,"tipo_cuenta_predefinida");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"tipo_cuenta_predefinida");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(tipo_cuenta_predefinida_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(tipo_cuenta_predefinida_constante1,"tipo_cuenta_predefinida");
	}

	//------------- Formulario-Combo-Accion -------------------

	setTipoColumnaAccion(strValueTipoColumna,idActual) {
		
		if(strValueTipoColumna!=constantes.STR_COLUMNAS && strValueTipoColumna!=null) {
										
			if(jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val() != constantes.STR_COLUMNAS) {
				jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val(constantes.STR_COLUMNAS).trigger("change");
			}
						
			if(strValueTipoColumna=="AuxiliarTemporaMe") {
							
			}
			
			else if(strValueTipoColumna=="Id") {
				jQuery(".col_id").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="VersionRow") {
				jQuery(".col_version_row").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Codigo") {
				jQuery(".col_codigo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nombre") {
				jQuery(".col_nombre").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Descripcion") {
				jQuery(".col_descripcion").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,tipo_cuenta_predefinida_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="cuenta_predefinida" || strValueTipoRelacion=="Cuentas Predefinidas") {
			tipo_cuenta_predefinida_webcontrol1.registrarSesionParacuenta_predefinidaes(idActual);
		}
	}
	
	
	
}

var tipo_cuenta_predefinida_funcion1=new tipo_cuenta_predefinida_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {tipo_cuenta_predefinida_funcion,tipo_cuenta_predefinida_funcion1};

//Para ser llamado desde window.opener
window.tipo_cuenta_predefinida_funcion1 = tipo_cuenta_predefinida_funcion1;



//</script>
