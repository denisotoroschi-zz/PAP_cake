<?=$this->Html->css('backend/background.css')?>
<?=$this->Html->css('backend/table.css')?>
<div class="inner">
	<!-- Header -->
	<header id="header">
		<a href="#" align="center" class="logo" style="color: white;">Listar Produtos</a>
	</header>
</div>
<body>
<div style="overflow-x:auto;">
	<table>
	  <tr>
	    <th>Nome</th>
	    <th>Descrição</th>
	  </tr>
	  <?php foreach ($produtos as $produto): ?>
		  <tr>
		    <td><?=$produto['nome']?></td>
		    <td><?=$produto['descricao']?></td>
		    <td><?=$produto['preco']?></td>
		    <td><?=$this->Html->link('Editar','/admin/produtos/editar/'.$produto['id'])?></td>
		    <td><?=$this->Html->link('Eliminar','/admin/produtos/eliminar/'.$produto['id'])?></td>
		  </tr>
	  <?php endforeach;?>
	</table>
</div>
</body>
</html>

