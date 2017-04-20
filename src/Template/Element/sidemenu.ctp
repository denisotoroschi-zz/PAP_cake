<!-- Sidebar -->
<div id="sidebar">
	<div class="inner">
		<!-- Menu -->
		<nav id="menu">
			<header class="major">
				<h5>Utilizador: <?=$this->request->session()->read('Auth.User.nome');?></h5>
				<h2>Menu</h2>
			</header>
			<ul>
				<li>
					<span class="opener">Saldo</span>
					<ul>
						<li><a href="#">Normal</a></li>
						<?php
						if($this->request->session()->read('Auth.User.escalao')=='a' or $this->request->session()->read('Auth.User.escalao')=='b')
						{
							echo '<li><a href="#">Subsidiada</a></li>';
						}
						?>
					</ul>
				</li>
				<li><?=$this->Html->link('Refeições','/refeicoes/marcar')?></li>
				<li><?=$this->Html->link('Alterar PIN','/users/change_pin')?></li>
				<li><?=$this->Html->link('Dados do Utilizador','/users/info')?></li>
				<li><?=$this->Html->link('Horário','/users/horario')?></li>
				<li><?=$this->Html->link('Sair','/users/logout')?></li>
			</ul>
		</nav>
		<!-- Footer -->
		<footer id="footer">
			<p class="copyright">&copy; Todos os direitos reservados</p>
		</footer>
	</div>
</div>