( function( api ) {

	// Extends our custom "saraswati-blog" section.
	api.sectionConstructor['saraswati-blog'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
