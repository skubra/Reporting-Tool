@extends('layouts.userApp')

@section('title', 'Kullanıcı Giriş')

@section('side-title')
	<h2>Son Hareketler</h2>
@endsection

@section('main-title')
	<h2>Raporlama Sistemi Kullanıcı Giriş Ekranı</h2>
@endsection

@section('side-content')

@endsection

@section('main-content')

	<h5 style="text-align: center; margin-top:30px;"><strong>Son Eklenen Raporlar:</strong></h5>

	@include ('pages.userpages.components.latest-rapor')

@endsection
