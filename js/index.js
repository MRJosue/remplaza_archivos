$(document).ready(function(){
    console.log('ready');

    $('#Reemplaza_archivos').on( "click", function() {
       
        // logiga del guardado de datos
        
        remplaza_archivo();


      } );

});

function remplaza_archivo(){
    // definimos variables
    archivos = $('#archivos').val();
    console.log("🚀 ~ file: index.js:18 ~ remplaza_archivo ~ archivos:", archivos)
    // Ruta
    Ruta = $('#Ruta').val();
    console.log("🚀 ~ file: index.js:21 ~ remplaza_archivo ~ Ruta:", Ruta)

    dataObj = {
        option: 'remplaza_archivo',
        Ruta: Ruta,
        archivos: archivos
    };

    console.log('dataObj: ',dataObj);

    $.ajax({
        async: false,
        cache: false,
        method: "POST",
        dataType: "json",
        url: './modelo/index_modelo.php',
        data: dataObj
    }).done(function (data) {

        restultado = data.result;
        if (restultado) {
            limpiarcampos();
            alert("se ha guardado el movimiento con exito");
            mostrar_datos();
            
        }else{
            alert("ha ocurrido un error al guardar");
        }


    }).fail(function (result) {
        console.log("ERROR");
        console.log(result);
        
    });
 }

