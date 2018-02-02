@extends('layouts.user_report')

@section('title', 'Rapor')

@section('side-title')
	<h2>Parametreler</h2>
@endsection

@section('main-title')
	<h2>{{ $report->title }}</h2>
@endsection

@section('side-content')

	@php ($group = \App\AuthorityGroup::find(Auth::user()->group))

	@if (!in_array($report->id, array_column($group->prohibited_reports->toArray(), 'id') ))
		<div id="forms"></div>
	@else
		<div class="alert alert-danger" style="text-align: center;">
			<h2><strong>Sayın {{Auth::user()->name}}</strong></h2>
			Bu Rapora Erişim Hakkınız Bulunmamaktadır.
        </div>
	@endif

@endsection

@section('main-content')

	<div id="resultsFromQuery"></div>

@endsection

@section('scripts')

	<script>
		$(document).ready(function(){
			$form = $("<form></form>");
			$form.attr('method','post');
			$form.attr('id','form');
			$form.attr('action','/rapor/{{ $report->id }}');

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
	</script>

	<script>
		$(document).ready(function(){
			// Variable to hold request
			var request;

			// Bind to the submit event of our form
			$("#form").submit(function(event){

			    // Prevent default posting of form - put here to work in case of errors
			    event.preventDefault();

			    // var inputs = $form.find("input, select, button, textarea");

			    var values = {};
				$.each($("#form").serializeArray(), function (i, field) {
				    values[field.name] = field.value;
				});

			    // Disable the inputs for the duration of the Ajax request.
			    // To see whether is completed or not
			    // $inputs.prop("disabled", true);

			    var url = window.location.href;
			    var token = $("input[name='_token']").val();

			    var resp;

			    // Fire off the request to current url
		        $.ajax({
		            method: 'post',
		            url: url,
		            data: {
		            	values: values,
		            	_token : token
		            },
		            success: function(response) {
		            	console.log("success");
		            	var check = false;
		            	// console.log(response.values);

		            	var table = '<br><table class="table table-striped"><thead><tr>';
		            	$.each(response.results[0], function(key, value){
		            		table += '<th>';
		            		table += key;
		            		table += '</th>';
		            	})

		            	table += '</tr></thead><tbody>';

		            	$.each(response.results, function(i, item) {
		            		check = true;
						    table += '<tr>';
						    $.each(item, function(key, value){
						    	table += '<td>' + value + '</td>';
						    	// if(key == 'islem')
						    		// console.log(value);
						    })
						    table += '</tr>'
						})
						table += '</tbody></table>'

		            	if(check){
		            		$("#resultsFromQuery").html(table);
		            	}
		            	else $("#resultsFromQuery").html('<br><div class="alert alert-warning"><strong>Uyarı! </strong>Görüntülenecek değer bulunmamaktadır.</div>');
		            },
		            error: function(e) {
		            	$("#resultsFromQuery").html('<br><div class="alert alert-danger"><strong>Hata! </strong>Görüntülemede hata meydana geldi.</div>');
		            	
		            	console.log("error");
		            },
		            complete: function(){
		            	console.log("completed");
		            },
		            dataType: "json"
		        });


			});
		});
	</script>

@endsection
