<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Culqi Test</title>
  </head>
  <body>
    <h1>Culqi Test</h1>
    <a id="miBoton" href="#" >Pagar</a>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://integ-pago.culqi.com/js/v1"></script>
    <script>
       Culqi.codigoComercio = '[URL_COD_COMERCE]';
       Culqi.configurar({
            nombre: 'Mi Comercio',
            orden: 'x123131',
            moneda: 'PEN',
            descripcion: 'Pago de matrícula',
            monto: 200
       });
       $('#miBoton').on('click', function (e) {
            // Abre el formulario con las opciones de Culqi.configurar
            Culqi.abrir();
            e.preventDefault();
        });
        // Recibimos Token del Culqi.js
        function culqi() {
          if (Culqi.token) {
            // Imprimir Token
            $("#btn_pagar").submit(function(){
              $.ajax({
                 type: 'POST',
                 url: 'server.php',
                 data: { token: Culqi.token.id},
                 success: function(response) {
                 }
              });
            });
            window.location.replace("http://localhost:8000/server.php?token="+Culqi.token.id);
          } else {
            // Hubo un problema...
            // Mostramos JSON de objeto error en consola
            console.log(Culqi.error);
            alert(Culqi.error.mensaje);
          }
        };
    </script>
  </body>
</html>
