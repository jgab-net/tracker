<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tracking</title>

    {{ HTML::style('vendor/bootstrap/css/bootstrap.min.css') }}
    {{ HTML::style('vendor/bootstrap/css/bootstrap-theme.min.css') }}
    {{ HTML::style('vendor/font-awesome/css/font-awesome.min.css') }}
    {{ HTML::style('vendor/toastr/css/toastr.min.css') }}
    {{ HTML::style('css/main.css') }}
    @yield('style')
</head>
<body>
    <header class="head">
        <nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ URL::to('/') }}">Tracking</a>
                </div>
                @if(Auth::check())
                    <div class="collapse navbar-collapse" id="nav">
                        <div class="navbar-form navbar-right">
                            <span class="text-warning">{{ Auth::user()->name }}</span>
                            <a nohref class="btn btn-default" data-loading-text="Loading..." id="synchronize">Synchronize <i class="fa fa-terminal"></i></a>
                            <a href="{{ URL::to('exit') }}" class="btn btn-danger"><i class="fa fa-sign-out"></i></a>
                        </div>
                    </div>
                @endif
            </div>
        </nav>
    </header>
    <section class="container">
        @yield('content')
    </section>
    <footer id="footer">
        @yield('footer')
    </footer>

    {{ HTML::script('vendor/jquery/jquery-2.1.1.min.js') }}
    {{ HTML::script('vendor/bootstrap/js/bootstrap.min.js') }}
    {{ HTML::script('vendor/toastr/js/toastr.min.js') }}
    {{ HTML::script('js/messages.js') }}
    {{ HTML::script('js/main.js') }}

    <script type="text/javascript">
        var environment = {{ $jsEnv }};
    </script>



    @if($errors->any())
    <script type="text/javascript">
        $(function(){
           new Messages().addLaravelMessage({{ $errors->toJson() }}).show();
        })
    </script>
    @endif
    @yield('script')

</body>
</html>
