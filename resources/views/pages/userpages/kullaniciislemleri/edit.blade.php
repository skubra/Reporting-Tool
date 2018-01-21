@extends('layouts.userApp')

@section('title', 'Kullanıcı Düzenle')

@section('main-title')
	<h2>{{ Auth::guard('web')->user()->name }}</h2>
@endsection

@section('side-title')
	<h2>Kullanıcı Düzenle / {{ Auth::guard('web')->user()->name }}</h2>
@endsection

@section('side-content')

	{!! Form::model(Auth::guard('web')->user(), ['route' => ['userpage.update', Auth::guard('web')->user()->id], 'method' => 'PUT']) !!}
		{{ csrf_field() }}

		{{ Form::label('name', 'Ad Soyad:') }}
		{{ Form::text('name', null, ["class" => 'form-control']) }}

		<br>
		{{ Form::label('sicilno', "Sicil No:" ) }}
		{{ Form::text('sicilno', null, ['class' => 'form-control']) }}

		<br>
		{{ Form::label('email', "E-mail:" ) }}
		{{ Form::text('email', null, ['class' => 'form-control']) }}

		<br>
	    <div class="center-item">
	    	{{ Form::submit('Kaydet', ['class' => 'btn btn-danger btn-save-edit', 'style' => 'margin-top:10px;']) }}
    	</div>

	{!! Form::close() !!}

@endsection

@section('main-content')

	<div style="text-align: center;">
		<div>
			<div><a href="#"><img src="http://via.placeholder.com/100x130"></a></div>
		</div>
		<div class="show-user">
			<h4>Kullanıcı Bilgileri</h4>
			<div>
				<label>Adı-Soyadı</label>
				<p>{{ Auth::guard('web')->user()->name }}</p>
			</div>
			<div>
				<label>Sicil No</label>
				<p>{{ Auth::guard('web')->user()->sicilno }}</p>
			</div>
			<div>
				<label>İletişim</label>
				<p>{{ Auth::guard('web')->user()->email }}</p>
			</div>

			<a class="btn btn-default" href="{{ route('userpage.edit',Auth::guard('web')->user()->id) }}">Bilgileri Düzenle</a>
			<a class="btn btn-danger" href="{{ route('userpage.edit',Auth::guard('web')->user()->id) }}">Şifre Değiştir</a>
		</div>

	</div>

@endsection
