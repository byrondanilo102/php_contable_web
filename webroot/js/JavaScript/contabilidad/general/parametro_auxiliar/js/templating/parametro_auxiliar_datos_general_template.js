
<script id="parametro_auxiliar_datos_general_template" type="text/x-handlebars-template">



		<form id="frmTablaDatosparametro_auxiliar" name="frmTablaDatosparametro_auxiliar">
			<div id="divTablaDatosAuxiliarparametro_auxiliarsAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count parametro_auxiliars}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTituloparametro_auxiliar" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Parametro Auxiliares</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatosparametro_auxiliars" name="tblTablaDatosparametro_auxiliars" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

		{{#if (If_Yes_AND_Not IS_DEVELOPING  bitEsRelacionado)}}
			<caption>({{STR_PREFIJO_TABLE}} {{STR_TABLE_NAME}})</caption>
		{{/if}}

		
			<thead>
				<tr class="{{class_cabecera}}">
		
				
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">ID__</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_eli"  style="display:{{strPermisoEliminar}}">
				<pre class="cabecera_texto_titulo_tabla">Eli</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_sel" >
				<pre class="cabecera_texto_titulo_tabla">Sel</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="parametro_auxiliar_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Asignado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Siguiente Numero Correlativo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mostrar Solo Costo Producto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Codigo Secuencial Producto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Contador Producto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Costeo Kardex</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Producto Inactivo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Busqueda Incremental</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Permitir Revisar Asiento</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Decimales Unidades</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mostrar Documento Anulado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Siguiente Numero Correlativo Cc</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Eliminacion Fisica Asiento</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Siguiente Numero Correlativo Asiento</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Asiento Simple Factura</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Codigo Secuencial Cliente</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Contador Cliente</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Cliente Inactivo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Codigo Secuencial Proveedor</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Contador Proveedor</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Proveedor Inactivo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Abreviatura Registro Tributario</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Asiento Cheque</pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</thead>
		{{#if (If_Not bitEsRelacionado)}}

		
			<tfoot>
				<tr class="{{class_cabecera}}">
		
				
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">ID__</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_eli"  style="display:{{strPermisoEliminar}}">
				<pre class="cabecera_texto_titulo_tabla">Eli</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_sel" >
				<pre class="cabecera_texto_titulo_tabla">Sel</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="parametro_auxiliar_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Asignado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Siguiente Numero Correlativo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mostrar Solo Costo Producto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Codigo Secuencial Producto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Contador Producto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Costeo Kardex</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Producto Inactivo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Busqueda Incremental</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Permitir Revisar Asiento</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Decimales Unidades</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mostrar Documento Anulado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Siguiente Numero Correlativo Cc</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Eliminacion Fisica Asiento</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Siguiente Numero Correlativo Asiento</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Asiento Simple Factura</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Codigo Secuencial Cliente</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Contador Cliente</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Cliente Inactivo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Codigo Secuencial Proveedor</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Contador Proveedor</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Proveedor Inactivo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Abreviatura Registro Tributario</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Asiento Cheque</pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		{{/if}}

		<tbody>

		{{#if (Is_List_Exist parametro_auxiliarsLocal)}}
			{{#each parametro_auxiliarsLocal}}

				{{#if (If_NotText ../STR_TIPO_TABLA 'normal')}}
					
					<tr>
					
				{{else}}
					

					<tr class="{{getClassRowTableHtml i}}" {{getOnMouseOverHtml ../STR_TIPO_TABLA i}} >
				{{/if}}

				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								{{id}}
							</td>
							<td>
								<img class="imgseleccionarparametro_auxiliar" idactualparametro_auxiliar="{{id}}" title="SELECCIONAR Parametro Auxiliar ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_eli col_id"  style="display:{{../strPermisoEliminar}}">
					<a>
					<table>
						<tr>
							<td>
								{{id}}
							</td>
							<td>
								<img class="imgeliminartablaparametro_auxiliar" idactualparametro_auxiliar="{{id}}" title="ELIMINAR Parametro Auxiliar ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Parametro Auxiliar ACTUAL" value="{{id}}"></input>
							</td>
							<td>
								{{i}}
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none"> 
						{{ updated_at }}
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none"> 
						{{ updated_at }}
					</td>
				{{#if ../IS_DEVELOPING}}
				<td> {{id_empresa_Descripcion}}</td>
				{{/if}}
				
					<td class="elementotabla col_nombre_asignado" > 
						{{ nombre_asignado }}
					</td>
				
					<td class="elementotabla col_siguiente_numero_correlativo" > 
						{{ siguiente_numero_correlativo }}
					</td>
				
					<td class="elementotabla col_incremento" > 
						{{ incremento }}
					</td>
				
					<td class="elementotabla col_mostrar_solo_costo_producto" >{{{ getCheckBox mostrar_solo_costo_producto 'form{{strSufijo}}-mostrar_solo_costo_productoi' ../paraReporte }}}
					</td>
				
					<td class="elementotabla col_con_codigo_secuencial_producto" >{{{ getCheckBox con_codigo_secuencial_producto 'form{{strSufijo}}-con_codigo_secuencial_productoi' ../paraReporte }}}
					</td>
				
					<td class="elementotabla col_contador_producto" > 
						{{ contador_producto }}
					</td>
				<td class="elementotabla col_id_tipo_costeo_kardex" > {{id_tipo_costeo_kardex_Descripcion}}</td>
				
					<td class="elementotabla col_con_producto_inactivo" >{{{ getCheckBox con_producto_inactivo 'form{{strSufijo}}-con_producto_inactivoi' ../paraReporte }}}
					</td>
				
					<td class="elementotabla col_con_busqueda_incremental" >{{{ getCheckBox con_busqueda_incremental 'form{{strSufijo}}-con_busqueda_incrementali' ../paraReporte }}}
					</td>
				
					<td class="elementotabla col_permitir_revisar_asiento" >{{{ getCheckBox permitir_revisar_asiento 'form{{strSufijo}}-permitir_revisar_asientoi' ../paraReporte }}}
					</td>
				
					<td class="elementotabla col_numero_decimales_unidades" > 
						{{ numero_decimales_unidades }}
					</td>
				
					<td class="elementotabla col_mostrar_documento_anulado" >{{{ getCheckBox mostrar_documento_anulado 'form{{strSufijo}}-mostrar_documento_anuladoi' ../paraReporte }}}
					</td>
				
					<td class="elementotabla col_siguiente_numero_correlativo_cc" > 
						{{ siguiente_numero_correlativo_cc }}
					</td>
				
					<td class="elementotabla col_con_eliminacion_fisica_asiento" >{{{ getCheckBox con_eliminacion_fisica_asiento 'form{{strSufijo}}-con_eliminacion_fisica_asientoi' ../paraReporte }}}
					</td>
				
					<td class="elementotabla col_siguiente_numero_correlativo_asiento" > 
						{{ siguiente_numero_correlativo_asiento }}
					</td>
				
					<td class="elementotabla col_con_asiento_simple_factura" >{{{ getCheckBox con_asiento_simple_factura 'form{{strSufijo}}-con_asiento_simple_facturai' ../paraReporte }}}
					</td>
				
					<td class="elementotabla col_con_codigo_secuencial_cliente" >{{{ getCheckBox con_codigo_secuencial_cliente 'form{{strSufijo}}-con_codigo_secuencial_clientei' ../paraReporte }}}
					</td>
				
					<td class="elementotabla col_contador_cliente" > 
						{{ contador_cliente }}
					</td>
				
					<td class="elementotabla col_con_cliente_inactivo" >{{{ getCheckBox con_cliente_inactivo 'form{{strSufijo}}-con_cliente_inactivoi' ../paraReporte }}}
					</td>
				
					<td class="elementotabla col_con_codigo_secuencial_proveedor" >{{{ getCheckBox con_codigo_secuencial_proveedor 'form{{strSufijo}}-con_codigo_secuencial_proveedori' ../paraReporte }}}
					</td>
				
					<td class="elementotabla col_contador_proveedor" > 
						{{ contador_proveedor }}
					</td>
				
					<td class="elementotabla col_con_proveedor_inactivo" >{{{ getCheckBox con_proveedor_inactivo 'form{{strSufijo}}-con_proveedor_inactivoi' ../paraReporte }}}
					</td>
				
					<td class="elementotabla col_abreviatura_registro_tributario" > 
						{{ abreviatura_registro_tributario }}
					</td>
				
					<td class="elementotabla col_con_asiento_cheque" >{{{ getCheckBox con_asiento_cheque 'form{{strSufijo}}-con_asiento_chequei' ../paraReporte }}}
					</td>

				{{#if (If_Not_AND_Not ../bitEsBusqueda  ../bitEsRelaciones)}}

				{{/if}}

				<td style="display:none" class="actions"></td>

				</tr>
			{{/each}}
		{{/if}}

					</tbody>

				</table>

			</div>

		</form>


</script>

