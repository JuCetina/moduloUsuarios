<?php include(__DIR__ . '/header.php') ?>
	<h1>Práctica de Laravel 5</h1>
	<p>
		<?php if(isset($user)): ?>
			Bienvenido <?= $user ?>
		<?php else: ?>
			[Login]
		<?php endif; ?>
	</p>
<?php include(__DIR__ . '/footer.php') ?>
