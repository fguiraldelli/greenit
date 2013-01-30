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
    return false;
}


function validaNome(id,nome){
    
    var regex = /^[a-zA-Z- ]+$/;
    return verifica(id,nome,regex);

}


function validaEmpresa(id,nome){
    
    var regex = /^[a-zA-Z-0-9- ]+$/;
    return verifica(id,nome,regex);
}

function validaNomeProjeto(id,nome){
    
    var regex = /^[a-zA-Z-0-9- ]+$/;
    return verifica(id,nome,regex);
}

function validaDescProjeto(id,nome){
    
    var regex = /^[A-Za-zÀ-ú0-9 \-(),;.]+$/;
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

function mudaPagina(retorno, nome){
    //Verifica se foi selecionado alguma radio
    var flag = false;
    radio = document.getElementsByName(nome);
    for(var i=0; i < radio.length;i++){
        if(radio[i].checked){
            flag = true;
        }
    }
    if(flag == false){
        alert("Você deve selecionar alguma opção.");
        return false;
    }else{
        document.getElementById('vaiprafrente').value = retorno;
        document.getElementById("form2").action = "atualiza_pagina.php";
        document.getElementById("form2").submit();
        return false;
    }
}
function iniciaQuest(){
    if (!validaNomeProjeto("nome-proj",document.getElementById("nome-proj").value)) {
        alert("Preencha o nome do Projeto corretamente");
        return false;
    }
    if (!validaDescProjeto("descr-proj",document.getElementById("descr-proj").value)) {
        alert("Preencha a descrição do projeto corretamente");
        return false;
    }
    else{
        document.getElementById("form2").action = "novo_projeto.php";
        document.getElementById("form2").submit();
        return false; 
    }
}
function loadMatrix(projeto, nomeProjeto, tipo){
    //alert(projeto + nomeProjeto + tipo);
    document.getElementById('nome-proj').value = nomeProjeto;
    document.getElementById('projeto').value = projeto;
    document.getElementById('tipo').value = tipo;
    document.getElementById("form3").submit();
    return false;        
}

function finaliza(retorno, nome){
    var confirmaFim = confirm("Tem certeza que deseja finalizar?");
    if (confirmaFim == true){
        mudaPagina(retorno,nome);
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

function help(indx){
    helpArray = ['','oi', 'teste'];
    document.getElementById("ajuda").innerHTML = helpArray[indx];
}

// Nucleo AJAX
function ajax(){
    if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }else{// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            //document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
            teste=xmlhttp.responseText;
            //alert("Teste: " + teste);
            return teste;
        }
    }
    
}
/* AJAX par atualização dos comentarios da Matriz*/
function salvaComentario(idp, x, y, str){
    x = x + 1;
    y = y + 1;

    ajax();

    coment = document.getElementById(str).value;
    url = "idp=" + idp +
    "&idqn=" + x +
    "&idqs=" + y +
    "&comentario=" + coment;
    /*if (confirm('Você deseja salvar o comentário?')) {
        xmlhttp.open("POST","salva_comentario.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send(url);
        alert("Comentário salvo com sucesso!!!");
        return true;
    }else{
        
        
    }*/
    xmlhttp.open("POST","salva_comentario.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send(url);
    alert("Comentário salvo com sucesso!!!");
    return true;
}

function adicionaTec(tec){
    url = "tec=" + tec;
    ajax();
    xmlhttp.open("POST","adiciona_tec.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send(url);
    return false;
}

function addTec(idp){
    combo = document.getElementById("other");
    if (combo.value == "Outra..."){
        newTec = document.getElementById("nome-tec").value;
        adicionaTec(newTec);
    }else{
        newTec = combo;
    }
    lista = document.getElementById("lista_tecnologia").options;
    lista[lista.length] = new Option (newTec, lista.length, true, true);
    document.getElementById("nome-tec").value = "";
    
    //conf = document.getElementById("tec-conf").value;
    
    /* AJAX pra salvar no banco */
    salvaTec(idp, newTec, 1, "");
}

function remTec(){
    lista = document.getElementById("lista_tecnologia");
    lista.remove(lista.options.selectedIndex);
}

function hideText(){
    lista = document.getElementById("other");
    //outra = lista.options.length - 1;
    
    if (lista.options.selectedIndex == 0){
        document.getElementById("nome-tec").disabled = false;
    }
    else{
        document.getElementById("nome-tec").disabled = true;
        document.getElementById("nome-tec").value = "";
    }
}

// AJAX para salvar as tecnologias de um projeto
function salvaTec(idp, tec, conf, str){
    //alert(idp + tec + conf + str);

    url = "idp=" + idp +
    "&tec=" + tec +
    "&conf=" + conf +
    "&comentario=" + str;
    
    //alert(url);
    ajax();
    
    xmlhttp.open("POST","salva_tecnologia.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send(url);
    //alert("completei");
    return false;
}
