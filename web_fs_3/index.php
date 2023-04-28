<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 3: CRUD PHP</title>

        <link rel="stylesheet" href="/web_fs_3/assets/css/style.css">
        <link rel="stylesheet" href="/web_fs_3/assets/css/fontawesome-5-all.css">
        <link rel="stylesheet" href="/web_fs_3/assets/css/icon-font.css">

       

    </head>
    <body>
        <?php include_once "./config/config.php"; ?> 
        <main>
            
            <section>
                <div class="container">
                        <form class="box section100" id="FormReservation">

                            <div class="item-6 item-glass mb-30 p60x16" id="Step1">
                                
                                <div class="box" >
                                  
                                    <div class="item-6">
                                        <h2 class="title">Paso 1: Información de Servicio.</h2>
                                    </div>
                                    <input type="hidden" value="CAN">
                                    <div class="item-2 px-15 mt-1em d-inherit">
                                        <label for="">Destino</label>
                                        <select id="ServiceDestination" name="ServiceDestination">
                                            <option value="">Seleccionar destino</option>
                                            <option value="ISL" <?=($FastTest?'selected':'')?>>ISLA MUJERES</option>
                                            <option value="COZ">COZUMEL</option>
                                            <option value="HOL">HOLBOX</option>
                                        </select>
                                    </div>
                                    <div class="item-2 px-15 mt-1em d-inherit">
                                        <label for="">Servicio</label>
                                        <select id="ServiceType" name="ServiceType">
                                            <option value="">Seleccionar tipo de servicio</option>
                                            <option value="PRIV" <?=($FastTest?'selected':'')?>>PRIVADO</option>
                                            <option value="LUJO">DE LUJO</option>
                                        </select>
                                    </div>
                                    <div class="item-2 px-15 mt-1em d-inherit" >
                                        <label for="">Horarios</label>
                                        <select id="ServiceSchedule" name="ServiceSchedule">
                                            <option value="">Seleccionar horario</option>
                                            <option value="09:00" <?=($FastTest?'selected':'')?>>09:00 AM</option>
                                            <option value="16:00">04:00 PM</option>
                                            <option value="20:00">08:00 PM</option>
                                        </select>
                                    </div>

                                    <div class="item-6 tc mt-1_5em" >
                                        <h4 class="total-title">Precio: <span>-</span> </h4>
                                    </div>

                                    <div class="item-6 tc mt-1_5em" >
                                        <a href="#" class="btn--primary my-auto" id="Step1Btn" >CONTINUAR</a>
                                    </div>
                                </div>
                            </div>

                            <div class="item-6 item-glass mb-30 p60x16 hidden"  id="Step2" >
                               
                                <div class="box">

                                    <div class="item-6">
                                        <h2 class="title">Paso 2: Información de contacto.</h2>
                                    </div>
                                    <div class="item-2 px-15 mt-1em d-inherit" >
                                        <label for="">Nombre</label>
                                        <input type="text" name="InName" id="InName" value="<?=($FastTest?'Jonathan Naal':'')?>" >
                                    </div>
                                    <div class="item-2 px-15 mt-1em d-inherit" >
                                        <label for="">Email</label>
                                        <input type="email" name="InEmail" id="InEmail" value="<?=($FastTest?'jonathan_test@mail.com':'')?>" >
                                    </div>
                                    <div class="item-2 px-15 mt-1em d-inherit" >
                                        <label for="">Telefono</label>
                                        <input type="tel" name="InPhone" minlength="9" maxlength="14" id="InPhone" value="<?=($FastTest?'9981999999':'')?>" >
                                    </div>
                                    <div class="item-6 tc mt-1_5em" >
                                        <p class="resume-step2">Destino: <span class="resumen-destination"></span></p>
                                        <p class="resume-step2">Servicio: <span class="resumen-service"></span></p>
                                        <p class="resume-step2">Horario: <span class="resumen-schedule"></span></p>
                                        <h4 class="total-title">Total: <span>-</span> </h4>
                                    </div>
                                    <div class="item-6 tc mt-1_5em" >
                                        <a href="#" class="btn--secondary my-auto " id="Step2BtnReturn" >REGRESAR</a>
                                        <a href="#" class="btn--yellow my-auto" id="Step2Btn" >RESERVAR</a>
                                    </div>
                                </div>
                                
                            </div>

                        </form>
                    </div>
            </section>
        </main>

        <script src="/web_fs_3/assets/js/main.js"></script>
        
    </body>
</html>