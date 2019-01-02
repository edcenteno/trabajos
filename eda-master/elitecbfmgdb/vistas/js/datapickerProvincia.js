/*=============================================
VARIABLE LOCAL STORAGE
=============================================*/

if(localStorage.getItem("capturarRango") != null){

    $("#daterange-btn-arequipa span").html(localStorage.getItem("capturarRango"));


}else{

    $("#daterange-btn-arequipa span").html('<i class="fa fa-calendar"></i> Rango de fecha')

}




/*=============================================
RANGO DE FECHAS
=============================================*/
$('#daterange-btn-arequipa').daterangepicker(
  {
    ranges   : {
      'Hoy'       : [moment(), moment()],
      'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Últimos 7 días' : [moment().subtract(6, 'days'), moment()],
      'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
      'Este mes'  : [moment().startOf('month'), moment().endOf('month')],
      'Último mes'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment(),
    endDate  : moment()
  },
  function (start, end) {
    $('#daterange-btn-arequipa span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

    var fechaInicial = start.format('YYYY-MM-DD');

    var fechaFinal = end.format('YYYY-MM-DD');

    var capturarRango = $("#daterange-btn-arequipa span").html();

    localStorage.setItem("capturarRango", capturarRango);

    window.location = "index.php?ruta=busqueda-arequipa&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

  }

)

/*=============================================
CANCELAR RANGO DE FECHAS
=============================================*/

$(".daterangepicker.opensleft .range_inputs .cancelBtn").on("click", function(){

    localStorage.removeItem("capturarRango");
    localStorage.clear();
    window.location = "busqueda-arequipa";
})

/*=============================================
CAPTURAR HOY
=============================================*/

$(".daterangepicker.opensleft .ranges li").on("click", function(){


    var textoHoy = $(this).attr("data-range-key");

    if(textoHoy == "Hoy"){

        var d = new Date();

        var dia = d.getDate();
        var mes = d.getMonth()+1;
        var año = d.getFullYear();

        if(mes < 10){

            var fechaInicial = año+"-0"+mes+"-"+dia;

            var fechaFinal = año+"-0"+mes+"-"+dia;

        }else if(dia < 10){

            var fechaInicial = año+"-"+mes+"-0"+dia;

            var fechaFinal = año+"-"+mes+"-0"+dia;


        }else if(mes < 10 && dia < 10){

            var fechaInicial = año+"-0"+mes+"-0"+dia;

            var fechaFinal = año+"-0"+mes+"-0"+dia;

        }else{

            var fechaInicial = año+"-"+mes+"-"+dia;

            var fechaFinal = año+"-"+mes+"-"+dia;

        }

        localStorage.setItem("capturarRango", "Hoy");

        window.location = "index.php?ruta=busqueda-arequipa&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

    }

})


/*=============================================
c
=============================================*/

if(localStorage.getItem("capturarRango") != null){

    $("#daterange-btn-cusco span").html(localStorage.getItem("capturarRango"));


}else{

    $("#daterange-btn-cusco span").html('<i class="fa fa-calendar"></i> Rango de fecha')

}




/*=============================================
RANGO DE FECHAS
=============================================*/
$('#daterange-btn-cusco').daterangepicker(
  {
    ranges   : {
      'Hoy'       : [moment(), moment()],
      'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Últimos 7 días' : [moment().subtract(6, 'days'), moment()],
      'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
      'Este mes'  : [moment().startOf('month'), moment().endOf('month')],
      'Último mes'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment(),
    endDate  : moment()
  },
  function (start, end) {
    $('#daterange-btn-cusco span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

    var fechaInicial = start.format('YYYY-MM-DD');

    var fechaFinal = end.format('YYYY-MM-DD');

    var capturarRango = $("#daterange-btn-cusco span").html();

    localStorage.setItem("capturarRango", capturarRango);

    window.location = "index.php?ruta=busqueda-cusco&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

  }

)

/*=============================================
CANCELAR RANGO DE FECHAS
=============================================*/

$(".daterangepicker.opensleft .range_inputs .cancelBtn").on("click", function(){

    localStorage.removeItem("capturarRango");
    localStorage.clear();
    window.location = "busqueda-cusco";
})

/*=============================================
CAPTURAR HOY
=============================================*/

$(".daterangepicker.opensleft .ranges li").on("click", function(){


    var textoHoy = $(this).attr("data-range-key");

    if(textoHoy == "Hoy"){

        var d = new Date();

        var dia = d.getDate();
        var mes = d.getMonth()+1;
        var año = d.getFullYear();

        if(mes < 10){

            var fechaInicial = año+"-0"+mes+"-"+dia;

            var fechaFinal = año+"-0"+mes+"-"+dia;

        }else if(dia < 10){

            var fechaInicial = año+"-"+mes+"-0"+dia;

            var fechaFinal = año+"-"+mes+"-0"+dia;


        }else if(mes < 10 && dia < 10){

            var fechaInicial = año+"-0"+mes+"-0"+dia;

            var fechaFinal = año+"-0"+mes+"-0"+dia;

        }else{

            var fechaInicial = año+"-"+mes+"-"+dia;

            var fechaFinal = año+"-"+mes+"-"+dia;

        }

        localStorage.setItem("capturarRango", "Hoy");

        window.location = "index.php?ruta=busqueda-cusco&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

    }

})

/*=============================================
c
=============================================*/

if(localStorage.getItem("capturarRango") != null){

    $("#daterange-btn-chiclayo span").html(localStorage.getItem("capturarRango"));


}else{

    $("#daterange-btn-chiclayo span").html('<i class="fa fa-calendar"></i> Rango de fecha')

}




/*=============================================
RANGO DE FECHAS
=============================================*/
$('#daterange-btn-chiclayo').daterangepicker(
  {
    ranges   : {
      'Hoy'       : [moment(), moment()],
      'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Últimos 7 días' : [moment().subtract(6, 'days'), moment()],
      'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
      'Este mes'  : [moment().startOf('month'), moment().endOf('month')],
      'Último mes'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment(),
    endDate  : moment()
  },
  function (start, end) {
    $('#daterange-btn-chiclayo span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

    var fechaInicial = start.format('YYYY-MM-DD');

    var fechaFinal = end.format('YYYY-MM-DD');

    var capturarRango = $("#daterange-btn-chiclayo span").html();

    localStorage.setItem("capturarRango", capturarRango);

    window.location = "index.php?ruta=busqueda-chiclayo&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

  }

)

/*=============================================
CANCELAR RANGO DE FECHAS
=============================================*/

$(".daterangepicker.opensleft .range_inputs .cancelBtn").on("click", function(){

    localStorage.removeItem("capturarRango");
    localStorage.clear();
    window.location = "busqueda-chiclayo";
})

/*=============================================
CAPTURAR HOY
=============================================*/

$(".daterangepicker.opensleft .ranges li").on("click", function(){


    var textoHoy = $(this).attr("data-range-key");

    if(textoHoy == "Hoy"){

        var d = new Date();

        var dia = d.getDate();
        var mes = d.getMonth()+1;
        var año = d.getFullYear();

        if(mes < 10){

            var fechaInicial = año+"-0"+mes+"-"+dia;

            var fechaFinal = año+"-0"+mes+"-"+dia;

        }else if(dia < 10){

            var fechaInicial = año+"-"+mes+"-0"+dia;

            var fechaFinal = año+"-"+mes+"-0"+dia;


        }else if(mes < 10 && dia < 10){

            var fechaInicial = año+"-0"+mes+"-0"+dia;

            var fechaFinal = año+"-0"+mes+"-0"+dia;

        }else{

            var fechaInicial = año+"-"+mes+"-"+dia;

            var fechaFinal = año+"-"+mes+"-"+dia;

        }

        localStorage.setItem("capturarRango", "Hoy");

        window.location = "index.php?ruta=busqueda-chiclayo&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

    }

})


/*=============================================
c
=============================================*/

if(localStorage.getItem("capturarRango") != null){

    $("#daterange-btn-lima span").html(localStorage.getItem("capturarRango"));


}else{

    $("#daterange-btn-lima span").html('<i class="fa fa-calendar"></i> Rango de fecha')

}




/*=============================================
RANGO DE FECHAS
=============================================*/
$('#daterange-btn-lima').daterangepicker(
  {
    ranges   : {
      'Hoy'       : [moment(), moment()],
      'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Últimos 7 días' : [moment().subtract(6, 'days'), moment()],
      'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
      'Este mes'  : [moment().startOf('month'), moment().endOf('month')],
      'Último mes'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment(),
    endDate  : moment()
  },
  function (start, end) {
    $('#daterange-btn-lima span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

    var fechaInicial = start.format('YYYY-MM-DD');

    var fechaFinal = end.format('YYYY-MM-DD');

    var capturarRango = $("#daterange-btn-lima span").html();

    localStorage.setItem("capturarRango", capturarRango);

    window.location = "index.php?ruta=busqueda-lima&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

  }

)

/*=============================================
CANCELAR RANGO DE FECHAS
=============================================*/

$(".daterangepicker.opensleft .range_inputs .cancelBtn").on("click", function(){

    localStorage.removeItem("capturarRango");
    localStorage.clear();
    window.location = "busqueda-lima";
})

/*=============================================
CAPTURAR HOY
=============================================*/

$(".daterangepicker.opensleft .ranges li").on("click", function(){


    var textoHoy = $(this).attr("data-range-key");

    if(textoHoy == "Hoy"){

        var d = new Date();

        var dia = d.getDate();
        var mes = d.getMonth()+1;
        var año = d.getFullYear();

        if(mes < 10){

            var fechaInicial = año+"-0"+mes+"-"+dia;

            var fechaFinal = año+"-0"+mes+"-"+dia;

        }else if(dia < 10){

            var fechaInicial = año+"-"+mes+"-0"+dia;

            var fechaFinal = año+"-"+mes+"-0"+dia;


        }else if(mes < 10 && dia < 10){

            var fechaInicial = año+"-0"+mes+"-0"+dia;

            var fechaFinal = año+"-0"+mes+"-0"+dia;

        }else{

            var fechaInicial = año+"-"+mes+"-"+dia;

            var fechaFinal = año+"-"+mes+"-"+dia;

        }

        localStorage.setItem("capturarRango", "Hoy");

        window.location = "index.php?ruta=busqueda-lima&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

    }

})

/*=============================================
RANGO DE FECHAS LIMA1
=============================================*/
$('#daterange-btn-lima1').daterangepicker(
  {
    ranges   : {
      'Hoy'       : [moment(), moment()],
      'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Últimos 7 días' : [moment().subtract(6, 'days'), moment()],
      'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
      'Este mes'  : [moment().startOf('month'), moment().endOf('month')],
      'Último mes'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment(),
    endDate  : moment()
  },
  function (start, end) {
    $('#daterange-btn-lima1 span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

    var fechaInicial = start.format('YYYY-MM-DD');

    var fechaFinal = end.format('YYYY-MM-DD');

    var capturarRango = $("#daterange-btn-lima1 span").html();

    localStorage.setItem("capturarRango", capturarRango);

    window.location = "index.php?ruta=busqueda-lima1&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

  }

)

/*=============================================
CANCELAR RANGO DE FECHAS
=============================================*/

$(".daterangepicker.opensleft .range_inputs .cancelBtn").on("click", function(){

    localStorage.removeItem("capturarRango");
    localStorage.clear();
    window.location = "busqueda-lima1";
})

/*=============================================
CAPTURAR HOY
=============================================*/

$(".daterangepicker.opensleft .ranges li").on("click", function(){


    var textoHoy = $(this).attr("data-range-key");

    if(textoHoy == "Hoy"){

        var d = new Date();

        var dia = d.getDate();
        var mes = d.getMonth()+1;
        var año = d.getFullYear();

        if(mes < 10){

            var fechaInicial = año+"-0"+mes+"-"+dia;

            var fechaFinal = año+"-0"+mes+"-"+dia;

        }else if(dia < 10){

            var fechaInicial = año+"-"+mes+"-0"+dia;

            var fechaFinal = año+"-"+mes+"-0"+dia;


        }else if(mes < 10 && dia < 10){

            var fechaInicial = año+"-0"+mes+"-0"+dia;

            var fechaFinal = año+"-0"+mes+"-0"+dia;

        }else{

            var fechaInicial = año+"-"+mes+"-"+dia;

            var fechaFinal = año+"-"+mes+"-"+dia;

        }

        localStorage.setItem("capturarRango", "Hoy");

        window.location = "index.php?ruta=busqueda-lima1&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

    }

})


/*=============================================
RANGO DE FECHAS LIMA2
=============================================*/
$('#daterange-btn-lima2').daterangepicker(
  {
    ranges   : {
      'Hoy'       : [moment(), moment()],
      'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Últimos 7 días' : [moment().subtract(6, 'days'), moment()],
      'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
      'Este mes'  : [moment().startOf('month'), moment().endOf('month')],
      'Último mes'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment(),
    endDate  : moment()
  },
  function (start, end) {
    $('#daterange-btn-lima2 span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

    var fechaInicial = start.format('YYYY-MM-DD');

    var fechaFinal = end.format('YYYY-MM-DD');

    var capturarRango = $("#daterange-btn-lima2 span").html();

    localStorage.setItem("capturarRango", capturarRango);

    window.location = "index.php?ruta=busqueda-lima2&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

  }

)

/*=============================================
CANCELAR RANGO DE FECHAS
=============================================*/

$(".daterangepicker.opensleft .range_inputs .cancelBtn").on("click", function(){

    localStorage.removeItem("capturarRango");
    localStorage.clear();
    window.location = "busqueda-lima2";
})

/*=============================================
CAPTURAR HOY
=============================================*/

$(".daterangepicker.opensleft .ranges li").on("click", function(){


    var textoHoy = $(this).attr("data-range-key");

    if(textoHoy == "Hoy"){

        var d = new Date();

        var dia = d.getDate();
        var mes = d.getMonth()+1;
        var año = d.getFullYear();

        if(mes < 10){

            var fechaInicial = año+"-0"+mes+"-"+dia;

            var fechaFinal = año+"-0"+mes+"-"+dia;

        }else if(dia < 10){

            var fechaInicial = año+"-"+mes+"-0"+dia;

            var fechaFinal = año+"-"+mes+"-0"+dia;


        }else if(mes < 10 && dia < 10){

            var fechaInicial = año+"-0"+mes+"-0"+dia;

            var fechaFinal = año+"-0"+mes+"-0"+dia;

        }else{

            var fechaInicial = año+"-"+mes+"-"+dia;

            var fechaFinal = año+"-"+mes+"-"+dia;

        }

        localStorage.setItem("capturarRango", "Hoy");

        window.location = "index.php?ruta=busqueda-lima2&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

    }

})

/*=============================================
c
=============================================*/

if(localStorage.getItem("capturarRango") != null){

    $("#daterange-btn-piura span").html(localStorage.getItem("capturarRango"));


}else{

    $("#daterange-btn-piura span").html('<i class="fa fa-calendar"></i> Rango de fecha')

}






/*=============================================
RANGO DE FECHAS
=============================================*/
$('#daterange-btn-piura').daterangepicker(
  {
    ranges   : {
      'Hoy'       : [moment(), moment()],
      'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Últimos 7 días' : [moment().subtract(6, 'days'), moment()],
      'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
      'Este mes'  : [moment().startOf('month'), moment().endOf('month')],
      'Último mes'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment(),
    endDate  : moment()
  },
  function (start, end) {
    $('#daterange-btn-piura span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

    var fechaInicial = start.format('YYYY-MM-DD');

    var fechaFinal = end.format('YYYY-MM-DD');

    var capturarRango = $("#daterange-btn-piura span").html();

    localStorage.setItem("capturarRango", capturarRango);

    window.location = "index.php?ruta=busqueda-piura&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

  }

)

/*=============================================
CANCELAR RANGO DE FECHAS
=============================================*/

$(".daterangepicker.opensleft .range_inputs .cancelBtn").on("click", function(){

    localStorage.removeItem("capturarRango");
    localStorage.clear();
    window.location = "busqueda-piura";
})

/*=============================================
CAPTURAR HOY
=============================================*/

$(".daterangepicker.opensleft .ranges li").on("click", function(){


    var textoHoy = $(this).attr("data-range-key");

    if(textoHoy == "Hoy"){

        var d = new Date();

        var dia = d.getDate();
        var mes = d.getMonth()+1;
        var año = d.getFullYear();

        if(mes < 10){

            var fechaInicial = año+"-0"+mes+"-"+dia;

            var fechaFinal = año+"-0"+mes+"-"+dia;

        }else if(dia < 10){

            var fechaInicial = año+"-"+mes+"-0"+dia;

            var fechaFinal = año+"-"+mes+"-0"+dia;


        }else if(mes < 10 && dia < 10){

            var fechaInicial = año+"-0"+mes+"-0"+dia;

            var fechaFinal = año+"-0"+mes+"-0"+dia;

        }else{

            var fechaInicial = año+"-"+mes+"-"+dia;

            var fechaFinal = año+"-"+mes+"-"+dia;

        }

        localStorage.setItem("capturarRango", "Hoy");

        window.location = "index.php?ruta=busqueda-piura&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

    }

})

/*=============================================
c
=============================================*/

if(localStorage.getItem("capturarRango") != null){

    $("#daterange-btn-trujillo span").html(localStorage.getItem("capturarRango"));


}else{

    $("#daterange-btn-trujillo span").html('<i class="fa fa-calendar"></i> Rango de fecha')

}




/*=============================================
RANGO DE FECHAS
=============================================*/
$('#daterange-btn-trujillo').daterangepicker(
  {
    ranges   : {
      'Hoy'       : [moment(), moment()],
      'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Últimos 7 días' : [moment().subtract(6, 'days'), moment()],
      'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
      'Este mes'  : [moment().startOf('month'), moment().endOf('month')],
      'Último mes'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment(),
    endDate  : moment()
  },
  function (start, end) {
    $('#daterange-btn-trujillo span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

    var fechaInicial = start.format('YYYY-MM-DD');

    var fechaFinal = end.format('YYYY-MM-DD');

    var capturarRango = $("#daterange-btn-trujillo span").html();

    localStorage.setItem("capturarRango", capturarRango);

    window.location = "index.php?ruta=busqueda-trujillo&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

  }

)

/*=============================================
CANCELAR RANGO DE FECHAS
=============================================*/

$(".daterangepicker.opensleft .range_inputs .cancelBtn").on("click", function(){

    localStorage.removeItem("capturarRango");
    localStorage.clear();
    window.location = "busqueda-trujillo";
})

/*=============================================
CAPTURAR HOY
=============================================*/

$(".daterangepicker.opensleft .ranges li").on("click", function(){


    var textoHoy = $(this).attr("data-range-key");

    if(textoHoy == "Hoy"){

        var d = new Date();

        var dia = d.getDate();
        var mes = d.getMonth()+1;
        var año = d.getFullYear();

        if(mes < 10){

            var fechaInicial = año+"-0"+mes+"-"+dia;

            var fechaFinal = año+"-0"+mes+"-"+dia;

        }else if(dia < 10){

            var fechaInicial = año+"-"+mes+"-0"+dia;

            var fechaFinal = año+"-"+mes+"-0"+dia;


        }else if(mes < 10 && dia < 10){

            var fechaInicial = año+"-0"+mes+"-0"+dia;

            var fechaFinal = año+"-0"+mes+"-0"+dia;

        }else{

            var fechaInicial = año+"-"+mes+"-"+dia;

            var fechaFinal = año+"-"+mes+"-"+dia;

        }

        localStorage.setItem("capturarRango", "Hoy");

        window.location = "index.php?ruta=busqueda-trujillo&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

    }

})