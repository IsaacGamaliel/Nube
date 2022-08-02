@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Preguntas frecuentes</title>

    </head>

    <body>

        <div class="container">
            <div class="row">
                <div class="container-faq">
                    <div class="title-faq">
                        <h3>Preguntas Frecuentes</h3>
                    </div>

                    <div class="item-faq">
                        <div class="question">
                            <h3>¿Qué es iNube? <span>Q</span></h3>
                            <div class="more"><i>+</i></div>
                        </div>
                        <div class="answer">
                            <p>iNube es una aplicación web de almacenamiento en la nube, donde podrás guardar muchos de tus
                                archivos importantes para poder tener un respaldo de ellos y poder usarlos en cualquier
                                momento y en cualquier dispositivo.<span>A</span></p>
                        </div>
                    </div>

                    <div class="item-faq">
                        <div class="question">
                            <h3>¿Cuánto almacenamineto tengo si no cotizo algún plan? <span>Q</span></h3>
                            <div class="more"><i>+</i></div>
                        </div>
                        <div class="answer">
                            <p>Solo contarías con 20 gb para uso libre.<span>A</span></p>
                        </div>
                    </div>

                    <div class="item-faq">
                        <div class="question">
                            <h3>¿Cómo puedo cancelar mi plan?<span>Q</span></h3>
                            <div class="more"><i>+</i></div>
                        </div>
                        <div class="answer">
                            <p>Te vas en la sección de subscripciones, ahí hay un boton que dice "Cancelar suscripción" cuando
                                presiones el botón en automático se cancelará tu suscripción.<span>A</span></p>
                        </div>
                    </div>

                    <div class="item-faq">
                        <div class="question">
                            <h3>¿Qué tipo de formatos son válidos para documentos? <span>Q</span></h3>
                            <div class="more"><i>+</i></div>
                        </div>
                        <div class="answer">
                            <p>doc, docx, pdf, xlsx, odt, DOC, DOCX, PDF, XLSX, ODT, CSV.<span>A</span></p>
                        </div>
                    </div>

                    <div class="item-faq">
                        <div class="question">
                            <h3>¿Qué tipo de formatos son válidos para imágenes? <span>Q</span></h3>
                            <div class="more"><i>+</i></div>
                        </div>
                        <div class="answer">
                            <p>jpg, png, jpeg, gif, PNG, JPEG, GIF, JPG <span>A</span></p>
                        </div>
                    </div>

                    <div class="item-faq">
                        <div class="question">
                            <h3>¿Qué tipo de formatos son válidos para audio?<span>Q</span></h3>
                            <div class="more"><i>+</i></div>
                        </div>
                        <div class="answer">
                            <p>mp3, mpga, wma, ogg, MP3, MPGA, WNA, OGG<span>A</span></p>
                        </div>
                    </div>
                    <div class="item-faq">
                        <div class="question">
                            <h3>¿Qué tipo de formatos son válidos para video?<span>Q</span></h3>
                            <div class="more"><i>+</i></div>
                        </div>
                        <div class="answer">
                            <p>mp4, avi, MP4, AVI, MPEG<span>A</span></p>
                        </div>
                    </div>

                    <div class="item-faq">
                        <div class="question">
                            <h3>¿Puede haber planes para estudiantes?<span>Q</span></h3>
                            <div class="more"><i>+</i></div>
                        </div>
                        <div class="answer">
                            <p>Si, su puede haber planes para estudiantes para que sea más accesible para todo
                                público<span>A</span></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <style>
            * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

.container {
    width: 90%;
    margin: 100px auto;
}

.container-faq {
    box-shadow: 0 0 15px -1px rgba(0,0,0,.1);
    padding: 30px;
}

.container-faq .title-faq {
    text-align: center;
    font-size: 2rem;
    margin-bottom: 30px;
}

.container-faq .item-faq {
    box-shadow: 0 0 15px -1px rgba(0,0,0,.2);
    margin-bottom: 20px;
    border-radius: 10px;
}

.container-faq .item-faq .question {
    position: relative;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: rgba(43, 51, 122, .2);
    padding: 20px 20px 20px 80px;
    transition: .4s;
}

.container-faq .item-faq .question .more {
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 0 15px -1px rgba(0,0,0,.2);
    width: 40px;
    height: 40px;
    font-size: 1rem;
    cursor: pointer;
    transition: .4s;
}

.container-faq .item-faq .question .more:hover {
    box-shadow: 0 0 15px -1px rgba(0,0,0,.4);
}

.container-faq .item-faq .question span {
    position: absolute;
    left: 10px;
    font-size: 3rem;
    top: 10px;
    opacity: .1;
}

.container-faq .item-faq .answer {
    position: relative;
    padding: 0 20px 0 80px;
    overflow: hidden;
    height: 0;
    transition: .4s;
}

.container-faq .item-faq .answer p {
    font-size: 1.3rem;
}

.container-faq .item-faq .answer span {
    position: absolute;
    left: 10px;
    font-size: 3rem;
    top: -10px;
    opacity: .2;
}
        </style>
        <script>
            let question = document.querySelectorAll('.question');
            let btnDropdown = document.querySelectorAll('.question .more')
            let answer = document.querySelectorAll('.answer');
            let parrafo = document.querySelectorAll('.answer p');

            for (let i = 0; i < btnDropdown.length; i++) {

                let altoParrafo = parrafo[i].clientHeight;
                let switchc = 0;

                btnDropdown[i].addEventListener('click', () => {

                    if (switchc == 0) {

                        answer[i].style.height = `${altoParrafo}px`;
                        question[i].style.marginBottom = '10px';
                        btnDropdown[i].innerHTML = '<i>-</i>';
                        switchc++;

                    } else if (switchc == 1) {

                        answer[i].style.height = `0`;
                        question[i].style.marginBottom = '0';
                        btnDropdown[i].innerHTML = '<i>+</i>';
                        switchc--;

                    }

                })

            }
        </script>
    </body>

    </html>
@endsection
