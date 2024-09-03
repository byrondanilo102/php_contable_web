//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {unidad_constante,unidad_constante1} from '../util/unidad_constante.js';

class unidad_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/


//---------- Clic-Buscar ----------

	buscarOnClick() {
		this.procesarInicioBusqueda();
	}
	
	buscarOnComplete() {
		this.procesarFinalizacionBusqueda();
	}
	
	buscarFksOnClick() {
		super.procesarInicioProceso(unidad_constante1);
	}
	
	

//---------- Clic-Buscar-Auxiliar ----------
	
	procesarInicioBusqueda() {
		funcionGeneral.procesarInicioBusquedaPrincipal(unidad_constante1.STR_RELATIVE_PATH,"unidad");		
	}
	
	procesarFinalizacionBusqueda() {
		funcionGeneral.procesarFinalizacionBusquedaPrincipal(unidad_constante1.STR_RELATIVE_PATH,unidad_constante1.STR_NOMBRE_OPCION,"unidad");		
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
		super.resaltarRestaurarDivMantenimiento(true,"unidad");
		
		super.procesarInicioProceso(unidad_constante1);
	}
	
	seleccionarOnComplete() {
		super.procesarFinalizacionProceso(unidad_constante1,"unidad");
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
		funcionGeneral.generarReporteFinalizacion(unidad_constante1.STR_RELATIVE_PATH,unidad_constante1.STR_NOMBRE_OPCION);
	}
	
//---------- Clic-Generar-Html -----------

	generarHtmlReporteOnClick() {
		super.procesarInicioProceso(unidad_constante1);
	}		
	
	generarHtmlReporteOnComplete() {
		super.procesarFinalizacionProceso(unidad_constante1,"unidad");
	}

//------------- Clic-Actualizar -------------
	
	editarTablaDatosOnClick() {
		super.procesarInicioProceso(unidad_constante1);
	}		
	
	editarTablaDatosOnComplete() {
		super.procesarFinalizacionProceso(unidad_constante1,"unidad");
	}

//------------- Clic-Eliminar --------------

	eliminarTablaOnClick() {
		//super.resaltarRestaurarDivMantenimiento(true,"unidad");		
		super.procesarInicioProceso(unidad_constante1);
	}
		
	eliminarTablaOnComplete() {
		super.procesarFinalizacionProceso(unidad_constante1,"unidad");
	}
	
//------------ Clic-Guardar-Cambios --------------

	guardarCambiosOnClick() {
		super.procesarInicioProceso(unidad_constante1);
	}		
	
	guardarCambiosOnComplete() {
		super.procesarFinalizacionProceso(unidad_constante1,"unidad");
	}
	
//------------ Clic-Duplicar --------------------

	duplicarOnClick() {
		super.procesarInicioProceso(unidad_constante1);
	}
	
	duplicarOnComplete() {
		super.procesarFinalizacionProceso(unidad_constante1,"unidad");
	}
	
//-------------- Clic-Copiar -------------------

	copiarOnClick() {
		super.procesarInicioProceso(unidad_constante1);
	}
	
	copiarOnComplete() {
		super.procesarFinalizacionProceso(unidad_constante1,"unidad");
	}

	/*---------------------------------- AREA:TABLA ---------------------------*/

//------------- Tabla-Validacion -------------------

	registrarControlesTableValidacionEdition(unidad_control,unidad_webcontrol1,unidad_constante1) {
		
		var strSuf=unidad_constante1.STR_SUFIJO;
		
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
				
				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_2";
					jQuery("#"+control_name).select2();
				}

				//FK FIN																												
				
				//VALIDACION
				// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
				
				
				control_name="t"+strSuf+"-cel_"+i+"_2";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_3";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:6';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_4";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:20';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				
				
				control_name="t"+strSuf+"-cel_"+i+"_7";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

			
				
				
				control_name="t"+strSuf+"-cel_"+i+"_2";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_3";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_4";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				
				
				control_name="t"+strSuf+"-cel_"+i+"_7";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
			
				if(esPrimerRule==true) {
					esPrimerRule=false;
				}
				//VALIDACION	
				
				
				//SI SE SUBE ARRIBA CON FK, NO FUNCIONA, ES EXTRA?O
				//FK CHECKBOX EVENTOS
				control_name_id="t"+strSuf+"-cel_"+i+"_0";
				
				


				control_name="t"+strSuf+"-cel_"+i+"_2";
				idActual=jQuery("#"+control_name).val();

				if(unidad_control.idempresaDefaultForeignKey!=null && unidad_control.idempresaDefaultForeignKey>-1) {
					idActual=unidad_control.idempresaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					unidad_webcontrol1.cargarComboEditarTablaempresaFK(unidad_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						unidad_webcontrol1.cargarComboEditarTablaempresaFK(unidad_control,control_name,idActual,true);
					}
				});
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
		
		jQuery("#frmTablaDatosunidad").validate(json_rules);
		
		//VALIDACION	
	}
	
	//---------- Clic-Nuevo --------------

	nuevoPrepararOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"unidad");
		
		super.procesarInicioProceso(unidad_constante1);
	}		
		
	nuevoPrepararOnComplete() {		
		super.procesarFinalizacionProceso(unidad_constante1,"unidad");
	}
	
	nuevoTablaPrepararOnClick() {
		super.procesarInicioProceso(unidad_constante1);
	}
	
	nuevoTablaPrepararOnComplete() {		
		super.procesarFinalizacionProceso(unidad_constante1,"unidad");
	}
	






	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(unidad_constante1.STR_RELATIVE_PATH,"unidad");		
	}
	
	eliminarOnComplete() {
		
		super.procesarFinalizacionProceso(unidad_constante1,"unidad");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(unidad_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(unidad_constante1,"unidad");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(unidad_constante1,"unidad");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"unidad");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(unidad_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(unidad_constante1,"unidad");
	}

	//------------- Formulario-Combo-Accion -------------------

	setTipoColumnaAccion(strValueTipoColumna,idActual) {
		
		if(strValueTipoColumna!=constantes.STR_COLUMNAS && strValueTipoColumna!=null) {
										
			if(jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val() != constantes.STR_COLUMNAS) {
				jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val(constantes.STR_COLUMNAS).trigger("change");
			}
						
			if(strValueTipoColumna=="AuxiliarTemporaMe") {
							
			}
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,unidad_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var unidad_funcion1=new unidad_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {unidad_funcion,unidad_funcion1};

//Para ser llamado desde window.opener
window.unidad_funcion1 = unidad_funcion1;



//</script>
