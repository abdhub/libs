$(document).ready(function() {
	$('#links').DataTable({
        "order": [[ 1, "desc" ]]
	});

	var clipboard = new Clipboard('.btn');
} );
