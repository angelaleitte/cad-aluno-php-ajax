<?php
//conexão ao bd
$servidor = 'localhost';
$usuario= 'u728442474_angelaleite';
$senha = 'nAg0Hk3An';
$base = 'u728442474_aulasajax';

$conexao = new mysqli($servidor, $usuario, $senha, $base) or die("falha na conexão");

// Check connection
  //if ($conexao -> connect_errno) {
   //   echo "Failed to connect to MySQL: " . $conexao -> connect_error;
    //  exit();
  //}else{
  //    echo "ok";
 // }


  if(isset($_GET['buscanome'])){
      

        $nome = $_GET['buscanome'];

        if(empty($nome)){
           $query = "SELECT * from alunos";        
        }else{
            $query = "SELECT * FROM alunos WHERE nome LIKE '%$nome%'";
        }

        $sql = $conexao->query($query);

        $contagem = $sql->num_rows;
         
        //sleep(5);
        if($contagem > 0){

        echo "<table class='table table-hover table-striped'>";
           echo "<thead>";
              echo "<tr>";
                 echo "<th>ID</th>";
                 echo "<th>NOME</th>";
                 echo "<th>EMAIL</th>";
                 echo "<th>TELEFONE</th>";
                 echo "<th>ENDEREÇO</th>";
                 echo "<th>DELETAR</th>";
              echo "<tr>";
           echo "</thead>";
           echo "<tbody>";

        while($linha = $sql->fetch_array()){
           
            echo "<tr>";
               echo "<td>".$linha['id']."</td>";
               echo "<td>".$linha['nome']."</td>";
               echo "<td>".$linha['email']."</td>";
               echo "<td>".$linha['telefone']."</td>";
               echo "<td>".$linha['endereco']."</td>";
               echo '<td><a href="#" onclick="deletaUsuario('.$linha['id'].');">Deletar</a></td>';
            echo "<tr>";
            
        }
        echo "</tbody></table>";

    }else{
        echo "Nenhum registro encontrado!";
    }
}elseif(
    isset($_GET['nome']) and
    isset($_GET['telefone']) and 
    isset($_GET['endereco']) and 
    isset($_GET['email'])){
     $nome = $_GET['nome'];
     $telefone = $_GET['telefone'];
     $endereco = $_GET['endereco'];
     $email = $_GET['email'];

     $query = "INSERT INTO alunos(nome, telefone, endereco, email) VALUES('$nome', '$telefone', '$endereco', '$email')";
     sleep(1);
     $sql = $conexao->query($query);
        echo "<span class='btn btn-success'>Inserido com sucesso</span>";
}elseif(isset($_GET['deleta'])){
    $id = $_GET['deleta'];
    $query = "DELETE FROM alunos WHERE id = '$id'";
    sleep(1);
    $sql = $conexao->query($query);
       echo "<span class='btn btn-success'>Deletado com sucesso</span>";
       //echo $query;

}else{
        echo "<span class='btn btn-danger'>Ocorreu um erro. Por favor, preencha todos os campos</span>";
}

?>