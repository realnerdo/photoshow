<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Gallery</title>
    <link rel="stylesheet" href="{{ asset('css/master.css') }}">
  </head>
</html>
<body>
  <div id="easyphotowall"></div>
  <script type="text/javascript" src="{{ asset('js/magic.js') }}"></script>
  <script type="text/javascript">
    var gallery_name = {
        name: 'gallery_1455825681'        
    };
    
    var url = "{!! url('getGallery', $gallery->name) !!}";
    
    $.get(url, gallery_name, function(data){
        console.log(data);
        var photoshow = new Photowall({
                data: data.images
            });
        photoshow.play();
    });
  </script>
</body>