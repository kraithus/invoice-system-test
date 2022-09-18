<!DOCTYPE html>
<html lang="en">

<head>
	<title>iquote </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Scripts -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/fa/css/all.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/la/css/line-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <!---MAIN NAV--->
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark" aria-labelledby="">
        <a class="navbar-brand" href="#">
            <h2>ORG</h2>
        </a>

        <ul class="nav_tool ml-auto">
            <li class="dropdown">
                <a class="dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset('assets/images/user-icon.png') }}" width="25" height="25" class="rounded-circle" alt="">
                </a>
				<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left"
					aria-labelledby="navbarDropdownMenuLink">
					<a class="dropdown-item" href="#"><span class="la la-user-edit"></span> Edit Profile</a>
					<form method="POST" action="{{ route('logout') }}">
						@csrf
						<a class="dropdown-item" :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                Log Out
						</a>
					</form>
				</div>
			</li>
			<li>
				<a href=""><span class="la la-envelope"><span class="badge badge-light">@livewire('unread-notifications-count')</span></span></a>
			</li>

        </ul>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarMenu"
            aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="la la-bars"></span>
        </button>
    </nav>
    <!---MAIN NAV--->

    <div class="container-fluid">
        <div class="row">

            <!---SIDE BAR--->
			<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" aria-label="">
				<div class="sidebar-sticky pt-3">
					<ul class="side_nav list-unstyled flex-column px-3 pt-2 pb-4">
						<li class="active"><a class="text-decoration-none px-3 py-2 d-block" href="#"><span class="la la-home"></span> Home</a></li>
						<li class=""><a class="text-decoration-none px-3 py-2 d-block" href="customer/create"><span class="la la-user-plus"></span> Add Customer</a></li>
						<li class=""><a class="text-decoration-none px-3 py-2 d-block" href="job/create"><span class="la la-briefcase"></span> New Job</a></li>
						<li class=""><a class="text-decoration-none px-3 py-2 d-block" href="quotation"><span class="la la-th-list"></span> Your Quotations</a></li>
					</ul>
				</div>
			</nav>
            <!---SIDE BAR--->

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <!---Pangani div apapa---->
                <div class="row">
                    <div class="col-md-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><span class="la la-home"></span> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Notifications</li>
                            </ol>
                        </nav>
                    </div>
                    @if(session()->has('message'))
					<div class="col-md-12">
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							{{ session()->get('message') }}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  </div>
					</div>
					@endif
                    <div class="col-md-12">
                        <div class="box">
                            <h4 class="block-title">Notifications <span class="la la-eye"></span></h4>
                            <div class="title-border"></div>
                            <ul class="note_list">
                                @foreach ($notifications as $notification)
                                <li>
                                    <div class="note_body">
                                        <h4 data-toggle="collapse" data-target="#noteCollapse{{ $notification->id }}" aria-expanded="false"
                                            aria-controls="collapseExample">
                                            {{ $notification->title }}
                                        </h4>
                                        <div class="collapse" id="noteCollapse{{ $notification->id }}">
                                            <div class="box note_box">
                                                {{ $notification->body }}.
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/js/popper.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>

</html>