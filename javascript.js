/* 
 Aqui deve conter todos as funções javascript
 */
function verifica(id,string,regex){
    if(string != null && string != ""){
        if(regex.test(string)){
            document.getElementById(id).style.color = "green";
            return true;
        }else{
            document.getElementById(id).style.color = "red";
            return false;
        }
    }   
}


function validaNome(id,nome){
    
    var regex = /^[a-zA-Z- ]+$/;
    return verifica(id,nome,regex);

}


function validaEmpresa(id,nome){
    
    var regex = /^[a-zA-Z-0-9- ]+$/;
    return verifica(id,nome,regex);
}

function validaEmail(id,email){
    var regex  = /^[\w-]+(\.[\w-]+)*@(([\w-]{2,63}\.)+[A-Za-z]{2,6}|\[\d{1,3}(\.\d{1,3}){3}\])$/;
    return verifica(id,email,regex);
}

function validaSenha(id,senha){
    var regex = /^.{7,10}$/;
    return verifica(id,senha,regex);
}

function matchSenha(id,match){
    
    var senha = document.getElementById("senha").value;

    if (senha == match){
        document.getElementById(id).style.color = "green";
        return true;
    }else{
        document.getElementById(id).style.color = "red";
        return false;
    }
    
}


function validaForm(){
    if (!validaNome("nome",document.getElementById("nome").value)) {
        alert("Preencha o nome corretamente");
        return false;
    }
    if (!validaEmpresa("empresa",document.getElementById("empresa").value)) {
        alert("Preencha o nome da empresa corretamente");
        return false;
    }


    if(!validaEmail("email", document.getElementById("email").value)){
        alert("Preencha o email corretamente");
        return false;
    }

    if(!validaSenha("senha", document.getElementById("senha").value)){
        alert("Preencha uma senha de 7 a 10 caracteres");
        return false;
    }

    if(!matchSenha("repsenha", document.getElementById("repsenha").value)){
        alert("Confira se as senhas combinam");
        return false;
    }


    return true;

}

function mudaPagina(retorno){
    document.getElementById('vaiprafrente').value = retorno;
    document.getElementById("form2").action = "atualiza_pagina.php";
    document.getElementById("form2").submit();
    return false;        
}
function iniciaQuest(){
    document.getElementById("form2").action = "novo_projeto.php";
    document.getElementById("form2").submit();
    return false; 
}
function loadMatrix(retorno, tipo){
    document.getElementById('nome-proj').value = retorno;
    document.getElementById('tipo').value = tipo;
    //document.getElementById("form3").action = "atualiza_matriz.php";
    document.getElementById("form3").submit();
    return false;        
}

function finaliza(retorno){
    var confirmaFim = confirm("Tem certeza que deseja finalizar?");
    if (confirmaFim == true){
        mudaPagina(retorno);
    }
}

function mostra(p){
    alert(p);
}

function hideDiv(id){
    document.getElementById(id).style.display = "none";
}

function showDiv(id){
    document.getElementById(id).style.display = "";
}
