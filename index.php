<?php
//session_start();
  require_once 'classes/usuarios.php';
  $u = new Usuario;
  ini_set("error_log", "C:/xampp/htdocs/login-php/erros_log.php");
  error_log( "POST: " . print_r($_POST, true) );
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet"  href="css/estilo.css">
	<link rel="shortcut icon" href="imagens/favicon.ico.png"/>
	<title>Logar</title>
</head>
<body>

    <video autoplay muted loop id="myVideo">
      <source src="entrada/583335751.mp4" type="video/mp4">
      <param name="allowFullScreen" value="true">
      Your browser does not support HTML5 video.
    </video>

<div id="corpo-form">
	<h1>Entrar ;)</h1>
	<form method="POST">
		<input type="email" placeholder="</ E-mail >" name='email'>
		<input type="password" placeholder="</ Senha >" name='senha'>
		<input type="submit" value="ACESSAR ;)" class="entrar">
		<a href="cadastrar.php">Ainda não é inscrito? <strong>Cadastre-se</strong></a>
	</form>
</div>
	<?php
	if(isset($_POST['email']))
	{
		$email = addslashes($_POST['email']);
		$senha = $_POST['senha'];
		//verificando se todos os campos nao estao vazios
		if(!empty($email) && !empty($senha))
		{
			$u->conectar("login_php","localhost","root",""); //conectando ao banco
			if($u->msgErro=="") // caso a mensagem esteja vazia, login ok
			{
				$logar = $u->logar($email, $senha);
				if ($logar)
				{
										?>
					<div class="msg_erro">
						foi
						<?php echo "logar", $logar, "-", $email, " || ", $senha ?>
					</div>
					<?php
					header("location:cs/template.php"); //encaminhado para proxima area apos verificar usuario e senha
				}
				else
				{
					?>
					<div class="msg_erro">
						Email e/ou senha estão incorretos!
						<?php echo "logar", $logar, "-", $email, " || ", $senha ?>
					</div>
					<?php
				}
			}
			else
			{
				?>
				<div class="msg_erro">
					<?php echo "Erro: ".$u->msgErro; ?>
				</div>
				<?php
			}
		}
		else
		{
      ?>
			<div class="msg_erro">
				Preencha todos os campos!
			</div>
			<?php
		}
	}
	?>

 </body>
</html>
