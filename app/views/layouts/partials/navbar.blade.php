<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {{ link_to_route('home', 'Fawkes', null, ['class' => 'navbar-brand']) }}
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                @if (Auth::check())
                    {{ link_to_route('logout', 'Logout') }}
                @else
                    <a href="{{ login_url() }}">Login</a>
                @endif
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>