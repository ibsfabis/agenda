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
					Cadastro de Contatos
				</span>
			</div>
			<hr class="hr-separator">
			<div class="row" style="text-align: center">
				<p class="register-subtitle">Forneça os dados abaixo</p>
			</div>

			<!-- Formulário de cadastramento de contatos -->
			<form action="grava-contato.php" method="post" autocomplete="off">
				<!-- nome do contato -->
				<div class="input-group">
					<span class="input-group-addon" id="input-user-name">
						<span class="fas fa-user"></span>
					</span>
					<input type="text" class="form-control"
						name="nome" required placeholder="Nome do Contato"
						aria-describedby="input-nome">
				</div>
				<br>

				<!-- endereço do contato -->
			    <div class="input-group">
					<span class="input-group-addon" id="input-user-name">
						<span class="fas fa-home"></span>
					</span>
					<input type="text" class="form-control" 
						name="endereco" required placeholder="Endereço do Contato"
						aria-describedby="input-endereco">
				</div>
			<br>

			<!-- número do endereço -->
				<div class="input-group">
					<span class="input-group-addon" id="input-user-name">
						<span class="fas fa-map-marker-alt"></span>
					</span>
					<input type="text" class="form-control" 
						name="nro_endereco" required placeholder="Número do Endereço"
						aria-describedby="input-nro_endereco">
				</div>
			<br>

			<!-- complemento do endereço -->
				<div class="input-group">
					<span class="input-group-addon" id="input-user-name">
						<span class="fas fa-clipboard-list"></span>
					</span>
					<input type="text" class="form-control"
						name="complemento" required placeholder="Complemento do Endereço"
						aria-describedby="input-complemento">
				</div>
			<br>

			<!-- bairro -->
				<div class="input-group">
					<span class="input-group-addon" id="input-user-name">
						<span class="fas fa-building"></span>
					</span>
					<input type="text" class="form-control"
						name="bairro" required placeholder="Bairro"
						aria-describedby="input-bairro">
				</div>
			<br>

			<!-- cidade  -->
				<div class="input-group">
					<span class="input-group-addon" id="input-password">
						<span class="fas fa-building"></span>
					</span>
<!--
                 <input type="text" class="form-control"
						name="cidade_id" required placeholder="Cidade"
						aria-describedby="input-cidade_id">
-->
				<select name="cidade_id" class="form-control">
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

$sql = "select * from tbl_cidades order by nome_cidade";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($result)) {
	echo "<option value=".$row[0].">".utf8_encode($row[1])."</option>";
}
mysqli_close($con);
?>




				</select>


				</div>
			<br> 
								
			<!-- CEP -->
				<div class="input-group">
					<span class="input-group-addon" id="input-user-name">
						<span class="fas fa-road"></span>
					</span>
					<input type="text" class="form-control"
						name="cep" required placeholder="CEP"
						aria-describedby="input-cep">
				</div>
			<br>

				<!-- Botão de envio -->
				<div class="row" style="margin-bottom:10px">
					<div class="col-xs-12">
						<button type="submit"
							class="btn btn-primary btn-block btn-flat">
							Inserir <span class="fas fa-chevron-circle-right"></span>
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