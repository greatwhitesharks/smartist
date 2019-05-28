
function dropDown(n){
    document.getElementsByClassName(n.toString())[0].classList.toggle('hide');
}


    var formdet={
     id:document.getElementById("id"),
     subject:document.getElementById("subject"),
     message:document.getElementById("message"),
     submit:document.getElementById("btn-submit"),
     form:document.getElementById("formdet"),
};
  formdet.submit.addEventListener('click',()=>{ 
    var Formdetails={
        Id:formdet.id.value,
        Subject:formdet.subject.value,  
        Message:formdet.message.value,
    }
        FD=JSON.stringify(Formdetails);
    var xhttps=new XMLHttpRequest();
    xhttps.open("POST","http://localhost/smartist/public/inbox/sendMessage");
    
         xhttps.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhttps.setRequestHeader("Content-Type","application/json");
        xhttps.send(FD);
        formdet.id.value='';
    formdet.message.value='';
    formdet.subject.value='';
        
            
    });
    


  