jQuery( document ).ready( function( $ ) {
	$export_link = $( '#export' ).clone();

	$heading = $( '.gp-content>h2' );

	$export_link.prepend( '[' ).append( ']' );
	$export_link.addClass('action').css( {
		fontSize: '0.75em',
		textDecoration: 'none',
		textTransform: 'lowercase'
	});

	$heading.append( $export_link );
});