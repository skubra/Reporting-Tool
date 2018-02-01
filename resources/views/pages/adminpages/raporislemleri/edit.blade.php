@extends('layouts.admin_two_col')

@section('title', 'Rapor Düzenle')

@section('main-title')
    <h2>Rapor İçerik Düzenle</h2>
@endsection

@section('side-title')
    <h2>Rapor Düzenle</h2>
@endsection

@section('content')

    @foreach ($form_elements as $element)
        <br><br>

        <div class="forms">
           <div>
              {{ Form::label($element['name']."_t", "Parametre Türü:" ) }}
              {{ Form::select($element['name']."_t",
                      ['text' => 'Text',
                       'date' => 'Tarih',
                       'checkbox' => 'Onay Kutusu',
                       'select' => 'Seçenek Listesi'],
                      $element['type'], ['class' => 'form-control'])}}
              <br>
              {{ Form::label($element['name']."_l", "Parametre Başlığı:" ) }}
              {{ Form::text($element['name']."_l", $element['label'], ['class' => 'form-control']) }}
            </div>

            <br>
            <div class="center-item">
              <button class="btn btn-default">Parametreyi Sil</button>
            </div>
        </div>
    @endforeach

    <br>
    <button class="btn btn-default btn-add">Parametre Ekle</button>

@endsection

@section('side-content')

  <div class="edit-report">
      {!! Form::model($report, ['route' => ['raporislemleri.update', $report->id], 'method' => 'PUT']) !!}
          {{ csrf_field() }}

          {{ Form::label('menuid', 'Menü ID:') }}
          {{ Form::text('menuid', null, ["class" => 'form-control']) }}
          
          <br>
          {{ Form::label('title', "Başlık:" ) }}
          {{ Form::text('title', null, ['class' => 'form-control']) }}

          <br>
          {{ Form::label('connection', "DB Connection:" ) }}
          {{ Form::text('connection', null, ['class' => 'form-control']) }}
          
          <br>
          {{ Form::label('dbquery', "Veritabanı Sorgusu:" ) }}
          {{ Form::text('dbquery', null, ['class' => 'form-control']) }}
          
          <br>

          <div class="center-item">
            {{ Form::submit('Kaydet', ['class' => 'btn btn-default btn-save']) }}
          </div>

      {!! Form::close() !!}
  </div>

@endsection

@section('scripts')
  <script src="{{ asset('js/admin/raporislemleri-edit.js') }}"></script>
@endsection
