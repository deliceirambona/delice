function formvalidate() {
    let form=document.myform;
    let fn=form.id.value.trim();
    let pass=form.pd.value.trim();
    let er=document.getElementById('error1');
    let er2=document.getElementById('error2');
     let letters=/^[A-Za-z]+$/;
    if(fn==""){
        er.innerHTML="required";
        er.style.color="red";
        form.id.focus();
        return false;
    }
    if(!fn.match(letters)){
        er.innerHTML="only charcters allowed";
        er.style.color="red";
        form.un.focus();
        return false;
    
    }else{
        er.innerHTML="&#x2714";
        er.style.color="green";
        }
    
        if(pass==""){
            er2.innerHTML="required";
            er2.style.color="red";
            form.pd.focus();
            return false;
        
        }
    
    else{
        er2.innerHTML="&#x2714";
        er2.style.color="green";
    
    }
    }