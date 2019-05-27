
var x = new XMLHttpRequest();
   
 function deleteMessage(n){
    
    inf={
        idDel:n,
    }
    
        var c=confirm("Do you want to delete message?");
        if(c==true){
        document.getElementsByClassName("icon"+(n.toString()))[0].classList.toggle('deleted');
         
   x.open("POST","http://localhost/smartist/public/Inbox/delete");
   x.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
   x.setRequestHeader("Content-Type", "application/json");
   x.send(JSON.stringify(inf));
   x.onreadystatechange = function(){
    if (xhttp.readyState == XMLHttpRequest.DONE && xhttp.status == 200){
        alert('Message was succesfully deleted');
   }
    };
       
        }
   
    }