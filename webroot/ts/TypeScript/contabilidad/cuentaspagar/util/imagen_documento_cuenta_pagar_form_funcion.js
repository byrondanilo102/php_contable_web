//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {imagen_documento_cuenta_pagar_constante,imagen_documento_cuenta_pagar_constante1} from '../util/imagen_documento_cuenta_pagar_constante.js';

class imagen_documento_cuenta_pagar_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(imagen_documento_cuenta_pagar_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(imagen_documento_cuenta_pagar_constante1,"imagen_documento_cuenta_pagar");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"imagen_documento_cuenta_pagar");
		
		super.procesarInicioProceso(imagen_documento_cuenta_pagar_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(imagen_documento_cuenta_pagar_constante1,"imagen_documento_cuenta_pagar");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"imagen_documento_cuenta_pagar");
		
		super.procesarInicioProceso(imagen_documento_cuenta_pagar_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(imagen_documento_cuenta_pagar_constante1,"imagen_documento_cuenta_pagar");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(imagen_documento_cuenta_pagar_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(imagen_documento_cuenta_pagar_constante1.STR_ES_RELACIONES,imagen_documento_cuenta_pagar_constante1.STR_ES_RELACIONADO,imagen_documento_cuenta_pagar_constante1.STR_RELATIVE_PATH,"imagen_documento_cuenta_pagar");		
		
		if(super.esPaginaForm(imagen_documento_cuenta_pagar_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(imagen_documento_cuenta_pagar_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"imagen_documento_cuenta_pagar");
		
		super.procesarFinalizacionProceso(imagen_documento_cuenta_pagar_constante1,"imagen_documento_cuenta_pagar");
				
		if(super.esPaginaForm(imagen_documento_cuenta_pagar_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoimagen_documento_cuenta_pagar.hdnIdActual);
		funcionGeneral.setEmptyControl(document.frmMantenimientoimagen_documento_cuenta_pagar.txtimagen);
		jQuery('cmbimagen_documento_cuenta_pagarid_documento_cuenta_pagar').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoimagen_documento_cuenta_pagar.txtnro_documento);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarimagen_documento_cuenta_pagar.txtNumeroRegistrosimagen_documento_cuenta_pagar,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'imagen_documento_cuenta_pagares',strNumeroRegistros,document.frmParamsBuscarimagen_documento_cuenta_pagar.txtNumeroRegistrosimagen_documento_cuenta_pagar);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(imagen_documento_cuenta_pagar_constante1) {
		
		//VALIDACION
		// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT		
		/*
		jQuery.validator.addMethod(
				"regexpStringMethod",
				function(value, element) {
					return value.match(constantes.STRREGX_STRING_GENERAL);
				},
				"Valor Incorrecto"
		);
		*/
		
		funcionGeneralJQuery.addValidacionesFuncionesGenerales();
		
		var arrRules=null;
		var arrRulesTotales=null;		
		
		
		if(imagen_documento_cuenta_pagar_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-imagen": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-id_documento_cuenta_pagar": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-nro_documento": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-imagen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_documento_cuenta_pagar": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-nro_documento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(imagen_documento_cuenta_pagar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}
			
		} else {

			arrRules= {
				
				rules: {
					
				"form_imagen_documento_cuenta_pagar-imagen": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_imagen_documento_cuenta_pagar-id_documento_cuenta_pagar": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_imagen_documento_cuenta_pagar-nro_documento": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_imagen_documento_cuenta_pagar-imagen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_imagen_documento_cuenta_pagar-id_documento_cuenta_pagar": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_imagen_documento_cuenta_pagar-nro_documento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(imagen_documento_cuenta_pagar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientoimagen_documento_cuenta_pagar").validate(arrRules);
		
		if(imagen_documento_cuenta_pagar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesimagen_documento_cuenta_pagar").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			imagen_documento_cuenta_pagarFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"imagen_documento_cuenta_pagar");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoimagen_documento_cuenta_pagar.txtimagen,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoimagen_documento_cuenta_pagar.txtnro_documento,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoimagen_documento_cuenta_pagar.txtimagen,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoimagen_documento_cuenta_pagar.txtnro_documento,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,imagen_documento_cuenta_pagar_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,imagen_documento_cuenta_pagar_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"imagen_documento_cuenta_pagar");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(imagen_documento_cuenta_pagar_constante1.STR_RELATIVE_PATH,"imagen_documento_cuenta_pagar");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"imagen_documento_cuenta_pagar");
		
		super.procesarFinalizacionProceso(imagen_documento_cuenta_pagar_constante1,"imagen_documento_cuenta_pagar");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(imagen_documento_cuenta_pagar_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(imagen_documento_cuenta_pagar_constante1,"imagen_documento_cuenta_pagar");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(imagen_documento_cuenta_pagar_constante1,"imagen_documento_cuenta_pagar");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"imagen_documento_cuenta_pagar");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(imagen_documento_cuenta_pagar_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(imagen_documento_cuenta_pagar_constante1,"imagen_documento_cuenta_pagar");
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,imagen_documento_cuenta_pagar_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var imagen_documento_cuenta_pagar_funcion1=new imagen_documento_cuenta_pagar_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {imagen_documento_cuenta_pagar_funcion,imagen_documento_cuenta_pagar_funcion1};

//Para ser llamado desde window.opener
window.imagen_documento_cuenta_pagar_funcion1 = imagen_documento_cuenta_pagar_funcion1;



//</script>
