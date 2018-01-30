@extends('layouts.user_one_col')

@section('title', 'Raporlama Sistemi Kullanıcı Giriş Ekranı')

@section('content-title')
	<h2>Raporlama Sistemi Kullanıcı Giriş Ekranı</h2>
@endsection

@section('content')

	<h5 style="text-align: center; margin-top:30px;"><strong>Son Eklenen Raporlar:</strong></h5>

	@include ('pages.userpages.components.latest-rapor')

@endsection
