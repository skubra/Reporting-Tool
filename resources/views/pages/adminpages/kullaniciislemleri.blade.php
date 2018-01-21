@extends('layouts.adminApp')

@section('title', 'Kullanıcı İşlemleri')

@section('main-title')
    <h2>Kullanıcı İşlemleri</h2>
@endsection

@section('side-title')
    <h2>Yeni Kullanıcı Ekle</h2>
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

	{{-- <button id="ekleButton" type="button" class="btn btn-default new" data-toggle="modal" data-target="#newUser">Yeni Kullanıcı Ekle</button> --}}

@endsection

@section('side-content')
	@include('pages.adminpages.kullaniciislemleri.createuser')
@endsection