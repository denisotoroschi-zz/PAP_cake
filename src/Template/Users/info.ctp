<div class="inner">
	<!-- Header -->
	<header id="header">
		<a href="#" align="center" class="logo"><strong>Dados</strong> Utilizador</a>
	</header>
</div>
<div class="table-wrapper">
	<table>
		<tbody>
			<tr>
				<td>Nome de Utilizador</td>
				<td><?=$user['nome']?></td>
			</tr>
			<tr>
				<td>Data de Nascimento</td>
				<td><?=$user['data_nascimento']?></td>
			</tr>
			<tr>
				<td>NIF</td>
				<td><?=$user['nif']?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><?=$user['email']?></td>
			</tr>
			<tr>
				<td>Nº Processo</td>
				<td><?=$user['n_processo']?></td>
			</tr>
			<tr>
				<td>Ano e Turma</td>
				<td><?=$user['ano'].$user['turma']?></td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td><?=$this->Html->image($user['img']);?></td>
			</tr>
		</tfoot>
	</table>
</div>