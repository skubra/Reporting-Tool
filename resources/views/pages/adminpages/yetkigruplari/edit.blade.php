@extends('layouts.adminApp')

@section('title', 'Kullanıcı Yetkilendirme İşlemleri')

@section('main-title')
    <h2>{{ $group->title }} Yetkileri Düzenle</h2>
@endsection

@section('side-title')
    <h2>{{ $group->title }} | Başlık Düzenle</h2>
@endsection

@section('content')

    <div class="edit-permissions">
        {!! Form::model($group, ['route' => ['yetkigruplari.update', $group->id], 'method' => 'PUT']) !!}
        {{ csrf_field() }}

            <div class="row">
                <div class="panel panel-default">

                    <div class="panel-heading clearfix">
                        <h4 class="pull-left">Yetkisi Var</h4>
                    </div>

                    <div class="panel-body" style="max-height: 300px; overflow-y: auto;">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Menü</th>
                                    <th>Başlık</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="list1">
                                @foreach ($menus as $menu)
                                    @foreach ($menu->reports as $report)
                                        @if (!in_array($report->id, array_column($group->prohibited_reports->toArray(), 'id') ))
                                        {{-- Kullanıcının yetkisi olmayan raporların dışındaki raporlar yazdırılıyor. --}}
                                        <tr>
                                            <td><input size="3" class="form-control" type="text" value="{{ $report->id }}" readonly></td>
                                            <td class="{{$menu->id}}">{{ $menu->title }}</td>
                                            <td>{{ $report->title }}</td>
                                            <td><button class="btn btn-default remove-permission">Yetki Kaldır</button></td>
                                        </tr>
                                        @endif
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="panel panel-default">

                    <div class="panel-heading clearfix">
                        <h4 class="pull-left">Yetkisi Yok</h4>
                        {{-- <button class="btn btn-default pull-right" id="addPerm" style="float:right;">Yetkileri Ekle</button> --}}
                    </div>

                    <div class="panel-body" style="max-height: 300px; overflow-y: auto;">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Menü</th>
                                    <th>Başlık</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="list2">
                                @foreach ($menus as $menu)
                                    @foreach ($menu->reports as $report)

                                        @if (in_array($report->id, array_column($group->prohibited_reports->toArray(), 'id') ))
                                        {{-- Kullanıcının yetkisi olmayan raporların dışındaki raporlar yazdırılıyor. --}}
                                        <tr>
                                            <td><input size="3" class="form-control" name="list[]" type="text" value="{{ $report->id }}" readonly></td>
                                            <td class="{{$menu->id}}">{{ $menu->title }}</td>
                                            <td>{{ $report->title }}</td>
                                            <td><button class="btn btn-default add-permission">Yetkilendir</button></td>
                                        </tr>
                                        @endif

                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        <div class="center-item">
            <button type="submit" class="btn btn-default btn-save-edit">Kaydet</button>
        </div>

        {!! Form::close() !!}
    </div>

@endsection

@section('side-content')
    {!! Form::model($group,['route' => ['yetkigruplari.update.title',$group->id], 'method' => 'PUT']) !!}

        {{ csrf_field() }}

        {{ Form::label('title', 'Başlık') }}
        {{ Form::text('title', null, ["class" => 'form-control']) }}
        <br>
        {{ Form::submit('Düzenle', ["class" => 'form-control btn btn-warning']) }}

    {!! Form::close() !!}
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){

            var counter=0;

            $( "#list1" ).on( "click", ".menuCollapse", function( evt ) {
                // Menü İçindeki Raporları Göster/Gizle
                $(this).toggleClass("collapsed").nextUntil('tr.menuCollapse').toggle();
            });

            // $( "#list1" ).on( "click", ".collapse", function( evt ) {
            //     // Tüm Menüden Yetki Kaldır

            // });

            $( "#list1" ).on( "click", ".remove-permission", function( evt ) {
                // Yetki Kaldır
                evt.preventDefault();
                console.log($(this).closest("tr").find('input'));
                $(this).closest("tr").find('input').attr("name","list[]");
                $(this).removeClass("remove-permission").addClass("add-permission");
                $(this).text("Yetkilendir");
                $(this).closest("tr").appendTo("#list2");
                counter++;
            });

            $( "#list2" ).on( "click", ".add-permission", function( evt ) {
                //Yetkilendir
                evt.preventDefault();
                console.log($(this).closest("tr").find('input'));
                $(this).closest("tr").find('input').removeAttr("name");
                $(this).removeClass("add-permission").addClass("remove-permission");
                $(this).text("Yetki Kaldır");
                $(this).closest("tr").appendTo("#list1");
            });

        });
    </script>
@endsection
