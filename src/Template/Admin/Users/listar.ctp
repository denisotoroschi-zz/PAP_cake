<?=$this->Html->css('backend/background.css')?>
<?=$this->Html->css('backend/table.css')?>
<div class="inner">
	<!-- Header -->
	<header id="header">
		<a href="#" align="center" class="logo" style="color: white;">Listar Utilizadores</a>
	</header>
</div>
<body>
<div class="table-wrapper" style="overflow-x:auto;">
	<table class="alt">
	<thead>
	  <tr>
	    <th>Nome</th>
	    <th>Nº Processo</th>
	    <th>Morada</th>
	    <th>Ano e Turma</th>
	    <th>Escalão</th>
	    <th>Email</th>
	    <th>Data de Nascimento</th>
	    <th>Status</th>
	  </tr>
	</thead>
	<tbody>
	  <?php foreach ($users as $user): ?>
		  <tr>
		    <td><?=$user['nome']?></td>
		    <td><?=$user['n_processo']?></td>
		    <td><?=$user['morada']?></td>
		    <td><?=$user['ano'].$user['turma']?></td>
		    <td><?=$user['escalao']?></td>
		    <td><?=$user['email']?></td>
		    <td><?=$user['data_nascimento']?></td>
		    <td class="status-<?=$user['id']?>"><?=$user['status']?></td>
		    <td><?=$this->Html->link('Editar','/admin/users/editar/'.$user['id'])?></td>
		    <td><?=$this->Html->link('Eliminar','/admin/users/eliminar/'.$user['id'])?></td>
            <td class="blockbutton button-<?=$user['id']?>">
	            <?php if($user['status']=='ativado')
		            {
                        echo '<button type="button" class=" button special small bloquear" id="bloquear-'.$user['id'].'" >Bloquear</button>';
		                //echo "<td>".$this->Html->link(__('Bloquear'),'/admin/users/bloquear/'.$user['id'],['class' => 'btn btn-danger btn-sm'])."</td>";
		            }
		            else if($user['status']=='bloqueado')
		            {
                        echo '<button type="button" class="button special small ativar" id="ativar-'.$user['id'].'">Ativar</button>';
		               	//echo "<td>".$this->Html->link(__('Ativar'),'/admin/users/ativar/'.$user['id'],['class' => 'btn btn-success btn-sm'])."</td>";
		            }
		        ?>
	        </td>
		  </tr>
	  <?php endforeach;?>
	</tbody>
	</table>
</div>

<?=$this->Html->script('frontend/jquery.min.js')?>
<script type="text/javascript">
	$('.blockbutton').on('click','.ativar',function(){
      myString = $(this).attr("id");console.log(myString);
      myString = myString.replace("ativar-",'');
      
        $.ajax({
          url: "ativar/"+myString,
          /*data: {
                  id:myString
                },*/
          success: function()
          {
            $('.button-' + myString).html('<button type="button" class="bloquear" id="bloquear-'+myString+'" >Bloquear</button>');
            $('.status-' + myString).html('ativado');
          }
        });
    });

    $('.blockbutton').on('click','.bloquear',function(){
      myString = $(this).attr("id");
      myString = myString.replace("bloquear-",'');
      console.log(myString);
        $.ajax({
          url: "bloquear/"+myString,
          /*data: {
                  id:myString
                },*/
          success: function()
          {
            $('.button-' + myString).html('<button type="button" class="ativar" id="ativar-'+myString+'">Ativar</button>');
            $('.status-' + myString).html('bloqueado');
          }
        });
    });
</script>
</body>
</html>
