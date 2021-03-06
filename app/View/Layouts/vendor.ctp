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
		echo $this->Html->css('font-awesome/css/font-awesome.min.css');
		echo $this->Html->css('screen');
	
		echo $this->Html->script('twitter');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>
<body>
	<div id="container">
		<header>
			<h1 class='logoTitle'>StreetEats</h1>
		</header>
			<nav class='dashNav'>
				<?php 
				if(isset($avatar)){
					echo $this->Html->image($avatar, array('alt' => 'avatar', 'class' => 'avatar'));
					echo '<h3>' . $name . '</h3>';
				} 
				?>
				<ul class="vendor">
					<li <?php if($this->params['action'] == 'location'){echo "class='active'";}?>><?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'icon-map-marker icon-2x')), 'location', array('escape' => false)); ?></li>
					<li <?php if($this->params['action'] == 'menu'){echo "class='active'";}?>><?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'icon-reorder icon-2x')), 'menu', array('escape' => false)); ?></li>
					<li <?php if($this->params['action'] == 'edit'){echo "class='active'";}?>><?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'icon-cog icon-2x')), 'edit', array('escape' => false)); ?></li>
					<li <?php if($this->params['action'] == 'review'){echo "class='active'";}?>><?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'icon-comment icon-2x')), 'review', array('escape' => false)); ?></li>
					<li <?php if($this->params['action'] == 'deals'){echo "class='active'";}?>><?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'icon-dollar icon-2x')), 'deals', array('escape' => false)); ?></li>
					<li><?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'icon-signout icon-2x')), '/users/logout', array('escape' => false)); ?></li>
				</ul>
			</nav>
		
		<div class="content">
		
			<?php echo $this->Session->flash(); ?>
		
			<?php echo $this->fetch('content'); ?>
		</div>
		<footer>
		</footer>
	</div>
<?php echo $this->Html->script('quickLocation'); ?>	
</body>
</html>
