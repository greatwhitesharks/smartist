var ids = Array();
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function(){
 if (xhttp.readyState == XMLHttpRequest.DONE && xhttp.status == 200){
    var data = JSON.parse(xhttp.responseText);
    var ul = document.getElementById('message-list');
    for (obj of data){
        // TODO : Improve Browser compattibility 
        if (!ids.includes(obj.id)){
            ids.push(obj.id)
        ul.innerHTML= `<ul class="icon${obj.id}" ><li  class="list-group-item d-flex   click " ><a class=" profile-pic " href="#" ></a>&nbsp;&nbsp;&nbsp;${obj.senderId}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-trash-o"onclick="deleteMessage(${obj.id})" style="font-size:24px"></i></li><li onclick="dropDown(${obj.id})" class="list-group-item d-flex   click ">${obj.sub}</li></li><li class="hide list-group-item ${obj.id}">${obj.msg}</li><br></ul>`+ ul.innerHTML;
    }
}
 }
}


setInterval(function(){
xhttp.open("GET","http://localhost/smartist/public/Inbox/run",true);
xhttp.send();
},1000);
