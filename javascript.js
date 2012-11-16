/* 
 Aqui deve conter todos as funções javascript
 */
function verifica(id,string,regex){
    if(string != null && string != ""){
        if(regex.test(string)){
            document.getElementById(id).style.color = "green";
        }else{
            document.getElementById(id).style.color = "red";
        }
    }   

}

function validaNome(id,nome){
    
    var regex = /^[a-zA-Z- ]+$/;
    verifica(id,nome,regex);
}


function validaEmpresa(id,nome){
    
    var regex = /^[a-zA-Z-0-9- ]+$/;
    verifica(id,nome,regex);
}

function validaEmail(id,email){
    var regex  = /^[\w-]+(\.[\w-]+)*@(([\w-]{2,63}\.)+[A-Za-z]{2,6}|\[\d{1,3}(\.\d{1,3}){3}\])$/;
    verifica(id,email,regex);
}

function validaSenha(id,senha){
    var regex = /^.{7,10}$/;
    verifica(id,senha,regex);
}

function matchSenha(id,match){
    
    var senha = document.getElementById("senha").value;

    if (senha == match){
        document.getElementById(id).style.color = "green";
    }else{
        document.getElementById(id).style.color = "red";
    }
    
}

