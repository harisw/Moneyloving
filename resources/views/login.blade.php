<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Jarmul Project 3 Group 3</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/simple-line-icons.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/landing-page.min.css')}}" rel="stylesheet">

  </head>

  <body>

	<div class="wrapper" style="background-color: #333;">
		<div class="container">    
			<div id="loginbox" style="margin-top:130px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
				<div class="panel panel-info" >
					<div class="panel-heading">
						<div class="panel-title">
							<i class="fa fa-building"></i> Jarmul 3
						</div>
					</div>     
					<div style="padding-top:30px" class="panel-body" >
						@if (session('status'))
							<div class="alert alert-warning">
								{{ session('status') }}
							</div>
						@endif
						<form id="loginform" class="form-horizontal" role="form" method="post" action="{{url('/login')}}">
							{{ csrf_field() }}
							<div style="margin-bottom: 25px" class="input-group">
								<span class="input-group-addon" style="border-right: 1px #E3E3E3 solid;">
									<i class="fa fa-user"></i>
								</span>
								<input id="login-username" type="text" class="form-control" name="username" value="" placeholder="Username">                                        
							</div>
							<div style="margin-bottom: 25px" class="input-group">
								<span class="input-group-addon" style="border-right: 1px #E3E3E3 solid;">
									<i class="fa fa-lock"></i>
								</span>
								<input id="login-password" type="password" class="form-control" name="password" placeholder="password">
							</div>
							<!-- <div class="input-group">
								<div class="text-right" style="font-size: 90%; position: relative; top:-10px">
									<a href="#">Lupa Password?</a>
								</div>
							</div> -->
							<div style="margin-top:10px" class="form-group">
								<!-- Button -->
								<div class="col-sm-12 controls">
									<button id="btn-login" type="submit" class="btn btn-primary btn-fill" style="width: 100%;">
										Masuk  
									</button>
								</div>
								<div class="col-sm-12 controls">
									<a href="{{url('/register')}}"> Don't have accounts? Register </a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>