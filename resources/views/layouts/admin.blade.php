<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bookmarks Admin - @yield('title')</title>
    <link rel="stylesheet" type="text/css" href="../../css/app.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div id="app">
        <!-- START NAV -->
        <nav class="navbar is-white">
            <div class="container">
                <div class="navbar-brand">
                    <a class="navbar-item brand-text" href="{{ route('admin.pages_dashboard') }}"><i class="mdi mdi-24px mdi-bookmark"></i> Bookmarks Admin</a>
                    <div class="navbar-burger burger" data-target="navMenu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <!--<div id="navMenu" class="navbar-menu">
                    <div class="navbar-start">
                        <a class="navbar-item" href="{{ route('admin.pages_dashboard') }}">Home</a>
                        <a class="navbar-item" href="{{ route('admin.bookmarks_index') }}">Bookmarks</a>
                        <a class="navbar-item" href="{{ route('admin.tags_index') }}">Tags</a>
                        <a class="navbar-item" href="{{ route('admin.categories_index') }}">Categories</a>
                    </div>
                </div>-->
            </div>
        </nav>
        <!-- END NAV -->
        <div class="container">
            <div class="columns">
                <div class="column is-3">
                    <aside class="menu">
                        <ul class="menu-list">
                            <li><a href="{{ route('admin.pages_dashboard') }}" {{ $current_route_name=='admin.pages_dashboard' ? 'class=is-active' : '' }}>Dashboard</a></li>
                        </ul>
                        <p class="menu-label">Gestione</p>
                        <ul class="menu-list">
                            <li><a href="{{ route('admin.bookmarks_index') }}" {{ $current_route_name=='admin.bookmarks_index' ? 'class=is-active' : '' }}>Segnalibri</a></li>
                            <li><a href="{{ route('admin.categories_index') }}" {{ $current_route_name=='admin.categories_index' ? 'class=is-active' : '' }}>Categorie</a></li>
                            <li><a href="{{ route('admin.tags_index') }}" {{ $current_route_name=='admin.tags_index' ? 'class=is-active' : '' }}>Tag</a></li>
                            <li><a href="{{ route('admin.clicks_index') }}" {{ $current_route_name=='admin.clicks_index' ? 'class=is-active' : '' }}>Click</a></li>
                        </ul>
                    </aside>
                </div>
                <div class="column is-9">
                    @if(session()->get('success'))
                    <div class="notification is-success">{{ session()->get('success') }}</div>
                    @elseif(session()->get('warning'))
                    <div class="notification is-warning">{{ session()->get('warning') }}</div>
                    @elseif(session()->get('error'))
                    <div class="notification is-danger">{{ session()->get('error') }}</div>
                    @elseif ($errors->any())
                    <div class="notification is-danger">Si è verificato un problema.</div>
                    @elseif(session()->get('message'))
                    <div class="notification is-info">{{ session()->get('message') }}</div>
                    @endif

                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @routes
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>
