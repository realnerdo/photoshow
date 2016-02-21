<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="{{ asset('css/master.css') }}">
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="{{ asset('favicon/apple-touch-icon-57x57.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('favicon/apple-touch-icon-114x114.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('favicon/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('favicon/apple-touch-icon-144x144.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="{{ asset('favicon/apple-touch-icon-60x60.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="{{ asset('favicon/apple-touch-icon-120x120.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="{{ asset('favicon/apple-touch-icon-76x76.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="{{ asset('favicon/apple-touch-icon-152x152.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon/favicon-196x196.png') }}" sizes="196x196">
    <link rel="icon" type="image/png" href="{{ asset('favicon/favicon-96x96.png') }}" sizes="96x96">
    <link rel="icon" type="image/png" href="{{ asset('favicon/favicon-32x32.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('favicon/favicon-16x16.png') }}" sizes="16x16">
    <link rel="icon" type="image/png" href="{{ asset('favicon/favicon-128.png') }}" sizes="128x128">
    <meta name="application-name" content="Photowall">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="msapplication-TileImage" content="{{ asset('mstile-144x144.png') }}">
    <meta name="msapplication-square70x70logo" content="{{ asset('mstile-70x70.png') }}">
    <meta name="msapplication-square150x150logo" content="{{ asset('mstile-150x150.png') }}">
    <meta name="msapplication-wide310x150logo" content="{{ asset('mstile-310x150.png') }}">
    <meta name="msapplication-square310x310logo" content="{{ asset('mstile-310x310.png') }}">
  </head>
</html>
<body>
  <div class="wrapper welcome">
    <div class="logo"><img src="{{ asset('svg/logo.svg') }}" alt="easyphotowall" class="img"></div>
    <h1 class="title">Easy Photowall</h1>
    <div class="description">
      <p>Create cool animated slideshows</p>
      <p>Share them with a link</p>
      <p>Just pick some images from your dropbox</p>
    </div>
    <button id="dropbox-chooser" class="btn blue"><span class="typcn typcn-dropbox"></span> Choose images</button>
    <footer class="footer">
      <p>This is an experiment using my plugin <a href="https://github.com/realnerdo/easyphotowall" target="_blank">easyphotowall</a></p>
      <p>Design and code made with <span class="love">❤</span> by <a href="http://realnerdo.com/" target="_blank">Asael Jaimes</a></p>
    </footer>
    <div id="loader">
      <div class="loading">
        <div class="caption">
          <p>Loading your images</p>
          <p>You'll be redirected to your slideshow once it's ready</p>
          <p>Patience is bitter, but its fruit is sweet</p>
        </div>
        <div class="loader-inner line-scale-pulse-out"></div>
      </div>
    </div>
    <div id="easyphotowall"></div>
  </div>
  <script id="dropboxjs" type="text/javascript" src="https://www.dropbox.com/static/api/2/dropins.js" data-app-key="np8l75lg4xtobr8"></script>
  <script type="text/javascript" src="{{ asset('js/magic.js') }}"></script>
  <script type="text/javascript">
    var az = 'https://s3-us-west-2.amazonaws.com/easyphotowall/uploads/gallery_1456051465/';
    
    var images = [
        az + '1456051469.jpeg',
        az + '1456051472.jpeg',
        az + '1456051475.jpeg',
        az + '1456051477.jpeg',
        az + '1456051479.jpeg',
        az + '1456051481.jpeg',
        az + '1456051483.jpeg',
        az + '1456051485.jpeg',
        az + '1456051488.jpeg',
        az + '1456051489.jpeg'
    ];
    
    var photoshow = new Photowall({
        data: images
    });
    photoshow.play();
  </script>
</body>