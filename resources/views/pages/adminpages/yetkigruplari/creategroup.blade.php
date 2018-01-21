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

{!! Form::model(['route' => ['yetkigruplari.store'], 'method' => 'POST']) !!}
     {{ csrf_field() }}

    {{ Form::label('title', 'Başlık') }}
    {{ Form::text('title', '', ["class" => 'form-control']) }}

    <br>
    {{ Form::submit('Ekle', ["class" => 'form-control btn btn-warning']) }}


{!! Form::close() !!}
