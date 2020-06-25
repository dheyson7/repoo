<?php
require_once 'class/usuarios.php';
$u = new Usuario;
?>

<!DOCTYPE html>
<html>
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


	
	
	<div class="header">
		<img class="avatar" src="Image/logo8.png">
		<img class="avatar2" src="Image/logo4.png" >

	</div>
	




	<div id="menu" >
		<ul>
			<li><a href="menu"><a href="lol.html"> League Of Legends </a></li>
			<li><a href="menu"><a href="valorant.html"> Valorant </a></li>	
		</ul>
	</div>
	<div class="logo">
		<section class="texto">
		<p>
			<div class="conteudo">
		
		</p>	
		</section>
	</div>
	<div id="form">

		

	<form method="POST" action="processa.php"> 
		<h1>Entrar</h1>
		<input type="email" placeholder="Usuario" name="email">
		<input type="password" placeholder="Senha" name="Senha">	
		<input type="submit" value="ACESSAR">
		<a href="cadastro.php"> Nao fez o cadastro?<strong>Cadastre-se!</strong></a>
	</form>
	</div>	

	
	
<?php
if(isset($_POST['email']))
{
	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['senha']);
	
	if(!empty($email) && !empty($senha))
	{
		$u->conectar("projeto_lol","localhost","root","");
		if($u->msgErro == "")
		{
			if($u->logar($email,$senha))
			{
				header("location: Lol.html");
			}
			else
			{
				echo "Email e/ou senha estão incorretos!";
			}
		}
		else
		{
			echo "Erro: ".$u->msgErro; 
		}
		}else
		{
			
			echo "Preencha todos os campos!";		
	}
}
?> 

</body>
</html>