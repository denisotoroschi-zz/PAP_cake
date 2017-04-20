<div class="inner">
	<!-- Header -->
	<header id="header">
		<a href="#" align="center" class="logo"><strong>Marcações</strong> Refeições</a>
	</header>
</div>
<div class="w3layouts_main agileinfo w3">		
	<div class="w3_agile_signup_form agileits">
		<h1 class="w3_agileits w3ls">Log In!</h1>
		<div class="agile_login_form">
			<?=$this->Form->create()?>
			<fieldset>
				<?=$this->Form->input('n_processo');?>
				<?=$this->Form->input('pin',['type'=>'password']);?>
				<?= $this->Form->button('Apagar', ['type' => 'reset'] ); ?>
				<?= $this->Form->button('Entrar',['type'=> 'submit']); ?>
				<?= $this->Form->end() ?>
				<!--<form action="#" method="post" class="agileits_w3layouts_form">
				<input type="text" name="Username" placeholder="User Name" required="">
				<input type="email" name="Email" placeholder="Email Address" required="">
				<input type="password" name="password" placeholder="Password" required="">
				<input type="password" name="password" placeholder="Confirm Password" required="">
				<input type="submit" value="SIGN UP">
				</form>-->
			</fieldset>
		</div>
	</div>
</div> 