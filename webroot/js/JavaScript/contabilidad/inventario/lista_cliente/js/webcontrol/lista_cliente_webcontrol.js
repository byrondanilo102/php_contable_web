//<script type="text/javascript" language="javascript">



//var lista_clienteJQueryPaginaWebInteraccion= function (lista_cliente_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {lista_cliente_constante,lista_cliente_constante1} from '../util/lista_cliente_constante.js';

import {lista_cliente_funcion,lista_cliente_funcion1} from '../util/lista_cliente_funcion.js';


class lista_cliente_webcontrol extends GeneralEntityWebControl {
	
	lista_cliente_control=null;
	lista_cliente_controlInicial=null;
	lista_cliente_controlAuxiliar=null;
		
	//if(lista_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(lista_cliente_control) {
		super();
		
		this.lista_cliente_control=lista_cliente_control;
	}
		
	actualizarVariablesPagina(lista_cliente_control) {
		
		if(lista_cliente_control.action=="index" || lista_cliente_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(lista_cliente_control);
			
		} 
		
		
		else if(lista_cliente_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(lista_cliente_control);
		
		} else if(lista_cliente_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(lista_cliente_control);
		
		} else if(lista_cliente_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(lista_cliente_control);
		
		} else if(lista_cliente_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(lista_cliente_control);
			
		} else if(lista_cliente_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(lista_cliente_control);
			
		} else if(lista_cliente_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(lista_cliente_control);
		
		} else if(lista_cliente_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(lista_cliente_control);		
		
		} else if(lista_cliente_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(lista_cliente_control);
		
		} else if(lista_cliente_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(lista_cliente_control);
		
		} else if(lista_cliente_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(lista_cliente_control);
		
		} else if(lista_cliente_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(lista_cliente_control);
		
		}  else if(lista_cliente_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(lista_cliente_control);
		
		} else if(lista_cliente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(lista_cliente_control);
		
		} else if(lista_cliente_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(lista_cliente_control);
		
		} else if(lista_cliente_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(lista_cliente_control);
		
		} else if(lista_cliente_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(lista_cliente_control);
		
		} else if(lista_cliente_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(lista_cliente_control);
		
		} else if(lista_cliente_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(lista_cliente_control);
		
		} else if(lista_cliente_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(lista_cliente_control);
		
		} else if(lista_cliente_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(lista_cliente_control);
		
		} else if(lista_cliente_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(lista_cliente_control);		
		
		} else if(lista_cliente_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(lista_cliente_control);		
		
		} else if(lista_cliente_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(lista_cliente_control);		
		
		} else if(lista_cliente_control.action.includes("Busqueda") ||
				  lista_cliente_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(lista_cliente_control);
			
		} else if(lista_cliente_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(lista_cliente_control)
		}
		
		
		
	
		else if(lista_cliente_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(lista_cliente_control);	
		
		} else if(lista_cliente_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(lista_cliente_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + lista_cliente_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(lista_cliente_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(lista_cliente_control) {
		this.actualizarPaginaAccionesGenerales(lista_cliente_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(lista_cliente_control) {
		
		this.actualizarPaginaCargaGeneral(lista_cliente_control);
		this.actualizarPaginaOrderBy(lista_cliente_control);
		this.actualizarPaginaTablaDatos(lista_cliente_control);
		this.actualizarPaginaCargaGeneralControles(lista_cliente_control);
		//this.actualizarPaginaFormulario(lista_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_cliente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(lista_cliente_control);
		this.actualizarPaginaAreaBusquedas(lista_cliente_control);
		this.actualizarPaginaCargaCombosFK(lista_cliente_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(lista_cliente_control) {
		//this.actualizarPaginaFormulario(lista_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(lista_cliente_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(lista_cliente_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(lista_cliente_control) {
		
		this.actualizarPaginaCargaGeneral(lista_cliente_control);
		this.actualizarPaginaTablaDatos(lista_cliente_control);
		this.actualizarPaginaCargaGeneralControles(lista_cliente_control);
		//this.actualizarPaginaFormulario(lista_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_cliente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(lista_cliente_control);
		this.actualizarPaginaAreaBusquedas(lista_cliente_control);
		this.actualizarPaginaCargaCombosFK(lista_cliente_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(lista_cliente_control) {
		this.actualizarPaginaTablaDatos(lista_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_cliente_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(lista_cliente_control) {
		this.actualizarPaginaTablaDatos(lista_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_cliente_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(lista_cliente_control) {
		this.actualizarPaginaTablaDatos(lista_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_cliente_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(lista_cliente_control) {
		this.actualizarPaginaTablaDatos(lista_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(lista_cliente_control) {
		this.actualizarPaginaTablaDatos(lista_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_cliente_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(lista_cliente_control) {
		this.actualizarPaginaTablaDatos(lista_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(lista_cliente_control) {
		this.actualizarPaginaTablaDatos(lista_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_cliente_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(lista_cliente_control) {
		this.actualizarPaginaTablaDatos(lista_cliente_control);		
		//this.actualizarPaginaFormulario(lista_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_cliente_control);		
		//this.actualizarPaginaAreaMantenimiento(lista_cliente_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(lista_cliente_control) {
		this.actualizarPaginaTablaDatos(lista_cliente_control);		
		//this.actualizarPaginaFormulario(lista_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_cliente_control);		
		//this.actualizarPaginaAreaMantenimiento(lista_cliente_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(lista_cliente_control) {
		this.actualizarPaginaTablaDatos(lista_cliente_control);		
		//this.actualizarPaginaFormulario(lista_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_cliente_control);		
		//this.actualizarPaginaAreaMantenimiento(lista_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(lista_cliente_control) {
		//this.actualizarPaginaFormulario(lista_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(lista_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(lista_cliente_control) {
		this.actualizarPaginaAbrirLink(lista_cliente_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(lista_cliente_control) {
		this.actualizarPaginaTablaDatos(lista_cliente_control);				
		//this.actualizarPaginaFormulario(lista_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(lista_cliente_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(lista_cliente_control) {
		this.actualizarPaginaTablaDatos(lista_cliente_control);
		//this.actualizarPaginaFormulario(lista_cliente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(lista_cliente_control);		
		//this.actualizarPaginaAreaMantenimiento(lista_cliente_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(lista_cliente_control) {
		this.actualizarPaginaTablaDatos(lista_cliente_control);
		//this.actualizarPaginaFormulario(lista_cliente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(lista_cliente_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(lista_cliente_control) {
		//this.actualizarPaginaFormulario(lista_cliente_control);
		this.onLoadCombosDefectoFK(lista_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(lista_cliente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(lista_cliente_control) {
		this.actualizarPaginaTablaDatos(lista_cliente_control);
		//this.actualizarPaginaFormulario(lista_cliente_control);
		this.onLoadCombosDefectoFK(lista_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_cliente_control);		
		//this.actualizarPaginaAreaMantenimiento(lista_cliente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(lista_cliente_control) {
		this.actualizarPaginaAbrirLink(lista_cliente_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(lista_cliente_control) {
		this.actualizarPaginaTablaDatos(lista_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_cliente_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(lista_cliente_control) {
					//super.actualizarPaginaImprimir(lista_cliente_control,"lista_cliente");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",lista_cliente_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("lista_cliente_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(lista_cliente_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(lista_cliente_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(lista_cliente_control) {
		//super.actualizarPaginaImprimir(lista_cliente_control,"lista_cliente");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("lista_cliente_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(lista_cliente_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",lista_cliente_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(lista_cliente_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(lista_cliente_control) {
		//super.actualizarPaginaImprimir(lista_cliente_control,"lista_cliente");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("lista_cliente_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(lista_cliente_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",lista_cliente_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(lista_cliente_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1,lista_cliente_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(lista_cliente_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(lista_cliente_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(lista_cliente_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(lista_cliente_control);
			
		this.actualizarPaginaAbrirLink(lista_cliente_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(lista_cliente_control) {
		
		if(lista_cliente_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(lista_cliente_control);
		}
		
		if(lista_cliente_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(lista_cliente_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(lista_cliente_control) {
		if(lista_cliente_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("lista_clienteReturnGeneral",JSON.stringify(lista_cliente_control.lista_clienteReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(lista_cliente_control) {
		if(lista_cliente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && lista_cliente_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(lista_cliente_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(lista_cliente_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(lista_cliente_control, mostrar) {
		
		if(mostrar==true) {
			lista_cliente_funcion1.resaltarRestaurarDivsPagina(false,"lista_cliente");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				lista_cliente_funcion1.resaltarRestaurarDivMantenimiento(false,"lista_cliente");
			}			
			
			lista_cliente_funcion1.mostrarDivMensaje(true,lista_cliente_control.strAuxiliarMensaje,lista_cliente_control.strAuxiliarCssMensaje);
		
		} else {
			lista_cliente_funcion1.mostrarDivMensaje(false,lista_cliente_control.strAuxiliarMensaje,lista_cliente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(lista_cliente_control) {
		if(lista_cliente_funcion1.esPaginaForm(lista_cliente_constante1)==true) {
			window.opener.lista_cliente_webcontrol1.actualizarPaginaTablaDatos(lista_cliente_control);
		} else {
			this.actualizarPaginaTablaDatos(lista_cliente_control);
		}
	}
	
	actualizarPaginaAbrirLink(lista_cliente_control) {
		lista_cliente_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(lista_cliente_control.strAuxiliarUrlPagina);
				
		lista_cliente_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(lista_cliente_control.strAuxiliarTipo,lista_cliente_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(lista_cliente_control) {
		lista_cliente_funcion1.resaltarRestaurarDivMensaje(true,lista_cliente_control.strAuxiliarMensajeAlert,lista_cliente_control.strAuxiliarCssMensaje);
			
		if(lista_cliente_funcion1.esPaginaForm(lista_cliente_constante1)==true) {
			window.opener.lista_cliente_funcion1.resaltarRestaurarDivMensaje(true,lista_cliente_control.strAuxiliarMensajeAlert,lista_cliente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(lista_cliente_control) {
		this.lista_cliente_controlInicial=lista_cliente_control;
			
		if(lista_cliente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(lista_cliente_control.strStyleDivArbol,lista_cliente_control.strStyleDivContent
																,lista_cliente_control.strStyleDivOpcionesBanner,lista_cliente_control.strStyleDivExpandirColapsar
																,lista_cliente_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=lista_cliente_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",lista_cliente_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(lista_cliente_control) {
		this.actualizarCssBotonesPagina(lista_cliente_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(lista_cliente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(lista_cliente_control.tiposReportes,lista_cliente_control.tiposReporte
															 	,lista_cliente_control.tiposPaginacion,lista_cliente_control.tiposAcciones
																,lista_cliente_control.tiposColumnasSelect,lista_cliente_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(lista_cliente_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(lista_cliente_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(lista_cliente_control);			
	}
	
	actualizarPaginaUsuarioInvitado(lista_cliente_control) {
	
		var indexPosition=lista_cliente_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=lista_cliente_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(lista_cliente_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(lista_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",lista_cliente_control.strRecargarFkTipos,",")) { 
				lista_cliente_webcontrol1.cargarCombosclientesFK(lista_cliente_control);
			}

			if(lista_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",lista_cliente_control.strRecargarFkTipos,",")) { 
				lista_cliente_webcontrol1.cargarCombosproductosFK(lista_cliente_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(lista_cliente_control.strRecargarFkTiposNinguno!=null && lista_cliente_control.strRecargarFkTiposNinguno!='NINGUNO' && lista_cliente_control.strRecargarFkTiposNinguno!='') {
			
				if(lista_cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cliente",lista_cliente_control.strRecargarFkTiposNinguno,",")) { 
					lista_cliente_webcontrol1.cargarCombosclientesFK(lista_cliente_control);
				}

				if(lista_cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",lista_cliente_control.strRecargarFkTiposNinguno,",")) { 
					lista_cliente_webcontrol1.cargarCombosproductosFK(lista_cliente_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaclienteFK(lista_cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_cliente_funcion1,lista_cliente_control.clientesFK);
	}

	cargarComboEditarTablaproductoFK(lista_cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_cliente_funcion1,lista_cliente_control.productosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(lista_cliente_control) {
		jQuery("#divBusquedalista_clienteAjaxWebPart").css("display",lista_cliente_control.strPermisoBusqueda);
		jQuery("#trlista_clienteCabeceraBusquedas").css("display",lista_cliente_control.strPermisoBusqueda);
		jQuery("#trBusquedalista_cliente").css("display",lista_cliente_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(lista_cliente_control.htmlTablaOrderBy!=null
			&& lista_cliente_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBylista_clienteAjaxWebPart").html(lista_cliente_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//lista_cliente_webcontrol1.registrarOrderByActions();
			
		}
			
		if(lista_cliente_control.htmlTablaOrderByRel!=null
			&& lista_cliente_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRellista_clienteAjaxWebPart").html(lista_cliente_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(lista_cliente_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedalista_clienteAjaxWebPart").css("display","none");
			jQuery("#trlista_clienteCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedalista_cliente").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(lista_cliente_control) {
		
		if(!lista_cliente_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(lista_cliente_control);
		} else {
			jQuery("#divTablaDatoslista_clientesAjaxWebPart").html(lista_cliente_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoslista_clientes=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(lista_cliente_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoslista_clientes=jQuery("#tblTablaDatoslista_clientes").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("lista_cliente",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',lista_cliente_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			lista_cliente_webcontrol1.registrarControlesTableEdition(lista_cliente_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		lista_cliente_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(lista_cliente_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("lista_cliente_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(lista_cliente_control);
		
		const divTablaDatos = document.getElementById("divTablaDatoslista_clientesAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(lista_cliente_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(lista_cliente_control);
		
		const divOrderBy = document.getElementById("divOrderBylista_clienteAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(lista_cliente_control);
		
		const divOrderByRel = document.getElementById("divOrderByRellista_clienteAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(lista_cliente_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(lista_cliente_control.lista_clienteActual!=null) {//form
			
			this.actualizarCamposFilaTabla(lista_cliente_control);			
		}
	}
	
	actualizarCamposFilaTabla(lista_cliente_control) {
		var i=0;
		
		i=lista_cliente_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(lista_cliente_control.lista_clienteActual.id);
		jQuery("#t-version_row_"+i+"").val(lista_cliente_control.lista_clienteActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(lista_cliente_control.lista_clienteActual.versionRow);
		
		if(lista_cliente_control.lista_clienteActual.id_cliente!=null && lista_cliente_control.lista_clienteActual.id_cliente>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != lista_cliente_control.lista_clienteActual.id_cliente) {
				jQuery("#t-cel_"+i+"_3").val(lista_cliente_control.lista_clienteActual.id_cliente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(lista_cliente_control.lista_clienteActual.id_producto!=null && lista_cliente_control.lista_clienteActual.id_producto>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != lista_cliente_control.lista_clienteActual.id_producto) {
				jQuery("#t-cel_"+i+"_4").val(lista_cliente_control.lista_clienteActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_5").val(lista_cliente_control.lista_clienteActual.precio);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(lista_cliente_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1,lista_cliente_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(lista_cliente_control) {
		lista_cliente_funcion1.registrarControlesTableValidacionEdition(lista_cliente_control,lista_cliente_webcontrol1,lista_cliente_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(lista_cliente_control) {
		jQuery("#divResumenlista_clienteActualAjaxWebPart").html(lista_cliente_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(lista_cliente_control) {
		//jQuery("#divAccionesRelacioneslista_clienteAjaxWebPart").html(lista_cliente_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("lista_cliente_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(lista_cliente_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacioneslista_clienteAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		lista_cliente_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(lista_cliente_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(lista_cliente_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(lista_cliente_control) {
		
		if(lista_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+lista_cliente_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",lista_cliente_control.strVisibleFK_Idcliente);
			jQuery("#tblstrVisible"+lista_cliente_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",lista_cliente_control.strVisibleFK_Idcliente);
		}

		if(lista_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+lista_cliente_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",lista_cliente_control.strVisibleFK_Idproducto);
			jQuery("#tblstrVisible"+lista_cliente_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",lista_cliente_control.strVisibleFK_Idproducto);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionlista_cliente();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("lista_cliente",id,"inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1,lista_cliente_constante1);		
	}
	
	

	abrirBusquedaParacliente(strNombreCampoBusqueda){//idActual
		lista_cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("lista_cliente","cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1,lista_cliente_constante1);
	}

	abrirBusquedaParaproducto(strNombreCampoBusqueda){//idActual
		lista_cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("lista_cliente","producto","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1,lista_cliente_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1,lista_clienteConstante,strParametros);
		
		//lista_cliente_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosclientesFK(lista_cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_cliente_constante1.STR_SUFIJO+"-id_cliente",lista_cliente_control.clientesFK);

		if(lista_cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_cliente_control.idFilaTablaActual+"_3",lista_cliente_control.clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_cliente_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",lista_cliente_control.clientesFK);

	};

	cargarCombosproductosFK(lista_cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_cliente_constante1.STR_SUFIJO+"-id_producto",lista_cliente_control.productosFK);

		if(lista_cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_cliente_control.idFilaTablaActual+"_4",lista_cliente_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_cliente_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",lista_cliente_control.productosFK);

	};

	
	
	registrarComboActionChangeCombosclientesFK(lista_cliente_control) {

	};

	registrarComboActionChangeCombosproductosFK(lista_cliente_control) {

	};

	
	
	setDefectoValorCombosclientesFK(lista_cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_cliente_control.idclienteDefaultFK>-1 && jQuery("#form"+lista_cliente_constante1.STR_SUFIJO+"-id_cliente").val() != lista_cliente_control.idclienteDefaultFK) {
				jQuery("#form"+lista_cliente_constante1.STR_SUFIJO+"-id_cliente").val(lista_cliente_control.idclienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_cliente_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(lista_cliente_control.idclienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_cliente_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_cliente_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproductosFK(lista_cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_cliente_control.idproductoDefaultFK>-1 && jQuery("#form"+lista_cliente_constante1.STR_SUFIJO+"-id_producto").val() != lista_cliente_control.idproductoDefaultFK) {
				jQuery("#form"+lista_cliente_constante1.STR_SUFIJO+"-id_producto").val(lista_cliente_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_cliente_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(lista_cliente_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_cliente_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_cliente_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1,lista_cliente_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//lista_cliente_control
		
	
	}
	
	onLoadCombosDefectoFK(lista_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(lista_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(lista_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",lista_cliente_control.strRecargarFkTipos,",")) { 
				lista_cliente_webcontrol1.setDefectoValorCombosclientesFK(lista_cliente_control);
			}

			if(lista_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",lista_cliente_control.strRecargarFkTipos,",")) { 
				lista_cliente_webcontrol1.setDefectoValorCombosproductosFK(lista_cliente_control);
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
	onLoadCombosEventosFK(lista_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(lista_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(lista_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",lista_cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_cliente_webcontrol1.registrarComboActionChangeCombosclientesFK(lista_cliente_control);
			//}

			//if(lista_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",lista_cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_cliente_webcontrol1.registrarComboActionChangeCombosproductosFK(lista_cliente_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(lista_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(lista_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(lista_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1,lista_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1,lista_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1,lista_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1,lista_cliente_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(lista_cliente_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("lista_cliente","FK_Idcliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1,lista_cliente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("lista_cliente","FK_Idproducto","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1,lista_cliente_constante1);
		
			
			if(lista_cliente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("lista_cliente");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("lista_cliente");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1,lista_cliente_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(lista_cliente_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1,"lista_cliente");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cliente","id_cliente","cuentascobrar","",lista_cliente_funcion1,lista_cliente_webcontrol1,lista_cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_cliente_constante1.STR_SUFIJO+"-id_cliente_img_busqueda").click(function(){
				lista_cliente_webcontrol1.abrirBusquedaParacliente("id_cliente");
				//alert(jQuery('#form-id_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1,lista_cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_cliente_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				lista_cliente_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(lista_cliente_control) {
		
		jQuery("#divBusquedalista_clienteAjaxWebPart").css("display",lista_cliente_control.strPermisoBusqueda);
		jQuery("#trlista_clienteCabeceraBusquedas").css("display",lista_cliente_control.strPermisoBusqueda);
		jQuery("#trBusquedalista_cliente").css("display",lista_cliente_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportelista_cliente").css("display",lista_cliente_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoslista_cliente").attr("style",lista_cliente_control.strPermisoMostrarTodos);		
		
		if(lista_cliente_control.strPermisoNuevo!=null) {
			jQuery("#tdlista_clienteNuevo").css("display",lista_cliente_control.strPermisoNuevo);
			jQuery("#tdlista_clienteNuevoToolBar").css("display",lista_cliente_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdlista_clienteDuplicar").css("display",lista_cliente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdlista_clienteDuplicarToolBar").css("display",lista_cliente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdlista_clienteNuevoGuardarCambios").css("display",lista_cliente_control.strPermisoNuevo);
			jQuery("#tdlista_clienteNuevoGuardarCambiosToolBar").css("display",lista_cliente_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(lista_cliente_control.strPermisoActualizar!=null) {
			jQuery("#tdlista_clienteCopiar").css("display",lista_cliente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdlista_clienteCopiarToolBar").css("display",lista_cliente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdlista_clienteConEditar").css("display",lista_cliente_control.strPermisoActualizar);
		}
		
		jQuery("#tdlista_clienteGuardarCambios").css("display",lista_cliente_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdlista_clienteGuardarCambiosToolBar").css("display",lista_cliente_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdlista_clienteCerrarPagina").css("display",lista_cliente_control.strPermisoPopup);		
		jQuery("#tdlista_clienteCerrarPaginaToolBar").css("display",lista_cliente_control.strPermisoPopup);
		//jQuery("#trlista_clienteAccionesRelaciones").css("display",lista_cliente_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=lista_cliente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + lista_cliente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + lista_cliente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Lista Clientes";
		sTituloBanner+=" - " + lista_cliente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + lista_cliente_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdlista_clienteRelacionesToolBar").css("display",lista_cliente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoslista_cliente").css("display",lista_cliente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1,lista_cliente_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		lista_cliente_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		lista_cliente_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		lista_cliente_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		lista_cliente_webcontrol1.registrarEventosControles();
		
		if(lista_cliente_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(lista_cliente_constante1.STR_ES_RELACIONADO=="false") {
			lista_cliente_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(lista_cliente_constante1.STR_ES_RELACIONES=="true") {
			if(lista_cliente_constante1.BIT_ES_PAGINA_FORM==true) {
				lista_cliente_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(lista_cliente_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(lista_cliente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				lista_cliente_webcontrol1.onLoad();
			
			//} else {
				//if(lista_cliente_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			lista_cliente_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1,lista_cliente_constante1);	
	}
	
	/*
		Variables-Pagina: actualizarVariablesPagina
		Variables-Pagina: actualizarVariablesPagina(AccionesGenerales,AccionIndex,AccionCancelar,AccionMostrarEjecutar,AccionIndex)
		Variables-Pagina: actualizarVariablesPagina(AccionRecargarInformacion,AccionBusquedas,AccionBuscarPorIdGeneral,AccionAnteriores)
		Variables-Pagina: actualizarVariablesPagina(AccionSiguientes,AccionRecargarUltimaInformacion,AccionSeleccionarLoteFk)
		Variables-Pagina: actualizarVariablesPagina(AccionGuardarCambios,AccionDuplicar,AccionCopiar,AccionSeleccionarActual)
		Variables-Pagina: actualizarVariablesPagina(AccionEliminarCascada,AccionEliminarTabla,AccionQuitarElementosTabla,AccionNuevoPreparar)
		Variables-Pagina: actualizarVariablesPagina(AccionNuevoTablaPreparar,AccionNuevoPrepararAbrirPaginaForm,AccionEditarTablaDatos)
		Variables-Pagina: actualizarVariablesPagina(AccionGenerarHtmlReporte,AccionGenerarHtmlFormReporte,AccionGenerarHtmlRelacionesReporte)
		Variables-Pagina: actualizarVariablesPagina(AccionQuitarRelacionesReporte,AccionGenerarReporteAbrirPaginaForm,AccionEliminarCascada)
		Pagina: actualizarPagina(AccionesGenerales,GuardarReturnSession,MensajePantallaAuxiliar,MensajePantalla,TablaDatosAuxiliar)
		Pagina: actualizarPagina(AbrirLink,MensajeAlert,CargaGeneral,CargaGeneralControles,CargaCombosFK,UsuarioInvitado)
		Pagina: actualizarPagina(AreaBusquedas,TablaDatos,TablaDatosJsTemplate,OrderBy,TablaFilaActual)
		Campos: actualizarCamposFilaTabla
		Combos: cargarCombosFK,cargarComboEditarTablaempresaFK,cargarComboEditarTablasucursalFK
		Combos: cargarCombosempresasFK,cargarCombossucursalsFK
		Combos-Defecto: setDefectoValorCombosempresasFK,setDefectoValorCombossucursalsFK
		TablaAccionesControles-Sesion: registrarTablaAcciones,registrarSesion_defectoParaproductos,registrarControlesTableEdition
		Css: actualizarCssBusquedas,actualizarCssBotonesPagina
		Recargar-Buscar: recargarUltimaInformacion,buscarPorIdGeneral
		Abrir: abrirBusquedaParaempresa
		Registrar-Seleccionar: registrarDivAccionesRelaciones,manejarSeleccionarLoteFk
		Eventos: registrarEventosControles
		Registrar: registrarAccionesEventos,registrarPropiedadesPagina
		OnLoad: onLoadRecargarRelacionado,onLoadCombosDefectoFK,onLoadCombosEventosFK
		OnLoad: onLoad,onUnLoadWindow,onLoadWindow,registrarEventosOnLoadGlobal
	*/
}

var lista_cliente_webcontrol1 = new lista_cliente_webcontrol();

//Para ser llamado desde otro archivo (import)
export {lista_cliente_webcontrol,lista_cliente_webcontrol1};

//Para ser llamado desde window.opener
window.lista_cliente_webcontrol1 = lista_cliente_webcontrol1;


if(lista_cliente_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = lista_cliente_webcontrol1.onLoadWindow; 
}

//</script>