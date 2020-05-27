var btPesquisa = document.querySelector('#btnPesquisa');
var tcEnter = document.querySelector('#buscanome');

function buscaDados(){
    
        var nome = document.querySelector("#buscanome").value;
        //lert(nome);
        var result = document.querySelector("#dados");
        
        var ajax = new XMLHttpRequest();
        result.innerHTML = "<img src='img/loading.gif' width='100px'";
        
        
        ajax.open("GET", "processa.php?buscanome=" + nome, true);
        //estado 4 que verifica se a conexão foi feita com sucesso
        // status 200 que veririfica o sucesso do retorno dos dados
        ajax.onreadystatechange = function(){
            if(ajax.readyState == 4){
                 if(ajax.status == 200){
                    result.innerHTML = ajax.responseText;
                 }else{
                     result.innerHTML = "Houve um erro na conexão ajax" + ajax.statusText;
                 }
            }

        };
        ajax.send(null); 
         
    return buscaDados;
    
}

btPesquisa.addEventListener('click', function(){   
    buscaDados();   
}); 

tcEnter.addEventListener('keydown', function(e){
        if (e.keyCode == 13) {
          e.preventDefault();
          //return enviar(this.value);
          buscaDados();
        }
});

buscaDados();





function insereAluno(){
     var nome = document.querySelector('#inserenome').value;
     var endereco = document.querySelector('#insereendereco').value;
     var telefone = document.querySelector('#inseretelefone').value;
     var email = document.querySelector('#insereemail').value;
     var resposta = document.querySelector('#resposta');

     var ajax = new XMLHttpRequest();
     resposta.innerHTML = "<img src='img/loading.gif' width='100px'";
     
         ajax.open("GET", "processa.php?nome="+nome+"&endereco="+endereco+"&telefone="+telefone+"&email="+email, true);
         ajax.onreadystatechange = function(){
            if(ajax.readyState == 4){
                 if(ajax.status == 200){
                    resposta.innerHTML = ajax.responseText;
                 }else{
                    resposta.innerHTML = "Houve um erro na conexão ajax" + ajax.statusText;
                 }
            }
        };
        ajax.send(null);
      
}


function deletaUsuario(id){
    var result = document.querySelector("#dados");
    var ajax = new XMLHttpRequest();
     resposta.innerHTML = "<img src='img/loading.gif' width='100px'";
     
         ajax.open("GET", "processa.php?deleta="+id, true);
         ajax.onreadystatechange = function(){
            if(ajax.readyState == 4){
                 if(ajax.status == 200){
                    result.innerHTML = ajax.responseText;
                 }else{
                    result.innerHTML = "Houve um erro na conexão ajax" + ajax.statusText;
                 }
            }
        };
        ajax.send(null);

}