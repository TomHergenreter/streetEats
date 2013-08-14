<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo 'Street Eats' ?>:
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('normalize');
		echo $this->Html->css('screen');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<header>
			<h1 class='logoTitle'>StreetEats</h1>
		</header>
			<nav class='dashNav'>
				<ul>
					<li><?php echo $this->Html->link('Logout', '/users/logout'); ?></li>
					<li><?php echo $this->Html->link('Edit', 'edit'); ?></li>
					<li><?php echo $this->Html->link('Location', 'location'); ?></li>
					<li><?php echo $this->Html->link('Menu', 'menu'); ?></li>
					<li><?php echo $this->Html->link('Reviews', 'review'); ?></li>
					<li><?php echo $this->Html->link('Deals', 'deals'); ?></li>
				</ul>
			</nav>
		
		<div class="content">
		
			<?php echo $this->Session->flash(); ?>
		
			<?php echo $this->fetch('content'); ?>
		</div>
		<footer>
		</footer>
	</div>
</body>
</html>
