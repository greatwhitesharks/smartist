var ids = Array();
var observerArray = Array();
var xhttp = new XMLHttpRequest();
var n = 0;
xhttp.onreadystatechange = function () {
    if (xhttp.readyState == XMLHttpRequest.DONE && xhttp.status == 200) {
        var observers = JSON.parse(xhttp.responseText);
        var observerList = document.getElementById('observerList');
        for (observer of observers) {
            if (!ids.includes(observer.id)) {
                // TODO : Improve Browser compattibility 
                ids.push(observer.id);
                observerArray.push(observer);
                observerList.innerHTML = `<li  onclick="selectFollower(${n})" class="list-group-item list-group-item-primary"><img src=${observer.photo} width="30" height="30">&nbsp;&nbsp;&nbsp${observer.displayName}</li>` + observerList.innerHTML;
                n++;
            }
        }
    }
}


setInterval(function () {
    xhttp.open("GET", "http://localhost/smartist/public/Chatbox/getObservers", true);
    xhttp.send();
}, 2500);

function selectFollower(n) {
    document.getElementsByClassName('right')[0].classList.add('display');
    var followerbox = document.getElementById('followerbox');
    var observer = observerArray[n];
    followerbox.innerHTML = `<span class='list-group-item list-group-item-primary bg-light'><img src=${observer.photo} width="30" height="30">&nbsp;&nbsp;&nbsp;${observer.displayName}</span>`;
    readMessage(observer.id);
}

function readMessage(observer_id) {
    var ids = Array();
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == XMLHttpRequest.DONE && xhttp.status == 200) {
            var data = JSON.parse(xhttp.responseText);
            var chat = document.getElementById('chat');
            for (obj of data) {
                // TODO : Improve Browser compattibility 
                if (!ids.includes(obj.id)) {
                    ids.push(obj.id)
                    chat.innerHTML = `${obj.senderId}`+chat.innerHTML;
                    //`<ul class="icon${obj.id}" ><li  class="list-group-item d-flex   click " ><a class=" profile-pic " href="#" ></a>&nbsp;&nbsp;&nbsp;${obj.senderId}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-trash-o"onclick="deleteMessage(${obj.id})" style="font-size:24px"></i></li><li onclick="dropDown(${obj.id})" class="list-group-item d-flex   click ">${obj.sub}</li></li><li class="hide list-group-item ${obj.id}">${obj.msg}</li><br></ul>`+ ul.innerHTML;
                }
            }
        }
    }


    setInterval(function () {
        xhttp.open("GET", `http://localhost/smartist/public/chatbox/read/${observer_id}`, true);
        xhttp.send();
    }, 1000);

}
