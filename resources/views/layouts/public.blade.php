<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Twenty One Pilots: Concurso #BusTopMilan</title>
<meta property="og:url" content="http://www.bustopmilan.com" />
<meta property="og:title" content="Twenty One Pilots: Concurso #BusTopMilan" />
<meta name="description" content="¿quieres ver a twenty one pilots en directo? compra ahora ‘blurryface’ y podrás formar parte del #bustopmilan" />
<meta property="og:image" content="http://www.bustopmilan.com/assets/images/html/og-image.jpg" />
<meta property="og:type" content="website" />

@if ($image)
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="He participado en el concurso #BusTOPMilan para ganar viaje + entrada para ver a @twentyonepilots!">
  <meta name="twitter:image" content="http://www.bustopmilan.com/{{ $image }}">
  <meta name="twitter:domain" content="http://www.bustopmilan.com">
@endif

<link type="text/plain" rel="author" href="{{ url('/assets/humans.txt') }}" />

<link href="{{ url('/assets/public/css/styles.min.css') }}" rel="stylesheet">
<link href="{{ url('/assets/public/third-party/bootstrap-fileinput/css/fileinput.min.css') }}" media="all" rel="stylesheet" type="text/css" />


<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Begin Cookie Consent plugin by Silktide - http://silktide.com/cookieconsent -->
<script type="text/javascript">
    window.cookieconsent_options = {"message":"Utilizamos cookies propias y de terceros para mejorar nuestros servicios  y mostrarle publicidad relacionada con sus preferencias mediante el  análisis de sus hábitos de navegación. Si continúa navegando,  consideramos que acepta su uso.","dismiss":"Acepto","learnMore":"Leer más","link":"http://warnermusic.es/politica-de-privacidad/","theme":"dark-top"};
</script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.9/cookieconsent.min.js"></script>
<!-- End Cookie Consent plugin -->

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','//connect.facebook.net/en_US/fbevents.js');

fbq('init', '837944149591094');
fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=837944149591094&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->


</head>
<body>

  @yield('content')

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{ url('/assets/public/js/scripts.js') }}"></script>
<script src="{{ url('/assets/public/third-party/bootstrap-fileinput/js/fileinput.min.js') }}" type="text/javascript"></script>
<script src="{{ url('/assets/public/third-party/bootstrap-fileinput/locale/es.js') }}" type="text/javascript"></script>

@if ($image)
  <script>
  $(function() {

    $( '#participa' ).ScrollTo({
        duration: 1000
      });

  });
  </script>
@endif

  <!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Bases legales del concurso</h4>
      </div>
      <div class="modal-body">
        Lorem ipsum...
      </div>
    </div>
  </div>
</div>

</body>
</html>