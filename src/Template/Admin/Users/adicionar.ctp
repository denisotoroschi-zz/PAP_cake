<?=$this->Html->css('backend/background.css')?>
<?=$this->Html->css('backend/form.css')?>
 <div class="inner">
	<!-- Header -->
	<header id="header">
		<a href="#" align="center" class="logo" style="color: white;">Adicionar Utilizadores</a>
	</header>
</div>
<div class="table-wrapper">
	<table>
		<tbody>
			<?=$this->Form->create($user);?>
			<tr>
				<td><?=$this->Form->input('nome', ['type' => 'text']);?></td>
			</tr>
			<tr>
				<td><?=$this->Form->input('n_processo', ['type' => 'text']);?></td>
			</tr>
			<tr>
				<td><?=$this->Form->input('pin', ['type' => 'password']);?></td>
			</tr>
			<tr>
				<td><?=$this->Form->input('morada', ['type' => 'textarea']);?></td>
			</tr>
			<tr>
				<td><?=$this->Form->input('data_nascimento', ['type' => 'date']);?></td>
			</tr>
			<tr>
				<td><?=$this->Form->input('ano', ['type' => 'text']);?></td>
			</tr>
			<tr>
				<td><?=$this->Form->input('turma', ['type' => 'text']);?></td>
			</tr>
			<tr>
				<td><?=$this->Form->input('tipo', ['type' => 'text']);?></td>
			</tr>
			<tr>
				<td><?=$this->Form->input('escalao', ['type' => 'text']);?></td>
			</tr>
			<tr>
				<td><?=$this->Form->input('email', ['type' => 'email']);?></td>
			</tr>
			<tr>
				<td><?=$this->Form->input('nif', ['type' => 'number']);?></td>
			</tr>
			<tr>
				<td><?=$this->Form->input('saldo_sub', ['type' => 'number']);?></td>
			</tr>
			<tr>
				<td><?=$this->Form->input('img', ['type' => 'text']);?></td>
			</tr>
			<tr>
				<td><?=$this->Form->input('horario', ['type' => 'text']);?></td>
			</tr>
			<tr>
				<td><?=$this->Form->input('status', ['type' => 'text']);?></td>
			</tr>
			<tr>
				<td><?=$this->Form->button('Salvar', ['type' => 'submit', 'id'=>'submit']);?></td>
			</tr>
			<?=$this->Form->end();?>
		</tbody>
	</table>
</div>