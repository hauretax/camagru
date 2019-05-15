<script>
var familytoad = ['t', 't', 't'];
function toad1(){
  if (familytoad[0] == 'toad1')
      familytoad.splice(0, 1, 't');
  else
    familytoad.splice(0, 1, 'toad1');
}
function toad2(){
  if (familytoad[1] === 'toad2')
      familytoad.splice(1, 1, 't');
  else
    familytoad.splice(1, 1, 'toad2');
}
function toad3(){
  if (familytoad[2] === 'toad2')
      familytoad.splice(2, 1, 't');
  else
    familytoad.splice(2, 1, 'toad2');
}

{
  function get_pictur(){
    var xhr = new XMLHttpRequest();

xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0) && xhr.responseText == "OK") {
        parent.removeChild(event.srcElement || event.target);
      }
    };
xhr.open('POST', '../php/get_picture.php', true);
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  var newName = document.getElementById("canvas").toDataURL();
xhr.send('image=' + newName);

  }
}

</script>

<video id="video"></video>
<button id="startbutton">Prendre une photo</button>
<canvas id="canvas"></canvas>

<div id = 'familytoad'>
<img id = 'toad1' onclick="toad1();"src = '../Pictures/toad1.png' height = '50px'>
<img id = 'toad2' onclick="toad2();"src = '../Pictures/toad2.png' height = '50px'>
<img id = 'toad3' onclick="toad3();"src = '../Pictures/toad3.png' height = '50px'>

</div>

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
  canvas_sav = canvas;
}

startbutton.addEventListener('click', function(ev){
    takepicture();
  ev.preventDefault();
  get_pictur();
}, false);

})();

</script>