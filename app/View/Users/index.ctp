	<ul class="userPortal">
		<li><?php echo $this->Html->link('Register', 'add'); ?></li>
		<li><?php echo $this->Html->link('Login', 'login'); ?></li>
	</ul>

<div class="intro background">
	<?php echo $this->Html->image('mobileComp.png', array( 'class' => 'introImg', 'alt' => 'Mobile View')); ?>
	<div class='introText'>
		<h1> Street Eats Is the Easiest Way to Locate Your Favorite Food Trucks!</h1>
	</div>
</div>
<div class="features" id='features'>
	<h1 class="navigateTo">Meet Street Eats</h1>
	<h2>Never waste time searching for your favorite food trucks again.</h2>
		<ul class="icons-ul">
		<li><i class="icon-li icon-map-marker icon-3x"></i>Quickly and easily find nearby vendors with integrated Google Maps, or search through our database by name or cuisine type to find just what you are looking for</li>
		<li><i class="icon-li icon-heart icon-3x"></i>Save all of your favorite food trucks in your own personal favorites library, where you have quick access to menus, locations, and deals. Easily update or remove favorites at any time</li>
	<li><i class="icon-li icon-comment icon-3x"></i>Rate and review trucks that you have visited. Don't forget to tell the world your opinions with integrated Twitter buttons, to quickly tweet your ratings and reviews!</li>
	<li><i class="icon-li icon-dollar icon-3x"></i>Don't miss out on the exclusive deals that are only available to Street Eats Members. Vendors are posting new deals everyday, so sign up now! </li>
	</ul>
</div>
<div class="contact">
	<h1 class="navigateTo" id="contact">Contact Us</h1>
	<h2>We'd Love to hear from you!</h2>
	<p>
	<?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'icon-twitter icon-3x')), 'https://twitter.com/streeteatsco', array('escape' => false));
	echo $this->Html->link($this->Html->tag('i', '', array('class' => 'icon-facebook icon-3x')), 'https://twitter.com/streeteatsco', array('escape' => false));
	echo $this->Html->link($this->Html->tag('i', '', array('class' => 'icon-github icon-3x')), 'https://github.com/TomHergenreter/streetEats', array('escape' => false));
	echo $_COOKIE['offset'];
	?>
	</p>
</div>
