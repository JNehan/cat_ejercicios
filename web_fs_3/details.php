<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 3: CRUD PHP Details</title>

        <link rel="stylesheet" href="/web_fs_3/assets/css/style.css">
        <link rel="stylesheet" href="/web_fs_3/assets/css/fontawesome-5-all.css">
        <link rel="stylesheet" href="/web_fs_3/assets/css/icon-font.css">

        <?php 

            include_once __DIR__."/config/config.php"; 
            include_once __DIR__."/server/getBooking.php"; 
            $Destinos = [
                "ISL" => "ISLA MUJERES",
                "COZ" => "COZUMEL",
                "HOL" => "HOLBOX",
            ]
        ?> 

    </head>
    <body class="<?=($item->schedule=="20:00:00"?"theme-dark":"")?>">
       
        <main>
            
            <section>
                <div class="container">
                        <div class="box section100" id="FormReservation">

                            <div class="item-1 " ></div>
                            <div class="item-4 item-glass mb-30 p60x16" >
                                <h1 class="title">Detalles de la Reserva.</h1> 
                                
                                <p class="resume">Nombre: <?=$item->name?> </p>
                                <p class="resume">Email: <?=$item->email?></p>
                                <p class="resume">Telefono:  <?=$item->phone?></p>
                                <p class="resume">Saliendo de Cancun.</p>
                                <p class="resume">Destino: <?=(isset( $Destinos[$item->destination] )?$Destinos[$item->destination]: "")?></p>
                                <p class="resume">Horario: <?=date("h:i A", strtotime("".$item->schedule))?></p>
                                <p class="resume">Servicio: <?=( $item->service_type == "PRIV"?"Privado":"De Lujo")?></p>

                                <p class="total-title">Precio: <span><?="$ $item->total USD"?></span> </p>

                                <a href="/web_fs_3" class="btn--secondary my-auto mt-2em " id="Step2BtnReturn" >Ir a inicio.</a>
                            </div>
                            <div class="item-1 " ></div>

                        </div>
                    </div>
            </section>
        </main>

        <script src="/web_fs_3/assets/js/main.js"></script>
        
    </body>
</html>