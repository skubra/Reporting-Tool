@extends('layouts.admin_two_col')

@section('title', 'Rapor İşlemleri')

@section('main-title')
    <h2>Rapor Düzenleme İşlemleri</h2>
@endsection

@section('side-title')
    <h2>Yeni Rapor Ekle</h2>
@endsection

@section('content')

	<div class="table-responsive">
		<table class="table table-striped" id="raporsistTable">
			<thead>
			    <tr>
			      <th>ID</th>
			      <th>Rapor Başlık</th>
			      <th>Kategori</th>
                  <th>DB Connection</th>
			      <th></th>
			    </tr>
			</thead>
			<tbody>
				@foreach($reports->reverse() as $report)
			    	<tr>
			    		<th scope="row">{{ $report->id }}</th>
						<td>
							<a class="" href="{{ route('raporislemleri.show',$report->id) }}">{{ $report->title }}</a>
						</td>
						<td>{{ $report->menu->title }}</td>
                        <td>{{ $report->connection }}</td>
						<td>
							<div class="buttons">
								{!! Form::open(['route' => ['raporislemleri.edit', $report->id], 'method' => 'GET']) !!}
								{!! Form::submit('Düzenle', ['class' => 'btn btn-primary btn-sm']) !!}
								{!! Form::close() !!}
								
                                {!! Form::open(['route' => ['raporislemleri.destroy', $report->id], 'method' => 'DELETE', 'onsubmit' => 'return confirm("Raporu silmek istiyor musunuz?")']) !!}
								{!! Form::submit('Sil', ['class' => 'btn btn-danger btn-sm']) !!}
								{!! Form::close() !!}
                                
                                {!! Form::open(['route' => ['graph.index', $report->id], 'method' => 'GET']) !!}
                                {!! Form::submit('Grafik Ekle/Düzenle', ['class' => 'btn btn-info btn-sm']) !!}
                                {!! Form::close() !!}
							</div>
 						</td>
			    	</tr>
			    @endforeach
			</tbody>
		</table>
	</div>

{{-- 	<div class="center-item">
		<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#yeniRapor" >Yeni Rapor Ekle</button>
	</div> --}}

@endsection

@section('side-content')

    <form action="{{ route('raporislemleri.store') }}" method="POST">
        {{ csrf_field() }}

        @php ($menus = \App\Menu::pluck('title', 'id'))

        {{ Form::label('menuid', "Kategori" ) }}
        {{ Form::select('menuid', $menus, null, ['class' => 'form-control']) }}

        <br>
        {{ Form::label('Başlık') }}
        {{ Form::text('title', '', ["class" => 'form-control']) }}

        <br>
        {{ Form::label('DB Connection') }}
        {{ Form::text('connection', '', ["class" => 'form-control']) }}

        <br>
        {{ Form::label('Veri Tabanı Sorgusu') }}
        {{ Form::text('dbquery', '', ["class" => 'form-control']) }}

        <br>
        @php ($authority_groups = \App\AuthorityGroup::all())
        <div class="">
            {{ Form::label('Yetki Grupları') }}
            <br>
            @foreach ($authority_groups as $auth_group)
                <label><input type="checkbox" name="group[]" value="{{ $auth_group->id }}">  {{ $auth_group->title }}</label>
            @endforeach
        </div>

        <br>
        <label for="type" style="margin-left:45%;">İçerik:</label>
        <br>
        <div class="input-group" id="readroot" style="margin-top: 10px; display: none;">
          <select class="form-control" name="type">
            <option>Text</option>
            <option>Tarih</option>
            <option>Onay Kutusu</option>
            <option>Seçenek Listesi</option>
          </select>

              <input style="margin-top:2px; margin-bottom: 2px;" type="text" name="label" placeholder="Alan Başlığı" class="form-control">

              <button type="button" class="btn btn-default" id="remove-node" style="display: block; margin: 0 auto;">Parametreyi Sil</button>
        </div>

            <span id="writeroot"></span>

            <br>
            <button id="addParam" type="button" class="btn btn-default" style="display: block; margin: 0 auto; background-color: #1B5B83; color: white;">Parametre Ekle</button>

            <br>
            <button type="submit" class="btn btn-default" style="display: block; margin: 0 auto;">Kaydet</button>

    </form>


        <div class="alert alert-error">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

@endsection

@section('scripts')
	<script src="{{ asset('js/admin/raporislemleri-create.js') }}"></script>
@endsection

