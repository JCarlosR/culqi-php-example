<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Culqi Test</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <h1>Culqi PHP Example</h1>
      <a id="miBoton" class="btn btn-primary" href="#" >Pay</a>
      <br/><br/><br/>
      <div class="panel panel-default" id="response-panel">
        <div class="panel-heading">Response</div>
        <div class="panel-body" id="response">
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://checkout.culqi.com/js/v2"></script>
    <script>
      $("#response-panel").hide();
       Culqi.codigoComercio = 'pk_test_vzMuTHoueOMlgUPj';
       Culqi.configurar({
            nombre: 'Mi Comercio',
            orden: 'x123131',
            moneda: 'PEN',
            descripcion: 'Pago de matrícula',
            monto: 60000
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
              $.ajax({
                 type: 'POST',
                 url: 'http://localhost:8000/server.php',
                 data: { token: Culqi.token.id },
                 success: function(response) {
                   $('#response-panel').show();
                   $('#response').html(response);
                 },
                 error: function(error) {
                   $('#response-panel').show();
                   $('#response').html(error);
                 }
              });
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
