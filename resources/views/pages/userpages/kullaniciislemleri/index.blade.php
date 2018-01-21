@extends('layouts.userApp')

@section('title', 'Kullanıcı İşlemleri')

@section('main-title')
	<h2>Kullanıcı İşlemleri / {{ Auth::guard('web')->user()->name }}</h2>
@endsection

@section('side-title')
	<h2>Son İşlemler</h2>
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

@section('side-content')

@endsection