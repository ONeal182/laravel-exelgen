$(document).ready(function(){

function activePage() {
		console.log('привет')
}
activePage();

$('input[type="date"]').on('change', function() { 
	$date = $(this).val();
})

});
