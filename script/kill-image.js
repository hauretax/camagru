function kill(id){
    console.log(id);
    if(confirm ("voulez vous suprimer cette photo ??????????")){
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../get-this/del-pictur.php', true)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        var P = id.getAttribute('src');
        xhr.send('P=' + P);
      }
     
}