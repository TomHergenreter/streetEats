$(document).ready(function () {
	$('.quickLocation').on('click', function(e){
		var $this = $(this);
		var address = ($this.parent().text());
		var zip = ($this.parent().next('p').text());
		$.ajax({
			type: 'POST',
			url: '../vendors/location',
			success: function(){
				$('input[name="data[Location][streetAddress]"]').val(address),
				$('input[name="data[Location][zip]"]').val(zip);
			}
		});
	});
});
