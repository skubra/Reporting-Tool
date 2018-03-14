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
	
	<div id="modals"></div>
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

			    // Fire off the request to current url
		        $.ajax({
		            method: 'post',
		            url: url,
		            data: {
		            	values: values,
		            	_token : token
		            },
		            success: function(response) {

		            	//console.log(response.graphres);
		            	console.log("success");
		            	
		            	// Add buttons and modal values

		            	var checkgraphs = false;

		            	var modals = '';
		            	$.each(response.graphres, function(i, value){
		            		checkgraphs = true;
		            		modals += ('<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal' + response.graphres[i]['id'] + '">' + response.graphres[i]['title'] + '</button>');
		            		modals += ('  ');
		            	})

		            	$.each(response.graphres, function(i, value){
		            		modals += ('<div class="modal fade" id="myModal'+ response.graphres[i]['id']+ '" role="dialog">'+ 
		            					'<div class="modal-dialog">' + 
						 				'<div class="modal-content">' +
		        						'<div class="modal-header">' +
										'<button type="button" class="close" data-dismiss="modal">&times;</button>' +
		          						'<h4 class="modal-title">' + response.graphres[i]['title'] + '</h4>' +
		        						'</div>' +
								        '<div class="modal-body">' +
								        '<div id="container" style="width:100%; height:400px;"></div>' +
								        '</div>' +
								        '<div class="modal-footer">' +
								        '<button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>' +
								        '</div></div></div></div>');
		            	})

		            	if(checkgraphs){
		            		$('#modals').html(modals);
		            	}

		            	var graphs = [];

		            	$.each(response.graphres, function(i, value){

		            		// take from query for series data

		            		var queryres = '';
			            	queryres += '[';
			            	
			            	$.each(response.results, function(i, item) {
			            		queryres += '{"name": "'+ item['islem'] +'", "y": '+ item[value['x_axis_param']] +'},';
			            		
							})
							
							queryres = queryres.slice(0, -1);
							queryres += ']';

							var seriesdata = JSON.parse(queryres);

							// Generate graph for each saved graph input

			            	var graph = Highcharts.chart('container', {
							    chart: {
							        plotBackgroundColor: null,
							        plotBorderWidth: null,
							        plotShadow: false,
							        type: 'pie'
							    },
							    title: {
							        text: response.graphres[0]['title']
							    },
							    tooltip: {
							        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
							    },
							    plotOptions: {
							        pie: {
							            allowPointSelect: true,
							            cursor: 'pointer',
							            dataLabels: {
							                enabled: true,
							                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
							                style: {
							                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
							                }
							            }
							        }
							    },
							    series: [{
							        name: 'Brands',
							        colorByPoint: true,
							        data: seriesdata
							    }],
								
							});

							graphs.push(graph);

		            	})


		            	// To print results table

		            	var checktable = false;
		            	// console.log(response.values);

		            	var table = '<br><table class="table table-striped"><thead><tr>';
		            	$.each(response.results[0], function(key, value){
		            		table += '<th>';
		            		table += key;
		            		table += '</th>';
		            	})

		            	table += '</tr></thead><tbody>';

		            	$.each(response.results, function(i, item) {
		            		checktable = true;
						    table += '<tr>';
						    $.each(item, function(key, value){
						    	table += '<td>' + value + '</td>';
						    	// if(key == 'islem')
						    		// console.log(value);
						    })
						    table += '</tr>'
						})
						table += '</tbody></table>'

		            	if(checktable){
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

	<script>
		
		$(document).ready(function(){

			$( "#modals" ).on( "click", function(event) {

				

			});

		});

	</script>



@endsection
