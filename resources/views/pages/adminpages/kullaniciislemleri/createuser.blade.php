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

    {{ Form::label('password_confirmation', 'Şifreyi Tekrar Giriniz') }}
    {{ Form::password('password_confirmation', ["class" => 'form-control']) }}

    @php ($authority_groups = \App\AuthorityGroup::pluck('title', 'id'))
    {{ Form::label('group', "Yetki Grubu" ) }}
    {{ Form::select('group', $authority_groups, '', ['class' => 'form-control']) }}
    <br>

    {{ Form::submit('Ekle', ["class" => 'form-control btn btn-warning']) }}

{!! Form::close() !!}
