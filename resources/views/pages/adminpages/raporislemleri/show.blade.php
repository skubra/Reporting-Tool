@extends('layouts.adminApp')

@section('title', 'Rapor ')

@section('content')

  <h2>{{ $report->title }}</h2>
  {!! $report->formcontent !!}

@endsection
