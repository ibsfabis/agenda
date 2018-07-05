<?php
    // Parametriza a conexão com o banco de dados
    $host     = "localhost";
    $user     = "root";
    $password = "root";
	$database = "agenda";
	
    // Faz a conexão com o servidor MySQL
    $con = mysqli_connect($host, $user, $password);

    // Verifica se ocorreu erro de conexão
    if (!$con) {
        // Se sim, então encerra o programa com uma mensagem de erro
        die("Erro de conexão com o servidor do BD");
    }

    // Determina qual banco de dados que será utilizado
    $db = mysqli_select_db($con, $database);

    // Verifica se ocorreu erro na seleção
    if (!$db) {
        // Se sim, então encerra o programa com uma mensagem de erro
        die("Erro ao selecionar o banco de dados.");
    }

    $id = $_GET["id"];

    $sql = "select * from tbl_contatos where id=$id";
    $result = mysqli_query($con, $sql);

    $row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<?php include_once('header.php'); ?>
</head>

<body class="back-contatos">
	<?php include_once('nav-dashboard.php'); ?>

	<div class="register-box">
		<div class="register-box-body">
			<div class="row" style="text-align: center">
				<span class="register-title">
					Alteração do Cadastro de Contatos
				</span>
			</div>
			<hr class="hr-separator">
			<div class="row" style="text-align: center">
				<p class="register-subtitle">Forneça os dados abaixo</p>
			</div>

			<!-- Formulário de cadastramento de contatos -->
			<form action="altera-contato.php" method="post" autocomplete="off">
                <input type="hidden" name="id" value="<?php echo $row[0]; ?>">
				<!-- nome do contato -->
				<div class="input-group">
					<span class="input-group-addon" id="input-user-name">
						<span class="fas fa-address-card"></span>
					</span>
					<input type="text" class="form-control" value="<?php echo $row[1]; ?>"
						name="nome" required placeholder="Nome do Contato"
						aria-describedby="input-nome">
				</div>
			<br>

			<!-- endereço do contato -->
			<form action="altera-contato.php" method="post" autocomplete="off">
                <input type="hidden" name="id" value="<?php echo $row[0]; ?>">
				<div class="input-group">
					<span class="input-group-addon" id="input-user-name">
						<span class="fas fa-building"></span>
					</span>
					<input type="text" class="form-control" value="<?php echo $row[2]; ?>"
						name="endereco" required placeholder="Endereço do Contato"
						aria-describedby="input-endereco">
				</div>
			<br>

			<!-- número do endereço -->
			<form action="altera-contato.php" method="post" autocomplete="off">
				<input type="hidden" name="id" value="<?php echo $row[0]; ?>">
				<div class="input-group">
					<span class="input-group-addon" id="input-user-name">
						<span class="fas fa-building"></span>
					</span>
					<input type="text" class="form-control" value="<?php echo $row[3]; ?>"
						name="nro_endereco" required placeholder="Número do Endereço"
						aria-describedby="input-nro_endereco">
				</div>
			<br>

			<!-- complemento do endereço -->
			<form action="altera-contato.php" method="post" autocomplete="off">
				<input type="hidden" name="id" value="<?php echo $row[0]; ?>">
				<div class="input-group">
					<span class="input-group-addon" id="input-user-name">
						<span class="fas fa-building"></span>
					</span>
					<input type="text" class="form-control" value="<?php echo $row[4]; ?>"
						name="complemento" required placeholder="Complemento do Endereço"
						aria-describedby="input-complemento">
				</div>
			<br>

			<!-- bairro -->
			<form action="altera-contato.php" method="post" autocomplete="off">
				<input type="hidden" name="id" value="<?php echo $row[0]; ?>">
				<div class="input-group">
					<span class="input-group-addon" id="input-user-name">
						<span class="fas fa-building"></span>
					</span>
					<input type="text" class="form-control" value="<?php echo $row[5]; ?>"
						name="bairro" required placeholder="Bairro"
						aria-describedby="input-bairro">
				</div>
			<br>
			
			<!-- cidade -->
			<form action="altera-contato.php" method="post" autocomplete="off">
                <input type="hidden" name="id" value="<?php echo $row[0]; ?>">
				<!-- nome da cidade_id -->
				<div class="input-group">
					<span class="input-group-addon" id="input-user-name">
						<span class="fas fa-building"></span>
					</span>
					<input type="text" class="form-control" value="<?php echo $row[6]; ?>"
						name="cidade_id" required placeholder="cidade"
						aria-describedby="input-cidade_id">
				</div>
				<br>

			<!-- CEP -->
			<form action="altera-contato.php" method="post" autocomplete="off">
				<input type="hidden" name="id" value="<?php echo $row[0]; ?>">
				<div class="input-group">
					<span class="input-group-addon" id="input-user-name">
						<span class="fas fa-building"></span>
					</span>
					<input type="text" class="form-control" value="<?php echo $row[7]; ?>"
						name="cep" required placeholder="CEP"
						aria-describedby="input-cep">
				</div>
			<br>

			<!-- Botão de envio -->
				<div class="row" style="margin-bottom:10px">
					<div class="col-xs-12">
						<button type="submit"
							class="btn btn-success btn-block btn-flat">
							Alterar <span class="fas fa-chevron-circle-right"></span>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>

<?php
	include_once('footer.php');
	include_once('js.php');
?>
</body>
</html>