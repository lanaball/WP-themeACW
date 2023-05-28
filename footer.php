<footer class="footer">


	<div class="footer-content row">
		<div class="col-s-4">
			<h4 class="yellow-title">Join Us</h4>
			<p>ACW currently has over 200 members, from over Aotearoa. Our members are part of a powerful base of feminist, women’s rights and gender justice defenders, activis ts and allies, connecting, exchanging, learning and acting togther for transformation change</p>
			<button class="yellow">Join today</button>
		</div>
		<div class="col-s-4">
			<h4 class="pink-title">Donate</h4>
			<p>You can also show your support for transformative change bt making a donation to ACW. Your valuable contribution will help sustain the work we do across Aotearoa.</p>
			<button class="pink">Donate now</button>
		</div>
		<div class="col-s-4">
			<h4 class="black-title">Connect With Us</h4>
			<p>Join the conversation and stay connected with the community. Receive a regular selection of femist analysis, resources and ways to get involved with the movement </p>
			<button class="black">Join the mailing list</button>
		</div>
	</div>

	<div class="ft-logo">
		<div class="logo">
			<img class="logo-img" src="<?php echo get_template_directory_uri(); ?>./images/logo.png" alt="logo">
			<h1 class="logo-title">ACW</h1>
		</div>
	</div>

	<div class="ft-info">
		<p>&copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?> / Created by <a href="#" target="_blank">Allana Kennedy</a>
	</div>


</footer>

<footer id="colophon" class="site-footer">

	<div class="bg-primary text-white pt-5 pb-5">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-2">
					<?php dynamic_sidebar('footer-widget-col-one'); ?>
				</div>

				<div class="col-sm-6 col-md-2">
					<?php dynamic_sidebar('footer-widget-col-two'); ?>
				</div>

				<div class="col-md-4 col-sm-12 ms-auto">
					<?php dynamic_sidebar('footer-widget-col-three'); ?>
				</div>
			</div>
		</div>

	</div>


	<div class="container pt-2 pb-2">
		<div class="row d-flex align-items-center">
			<div class="col">
				<p>&copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?> / Created by <a href="https://raddy.co.uk" target="_blank">Allana</a>
			</div>
			<div class="col h-25 d-inline-block text-end">
				<img src="<?php echo get_template_directory_uri(); ?>/img/payment-methods.png" class="img-fluid" loading="lazy" alt="...">
			</div>
		</div>
	</div>



</footer>

</body>

</html>