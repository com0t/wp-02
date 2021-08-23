jQuery(document).ready(function($) {
	jQuery('.eafl-statistics-cleanup #remove_all').on('click', function() {
		var checkbox = jQuery(this);
		if(checkbox.is(':checked')) {
            alert('Warning: this will remove ALL our click data');
        }
	});
});
