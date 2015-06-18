<?php
wp_enqueue_style( 'base' );
wp_enqueue_style( 'open-sans', 'https://fonts.googleapis.com/css?family=Open+Sans:600,400', false, 'all' );

$url = gp_url_public_root();
wp_enqueue_style( 'font', $url . '/plugins/tec-theme/templates/css/font.css' );
wp_enqueue_style( 'main', $url . '/plugins/tec-theme/templates/css/main.css' );
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<title><?php echo gp_title(); ?></title>
		<?php gp_head(); ?>

	</head>
	<body <?php body_class(); ?>>
		<header>
				<div class="logo" itemscope="" itemprop="author headline" itemtype="https://schema.org/Organization">
				<h1 class="logo-wrap">
					<a href="http://translations.theeventscalendar.com" class="logo-anchor" rel="home" itemprop="url">
						<img src="https://theeventscalendar.com/content/themes/tribe-ecp/img/logos/logo@2x.png" class="logo-image" itemprop="logo" alt="The Events Calendar by Modern Tribe Logo">
						<span class="logo-anchor-text">
							<em itemprop="brand">The Events Calendar</em>
							<div class="logo-creds"><strong>Translations</strong> by <h6 itemprop="name">Modern Tribe</h6></div>
						</span>
					</a>
				</h1>
			</div>
			<?php echo gp_breadcrumb(); ?>
			<span id="hello">
			<?php
			if (GP::$user->logged_in()):
				$user = GP::$user->current();

				printf( __('Hi, %s.'), '<a href="'.gp_url( '/profile' ).'">'.$user->user_login.'</a>' );
				?>
				<a href="<?php echo gp_url('/logout')?>"><?php _e('Log out'); ?></a>
			<?php elseif( ! GP_INSTALLING ): ?>
				<strong><a href="<?php echo gp_url_login(); ?>"><?php _e('Log in'); ?></a></strong>
				| <strong><a href="/wordpress/wp-login.php?action=register"><?php _e('Register'); ?></a></strong>
			<?php endif; ?>
			<?php do_action( 'after_hello' ); ?>
			</span>
			<div class="clearfix"></div>
		</header>
		<script type="text/javascript">document.body.className = document.body.className.replace('no-js','js');</script>
		<div class="gp-content">
	    <div id="gp-js-message"></div>

		<div class="clear after-h1"></div>
		<?php if (gp_notice('error')): ?>
			<div class="error">
				<?php echo gp_notice( 'error' ); //TODO: run kses on notices ?>
			</div>
		<?php endif; ?>
		<?php if (gp_notice()): ?>
			<div class="notice">
				<?php echo gp_notice(); ?>
			</div>
		<?php endif; ?>
		<?php do_action( 'after_notices' ); ?>
