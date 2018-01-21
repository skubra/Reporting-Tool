@component('mail::message')

#Sayın {{ $user->name }}
Raporlama Sistemi kullanıcı bilgileriniz aşağıdaki gibidir.
<hr>

<div class="info">
<br>
    <h3>Ad-Soyad: {{ $user->name }}</h3>
    <h3>Sicil No: {{ $user->sicilno }}</h3>
    <h3>E-Mail: {{ $user->email }}</h3>
    <h3>Şifreniz sicil numaranızdır.*</h3>
</div>


@component('mail::subcopy')
    <i>*Giriş yaparak değiştirmeniz tavsiye edilmektedir.</i>
@endcomponent

@component('mail::button', ['url' => 'raporsist.dev/login'])
    Buradan giriş yaparak bilgilerinizi düzenleyebilirsiniz.
@endcomponent

Saygılarımızla, <br>
Kayseri Ulaşım
@endcomponent
