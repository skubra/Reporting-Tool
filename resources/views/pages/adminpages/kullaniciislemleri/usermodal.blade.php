<div id="newUser" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Yeni Kullanıcı Ekle</h4>
      </div>
      <div class="modal-body">

        {!! Form::model(['route' => ['kullaniciislemleri.store'], 'method' => 'POST']) !!}
             {{ csrf_field() }}

            {{ Form::label('name', 'Ad Soyad') }}
            {{ Form::text('name', '', ["class" => 'form-control']) }}

            {{ Form::label('sicilno', 'Sicil No') }}
            {{ Form::text('sicilno', '', ["class" => 'form-control']) }}

            {{ Form::label('email', 'E Mail') }}
            {{ Form::text('email', '', ["class" => 'form-control']) }}

            {{ Form::label('password', 'Şifre') }}
            {{ Form::password('password', ["class" => 'form-control']) }}

            @php ($authority_groups = \App\AuthorityGroup::pluck('title', 'id'))
            {{ Form::label('group', "Parametre Türü:" ) }}
            {{ Form::select('group', $authority_groups, '', ['class' => 'form-control']) }}
            <br>

            <div class="modal-footer">
                {{ Form::submit('Ekle', ["class" => 'form-control btn btn-danger']) }}
            </div>

        {!! Form::close() !!}

      </div>

    </div>

  </div>
</div>