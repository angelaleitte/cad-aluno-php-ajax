<?php
  if(isset($_GET['buscanome'])){
      //conexão ao bd
      $servidor = 'localhost';
      $usuario= 'u728442474_angelaleite';
      $senha = 'nAg0Hk3An';
      $base = 'u728442474_aulasajax';

      //$conexao = new mysqli($servidor, $usuario, $senha, $base) or die ("falha na conexão");

        try
        {
            $PDO = new PDO( 'mysql:host=' . $servidor . ';dbname=' . $base, $usuario, $senha);
            //echo "ok"; 
        }
        catch (PDOException $e)
        {
            echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
        }

        $nome = $_GET['buscanome'];

        if(empty($nome)){
           $sql = "SELECT * FROM ALUNOS";        
        }else{
            $sql = "SELECT * FROM ALUNOS WHERE NOME LIKE '$nome\%'";
        }

        $sql = "SELECT * FROM ALUNOS"; 

        $result = $PDO->query($sql);
        $rows = $result->fetchAll();
        print_r( $rows ); 
        
        
        if($sql->rowCount() > 0){
            $dado = $sql->fetch();     
            echo "id: ".$dado['id']."<br>";
            echo "Nome: ".$dado['nome']."<br>";
            echo "E-mail: ".$dado['email']."<br>";
            echo "Telefone: ".$dado['telefone']."<br><br>"; 
            echo "Endereço: ".$dado['endereco']."<br><br>";     
         }



}

?>