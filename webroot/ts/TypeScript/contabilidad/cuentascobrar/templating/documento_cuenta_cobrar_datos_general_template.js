
<script id="documento_cuenta_cobrar_datos_general_template" type="text/x-handlebars-template">



		<form id="frmTablaDatosdocumento_cuenta_cobrar" name="frmTablaDatosdocumento_cuenta_cobrar">
			<div id="divTablaDatosAuxiliardocumento_cuenta_cobrarsAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count documento_cuenta_cobrars}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTitulodocumento_cuenta_cobrar" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Documentos Cuentas por Cobrares</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatosdocumento_cuenta_cobrars" name="tblTablaDatosdocumento_cuenta_cobrars" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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
			<th class="cabecera_titulo_tabla columna_tabla_selrel"  style="display:{{strPermisoRelaciones}}">
				<pre class="cabecera_texto_titulo_tabla">Rel</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">VERSIONROW</pre>
			</th>

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="documento_cuenta_cobrar_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sucursal<a onclick="jQuery('#form-id_sucursal_img').trigger('click' );"><img id="form{{strSufijo}}-id_sucursal_img2" name="form{{strSufijo}}-id_sucursal_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="documento_cuenta_cobrar_webcontrol1.abrirBusquedaParasucursal('id_sucursal');"><img id="form{{strSufijo}}-id_sucursal_img_busqueda2" name="form{{strSufijo}}-id_sucursal_img_busqueda2" title="Buscar Sucursal" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ejercicio<a onclick="jQuery('#form-id_ejercicio_img').trigger('click' );"><img id="form{{strSufijo}}-id_ejercicio_img2" name="form{{strSufijo}}-id_ejercicio_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="documento_cuenta_cobrar_webcontrol1.abrirBusquedaParaejercicio('id_ejercicio');"><img id="form{{strSufijo}}-id_ejercicio_img_busqueda2" name="form{{strSufijo}}-id_ejercicio_img_busqueda2" title="Buscar ejercicio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Periodo<a onclick="jQuery('#form-id_periodo_img').trigger('click' );"><img id="form{{strSufijo}}-id_periodo_img2" name="form{{strSufijo}}-id_periodo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="documento_cuenta_cobrar_webcontrol1.abrirBusquedaParaperiodo('id_periodo');"><img id="form{{strSufijo}}-id_periodo_img_busqueda2" name="form{{strSufijo}}-id_periodo_img_busqueda2" title="Buscar periodo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usuario<a onclick="jQuery('#form-id_usuario_img').trigger('click' );"><img id="form{{strSufijo}}-id_usuario_img2" name="form{{strSufijo}}-id_usuario_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="documento_cuenta_cobrar_webcontrol1.abrirBusquedaParausuario('id_usuario');"><img id="form{{strSufijo}}-id_usuario_img_busqueda2" name="form{{strSufijo}}-id_usuario_img_busqueda2" title="Buscar Usuario" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cliente<a onclick="jQuery('#form-id_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_cliente_img2" name="form{{strSufijo}}-id_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="documento_cuenta_cobrar_webcontrol1.abrirBusquedaParacliente('id_cliente');"><img id="form{{strSufijo}}-id_cliente_img_busqueda2" name="form{{strSufijo}}-id_cliente_img_busqueda2" title="Buscar Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Emision</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto Parcial</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Moneda</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Vencimiento</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro De Pagos</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Balance</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Documento Pagado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Id Pagado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modulo Origen</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Id Origen</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modulo Destino</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Id Destino</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Pc</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Hora</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto Mora</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Interes Mora</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Dias Gracia Mora</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Instrumento Pago</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Cambio</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Documento Cliente</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Clase Registro</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado Registro</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Motivo Anulacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto 1</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto 2</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto Incluido</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observaciones</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Grupo Pago</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Termino Idpv</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Forma Pago Cliente<a onclick="jQuery('#form-id_forma_pago_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_forma_pago_cliente_img2" name="form{{strSufijo}}-id_forma_pago_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="documento_cuenta_cobrar_webcontrol1.abrirBusquedaParaforma_pago_cliente('id_forma_pago_cliente');"><img id="form{{strSufijo}}-id_forma_pago_cliente_img_busqueda2" name="form{{strSufijo}}-id_forma_pago_cliente_img_busqueda2" title="Buscar Forma Pago Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Pago</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Referencia Pago</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Hora</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Id Base</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Cliente<a onclick="jQuery('#form-id_cuenta_corriente_img').trigger('click' );"><img id="form{{strSufijo}}-id_cuenta_corriente_img2" name="form{{strSufijo}}-id_cuenta_corriente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="documento_cuenta_cobrar_webcontrol1.abrirBusquedaParacuenta_corriente('id_cuenta_corriente');"><img id="form{{strSufijo}}-id_cuenta_corriente_img_busqueda2" name="form{{strSufijo}}-id_cuenta_corriente_img_busqueda2" title="Buscar Cuenta Corriente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ncf</pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre>Devolucion Facturas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Facturas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Facturas Loteses</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Imagenes es</pre></b>
			</th>

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
			<th class="cabecera_titulo_tabla columna_tabla_selrel"  style="display:{{strPermisoRelaciones}}">
				<pre class="cabecera_texto_titulo_tabla">Rel</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">VERSIONROW</pre>
			</th>

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="documento_cuenta_cobrar_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sucursal<a onclick="jQuery('#form-id_sucursal_img').trigger('click' );"><img id="form{{strSufijo}}-id_sucursal_img2" name="form{{strSufijo}}-id_sucursal_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="documento_cuenta_cobrar_webcontrol1.abrirBusquedaParasucursal('id_sucursal');"><img id="form{{strSufijo}}-id_sucursal_img_busqueda2" name="form{{strSufijo}}-id_sucursal_img_busqueda2" title="Buscar Sucursal" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ejercicio<a onclick="jQuery('#form-id_ejercicio_img').trigger('click' );"><img id="form{{strSufijo}}-id_ejercicio_img2" name="form{{strSufijo}}-id_ejercicio_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="documento_cuenta_cobrar_webcontrol1.abrirBusquedaParaejercicio('id_ejercicio');"><img id="form{{strSufijo}}-id_ejercicio_img_busqueda2" name="form{{strSufijo}}-id_ejercicio_img_busqueda2" title="Buscar ejercicio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Periodo<a onclick="jQuery('#form-id_periodo_img').trigger('click' );"><img id="form{{strSufijo}}-id_periodo_img2" name="form{{strSufijo}}-id_periodo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="documento_cuenta_cobrar_webcontrol1.abrirBusquedaParaperiodo('id_periodo');"><img id="form{{strSufijo}}-id_periodo_img_busqueda2" name="form{{strSufijo}}-id_periodo_img_busqueda2" title="Buscar periodo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usuario<a onclick="jQuery('#form-id_usuario_img').trigger('click' );"><img id="form{{strSufijo}}-id_usuario_img2" name="form{{strSufijo}}-id_usuario_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="documento_cuenta_cobrar_webcontrol1.abrirBusquedaParausuario('id_usuario');"><img id="form{{strSufijo}}-id_usuario_img_busqueda2" name="form{{strSufijo}}-id_usuario_img_busqueda2" title="Buscar Usuario" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cliente<a onclick="jQuery('#form-id_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_cliente_img2" name="form{{strSufijo}}-id_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="documento_cuenta_cobrar_webcontrol1.abrirBusquedaParacliente('id_cliente');"><img id="form{{strSufijo}}-id_cliente_img_busqueda2" name="form{{strSufijo}}-id_cliente_img_busqueda2" title="Buscar Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Emision</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto Parcial</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Moneda</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Vencimiento</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro De Pagos</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Balance</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Documento Pagado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Id Pagado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modulo Origen</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Id Origen</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modulo Destino</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Id Destino</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Pc</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Hora</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto Mora</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Interes Mora</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Dias Gracia Mora</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Instrumento Pago</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Cambio</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Documento Cliente</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Clase Registro</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado Registro</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Motivo Anulacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto 1</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto 2</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto Incluido</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observaciones</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Grupo Pago</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Termino Idpv</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Forma Pago Cliente<a onclick="jQuery('#form-id_forma_pago_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_forma_pago_cliente_img2" name="form{{strSufijo}}-id_forma_pago_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="documento_cuenta_cobrar_webcontrol1.abrirBusquedaParaforma_pago_cliente('id_forma_pago_cliente');"><img id="form{{strSufijo}}-id_forma_pago_cliente_img_busqueda2" name="form{{strSufijo}}-id_forma_pago_cliente_img_busqueda2" title="Buscar Forma Pago Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Pago</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Referencia Pago</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Hora</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Id Base</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Cliente<a onclick="jQuery('#form-id_cuenta_corriente_img').trigger('click' );"><img id="form{{strSufijo}}-id_cuenta_corriente_img2" name="form{{strSufijo}}-id_cuenta_corriente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="documento_cuenta_cobrar_webcontrol1.abrirBusquedaParacuenta_corriente('id_cuenta_corriente');"><img id="form{{strSufijo}}-id_cuenta_corriente_img_busqueda2" name="form{{strSufijo}}-id_cuenta_corriente_img_busqueda2" title="Buscar Cuenta Corriente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ncf</pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre>Devolucion Facturas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Facturas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Facturas Loteses</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Imagenes es</pre></b>
			</th>

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		{{/if}}

		<tbody>

		{{#if (Is_List_Exist documento_cuenta_cobrarsLocal)}}
			{{#each documento_cuenta_cobrarsLocal}}

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
								<img class="imgseleccionardocumento_cuenta_cobrar" idactualdocumento_cuenta_cobrar="{{id}}" title="SELECCIONAR Documentos Cuentas por Cobrar ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartabladocumento_cuenta_cobrar" idactualdocumento_cuenta_cobrar="{{id}}" title="ELIMINAR Documentos Cuentas por Cobrar ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Documentos Cuentas por Cobrar ACTUAL" value="{{id}}"></input>
							</td>
							<td>
								{{i}}
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:{{../strPermisoRelaciones}}">
					<a>
						{{id}}<img class="imgseleccionarmostraraccionesrelacionesdocumento_cuenta_cobrar" idactualdocumento_cuenta_cobrar="{{id}}" title="DATOS RELACIONADOS" src="{{../PATH_IMAGEN}}/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
				</td>
				
					<td class="elementotabla col_version_row"  style="display:none"> 
						{{ versionRow }}
					</td>
				{{#if ../IS_DEVELOPING}}
				<td> {{id_empresa_Descripcion}}</td>
				{{/if}}
				{{#if ../IS_DEVELOPING}}
				<td> {{id_sucursal_Descripcion}}</td>
				{{/if}}
				{{#if ../IS_DEVELOPING}}
				<td> {{id_ejercicio_Descripcion}}</td>
				{{/if}}
				{{#if ../IS_DEVELOPING}}
				<td> {{id_periodo_Descripcion}}</td>
				{{/if}}
				{{#if ../IS_DEVELOPING}}
				<td> {{id_usuario_Descripcion}}</td>
				{{/if}}
				
					<td class="elementotabla col_numero" > 
						{{ numero }}
					</td>
				<td class="elementotabla col_id_cliente" > {{id_cliente_Descripcion}}</td>
				
					<td class="elementotabla col_tipo" > 
						{{ tipo }}
					</td>
				
					<td class="elementotabla col_fecha_emision" > 
						{{ fecha_emision }}
					</td>
				
					<td class="elementotabla col_descripcion" > 
						{{ descripcion }}
					</td>
				
					<td class="elementotabla col_monto" > 
						{{ monto }}
					</td>
				
					<td class="elementotabla col_monto_parcial" > 
						{{ monto_parcial }}
					</td>
				
					<td class="elementotabla col_moneda" > 
						{{ moneda }}
					</td>
				
					<td class="elementotabla col_fecha_vence" > 
						{{ fecha_vence }}
					</td>
				
					<td class="elementotabla col_numero_de_pagos" > 
						{{ numero_de_pagos }}
					</td>
				
					<td class="elementotabla col_balance" > 
						{{ balance }}
					</td>
				
					<td class="elementotabla col_numero_pagado" > 
						{{ numero_pagado }}
					</td>
				
					<td class="elementotabla col_id_pagado" > 
						{{ id_pagado }}
					</td>
				
					<td class="elementotabla col_modulo_origen" > 
						{{ modulo_origen }}
					</td>
				
					<td class="elementotabla col_id_origen" > 
						{{ id_origen }}
					</td>
				
					<td class="elementotabla col_modulo_destino" > 
						{{ modulo_destino }}
					</td>
				
					<td class="elementotabla col_id_destino" > 
						{{ id_destino }}
					</td>
				
					<td class="elementotabla col_nombre_pc" > 
						{{ nombre_pc }}
					</td>
				
					<td class="elementotabla col_hora" > 
						{{ hora }}
					</td>
				
					<td class="elementotabla col_monto_mora" > 
						{{ monto_mora }}
					</td>
				
					<td class="elementotabla col_interes_mora" > 
						{{ interes_mora }}
					</td>
				
					<td class="elementotabla col_dias_gracia_mora" > 
						{{ dias_gracia_mora }}
					</td>
				
					<td class="elementotabla col_instrumento_pago" > 
						{{ instrumento_pago }}
					</td>
				
					<td class="elementotabla col_tipo_cambio" > 
						{{ tipo_cambio }}
					</td>
				
					<td class="elementotabla col_numero_cliente" > 
						{{ numero_cliente }}
					</td>
				
					<td class="elementotabla col_clase_registro" > 
						{{ clase_registro }}
					</td>
				
					<td class="elementotabla col_estado_registro" > 
						{{ estado_registro }}
					</td>
				
					<td class="elementotabla col_motivo_anulacion" > 
						{{ motivo_anulacion }}
					</td>
				
					<td class="elementotabla col_impuesto_1" > 
						{{ impuesto_1 }}
					</td>
				
					<td class="elementotabla col_impuesto_2" > 
						{{ impuesto_2 }}
					</td>
				
					<td class="elementotabla col_impuesto_incluido" > 
						{{ impuesto_incluido }}
					</td>
				
					<td class="elementotabla col_observaciones" > 
						{{ observaciones }}
					</td>
				
					<td class="elementotabla col_grupo_pago" > 
						{{ grupo_pago }}
					</td>
				
					<td class="elementotabla col_termino_idpv" > 
						{{ termino_idpv }}
					</td>
				<td class="elementotabla col_id_forma_pago_cliente" > {{id_forma_pago_cliente_Descripcion}}</td>
				
					<td class="elementotabla col_nro_pago" > 
						{{ nro_pago }}
					</td>
				
					<td class="elementotabla col_ref_pago" > 
						{{ ref_pago }}
					</td>
				
					<td class="elementotabla col_fecha_hora" > 
						{{ fecha_hora }}
					</td>
				
					<td class="elementotabla col_id_base" > 
						{{ id_base }}
					</td>
				<td class="elementotabla col_id_cuenta_corriente" > {{id_cuenta_corriente_Descripcion}}</td>
				
					<td class="elementotabla col_ncf" > 
						{{ ncf }}
					</td>

				{{#if (If_Not_AND_Not ../bitEsBusqueda  ../bitEsRelaciones)}}

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelaciondevolucion_factura" idactualdocumento_cuenta_cobrar="{{id}}" title="Devolucion FacturaS DE Documentos Cuentas por Cobrar" src="{{PATH_IMAGEN}}/Imagenes/devolucion_facturas.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionfactura" idactualdocumento_cuenta_cobrar="{{id}}" title="FacturaS DE Documentos Cuentas por Cobrar" src="{{PATH_IMAGEN}}/Imagenes/facturas.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionfactura_lote" idactualdocumento_cuenta_cobrar="{{id}}" title="Facturas LotesS DE Documentos Cuentas por Cobrar" src="{{PATH_IMAGEN}}/Imagenes/factura_lotes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionimagen_documento_cuenta_cobrar" idactualdocumento_cuenta_cobrar="{{id}}" title="Imagenes Documentos Cuentas por CobrarS DE Documentos Cuentas por Cobrar" src="{{PATH_IMAGEN}}/Imagenes/imagen_documento_cuenta_cobrars.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

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

