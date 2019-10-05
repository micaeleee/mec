<?php
   $host = "localhost";
   $user = "root";
   $pass = "";
   $banco = "cadastro";
   $conexao = @mysql_connect($host, $user, $pass) or die(@mysql_error());
   @mysql_select_db($banco) or die(@mysql_error());
?>
<html>
     <header>

        <title>Auteticando o usuario</title>
        <script type="text/javascript">
          function loginsuccessfully()
          {
              setTimeout("window.location='painel.php", 5000);

          }
          function loginfailed()
          {
              setTimeout("window.location='login.php", 5000);
          }
        </script>


     </header> 

<body>   

<?php
    $email=$_POST['email'];
    $senha=$_POST['senha'];
    $sql = @mysql_query("SELECT * FROM usuarios WHERE email = '$email' and senha= '$senha'") or die(@mysql_error());
    $row = @mysql_num_rows($sql);
    if($row > 0)
    {
        session_start();
        $_SESSION['email']=$_POST['email'];
        $_SESSION['senha']=$_POST['senha'];
        echo "<center>Você foi autentivado com sucesso na mecânica!Aguarde...</center>";
        echo "<script>loginsuccessfully()</script>";
    }
    else
    {
        echo "<center>Nome ou senha inválidos,aguarde um instante para tentar novamente</center>"
        echo "<script>loginfailed()</script>";
    }
?>
</body>   

</html>
