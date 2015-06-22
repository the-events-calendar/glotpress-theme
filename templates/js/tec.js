jQuery( document ).ready( function( $ ) {

	var $export_link = $( 'a#export' );

	if ( $export_link.length ) {

		export_url = $export_link.attr('href') + '?format=';
		console.log( export_url);

		$heading = $( '.gp-content>h2' );

		$export_links = $('<span><em>export:</em> <a href="' + export_url + 'mo">po</a> | <a href="' + export_url + 'po">po</a></span>' );

		$export_links.addClass('action').css( {
			fontWeight: 'normal',
			fontSize: '0.75em',
			textDecoration: 'none',
			textTransform: 'lowercase'
		});

		$heading.append( $export_links );
	}
});