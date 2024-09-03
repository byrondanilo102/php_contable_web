//<script type="text/javascript" language="javascript">



//var historial_cambio_claveJQueryPaginaWebInteraccion= function (historial_cambio_clave_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {historial_cambio_clave_constante,historial_cambio_clave_constante1} from '../util/historial_cambio_clave_constante.js';

import {historial_cambio_clave_funcion,historial_cambio_clave_funcion1} from '../util/historial_cambio_clave_form_funcion.js';


class historial_cambio_clave_webcontrol extends GeneralEntityWebControl {
	
	historial_cambio_clave_control=null;
	historial_cambio_clave_controlInicial=null;
	historial_cambio_clave_controlAuxiliar=null;
		
	//if(historial_cambio_clave_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(historial_cambio_clave_control) {
		super();
		
		this.historial_cambio_clave_control=historial_cambio_clave_control;
	}
		
	actualizarVariablesPagina(historial_cambio_clave_control) {
		
		if(historial_cambio_clave_control.action=="index" || historial_cambio_clave_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(historial_cambio_clave_control);
			
		} 
		
		
		
	
		else if(historial_cambio_clave_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(historial_cambio_clave_control);	
		
		} else if(historial_cambio_clave_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(historial_cambio_clave_control);		
		}
	
	
		
		
		else if(historial_cambio_clave_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(historial_cambio_clave_control);		
		
		} else if(historial_cambio_clave_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(historial_cambio_clave_control);		
		
		} 
		//else if(historial_cambio_clave_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(historial_cambio_clave_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + historial_cambio_clave_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(historial_cambio_clave_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(historial_cambio_clave_control) {
		this.actualizarPaginaAccionesGenerales(historial_cambio_clave_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(historial_cambio_clave_control) {
		
		this.actualizarPaginaCargaGeneral(historial_cambio_clave_control);
		this.actualizarPaginaOrderBy(historial_cambio_clave_control);
		this.actualizarPaginaTablaDatos(historial_cambio_clave_control);
		this.actualizarPaginaCargaGeneralControles(historial_cambio_clave_control);
		//this.actualizarPaginaFormulario(historial_cambio_clave_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(historial_cambio_clave_control);
		this.actualizarPaginaAreaBusquedas(historial_cambio_clave_control);
		this.actualizarPaginaCargaCombosFK(historial_cambio_clave_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(historial_cambio_clave_control) {
		//this.actualizarPaginaFormulario(historial_cambio_clave_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);		
		this.actualizarPaginaAreaMantenimiento(historial_cambio_clave_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(historial_cambio_clave_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(historial_cambio_clave_control) {
		this.actualizarPaginaTablaDatosAuxiliar(historial_cambio_clave_control);		
		this.actualizarPaginaFormulario(historial_cambio_clave_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);		
		this.actualizarPaginaAreaMantenimiento(historial_cambio_clave_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(historial_cambio_clave_control) {
		this.actualizarPaginaTablaDatosAuxiliar(historial_cambio_clave_control);		
		this.actualizarPaginaFormulario(historial_cambio_clave_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);		
		this.actualizarPaginaAreaMantenimiento(historial_cambio_clave_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(historial_cambio_clave_control) {
		this.actualizarPaginaTablaDatosAuxiliar(historial_cambio_clave_control);		
		this.actualizarPaginaFormulario(historial_cambio_clave_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);		
		this.actualizarPaginaAreaMantenimiento(historial_cambio_clave_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(historial_cambio_clave_control) {
		this.actualizarPaginaCargaGeneralControles(historial_cambio_clave_control);
		this.actualizarPaginaCargaCombosFK(historial_cambio_clave_control);
		this.actualizarPaginaFormulario(historial_cambio_clave_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);		
		this.actualizarPaginaAreaMantenimiento(historial_cambio_clave_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(historial_cambio_clave_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(historial_cambio_clave_control) {
		this.actualizarPaginaCargaGeneralControles(historial_cambio_clave_control);
		this.actualizarPaginaCargaCombosFK(historial_cambio_clave_control);
		this.actualizarPaginaFormulario(historial_cambio_clave_control);
		this.onLoadCombosDefectoFK(historial_cambio_clave_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);		
		this.actualizarPaginaAreaMantenimiento(historial_cambio_clave_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(historial_cambio_clave_control) {
		//FORMULARIO
		if(historial_cambio_clave_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(historial_cambio_clave_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(historial_cambio_clave_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);		
		
		//COMBOS FK
		if(historial_cambio_clave_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(historial_cambio_clave_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(historial_cambio_clave_control) {
		//FORMULARIO
		if(historial_cambio_clave_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(historial_cambio_clave_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(historial_cambio_clave_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);	
		
		//COMBOS FK
		if(historial_cambio_clave_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(historial_cambio_clave_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(historial_cambio_clave_control) {
		//FORMULARIO
		if(historial_cambio_clave_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(historial_cambio_clave_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);	
		//COMBOS FK
		if(historial_cambio_clave_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(historial_cambio_clave_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(historial_cambio_clave_control) {
		
		if(historial_cambio_clave_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(historial_cambio_clave_control);
		}
		
		if(historial_cambio_clave_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(historial_cambio_clave_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(historial_cambio_clave_control) {
		if(historial_cambio_clave_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("historial_cambio_claveReturnGeneral",JSON.stringify(historial_cambio_clave_control.historial_cambio_claveReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control) {
		if(historial_cambio_clave_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && historial_cambio_clave_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(historial_cambio_clave_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(historial_cambio_clave_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(historial_cambio_clave_control, mostrar) {
		
		if(mostrar==true) {
			historial_cambio_clave_funcion1.resaltarRestaurarDivsPagina(false,"historial_cambio_clave");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				historial_cambio_clave_funcion1.resaltarRestaurarDivMantenimiento(false,"historial_cambio_clave");
			}			
			
			historial_cambio_clave_funcion1.mostrarDivMensaje(true,historial_cambio_clave_control.strAuxiliarMensaje,historial_cambio_clave_control.strAuxiliarCssMensaje);
		
		} else {
			historial_cambio_clave_funcion1.mostrarDivMensaje(false,historial_cambio_clave_control.strAuxiliarMensaje,historial_cambio_clave_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(historial_cambio_clave_control) {
		if(historial_cambio_clave_funcion1.esPaginaForm(historial_cambio_clave_constante1)==true) {
			window.opener.historial_cambio_clave_webcontrol1.actualizarPaginaTablaDatos(historial_cambio_clave_control);
		} else {
			this.actualizarPaginaTablaDatos(historial_cambio_clave_control);
		}
	}
	
	actualizarPaginaAbrirLink(historial_cambio_clave_control) {
		historial_cambio_clave_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(historial_cambio_clave_control.strAuxiliarUrlPagina);
				
		historial_cambio_clave_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(historial_cambio_clave_control.strAuxiliarTipo,historial_cambio_clave_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(historial_cambio_clave_control) {
		historial_cambio_clave_funcion1.resaltarRestaurarDivMensaje(true,historial_cambio_clave_control.strAuxiliarMensajeAlert,historial_cambio_clave_control.strAuxiliarCssMensaje);
			
		if(historial_cambio_clave_funcion1.esPaginaForm(historial_cambio_clave_constante1)==true) {
			window.opener.historial_cambio_clave_funcion1.resaltarRestaurarDivMensaje(true,historial_cambio_clave_control.strAuxiliarMensajeAlert,historial_cambio_clave_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(historial_cambio_clave_control) {
		this.historial_cambio_clave_controlInicial=historial_cambio_clave_control;
			
		if(historial_cambio_clave_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(historial_cambio_clave_control.strStyleDivArbol,historial_cambio_clave_control.strStyleDivContent
																,historial_cambio_clave_control.strStyleDivOpcionesBanner,historial_cambio_clave_control.strStyleDivExpandirColapsar
																,historial_cambio_clave_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(historial_cambio_clave_control) {
		this.actualizarCssBotonesPagina(historial_cambio_clave_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(historial_cambio_clave_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(historial_cambio_clave_control.tiposReportes,historial_cambio_clave_control.tiposReporte
															 	,historial_cambio_clave_control.tiposPaginacion,historial_cambio_clave_control.tiposAcciones
																,historial_cambio_clave_control.tiposColumnasSelect,historial_cambio_clave_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(historial_cambio_clave_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(historial_cambio_clave_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(historial_cambio_clave_control);			
	}
	
	actualizarPaginaUsuarioInvitado(historial_cambio_clave_control) {
	
		var indexPosition=historial_cambio_clave_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=historial_cambio_clave_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(historial_cambio_clave_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(historial_cambio_clave_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",historial_cambio_clave_control.strRecargarFkTipos,",")) { 
				historial_cambio_clave_webcontrol1.cargarCombosusuariosFK(historial_cambio_clave_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(historial_cambio_clave_control.strRecargarFkTiposNinguno!=null && historial_cambio_clave_control.strRecargarFkTiposNinguno!='NINGUNO' && historial_cambio_clave_control.strRecargarFkTiposNinguno!='') {
			
				if(historial_cambio_clave_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",historial_cambio_clave_control.strRecargarFkTiposNinguno,",")) { 
					historial_cambio_clave_webcontrol1.cargarCombosusuariosFK(historial_cambio_clave_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablausuarioFK(historial_cambio_clave_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,historial_cambio_clave_funcion1,historial_cambio_clave_control.usuariosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(historial_cambio_clave_control) {
		jQuery("#tdhistorial_cambio_claveNuevo").css("display",historial_cambio_clave_control.strPermisoNuevo);
		jQuery("#trhistorial_cambio_claveElementos").css("display",historial_cambio_clave_control.strVisibleTablaElementos);
		jQuery("#trhistorial_cambio_claveAcciones").css("display",historial_cambio_clave_control.strVisibleTablaAcciones);
		jQuery("#trhistorial_cambio_claveParametrosAcciones").css("display",historial_cambio_clave_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(historial_cambio_clave_control) {
	
		this.actualizarCssBotonesMantenimiento(historial_cambio_clave_control);
				
		if(historial_cambio_clave_control.historial_cambio_claveActual!=null) {//form
			
			this.actualizarCamposFormulario(historial_cambio_clave_control);			
		}
						
		this.actualizarSpanMensajesCampos(historial_cambio_clave_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(historial_cambio_clave_control) {
	
		jQuery("#form"+historial_cambio_clave_constante1.STR_SUFIJO+"-id").val(historial_cambio_clave_control.historial_cambio_claveActual.id);
		jQuery("#form"+historial_cambio_clave_constante1.STR_SUFIJO+"-created_at").val(historial_cambio_clave_control.historial_cambio_claveActual.versionRow);
		jQuery("#form"+historial_cambio_clave_constante1.STR_SUFIJO+"-updated_at").val(historial_cambio_clave_control.historial_cambio_claveActual.versionRow);
		
		if(historial_cambio_clave_control.historial_cambio_claveActual.id_usuario!=null && historial_cambio_clave_control.historial_cambio_claveActual.id_usuario>-1){
			if(jQuery("#form"+historial_cambio_clave_constante1.STR_SUFIJO+"-id_usuario").val() != historial_cambio_clave_control.historial_cambio_claveActual.id_usuario) {
				jQuery("#form"+historial_cambio_clave_constante1.STR_SUFIJO+"-id_usuario").val(historial_cambio_clave_control.historial_cambio_claveActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+historial_cambio_clave_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+historial_cambio_clave_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+historial_cambio_clave_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+historial_cambio_clave_constante1.STR_SUFIJO+"-nombre").val(historial_cambio_clave_control.historial_cambio_claveActual.nombre);
		jQuery("#form"+historial_cambio_clave_constante1.STR_SUFIJO+"-fecha_hora").val(historial_cambio_clave_control.historial_cambio_claveActual.fecha_hora);
		jQuery("#form"+historial_cambio_clave_constante1.STR_SUFIJO+"-observacion").val(historial_cambio_clave_control.historial_cambio_claveActual.observacion);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+historial_cambio_clave_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("historial_cambio_clave","seguridad","","form_historial_cambio_clave",formulario,"","",paraEventoTabla,idFilaTabla,historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);
	}
	
	actualizarSpanMensajesCampos(historial_cambio_clave_control) {
		jQuery("#spanstrMensajeid").text(historial_cambio_clave_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(historial_cambio_clave_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(historial_cambio_clave_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_usuario").text(historial_cambio_clave_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajenombre").text(historial_cambio_clave_control.strMensajenombre);		
		jQuery("#spanstrMensajefecha_hora").text(historial_cambio_clave_control.strMensajefecha_hora);		
		jQuery("#spanstrMensajeobservacion").text(historial_cambio_clave_control.strMensajeobservacion);		
	}
	
	actualizarCssBotonesMantenimiento(historial_cambio_clave_control) {
		jQuery("#tdbtnNuevohistorial_cambio_clave").css("visibility",historial_cambio_clave_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevohistorial_cambio_clave").css("display",historial_cambio_clave_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarhistorial_cambio_clave").css("visibility",historial_cambio_clave_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarhistorial_cambio_clave").css("display",historial_cambio_clave_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarhistorial_cambio_clave").css("visibility",historial_cambio_clave_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarhistorial_cambio_clave").css("display",historial_cambio_clave_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarhistorial_cambio_clave").css("visibility",historial_cambio_clave_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioshistorial_cambio_clave").css("visibility",historial_cambio_clave_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioshistorial_cambio_clave").css("display",historial_cambio_clave_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarhistorial_cambio_clave").css("visibility",historial_cambio_clave_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarhistorial_cambio_clave").css("visibility",historial_cambio_clave_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarhistorial_cambio_clave").css("visibility",historial_cambio_clave_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosusuariosFK(historial_cambio_clave_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+historial_cambio_clave_constante1.STR_SUFIJO+"-id_usuario",historial_cambio_clave_control.usuariosFK);

		if(historial_cambio_clave_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+historial_cambio_clave_control.idFilaTablaActual+"_3",historial_cambio_clave_control.usuariosFK);
		}
	};

	
	
	registrarComboActionChangeCombosusuariosFK(historial_cambio_clave_control) {

	};

	
	
	setDefectoValorCombosusuariosFK(historial_cambio_clave_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(historial_cambio_clave_control.idusuarioDefaultFK>-1 && jQuery("#form"+historial_cambio_clave_constante1.STR_SUFIJO+"-id_usuario").val() != historial_cambio_clave_control.idusuarioDefaultFK) {
				jQuery("#form"+historial_cambio_clave_constante1.STR_SUFIJO+"-id_usuario").val(historial_cambio_clave_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	

	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//historial_cambio_clave_control
		
	
	}
	
	onLoadCombosDefectoFK(historial_cambio_clave_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(historial_cambio_clave_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(historial_cambio_clave_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",historial_cambio_clave_control.strRecargarFkTipos,",")) { 
				historial_cambio_clave_webcontrol1.setDefectoValorCombosusuariosFK(historial_cambio_clave_control);
			}

			
			//CODIGO PARA TOMAR PRIMER VALOR
			/*
			var strPrimerValor='0';
			jQuery("#ParamsBuscar-cmbPaginacion").each(function() {
				//console.log(jQuery(this).val());
				//console.log(jQuery(this).text());
				strPrimerValor=jQuery(this).val();
				return false;
			});
			
			alert(strPrimerValor);
			*/
		}
	}
	
	//VERIFICAR: Creo no se necesita Controller
	onLoadCombosEventosFK(historial_cambio_clave_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(historial_cambio_clave_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(historial_cambio_clave_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",historial_cambio_clave_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				historial_cambio_clave_webcontrol1.registrarComboActionChangeCombosusuariosFK(historial_cambio_clave_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(historial_cambio_clave_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(historial_cambio_clave_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(historial_cambio_clave_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(historial_cambio_clave_constante1.BIT_ES_PAGINA_FORM==true) {
				historial_cambio_clave_funcion1.validarFormularioJQuery(historial_cambio_clave_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("historial_cambio_clave");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("historial_cambio_clave");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(historial_cambio_clave_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,"historial_cambio_clave");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+historial_cambio_clave_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				historial_cambio_clave_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(historial_cambio_clave_control) {
		
		
		
		if(historial_cambio_clave_control.strPermisoActualizar!=null) {
			jQuery("#tdhistorial_cambio_claveActualizarToolBar").css("display",historial_cambio_clave_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdhistorial_cambio_claveEliminarToolBar").css("display",historial_cambio_clave_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trhistorial_cambio_claveElementos").css("display",historial_cambio_clave_control.strVisibleTablaElementos);
		
		jQuery("#trhistorial_cambio_claveAcciones").css("display",historial_cambio_clave_control.strVisibleTablaAcciones);
		jQuery("#trhistorial_cambio_claveParametrosAcciones").css("display",historial_cambio_clave_control.strVisibleTablaAcciones);
		
		jQuery("#tdhistorial_cambio_claveCerrarPagina").css("display",historial_cambio_clave_control.strPermisoPopup);		
		jQuery("#tdhistorial_cambio_claveCerrarPaginaToolBar").css("display",historial_cambio_clave_control.strPermisoPopup);
		//jQuery("#trhistorial_cambio_claveAccionesRelaciones").css("display",historial_cambio_clave_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=historial_cambio_clave_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + historial_cambio_clave_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + historial_cambio_clave_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Historial Cambio Claves";
		sTituloBanner+=" - " + historial_cambio_clave_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + historial_cambio_clave_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdhistorial_cambio_claveRelacionesToolBar").css("display",historial_cambio_clave_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoshistorial_cambio_clave").css("display",historial_cambio_clave_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		historial_cambio_clave_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		historial_cambio_clave_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		historial_cambio_clave_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		historial_cambio_clave_webcontrol1.registrarEventosControles();
		
		if(historial_cambio_clave_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(historial_cambio_clave_constante1.STR_ES_RELACIONADO=="false") {
			historial_cambio_clave_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(historial_cambio_clave_constante1.STR_ES_RELACIONES=="true") {
			if(historial_cambio_clave_constante1.BIT_ES_PAGINA_FORM==true) {
				historial_cambio_clave_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(historial_cambio_clave_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(historial_cambio_clave_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(historial_cambio_clave_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(historial_cambio_clave_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);
						//historial_cambio_clave_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(historial_cambio_clave_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(historial_cambio_clave_constante1.BIG_ID_ACTUAL,"historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);
						//historial_cambio_clave_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			historial_cambio_clave_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);	
	}
	
	/*
		Variables-Pagina: actualizarVariablesPagina
		Variables-Pagina:actualizarVariablesPagina(AccionIndex,AccionCancelar,AccionMostrarEjecutar,AccionesGenerales)
		Variables-Pagina:actualizarVariablesPagina(AccionNuevo,AccionActualizar,AccionEliminar,AccionSeleccionar)
		Variables-Pagina:actualizarVariablesPagina(AccionNuevoPreparar,AccionRecargarFomulario,AccionManejarEventos)
		Pagina: actualizarPagina(AccionesGenerales,GuardarReturnSession,MensajePantallaAuxiliar,MensajePantalla)
		Pagina: actualizarPagina(TablaDatos,AbrirLink,MensajeAlert,CargaGeneral,CargaGeneralControles)
		Pagina: actualizarPagina(CargaCombosFK,UsuarioInvitado)
		Pagina: actualizarPagina(AreaMantenimiento,Formulario)
		Combos-Fk: cargarCombosFK,cargarComboEditarTablaempresaFK,cargarComboEditarTablasucursalFK
		Combos-Fk: cargarCombosempresasFK,cargarCombossucursalsFK
		Combos-Fk: setDefectoValorCombosempresasFK,setDefectoValorCombossucursalsFK
		Combos-Fk: onLoadCombosEventosFK,onLoadCombosDefectoPaginaGeneralControles
		Campos-Recargar: actualizarCamposFormulario,recargarFormularioGeneral
		SpanMensajes-CssBotones: actualizarSpanMensajesCampos,actualizarCssBotonesMantenimiento
		Eventos-CombosFk: onLoadRecargarRelacionado,registrarEventosControles,onLoadCombosDefectoFK
		AccioesEventos-CssBotones: registrarAccionesEventos,actualizarCssBotonesPagina
		PropiedadesPagina-FuncionesPagina: registrarPropiedadesPagina, registrarFuncionesPagina
		Load-Unload-Pagina: onLoad, onUnLoadWindow, onLoadWindow
		Eventos-OnLoad: registrarEventosOnLoadGlobal
	*/
}

var historial_cambio_clave_webcontrol1 = new historial_cambio_clave_webcontrol();

//Para ser llamado desde otro archivo (import)
export {historial_cambio_clave_webcontrol,historial_cambio_clave_webcontrol1};

//Para ser llamado desde window.opener
window.historial_cambio_clave_webcontrol1 = historial_cambio_clave_webcontrol1;


if(historial_cambio_clave_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = historial_cambio_clave_webcontrol1.onLoadWindow; 
}

//</script>