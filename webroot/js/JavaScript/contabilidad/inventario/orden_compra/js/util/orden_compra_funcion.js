//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {orden_compra_constante,orden_compra_constante1} from '../util/orden_compra_constante.js';


class orden_compra_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/
/*---------- Clic-Buscar ----------*/
	buscarOnClick() { 
		this.procesarInicioBusqueda(); 
	}
	
	buscarOnComplete() { 
		this.procesarFinalizacionBusqueda(); 
	}
	
	buscarFksOnClick() { 
		super.procesarInicioProceso(orden_compra_constante1); 
	}
	
	
/*---------- Clic-Buscar-Auxiliar ----------*/
	procesarInicioBusqueda() { 
		funcionGeneral.procesarInicioBusquedaPrincipal(orden_compra_constante1.STR_RELATIVE_PATH,"orden_compra"); 
	}
	
	procesarFinalizacionBusqueda() { 
		funcionGeneral.procesarFinalizacionBusquedaPrincipal(orden_compra_constante1.STR_RELATIVE_PATH,orden_compra_constante1.STR_NOMBRE_OPCION,"orden_compra"); 
	}
/*---------- Clic-Siguiente ----------*/
	siguientesOnClick() { 
		this.procesarInicioBusqueda(); 
	}
	
	siguientesOnComplete() { 
		this.procesarFinalizacionBusqueda(); 
	}
/*----------- Clic-Anteriores ---------*/
	anterioresOnClick() { 
		this.procesarInicioBusqueda(); 
	}
	
	anterioresOnComplete() { 
		this.procesarFinalizacionBusqueda(); 
	}
/*---------- Clic-Seleccionar ----------*/
	seleccionarOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"orden_compra");		
		super.procesarInicioProceso(orden_compra_constante1);
	}
	
	seleccionarOnComplete() { 
		super.procesarFinalizacionProceso(orden_compra_constante1,"orden_compra"); 
	}
	
	
	seleccionarMostrarDivAccionesRelacionesActualOnClick() { 
		super.procesarInicioProceso(orden_compra_constante1); 
	}
	
	seleccionarMostrarDivAccionesRelacionesActualOnComplete() { 
		funcionGeneral.seleccionarMostrarDivAccionesRelacionesActualOnComplete("orden_compra",this,orden_compra_constante1); 
	}
/*---------- Clic-Reporte ----------------*/
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
		funcionGeneral.generarReporteFinalizacion(orden_compra_constante1.STR_RELATIVE_PATH,orden_compra_constante1.STR_NOMBRE_OPCION); 
	}
/*---------- Clic-Generar-Html -----------*/
	generarHtmlReporteOnClick() { 
		super.procesarInicioProceso(orden_compra_constante1); 
	}
	
	generarHtmlReporteOnComplete() { 
		super.procesarFinalizacionProceso(orden_compra_constante1,"orden_compra"); 
	}
/*------------- Clic-Actualizar -------------	*/
	editarTablaDatosOnClick() { 
		super.procesarInicioProceso(orden_compra_constante1); 
	}
	
	editarTablaDatosOnComplete() { 
		super.procesarFinalizacionProceso(orden_compra_constante1,"orden_compra"); 
	}
/*------------- Clic-Eliminar --------------*/
	eliminarTablaOnClick() {
		/*super.resaltarRestaurarDivMantenimiento(true,"orden_compra");*/
		super.procesarInicioProceso(orden_compra_constante1);
	}
	
	eliminarTablaOnComplete() { 
		super.procesarFinalizacionProceso(orden_compra_constante1,"orden_compra"); 
	}
/*------------ Clic-Guardar-Cambios --------------*/
	guardarCambiosOnClick() { 
		super.procesarInicioProceso(orden_compra_constante1); 
	}
	
	guardarCambiosOnComplete() { 
		super.procesarFinalizacionProceso(orden_compra_constante1,"orden_compra"); 
	}
/*------------ Clic-Duplicar --------------------*/
	duplicarOnClick() { 
		super.procesarInicioProceso(orden_compra_constante1); 
	}
	
	duplicarOnComplete() { 
		super.procesarFinalizacionProceso(orden_compra_constante1,"orden_compra"); 
	}
/*-------------- Clic-Copiar -------------------*/
	copiarOnClick() { 
		super.procesarInicioProceso(orden_compra_constante1); 
	}
	
	copiarOnComplete() { 
		super.procesarFinalizacionProceso(orden_compra_constante1,"orden_compra"); 
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
/*------------- Tabla-Validacion -------------------*/
	registrarControlesTableValidacionEdition(orden_compra_control,orden_compra_webcontrol1,orden_compra_constante1) {
		
		var strSuf=orden_compra_constante1.STR_SUFIJO;
		
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
		
		funcionGeneralJQuery.addValidacionesFuncionesGenerales();
		
		if(maxima_fila!=null && maxima_fila > 0) {
			for (var i = 1; i <= maxima_fila; i++) { 
				/*		
				control_name="t-cel_"+i+"_8";							
				jQuery("#"+control_name).datepicker({ dateFormat: 'yy-mm-dd' });							
				alert(jQuery("#"+control_name).val());
				*/
				
				//ADD CONTROLES FECHA-HORA
				

				control_name="t"+strSuf+"-cel_"+i+"_11";
				jQuery("#"+control_name).datepicker({ dateFormat: 'yy-mm-dd' });

				control_name="t"+strSuf+"-cel_"+i+"_14";
				jQuery("#"+control_name).datepicker({ dateFormat: 'yy-mm-dd' });
				//ADD CONTROLES FECHA-HORA FIN
				
				//FK
				
				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_3";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_4";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_5";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_6";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_7";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_9";
					jQuery("#"+control_name).select2();

					orden_compra_webcontrol1.registrarComboActionChangeid_proveedor(control_name,true,i);
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_12";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_13";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_16";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_18";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_39";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_40";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_41";
					jQuery("#"+control_name).select2();
				}

				//FK FIN																												
				
				//VALIDACION
				// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
				
				
				control_name="t"+strSuf+"-cel_"+i+"_3";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_4";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_5";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_6";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_7";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:10';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_9";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:20';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_11";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndate:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_12";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_13";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_14";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndate:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_15";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_16";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				
				control_name="t"+strSuf+"-cel_"+i+"_18";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_19";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:200';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_20";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:200';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_21";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:200';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_22";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_23";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_24";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_25";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_26";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_27";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_28";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_29";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_30";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_31";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_32";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_33";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_34";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_35";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_36";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:20';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				
				control_name="t"+strSuf+"-cel_"+i+"_38";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_39";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_40";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_41";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n';
				strRules=strRules+'\r\n},';

			
				
				
				control_name="t"+strSuf+"-cel_"+i+"_3";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_4";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_5";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_6";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_7";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_9";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_11";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_FECHA_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_12";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_13";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_14";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_FECHA_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_15";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_16";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				
				control_name="t"+strSuf+"-cel_"+i+"_18";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_19";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_20";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_21";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_22";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_23";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_24";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_25";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_26";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_27";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_28";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_29";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_30";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_31";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_32";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_33";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_34";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_35";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_36";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				
				control_name="t"+strSuf+"-cel_"+i+"_38";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_39";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_40";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_41";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
			
				if(esPrimerRule==true) {
					esPrimerRule=false;
				}
				//VALIDACION	
				
				
				//SI SE SUBE ARRIBA CON FK, NO FUNCIONA, ES EXTRA?O
				//FK CHECKBOX EVENTOS
				control_name_id="t"+strSuf+"-cel_"+i+"_0";
				
				


				control_name="t"+strSuf+"-cel_"+i+"_3";
				idActual=jQuery("#"+control_name).val();

				if(orden_compra_control.idempresaDefaultForeignKey!=null && orden_compra_control.idempresaDefaultForeignKey>-1) {
					idActual=orden_compra_control.idempresaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					orden_compra_webcontrol1.cargarComboEditarTablaempresaFK(orden_compra_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						orden_compra_webcontrol1.cargarComboEditarTablaempresaFK(orden_compra_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_4";
				idActual=jQuery("#"+control_name).val();

				if(orden_compra_control.idsucursalDefaultForeignKey!=null && orden_compra_control.idsucursalDefaultForeignKey>-1) {
					idActual=orden_compra_control.idsucursalDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					orden_compra_webcontrol1.cargarComboEditarTablasucursalFK(orden_compra_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						orden_compra_webcontrol1.cargarComboEditarTablasucursalFK(orden_compra_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_5";
				idActual=jQuery("#"+control_name).val();

				if(orden_compra_control.idejercicioDefaultForeignKey!=null && orden_compra_control.idejercicioDefaultForeignKey>-1) {
					idActual=orden_compra_control.idejercicioDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					orden_compra_webcontrol1.cargarComboEditarTablaejercicioFK(orden_compra_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						orden_compra_webcontrol1.cargarComboEditarTablaejercicioFK(orden_compra_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_6";
				idActual=jQuery("#"+control_name).val();

				if(orden_compra_control.idperiodoDefaultForeignKey!=null && orden_compra_control.idperiodoDefaultForeignKey>-1) {
					idActual=orden_compra_control.idperiodoDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					orden_compra_webcontrol1.cargarComboEditarTablaperiodoFK(orden_compra_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						orden_compra_webcontrol1.cargarComboEditarTablaperiodoFK(orden_compra_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_7";
				idActual=jQuery("#"+control_name).val();

				if(orden_compra_control.idusuarioDefaultForeignKey!=null && orden_compra_control.idusuarioDefaultForeignKey>-1) {
					idActual=orden_compra_control.idusuarioDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					orden_compra_webcontrol1.cargarComboEditarTablausuarioFK(orden_compra_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						orden_compra_webcontrol1.cargarComboEditarTablausuarioFK(orden_compra_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_9";
				idActual=jQuery("#"+control_name).val();

				if(orden_compra_control.idproveedorDefaultForeignKey!=null && orden_compra_control.idproveedorDefaultForeignKey>-1) {
					idActual=orden_compra_control.idproveedorDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					orden_compra_webcontrol1.cargarComboEditarTablaproveedorFK(orden_compra_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						orden_compra_webcontrol1.cargarComboEditarTablaproveedorFK(orden_compra_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_12";
				idActual=jQuery("#"+control_name).val();

				if(orden_compra_control.idvendedorDefaultForeignKey!=null && orden_compra_control.idvendedorDefaultForeignKey>-1) {
					idActual=orden_compra_control.idvendedorDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					orden_compra_webcontrol1.cargarComboEditarTablavendedorFK(orden_compra_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						orden_compra_webcontrol1.cargarComboEditarTablavendedorFK(orden_compra_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_13";
				idActual=jQuery("#"+control_name).val();

				if(orden_compra_control.idtermino_pago_proveedorDefaultForeignKey!=null && orden_compra_control.idtermino_pago_proveedorDefaultForeignKey>-1) {
					idActual=orden_compra_control.idtermino_pago_proveedorDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					orden_compra_webcontrol1.cargarComboEditarTablatermino_pago_proveedorFK(orden_compra_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						orden_compra_webcontrol1.cargarComboEditarTablatermino_pago_proveedorFK(orden_compra_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_16";
				idActual=jQuery("#"+control_name).val();

				if(orden_compra_control.idmonedaDefaultForeignKey!=null && orden_compra_control.idmonedaDefaultForeignKey>-1) {
					idActual=orden_compra_control.idmonedaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					orden_compra_webcontrol1.cargarComboEditarTablamonedaFK(orden_compra_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						orden_compra_webcontrol1.cargarComboEditarTablamonedaFK(orden_compra_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_18";
				idActual=jQuery("#"+control_name).val();

				if(orden_compra_control.idestadoDefaultForeignKey!=null && orden_compra_control.idestadoDefaultForeignKey>-1) {
					idActual=orden_compra_control.idestadoDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					orden_compra_webcontrol1.cargarComboEditarTablaestadoFK(orden_compra_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						orden_compra_webcontrol1.cargarComboEditarTablaestadoFK(orden_compra_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_39";
				idActual=jQuery("#"+control_name).val();

				if(orden_compra_control.idasientoDefaultForeignKey!=null && orden_compra_control.idasientoDefaultForeignKey>-1) {
					idActual=orden_compra_control.idasientoDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					orden_compra_webcontrol1.cargarComboEditarTablaasientoFK(orden_compra_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						orden_compra_webcontrol1.cargarComboEditarTablaasientoFK(orden_compra_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_40";
				idActual=jQuery("#"+control_name).val();

				if(orden_compra_control.iddocumento_cuenta_pagarDefaultForeignKey!=null && orden_compra_control.iddocumento_cuenta_pagarDefaultForeignKey>-1) {
					idActual=orden_compra_control.iddocumento_cuenta_pagarDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					orden_compra_webcontrol1.cargarComboEditarTabladocumento_cuenta_pagarFK(orden_compra_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						orden_compra_webcontrol1.cargarComboEditarTabladocumento_cuenta_pagarFK(orden_compra_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_41";
				idActual=jQuery("#"+control_name).val();

				if(orden_compra_control.idkardexDefaultForeignKey!=null && orden_compra_control.idkardexDefaultForeignKey>-1) {
					idActual=orden_compra_control.idkardexDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					orden_compra_webcontrol1.cargarComboEditarTablakardexFK(orden_compra_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						orden_compra_webcontrol1.cargarComboEditarTablakardexFK(orden_compra_control,control_name,idActual,true);
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
		
		jQuery("#frmTablaDatosorden_compra").validate(json_rules);
		
		//VALIDACION	
	}
	
/*---------- Clic-Nuevo --------------*/
	nuevoPrepararOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"orden_compra");		
		super.procesarInicioProceso(orden_compra_constante1);
	}
	
	nuevoPrepararOnComplete() { 
		super.procesarFinalizacionProceso(orden_compra_constante1,"orden_compra"); 
	}
	
	nuevoTablaPrepararOnClick() { 
		super.procesarInicioProceso(orden_compra_constante1); 
	}
	
	nuevoTablaPrepararOnComplete() { 
		super.procesarFinalizacionProceso(orden_compra_constante1,"orden_compra"); 
	}
	




		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(orden_compra_constante1.STR_RELATIVE_PATH,"orden_compra"); 
	}
	
	eliminarOnComplete() {
	
		super.procesarFinalizacionProceso(orden_compra_constante1,"orden_compra");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(orden_compra_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(orden_compra_constante1,"orden_compra"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(orden_compra_constante1,"orden_compra"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"orden_compra"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(orden_compra_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(orden_compra_constante1,"orden_compra");	
	}	
/*------------- Formulario-Combo-Accion -------------------*/
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
			else if(strValueTipoColumna=="Created At") {
				jQuery(".col_created_at").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Updated At") {
				jQuery(".col_updated_at").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Empresa") {
				jQuery(".col_id_empresa").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_empresa_img').trigger("click" );
				} else {
					jQuery('#form-id_empresa_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Sucursal") {
				jQuery(".col_id_sucursal").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_sucursal_img').trigger("click" );
				} else {
					jQuery('#form-id_sucursal_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Ejercicio") {
				jQuery(".col_id_ejercicio").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_ejercicio_img').trigger("click" );
				} else {
					jQuery('#form-id_ejercicio_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Periodo") {
				jQuery(".col_id_periodo").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_periodo_img').trigger("click" );
				} else {
					jQuery('#form-id_periodo_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna==" Usuario") {
				jQuery(".col_id_usuario").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_usuario_img').trigger("click" );
				} else {
					jQuery('#form-id_usuario_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Numero") {
				jQuery(".col_numero").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Proveedor") {
				jQuery(".col_id_proveedor").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_proveedor_img').trigger("click" );
				} else {
					jQuery('#form-id_proveedor_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Ruc") {
				jQuery(".col_ruc").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Fecha Emision") {
				jQuery(".col_fecha_emision").css({"border-color":"red"});
			}
			else if(strValueTipoColumna==" Vendedor") {
				jQuery(".col_id_vendedor").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_vendedor_img').trigger("click" );
				} else {
					jQuery('#form-id_vendedor_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Terminos Pago") {
				jQuery(".col_id_termino_pago_proveedor").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_termino_pago_proveedor_img').trigger("click" );
				} else {
					jQuery('#form-id_termino_pago_proveedor_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Fecha Vence") {
				jQuery(".col_fecha_vence").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Cotizacion") {
				jQuery(".col_cotizacion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Moneda") {
				jQuery(".col_id_moneda").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_moneda_img').trigger("click" );
				} else {
					jQuery('#form-id_moneda_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Impuesto En Precio") {
				jQuery(".col_impuesto_en_precio").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Estado") {
				jQuery(".col_id_estado").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_estado_img').trigger("click" );
				} else {
					jQuery('#form-id_estado_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Direccion") {
				jQuery(".col_direccion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Enviar") {
				jQuery(".col_enviar").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Observacion") {
				jQuery(".col_observacion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Sub Total") {
				jQuery(".col_sub_total").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Descuento Monto") {
				jQuery(".col_descuento_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Descuento %") {
				jQuery(".col_descuento_porciento").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Iva") {
				jQuery(".col_iva_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Iva %") {
				jQuery(".col_iva_porciento").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ret.Fuente Monto") {
				jQuery(".col_retencion_fuente_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ret.Fuente %") {
				jQuery(".col_retencion_fuente_porciento").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ret.Iva Monto") {
				jQuery(".col_retencion_iva_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ret.Iva %") {
				jQuery(".col_retencion_iva_porciento").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Total") {
				jQuery(".col_total").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Miscel") {
				jQuery(".col_otro_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Miscel %") {
				jQuery(".col_otro_porciento").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ret.Ica Monto") {
				jQuery(".col_retencion_ica_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ret.Ica %") {
				jQuery(".col_retencion_ica_porciento").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nro Factura Proveedor") {
				jQuery(".col_factura_proveedor").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Recibida") {
				jQuery(".col_recibida").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Pagos") {
				jQuery(".col_pagos").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Asiento") {
				jQuery(".col_id_asiento").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_asiento_img').trigger("click" );
				} else {
					jQuery('#form-id_asiento_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Docuemento Cuenta por Pagar") {
				jQuery(".col_id_documento_cuenta_pagar").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_documento_cuenta_pagar_img').trigger("click" );
				} else {
					jQuery('#form-id_documento_cuenta_pagar_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Kardex") {
				jQuery(".col_id_kardex").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_kardex_img').trigger("click" );
				} else {
					jQuery('#form-id_kardex_img_busqueda').trigger("click" );
				}
			}
					
			//alert(strValueTipoColumna);
		}
	}
/*------------- Formulario-Combo-Relaciones -------------------*/
	setTipoRelacionAccion(strValueTipoRelacion,idActual,orden_compra_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="orden_compra_detalle" || strValueTipoRelacion=="Compras Detalle") {
			orden_compra_webcontrol1.registrarSesionParaorden_compra_detalles(idActual);
		}
		else if(strValueTipoRelacion=="cuenta_pagar" || strValueTipoRelacion=="Cuenta Pagar") {
			orden_compra_webcontrol1.registrarSesionParacuenta_pagars(idActual);
		}
	}
	
		
	
	
	/*
		Buscar: buscarOnClick,buscarOnComplete,buscarFksOnClick
		Buscar: procesarInicioBusqueda,procesarFinalizacionBusqueda
		Siguientes: siguientesOnClick,siguientesOnComplete
		Anteriores: anterioresOnClick,anterioresOnComplete
		Seleccionar: seleccionarOnClick,seleccionarOnComplete
		Seleccionar: seleccionarMostrarDivAccionesRelacionesActualOnClick
		Seleccionar: seleccionarMostrarDivAccionesRelacionesActualOnComplete
		Reporte: generarReporteOnClick,generarReporteOnComplete,generarReporteInicio
		Reporte: generarHtmlReporteOnClick,generarHtmlReporteOnComplete
		Editar-Tabla: editarTablaDatosOnClick,editarTablaDatosOnComplete
		Eliminar-Tabla: eliminarTablaOnClick,eliminarTablaOnComplete
		Guardar-Cambios: guardarCambiosOnClick,guardarCambiosOnComplete
		Duplicar: duplicarOnClick,duplicarOnComplete,copiarOnClick,copiarOnComplete
		Tabla-Validacion: registrarControlesTableValidacionEdition
		Nuevo-Preparar: nuevoPrepararOnClick,nuevoPrepararOnComplete,nuevoTablaPrepararOnClick
		Eliminar: eliminarOnClick,eliminarOnComplete
		Procesar: procesarOnClick,procesarOnComplete,procesarFinalizacionProcesoAbrirLink
		Procesar: procesarInicioProcesoSimple,procesarFinalizacionProcesoSimple
		Relaciones: setTipoColumnaAccion,setTipoRelacionAccion
	*/
	
}

var orden_compra_funcion1=new orden_compra_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {orden_compra_funcion,orden_compra_funcion1};

/*Para ser llamado desde window.opener*/
window.orden_compra_funcion1 = orden_compra_funcion1;



//</script>
