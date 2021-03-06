@extends('layouts.app')

@section('mainstyle')
  @include('inc.mainstyle')
@endsection
@section('mainscript')
  @include('inc.mainscript')
@endsection

@section('back')
	style="background-color: #212529;
@endsection

@section('content')

<div class="container">
	<div class="card" style="height: auto; color:#212529; background-color: #FFFFFF;">
		<div class="card-header">
			<ul class="nav nav-tabs card-header-tabs">
				<li class="nav-item">
					<a class="nav-link @yield('opportunities_tab')" href="/opportunity">All<span class="badge">{{ implode($countArray["AllCount"]) }}</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link @yield('scholarships_tab')" href="/scholarship">Scholarships<span class="badge">{{ implode($countArray["ScholarCount"]) }}</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link @yield('internships_tab')" href="/internship">Internships<span class="badge">{{ implode($countArray["InternsCount"]) }}</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link @yield('contests_tab')" href="/contests">Contests<span class="badge">{{ implode($countArray["ContestsCount"]) }}</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link @yield('volunteering_tab')" href="/volunteering">Volunteering<span class="badge">{{ implode($countArray["VolCount"]) }}</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link @yield('exchange_programs_tab')" href="/exchange_programs">Exchange Programs<span class="badge">{{ implode($countArray["ExchCount"]) }}</span></a>
				</li>
			</ul>
		</div>

		<div class="card-body">
			@yield('postsArea')
		</div>
	</div>
</div>	
@endsection