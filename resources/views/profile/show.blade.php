@extends('layouts.default')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">用户基本信息</div>
				<div class="panel-body">
					{{Auth::user()}}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection