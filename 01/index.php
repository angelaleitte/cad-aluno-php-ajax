<?php
session_start();
require 'conexao.php';
if(isset($_SESSION['banco']) && empty($_SESSION['banco']) == false ){
   $dadinho = $_SESSION['banco'];

  

      $sql = "Select * from contas where id='$dadinho'";
      $sql = $pdo->query($sql);   

      if($sql->rowCount() > 0){
         $dado = $sql->fetch();     
         echo "id: ".$dado['id']."<br>";
         echo "Titular: ".$dado['titular']."<br>";
         echo "Conta: ".$dado['conta']."<br>";
         echo "Saldo: ".$dado['saldo']."<br><br>";    
      }

     
   $depositar = 0;
   if(isset($_POST['valor']) && empty($_POST['valor'])==false){
       $depositar = $_POST['valor'];
       $data = date('d-m-Y');
      
       //$sql="INSERT INTO historico id_conta='$dadinho' valor='$depositar' data_operacao='$data' where id='$dadinho'";

       $sqla="INSERT INTO historico(id_conta, valor, tipo, data_operacao) VALUES('$dadinho','$depositar', '0','$data')";
       $sqla = $pdo->query($sqla);

       $sqlb="UPDATE contas SET saldo = saldo + $depositar where id ='$dadinho'";
       $sqlb = $pdo->query($sqlb);
   }

}else{
    header("location: login.php");
}
?>

<hr>
<h3>Depósitos<h3><br><br>
<hr>
<table border=1>
   <tr>
      <th>Data</th>
      <th>Depósito</th>
   </tr>
   
   <?php 
         $sqli = "Select * from historico where id_conta='$dadinho'";
         $sqli = $pdo->query($sqli);
         if($sqli->rowCount() > 0){
            foreach($sqli->fetchAll() as $hist){
   
   ?><tr>
      <td><?php echo $hist['data_operacao'] ?></td>
      <td><?php echo $hist['valor'] ?></td> </tr>
   <?php }     
   }
  ?>
  
</table>


<hr>
<h3>Depositar<h3>
<hr>
<form method="POST">
   <input type="text" name="valor">
   <input type="submit" value="Depositar">
</form>

<hr>
<a href="sair.php">Sair</a>
