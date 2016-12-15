function VentanaCentrada(theURL,winName,features, myWidth, myHeight, isCenter) {
  if(window.screen)if(isCenter)if(isCenter=="true"){
    var myLeft = (screen.width-myWidth)/2;
    var myTop = (screen.height-myHeight)/2;
    features+=(features!='')?',':'';
    features+=',left='+myLeft+',top='+myTop;
  }
  //VentanaCentrada('./pdf/documentos/factura_pdf.php?id_cliente='+id_cliente
  // +'&id_vendedor='+id_vendedor+'&condiciones='+condiciones,'Factura','','1024','768','true');


  window.open(theURL,winName,features+((features!='')?',':'')+'width='+myWidth+',height='+myHeight);
}