$.ajax({
    type: "POST",
    url: 'https://captcharh.ddns.net/api/record',
    data: {
        type: '', //tipo de documento 
        documento: '', //numero de documento
        datas: '' //tipo de solicitud
    }
}).done(function(msg){
    console.log(msg)
});

Tipos de Documentos Record MTC
1 DOCUMENTO NACIONAL DE IDENTIDAD
2 CARNE DE EXTRANJERIA
3 CARNE DE SOLICITANTE
4 TARJETA DE IDENTIDAD
5 PERMISO TEMPORAL DE PERMANENCIA

Tipo de Solicitud
record == 'Record Conductor',
placa == 'Placas PE'