function heart(id){
  console.log(id)
  var pictur = id.getAttribute('src');
  if (pictur === '../image/red.png')
    id.setAttribute("src","../image/coeur.svg");
  else
    id.setAttribute("src","../image/red.png");
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0) && xhr.responseText == "OK") {
        parent.removeChild(event.srcElement || event.target);
      }
    };
    xhr.open('POST', '../get-this/get-like.php', true)
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var pictur = id.getAttribute('id');
    xhr.send('pictur=' + pictur);
}