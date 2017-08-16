<?php
gp_title( __( 'Projects &lt; GlotPress' ) );
gp_tmpl_header();

$free_plugins = array(
	'the-events-calendar' => 'The Events Calendar',
	'event-tickets' => 'Event Tickets',
	//'advanced-post-manager' => 'Advanced Post Manager', /* APM translations on .org are highly incomplete, let's keep using our own */
	'image-widget' => 'Image Widget',
);

$retired_plugins = array(
	'tribe-eddtickets',
	'tribe-fb-import',
	'tribe-events-ical-importer',
	'tribe-shopptickets',
	'tribe-wootickets',
	'tribe-wpectickets',
);
?>

	<h2>Projects</h2>

	<h3>WordPress.org Translations</h3>
	<p>Note: to provide translations for these plugins you will need to <a href="https://make.wordpress.org/polyglots/handbook/tools/glotpress-translate-wordpress-org/">become a translation editor on WordPress.org</a></p>
	<ul>
		<?php
		foreach ( $free_plugins as $plugins_slug => $plugin_name ) {
			?>
			<li><a href="https://translate.wordpress.org/projects/wp-plugins/<?php echo esc_attr( $plugin_slug ); ?>/stable"><?php echo esc_html( $plugin_name ); ?></a></li>
			<?php
		}
		?>
	</ul>

	<h3>Modern Tribe Translations</h3>
	<p><a href="/wordpress/wp-login.php?action=register">Register</a> to translate these plugins.</p>
	<ul>
		<?php
		foreach ( $projects as $project ) {
			if ( in_array( $project->slug, $retired_plugins ) ) {
				continue;
			}

			if ( in_array( $project->slug, array_keys( $free_plugins ) ) ) {
				continue;
			}
			?>
			<li><?php gp_link_project( $project, esc_html( $project->name ) ); ?> <?php gp_link_project_edit( $project, null, array( 'class' => 'bubble' ) ); ?></li>
			<?php
		}
		?>
	</ul>

	<p class="actionlist secondary">
		<?php if ( GP::$user->current()->can( 'write', 'project' ) ): ?>
			<?php gp_link( gp_url_project( '-new' ), __( 'Create a New Project' ) ); ?>  &bull;&nbsp;
		<?php endif; ?>

		<?php gp_link( gp_url( '/languages' ), __( 'Projects by language' ) ); ?>
	</p>

	<h4>Retired Plugins</h4>
	<ul>
		<?php
		foreach ( $projects as $project ) {
			if ( ! in_array( $project->slug, $retired_plugins ) ) {
				continue;
			}

			if ( in_array( $project->slug, array_keys( $free_plugins ) ) ) {
				continue;
			}
			?>
			<li><?php gp_link_project( $project, esc_html( $project->name ) ); ?> <?php gp_link_project_edit( $project, null, array( 'class' => 'bubble' ) ); ?></li>
			<?php
		}
		?>
	</ul>

<?php gp_tmpl_footer();
