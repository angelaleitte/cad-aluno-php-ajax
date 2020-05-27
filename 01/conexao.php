<?php
  //session_start();  
  $db = "mysql:dbname=u728442474_aulas;host=localhost";
  $user = "u728442474_aula";
  $pass = "PoA-w08dWUD*";
      try{
          $pdo = new PDO($db, $user, $pass);
          //$conn = $pdo;
          //echo "Login ok";
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);        
      }catch(PDOException $e){
          echo "Erro: ".$e->getMessage();
      }
?>