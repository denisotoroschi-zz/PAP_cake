<?=$this->Html->css('backend/background.css')?>
<?=$this->Html->css('backend/form.css')?>
<div class="inner">
	<!-- Header -->
	<header id="header">
		<a href="#" align="center" class="logo" style="color: white;">Editar Produto</a>
	</header>
</div>
<div class="table-wrapper">
	<table>
		<tbody>
			<?=$this->Form->create($produto);?>
			<tr>
				<td><?=$this->Form->input('nome', ['type' => 'text']);?></td>
			</tr>
			<tr>
				<td><?=$this->Form->input('descricao', ['type' => 'textarea']);?></td>
			</tr>
			<tr>
				<td><?=$this->Form->input('preco', ['type' => 'text']);?></td>
			</tr>
			<tr>
				<td><?=$this->Form->button('Salvar', ['type' => 'submit', 'id'=>'submit']);?></td>
			</tr>
			<?=$this->Form->end();?>
		</tbody>
	</table>
</div>