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
                <div class="col-lg-10">
                    <h2>🌮 ONLY DATA Hackademy, Culiacan | Ontologies and Interactive Network Visualizations no lo se Hola a todos Que ondini</h2>


                    <p class="lead">El portal de la NASA proporciona 42,946 conjuntos de datos y 555 repositorios de códigos, así como enlaces a sitios de inovación abierta, documentos científicos, códigos y datos de numerosas agencias federales de EE. UU. La mayoría de los archivos se encuentran en JSON, se requiere una correcta organización por medio del catálogo de metadatos pública (data.nasa.gov).

                        Creando una busqueda y organizacion optimizada para el usuario, con esto logrando una manera más rápida y precisa, describiendo por medio de una ontología la representación de la red por medio de nodos. </p>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Fecha</th>
                                <th scope="col">titulo</th>
                                <th scope="col">Explicacion</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $data['date']; ?></td>
                                <td><?php echo $data['title']; ?></td>
                                <td><?php echo $data['explanation']; ?></td>
                            </tr>

                        </tbody>
                    </table>

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
