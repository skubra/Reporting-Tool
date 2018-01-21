    <div id="yeniRapor" class="modal fade" role="dialog" tabindex="-1">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Yeni Rapor Ekle</h4>
          </div>

          <div class="modal-body">

            <form action="{{ route('raporislemleri.store') }}" method="POST">
              {{ csrf_field() }}
            <div>
                {{ Form::label('Menü ID') }}
                {{ Form::text('menuid', '', ["class" => 'form-control']) }}
            </div>

            <br>
            <div>
                {{ Form::label('Başlık') }}
                {{ Form::text('title', '', ["class" => 'form-control']) }}
            </div>

            <br>
            <div>
                {{ Form::label('Veri Tabanı Sorgusu') }}
                {{ Form::text('dbquery', '', ["class" => 'form-control']) }}
            </div>
            <br>

            @php ($authority_groups = \App\AuthorityGroup::all())
            <div class="">
                {{ Form::label('Yetki Grupları') }}
                @foreach ($authority_groups as $auth_group)
                    <br>
                    {{-- {{ Form::checkbox('group', $auth_group->id, false) }}
                    {{ Form::label($auth_group->title ) }} --}}
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
            <div>
              <button id="addParam" type="button" class="btn btn-default" style="display: block; margin: 0 auto; background-color: #1B5B83; color: white;">Parametre Ekle</button>
            </div>

            <button type="submit" class="btn btn-default">Ekle</button>

            </form>
          </div>
        </div>
      </div>
    </div>