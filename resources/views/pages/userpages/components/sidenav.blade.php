
<nav class="sidebar">

    <div class="nav-side-menu">
        <div class="menu-list">
            <ul id="menu-content" class="collapse navbar-collapse">

                <div class="brand">
                    <strong>Kayseri</strong>Ulaşım
                </div>

                <li>
                  <a href="/home"><i class="glyphicon glyphicon-home"></i>Ana Sayfa</a>
                </li>

                <li data-toggle="collapse" data-target="#user" class="collapsed">
                    <a href="#"><i class="glyphicon glyphicon-user"></i>{{ Auth::guard('web')->user()->name }}</a>
                </li>
                    <ul class="sub-menu collapse" id="user">
                        <li>
                            <a href="{{ route('userpage.index') }}"><i class="glyphicon glyphicon-menu-right"></i>Kullanıcı İşlemleri</a>
                        </li>
                        <li>
                            <a href="{{ route('user.logout') }}"><i class="glyphicon glyphicon-menu-right"></i>Güvenli Çıkış</a>
                        </li>
                    </ul>

            </ul>

            <ul id="search-content" class="collapse navbar-collapse">
                <div id="search" class="panel-collapse">
                    <div class="input-group">
                        <input type="text" class="awesomplete form-control" placeholder="Rapor Ara" list="raporlist" id="awe"/>
                        <datalist id="raporlist">
                            @foreach ($reports as $report)
                                <option value="{{ route('rapor.showcontent',$report) }}">{!! $report->title !!}</option>
                            @endforeach
                        </datalist>
                    </div>
                </div>
            </ul>

            <ul id="reports-content" class="collapse navbar-collapse">
                <div class="grouping-title">
                    <strong>Raporlar</strong>
                </div>

                @foreach ($menus as $menu)
                    <li  data-toggle="collapse" data-target="#dat{{ $menu->id }}" class="collapsed">
                        <a href="#"><i class="glyphicon glyphicon-list-alt"></i> {{ $menu->title }} <span class="arrow"></span></a>
                    </li>
                    <ul class="sub-menu collapse" id="dat{{ $menu->id }}">
                        @foreach ($menu->reports as $report)
                            @php ($authority_group = \App\AuthorityGroup::find(Auth::user()->group))
                            @if (!in_array($report->id, array_column($authority_group->prohibited_reports->toArray(), 'id') ))
                                <li>
                                <a href="{{ route('rapor.showcontent',$report) }}"><i class="glyphicon glyphicon-menu-right"></i>{{ $report->title }}</a>
                            </li>
                            @endif
                        @endforeach
                    </ul>
                @endforeach

            </ul>
        </div>
    </div>

</nav>