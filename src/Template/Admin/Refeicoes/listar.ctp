<?=$this->Html->css('backend/background.css')?>
<?=$this->Html->css('backend/table.css')?>
<div class="inner">
	<!-- Header -->
	<header id="header">
		<a href="#" align="center" class="logo" style="color: white;">Listar Refeições</a>
	</header>
</div>
<body>
<div style="overflow-x:auto;">
	<table>
	  <tr>
	    <th>Preço</th>
	    <th>Data</th>
	    <th>Sopa</th>
	    <th>Prato</th>
	    <th>Sobremesa</th>
	  </tr>
	  <?php foreach ($refeicoes as $refeicao): ?>
		  <tr>
		    <td><?=$refeicao['preco']?></td>
		    <td><?=$refeicao['data']?></td>
		    <td><?=$refeicao['sopa']?></td>
		    <td><?=$refeicao['prato']?></td>
		    <td><?=$refeicao['sobremesa']?></td>
		    <td><?=$this->Html->link('Editar','/admin/refeicoes/editar/'.$refeicao['id'])?></td>
		    <td><?=$this->Html->link('Eliminar','/admin/refeicoes/eliminar/'.$refeicao['id'])?></td>
		  </tr>
	  <?php endforeach;?>
	</table>
</div>
</body>
</html>

