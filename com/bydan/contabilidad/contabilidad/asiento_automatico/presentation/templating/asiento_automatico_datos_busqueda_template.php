



		<form id="frmTablaDatosasiento_automatico" name="frmTablaDatosasiento_automatico">
			<div id="divTablaDatosAuxiliarasiento_automaticosAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($asiento_automaticos)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloasiento_automatico" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Asiento Automaticos</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosasiento_automaticos" name="tblTablaDatosasiento_automaticos" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

		<?php if($IS_DEVELOPING && !$bitEsRelacionado) { ?>
			<caption>(<?php echo($STR_PREFIJO_TABLE.$STR_TABLE_NAME) ?>)</caption>
		<?php } ?>

		
			<thead>
				<tr class="<?php echo($class_cabecera) ?>">
		<?php // class="cabeceratabla" ?>

				<?php //EN UNA LINEA PRIMERO COLUMNAS(ID,ELIMINAR,SELECCIONAR) ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">ID__</pre>
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

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form$strSufijo-id_empresa_img2" name="form$strSufijo-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="asiento_automatico_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form$strSufijo-id_empresa_img_busqueda2" name="form$strSufijo-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Modulo<a onclick="jQuery('#form-id_modulo_img').trigger('click' );"><img id="form$strSufijo-id_modulo_img2" name="form$strSufijo-id_modulo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="asiento_automatico_webcontrol1.abrirBusquedaParamodulo('id_modulo');"><img id="form$strSufijo-id_modulo_img_busqueda2" name="form$strSufijo-id_modulo_img_busqueda2" title="Buscar Modulo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fuente<a onclick="jQuery('#form-id_fuente_img').trigger('click' );"><img id="form$strSufijo-id_fuente_img2" name="form$strSufijo-id_fuente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="asiento_automatico_webcontrol1.abrirBusquedaParafuente('id_fuente');"><img id="form$strSufijo-id_fuente_img_busqueda2" name="form$strSufijo-id_fuente_img_busqueda2" title="Buscar Fuente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Libro Auxiliar<a onclick="jQuery('#form-id_libro_auxiliar_img').trigger('click' );"><img id="form$strSufijo-id_libro_auxiliar_img2" name="form$strSufijo-id_libro_auxiliar_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="asiento_automatico_webcontrol1.abrirBusquedaParalibro_auxiliar('id_libro_auxiliar');"><img id="form$strSufijo-id_libro_auxiliar_img_busqueda2" name="form$strSufijo-id_libro_auxiliar_img_busqueda2" title="Buscar Libro Auxiliar" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Centro Costo<a onclick="jQuery('#form-id_centro_costo_img').trigger('click' );"><img id="form$strSufijo-id_centro_costo_img2" name="form$strSufijo-id_centro_costo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="asiento_automatico_webcontrol1.abrirBusquedaParacentro_costo('id_centro_costo');"><img id="form$strSufijo-id_centro_costo_img_busqueda2" name="form$strSufijo-id_centro_costo_img_busqueda2" title="Buscar Centro Costo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Activo</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Detalle s</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</thead>
		<?php if(!$bitEsRelacionado) { ?>

		
			<tfoot>
				<tr class="<?php echo($class_cabecera) ?>">
		<?php // class="cabeceratabla" ?>

				<?php //EN UNA LINEA PRIMERO COLUMNAS(ID,ELIMINAR,SELECCIONAR) ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">ID__</pre>
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

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form$strSufijo-id_empresa_img2" name="form$strSufijo-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="asiento_automatico_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form$strSufijo-id_empresa_img_busqueda2" name="form$strSufijo-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Modulo<a onclick="jQuery('#form-id_modulo_img').trigger('click' );"><img id="form$strSufijo-id_modulo_img2" name="form$strSufijo-id_modulo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="asiento_automatico_webcontrol1.abrirBusquedaParamodulo('id_modulo');"><img id="form$strSufijo-id_modulo_img_busqueda2" name="form$strSufijo-id_modulo_img_busqueda2" title="Buscar Modulo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fuente<a onclick="jQuery('#form-id_fuente_img').trigger('click' );"><img id="form$strSufijo-id_fuente_img2" name="form$strSufijo-id_fuente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="asiento_automatico_webcontrol1.abrirBusquedaParafuente('id_fuente');"><img id="form$strSufijo-id_fuente_img_busqueda2" name="form$strSufijo-id_fuente_img_busqueda2" title="Buscar Fuente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Libro Auxiliar<a onclick="jQuery('#form-id_libro_auxiliar_img').trigger('click' );"><img id="form$strSufijo-id_libro_auxiliar_img2" name="form$strSufijo-id_libro_auxiliar_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="asiento_automatico_webcontrol1.abrirBusquedaParalibro_auxiliar('id_libro_auxiliar');"><img id="form$strSufijo-id_libro_auxiliar_img_busqueda2" name="form$strSufijo-id_libro_auxiliar_img_busqueda2" title="Buscar Libro Auxiliar" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Centro Costo<a onclick="jQuery('#form-id_centro_costo_img').trigger('click' );"><img id="form$strSufijo-id_centro_costo_img2" name="form$strSufijo-id_centro_costo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="asiento_automatico_webcontrol1.abrirBusquedaParacentro_costo('id_centro_costo');"><img id="form$strSufijo-id_centro_costo_img_busqueda2" name="form$strSufijo-id_centro_costo_img_busqueda2" title="Buscar Centro Costo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Activo</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Detalle s</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($asiento_automaticosLocal!=null && count($asiento_automaticosLocal)>0) { ?>
			<?php foreach ($asiento_automaticosLocal as $asiento_automatico) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($asiento_automatico->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$asiento_automatico->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($asiento_automatico->id) ?>
							</td>
							<td>
								<img class="imgseleccionarasiento_automatico" idactualasiento_automatico="<?php echo($asiento_automatico->id) ?>"  funcionjsactualasiento_automatico="'.str_replace('TO_REPLACE',$asiento_automatico->id.',\''.asiento_automatico_util::getasiento_automaticoDescripcion($asiento_automatico).'\'',$this->strFuncionJs).'" title="SELECCIONAR Asiento Automatico ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_<?php echo($i) ?>" name="t-id_<?php echo($i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Asiento Automatico ACTUAL" value="<?php echo($asiento_automatico->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($i) ?>_0" name="t-cel_<?php echo($i) ?>_0" type="text" maxlength="25" value="<?php echo($asiento_automatico->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none"> 
						<?php echo( $asiento_automatico->updated_at ) ?>
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none"> 
						<?php echo( $asiento_automatico->updated_at ) ?>
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td> <?php echo($asiento_automatico->id_empresa_Descripcion) ?></td>
				<?php } ?>
				<td class="elementotabla col_id_modulo" > <?php echo($asiento_automatico->id_modulo_Descripcion) ?></td>
				
					<td class="elementotabla col_codigo" > 
						<?php echo( $asiento_automatico->codigo ) ?>
					</td>
				
					<td class="elementotabla col_nombre" > 
						<?php echo( $asiento_automatico->nombre ) ?>
					</td>
				<td class="elementotabla col_id_fuente" > <?php echo($asiento_automatico->id_fuente_Descripcion) ?></td>
				<td class="elementotabla col_id_libro_auxiliar" > <?php echo($asiento_automatico->id_libro_auxiliar_Descripcion) ?></td>
				<td class="elementotabla col_id_centro_costo" > <?php echo($asiento_automatico->id_centro_costo_Descripcion) ?></td>
				
					<td class="elementotabla col_descripcion" > 
						<?php echo( $asiento_automatico->descripcion ) ?>
					</td>
				
					<td class="elementotabla col_activo" ><?php  $funciones->getCheckBox($asiento_automatico->activo,'form<?php echo($strSufijo) ?>-activoi',$paraReporte)  ?>
					</td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($asiento_automatico->id) ?>
							<img class="imgrelacionasiento_automatico_detalle" idactualasiento_automatico="<?php echo($asiento_automatico->id) ?>" title="Detalle Asiento AutomaticoS DE Asiento Automatico" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/asiento_automatico_detalles.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				<?php } ?>

				<td style="display:none" class="actions"></td>

				</tr>
			<?php } ?>
		<?php } ?>

					</tbody>

				</table>

			</div>

		</form>



