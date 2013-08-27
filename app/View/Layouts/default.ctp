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
		<?php echo 'Street Eats'?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('normalize');
		echo $this->Html->css('font-awesome/css/font-awesome.min.css');
		echo $this->Html->css('screen');

		echo $this->Html->script('timezone');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container landing">
	
		<!-- Header -->
        <header>
	        <nav class="landingNav">
	        	<!-- Logo -->
	        	<h1 class="logoTitle">Street Eats</h1>
	        	<ul class="navList">
	        		<li><a href="#features">Features</a></li>
	        		<li><a href="#contact">Contact</a></li>
	        	</ul>
	        </nav>
        </header>
        <!-- End Header -->
        
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		
		<!-- Map Section -->
        <div class="background">
        </div>
        <!-- End Map Section -->
        
		<footer>
			<p>&copyStreet Eats, 2013</p>
		</footer>
	</div>
</body>
</html>
