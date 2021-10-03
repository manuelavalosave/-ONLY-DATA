<?php

$json_url = "https://api.nasa.gov/planetary/apod?api_key=Id60W0G5Nb62HdQSrQ5tv9ah5HwkYMranPmVRvlK";
$json = file_get_contents($json_url);

$data = json_decode($json, TRUE);




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>🌮 ONLY DATA Hackademy, Culiacan </title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.js"  crossorigin="anonymous"></script>
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <div class="container px-4">
            <a class="navbar-brand" href="#page-top">🌮 ONLY DATA Hackademy </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <!--     <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul> -->
            </div>
        </div>
    </nav>
    <!-- Header-->

    <!-- About section-->
    <section id="about">
        <div class="container px-4">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-11">
                    <h2>🌮 ONLY DATA Hackademy, Culiacan | Ontologies and Interactive Network Visualizations</h2>


                    <p class="lead">El portal de la NASA proporciona 42,946 conjuntos de datos y 555 repositorios de códigos, así como enlaces a sitios de inovación abierta, documentos científicos, códigos y datos de numerosas agencias federales de EE. UU. La mayoría de los archivos se encuentran en JSON, se requiere una correcta organización por medio del catálogo de metadatos pública (data.nasa.gov).

                        Creando una busqueda y organizacion optimizada para el usuario, con esto logrando una manera más rápida y precisa, describiendo por medio de una ontología la representación de la red por medio de nodos. </p>

                    <form action="#" method="GET" id="FormularioDeEnvio">
                        <div class="row">
                            <div class="col">
                                <label for="FechaInicial">Fecha Inicial </label>
                                <input type="date" class="form-control" id="FechaInicial" name="FechaIN" ></input>
                            </div>
                            <div class="col">
                                <label for="FechaTermino">Fecha Termino </label>
                                <input type="date" class="form-control" id="FechaTermino" name="FechaTerm"></input>
                            </div>
                       
                        <div class="col">
                            <label for="NumeroDeregistro">Cantidad de resultado </label>
                            <input type="number" class="form-control" id="NumeroDeregistro" name="NumeroTotal"></input>
                        </div>

                        <button id='Enviar' type="submit" class="btn btn-primary mb-2"> Enviar </button>
                     </div>
              
                </form>



                <table class="table table-striped" id="tabla">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">titulo</th>
                            <th scope="col">Explicacion</th>
                            <th scope="col"> Imagen </th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><?php echo $data['date']; ?></td>
                            <td><?php echo $data['title']; ?></td>
                            <td><?php echo $data['explanation']; ?></td>
                            <td><img src="<?php echo $data['url']; ?>" width="100%"></td>
                        </tr>

                    </tbody>
                </table>
<script>
    $( document ).ready(function() {
        let endpoint = 'https://api.nasa.gov/planetary/apod'
  let apiKey = 'Id60W0G5Nb62HdQSrQ5tv9ah5HwkYMranPmVRvlK'

  $('#FormularioDeEnvio').submit(function (ev) {
    ev.preventDefault();
    var contador = $("#NumeroDeregistro").val();
    var FechaIn = $("#FechaInicial").val();
    var FechaTer = $("#FechaTermino").val();

    let enl ="";
    if(FechaIn.length >= 1 && FechaTer.length >= 1 ){
        FechaIn = FechaIn;
         FechaTer = FechaTer;
      enl  =  endpoint + "?api_key=" + apiKey+"&start_date="+FechaIn+"&end_date="+FechaTer;
    }else if(contador.length == 0){
        contador = 1;
        enl  =  endpoint + "?api_key=" + apiKey+"&count="+ contador;
    }else{
        contador =  $("#NumeroDeregistro").val();
        enl  =  endpoint + "?api_key=" + apiKey+"&count="+ contador;
    }
    var display_results = $("#tabla");
    $.ajax({

        url: enl,
        contentType: "application/json",
        dataType: 'json',
        beforeSend: function () {
            display_results.html("<img src='https://worldwind.arc.nasa.gov/agrosphere/images/nasa.gif'width='100'  class='rounded mx-auto d-block' >");
        },
        success: function(data){
           
		    	display_results.empty();
		 	display_results.html("Cargando...");
             var results = ' <table class="table table-striped" id="tabla">';
			results += '<thead> <tr> <th scope="col">No</th> <th scope="col">Fecha</th><th scope="col">titulo</th><th scope="col">Explicacion</th><th scope="col"> Imagen </th>';
			results += '<th></th> </tr> </thead> <tbody>';

			if (data.length != 0)
				{
                    var num = 1
				$.each(data, function() {
                    if(contador.length == 0){
                        results += '<tr>';
  					results +='<td>' + num + '</td>';
  					results +='<td>' + this.date + '</td>';
  					results +='<td>' + this.title + '</td>';
  					results +='<td>' + this.explanation + '</td>';
  					results +='<td>';
  					results +='<img src="' + this.url + '" " width="100%">';
  					results +='</td>'; 
  					results +='</tr>';	
                    num++;
                    }
                   else{
                   if(num <= contador){
  					results += '<tr>';
                      results +='<td>' + num + '</td>';
  					results +='<td>' + this.date + '</td>';
  					results +='<td>' + this.title + '</td>';
  					results +='<td>' + this.explanation + '</td>';
  					results +='<td>';
  					results +='<img src="' + this.url + '" " width="100%">';
  					results +='</td>'; 
  					results +='</tr>';	
                      num++
                    }
                }
				});
				results += '</tbody></table>';
                display_results.empty();
				display_results.append(results);
	             		/* $("#buscar-fechas").hide();
	             		carga_datatable(); */
			} 
           
        }
    })
  });
});
</script>
            </div>
        </div>
        </div>
    </section>
  
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container px-4">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>
