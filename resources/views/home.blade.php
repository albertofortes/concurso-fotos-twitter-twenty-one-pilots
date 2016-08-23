@extends('layouts.public')

@section('content')

<header class="header" id="top">

    <div class="container">

      <div class="row">

        <div class="col-md-10 col-md-offset-1">

          <h1 class="logo"><img src="assets/public/images/html/header-logo.png" alt="Twenty One Pilots"></h1>

          <h2 class="claim">
            ¿QUIERES VER A TWENTY ONE PILOTS EN DIRECTO? <small>COMPRA AHORA ‘BLURRYFACE’ Y PODRÁS FORMAR PARTE DEL <span class="hashtag">#BusTOPMilan</span></small>
          </h2>

          <a href="#" class="goto" target="concurso">Ir a concurso</a>

          <div class="cover">
            <img src="assets/public/images/html/cover.jpg" alt="Portada álbum Twenty One Pilots: Blurryface">
          </div>

          <div class="btns">
              <a href="#" target="blank">
                <img src="assets/public/images/html/btn-fnac.png" alt="Comprar en FNAC" />
              </a>
              <a href="#" target="blank" alt="Comprar en El Corte Inglés">
                <img src="assets/public/images/html/btn-eci.png" alt="Comprar en El Corte Inglés" />
            </a>
          </div>

        </div>

      </div><!--row-->

    </div><!--container-->

  </header>

  <div class="content" id="concurso">

    <div class="container">

      <div class="row">

        <div class="col-md-12">

          <h3 class="tit">PARTICIPA Y PODRÁS GANAR UN VIAJE PARA 2 PERSONAS EN EL BUS <strong>¡SOLO PARA FANS!</strong> <small>INCLUYE: <u>2 BILLETES DE IDA Y VUELTA MÁS 2 TICKETS</u> PARA EL SHOW EN <u>MILÁN</u> EL 7 DE NOVIEMBRE</small></h3>

          <div class="instructions">
            <h4 class="h">Es muy fácil sólo tienes que:</h4>
            <ol>
              <li>
                <span class="number">1</span> Rellenar todos los campos del formulario
              </li>
              <li>
                <span class="number">2</span> Subir una foto en la que salgas con el CD <strong>¡GANARÁN LAS 25 MÁS SORPRENDENTES!</strong>
              </li>
              <li>
                <span class="number">3</span> Subir un ticket de compra posterior al 15 de septiembre de 2016
              </li>
              <li>
                <span class="number">4</span> <u>Publicar en Twitter</u>
              </li>
            </ol>
            <h5 class="h">EL 24 DE OCTUBRE PUBLICAREMOS LOS 25 GANADORES (MÁS 1 ACOMPAÑANTE) QUE PODRÁN VIVIR LA EXPERIENCIA <span class="blink">#BusTOPMilan!</span></h5>
          </div>

        </div>

      </div><!--row-->

      <div class="row" id="participa">

        <div class="col-md-12">

          <div class="form">

            <!-- if there are creation errors, they will show here -->
            @if (count($errors) > 0)
              <div class="alert alert-danger">
                {{ Html::ul($errors->all()) }}
              </div>
            @endif

            <!-- will be used to show any messages -->
            @if (Session::has('message'))
              <div class="alert alert-info">
                <p>{{ Session::get('message') }}</p>
                <p><strong>Para terminar haz click en el siguiente botón y asegúrate de que está incluída la foto con la que concursas:</strong></p>
                <div style="margin-top: 10px;"> <a class="twitter-share-button"
  href="https://twitter.com/intent/tweet">Tweet</a></div>
              </div>
            @endif

            @if ($image)

              <script>window.twttr = (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0],
                  t = window.twttr || {};
                if (d.getElementById(id)) return t;
                js = d.createElement(s);
                js.id = id;
                js.src = "https://platform.twitter.com/widgets.js";
                fjs.parentNode.insertBefore(js, fjs);

                t._e = [];
                t.ready = function(f) {
                  t._e.push(f);
                };

                return t;
              }(document, "script", "twitter-wjs"));</script>

            @else

              {{ Form::open(array('url' => '/', 'files' => 'true')) }}

                <div class="form-group">
                  {{ Form::label('name', 'Nombre') }}
                  {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                  {{ Form::label('surname', 'Apellidos') }}
                  {{ Form::text('surname', Input::old('surname'), array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                  {{ Form::label('email', 'Email') }}
                  {{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                  {{ Form::label('phone', 'Teléfono') }}
                  {{ Form::text('phone', Input::old('phone'), array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                  {{ Form::label('twitter_user', 'Usuario de twitter (Sin el @)') }}
                  {{ Form::text('twitter_user', Input::old('twitter_user'), array('class' => 'form-control')) }}
                </div>

                <br />

                <div class="form-group file">
                  <label class="control-label" for="contest_image">Sube una foto con el CD para entrar en el concurso</label>
                  <input type="file" id="contest_image" name="contest_image" class="file" data-show-preview="false">
                </div>

                <div class="form-group file">
                  <label class="control-label" for="contest_image">Sube el ticket de compra</label>
                  <input type="file" id="ticket_image" name="ticket_image" class="file" data-show-preview="false">
                </div>

                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="accept"> Acepto las <a href="#" data-toggle="modal" data-target="#formModal">bases del concurso</a>
                  </label>
                </div>

                <p>
                  {{ Form::submit('Enviar', array('class' => 'btn btn-lg btn-default')) }}
                </p>

              {{ Form::close() }}

            @endif

          </div>

        </div>

      </div><!--row-->

    </div><!--container-->

  </div><!--content-->

  <div class="video-wrapper">

    <div class="container">

      <div class="row">

        <div class="col-md-10 col-md-offset-1">

          <div class="video">
            <iframe width="950" height="534" src="https://www.youtube.com/embed/VBcVLe_vgiE?showinfo=0" frameborder="0" allowfullscreen></iframe>
          </div>

        </div>

      </div><!--row-->

    </div><!--container-->

  </div>

  <footer class="footer">

    <div class="container">

      <div class="row">
        <div class="col-md-12">
          <a href="#" class="goto" target="top"></a>
          <p>&copy; 2016 <a href="http://www.warnermusic.es/" target="blanck">Warner Music Spain S.L.</a> <a class="enlaces" target="_blank" href="http://www.warnerbrosrecords.com/privacy-policy">Política de Privacidad</a> <a class="enlaces" target="_blank" href="http://www.warnermusic.es/datos/politica/warner/avisolegal.pdf">Aviso Legal</a> <a class="enlaces" target="_blank" href="http://www.warnermusic.es/datos/politica/warner/Hojasdereclamaciones.pdf">Hoja de Reclamaciones</a></p>
        </div>
      </div><!--row-->

    </div><!--container-->

  </footer>

@endsection
