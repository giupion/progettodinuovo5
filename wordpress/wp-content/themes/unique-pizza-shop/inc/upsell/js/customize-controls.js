( function( api ) {

	// Extends our custom "unique-pizza-shop" section.
	api.sectionConstructor['unique-pizza-shop'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );