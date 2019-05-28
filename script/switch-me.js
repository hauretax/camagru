function swi(id){
    console.log(id)
    var pictur = id.getAttribute('src');
    if (pictur === '../image/y1.png')
      id.setAttribute("src","../image/y2.png");
    else
      id.setAttribute("src","../image/y1.png");
      var xhr = new XMLHttpRequest();
  
      xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0) && xhr.responseText == "OK") {
          parent.removeChild(event.srcElement || event.target);
        }
      };
      xhr.open('POST', '../get-this/get-switch.php', true)
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      var pictur = id.getAttribute('id');
      xhr.send('pictur=' + pictur);
  }