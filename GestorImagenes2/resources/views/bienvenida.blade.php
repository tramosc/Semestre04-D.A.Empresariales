@extends('app')

@section('content')

@if (Session::has('error'))
		<div class="alert alert-danger">
				<strong>whoops!</strong> Al parecer algo esta mal.<br><br>
				{{Session::get('error')}}
		</div>
@endif

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Inicio</div>

				<div class="panel-body">
					Por favor inicie sesión para usar el sistema.
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
