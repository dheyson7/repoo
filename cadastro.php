<?php
require_once 'class/usuarios.php';
$u = new Usuario;
?>
<html lang="pt-br">
<head>
	<title>League Skins</title>
	<meta charset="utf-8">
	<style>
		*{
			margin: 0px;
			padding: 0px;
		}
		body{
			
			color: white;
		}
		input{
			display: block;
			height: 55px;
			width: 400px;
			margin: 10px;
			border-radius: 20px;
			border:1px solid black;
			font-size: 16pt;
			padding: 10px 20px;
			background-color: rgba(255,255,255,0.1);
			color: white;
			outline: none;
		}
		form{
			/*background-color: red;*/
			width: 420px;
			margin: 150px auto 0px auto;
		}
		form h1{
			text-align: center;
			padding: 20px;
		}
		input[type=submit]{
			background-color: black;
			border:none;
			cursor: pointer;
		}
		#menu{


		}
		#menu ul{
			margin:0;
			background-color: #5f6368;

		}
		#menu ul li{
			display: inline;
			list-style: none;
			

		}
		#menu ul li a{
			padding: 10px 15px;
			display:inline-block;
			color: #fff;
			text-decoration: none;
		}
		.logo{

    		
			
		}
		.avatar{
			position: absolute;
			top: -2px;
			left: 40px;
			width: 45px;
			height: 45px;
		}
		.avatar2{
			position: absolute;
			top: 7px;
			left: 225px;
			width: 35px;
			height: 25px;

		}
		.text{
			color: white;
			left: 400px;
		}
		.text-decoration{
			color: white;
		}
		.texto{
			width: 950px;
			margin:auto;
		}
		.button{
			width: 200px;
		}
		
	</style>
</head>
<body background="Image/back.png">


	<div id="form">

	
	<form method="POST" > 
		<h1>Cadastrar</h1>
		<input type="text" name="Nome" placeholder="Nome Completo" maxlength="30">
		<input type="text" name="Telefone" placeholder="Telefone" maxlength="30">
		<input type="email" name="Email" placeholder="Usuario" maxlength="40">
		<input type="password" name="Senha" placeholder="Senha" maxlength="15">	
		<input type="password" name="ConfSenha" placeholder="Confirmar senha" maxlength="15">
		<input type="submit" name="Cadastrar" value="Cadastrar">
		<a href="cadastro.php">Nao fez o cadastro?<strong>Cadastre-se!</strong></a>
	</form>
	</div>	
<?php
//verificar se clicou no botao
if(isset($_POST['nome']))
{
	$nome = addslashes($_POST['nome']);
	$telefone = addslashes($_POST['telefone']);
	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['senha']);
	$confirmarSenha = addslashes($_POST['confSenha']);
	//verificar se esta preenchido
	if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
	{
		$u->conectar("tela_login","localhost","root","");
		if($u->msgErro == "")//se esta tudo ok
		{
			if($senha == $confirmarSenha)
			{
				if($u->cadastrar($nome,$telefone,$email,$senha))
				{
					?>
					<div id="msg-sucesso">
					Cadastrado com sucesso! Acesse para entrar!
					</div>
					<?php
				}
				else
				{
					?>
					<div class="msg-erro">
						Email ja cadastrado!
					</div>
					<?php
				}
			}
			else
			{
				?>
				<div class="msg-erro">
					Senha e confirmar senha não correspondem
				</div>
				<?php
			}
		}
		else
		{
			?>
			<div class="msg-erro">
				<?php echo "Erro: ".$u->msgErro;?>
			</div>
			<?php
		}
	}else
	{
		?>
		<div class="msg-erro">
			Preencha todos os campos!
		</div>
		<?php
	}
}


?>
</body>
</html>