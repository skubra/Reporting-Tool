$(document).ready(function(){
	$form = $("<form></form>");
	$form.attr('method','post');
	$form.attr('action','/rapor/{{ $rapor->id }}');

	$form.append('{{ csrf_field() }}');

	var obj = $.parseJSON('{!! $form_elements !!}');

	$.each(obj, function(key, value) {
		$label = $("<label></label>");
		$label.attr('for',value.name);
		$label.text(value.label);
		$form.append($label);

		$input = $("<input></input>");
		$input.attr('name',value.name);
		$input.attr('type',value.type);
		$input.attr('class','form-control');
		$form.append($input);

		$form.append("<br>");
	});

	$button = $("<button></button>");
	$button.attr('class', 'form-control btn btn-danger btn-list');
	$button.attr('type','submit');
	$button.text('Listele');
	$button.css('margin-top: 10px;');
	$form.append($button);

	$('#forms').append($form);
});