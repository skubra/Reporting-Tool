@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Kullanıcı Girişi</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="sicilno" class="col-md-4 control-label">Sicil No</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="sicilno" value="{{ old('sicilno') }}" required autofocus oninvalid="this.setCustomValidity('Sicil No giriniz')"
                                oninput="setCustomValidity('')">
                            </div>
                          
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Şifre</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required
                                oninvalid="this.setCustomValidity('Şifre giriniz')" oninput="setCustomValidity('')">

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Beni Hatırla
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-default red-button">
                                    Giriş
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Şifremi Unuttum
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
