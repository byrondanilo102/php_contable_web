//<script type="text/javascript" language="javascript">



//var cuenta_pagarJQueryPaginaWebInteraccion= function (cuenta_pagar_control) {
//this.,this.,this.

class cuenta_pagar_webcontrol extends cuenta_pagar_webcontrol_add {
	
	cuenta_pagar_control=null;
	cuenta_pagar_controlInicial=null;
	cuenta_pagar_controlAuxiliar=null;
		
	//if(cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(cuenta_pagar_control) {
		super();
		
		this.cuenta_pagar_control=cuenta_pagar_control;
	}
		
	actualizarVariablesPagina(cuenta_pagar_control) {
		
		if(cuenta_pagar_control.action=="index" || cuenta_pagar_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(cuenta_pagar_control);
			
		} else if(cuenta_pagar_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(cuenta_pagar_control);
		
		} else if(cuenta_pagar_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(cuenta_pagar_control);
		
		} else if(cuenta_pagar_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(cuenta_pagar_control);
		
		} else if(cuenta_pagar_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(cuenta_pagar_control);
			
		} else if(cuenta_pagar_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(cuenta_pagar_control);
			
		} else if(cuenta_pagar_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(cuenta_pagar_control);
		
		} else if(cuenta_pagar_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(cuenta_pagar_control);
		
		} else if(cuenta_pagar_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(cuenta_pagar_control);
		
		} else if(cuenta_pagar_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(cuenta_pagar_control);
		
		} else if(cuenta_pagar_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(cuenta_pagar_control);
		
		} else if(cuenta_pagar_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(cuenta_pagar_control);
		
		} else if(cuenta_pagar_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(cuenta_pagar_control);
		
		} else if(cuenta_pagar_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(cuenta_pagar_control);
		
		} else if(cuenta_pagar_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(cuenta_pagar_control);
		
		} else if(cuenta_pagar_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(cuenta_pagar_control);
		
		} else if(cuenta_pagar_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cuenta_pagar_control);
		
		} else if(cuenta_pagar_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cuenta_pagar_control);
		
		} else if(cuenta_pagar_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cuenta_pagar_control);
		
		} else if(cuenta_pagar_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(cuenta_pagar_control);
		
		} else if(cuenta_pagar_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(cuenta_pagar_control);
		
		} else if(cuenta_pagar_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(cuenta_pagar_control);
		
		} else if(cuenta_pagar_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(cuenta_pagar_control);
		
		} else if(cuenta_pagar_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cuenta_pagar_control);
		
		} else if(cuenta_pagar_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cuenta_pagar_control);
		
		} else if(cuenta_pagar_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(cuenta_pagar_control);
		
		} else if(cuenta_pagar_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(cuenta_pagar_control);
		
		} else if(cuenta_pagar_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cuenta_pagar_control);		
		
		} else if(cuenta_pagar_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(cuenta_pagar_control);		
		
		} else if(cuenta_pagar_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(cuenta_pagar_control);		
		
		} else if(cuenta_pagar_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(cuenta_pagar_control);		
		}
		else if(cuenta_pagar_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cuenta_pagar_control);		
		}
		else if(cuenta_pagar_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cuenta_pagar_control);		
		}
		else if(cuenta_pagar_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cuenta_pagar_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(cuenta_pagar_control.action + " Revisar Manejo");
			
			if(cuenta_pagar_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(cuenta_pagar_control);
				
				return;
			}
			
			//if(cuenta_pagar_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(cuenta_pagar_control);
			//}
			
			if(cuenta_pagar_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(cuenta_pagar_control);
			}
			
			if(cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cuenta_pagar_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(cuenta_pagar_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(cuenta_pagar_control, false);			
			}
			
			if(cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(cuenta_pagar_control);	
			}
			
			if(cuenta_pagar_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(cuenta_pagar_control);
			}
			
			if(cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(cuenta_pagar_control);
			}
			
			if(cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(cuenta_pagar_control);
			}
			
			if(cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(cuenta_pagar_control);	
			}
			
			if(cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(cuenta_pagar_control);
			}
			
			if(cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(cuenta_pagar_control);
			}
			
			
			if(cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(cuenta_pagar_control);			
			}
			
			if(cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(cuenta_pagar_control);
			}
			
			
			if(cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(cuenta_pagar_control);
			}
			
			if(cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(cuenta_pagar_control);
			}				
			
			if(cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(cuenta_pagar_control);
			}
			
			if(cuenta_pagar_control.usuarioActual!=null && cuenta_pagar_control.usuarioActual.field_strUserName!=null &&
			cuenta_pagar_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(cuenta_pagar_control);			
			}
		}
		
		
		if(cuenta_pagar_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(cuenta_pagar_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(cuenta_pagar_control) {
		
		this.actualizarPaginaCargaGeneral(cuenta_pagar_control);
		this.actualizarPaginaTablaDatos(cuenta_pagar_control);
		this.actualizarPaginaCargaGeneralControles(cuenta_pagar_control);
		this.actualizarPaginaFormulario(cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cuenta_pagar_control);
		this.actualizarPaginaAreaBusquedas(cuenta_pagar_control);
		this.actualizarPaginaCargaCombosFK(cuenta_pagar_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(cuenta_pagar_control) {
		
		this.actualizarPaginaCargaGeneral(cuenta_pagar_control);
		this.actualizarPaginaTablaDatos(cuenta_pagar_control);
		this.actualizarPaginaCargaGeneralControles(cuenta_pagar_control);
		this.actualizarPaginaFormulario(cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cuenta_pagar_control);
		this.actualizarPaginaAreaBusquedas(cuenta_pagar_control);
		this.actualizarPaginaCargaCombosFK(cuenta_pagar_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(cuenta_pagar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cuenta_pagar_control);		
		this.actualizarPaginaFormulario(cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(cuenta_pagar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cuenta_pagar_control);		
		this.actualizarPaginaFormulario(cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(cuenta_pagar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cuenta_pagar_control);		
		this.actualizarPaginaFormulario(cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_control);		
		this.actualizarPaginaFormulario(cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_control);		
		this.actualizarPaginaFormulario(cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_control);		
		this.actualizarPaginaFormulario(cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(cuenta_pagar_control) {
		this.actualizarPaginaFormulario(cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(cuenta_pagar_control) {
		this.actualizarPaginaFormulario(cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cuenta_pagar_control) {
		this.actualizarPaginaCargaGeneralControles(cuenta_pagar_control);
		this.actualizarPaginaCargaCombosFK(cuenta_pagar_control);
		this.actualizarPaginaFormulario(cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cuenta_pagar_control) {
		this.actualizarPaginaAbrirLink(cuenta_pagar_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_control);				
		this.actualizarPaginaFormulario(cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_control);
		this.actualizarPaginaFormulario(cuenta_pagar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_control);
		this.actualizarPaginaFormulario(cuenta_pagar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(cuenta_pagar_control) {
		this.actualizarPaginaFormulario(cuenta_pagar_control);
		this.onLoadCombosDefectoFK(cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_control);
		this.actualizarPaginaFormulario(cuenta_pagar_control);
		this.onLoadCombosDefectoFK(cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cuenta_pagar_control) {
		this.actualizarPaginaCargaGeneralControles(cuenta_pagar_control);
		this.actualizarPaginaCargaCombosFK(cuenta_pagar_control);
		this.actualizarPaginaFormulario(cuenta_pagar_control);
		this.onLoadCombosDefectoFK(cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cuenta_pagar_control) {
		this.actualizarPaginaAbrirLink(cuenta_pagar_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(cuenta_pagar_control) {
		this.actualizarPaginaImprimir(cuenta_pagar_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cuenta_pagar_control) {
		this.actualizarPaginaImprimir(cuenta_pagar_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(cuenta_pagar_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(cuenta_pagar_control) {
		//FORMULARIO
		if(cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cuenta_pagar_control);
			this.actualizarPaginaFormularioAdd(cuenta_pagar_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);		
		//COMBOS FK
		if(cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cuenta_pagar_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(cuenta_pagar_control) {
		//FORMULARIO
		if(cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cuenta_pagar_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);	
		//COMBOS FK
		if(cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cuenta_pagar_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_control);
		this.actualizarPaginaFormulario(cuenta_pagar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cuenta_pagar_control) {
		//FORMULARIO
		if(cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cuenta_pagar_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(cuenta_pagar_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);	
		//COMBOS FK
		if(cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cuenta_pagar_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cuenta_pagar_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(cuenta_pagar_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control) {
		if(cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cuenta_pagar_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(cuenta_pagar_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(cuenta_pagar_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(cuenta_pagar_control) {
		if(cuenta_pagar_funcion1.esPaginaForm()==true) {
			window.opener.cuenta_pagar_webcontrol1.actualizarPaginaTablaDatos(cuenta_pagar_control);
		} else {
			this.actualizarPaginaTablaDatos(cuenta_pagar_control);
		}
	}
	
	actualizarPaginaAbrirLink(cuenta_pagar_control) {
		cuenta_pagar_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(cuenta_pagar_control.strAuxiliarUrlPagina);
				
		cuenta_pagar_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(cuenta_pagar_control.strAuxiliarTipo,cuenta_pagar_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(cuenta_pagar_control) {
		cuenta_pagar_funcion1.resaltarRestaurarDivMensaje(true,cuenta_pagar_control.strAuxiliarMensajeAlert,cuenta_pagar_control.strAuxiliarCssMensaje);
			
		if(cuenta_pagar_funcion1.esPaginaForm()==true) {
			window.opener.cuenta_pagar_funcion1.resaltarRestaurarDivMensaje(true,cuenta_pagar_control.strAuxiliarMensajeAlert,cuenta_pagar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(cuenta_pagar_control) {
		eval(cuenta_pagar_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(cuenta_pagar_control, mostrar) {
		
		if(mostrar==true) {
			cuenta_pagar_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				cuenta_pagar_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			cuenta_pagar_funcion1.mostrarDivMensaje(true,cuenta_pagar_control.strAuxiliarMensaje,cuenta_pagar_control.strAuxiliarCssMensaje);
		
		} else {
			cuenta_pagar_funcion1.mostrarDivMensaje(false,cuenta_pagar_control.strAuxiliarMensaje,cuenta_pagar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(cuenta_pagar_control) {
	
		funcionGeneral.printWebPartPage("cuenta_pagar",cuenta_pagar_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarcuenta_pagarsAjaxWebPart").html(cuenta_pagar_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("cuenta_pagar",jQuery("#divTablaDatosReporteAuxiliarcuenta_pagarsAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(cuenta_pagar_control) {
		this.cuenta_pagar_controlInicial=cuenta_pagar_control;
			
		if(cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(cuenta_pagar_control.strStyleDivArbol,cuenta_pagar_control.strStyleDivContent
																,cuenta_pagar_control.strStyleDivOpcionesBanner,cuenta_pagar_control.strStyleDivExpandirColapsar
																,cuenta_pagar_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=cuenta_pagar_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",cuenta_pagar_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(cuenta_pagar_control) {
		jQuery("#divTablaDatoscuenta_pagarsAjaxWebPart").html(cuenta_pagar_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoscuenta_pagars=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoscuenta_pagars=jQuery("#tblTablaDatoscuenta_pagars").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("cuenta_pagar",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',cuenta_pagar_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			cuenta_pagar_webcontrol1.registrarControlesTableEdition(cuenta_pagar_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		cuenta_pagar_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(cuenta_pagar_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(cuenta_pagar_control.cuenta_pagarActual!=null) {//form
			
			this.actualizarCamposFilaTabla(cuenta_pagar_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(cuenta_pagar_control) {
		this.actualizarCssBotonesPagina(cuenta_pagar_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(cuenta_pagar_control.tiposReportes,cuenta_pagar_control.tiposReporte
															 	,cuenta_pagar_control.tiposPaginacion,cuenta_pagar_control.tiposAcciones
																,cuenta_pagar_control.tiposColumnasSelect,cuenta_pagar_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(cuenta_pagar_control.tiposRelaciones,cuenta_pagar_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(cuenta_pagar_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(cuenta_pagar_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(cuenta_pagar_control);			
	}
	
	actualizarPaginaAreaBusquedas(cuenta_pagar_control) {
		jQuery("#divBusquedacuenta_pagarAjaxWebPart").css("display",cuenta_pagar_control.strPermisoBusqueda);
		jQuery("#trcuenta_pagarCabeceraBusquedas").css("display",cuenta_pagar_control.strPermisoBusqueda);
		jQuery("#trBusquedacuenta_pagar").css("display",cuenta_pagar_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(cuenta_pagar_control.htmlTablaOrderBy!=null
			&& cuenta_pagar_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBycuenta_pagarAjaxWebPart").html(cuenta_pagar_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//cuenta_pagar_webcontrol1.registrarOrderByActions();
			
		}
			
		if(cuenta_pagar_control.htmlTablaOrderByRel!=null
			&& cuenta_pagar_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelcuenta_pagarAjaxWebPart").html(cuenta_pagar_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(cuenta_pagar_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedacuenta_pagarAjaxWebPart").css("display","none");
			jQuery("#trcuenta_pagarCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedacuenta_pagar").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(cuenta_pagar_control) {
		jQuery("#tdcuenta_pagarNuevo").css("display",cuenta_pagar_control.strPermisoNuevo);
		jQuery("#trcuenta_pagarElementos").css("display",cuenta_pagar_control.strVisibleTablaElementos);
		jQuery("#trcuenta_pagarAcciones").css("display",cuenta_pagar_control.strVisibleTablaAcciones);
		jQuery("#trcuenta_pagarParametrosAcciones").css("display",cuenta_pagar_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(cuenta_pagar_control) {
	
		this.actualizarCssBotonesMantenimiento(cuenta_pagar_control);
				
		if(cuenta_pagar_control.cuenta_pagarActual!=null) {//form
			
			this.actualizarCamposFormulario(cuenta_pagar_control);			
		}
						
		this.actualizarSpanMensajesCampos(cuenta_pagar_control);
	}
	
	actualizarPaginaUsuarioInvitado(cuenta_pagar_control) {
	
		var indexPosition=cuenta_pagar_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=cuenta_pagar_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(cuenta_pagar_control) {
		jQuery("#divResumencuenta_pagarActualAjaxWebPart").html(cuenta_pagar_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(cuenta_pagar_control) {
		jQuery("#divAccionesRelacionescuenta_pagarAjaxWebPart").html(cuenta_pagar_control.htmlTablaAccionesRelaciones);
			
		cuenta_pagar_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(cuenta_pagar_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(cuenta_pagar_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(cuenta_pagar_control) {
		
		if(cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",cuenta_pagar_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",cuenta_pagar_control.strVisibleFK_Idejercicio);
		}

		if(cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",cuenta_pagar_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",cuenta_pagar_control.strVisibleFK_Idempresa);
		}

		if(cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idestado_cuentas_pagar").attr("style",cuenta_pagar_control.strVisibleFK_Idestado_cuentas_pagar);
			jQuery("#tblstrVisible"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idestado_cuentas_pagar").attr("style",cuenta_pagar_control.strVisibleFK_Idestado_cuentas_pagar);
		}

		if(cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idorden_compra").attr("style",cuenta_pagar_control.strVisibleFK_Idorden_compra);
			jQuery("#tblstrVisible"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idorden_compra").attr("style",cuenta_pagar_control.strVisibleFK_Idorden_compra);
		}

		if(cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",cuenta_pagar_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",cuenta_pagar_control.strVisibleFK_Idperiodo);
		}

		if(cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",cuenta_pagar_control.strVisibleFK_Idproveedor);
			jQuery("#tblstrVisible"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",cuenta_pagar_control.strVisibleFK_Idproveedor);
		}

		if(cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",cuenta_pagar_control.strVisibleFK_Idsucursal);
			jQuery("#tblstrVisible"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",cuenta_pagar_control.strVisibleFK_Idsucursal);
		}

		if(cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",cuenta_pagar_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",cuenta_pagar_control.strVisibleFK_Idusuario);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioncuenta_pagar();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("cuenta_pagar",id,"cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_pagar","empresa","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_pagar","sucursal","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_pagar","ejercicio","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_pagar","periodo","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_pagar","usuario","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);
	}

	abrirBusquedaParaorden_compra(strNombreCampoBusqueda){//idActual
		cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_pagar","orden_compra","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);
	}

	abrirBusquedaParaproveedor(strNombreCampoBusqueda){//idActual
		cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_pagar","proveedor","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);
	}

	abrirBusquedaParaestado_cuentas_pagar(strNombreCampoBusqueda){//idActual
		cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_pagar","estado_cuentas_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(cuenta_pagar_control) {
	
		jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id").val(cuenta_pagar_control.cuenta_pagarActual.id);
		jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-version_row").val(cuenta_pagar_control.cuenta_pagarActual.versionRow);
		
		if(cuenta_pagar_control.cuenta_pagarActual.id_empresa!=null && cuenta_pagar_control.cuenta_pagarActual.id_empresa>-1){
			if(jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val() != cuenta_pagar_control.cuenta_pagarActual.id_empresa) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val(cuenta_pagar_control.cuenta_pagarActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_pagar_control.cuenta_pagarActual.id_sucursal!=null && cuenta_pagar_control.cuenta_pagarActual.id_sucursal>-1){
			if(jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val() != cuenta_pagar_control.cuenta_pagarActual.id_sucursal) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val(cuenta_pagar_control.cuenta_pagarActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").select2("val", null);
			if(jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_pagar_control.cuenta_pagarActual.id_ejercicio!=null && cuenta_pagar_control.cuenta_pagarActual.id_ejercicio>-1){
			if(jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val() != cuenta_pagar_control.cuenta_pagarActual.id_ejercicio) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val(cuenta_pagar_control.cuenta_pagarActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_pagar_control.cuenta_pagarActual.id_periodo!=null && cuenta_pagar_control.cuenta_pagarActual.id_periodo>-1){
			if(jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val() != cuenta_pagar_control.cuenta_pagarActual.id_periodo) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val(cuenta_pagar_control.cuenta_pagarActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_pagar_control.cuenta_pagarActual.id_usuario!=null && cuenta_pagar_control.cuenta_pagarActual.id_usuario>-1){
			if(jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val() != cuenta_pagar_control.cuenta_pagarActual.id_usuario) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val(cuenta_pagar_control.cuenta_pagarActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_pagar_control.cuenta_pagarActual.id_orden_compra!=null && cuenta_pagar_control.cuenta_pagarActual.id_orden_compra>-1){
			if(jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_orden_compra").val() != cuenta_pagar_control.cuenta_pagarActual.id_orden_compra) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_orden_compra").val(cuenta_pagar_control.cuenta_pagarActual.id_orden_compra).trigger("change");
			}
		} else { 
			if(jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_orden_compra").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_orden_compra").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_pagar_control.cuenta_pagarActual.id_proveedor!=null && cuenta_pagar_control.cuenta_pagarActual.id_proveedor>-1){
			if(jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_proveedor").val() != cuenta_pagar_control.cuenta_pagarActual.id_proveedor) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_proveedor").val(cuenta_pagar_control.cuenta_pagarActual.id_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_proveedor").select2("val", null);
			if(jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-numero").val(cuenta_pagar_control.cuenta_pagarActual.numero);
		jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-referencia").val(cuenta_pagar_control.cuenta_pagarActual.referencia);
		jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-fecha_emision").val(cuenta_pagar_control.cuenta_pagarActual.fecha_emision);
		jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-fecha_vence").val(cuenta_pagar_control.cuenta_pagarActual.fecha_vence);
		jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-ultimo_movi").val(cuenta_pagar_control.cuenta_pagarActual.ultimo_movi);
		jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-monto").val(cuenta_pagar_control.cuenta_pagarActual.monto);
		jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-saldo").val(cuenta_pagar_control.cuenta_pagarActual.saldo);
		jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-porcentaje").val(cuenta_pagar_control.cuenta_pagarActual.porcentaje);
		jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-descripcion").val(cuenta_pagar_control.cuenta_pagarActual.descripcion);
		
		if(cuenta_pagar_control.cuenta_pagarActual.id_estado_cuentas_pagar!=null && cuenta_pagar_control.cuenta_pagarActual.id_estado_cuentas_pagar>-1){
			if(jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_estado_cuentas_pagar").val() != cuenta_pagar_control.cuenta_pagarActual.id_estado_cuentas_pagar) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_estado_cuentas_pagar").val(cuenta_pagar_control.cuenta_pagarActual.id_estado_cuentas_pagar).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_estado_cuentas_pagar").select2("val", null);
			if(jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_estado_cuentas_pagar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_estado_cuentas_pagar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+cuenta_pagar_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("cuenta_pagar","cuentaspagar","","form_cuenta_pagar",formulario,"","",paraEventoTabla,idFilaTabla,cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);
	}
	
	cargarCombosFK(cuenta_pagar_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_pagar_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_webcontrol1.cargarCombosempresasFK(cuenta_pagar_control);
			}

			if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",cuenta_pagar_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_webcontrol1.cargarCombossucursalsFK(cuenta_pagar_control);
			}

			if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_pagar_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_webcontrol1.cargarCombosejerciciosFK(cuenta_pagar_control);
			}

			if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cuenta_pagar_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_webcontrol1.cargarCombosperiodosFK(cuenta_pagar_control);
			}

			if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cuenta_pagar_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_webcontrol1.cargarCombosusuariosFK(cuenta_pagar_control);
			}

			if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_orden_compra",cuenta_pagar_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_webcontrol1.cargarCombosorden_comprasFK(cuenta_pagar_control);
			}

			if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",cuenta_pagar_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_webcontrol1.cargarCombosproveedorsFK(cuenta_pagar_control);
			}

			if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_cuentas_pagar",cuenta_pagar_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_webcontrol1.cargarCombosestado_cuentas_pagarsFK(cuenta_pagar_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(cuenta_pagar_control.strRecargarFkTiposNinguno!=null && cuenta_pagar_control.strRecargarFkTiposNinguno!='NINGUNO' && cuenta_pagar_control.strRecargarFkTiposNinguno!='') {
			
				if(cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_pagar_webcontrol1.cargarCombosempresasFK(cuenta_pagar_control);
				}

				if(cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_pagar_webcontrol1.cargarCombossucursalsFK(cuenta_pagar_control);
				}

				if(cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_pagar_webcontrol1.cargarCombosejerciciosFK(cuenta_pagar_control);
				}

				if(cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_pagar_webcontrol1.cargarCombosperiodosFK(cuenta_pagar_control);
				}

				if(cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_pagar_webcontrol1.cargarCombosusuariosFK(cuenta_pagar_control);
				}

				if(cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_orden_compra",cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_pagar_webcontrol1.cargarCombosorden_comprasFK(cuenta_pagar_control);
				}

				if(cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_proveedor",cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_pagar_webcontrol1.cargarCombosproveedorsFK(cuenta_pagar_control);
				}

				if(cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado_cuentas_pagar",cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_pagar_webcontrol1.cargarCombosestado_cuentas_pagarsFK(cuenta_pagar_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(cuenta_pagar_control) {
		jQuery("#spanstrMensajeid").text(cuenta_pagar_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(cuenta_pagar_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(cuenta_pagar_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_sucursal").text(cuenta_pagar_control.strMensajeid_sucursal);		
		jQuery("#spanstrMensajeid_ejercicio").text(cuenta_pagar_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(cuenta_pagar_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajeid_usuario").text(cuenta_pagar_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajeid_orden_compra").text(cuenta_pagar_control.strMensajeid_orden_compra);		
		jQuery("#spanstrMensajeid_proveedor").text(cuenta_pagar_control.strMensajeid_proveedor);		
		jQuery("#spanstrMensajenumero").text(cuenta_pagar_control.strMensajenumero);		
		jQuery("#spanstrMensajereferencia").text(cuenta_pagar_control.strMensajereferencia);		
		jQuery("#spanstrMensajefecha_emision").text(cuenta_pagar_control.strMensajefecha_emision);		
		jQuery("#spanstrMensajefecha_vence").text(cuenta_pagar_control.strMensajefecha_vence);		
		jQuery("#spanstrMensajeultimo_movi").text(cuenta_pagar_control.strMensajeultimo_movi);		
		jQuery("#spanstrMensajemonto").text(cuenta_pagar_control.strMensajemonto);		
		jQuery("#spanstrMensajesaldo").text(cuenta_pagar_control.strMensajesaldo);		
		jQuery("#spanstrMensajeporcentaje").text(cuenta_pagar_control.strMensajeporcentaje);		
		jQuery("#spanstrMensajedescripcion").text(cuenta_pagar_control.strMensajedescripcion);		
		jQuery("#spanstrMensajeid_estado_cuentas_pagar").text(cuenta_pagar_control.strMensajeid_estado_cuentas_pagar);		
	}
	
	actualizarCssBotonesMantenimiento(cuenta_pagar_control) {
		jQuery("#tdbtnNuevocuenta_pagar").css("visibility",cuenta_pagar_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocuenta_pagar").css("display",cuenta_pagar_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcuenta_pagar").css("visibility",cuenta_pagar_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcuenta_pagar").css("display",cuenta_pagar_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcuenta_pagar").css("visibility",cuenta_pagar_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcuenta_pagar").css("display",cuenta_pagar_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcuenta_pagar").css("visibility",cuenta_pagar_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscuenta_pagar").css("visibility",cuenta_pagar_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscuenta_pagar").css("display",cuenta_pagar_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcuenta_pagar").css("visibility",cuenta_pagar_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcuenta_pagar").css("visibility",cuenta_pagar_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcuenta_pagar").css("visibility",cuenta_pagar_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacioncuenta_pagar_detalle").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta_pagar");

			cuenta_pagar_webcontrol1.registrarSesionParacuenta_pagar_detalles(idActual);
		});
		jQuery("#imgdivrelaciondebito_cuenta_pagar").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta_pagar");

			cuenta_pagar_webcontrol1.registrarSesionParadebito_cuenta_pagars(idActual);
		});
		jQuery("#imgdivrelacioncredito_cuenta_pagar").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta_pagar");

			cuenta_pagar_webcontrol1.registrarSesionParacredito_cuenta_pagars(idActual);
		});
		jQuery("#imgdivrelacionpago_cuenta_pagar").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta_pagar");

			cuenta_pagar_webcontrol1.registrarSesionParapago_cuenta_pagars(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_orden_compra") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_orden_compra" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.cuenta_pagarActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.cuenta_pagarActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.cuenta_pagarActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_pagar_funcion1,cuenta_pagar_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_pagar_funcion1,cuenta_pagar_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_pagar_funcion1,cuenta_pagar_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_pagar_funcion1,cuenta_pagar_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_pagar_funcion1,cuenta_pagar_control.usuariosFK);
	}

	cargarComboEditarTablaorden_compraFK(cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_pagar_funcion1,cuenta_pagar_control.orden_comprasFK);
	}

	cargarComboEditarTablaproveedorFK(cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_pagar_funcion1,cuenta_pagar_control.proveedorsFK);
	}

	cargarComboEditarTablaestado_cuentas_pagarFK(cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_pagar_funcion1,cuenta_pagar_control.estado_cuentas_pagarsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(cuenta_pagar_control) {
		var i=0;
		
		i=cuenta_pagar_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(cuenta_pagar_control.cuenta_pagarActual.id);
		jQuery("#t-version_row_"+i+"").val(cuenta_pagar_control.cuenta_pagarActual.versionRow);
		
		if(cuenta_pagar_control.cuenta_pagarActual.id_empresa!=null && cuenta_pagar_control.cuenta_pagarActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != cuenta_pagar_control.cuenta_pagarActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(cuenta_pagar_control.cuenta_pagarActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_pagar_control.cuenta_pagarActual.id_sucursal!=null && cuenta_pagar_control.cuenta_pagarActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != cuenta_pagar_control.cuenta_pagarActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_3").val(cuenta_pagar_control.cuenta_pagarActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_pagar_control.cuenta_pagarActual.id_ejercicio!=null && cuenta_pagar_control.cuenta_pagarActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != cuenta_pagar_control.cuenta_pagarActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_4").val(cuenta_pagar_control.cuenta_pagarActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_pagar_control.cuenta_pagarActual.id_periodo!=null && cuenta_pagar_control.cuenta_pagarActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != cuenta_pagar_control.cuenta_pagarActual.id_periodo) {
				jQuery("#t-cel_"+i+"_5").val(cuenta_pagar_control.cuenta_pagarActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_pagar_control.cuenta_pagarActual.id_usuario!=null && cuenta_pagar_control.cuenta_pagarActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != cuenta_pagar_control.cuenta_pagarActual.id_usuario) {
				jQuery("#t-cel_"+i+"_6").val(cuenta_pagar_control.cuenta_pagarActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_pagar_control.cuenta_pagarActual.id_orden_compra!=null && cuenta_pagar_control.cuenta_pagarActual.id_orden_compra>-1){
			if(jQuery("#t-cel_"+i+"_7").val() != cuenta_pagar_control.cuenta_pagarActual.id_orden_compra) {
				jQuery("#t-cel_"+i+"_7").val(cuenta_pagar_control.cuenta_pagarActual.id_orden_compra).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_7").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_7").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_pagar_control.cuenta_pagarActual.id_proveedor!=null && cuenta_pagar_control.cuenta_pagarActual.id_proveedor>-1){
			if(jQuery("#t-cel_"+i+"_8").val() != cuenta_pagar_control.cuenta_pagarActual.id_proveedor) {
				jQuery("#t-cel_"+i+"_8").val(cuenta_pagar_control.cuenta_pagarActual.id_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_8").select2("val", null);
			if(jQuery("#t-cel_"+i+"_8").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_8").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_9").val(cuenta_pagar_control.cuenta_pagarActual.numero);
		jQuery("#t-cel_"+i+"_10").val(cuenta_pagar_control.cuenta_pagarActual.referencia);
		jQuery("#t-cel_"+i+"_11").val(cuenta_pagar_control.cuenta_pagarActual.fecha_emision);
		jQuery("#t-cel_"+i+"_12").val(cuenta_pagar_control.cuenta_pagarActual.fecha_vence);
		jQuery("#t-cel_"+i+"_13").val(cuenta_pagar_control.cuenta_pagarActual.ultimo_movi);
		jQuery("#t-cel_"+i+"_14").val(cuenta_pagar_control.cuenta_pagarActual.monto);
		jQuery("#t-cel_"+i+"_15").val(cuenta_pagar_control.cuenta_pagarActual.saldo);
		jQuery("#t-cel_"+i+"_16").val(cuenta_pagar_control.cuenta_pagarActual.porcentaje);
		jQuery("#t-cel_"+i+"_17").val(cuenta_pagar_control.cuenta_pagarActual.descripcion);
		
		if(cuenta_pagar_control.cuenta_pagarActual.id_estado_cuentas_pagar!=null && cuenta_pagar_control.cuenta_pagarActual.id_estado_cuentas_pagar>-1){
			if(jQuery("#t-cel_"+i+"_18").val() != cuenta_pagar_control.cuenta_pagarActual.id_estado_cuentas_pagar) {
				jQuery("#t-cel_"+i+"_18").val(cuenta_pagar_control.cuenta_pagarActual.id_estado_cuentas_pagar).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_18").select2("val", null);
			if(jQuery("#t-cel_"+i+"_18").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_18").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(cuenta_pagar_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncuenta_pagar_detalle").click(function(){
		jQuery("#tblTablaDatoscuenta_pagars").on("click",".imgrelacioncuenta_pagar_detalle", function () {

			var idActual=jQuery(this).attr("idactualcuenta_pagar");

			cuenta_pagar_webcontrol1.registrarSesionParacuenta_pagar_detalles(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciondebito_cuenta_pagar").click(function(){
		jQuery("#tblTablaDatoscuenta_pagars").on("click",".imgrelaciondebito_cuenta_pagar", function () {

			var idActual=jQuery(this).attr("idactualcuenta_pagar");

			cuenta_pagar_webcontrol1.registrarSesionParadebito_cuenta_pagars(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncredito_cuenta_pagar").click(function(){
		jQuery("#tblTablaDatoscuenta_pagars").on("click",".imgrelacioncredito_cuenta_pagar", function () {

			var idActual=jQuery(this).attr("idactualcuenta_pagar");

			cuenta_pagar_webcontrol1.registrarSesionParacredito_cuenta_pagars(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionpago_cuenta_pagar").click(function(){
		jQuery("#tblTablaDatoscuenta_pagars").on("click",".imgrelacionpago_cuenta_pagar", function () {

			var idActual=jQuery(this).attr("idactualcuenta_pagar");

			cuenta_pagar_webcontrol1.registrarSesionParapago_cuenta_pagars(idActual);
		});				
	}
		
	

	registrarSesionParacuenta_pagar_detalles(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta_pagar","cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,"s","");
	}

	registrarSesionParadebito_cuenta_pagars(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta_pagar","debito_cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,"s","");
	}

	registrarSesionParacredito_cuenta_pagars(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta_pagar","credito_cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,"s","");
	}

	registrarSesionParapago_cuenta_pagars(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta_pagar","pago_cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,"s","");
	}
	
	registrarControlesTableEdition(cuenta_pagar_control) {
		cuenta_pagar_funcion1.registrarControlesTableValidacionEdition(cuenta_pagar_control,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagarConstante,strParametros);
		
		//cuenta_pagar_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa",cuenta_pagar_control.empresasFK);

		if(cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_pagar_control.idFilaTablaActual+"_2",cuenta_pagar_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal",cuenta_pagar_control.sucursalsFK);

		if(cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_pagar_control.idFilaTablaActual+"_3",cuenta_pagar_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio",cuenta_pagar_control.ejerciciosFK);

		if(cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_pagar_control.idFilaTablaActual+"_4",cuenta_pagar_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo",cuenta_pagar_control.periodosFK);

		if(cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_pagar_control.idFilaTablaActual+"_5",cuenta_pagar_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario",cuenta_pagar_control.usuariosFK);

		if(cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_pagar_control.idFilaTablaActual+"_6",cuenta_pagar_control.usuariosFK);
		}
	};

	cargarCombosorden_comprasFK(cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_orden_compra",cuenta_pagar_control.orden_comprasFK);

		if(cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_pagar_control.idFilaTablaActual+"_7",cuenta_pagar_control.orden_comprasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idorden_compra-cmbid_orden_compra",cuenta_pagar_control.orden_comprasFK);

	};

	cargarCombosproveedorsFK(cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_proveedor",cuenta_pagar_control.proveedorsFK);

		if(cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_pagar_control.idFilaTablaActual+"_8",cuenta_pagar_control.proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",cuenta_pagar_control.proveedorsFK);

	};

	cargarCombosestado_cuentas_pagarsFK(cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_estado_cuentas_pagar",cuenta_pagar_control.estado_cuentas_pagarsFK);

		if(cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_pagar_control.idFilaTablaActual+"_18",cuenta_pagar_control.estado_cuentas_pagarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idestado_cuentas_pagar-cmbid_estado_cuentas_pagar",cuenta_pagar_control.estado_cuentas_pagarsFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(cuenta_pagar_control) {

	};

	registrarComboActionChangeCombossucursalsFK(cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosperiodosFK(cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosusuariosFK(cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosorden_comprasFK(cuenta_pagar_control) {
		this.registrarComboActionChangeid_orden_compra("form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_orden_compra",false,0);


		this.registrarComboActionChangeid_orden_compra(""+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idorden_compra-cmbid_orden_compra",false,0);


	};

	registrarComboActionChangeCombosproveedorsFK(cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosestado_cuentas_pagarsFK(cuenta_pagar_control) {

	};

	
	
	setDefectoValorCombosempresasFK(cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_pagar_control.idempresaDefaultFK>-1 && jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val() != cuenta_pagar_control.idempresaDefaultFK) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val(cuenta_pagar_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_pagar_control.idsucursalDefaultFK>-1 && jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val() != cuenta_pagar_control.idsucursalDefaultFK) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val(cuenta_pagar_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_pagar_control.idejercicioDefaultFK>-1 && jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val() != cuenta_pagar_control.idejercicioDefaultFK) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val(cuenta_pagar_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_pagar_control.idperiodoDefaultFK>-1 && jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val() != cuenta_pagar_control.idperiodoDefaultFK) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val(cuenta_pagar_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_pagar_control.idusuarioDefaultFK>-1 && jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val() != cuenta_pagar_control.idusuarioDefaultFK) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val(cuenta_pagar_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosorden_comprasFK(cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_pagar_control.idorden_compraDefaultFK>-1 && jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_orden_compra").val() != cuenta_pagar_control.idorden_compraDefaultFK) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_orden_compra").val(cuenta_pagar_control.idorden_compraDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idorden_compra-cmbid_orden_compra").val(cuenta_pagar_control.idorden_compraDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idorden_compra-cmbid_orden_compra").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idorden_compra-cmbid_orden_compra").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproveedorsFK(cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_pagar_control.idproveedorDefaultFK>-1 && jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_proveedor").val() != cuenta_pagar_control.idproveedorDefaultFK) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_proveedor").val(cuenta_pagar_control.idproveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(cuenta_pagar_control.idproveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestado_cuentas_pagarsFK(cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_pagar_control.idestado_cuentas_pagarDefaultFK>-1 && jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_estado_cuentas_pagar").val() != cuenta_pagar_control.idestado_cuentas_pagarDefaultFK) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_estado_cuentas_pagar").val(cuenta_pagar_control.idestado_cuentas_pagarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idestado_cuentas_pagar-cmbid_estado_cuentas_pagar").val(cuenta_pagar_control.idestado_cuentas_pagarDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idestado_cuentas_pagar-cmbid_estado_cuentas_pagar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idestado_cuentas_pagar-cmbid_estado_cuentas_pagar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_orden_compra(id_orden_compra,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("cuenta_pagar","cuentaspagar","","id_orden_compra",id_orden_compra,"NINGUNO","",paraEventoTabla,idFilaTabla,cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	








	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//cuenta_pagar_control
		
	
	}
	
	onLoadCombosDefectoFK(cuenta_pagar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_pagar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_pagar_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_webcontrol1.setDefectoValorCombosempresasFK(cuenta_pagar_control);
			}

			if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",cuenta_pagar_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_webcontrol1.setDefectoValorCombossucursalsFK(cuenta_pagar_control);
			}

			if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_pagar_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_webcontrol1.setDefectoValorCombosejerciciosFK(cuenta_pagar_control);
			}

			if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cuenta_pagar_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_webcontrol1.setDefectoValorCombosperiodosFK(cuenta_pagar_control);
			}

			if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cuenta_pagar_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_webcontrol1.setDefectoValorCombosusuariosFK(cuenta_pagar_control);
			}

			if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_orden_compra",cuenta_pagar_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_webcontrol1.setDefectoValorCombosorden_comprasFK(cuenta_pagar_control);
			}

			if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",cuenta_pagar_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_webcontrol1.setDefectoValorCombosproveedorsFK(cuenta_pagar_control);
			}

			if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_cuentas_pagar",cuenta_pagar_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_webcontrol1.setDefectoValorCombosestado_cuentas_pagarsFK(cuenta_pagar_control);
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
	onLoadCombosEventosFK(cuenta_pagar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_pagar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_pagar_webcontrol1.registrarComboActionChangeCombosempresasFK(cuenta_pagar_control);
			//}

			//if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_pagar_webcontrol1.registrarComboActionChangeCombossucursalsFK(cuenta_pagar_control);
			//}

			//if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_pagar_webcontrol1.registrarComboActionChangeCombosejerciciosFK(cuenta_pagar_control);
			//}

			//if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_pagar_webcontrol1.registrarComboActionChangeCombosperiodosFK(cuenta_pagar_control);
			//}

			//if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_pagar_webcontrol1.registrarComboActionChangeCombosusuariosFK(cuenta_pagar_control);
			//}

			//if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_orden_compra",cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_pagar_webcontrol1.registrarComboActionChangeCombosorden_comprasFK(cuenta_pagar_control);
			//}

			//if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_pagar_webcontrol1.registrarComboActionChangeCombosproveedorsFK(cuenta_pagar_control);
			//}

			//if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_cuentas_pagar",cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_pagar_webcontrol1.registrarComboActionChangeCombosestado_cuentas_pagarsFK(cuenta_pagar_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(cuenta_pagar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_pagar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("cuenta_pagar");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("cuenta_pagar");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(cuenta_pagar_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);			
			
			if(cuenta_pagar_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,"cuenta_pagar");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				cuenta_pagar_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				cuenta_pagar_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				cuenta_pagar_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				cuenta_pagar_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				cuenta_pagar_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("orden_compra","id_orden_compra","inventario","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_orden_compra_img_busqueda").click(function(){
				cuenta_pagar_webcontrol1.abrirBusquedaParaorden_compra("id_orden_compra");
				//alert(jQuery('#form-id_orden_compra_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("proveedor","id_proveedor","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_proveedor_img_busqueda").click(function(){
				cuenta_pagar_webcontrol1.abrirBusquedaParaproveedor("id_proveedor");
				//alert(jQuery('#form-id_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado_cuentas_pagar","id_estado_cuentas_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_estado_cuentas_pagar_img_busqueda").click(function(){
				cuenta_pagar_webcontrol1.abrirBusquedaParaestado_cuentas_pagar("id_estado_cuentas_pagar");
				//alert(jQuery('#form-id_estado_cuentas_pagar_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_pagar","FK_Idejercicio","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_pagar","FK_Idempresa","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_pagar","FK_Idestado_cuentas_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_pagar","FK_Idorden_compra","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_pagar","FK_Idperiodo","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_pagar","FK_Idproveedor","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_pagar","FK_Idsucursal","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_pagar","FK_Idusuario","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("cuenta_pagar");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			cuenta_pagar_funcion1.validarFormularioJQuery(cuenta_pagar_constante1);
			
			if(cuenta_pagar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(cuenta_pagar_control) {
		
		jQuery("#divBusquedacuenta_pagarAjaxWebPart").css("display",cuenta_pagar_control.strPermisoBusqueda);
		jQuery("#trcuenta_pagarCabeceraBusquedas").css("display",cuenta_pagar_control.strPermisoBusqueda);
		jQuery("#trBusquedacuenta_pagar").css("display",cuenta_pagar_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportecuenta_pagar").css("display",cuenta_pagar_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoscuenta_pagar").attr("style",cuenta_pagar_control.strPermisoMostrarTodos);
		
		if(cuenta_pagar_control.strPermisoNuevo!=null) {
			jQuery("#tdcuenta_pagarNuevo").css("display",cuenta_pagar_control.strPermisoNuevo);
			jQuery("#tdcuenta_pagarNuevoToolBar").css("display",cuenta_pagar_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdcuenta_pagarDuplicar").css("display",cuenta_pagar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcuenta_pagarDuplicarToolBar").css("display",cuenta_pagar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcuenta_pagarNuevoGuardarCambios").css("display",cuenta_pagar_control.strPermisoNuevo);
			jQuery("#tdcuenta_pagarNuevoGuardarCambiosToolBar").css("display",cuenta_pagar_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(cuenta_pagar_control.strPermisoActualizar!=null) {
			jQuery("#tdcuenta_pagarActualizarToolBar").css("display",cuenta_pagar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcuenta_pagarCopiar").css("display",cuenta_pagar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcuenta_pagarCopiarToolBar").css("display",cuenta_pagar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcuenta_pagarConEditar").css("display",cuenta_pagar_control.strPermisoActualizar);
		}
		
		jQuery("#tdcuenta_pagarEliminarToolBar").css("display",cuenta_pagar_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdcuenta_pagarGuardarCambios").css("display",cuenta_pagar_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdcuenta_pagarGuardarCambiosToolBar").css("display",cuenta_pagar_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trcuenta_pagarElementos").css("display",cuenta_pagar_control.strVisibleTablaElementos);
		
		jQuery("#trcuenta_pagarAcciones").css("display",cuenta_pagar_control.strVisibleTablaAcciones);
		jQuery("#trcuenta_pagarParametrosAcciones").css("display",cuenta_pagar_control.strVisibleTablaAcciones);
			
		jQuery("#tdcuenta_pagarCerrarPagina").css("display",cuenta_pagar_control.strPermisoPopup);		
		jQuery("#tdcuenta_pagarCerrarPaginaToolBar").css("display",cuenta_pagar_control.strPermisoPopup);
		//jQuery("#trcuenta_pagarAccionesRelaciones").css("display",cuenta_pagar_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		cuenta_pagar_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		cuenta_pagar_webcontrol1.registrarEventosControles();
		
		if(cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
			cuenta_pagar_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(cuenta_pagar_constante1.STR_ES_RELACIONES=="true") {
			if(cuenta_pagar_constante1.BIT_ES_PAGINA_FORM==true) {
				cuenta_pagar_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(cuenta_pagar_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(cuenta_pagar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				cuenta_pagar_webcontrol1.onLoad();
				
			} else {
				if(cuenta_pagar_constante1.BIT_ES_PAGINA_FORM==true) {
					if(cuenta_pagar_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);
						//cuenta_pagar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(cuenta_pagar_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(cuenta_pagar_constante1.BIG_ID_ACTUAL,"cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);
						//cuenta_pagar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			cuenta_pagar_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var cuenta_pagar_webcontrol1=new cuenta_pagar_webcontrol();

if(cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = cuenta_pagar_webcontrol1.onLoadWindow; 
}

//</script>