//<script type="text/javascript" language="javascript">



//var parametro_auxiliar_facturacionJQueryPaginaWebInteraccion= function (parametro_auxiliar_facturacion_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {parametro_auxiliar_facturacion_constante,parametro_auxiliar_facturacion_constante1} from '../util/parametro_auxiliar_facturacion_constante.js';

import {parametro_auxiliar_facturacion_funcion,parametro_auxiliar_facturacion_funcion1} from '../util/parametro_auxiliar_facturacion_funcion.js';


class parametro_auxiliar_facturacion_webcontrol extends GeneralEntityWebControl {
	
	parametro_auxiliar_facturacion_control=null;
	parametro_auxiliar_facturacion_controlInicial=null;
	parametro_auxiliar_facturacion_controlAuxiliar=null;
		
	//if(parametro_auxiliar_facturacion_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(parametro_auxiliar_facturacion_control) {
		super();
		
		this.parametro_auxiliar_facturacion_control=parametro_auxiliar_facturacion_control;
	}
		
	actualizarVariablesPagina(parametro_auxiliar_facturacion_control) {
		
		if(parametro_auxiliar_facturacion_control.action=="index" || parametro_auxiliar_facturacion_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(parametro_auxiliar_facturacion_control);
			
		} 
		
		
		else if(parametro_auxiliar_facturacion_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(parametro_auxiliar_facturacion_control);
		
		} else if(parametro_auxiliar_facturacion_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(parametro_auxiliar_facturacion_control);
		
		} else if(parametro_auxiliar_facturacion_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(parametro_auxiliar_facturacion_control);
		
		} else if(parametro_auxiliar_facturacion_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(parametro_auxiliar_facturacion_control);
			
		} else if(parametro_auxiliar_facturacion_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(parametro_auxiliar_facturacion_control);
			
		} else if(parametro_auxiliar_facturacion_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(parametro_auxiliar_facturacion_control);
		
		} else if(parametro_auxiliar_facturacion_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(parametro_auxiliar_facturacion_control);		
		
		} else if(parametro_auxiliar_facturacion_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(parametro_auxiliar_facturacion_control);
		
		} else if(parametro_auxiliar_facturacion_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(parametro_auxiliar_facturacion_control);
		
		} else if(parametro_auxiliar_facturacion_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(parametro_auxiliar_facturacion_control);
		
		} else if(parametro_auxiliar_facturacion_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(parametro_auxiliar_facturacion_control);
		
		}  else if(parametro_auxiliar_facturacion_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(parametro_auxiliar_facturacion_control);
		
		} else if(parametro_auxiliar_facturacion_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(parametro_auxiliar_facturacion_control);
		
		} else if(parametro_auxiliar_facturacion_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(parametro_auxiliar_facturacion_control);
		
		} else if(parametro_auxiliar_facturacion_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(parametro_auxiliar_facturacion_control);
		
		} else if(parametro_auxiliar_facturacion_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(parametro_auxiliar_facturacion_control);
		
		} else if(parametro_auxiliar_facturacion_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(parametro_auxiliar_facturacion_control);
		
		} else if(parametro_auxiliar_facturacion_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(parametro_auxiliar_facturacion_control);
		
		} else if(parametro_auxiliar_facturacion_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(parametro_auxiliar_facturacion_control);
		
		} else if(parametro_auxiliar_facturacion_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(parametro_auxiliar_facturacion_control);
		
		} else if(parametro_auxiliar_facturacion_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(parametro_auxiliar_facturacion_control);		
		
		} else if(parametro_auxiliar_facturacion_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(parametro_auxiliar_facturacion_control);		
		
		} else if(parametro_auxiliar_facturacion_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(parametro_auxiliar_facturacion_control);		
		
		} else if(parametro_auxiliar_facturacion_control.action.includes("Busqueda") ||
				  parametro_auxiliar_facturacion_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(parametro_auxiliar_facturacion_control);
			
		} else if(parametro_auxiliar_facturacion_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(parametro_auxiliar_facturacion_control)
		}
		
		
		
	
		else if(parametro_auxiliar_facturacion_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(parametro_auxiliar_facturacion_control);	
		
		} else if(parametro_auxiliar_facturacion_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_auxiliar_facturacion_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + parametro_auxiliar_facturacion_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(parametro_auxiliar_facturacion_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(parametro_auxiliar_facturacion_control) {
		this.actualizarPaginaAccionesGenerales(parametro_auxiliar_facturacion_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(parametro_auxiliar_facturacion_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_auxiliar_facturacion_control);
		this.actualizarPaginaOrderBy(parametro_auxiliar_facturacion_control);
		this.actualizarPaginaTablaDatos(parametro_auxiliar_facturacion_control);
		this.actualizarPaginaCargaGeneralControles(parametro_auxiliar_facturacion_control);
		//this.actualizarPaginaFormulario(parametro_auxiliar_facturacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_facturacion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_auxiliar_facturacion_control);
		this.actualizarPaginaAreaBusquedas(parametro_auxiliar_facturacion_control);
		this.actualizarPaginaCargaCombosFK(parametro_auxiliar_facturacion_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(parametro_auxiliar_facturacion_control) {
		//this.actualizarPaginaFormulario(parametro_auxiliar_facturacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_facturacion_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_auxiliar_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_auxiliar_facturacion_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(parametro_auxiliar_facturacion_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_auxiliar_facturacion_control);
		this.actualizarPaginaTablaDatos(parametro_auxiliar_facturacion_control);
		this.actualizarPaginaCargaGeneralControles(parametro_auxiliar_facturacion_control);
		//this.actualizarPaginaFormulario(parametro_auxiliar_facturacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_facturacion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_auxiliar_facturacion_control);
		this.actualizarPaginaAreaBusquedas(parametro_auxiliar_facturacion_control);
		this.actualizarPaginaCargaCombosFK(parametro_auxiliar_facturacion_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(parametro_auxiliar_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_auxiliar_facturacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(parametro_auxiliar_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_auxiliar_facturacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(parametro_auxiliar_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_auxiliar_facturacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(parametro_auxiliar_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_auxiliar_facturacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(parametro_auxiliar_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_auxiliar_facturacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(parametro_auxiliar_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_auxiliar_facturacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(parametro_auxiliar_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_auxiliar_facturacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(parametro_auxiliar_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_auxiliar_facturacion_control);		
		//this.actualizarPaginaFormulario(parametro_auxiliar_facturacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_facturacion_control);		
		//this.actualizarPaginaAreaMantenimiento(parametro_auxiliar_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(parametro_auxiliar_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_auxiliar_facturacion_control);		
		//this.actualizarPaginaFormulario(parametro_auxiliar_facturacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_facturacion_control);		
		//this.actualizarPaginaAreaMantenimiento(parametro_auxiliar_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(parametro_auxiliar_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_auxiliar_facturacion_control);		
		//this.actualizarPaginaFormulario(parametro_auxiliar_facturacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_facturacion_control);		
		//this.actualizarPaginaAreaMantenimiento(parametro_auxiliar_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(parametro_auxiliar_facturacion_control) {
		//this.actualizarPaginaFormulario(parametro_auxiliar_facturacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_facturacion_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_auxiliar_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(parametro_auxiliar_facturacion_control) {
		this.actualizarPaginaAbrirLink(parametro_auxiliar_facturacion_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(parametro_auxiliar_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_auxiliar_facturacion_control);				
		//this.actualizarPaginaFormulario(parametro_auxiliar_facturacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_facturacion_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_auxiliar_facturacion_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(parametro_auxiliar_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_auxiliar_facturacion_control);
		//this.actualizarPaginaFormulario(parametro_auxiliar_facturacion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_facturacion_control);		
		//this.actualizarPaginaAreaMantenimiento(parametro_auxiliar_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(parametro_auxiliar_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_auxiliar_facturacion_control);
		//this.actualizarPaginaFormulario(parametro_auxiliar_facturacion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_facturacion_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(parametro_auxiliar_facturacion_control) {
		//this.actualizarPaginaFormulario(parametro_auxiliar_facturacion_control);
		this.onLoadCombosDefectoFK(parametro_auxiliar_facturacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_facturacion_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_auxiliar_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(parametro_auxiliar_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_auxiliar_facturacion_control);
		//this.actualizarPaginaFormulario(parametro_auxiliar_facturacion_control);
		this.onLoadCombosDefectoFK(parametro_auxiliar_facturacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_facturacion_control);		
		//this.actualizarPaginaAreaMantenimiento(parametro_auxiliar_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(parametro_auxiliar_facturacion_control) {
		this.actualizarPaginaAbrirLink(parametro_auxiliar_facturacion_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(parametro_auxiliar_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_auxiliar_facturacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_facturacion_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(parametro_auxiliar_facturacion_control) {
					//super.actualizarPaginaImprimir(parametro_auxiliar_facturacion_control,"parametro_auxiliar_facturacion");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",parametro_auxiliar_facturacion_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("parametro_auxiliar_facturacion_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(parametro_auxiliar_facturacion_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(parametro_auxiliar_facturacion_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(parametro_auxiliar_facturacion_control) {
		//super.actualizarPaginaImprimir(parametro_auxiliar_facturacion_control,"parametro_auxiliar_facturacion");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("parametro_auxiliar_facturacion_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(parametro_auxiliar_facturacion_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",parametro_auxiliar_facturacion_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(parametro_auxiliar_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(parametro_auxiliar_facturacion_control) {
		//super.actualizarPaginaImprimir(parametro_auxiliar_facturacion_control,"parametro_auxiliar_facturacion");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("parametro_auxiliar_facturacion_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(parametro_auxiliar_facturacion_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",parametro_auxiliar_facturacion_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(parametro_auxiliar_facturacion_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("parametro_auxiliar_facturacion","general","",parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_webcontrol1,parametro_auxiliar_facturacion_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(parametro_auxiliar_facturacion_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(parametro_auxiliar_facturacion_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(parametro_auxiliar_facturacion_control);
			
		this.actualizarPaginaAbrirLink(parametro_auxiliar_facturacion_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(parametro_auxiliar_facturacion_control) {
		
		if(parametro_auxiliar_facturacion_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(parametro_auxiliar_facturacion_control);
		}
		
		if(parametro_auxiliar_facturacion_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(parametro_auxiliar_facturacion_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(parametro_auxiliar_facturacion_control) {
		if(parametro_auxiliar_facturacion_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("parametro_auxiliar_facturacionReturnGeneral",JSON.stringify(parametro_auxiliar_facturacion_control.parametro_auxiliar_facturacionReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_facturacion_control) {
		if(parametro_auxiliar_facturacion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && parametro_auxiliar_facturacion_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(parametro_auxiliar_facturacion_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(parametro_auxiliar_facturacion_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(parametro_auxiliar_facturacion_control, mostrar) {
		
		if(mostrar==true) {
			parametro_auxiliar_facturacion_funcion1.resaltarRestaurarDivsPagina(false,"parametro_auxiliar_facturacion");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				parametro_auxiliar_facturacion_funcion1.resaltarRestaurarDivMantenimiento(false,"parametro_auxiliar_facturacion");
			}			
			
			parametro_auxiliar_facturacion_funcion1.mostrarDivMensaje(true,parametro_auxiliar_facturacion_control.strAuxiliarMensaje,parametro_auxiliar_facturacion_control.strAuxiliarCssMensaje);
		
		} else {
			parametro_auxiliar_facturacion_funcion1.mostrarDivMensaje(false,parametro_auxiliar_facturacion_control.strAuxiliarMensaje,parametro_auxiliar_facturacion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(parametro_auxiliar_facturacion_control) {
		if(parametro_auxiliar_facturacion_funcion1.esPaginaForm(parametro_auxiliar_facturacion_constante1)==true) {
			window.opener.parametro_auxiliar_facturacion_webcontrol1.actualizarPaginaTablaDatos(parametro_auxiliar_facturacion_control);
		} else {
			this.actualizarPaginaTablaDatos(parametro_auxiliar_facturacion_control);
		}
	}
	
	actualizarPaginaAbrirLink(parametro_auxiliar_facturacion_control) {
		parametro_auxiliar_facturacion_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(parametro_auxiliar_facturacion_control.strAuxiliarUrlPagina);
				
		parametro_auxiliar_facturacion_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(parametro_auxiliar_facturacion_control.strAuxiliarTipo,parametro_auxiliar_facturacion_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(parametro_auxiliar_facturacion_control) {
		parametro_auxiliar_facturacion_funcion1.resaltarRestaurarDivMensaje(true,parametro_auxiliar_facturacion_control.strAuxiliarMensajeAlert,parametro_auxiliar_facturacion_control.strAuxiliarCssMensaje);
			
		if(parametro_auxiliar_facturacion_funcion1.esPaginaForm(parametro_auxiliar_facturacion_constante1)==true) {
			window.opener.parametro_auxiliar_facturacion_funcion1.resaltarRestaurarDivMensaje(true,parametro_auxiliar_facturacion_control.strAuxiliarMensajeAlert,parametro_auxiliar_facturacion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(parametro_auxiliar_facturacion_control) {
		this.parametro_auxiliar_facturacion_controlInicial=parametro_auxiliar_facturacion_control;
			
		if(parametro_auxiliar_facturacion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(parametro_auxiliar_facturacion_control.strStyleDivArbol,parametro_auxiliar_facturacion_control.strStyleDivContent
																,parametro_auxiliar_facturacion_control.strStyleDivOpcionesBanner,parametro_auxiliar_facturacion_control.strStyleDivExpandirColapsar
																,parametro_auxiliar_facturacion_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=parametro_auxiliar_facturacion_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",parametro_auxiliar_facturacion_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(parametro_auxiliar_facturacion_control) {
		this.actualizarCssBotonesPagina(parametro_auxiliar_facturacion_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(parametro_auxiliar_facturacion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(parametro_auxiliar_facturacion_control.tiposReportes,parametro_auxiliar_facturacion_control.tiposReporte
															 	,parametro_auxiliar_facturacion_control.tiposPaginacion,parametro_auxiliar_facturacion_control.tiposAcciones
																,parametro_auxiliar_facturacion_control.tiposColumnasSelect,parametro_auxiliar_facturacion_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(parametro_auxiliar_facturacion_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(parametro_auxiliar_facturacion_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(parametro_auxiliar_facturacion_control);			
	}
	
	actualizarPaginaUsuarioInvitado(parametro_auxiliar_facturacion_control) {
	
		var indexPosition=parametro_auxiliar_facturacion_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=parametro_auxiliar_facturacion_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(parametro_auxiliar_facturacion_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(parametro_auxiliar_facturacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_auxiliar_facturacion_control.strRecargarFkTipos,",")) { 
				parametro_auxiliar_facturacion_webcontrol1.cargarCombosempresasFK(parametro_auxiliar_facturacion_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(parametro_auxiliar_facturacion_control.strRecargarFkTiposNinguno!=null && parametro_auxiliar_facturacion_control.strRecargarFkTiposNinguno!='NINGUNO' && parametro_auxiliar_facturacion_control.strRecargarFkTiposNinguno!='') {
			
				if(parametro_auxiliar_facturacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",parametro_auxiliar_facturacion_control.strRecargarFkTiposNinguno,",")) { 
					parametro_auxiliar_facturacion_webcontrol1.cargarCombosempresasFK(parametro_auxiliar_facturacion_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(parametro_auxiliar_facturacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_control.empresasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(parametro_auxiliar_facturacion_control) {
		jQuery("#divBusquedaparametro_auxiliar_facturacionAjaxWebPart").css("display",parametro_auxiliar_facturacion_control.strPermisoBusqueda);
		jQuery("#trparametro_auxiliar_facturacionCabeceraBusquedas").css("display",parametro_auxiliar_facturacion_control.strPermisoBusqueda);
		jQuery("#trBusquedaparametro_auxiliar_facturacion").css("display",parametro_auxiliar_facturacion_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(parametro_auxiliar_facturacion_control.htmlTablaOrderBy!=null
			&& parametro_auxiliar_facturacion_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByparametro_auxiliar_facturacionAjaxWebPart").html(parametro_auxiliar_facturacion_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//parametro_auxiliar_facturacion_webcontrol1.registrarOrderByActions();
			
		}
			
		if(parametro_auxiliar_facturacion_control.htmlTablaOrderByRel!=null
			&& parametro_auxiliar_facturacion_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelparametro_auxiliar_facturacionAjaxWebPart").html(parametro_auxiliar_facturacion_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(parametro_auxiliar_facturacion_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaparametro_auxiliar_facturacionAjaxWebPart").css("display","none");
			jQuery("#trparametro_auxiliar_facturacionCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaparametro_auxiliar_facturacion").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(parametro_auxiliar_facturacion_control) {
		
		if(!parametro_auxiliar_facturacion_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(parametro_auxiliar_facturacion_control);
		} else {
			jQuery("#divTablaDatosparametro_auxiliar_facturacionsAjaxWebPart").html(parametro_auxiliar_facturacion_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosparametro_auxiliar_facturacions=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(parametro_auxiliar_facturacion_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosparametro_auxiliar_facturacions=jQuery("#tblTablaDatosparametro_auxiliar_facturacions").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("parametro_auxiliar_facturacion",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',parametro_auxiliar_facturacion_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			parametro_auxiliar_facturacion_webcontrol1.registrarControlesTableEdition(parametro_auxiliar_facturacion_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		parametro_auxiliar_facturacion_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(parametro_auxiliar_facturacion_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("parametro_auxiliar_facturacion_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(parametro_auxiliar_facturacion_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosparametro_auxiliar_facturacionsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(parametro_auxiliar_facturacion_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(parametro_auxiliar_facturacion_control);
		
		const divOrderBy = document.getElementById("divOrderByparametro_auxiliar_facturacionAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(parametro_auxiliar_facturacion_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelparametro_auxiliar_facturacionAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(parametro_auxiliar_facturacion_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(parametro_auxiliar_facturacion_control.parametro_auxiliar_facturacionActual!=null) {//form
			
			this.actualizarCamposFilaTabla(parametro_auxiliar_facturacion_control);			
		}
	}
	
	actualizarCamposFilaTabla(parametro_auxiliar_facturacion_control) {
		var i=0;
		
		i=parametro_auxiliar_facturacion_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(parametro_auxiliar_facturacion_control.parametro_auxiliar_facturacionActual.id);
		jQuery("#t-version_row_"+i+"").val(parametro_auxiliar_facturacion_control.parametro_auxiliar_facturacionActual.versionRow);
		
		if(parametro_auxiliar_facturacion_control.parametro_auxiliar_facturacionActual.id_empresa!=null && parametro_auxiliar_facturacion_control.parametro_auxiliar_facturacionActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != parametro_auxiliar_facturacion_control.parametro_auxiliar_facturacionActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(parametro_auxiliar_facturacion_control.parametro_auxiliar_facturacionActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(parametro_auxiliar_facturacion_control.parametro_auxiliar_facturacionActual.nombre_tipo_factura);
		jQuery("#t-cel_"+i+"_4").val(parametro_auxiliar_facturacion_control.parametro_auxiliar_facturacionActual.siguiente_numero_correlativo);
		jQuery("#t-cel_"+i+"_5").val(parametro_auxiliar_facturacion_control.parametro_auxiliar_facturacionActual.incremento);
		jQuery("#t-cel_"+i+"_6").prop('checked',parametro_auxiliar_facturacion_control.parametro_auxiliar_facturacionActual.con_creacion_rapida_producto);
		jQuery("#t-cel_"+i+"_7").prop('checked',parametro_auxiliar_facturacion_control.parametro_auxiliar_facturacionActual.con_busqueda_producto_fabricante);
		jQuery("#t-cel_"+i+"_8").prop('checked',parametro_auxiliar_facturacion_control.parametro_auxiliar_facturacionActual.con_solo_costo_producto);
		jQuery("#t-cel_"+i+"_9").prop('checked',parametro_auxiliar_facturacion_control.parametro_auxiliar_facturacionActual.con_recibo);
		jQuery("#t-cel_"+i+"_10").val(parametro_auxiliar_facturacion_control.parametro_auxiliar_facturacionActual.nombre_tipo_factura_recibo);
		jQuery("#t-cel_"+i+"_11").val(parametro_auxiliar_facturacion_control.parametro_auxiliar_facturacionActual.siguiente_numero_correlativo_recibo);
		jQuery("#t-cel_"+i+"_12").val(parametro_auxiliar_facturacion_control.parametro_auxiliar_facturacionActual.incremento_recibo);
		jQuery("#t-cel_"+i+"_13").prop('checked',parametro_auxiliar_facturacion_control.parametro_auxiliar_facturacionActual.con_impuesto_final_boleta);
		jQuery("#t-cel_"+i+"_14").prop('checked',parametro_auxiliar_facturacion_control.parametro_auxiliar_facturacionActual.con_ticket);
		jQuery("#t-cel_"+i+"_15").val(parametro_auxiliar_facturacion_control.parametro_auxiliar_facturacionActual.nombre_tipo_factura_ticket);
		jQuery("#t-cel_"+i+"_16").val(parametro_auxiliar_facturacion_control.parametro_auxiliar_facturacionActual.siguiente_numero_correlativo_ticket);
		jQuery("#t-cel_"+i+"_17").val(parametro_auxiliar_facturacion_control.parametro_auxiliar_facturacionActual.incremento_ticket);
		jQuery("#t-cel_"+i+"_18").prop('checked',parametro_auxiliar_facturacion_control.parametro_auxiliar_facturacionActual.con_impuesto_final_ticket);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(parametro_auxiliar_facturacion_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("parametro_auxiliar_facturacion","general","",parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_webcontrol1,parametro_auxiliar_facturacion_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("parametro_auxiliar_facturacion","general","",parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("parametro_auxiliar_facturacion","general","",parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(parametro_auxiliar_facturacion_control) {
		parametro_auxiliar_facturacion_funcion1.registrarControlesTableValidacionEdition(parametro_auxiliar_facturacion_control,parametro_auxiliar_facturacion_webcontrol1,parametro_auxiliar_facturacion_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(parametro_auxiliar_facturacion_control) {
		jQuery("#divResumenparametro_auxiliar_facturacionActualAjaxWebPart").html(parametro_auxiliar_facturacion_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(parametro_auxiliar_facturacion_control) {
		//jQuery("#divAccionesRelacionesparametro_auxiliar_facturacionAjaxWebPart").html(parametro_auxiliar_facturacion_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("parametro_auxiliar_facturacion_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(parametro_auxiliar_facturacion_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesparametro_auxiliar_facturacionAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		parametro_auxiliar_facturacion_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(parametro_auxiliar_facturacion_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(parametro_auxiliar_facturacion_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(parametro_auxiliar_facturacion_control) {
		
		if(parametro_auxiliar_facturacion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+parametro_auxiliar_facturacion_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",parametro_auxiliar_facturacion_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+parametro_auxiliar_facturacion_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",parametro_auxiliar_facturacion_control.strVisibleFK_Idempresa);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionparametro_auxiliar_facturacion();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("parametro_auxiliar_facturacion","general","",parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("parametro_auxiliar_facturacion",id,"general","",parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_webcontrol1,parametro_auxiliar_facturacion_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		parametro_auxiliar_facturacion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("parametro_auxiliar_facturacion","empresa","general","",parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_webcontrol1,parametro_auxiliar_facturacion_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("parametro_auxiliar_facturacion","general","",parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_webcontrol1,parametro_auxiliar_facturacionConstante,strParametros);
		
		//parametro_auxiliar_facturacion_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(parametro_auxiliar_facturacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+parametro_auxiliar_facturacion_constante1.STR_SUFIJO+"-id_empresa",parametro_auxiliar_facturacion_control.empresasFK);

		if(parametro_auxiliar_facturacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+parametro_auxiliar_facturacion_control.idFilaTablaActual+"_2",parametro_auxiliar_facturacion_control.empresasFK);
		}
	};

	
	
	registrarComboActionChangeCombosempresasFK(parametro_auxiliar_facturacion_control) {

	};

	
	
	setDefectoValorCombosempresasFK(parametro_auxiliar_facturacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(parametro_auxiliar_facturacion_control.idempresaDefaultFK>-1 && jQuery("#form"+parametro_auxiliar_facturacion_constante1.STR_SUFIJO+"-id_empresa").val() != parametro_auxiliar_facturacion_control.idempresaDefaultFK) {
				jQuery("#form"+parametro_auxiliar_facturacion_constante1.STR_SUFIJO+"-id_empresa").val(parametro_auxiliar_facturacion_control.idempresaDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("parametro_auxiliar_facturacion","general","",parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_webcontrol1,parametro_auxiliar_facturacion_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//parametro_auxiliar_facturacion_control
		
	
	}
	
	onLoadCombosDefectoFK(parametro_auxiliar_facturacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_auxiliar_facturacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(parametro_auxiliar_facturacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_auxiliar_facturacion_control.strRecargarFkTipos,",")) { 
				parametro_auxiliar_facturacion_webcontrol1.setDefectoValorCombosempresasFK(parametro_auxiliar_facturacion_control);
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
	onLoadCombosEventosFK(parametro_auxiliar_facturacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_auxiliar_facturacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(parametro_auxiliar_facturacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_auxiliar_facturacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				parametro_auxiliar_facturacion_webcontrol1.registrarComboActionChangeCombosempresasFK(parametro_auxiliar_facturacion_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(parametro_auxiliar_facturacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_auxiliar_facturacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(parametro_auxiliar_facturacion_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("parametro_auxiliar_facturacion","general","",parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("parametro_auxiliar_facturacion","general","",parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("parametro_auxiliar_facturacion","general","",parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_webcontrol1,parametro_auxiliar_facturacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("parametro_auxiliar_facturacion","general","",parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_webcontrol1,parametro_auxiliar_facturacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("parametro_auxiliar_facturacion","general","",parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("parametro_auxiliar_facturacion","general","",parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("parametro_auxiliar_facturacion","general","",parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_webcontrol1,parametro_auxiliar_facturacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("parametro_auxiliar_facturacion","general","",parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("parametro_auxiliar_facturacion","general","",parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("parametro_auxiliar_facturacion","general","",parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("parametro_auxiliar_facturacion","general","",parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("parametro_auxiliar_facturacion","general","",parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("parametro_auxiliar_facturacion","general","",parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_webcontrol1,parametro_auxiliar_facturacion_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("parametro_auxiliar_facturacion","general","",parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(parametro_auxiliar_facturacion_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("parametro_auxiliar_facturacion","general","",parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("parametro_auxiliar_facturacion","general","",parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("parametro_auxiliar_facturacion","general","",parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("parametro_auxiliar_facturacion","FK_Idempresa","general","",parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_webcontrol1,parametro_auxiliar_facturacion_constante1);
		
			
			if(parametro_auxiliar_facturacion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("parametro_auxiliar_facturacion","general","",parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("parametro_auxiliar_facturacion","general","",parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("parametro_auxiliar_facturacion");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("parametro_auxiliar_facturacion","general","",parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("parametro_auxiliar_facturacion","general","",parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("parametro_auxiliar_facturacion","general","",parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("parametro_auxiliar_facturacion");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("parametro_auxiliar_facturacion","general","",parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_webcontrol1,parametro_auxiliar_facturacion_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(parametro_auxiliar_facturacion_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("parametro_auxiliar_facturacion","general","",parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_webcontrol1,"parametro_auxiliar_facturacion");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_webcontrol1,parametro_auxiliar_facturacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+parametro_auxiliar_facturacion_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				parametro_auxiliar_facturacion_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("parametro_auxiliar_facturacion","general","",parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(parametro_auxiliar_facturacion_control) {
		
		jQuery("#divBusquedaparametro_auxiliar_facturacionAjaxWebPart").css("display",parametro_auxiliar_facturacion_control.strPermisoBusqueda);
		jQuery("#trparametro_auxiliar_facturacionCabeceraBusquedas").css("display",parametro_auxiliar_facturacion_control.strPermisoBusqueda);
		jQuery("#trBusquedaparametro_auxiliar_facturacion").css("display",parametro_auxiliar_facturacion_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteparametro_auxiliar_facturacion").css("display",parametro_auxiliar_facturacion_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosparametro_auxiliar_facturacion").attr("style",parametro_auxiliar_facturacion_control.strPermisoMostrarTodos);		
		
		if(parametro_auxiliar_facturacion_control.strPermisoNuevo!=null) {
			jQuery("#tdparametro_auxiliar_facturacionNuevo").css("display",parametro_auxiliar_facturacion_control.strPermisoNuevo);
			jQuery("#tdparametro_auxiliar_facturacionNuevoToolBar").css("display",parametro_auxiliar_facturacion_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdparametro_auxiliar_facturacionDuplicar").css("display",parametro_auxiliar_facturacion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdparametro_auxiliar_facturacionDuplicarToolBar").css("display",parametro_auxiliar_facturacion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdparametro_auxiliar_facturacionNuevoGuardarCambios").css("display",parametro_auxiliar_facturacion_control.strPermisoNuevo);
			jQuery("#tdparametro_auxiliar_facturacionNuevoGuardarCambiosToolBar").css("display",parametro_auxiliar_facturacion_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(parametro_auxiliar_facturacion_control.strPermisoActualizar!=null) {
			jQuery("#tdparametro_auxiliar_facturacionCopiar").css("display",parametro_auxiliar_facturacion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdparametro_auxiliar_facturacionCopiarToolBar").css("display",parametro_auxiliar_facturacion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdparametro_auxiliar_facturacionConEditar").css("display",parametro_auxiliar_facturacion_control.strPermisoActualizar);
		}
		
		jQuery("#tdparametro_auxiliar_facturacionGuardarCambios").css("display",parametro_auxiliar_facturacion_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdparametro_auxiliar_facturacionGuardarCambiosToolBar").css("display",parametro_auxiliar_facturacion_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdparametro_auxiliar_facturacionCerrarPagina").css("display",parametro_auxiliar_facturacion_control.strPermisoPopup);		
		jQuery("#tdparametro_auxiliar_facturacionCerrarPaginaToolBar").css("display",parametro_auxiliar_facturacion_control.strPermisoPopup);
		//jQuery("#trparametro_auxiliar_facturacionAccionesRelaciones").css("display",parametro_auxiliar_facturacion_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=parametro_auxiliar_facturacion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + parametro_auxiliar_facturacion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + parametro_auxiliar_facturacion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Parametro AuxiliarNOUSO Facturaciones";
		sTituloBanner+=" - " + parametro_auxiliar_facturacion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + parametro_auxiliar_facturacion_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdparametro_auxiliar_facturacionRelacionesToolBar").css("display",parametro_auxiliar_facturacion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosparametro_auxiliar_facturacion").css("display",parametro_auxiliar_facturacion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("parametro_auxiliar_facturacion","general","",parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_webcontrol1,parametro_auxiliar_facturacion_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("parametro_auxiliar_facturacion","general","",parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		parametro_auxiliar_facturacion_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		parametro_auxiliar_facturacion_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		parametro_auxiliar_facturacion_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		parametro_auxiliar_facturacion_webcontrol1.registrarEventosControles();
		
		if(parametro_auxiliar_facturacion_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(parametro_auxiliar_facturacion_constante1.STR_ES_RELACIONADO=="false") {
			parametro_auxiliar_facturacion_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(parametro_auxiliar_facturacion_constante1.STR_ES_RELACIONES=="true") {
			if(parametro_auxiliar_facturacion_constante1.BIT_ES_PAGINA_FORM==true) {
				parametro_auxiliar_facturacion_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(parametro_auxiliar_facturacion_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(parametro_auxiliar_facturacion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				parametro_auxiliar_facturacion_webcontrol1.onLoad();
			
			//} else {
				//if(parametro_auxiliar_facturacion_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			parametro_auxiliar_facturacion_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("parametro_auxiliar_facturacion","general","",parametro_auxiliar_facturacion_funcion1,parametro_auxiliar_facturacion_webcontrol1,parametro_auxiliar_facturacion_constante1);	
	}
}

var parametro_auxiliar_facturacion_webcontrol1 = new parametro_auxiliar_facturacion_webcontrol();

//Para ser llamado desde otro archivo (import)
export {parametro_auxiliar_facturacion_webcontrol,parametro_auxiliar_facturacion_webcontrol1};

//Para ser llamado desde window.opener
window.parametro_auxiliar_facturacion_webcontrol1 = parametro_auxiliar_facturacion_webcontrol1;


if(parametro_auxiliar_facturacion_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = parametro_auxiliar_facturacion_webcontrol1.onLoadWindow; 
}

//</script>