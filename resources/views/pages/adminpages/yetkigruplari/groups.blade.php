<tr>
	<th scope="row">{{ $group->id }}</th>
	<td> {{ $group->title }} </td>
	<td>
		<div class="perm-scroll" style="overflow: scroll; height: 35px; float:left; margin-right: 10px;">
			@foreach ($group->prohibited_reports as $element)
				{{ $element->id }} | {{ $element->title }} <br>
			@endforeach
		</div>
	</td>
	<td></td>
	<td>
		<a class="btn btn-primary btn-sm" href="{{ route('yetkigruplari.edit',$group->id) }}">Düzenle</a>
		{!! Form::open(['route' => ['yetkigruplari.destroy', $group->id], 'method' => 'DELETE', 'onsubmit' => 'return confirm("Yetki grubunu silmek istiyor musunuz?")']) !!}
		{!! Form::submit('Sil', ['class' => 'btn btn-danger btn-sm']) !!}
		{!! Form::close() !!}
	</td>
</tr>
