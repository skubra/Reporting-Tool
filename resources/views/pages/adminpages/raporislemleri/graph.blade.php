@extends('layouts.admin_two_col')

@section('title', 'Rapor | Grafik İşlemleri')

@section('main-title')
    <h2>Grafik Düzenleme İşlemleri</h2>
@endsection

@section('side-title')
    <h2>Yeni Grafik Ekle</h2>
@endsection

@section('content')

	<div class="table-responsive">
		<table class="table table-striped" id="raporsistTable">
			<thead>
			    <tr>
			      <th>Rapor Başlık</th>
			      <th>Grafik Başlık</th>
                  <th>Grafik Türü</th>
			      <th>X Ekseni</th>
                  <th>X Ekseni Parametre</th>
                  <th>Y Ekseni</th>
                  <th>Y Ekseni Parametre</th>
			    </tr>
			</thead>
			<tbody>
				@foreach($report->graphs as $graph)
                    <tr>
                        <th scope="row">{{ $report->title }}</th>
                        <td>{{ $graph->title }}</td>
                        <td>{{ $graph->type }}</td>
                        <td>{{ $graph->x_axis_title }}</td>
                        <td>{{ $graph->x_axis_param }}</td>
                        <td>{{ $graph->y_axis_title }}</td>
                        <td>{{ $graph->y_axis_param }}</td>
                    </tr>
                @endforeach
			</tbody>
		</table>
	</div>


@endsection

@section('side-content')

    <div id="graphs">
        <div class="panel list-group">
            
            <a href="#" class="list-group-item" data-toggle="collapse" data-target="#g1" data-parent="#graphs">Basit Sütun Grafiği</a>
            <div id="g1" class="sublinks collapse panel-body">
                
                {!! Form::open(['route' => ['graph.store', $report->id], 'method' => 'POST']) !!}
                    
                    {{ csrf_field() }}

<!--                     {!! Form::text('type', 'column', ['class' => 'form-control', 'readonly' => 'true']) !!} -->
                    {{ Form::hidden('type', 'column') }}
                    <br>

                    {{ Form::label('title', "Grafik Başlık" ) }}
                    {{ Form::text('title', '', ["class" => 'form-control']) }}
                    <br>

                    {{ Form::label('x_axis_title', "X Ekseni Başlık" ) }}
                    {{ Form::text('x_axis_title', '', ["class" => 'form-control']) }}

                    <br>
                    {{ Form::label('x_axis_param', "X Ekseni Parametre" ) }}
                    {{ Form::text('x_axis_param', '', ["class" => 'form-control']) }}
                    
                    <br>
                    {{ Form::label('y_axis_title', "Y Ekseni Başlık" ) }}
                    {{ Form::text('y_axis_title', '', ["class" => 'form-control']) }}
                    
                    <br>
                    {{ Form::label('y_axis_param', "Y Ekseni Parametre" ) }}
                    {{ Form::text('y_axis_param', '', ["class" => 'form-control']) }}

                    <br>
                    {{ Form::submit('Ekle', ["class" => 'form-control btn btn-info']) }}

                {!! Form::close() !!}

            </div>
            
            <a href="#" class="list-group-item" data-toggle="collapse" data-target="#g2" data-parent="#graphs">Pie Chart</a>
            <div id="g2" class="sublinks collapse panel-body">
                
                {!! Form::open(['route' => ['graph.store', $report->id], 'method' => 'POST']) !!}
                    
                    {{ csrf_field() }}

                    <!-- {!! Form::text('type', 'pie', ['class' => 'form-control', 'readonly' => 'true']) !!} -->
                    {{ Form::hidden('type', 'pie') }}
                    <br>

                    {{ Form::label('title', "Grafik Başlık" ) }}
                    {{ Form::text('title', '', ["class" => 'form-control']) }}
                    <br>
                    
                    {{ Form::label('x_axis_title', "Eksen Başlık" ) }}
                    {{ Form::text('x_axis_title', '', ["class" => 'form-control']) }}

                    <br>
                    {{ Form::label('x_axis_param', "Eksen Parametre" ) }}
                    {{ Form::text('x_axis_param', '', ["class" => 'form-control']) }}

                    <br>
                    {{ Form::submit('Ekle', ["class" => 'form-control btn btn-info']) }}

                {!! Form::close() !!}

            </div>

        </div>
    </div>


@endsection

@section('scripts')

@endsection

