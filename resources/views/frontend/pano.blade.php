<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>


html, body {
  width: 100%;
  height: 100%;
  margin: 0;
}


</style>


<script src="//cdnjs.cloudflare.com/ajax/libs/three.js/105/three.js"></script>
<script src="//cdn.jsdelivr.net/npm/panolens@0.11.0/build/panolens.min.js"></script>
</head>
<body>
<script>
      var panorama, viewer;
  
      var panoImg = "{{url('img/pano.jpg')}}";
  
      panorama = new PANOLENS.ImagePanorama(panoImg);

      viewer = new PANOLENS.Viewer({});

      viewer.add(panorama);

    </script>
</body>
</html>