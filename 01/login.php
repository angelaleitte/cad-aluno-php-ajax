<?php
session_start();
require 'conexao.php';
if(isset($_POST['titular']) && empty($_POST['titular']) == false ){
    $titular = $_POST['titular'];
    $senha = $_POST['senha'];
    
    $sql = "SELECT * from contas WHERE titular='$titular' AND senha='$senha'";
    $sql = $pdo->query($sql);
 
    if($sql->rowCount() > 0){
        $dado = $sql->fetch();
        $_SESSION['banco'] = $dado['id'];
        header("location: http://angelaleite.com/01 - Aulas/php/aula-34/index.php");
    }
}
?>

<form method="POST">
   <input type="text" name="titular"><br><br>
   <input type="text" name="senha"><br><br>
   <input type="submit" value="enviar">
</form>

