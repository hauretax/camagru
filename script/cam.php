<video id="video"></video>
<button id="startbutton">Prendre une photo</button>
<canvas id="canvas"></canvas>
<button id="save">save la photo</button>
<?php// echo base64_encode(file_get_contents('../icon/W.png') );?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$("#save").click(function()  {
  $.ajax({
     type: "POST",
     url: '../php/get_picture.php',
     dataType: 'text',
     data:  {
    image : document.getElementById("canvas").toDataURL()
    }
  });
});
</script>
<script>
(function() {

var streaming = false,
    video        = document.querySelector('#video'),
    cover        = document.querySelector('#cover'),
    canvas       = document.querySelector('#canvas'),
    photo        = document.querySelector('#photo'),
    startbutton  = document.querySelector('#startbutton'),
    width = 320,
    height = 0;

navigator.getMedia = ( navigator.getUserMedia ||
                       navigator.webkitGetUserMedia ||
                       navigator.mozGetUserMedia ||
                       navigator.msGetUserMedia);

navigator.getMedia(
  {
    video: true,
    audio: false
  },
  function(stream) {
      var vendorURL = window.URL || window.webkitURL;
      video.srcObject = stream;
    video.play();
  },
  function(err) {
    console.log("An error occured! " + err);
  }
);

video.addEventListener('canplay', function(ev){
  if (!streaming) {
    height = video.videoHeight / (video.videoWidth/width);
    video.setAttribute('width', width);
    video.setAttribute('height', height);
    canvas.setAttribute('width', width);
    canvas.setAttribute('height', height);
    streaming = true;
  }
}, false);

function takepicture() {
  canvas.width = width;
  canvas.height = height;
  canvas.getContext('2d').drawImage(video, 0, 0, width, height);
}

startbutton.addEventListener('click', function(ev){
    takepicture();
  ev.preventDefault();
}, false);

})();
</script>