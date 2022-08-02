@extends('layouts.app')

@section('content')
    <main role="main">
        <section class="jumbotron bg-secure text-center mb-0 d-flex flex-row justify-content-center align-items-center">
            <div class="row pt-5 bg-secure">
                <div class="col-sm-12">
                    <h5 class="title-home">Seguridad</h5>
                    <div class="container"><img class="img-fluid shadow" width="60%"
                            src="{{ asset('img/features/secure/bg.jpg') }}">
                    </div>
                </div>
            </div>
        </section>

        <div class="container">
            <div class="d-flex flex-row justify-content-center align-items-center">
                <div class="mt-5">
                    <div class="row">

                        <div class="col-sm-12 text-center">
                            <h5 class="title-home">Estamos comprometidos con la seguridad de nuestros usuarios</h5>
                        </div>


                        <div style="margin-top: 100px;"></div>

                        <div class="col-sm-12 col-md-6 text-center my-auto">
                            <img class="img-fluid" src="{{ asset('img/features/secure/key.jpg') }}">
                        </div>


                        <div class="col-sm-12 col-md-6 text-center">
                            <h5 class="title-home">Privacidad, autonomía y seguridad</h5>
                            <p class="pt-4 subtitle-home">Cada usuario registrado en nuestra plataforma tendrá acceso
                                solamente a sus archivos. Con esto garantizamos que solamente tú puedes ver tus archivos.
                            </p>
                            <p>En caso de que nuestro sistema reporte actividad sospechosa en tu cuenta deberemos intervenir
                                para garantizar que <b>¡Nube</b> sea un espacio seguro para todos nuestros usuarios.</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mt-5 pt-5 mb-5">
                <div class="col-sm-12 col-md-6 text-center my-auto">
                    <h5 class="title-home">Todo lo que necesitas en el mismo lugar</h5>
                    <p class="pt-4 subtitle-home">Nuestro diseño minimalista te permite encontrar todo fácilmente a tan sólo
                        un clic. Interactúa con todos los elementos visuales con nuestra interfaz amigable.<b></b></p>
                </div>

                <div class="col-sm-12 col-md-6 text-center my-auto">
                    <img class="img-fluid" src="{{ asset('img/admin.jpeg') }}">
                </div>
            </div>

            <div class="col-sm-12 text-center">
                <button class="btn btn-primary" data-toggle="modal" data-target="#aviso">Aviso de privacidad</button>
            </div>

            <br>
            <div class="col-sm-12 text-center">
                <div class="modal fade" id="aviso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Normateca Digital</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center">
                                    <div class="container">
                                        <div class="row ewk_cont_sec_3 text-justify">

                                            <h2><b>AVISO DE PRIVACIDAD</b></h2>
                                            <p>Almacenaminetos iNube S.A mejor conocido como iNube, con domicilio en
                                                Perla 106, La joya, San Felipe, Guanajuato, México y portal de internet
                                                www.iNube.com, es el responsable del uso y protección de sus datos
                                                personales, y al respecto le informamos lo siguiente: </p>
                                            <h3><b>¿Para qué fines utilizaremos sus datos personales?</b></h3>
                                            <p>Los datos personales que recabamos de usted, los utilizaremos para las
                                                siguientes finalidades que son necesarias para el servicio que solicita:
                                                Respuesta a mensajes del formulario de contacto, Prestación de cualquier
                                                servicio solicitado</p>
                                            <h3><b>¿Qué datos personales utilizaremos para estos fines?</b></h3>
                                            <p>Para llevar a cabo las finalidades descritas en el presente aviso de
                                                privacidad,
                                                utilizaremos los siguientes datos personales:
                                                Datos de identificación y contacto, Datos académicos</p>
                                            <h3><b>¿Cómo puede acceder, rectificar o cancelar sus datos personales, u
                                                    oponerse a su uso o ejercer la revocación de consentimiento?</b></h3>
                                            <p>Usted tiene derecho a conocer qué datos personales tenemos de usted, para
                                                qué los utilizamos y las condiciones del uso que les damos (Acceso).
                                                Asimismo, es su derecho solicitar la corrección de su información personal
                                                en
                                                caso de que esté desactualizada, sea inexacta o incompleta (Rectificación);
                                                que la eliminemos de nuestros registros o bases de datos cuando considere
                                                que la misma no está siendo utilizada adecuadamente (Cancelación); así
                                                como oponerse al uso de sus datos personales para fines específicos
                                                (Oposición). Estos derechos se conocen como derechos ARCO.
                                                Para el ejercicio de cualquiera de los derechos ARCO, debe enviar una
                                                petición vía correo electrónico a rojashernandezmiguel237@gmail.com y
                                                deberá contener:
                                                <br>
                                                • Nombre completo del titular. <br>
                                                • Domicilio. <br>
                                                • Teléfono<br>
                                                • Correo electrónico usado en este sitio web.<br>
                                                • Copia de una identificación oficial adjunta.<br>
                                                • Asunto «Derechos ARCO»<br>
                                                Descripción el objeto del escrito, los cuales pueden ser de manera
                                                enunciativa más no limitativa los siguientes: Revocación del consentimiento
                                                para tratar sus datos personales; y/o Notificación del uso indebido del
                                                tratamiento de sus datos personales; y/o Ejercitar sus Derechos ARCO, con
                                                una descripción clara y precisa de los datos a Acceder, Rectificar, Cancelar
                                                o bien, Oponerse. En caso de Rectificación de datos personales, deberá
                                                indicar la modificación exacta y anexar la documentación soporte; es
                                                importante en caso de revocación del consentimiento, que tenga en cuenta que
                                                no en todos los casos podremos atender su solicitud o concluir el uso de
                                                forma inmediata, ya que es posible que por alguna obligación legal
                                                requiramos seguir tratando sus datos personales. Asimismo, usted deberá
                                                considerar que para ciertos fines, la revocación de su consentimiento
                                                implicará que no le podamos seguir prestando el servicio que nos solicitó, o
                                                la conclusión de su relación con nosotros.
                                                <br>
                                                ¿En cuántos días le daremos respuesta a su solicitud? <br>
                                                5 días <br>
                                                ¿Por qué medio le comunicaremos la respuesta a su solicitud? <br>
                                                Al mismo correo electrónico de donde se envío la petición.<br>
                                            </p>
                                            <h3><b>El uso de tecnologías de rastreo en nuestro portal de internet</b></h3>
                                            <p>Le informamos que en nuestra página de internet utilizamos cookies, web
                                                beacons u otras tecnologías, a través de las cuales es posible monitorear su
                                                comportamiento como usuario de internet, así como brindarle un mejor
                                                servicio y experiencia al navegar en nuestra página. Los datos personales
                                                que obtenemos de estas tecnologías de rastreo son los siguientes: <br>
                                                Identificadores, nombre de usuario y contraseñas de sesión, Tipo de
                                                navegador del usuario, Fecha y hora del inicio y final de una sesión de un
                                                usuario <br>
                                                Estas cookies, web beacons y otras tecnologías pueden ser deshabilitadas.
                                                Para conocer cómo hacerlo, consulte el menú de ayuda de su navegador. Tenga
                                                en cuenta que, en caso de desactivar las cookies, es posible que no pueda
                                                acceder a ciertas funciones personalizadas en nuestros sitio web.
                                            </p>
                                            <h3><b>¿Cómo puede conocer los cambios en este aviso de privacidad?</b></h3>
                                            <p>El presente aviso de privacidad puede sufrir modificaciones, cambios o
                                                actualizaciones derivadas de nuevos requerimientos legales; de nuestras
                                                propias necesidades por los productos o servicios que ofrecemos; de
                                                nuestras prácticas de privacidad; de cambios en nuestro modelo de negocio,
                                                o por otras causas. Nos comprometemos a mantener actualizado este aviso
                                                de privacidad sobre los cambios que pueda sufrir y siempre podrá consultar
                                                las actualizaciones que existan en el sitio web www.iNube.com.
                                                <br>
                                                Última actualización de este aviso de privacidad: 30/06/202
                                                <hr>
                                            </p>
                                        </div>


                                    </div>


                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--Modal-->
            </div>
        </div>
    </main>
@endsection
