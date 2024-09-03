//<script type="text/javascript" language="javascript">



//var devolucion_detalleJQueryPaginaWebInteraccion= function (devolucion_detalle_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {devolucion_detalle_constante,devolucion_detalle_constante1} from '../util/devolucion_detalle_constante.js';

import {devolucion_detalle_funcion,devolucion_detalle_funcion1} from '../util/devolucion_detalle_funcion.js';


class devolucion_detalle_webcontrol extends GeneralEntityWebControl {
	
	devolucion_detalle_control=null;
	devolucion_detalle_controlInicial=null;
	devolucion_detalle_controlAuxiliar=null;
		
	//if(devolucion_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(devolucion_detalle_control) {
		super();
		
		this.devolucion_detalle_control=devolucion_detalle_control;
	}
		
	actualizarVariablesPagina(devolucion_detalle_control) {
		
		if(devolucion_detalle_control.action=="index" || devolucion_detalle_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(devolucion_detalle_control);
			
		} 
		
		
		else if(devolucion_detalle_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(devolucion_detalle_control);
			
		} else if(devolucion_detalle_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(devolucion_detalle_control);
			
		} else if(devolucion_detalle_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(devolucion_detalle_control);		
		
		} else if(devolucion_detalle_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(devolucion_detalle_control);
		
		}  else if(devolucion_detalle_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(devolucion_detalle_control);		
		
		} else if(devolucion_detalle_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(devolucion_detalle_control);		
		
		} else if(devolucion_detalle_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(devolucion_detalle_control);		
		
		} else if(devolucion_detalle_control.action.includes("Busqueda") ||
				  devolucion_detalle_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(devolucion_detalle_control);
			
		} else if(devolucion_detalle_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(devolucion_detalle_control)
		}
		
		
		
	
		else if(devolucion_detalle_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(devolucion_detalle_control);	
		
		} else if(devolucion_detalle_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(devolucion_detalle_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + devolucion_detalle_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(devolucion_detalle_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(devolucion_detalle_control) {
		this.actualizarPaginaAccionesGenerales(devolucion_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(devolucion_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(devolucion_detalle_control);
		this.actualizarPaginaOrderBy(devolucion_detalle_control);
		this.actualizarPaginaTablaDatos(devolucion_detalle_control);
		this.actualizarPaginaCargaGeneralControles(devolucion_detalle_control);
		//this.actualizarPaginaFormulario(devolucion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(devolucion_detalle_control);
		this.actualizarPaginaAreaBusquedas(devolucion_detalle_control);
		this.actualizarPaginaCargaCombosFK(devolucion_detalle_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(devolucion_detalle_control) {
		//this.actualizarPaginaFormulario(devolucion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(devolucion_detalle_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(devolucion_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(devolucion_detalle_control);
		this.actualizarPaginaTablaDatos(devolucion_detalle_control);
		this.actualizarPaginaCargaGeneralControles(devolucion_detalle_control);
		//this.actualizarPaginaFormulario(devolucion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(devolucion_detalle_control);
		this.actualizarPaginaAreaBusquedas(devolucion_detalle_control);
		this.actualizarPaginaCargaCombosFK(devolucion_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(devolucion_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(devolucion_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(devolucion_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(devolucion_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(devolucion_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(devolucion_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(devolucion_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(devolucion_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_detalle_control);		
		//this.actualizarPaginaFormulario(devolucion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(devolucion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(devolucion_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_detalle_control);		
		//this.actualizarPaginaFormulario(devolucion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(devolucion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(devolucion_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_detalle_control);		
		//this.actualizarPaginaFormulario(devolucion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(devolucion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(devolucion_detalle_control) {
		//this.actualizarPaginaFormulario(devolucion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(devolucion_detalle_control) {
		this.actualizarPaginaAbrirLink(devolucion_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(devolucion_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_detalle_control);				
		//this.actualizarPaginaFormulario(devolucion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_detalle_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(devolucion_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_detalle_control);
		//this.actualizarPaginaFormulario(devolucion_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(devolucion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(devolucion_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_detalle_control);
		//this.actualizarPaginaFormulario(devolucion_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(devolucion_detalle_control) {
		//this.actualizarPaginaFormulario(devolucion_detalle_control);
		this.onLoadCombosDefectoFK(devolucion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(devolucion_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_detalle_control);
		//this.actualizarPaginaFormulario(devolucion_detalle_control);
		this.onLoadCombosDefectoFK(devolucion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(devolucion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(devolucion_detalle_control) {
		this.actualizarPaginaAbrirLink(devolucion_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(devolucion_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(devolucion_detalle_control) {
					//super.actualizarPaginaImprimir(devolucion_detalle_control,"devolucion_detalle");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",devolucion_detalle_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("devolucion_detalle_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(devolucion_detalle_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(devolucion_detalle_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(devolucion_detalle_control) {
		//super.actualizarPaginaImprimir(devolucion_detalle_control,"devolucion_detalle");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("devolucion_detalle_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(devolucion_detalle_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",devolucion_detalle_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(devolucion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(devolucion_detalle_control) {
		//super.actualizarPaginaImprimir(devolucion_detalle_control,"devolucion_detalle");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("devolucion_detalle_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(devolucion_detalle_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",devolucion_detalle_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(devolucion_detalle_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(devolucion_detalle_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(devolucion_detalle_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(devolucion_detalle_control);
			
		this.actualizarPaginaAbrirLink(devolucion_detalle_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(devolucion_detalle_control) {
		
		if(devolucion_detalle_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(devolucion_detalle_control);
		}
		
		if(devolucion_detalle_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(devolucion_detalle_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(devolucion_detalle_control) {
		if(devolucion_detalle_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("devolucion_detalleReturnGeneral",JSON.stringify(devolucion_detalle_control.devolucion_detalleReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control) {
		if(devolucion_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && devolucion_detalle_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(devolucion_detalle_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(devolucion_detalle_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(devolucion_detalle_control, mostrar) {
		
		if(mostrar==true) {
			devolucion_detalle_funcion1.resaltarRestaurarDivsPagina(false,"devolucion_detalle");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				devolucion_detalle_funcion1.resaltarRestaurarDivMantenimiento(false,"devolucion_detalle");
			}			
			
			devolucion_detalle_funcion1.mostrarDivMensaje(true,devolucion_detalle_control.strAuxiliarMensaje,devolucion_detalle_control.strAuxiliarCssMensaje);
		
		} else {
			devolucion_detalle_funcion1.mostrarDivMensaje(false,devolucion_detalle_control.strAuxiliarMensaje,devolucion_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(devolucion_detalle_control) {
		if(devolucion_detalle_funcion1.esPaginaForm(devolucion_detalle_constante1)==true) {
			window.opener.devolucion_detalle_webcontrol1.actualizarPaginaTablaDatos(devolucion_detalle_control);
		} else {
			this.actualizarPaginaTablaDatos(devolucion_detalle_control);
		}
	}
	
	actualizarPaginaAbrirLink(devolucion_detalle_control) {
		devolucion_detalle_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(devolucion_detalle_control.strAuxiliarUrlPagina);
				
		devolucion_detalle_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(devolucion_detalle_control.strAuxiliarTipo,devolucion_detalle_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(devolucion_detalle_control) {
		devolucion_detalle_funcion1.resaltarRestaurarDivMensaje(true,devolucion_detalle_control.strAuxiliarMensajeAlert,devolucion_detalle_control.strAuxiliarCssMensaje);
			
		if(devolucion_detalle_funcion1.esPaginaForm(devolucion_detalle_constante1)==true) {
			window.opener.devolucion_detalle_funcion1.resaltarRestaurarDivMensaje(true,devolucion_detalle_control.strAuxiliarMensajeAlert,devolucion_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(devolucion_detalle_control) {
		this.devolucion_detalle_controlInicial=devolucion_detalle_control;
			
		if(devolucion_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(devolucion_detalle_control.strStyleDivArbol,devolucion_detalle_control.strStyleDivContent
																,devolucion_detalle_control.strStyleDivOpcionesBanner,devolucion_detalle_control.strStyleDivExpandirColapsar
																,devolucion_detalle_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=devolucion_detalle_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",devolucion_detalle_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(devolucion_detalle_control) {
		this.actualizarCssBotonesPagina(devolucion_detalle_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(devolucion_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(devolucion_detalle_control.tiposReportes,devolucion_detalle_control.tiposReporte
															 	,devolucion_detalle_control.tiposPaginacion,devolucion_detalle_control.tiposAcciones
																,devolucion_detalle_control.tiposColumnasSelect,devolucion_detalle_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(devolucion_detalle_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(devolucion_detalle_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(devolucion_detalle_control);			
	}
	
	actualizarPaginaUsuarioInvitado(devolucion_detalle_control) {
	
		var indexPosition=devolucion_detalle_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=devolucion_detalle_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(devolucion_detalle_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(devolucion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_devolucion",devolucion_detalle_control.strRecargarFkTipos,",")) { 
				devolucion_detalle_webcontrol1.cargarCombosdevolucionsFK(devolucion_detalle_control);
			}

			if(devolucion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",devolucion_detalle_control.strRecargarFkTipos,",")) { 
				devolucion_detalle_webcontrol1.cargarCombosbodegasFK(devolucion_detalle_control);
			}

			if(devolucion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",devolucion_detalle_control.strRecargarFkTipos,",")) { 
				devolucion_detalle_webcontrol1.cargarCombosproductosFK(devolucion_detalle_control);
			}

			if(devolucion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",devolucion_detalle_control.strRecargarFkTipos,",")) { 
				devolucion_detalle_webcontrol1.cargarCombosunidadsFK(devolucion_detalle_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(devolucion_detalle_control.strRecargarFkTiposNinguno!=null && devolucion_detalle_control.strRecargarFkTiposNinguno!='NINGUNO' && devolucion_detalle_control.strRecargarFkTiposNinguno!='') {
			
				if(devolucion_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_devolucion",devolucion_detalle_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_detalle_webcontrol1.cargarCombosdevolucionsFK(devolucion_detalle_control);
				}

				if(devolucion_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_bodega",devolucion_detalle_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_detalle_webcontrol1.cargarCombosbodegasFK(devolucion_detalle_control);
				}

				if(devolucion_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",devolucion_detalle_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_detalle_webcontrol1.cargarCombosproductosFK(devolucion_detalle_control);
				}

				if(devolucion_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_unidad",devolucion_detalle_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_detalle_webcontrol1.cargarCombosunidadsFK(devolucion_detalle_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_bodega") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_bodega" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.devolucion_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.devolucion_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.devolucion_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
		else if(sNombreColumna=="id_producto") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_producto" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.devolucion_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.devolucion_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.devolucion_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTabladevolucionFK(devolucion_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_detalle_funcion1,devolucion_detalle_control.devolucionsFK);
	}

	cargarComboEditarTablabodegaFK(devolucion_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_detalle_funcion1,devolucion_detalle_control.bodegasFK);
	}

	cargarComboEditarTablaproductoFK(devolucion_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_detalle_funcion1,devolucion_detalle_control.productosFK);
	}

	cargarComboEditarTablaunidadFK(devolucion_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_detalle_funcion1,devolucion_detalle_control.unidadsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(devolucion_detalle_control) {
		jQuery("#divBusquedadevolucion_detalleAjaxWebPart").css("display",devolucion_detalle_control.strPermisoBusqueda);
		jQuery("#trdevolucion_detalleCabeceraBusquedas").css("display",devolucion_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedadevolucion_detalle").css("display",devolucion_detalle_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(devolucion_detalle_control.htmlTablaOrderBy!=null
			&& devolucion_detalle_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBydevolucion_detalleAjaxWebPart").html(devolucion_detalle_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//devolucion_detalle_webcontrol1.registrarOrderByActions();
			
		}
			
		if(devolucion_detalle_control.htmlTablaOrderByRel!=null
			&& devolucion_detalle_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByReldevolucion_detalleAjaxWebPart").html(devolucion_detalle_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(devolucion_detalle_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedadevolucion_detalleAjaxWebPart").css("display","none");
			jQuery("#trdevolucion_detalleCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedadevolucion_detalle").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(devolucion_detalle_control) {
		
		if(!devolucion_detalle_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(devolucion_detalle_control);
		} else {
			jQuery("#divTablaDatosdevolucion_detallesAjaxWebPart").html(devolucion_detalle_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosdevolucion_detalles=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(devolucion_detalle_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosdevolucion_detalles=jQuery("#tblTablaDatosdevolucion_detalles").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("devolucion_detalle",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',devolucion_detalle_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			devolucion_detalle_webcontrol1.registrarControlesTableEdition(devolucion_detalle_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		devolucion_detalle_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(devolucion_detalle_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("devolucion_detalle_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(devolucion_detalle_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosdevolucion_detallesAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(devolucion_detalle_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(devolucion_detalle_control);
		
		const divOrderBy = document.getElementById("divOrderBydevolucion_detalleAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(devolucion_detalle_control);
		
		const divOrderByRel = document.getElementById("divOrderByReldevolucion_detalleAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(devolucion_detalle_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(devolucion_detalle_control.devolucion_detalleActual!=null) {//form
			
			this.actualizarCamposFilaTabla(devolucion_detalle_control);			
		}
	}
	
	actualizarCamposFilaTabla(devolucion_detalle_control) {
		var i=0;
		
		i=devolucion_detalle_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(devolucion_detalle_control.devolucion_detalleActual.id);
		jQuery("#t-version_row_"+i+"").val(devolucion_detalle_control.devolucion_detalleActual.versionRow);
		
		if(devolucion_detalle_control.devolucion_detalleActual.id_devolucion!=null && devolucion_detalle_control.devolucion_detalleActual.id_devolucion>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != devolucion_detalle_control.devolucion_detalleActual.id_devolucion) {
				jQuery("#t-cel_"+i+"_2").val(devolucion_detalle_control.devolucion_detalleActual.id_devolucion).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_detalle_control.devolucion_detalleActual.id_bodega!=null && devolucion_detalle_control.devolucion_detalleActual.id_bodega>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != devolucion_detalle_control.devolucion_detalleActual.id_bodega) {
				jQuery("#t-cel_"+i+"_3").val(devolucion_detalle_control.devolucion_detalleActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_detalle_control.devolucion_detalleActual.id_producto!=null && devolucion_detalle_control.devolucion_detalleActual.id_producto>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != devolucion_detalle_control.devolucion_detalleActual.id_producto) {
				jQuery("#t-cel_"+i+"_4").val(devolucion_detalle_control.devolucion_detalleActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_detalle_control.devolucion_detalleActual.id_unidad!=null && devolucion_detalle_control.devolucion_detalleActual.id_unidad>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != devolucion_detalle_control.devolucion_detalleActual.id_unidad) {
				jQuery("#t-cel_"+i+"_5").val(devolucion_detalle_control.devolucion_detalleActual.id_unidad).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_6").val(devolucion_detalle_control.devolucion_detalleActual.numero_item);
		jQuery("#t-cel_"+i+"_7").val(devolucion_detalle_control.devolucion_detalleActual.cantidad);
		jQuery("#t-cel_"+i+"_8").val(devolucion_detalle_control.devolucion_detalleActual.precio);
		jQuery("#t-cel_"+i+"_9").val(devolucion_detalle_control.devolucion_detalleActual.sub_total);
		jQuery("#t-cel_"+i+"_10").val(devolucion_detalle_control.devolucion_detalleActual.descuento_porciento);
		jQuery("#t-cel_"+i+"_11").val(devolucion_detalle_control.devolucion_detalleActual.descuento_monto);
		jQuery("#t-cel_"+i+"_12").val(devolucion_detalle_control.devolucion_detalleActual.iva_porciento);
		jQuery("#t-cel_"+i+"_13").val(devolucion_detalle_control.devolucion_detalleActual.iva_monto);
		jQuery("#t-cel_"+i+"_14").val(devolucion_detalle_control.devolucion_detalleActual.total);
		jQuery("#t-cel_"+i+"_15").val(devolucion_detalle_control.devolucion_detalleActual.observacion);
		jQuery("#t-cel_"+i+"_16").val(devolucion_detalle_control.devolucion_detalleActual.impuesto2_porciento);
		jQuery("#t-cel_"+i+"_17").val(devolucion_detalle_control.devolucion_detalleActual.impuesto2_monto);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(devolucion_detalle_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(devolucion_detalle_control) {
		devolucion_detalle_funcion1.registrarControlesTableValidacionEdition(devolucion_detalle_control,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(devolucion_detalle_control) {
		jQuery("#divResumendevolucion_detalleActualAjaxWebPart").html(devolucion_detalle_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(devolucion_detalle_control) {
		//jQuery("#divAccionesRelacionesdevolucion_detalleAjaxWebPart").html(devolucion_detalle_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("devolucion_detalle_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(devolucion_detalle_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesdevolucion_detalleAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		devolucion_detalle_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(devolucion_detalle_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(devolucion_detalle_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(devolucion_detalle_control) {
		
		if(devolucion_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",devolucion_detalle_control.strVisibleFK_Idbodega);
			jQuery("#tblstrVisible"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",devolucion_detalle_control.strVisibleFK_Idbodega);
		}

		if(devolucion_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Iddevolucion").attr("style",devolucion_detalle_control.strVisibleFK_Iddevolucion);
			jQuery("#tblstrVisible"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Iddevolucion").attr("style",devolucion_detalle_control.strVisibleFK_Iddevolucion);
		}

		if(devolucion_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",devolucion_detalle_control.strVisibleFK_Idproducto);
			jQuery("#tblstrVisible"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",devolucion_detalle_control.strVisibleFK_Idproducto);
		}

		if(devolucion_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idunidad").attr("style",devolucion_detalle_control.strVisibleFK_Idunidad);
			jQuery("#tblstrVisible"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idunidad").attr("style",devolucion_detalle_control.strVisibleFK_Idunidad);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciondevolucion_detalle();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("devolucion_detalle",id,"inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);		
	}
	
	

	abrirBusquedaParadevolucion(strNombreCampoBusqueda){//idActual
		devolucion_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion_detalle","devolucion","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
	}

	abrirBusquedaParabodega(strNombreCampoBusqueda){//idActual
		devolucion_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion_detalle","bodega","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
	}

	abrirBusquedaParaproducto(strNombreCampoBusqueda){//idActual
		devolucion_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion_detalle","producto","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
	}

	abrirBusquedaParaunidad(strNombreCampoBusqueda){//idActual
		devolucion_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion_detalle","unidad","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalleConstante,strParametros);
		
		//devolucion_detalle_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosdevolucionsFK(devolucion_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_devolucion",devolucion_detalle_control.devolucionsFK);

		if(devolucion_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_detalle_control.idFilaTablaActual+"_2",devolucion_detalle_control.devolucionsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Iddevolucion-cmbid_devolucion",devolucion_detalle_control.devolucionsFK);

	};

	cargarCombosbodegasFK(devolucion_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_bodega",devolucion_detalle_control.bodegasFK);

		if(devolucion_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_detalle_control.idFilaTablaActual+"_3",devolucion_detalle_control.bodegasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",devolucion_detalle_control.bodegasFK);

	};

	cargarCombosproductosFK(devolucion_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_producto",devolucion_detalle_control.productosFK);

		if(devolucion_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_detalle_control.idFilaTablaActual+"_4",devolucion_detalle_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",devolucion_detalle_control.productosFK);

	};

	cargarCombosunidadsFK(devolucion_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_unidad",devolucion_detalle_control.unidadsFK);

		if(devolucion_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_detalle_control.idFilaTablaActual+"_5",devolucion_detalle_control.unidadsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad",devolucion_detalle_control.unidadsFK);

	};

	
	
	registrarComboActionChangeCombosdevolucionsFK(devolucion_detalle_control) {

	};

	registrarComboActionChangeCombosbodegasFK(devolucion_detalle_control) {
		this.registrarComboActionChangeid_bodega("form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_bodega",false,0);


		this.registrarComboActionChangeid_bodega(""+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",false,0);


	};

	registrarComboActionChangeCombosproductosFK(devolucion_detalle_control) {
		this.registrarComboActionChangeid_producto("form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_producto",false,0);


		this.registrarComboActionChangeid_producto(""+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",false,0);


	};

	registrarComboActionChangeCombosunidadsFK(devolucion_detalle_control) {

	};

	
	
	setDefectoValorCombosdevolucionsFK(devolucion_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_detalle_control.iddevolucionDefaultFK>-1 && jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_devolucion").val() != devolucion_detalle_control.iddevolucionDefaultFK) {
				jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_devolucion").val(devolucion_detalle_control.iddevolucionDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Iddevolucion-cmbid_devolucion").val(devolucion_detalle_control.iddevolucionDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Iddevolucion-cmbid_devolucion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Iddevolucion-cmbid_devolucion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosbodegasFK(devolucion_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_detalle_control.idbodegaDefaultFK>-1 && jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != devolucion_detalle_control.idbodegaDefaultFK) {
				jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_bodega").val(devolucion_detalle_control.idbodegaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(devolucion_detalle_control.idbodegaDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproductosFK(devolucion_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_detalle_control.idproductoDefaultFK>-1 && jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_producto").val() != devolucion_detalle_control.idproductoDefaultFK) {
				jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_producto").val(devolucion_detalle_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(devolucion_detalle_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosunidadsFK(devolucion_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_detalle_control.idunidadDefaultFK>-1 && jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != devolucion_detalle_control.idunidadDefaultFK) {
				jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_unidad").val(devolucion_detalle_control.idunidadDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(devolucion_detalle_control.idunidadDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_bodega(id_bodega,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("devolucion_detalle","inventario","","id_bodega",id_bodega,"NINGUNO","",paraEventoTabla,idFilaTabla,devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
	}

	registrarComboActionChangeid_producto(id_producto,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("devolucion_detalle","inventario","","id_producto",id_producto,"NINGUNO","",paraEventoTabla,idFilaTabla,devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	




	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//devolucion_detalle_control
		
	

		var cantidad="form"+devolucion_detalle_constante1.STR_SUFIJO+"-cantidad";
		funcionGeneralEventoJQuery.setTextoAccionChange("devolucion_detalle","inventario","","cantidad",cantidad,"","",paraEventoTabla,idFilaTabla,devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);

		var precio="form"+devolucion_detalle_constante1.STR_SUFIJO+"-precio";
		funcionGeneralEventoJQuery.setTextoAccionChange("devolucion_detalle","inventario","","precio",precio,"","",paraEventoTabla,idFilaTabla,devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);

		var descuento_porciento="form"+devolucion_detalle_constante1.STR_SUFIJO+"-descuento_porciento";
		funcionGeneralEventoJQuery.setTextoAccionChange("devolucion_detalle","inventario","","descuento_porciento",descuento_porciento,"","",paraEventoTabla,idFilaTabla,devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);

		var iva_porciento="form"+devolucion_detalle_constante1.STR_SUFIJO+"-iva_porciento";
		funcionGeneralEventoJQuery.setTextoAccionChange("devolucion_detalle","inventario","","iva_porciento",iva_porciento,"","",paraEventoTabla,idFilaTabla,devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
	}
	
	onLoadCombosDefectoFK(devolucion_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(devolucion_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(devolucion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_devolucion",devolucion_detalle_control.strRecargarFkTipos,",")) { 
				devolucion_detalle_webcontrol1.setDefectoValorCombosdevolucionsFK(devolucion_detalle_control);
			}

			if(devolucion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",devolucion_detalle_control.strRecargarFkTipos,",")) { 
				devolucion_detalle_webcontrol1.setDefectoValorCombosbodegasFK(devolucion_detalle_control);
			}

			if(devolucion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",devolucion_detalle_control.strRecargarFkTipos,",")) { 
				devolucion_detalle_webcontrol1.setDefectoValorCombosproductosFK(devolucion_detalle_control);
			}

			if(devolucion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",devolucion_detalle_control.strRecargarFkTipos,",")) { 
				devolucion_detalle_webcontrol1.setDefectoValorCombosunidadsFK(devolucion_detalle_control);
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
	onLoadCombosEventosFK(devolucion_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(devolucion_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(devolucion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_devolucion",devolucion_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_detalle_webcontrol1.registrarComboActionChangeCombosdevolucionsFK(devolucion_detalle_control);
			//}

			//if(devolucion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",devolucion_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_detalle_webcontrol1.registrarComboActionChangeCombosbodegasFK(devolucion_detalle_control);
			//}

			//if(devolucion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",devolucion_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_detalle_webcontrol1.registrarComboActionChangeCombosproductosFK(devolucion_detalle_control);
			//}

			//if(devolucion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",devolucion_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_detalle_webcontrol1.registrarComboActionChangeCombosunidadsFK(devolucion_detalle_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(devolucion_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(devolucion_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(devolucion_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(devolucion_detalle_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion_detalle","FK_Idbodega","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion_detalle","FK_Iddevolucion","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion_detalle","FK_Idproducto","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion_detalle","FK_Idunidad","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
		
			
			if(devolucion_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("devolucion_detalle");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("devolucion_detalle");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(devolucion_detalle_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,"devolucion_detalle");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("devolucion","id_devolucion","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_devolucion_img_busqueda").click(function(){
				devolucion_detalle_webcontrol1.abrirBusquedaParadevolucion("id_devolucion");
				//alert(jQuery('#form-id_devolucion_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("bodega","id_bodega","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_bodega_img_busqueda").click(function(){
				devolucion_detalle_webcontrol1.abrirBusquedaParabodega("id_bodega");
				//alert(jQuery('#form-id_bodega_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				devolucion_detalle_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("unidad","id_unidad","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_unidad_img_busqueda").click(function(){
				devolucion_detalle_webcontrol1.abrirBusquedaParaunidad("id_unidad");
				//alert(jQuery('#form-id_unidad_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(devolucion_detalle_control) {
		
		jQuery("#divBusquedadevolucion_detalleAjaxWebPart").css("display",devolucion_detalle_control.strPermisoBusqueda);
		jQuery("#trdevolucion_detalleCabeceraBusquedas").css("display",devolucion_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedadevolucion_detalle").css("display",devolucion_detalle_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportedevolucion_detalle").css("display",devolucion_detalle_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosdevolucion_detalle").attr("style",devolucion_detalle_control.strPermisoMostrarTodos);		
		
		if(devolucion_detalle_control.strPermisoNuevo!=null) {
			jQuery("#tddevolucion_detalleNuevo").css("display",devolucion_detalle_control.strPermisoNuevo);
			jQuery("#tddevolucion_detalleNuevoToolBar").css("display",devolucion_detalle_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tddevolucion_detalleDuplicar").css("display",devolucion_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddevolucion_detalleDuplicarToolBar").css("display",devolucion_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddevolucion_detalleNuevoGuardarCambios").css("display",devolucion_detalle_control.strPermisoNuevo);
			jQuery("#tddevolucion_detalleNuevoGuardarCambiosToolBar").css("display",devolucion_detalle_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(devolucion_detalle_control.strPermisoActualizar!=null) {
			jQuery("#tddevolucion_detalleCopiar").css("display",devolucion_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddevolucion_detalleCopiarToolBar").css("display",devolucion_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddevolucion_detalleConEditar").css("display",devolucion_detalle_control.strPermisoActualizar);
		}
		
		jQuery("#tddevolucion_detalleGuardarCambios").css("display",devolucion_detalle_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tddevolucion_detalleGuardarCambiosToolBar").css("display",devolucion_detalle_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tddevolucion_detalleCerrarPagina").css("display",devolucion_detalle_control.strPermisoPopup);		
		jQuery("#tddevolucion_detalleCerrarPaginaToolBar").css("display",devolucion_detalle_control.strPermisoPopup);
		//jQuery("#trdevolucion_detalleAccionesRelaciones").css("display",devolucion_detalle_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=devolucion_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + devolucion_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + devolucion_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Devolucion Detalles";
		sTituloBanner+=" - " + devolucion_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + devolucion_detalle_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tddevolucion_detalleRelacionesToolBar").css("display",devolucion_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosdevolucion_detalle").css("display",devolucion_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		devolucion_detalle_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		devolucion_detalle_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		devolucion_detalle_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		devolucion_detalle_webcontrol1.registrarEventosControles();
		
		if(devolucion_detalle_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(devolucion_detalle_constante1.STR_ES_RELACIONADO=="false") {
			devolucion_detalle_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(devolucion_detalle_constante1.STR_ES_RELACIONES=="true") {
			if(devolucion_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				devolucion_detalle_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(devolucion_detalle_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(devolucion_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				devolucion_detalle_webcontrol1.onLoad();
			
			//} else {
				//if(devolucion_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			devolucion_detalle_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);	
	}
}

var devolucion_detalle_webcontrol1 = new devolucion_detalle_webcontrol();

//Para ser llamado desde otro archivo (import)
export {devolucion_detalle_webcontrol,devolucion_detalle_webcontrol1};

//Para ser llamado desde window.opener
window.devolucion_detalle_webcontrol1 = devolucion_detalle_webcontrol1;


if(devolucion_detalle_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = devolucion_detalle_webcontrol1.onLoadWindow; 
}

//</script>