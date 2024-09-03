//<script type="text/javascript" language="javascript">
import { funcionGeneral } from '../General/FuncionGeneral';
import { funcionGeneralJQuery } from '../General/FuncionGeneralJQuery';
class GeneralEntityFuncion {
    constructor(termino_pago_funcion) {
    }
    test() {
        //alert("here");
    }
    /*---------------------------------- AREA:PROCESAR ------------------------*/
    procesarInicioProceso(objetoConstante) {
        funcionGeneral.procesarInicioProceso(objetoConstante.STR_RELATIVE_PATH);
    }
    procesarFinalizacionProceso(objetoConstante, name) {
        funcionGeneralJQuery.procesarFinalizacionProceso(objetoConstante.STR_RELATIVE_PATH, name);
    }
    //------------- Procesar-Link -------------------
    procesarFinalizacionProcesoAbrirLink(objetoConstante, name) {
        funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLink(objetoConstante.STR_RELATIVE_PATH, name);
    }
    procesarFinalizacionProcesoAbrirLinkParametros(strTipo, strLink, name) {
        funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLinkParametros(strTipo, strLink, name);
    }
    //------------- Procesar-Simple -------------------
    procesarInicioProcesoSimple(objetoConstante) {
        funcionGeneral.procesarInicioProcesoSimple(objetoConstante.STR_RELATIVE_PATH);
    }
    procesarFinalizacionProcesoSimple(objetoConstante, name) {
        funcionGeneralJQuery.procesarFinalizacionProcesoSimple(objetoConstante.STR_RELATIVE_PATH, name);
    }
    /*---------------------------------- AREA:AUXILIAR-GENERAL ---------------------------*/
    esPaginaForm(objetoConstante) {
        var bitRetorno = false;
        if (objetoConstante.BIT_CON_PAGINA_FORM == true && objetoConstante.BIT_ES_PAGINA_FORM == true) {
            bitRetorno = true;
        }
        return bitRetorno;
    }
    resaltarRestaurarDivMantenimiento(bitEsResaltar, name) {
        funcionGeneralJQuery.resaltarRestaurarDivMantenimiento(bitEsResaltar, name);
    }
    resaltarRestaurarDivMensajePopup(bitEsResaltar, name) {
        funcionGeneralJQuery.resaltarRestaurarDivMensajePopup(bitEsResaltar, name);
    }
    resaltarRestaurarDivsPagina(bitEsResaltar, name) {
        funcionGeneral.resaltarRestaurarDivsPagina(bitEsResaltar, name);
    }
    resaltarRestaurarDivMensaje(bitEsResaltar, strMensaje, strTipo) {
        //PUEDE QUEDARSE DESHABILITADO, SOLO MUESTRO EL MENSAJE
        var strNombreDivMensajePageDialog = "divMensajePageDialog";
        funcionGeneral.resaltarRestaurarDivMensaje(strNombreDivMensajePageDialog, bitEsResaltar, strMensaje, strTipo, jQuery("#ParamsPostAccion-chbPostAccionSinMensaje"));
    }
    //------------- Auxiliar-Mostrar-Mensaje -------------------
    mostrarDivMensaje(bitEsResaltar, strMensaje, strTipo) {
        funcionGeneral.mostrarDivMensaje(jQuery("#divMensajePage"), jQuery("#spanIcoMensajePage"), jQuery("#spanMensajePage"), jQuery("#ParamsPostAccion-chbPostAccionSinMensaje"), bitEsResaltar, strMensaje, strTipo);
    }
    mostrarMensaje(bitEsResaltar, strMensaje, strTipo) {
        this.resaltarRestaurarDivMensaje(bitEsResaltar, strMensaje, strTipo);
        this.mostrarDivMensaje(bitEsResaltar, strMensaje, strTipo);
    }
}
export { GeneralEntityFuncion };
//</script>
