<?php 
	$aux=false;
	
    if($aux) { 
        echo "some message";
        
    } else { 
?>
<style type="text/css">

/*
DIVS PRINCIPAL
*/
* Cabecera */
#outerBorder {
  /*overflow:auto;*/
  width:100%; 
  align:left;			
  margin: 0px 0px 0px 0px;
  padding: 0px 0px 0px 0px;
  /*background-color: black;*/
}

/* npi */
#header {
  /*overflow:auto;*/
  border-top: 0px;
  position:relative; 
  width:100%; 
  height:100px; 
  margin:0; 
  padding:0; 
  background:#0B2161 url("webroot/img/Imagenes/Background/header.gif") 0 0 repeat; 
  /*background:#0B2161 url("/seguridad_general1/webroot/img/Imagenes/Background/header.gif") 0 0 repeat;*/
  color:#000000;
  /*background-color: blue;*/
}

/* links cabecera */
#subheader {
  /*overflow:auto;*/
  float:right;
  margin-top : 0px;
  clear:both;
  border-top: 0px solid #000000;
  border-bottom: 0px solid #000000;
  height:20px;
  /*background-color: yellow;*/
}

/*Solo links*/
/*#subheader div {*/
#subheaderLinks {
  /*overflow:auto;*/
  float:right;
  /*background-color: yellow;*/
}

#subheaderImagesLinks {
  overflow:auto;
  width:100%;
  margin: 0px 0px 10px 0px;
  float: right;
  /* background-color: yellow; */
}

#subheaderImageTree {
  /*overflow:auto;*/
  margin: 0px 0px 0px 0px;
  float: left;
  background-color: yellow;
  /* background-color: yellow; */
}

/* npi */
#main {
  /*overflow:auto;*/
  width: 100%;
  margin-top: 0px;
  /* background-color: yellow; */
}

/* Contenido */
#content{
  width:80%; 	
  overflow:auto;	
  margin: 0 0 0 0px;
  /*width: 760px;*/
  /*background-color: yellow;*/
  
  position: relative; 
  top: 0; 
  left: 0;
}

/* Arbol menu */
#leftSidebar {
  overflow:auto;
  
  /*
  overflow-x: scroll;
  overflow-y: hidden;
  */
  /*float: left;*/ 
  /*width: 200px;*/    
  
  width: 15%;
  height: 625px;
  /*background-color: yellow;*/
  
  /*
  margin: 0;
  padding: 0;
  */
}

/* Titulo superior */
#banner {
  /*overflow:auto;*/
  width:100%; 
  margin: 0px 0px 0px 0px;
  display:table-cell;
  /*vertical-align:middle;*/
  font-size:35px;
  /*background-color: yellow;*/
}

 </style>
 
<?php
    }
?>