<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap-reboot.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap-grid.css">

    <title>Escola Ajax</title>
</head>
<body>
  <div class="container-fluid">
    <h1>Escola Ajax  <button class="btn btn-success" data-toggle="modal" data-target="#inserirAluno">Novo Aluno</button></h1>




    <hr>
    <div id="pesquisa">
    <div class="input-group">
    

    <div class="input-group">        
             <input type="text" name="buscanome" id="buscanome" class="form-control" placeholder="Digite um nome">
             <div class="input-group-append" id="button-addon4">
                 <input type="button" name="btnPesquisa" id="btnPesquisa" value="buscar" class="btn btn-success btn-block">
             </div>
        </div>
    </div>


        <hr>

        <div id="dados"></div>
    </div><!-- fim div pesquisa -->
 </div>
</body>

<script src="node_modules/jquery/dist/jquery.js" ></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.js" ></script>
<script src="node_modules/jquery/dist/jquery.js"></script>
<script src="ajax.js"></script>

</html>



<!-- Modal -->
<div class="modal fade" id="inserirAluno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Inserir Aluno</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="form-group">
             <input type="text" class="form-control" placeholder="nome" name="inserenome" id="inserenome">
          </div>
          <div class="form-group">          
             <input type="text" class="form-control" placeholder="endereco" name="insereendereco" id="insereendereco">
          </div>
          <div class="form-group"> 
             <input type="text" class="form-control" placeholder="telefone" name="inseretelefone" id="inseretelefone">
          </div>
          <div class="form-group"> 
             <input type="text" class="form-control" placeholder="email" name="insereemail" id="insereemail">
          </div>
          <div id="resposta"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary" id="salvaraluno" onclick="insereAluno()">Salvar</button>
      </div>
    </div>
  </div>
</div>



