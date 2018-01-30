@extends('layouts.admin_two_col')

@section('title', 'Rapor ')

@section('content')

  <h2>{{ $report->title }}</h2>
  {!! $report->formcontent !!}

@endsection
