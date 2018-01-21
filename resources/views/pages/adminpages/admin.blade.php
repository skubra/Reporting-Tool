@extends('layouts.adminApp')

@section('title', 'Admin Giriş')

@section('main-title')
    <h2>Raporlama Sistemi Yönetici Giriş Ekranı</h2>
@endsection

@section('side-title')
    <h2>Son Hareketler</h2>
@endsection

@section('side-content')

@endsection

@section('content')

{{--     <table align="center">
        <tr>
            <th>Kullanıcı<br>Sayısı</th>
            <th>Aktif Kullanıcı<br>Sayısı</th>
            <th>Aktif Rapor<br>Sayısı</th>
        </tr>
        <tr>
            <td>{{$users->count()}}</td>
            <td>{{$activeuser}}</td>
            <td>{{$reports->count()}}</td>
        </tr>
    </table> --}}

    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto; margin-top: 20px;"></div>
{{--     <div class="row">
        <div class="col-md-6" id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        <div class="col-md-6" id="container3" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div> --}}

@endsection
