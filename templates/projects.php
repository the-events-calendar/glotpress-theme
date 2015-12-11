<?php
gp_title( __( 'Projects &lt; GlotPress' ) );
gp_tmpl_header();
?>

	<h2><?php _e( 'Projects' ); ?></h2>

	<h3>WordPress.org Translations</h3>
	<p>Note: to provide translations for these plugins you will need to become a translation editor on WordPress.org</p>
	<ul>
		<li><a href="https://translate.wordpress.org/projects/wp-plugins/the-events-calendar/stable">The Events Calendar</a></li>
		<li><a href="https://translate.wordpress.org/projects/wp-plugins/event-tickets/stable">Event Tickets</a></li>
		<!-- li><a href="https://translate.wordpress.org/projects/wp-plugins/advanced-post-manager/stable">Advanced Post Manager</a></li -->
	</ul>

	<h3>Modern Tribe Translations</h3>
	<p><a href="/wordpress/wp-login.php?action=register">Register</a> to translate these plugins.</p>
	<ul>
		<?php
		foreach ( $projects as $project ) {
			if ( in_array( $project->slug, array( 'the-events-calendar', 'event-tickets' ) ) ) {
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

<?php gp_tmpl_footer();
