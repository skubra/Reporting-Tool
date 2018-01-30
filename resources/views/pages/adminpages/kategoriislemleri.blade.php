@extends('layouts.admin_two_col')

@section('title', 'Kategoriler')

@section('main-title')
    <h2>Kategori İşlemleri</h2>
@endsection

@section('side-title')
    <h2>Kategori Ekle</h2>
@endsection

@section('content')

	<div class="table-responsive">
		<table class="table table-striped" id="raporsistTable">
			<thead>
			    <tr>
			      <th>ID</th>
			      <th>Başlık</th>
			      <th></th>
			    </tr>
			</thead>
			<tbody>
				@foreach($menus->reverse() as $menu)
			    	<tr>
			    		<th scope="row">{{ $menu->id }}</th>
						<td>{{ $menu->title }}</td>
						
						<td>
							<div class="buttons">
								{!! Form::open(['route' => ['kategori.edit', $menu->id], 'method' => 'GET']) !!}
								{!! Form::submit('Düzenle', ['class' => 'btn btn-primary btn-sm']) !!}
								{!! Form::close() !!}

							</div>
 						</td>
			    	</tr>
			    @endforeach
			</tbody>
		</table>
	</div>
	

@endsection

@section('side-content')

	{!! Form::model(['route' => ['kategori.store'], 'method' => 'POST']) !!}
	    {{ csrf_field() }}

	    {{ Form::label('title', 'Başlık') }}
	    {{ Form::text('title', '', ["class" => 'form-control']) }}

	    <br>
	    {{ Form::submit('Ekle', ["class" => 'form-control btn btn-warning']) }}


	{!! Form::close() !!}


	<div class="alert alert-error">
	    @if ($errors->any())
	        <div class="alert alert-danger">
	            <ul>
	                @foreach ($errors->all() as $error)
	                    <li>{{ $error }}</li>
	                @endforeach
	            </ul>
	        </div>
	    @endif
	</div>

@endsection