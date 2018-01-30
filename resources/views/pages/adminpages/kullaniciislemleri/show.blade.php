@extends('layouts.admin_two_col')
@section('title', 'Kullanıcı')

@section('content')
	<p>{{ $user->name }}</p>
@endsection