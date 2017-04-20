<!-- Sidebar -->
<div id="sidebar" style="background-color: navajowhite">
	<div class="inner">
		<!-- Menu -->
		<nav id="menu">
			<header class="major">
				<h5>Utilizador: <?=$this->request->session()->read('Auth.User.nome');?></h5>
				<h2>Menu</h2>
			</header>
			<ul>
				<li>
					<span class="opener">Utilizadores</span>
					<ul>
						<li><?=$this->Html->link('Adicionar','/admin/users/adicionar')?></li>
						<li><?=$this->Html->link('Listar','/admin/users/listar')?></li>
					</ul>
				</li>
				<li>
					<span class="opener">Refeições</span>
					<ul>
						<li><?=$this->Html->link('Adicionar','/admin/refeicoes/adicionar')?></li>
						<li><?=$this->Html->link('Listar','/admin/refeicoes/listar')?></li>
					</ul>
				</li>
				<li>
					<span class="opener">Produtos</span>
					<ul>
						<li><?=$this->Html->link('Adicionar','/admin/produtos/adicionar')?></li>
						<li><?=$this->Html->link('Listar','/admin/produtos/listar')?></li>
					</ul>
				</li>
				<li><?=$this->Html->link('Sair','/admin/users/logout')?></li>
			</ul>
		</nav>
		<!-- Footer -->
		<footer id="footer">
			<p class="copyright">&copy; Todos os direitos reservados</p>
		</footer>
	</div>
</div>