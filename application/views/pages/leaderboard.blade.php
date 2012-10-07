@layout('templates.main')
@section('content')
<div id="subheader">	
	<div class="inner">
		<div class="container">
			<h1>Leaderboard</h1>
		</div> <!-- /.container -->
	</div> <!-- /inner -->
</div> <!-- /subheader -->
<div id="subpage">
	<div class="container">
		<div class="row">		
			<div class="span8">					
					<table class="table table-striped table-condensed">
						<caption>
							These are our community users.
						</caption>
						<thead>
							<tr>
								<th>id</th>
								<th>Provider</th>
								<th>Name</th>
								<th>Nickname</th>
								<th>e-mail</th>
								<th>url</th>
								<th>Since</th>
							</tr>
						</thead>
						<tbody>
						<?php $users = User::all() ?>
						@foreach ($users as $user)
                 		<tr>
                 			<td>{{$user->id}}</td>
                 			<td>{{$user->provider}}</td>
                 			<td>{{$user->name}}</td>
                 			<td>{{$user->nickname}}</td>
                 			<td>{{$user->email}}</td>                 			
                 			<td>{{HTML::link($user->url, 'page')}}</td>                 			
                 			<td>{{$user->created_at}}</td>
                 		</tr>
              			@endforeach     
						</tbody>
					</table>
			</div> <!-- /span8 -->
			<div class="span4">
				<div class="sidebar">
					<h3><span class="slash">About the Leaderboard</span></h3>
					<p>
					Here you will find a reference to users of our community.</p>
				</div> <!-- /sidebar -->
			</div> <!-- /span4 -->
		</div> <!-- /row -->
	</div> <!-- /container -->	
</div> <!-- /subpage -->   
@endsection