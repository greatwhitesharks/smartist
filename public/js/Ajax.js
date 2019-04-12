var ids = Array();
var n=0;
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function(){
 if (xhttp.readyState == XMLHttpRequest.DONE && xhttp.status == 200){
    var data = JSON.parse(xhttp.responseText);
    var ul = document.getElementById('message-list');
    for (obj of data){
        // TODO : Improve Browser compattibility 
        if (!ids.includes(obj.id)){
            ids.push(obj.id)
            n++;
        ul.innerHTML+= `<li  class="list-group-item d-flex   click " onclick="right(${n})"><a class=" profile-pic " href="#" ></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${obj.senderId}<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${obj.sub}</li><li class="hide list-group-item  ${n}">${obj.msg}</li><br>`;
    }
}
 }
}


setInterval(function(){
xhttp.open("GET","http://localhost/smartist/public/Inbox/run",true);
xhttp.send();
},1000);
