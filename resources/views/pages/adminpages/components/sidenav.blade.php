
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<div class="nav-side-menu">

        <div class="menu-list">

            <ul id="admin-menu-content" class="menu-content collapse out">

                <div class="brand">
                    <strong>Kayseri</strong><br>Ulaşım
                </div>

                <li data-toggle="collapse" data-target="#user" class="collapsed">
                    <a href="/admin"><i class="glyphicon glyphicon-home"></i><h4 class="li-text">ANASAYFA</h4></a>
                </li>

                <li>
                    <a href="{{ route('raporislemleri.index') }}"><i class="glyphicon glyphicon-duplicate"></i><h4 class="li-text">RAPOR İŞLEMLERİ</h4></a>
                </li>
                {{-- <p><strong>Rapor</strong> Düzenleme İşlemleri</p> --}}

                <li>
                    <a href="{{ route('kullaniciislemleri.index') }}"><i class="glyphicon glyphicon-edit"></i><h4 class="li-text">KULLANICI İŞLEMLERİ</h4></a>
                </li>
                {{-- <p><strong>Kullanıcı</strong> İşlemleri</p> --}}

                <li>
                    <a href="{{ route('yetkigruplari.index') }}"><i class="glyphicon glyphicon-check"></i><h4 class="li-text">YETKİ<br>GRUPLARI</h4></a>
                </li>
                {{-- <p><strong>Kullanıcı</strong> Yetkilendirme İşlemleri</p> --}}

                <li>
                    <a href="{{ route('admin.logout') }}"><i class="glyphicon glyphicon-log-out"></i><h4 class="li-text">ÇIKIŞ</h4></a>
                </li>

            </ul>
     </div>
</div>
