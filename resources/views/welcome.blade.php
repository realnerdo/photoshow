<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="{{ asset('css/master.css') }}">
  </head>
</html>
<body>
  <div class="wrapper welcome">
    <h1 class="title">Easy Photowall</h1>
    <div class="description">
      <p>Crea presentaciones de imágenes fácilmente</p>
      <p>Compártelas con quien quieras con un link</p>
      <p>Sólo selecciona algunas fotos de tu dropbox</p>
    </div>
    <button id="dropbox-chooser" class="btn blue">Escoger fotos</button>
    <div id="loader">
      <div class="loading">
        <div class="caption">
          <p>Cargando tus imágenes</p>
          <p>Por favor, espera</p>
        </div>
        <div class="loader-inner line-scale-pulse-out"></div>
      </div>
    </div>
  </div>
  <script id="dropboxjs" type="text/javascript" src="https://www.dropbox.com/static/api/2/dropins.js" data-app-key="np8l75lg4xtobr8"></script>
  <script type="text/javascript" src="{{ asset('js/magic.js') }}"></script>
</body>