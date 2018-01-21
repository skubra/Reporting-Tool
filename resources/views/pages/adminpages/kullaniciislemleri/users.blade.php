<tr>
  <th scope="row">{{ $user->id }}</th>
  <td>{{ $user->name }}</td>
  <td>{{ $user->sicilno }}</td>
  <td>{{ $user->active }}</td>
  @php ($auth_group = \App\AuthorityGroup::find($user->group))
  <td>{{ $auth_group->title }}</td>
  <td>
  	<div class="buttons">
  		<a class="btn btn-primary btn-sm" href="{{ route('kullaniciislemleri.edit',$user->id) }}">Düzenle</a>
  	</div>
  </td>
</tr>
