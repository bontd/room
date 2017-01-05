$( document ).ajaxStart(function() {
	$("#icon-loading").show();
});
$( document ).ajaxComplete(function() {
    $("#icon-loading").hide();
});
$(document).ready(function(){
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
});