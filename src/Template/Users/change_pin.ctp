<div class="inner">
	<!-- Header -->
	<header id="header">
		<a href="#" align="center" class="logo"><strong>Alterar</strong> Pin</a>
	</header>
</div>
<div align="center">
	<div class="6u$ 12u$(medium) " align="center">
		<?php
			echo $this->Form->create($user);
			echo "<div class='row uniform' >";
				echo "<div class='6u 12u$(xsmall)' align='center'>";
					echo $this->Form->input('pin antigo', ['type' => 'password', 'value'=>'', 'id'=>'pin3']);	
					echo "</br>";
					echo $this->Form->input('new_pin', ['type' => 'password', 'value'=>'', 'id'=>'pin1']);	
					echo "</br>";
					echo $this->Form->input('confirm_pin', ['type' => 'password', 'value'=>'', 'id'=>'pin2']);	
					echo "</br>";
					echo $this->Form->button('Salvar', ['type' => 'submit', 'id'=>'submit']);
				echo "</div>";
			echo "</div>";
			echo $this->Form->end();
		?>
	</div>
</div>

<?=$this->Html->script('frontend/jquery.min.js')?>
<script>
	$('#pin1, #pin2').on('keyup', function () {
	  if ($('#pin1').val() == $('#pin2').val()) {
	    document.getElementById('submit').disabled = false;
	  } else 
	    document.getElementById('submit').disabled = true; 
	});
</script>  