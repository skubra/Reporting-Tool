@extends('layouts.admin_two_col')

@section('title', 'Kullanıcı Düzenle')

@section('side-title')
	<h2>{{$edited_user->name}} Kullanıcısını Düzenle</h2>
@endsection

@section('main-title')
	<h2>Kullanıcı İşlemleri</h2>
@endsection

@section('content')
	<div class="row">

		<div class="table-responsive">
			<table class="table table-striped" id="raporsistTable">
				<thead>
				    <tr>
				      <th>ID</th>
				      <th>Ad Soyad</th>
				      <th>Sicil No</th>
				      <th>Hesap Aktivitesi</th>
				      <th>Yetki Grubu</th>
				    </tr>
				</thead>
				<tbody>
				    @foreach($users as $user)
				      @include('pages.adminpages.kullaniciislemleri.users')
				    @endforeach
				</tbody>
			</table>
		</div>

	</div>
@endsection

@section('side-content')

	{!! Form::model($edited_user, ['route' => ['kullaniciislemleri.update', $edited_user->id], 'method' => 'PUT']) !!}
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
	    {{ Form::label('active', "Aktiflik" ) }}
	    {{ Form::select('active', ['Aktif' => 'Aktif', 'Pasif' => 'Pasif'], null, ['class' => 'form-control']) }}

	    <br>
	    {{ Form::label('group', "Grup" ) }}
	    {{ Form::select('group', ['1' => 'Mühendis', '2' => 'Müdür', '3' => 'Stajyer'], null, ['class' => 'form-control']) }}

		<br>
	    <div class="center-item">
	    	{{ Form::submit('Kaydet', ['class' => 'btn btn-danger btn-save-edit', 'style' => 'margin-top:10px;']) }}
	    </div>

	{!! Form::close() !!}

@endsection