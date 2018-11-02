@extends('layouts.admin')

@section('content')
<br/>
<section class="info-tiles">
    <div class="tile is-ancestor has-text-centered">
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title">{{ $counters['bookmarks']['label'] }}</p>
                <p class="subtitle">Segnalibri</p>
            </article>
        </div>
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title">{{ $counters['tags']['label'] }}</p>
                <p class="subtitle">Tag</p>
            </article>
        </div>
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title">{{ $counters['categories']['label'] }}</p>
                <p class="subtitle">Categorie</p>
            </article>
        </div>
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title">{{ $counters['clicks']['label'] }}</p>
                <p class="subtitle">Click</p>
            </article>
        </div>
    </div>
</section>
<div class="columns">
    <div class="column is-6">
        <div class="card events-card">
            <header class="card-header">
                <p class="card-header-title">Ultimi segnalibri</p>
                <a href="#" class="card-header-icon" aria-label="more options">
                  <span class="icon">
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                  </span>
                </a>
            </header>
            <div class="card-table">
                <div class="content">
                    <table class="table is-fullwidth is-striped">
                        <tbody>
                        @if ($latest_bookmarks->count() > 0)
                        @foreach ($latest_bookmarks as $bookmark)
                            <tr>
                                <td width="5%"><i class="fa fa-bell-o"></i></td>
                                <td>{{ $bookmark->title }}</td>
                                <td><a href="{{ route('admin.bookmarks_edit', ['id' => $bookmark->id]) }}" class="is-icon has-text-info"><i class="mdi mdi-24px mdi-playlist-edit"></i></a></td>
                            </tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <footer class="card-footer">
                <a href="{{ route('admin.bookmarks_index') }}" class="card-footer-item">Mostra tutti</a>
            </footer>
        </div>
    </div>
    <div class="column is-6">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    Inventory Search
                </p>
                <a href="#" class="card-header-icon" aria-label="more options">
  <span class="icon">
    <i class="fa fa-angle-down" aria-hidden="true"></i>
  </span>
</a>
            </header>
            <div class="card-content">
                <div class="content">
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-large" type="text" placeholder="">
                        <span class="icon is-medium is-left">
      <i class="fa fa-search"></i>
    </span>
                        <span class="icon is-medium is-right">
      <i class="fa fa-check"></i>
    </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    User Search
                </p>
                <a href="#" class="card-header-icon" aria-label="more options">
  <span class="icon">
    <i class="fa fa-angle-down" aria-hidden="true"></i>
  </span>
</a>
            </header>
            <div class="card-content">
                <div class="content">
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-large" type="text" placeholder="">
                        <span class="icon is-medium is-left">
      <i class="fa fa-search"></i>
    </span>
                        <span class="icon is-medium is-right">
      <i class="fa fa-check"></i>
    </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
