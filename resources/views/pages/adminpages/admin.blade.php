@extends('layouts.admin_one_col')

@section('title', 'Raporlama Sistemi Yönetici Giriş Ekranı')

@section('content-title')
    <h2>Raporlama Sistemi Yönetici Giriş Ekranı</h2>
@endsection

@section('content')

{{--     
    <table align="center">
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
    </table> 
--}}

    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto; margin-top: 20px;"></div>


@endsection
