<?php 
include('includes/header.php'); 
include('db/database.php');

$sql = "SELECT * FROM alojamientos";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/stylees.css">
    <!-- remix icon -->
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
    rel="stylesheet"/>
    <title>Alojamientos Kodigo</title>
</head>
<body>

    <!-- seccion de main -->
    <section id="hero" class="min-vh-100 d-flex align-items-center text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-uppercase text-white fw-semibold display-1">Bienvenido Kodigo Hotel</h1>
                    <h5 class="text-white mt-3 mb-4">Dando el Mejor Espacio para Descansar</h5>
                    <div>
                    
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- nosotros -->
     <section id="about" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <h1 class="display-4 fw-semibold">Sobre Nosotros</h1>
                        <div class="line"></div>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Blanditiis, corrupti.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between aling-items-center">
                <div class="col-lg-6">
                    <img src="https://img.freepik.com/free-photo/businesspeople-meeting-office-working_23-2148908922.jpg">
                </div>
                <div class="col-lg-5">
                    <h1>Nuestro Compromiso</h1>
                    <p class="mt-3 mb-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid perferendis tempora inventore, doloribus maiores, animi, quidem sunt non blanditiis vel accusantium.</p>
                    <div class="d-flex pt-4 mb-3">
                        <div class="iconbox me-4">
                        <i class="ri-team-line"></i>
                        </div>
                        <div>
                            <h5>Mision</h5>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium ratione voluptas</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="iconbox me-4">
                        <i class="ri-glasses-line"></i>
                        </div>
                        <div>
                            <h5>Vision</h5>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium ratione voluptas</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="iconbox me-4">
                        <i class="ri-bubble-chart-fill"></i>
                        </div>
                        <div>
                            <h5>Valores</h5>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium ratione voluptas</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </section>
     


     <!-- seccion de alojamientos -->
      <section id="alojamientos" class="section-padding border-top">
            <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <h1 class="display-4 fw-semibold">Alojamientos Disponibles</h1>
                        <div class="line"></div>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                    </div>
                </div>
            </div>
            <div class="row g-4 text-center">
    <?php while ($row = $result->fetch_assoc()) { ?>
        <div class="col-lg-4 col-sm-6">
            <div class="service theme-shadow p-lg-5 p-4">
                <div class="iconbox">
                    <i class="ri-stack-fill"></i>
                </div>
                <div class="alojamiento">
                    <h3 class="mt-4 mb-3"><?= $row['nombre'] ?></h3>
                    <p><?= $row['descripcion'] ?></p>
                    <a href="login.php">Ver Más</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
    </div>
      </section>


      <!-- seccion de contactos -->
       <section class="section-padding" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <h1 class="display-4 text-white fw-semibold">Contactanos</h1>
                        <div class="line bg-white"></div>
                        <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, illo.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class ="col-lg-8">
                    <!-- formulario de contactos -->
                    <form action="#" class="row g-3 p-lg-5 p-4 bg-white theme-shadow">
                        <div class="form-group col-lg-6">
                            <input type="text" placeholder="Ingrese su Nombre" class="form-control">
                        </div>
                        <div class="form-group col-lg-6">
                            <input type="text" placeholder="Ingrese su Apellido" class="form-control">
                        </div>
                        <div class="form-group col-lg-12">
                            <input type="email" placeholder="Ingrese su Correo" class="form-control">
                        </div>
                        <div class="form-group col-lg-12">
                            <textarea name="message" rows="5" class="form-control" placeholder="Ingrese su Mensaje"></textarea>
                        </div>
                        <div class="form-group col-lg-12 d-grid">
                            <button class="btn btn-brand">Enviar Mensaje</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
       </section>

    </body>
</html>


<!-- seccion de footer -->
<?php include('includes/footer.php'); ?>
