@extends('layouts.adminApp')
@section('title', 'Kullanıcı')

@section('content')
	<p>{{ $user->name }}</p>
@endsection