<?=$this->Html->css('backend/background.css')?>
<?=$this->Html->css('backend/form.css')?>
 <div class="inner">
	<!-- Header -->
	<header id="header">
		<a href="#" align="center" class="logo" style="color: white;">Adicionar Refeições</a>
	</header>
</div>
<div class="table-wrapper">
	<table>
		<tbody>
			<?=$this->Form->create($refeicao);?>
			<tr>
				<td><?=$this->Form->input('preco', ['type' => 'text']);?></td>
			</tr>
			<tr>
				<td><?=$this->Form->input('data', ['type' => 'date']);?></td>
			</tr>
			<tr>
				<td><?=$this->Form->input('sopa', ['type' => 'text']);?></td>
			</tr>
			<tr>
				<td><?=$this->Form->input('prato', ['type' => 'text']);?></td>
			</tr>
			<tr>
				<td><?=$this->Form->input('sobremesa', ['type' => 'text']);?></td>
			</tr>
			<tr>
				<td><?=$this->Form->button('Salvar', ['type' => 'submit', 'id'=>'submit']);?></td>
			</tr>
			<?=$this->Form->end();?>
		</tbody>
	</table>
</div>