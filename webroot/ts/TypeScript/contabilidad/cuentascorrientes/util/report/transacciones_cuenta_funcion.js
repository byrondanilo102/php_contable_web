<script type="text/javascript" language="javascript">


class transacciones_cuenta_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/


//---------- Clic-Buscar ----------

	buscarOnClick() {
		this.procesarInicioBusqueda();
	}
	
	buscarOnComplete() {
		this.procesarFinalizacionBusqueda();
	}
	
	buscarFksOnClick() {
		super.procesarInicioProceso(transacciones_cuenta_constante1);
	}
	
	

//---------- Clic-Buscar-Auxiliar ----------
	
	procesarInicioBusqueda() {
		funcionGeneral.procesarInicioBusquedaPrincipal(transacciones_cuenta_constante1.STR_RELATIVE_PATH,"transacciones_cuenta");		
	}
	
	procesarFinalizacionBusqueda() {
		funcionGeneral.procesarFinalizacionBusquedaPrincipal(transacciones_cuenta_constante1.STR_RELATIVE_PATH,transacciones_cuenta_constante1.STR_NOMBRE_OPCION,"transacciones_cuenta");		
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
		super.resaltarRestaurarDivMantenimiento(true,"transacciones_cuenta");
		
		super.procesarInicioProceso(transacciones_cuenta_constante1);
	}
	
	seleccionarOnComplete() {
		super.procesarFinalizacionProceso(transacciones_cuenta_constante1,"transacciones_cuenta");
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
		funcionGeneral.generarReporteFinalizacion(transacciones_cuenta_constante1.STR_RELATIVE_PATH,transacciones_cuenta_constante1.STR_NOMBRE_OPCION);
	}
	
//---------- Clic-Generar-Html -----------

	generarHtmlReporteOnClick() {
		super.procesarInicioProceso(transacciones_cuenta_constante1);
	}		
	
	generarHtmlReporteOnComplete() {
		super.procesarFinalizacionProceso(transacciones_cuenta_constante1,"transacciones_cuenta");
	}

//------------- Clic-Actualizar -------------
	
	editarTablaDatosOnClick() {
		super.procesarInicioProceso(transacciones_cuenta_constante1);
	}		
	
	editarTablaDatosOnComplete() {
		super.procesarFinalizacionProceso(transacciones_cuenta_constante1,"transacciones_cuenta");
	}

//------------- Clic-Eliminar --------------

	eliminarTablaOnClick() {
		//super.resaltarRestaurarDivMantenimiento(true,"transacciones_cuenta");		
		super.procesarInicioProceso(transacciones_cuenta_constante1);
	}
		
	eliminarTablaOnComplete() {
		super.procesarFinalizacionProceso(transacciones_cuenta_constante1,"transacciones_cuenta");
	}
	
//------------ Clic-Guardar-Cambios --------------

	guardarCambiosOnClick() {
		super.procesarInicioProceso(transacciones_cuenta_constante1);
	}		
	
	guardarCambiosOnComplete() {
		super.procesarFinalizacionProceso(transacciones_cuenta_constante1,"transacciones_cuenta");
	}
	
//------------ Clic-Duplicar --------------------

	duplicarOnClick() {
		super.procesarInicioProceso(transacciones_cuenta_constante1);
	}
	
	duplicarOnComplete() {
		super.procesarFinalizacionProceso(transacciones_cuenta_constante1,"transacciones_cuenta");
	}
	
//-------------- Clic-Copiar -------------------

	copiarOnClick() {
		super.procesarInicioProceso(transacciones_cuenta_constante1);
	}
	
	copiarOnComplete() {
		super.procesarFinalizacionProceso(transacciones_cuenta_constante1,"transacciones_cuenta");
	}

	/*---------------------------------- AREA:TABLA ---------------------------*/

//------------- Tabla-Validacion -------------------

	registrarControlesTableValidacionEdition(transacciones_cuenta_control,transacciones_cuenta_webcontrol1,transacciones_cuenta_constante1) {
		
		var strSuf=transacciones_cuenta_constante1.STR_SUFIJO;
		
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
				

				control_name="t"+strSuf+"-cel_"+i+"_7";
				jQuery("#"+control_name).datepicker({ dateFormat: 'yy-mm-dd' });
				//ADD CONTROLES FECHA-HORA FIN
				
				//FK
				
				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_2";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_3";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_4";
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
					strRules=strRules+'\r\nmaxlength:40';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_6";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:25';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_7";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndate:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_9";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:250';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

			
				
				
				control_name="t"+strSuf+"-cel_"+i+"_2";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_3";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_4";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_5";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_6";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_7";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_FECHA_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_9";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
			
				if(esPrimerRule==true) {
					esPrimerRule=false;
				}
				//VALIDACION	
				
				
				//SI SE SUBE ARRIBA CON FK, NO FUNCIONA, ES EXTRA?O
				//FK CHECKBOX EVENTOS
				control_name_id="t"+strSuf+"-cel_"+i+"_0";
				
				


				control_name="t"+strSuf+"-cel_"+i+"_2";
				idActual=jQuery("#"+control_name).val();

				if(transacciones_cuenta_control.idempresaDefaultForeignKey!=null && transacciones_cuenta_control.idempresaDefaultForeignKey>-1) {
					idActual=transacciones_cuenta_control.idempresaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					transacciones_cuenta_webcontrol1.cargarComboEditarTablaempresaFK(transacciones_cuenta_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						transacciones_cuenta_webcontrol1.cargarComboEditarTablaempresaFK(transacciones_cuenta_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_3";
				idActual=jQuery("#"+control_name).val();

				if(transacciones_cuenta_control.idusuarioDefaultForeignKey!=null && transacciones_cuenta_control.idusuarioDefaultForeignKey>-1) {
					idActual=transacciones_cuenta_control.idusuarioDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					transacciones_cuenta_webcontrol1.cargarComboEditarTablausuarioFK(transacciones_cuenta_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						transacciones_cuenta_webcontrol1.cargarComboEditarTablausuarioFK(transacciones_cuenta_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_4";
				idActual=jQuery("#"+control_name).val();

				if(transacciones_cuenta_control.idbancoDefaultForeignKey!=null && transacciones_cuenta_control.idbancoDefaultForeignKey>-1) {
					idActual=transacciones_cuenta_control.idbancoDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					transacciones_cuenta_webcontrol1.cargarComboEditarTablabancoFK(transacciones_cuenta_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						transacciones_cuenta_webcontrol1.cargarComboEditarTablabancoFK(transacciones_cuenta_control,control_name,idActual,true);
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
		
		jQuery("#frmTablaDatostransacciones_cuenta").validate(json_rules);
		
		//VALIDACION	
	}
	
	//---------- Clic-Nuevo --------------

	nuevoPrepararOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"transacciones_cuenta");
		
		super.procesarInicioProceso(transacciones_cuenta_constante1);
	}		
		
	nuevoPrepararOnComplete() {		
		super.procesarFinalizacionProceso(transacciones_cuenta_constante1,"transacciones_cuenta");
	}
	
	nuevoTablaPrepararOnClick() {
		super.procesarInicioProceso(transacciones_cuenta_constante1);
	}
	
	nuevoTablaPrepararOnComplete() {		
		super.procesarFinalizacionProceso(transacciones_cuenta_constante1,"transacciones_cuenta");
	}
	






	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(transacciones_cuenta_constante1.STR_RELATIVE_PATH,"transacciones_cuenta");		
	}
	
	eliminarOnComplete() {
		
		super.procesarFinalizacionProceso(transacciones_cuenta_constante1,"transacciones_cuenta");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(transacciones_cuenta_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(transacciones_cuenta_constante1,"transacciones_cuenta");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(transacciones_cuenta_constante1,"transacciones_cuenta");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"transacciones_cuenta");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(transacciones_cuenta_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(transacciones_cuenta_constante1,"transacciones_cuenta");
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,transacciones_cuenta_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var transacciones_cuenta_funcion1=new transacciones_cuenta_funcion(); //var


</script>
