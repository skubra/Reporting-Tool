<div class="table-responsive">
	<table class="table table-striped" id="raporsistTable">
		<thead>
		    <tr>
		      <th>Menü Başlık</th>
		      <th>Rapor Başlık</th>
		    </tr>
		</thead>
		<tbody>
			@php ($authority_group = \App\AuthorityGroup::find(Auth::user()->group))
			@foreach($reports->reverse()->slice($reports->count()-5, $reports->count()-1) as $report)
				@if (!in_array($report->id, array_column($authority_group->prohibited_reports->toArray(), 'id') ))
		    	<tr>
		    		<td>{{ $report->menu->title }}</td>
					<td>
						<a class="" href="{{ route('rapor.showcontent',$report) }}">{{ $report->title }}</a>
					</td>
		    	</tr>
		    	@endif
		    @endforeach
		</tbody>
	</table>
</div>
