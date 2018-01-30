@extends('layouts.admin_two_col')

@section('title', 'Yetki Grupları')

@section('main-title')
    <h2>Yetki Gruplarını Düzenle</h2>
@endsection

@section('side-title')
    <h2>Yetki Grubu Ekle</h2>
@endsection

@section('content')

	<div class="row">

		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
				    <tr>
				      <th>ID</th>
				      <th>Başlık</th>
				      <th>Yetkisi Bulunmayan Raporlar<br>ID | Başlık</th>
				      <th>Kullanıcı Sayısı</th>
				    </tr>
				</thead>
				<tbody>
				    @foreach($groups as $group)
				      @include('pages.adminpages.yetkigruplari.groups')
				    @endforeach
				</tbody>
			</table>
		</div>

	</div>

@endsection

@section('side-content')
	@include('pages.adminpages.yetkigruplari.creategroup')
@endsection