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
                <p class="card-header-title">
                    Events
                </p>
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
                            <tr>
                                <td width="5%"><i class="fa fa-bell-o"></i></td>
                                <td>Lorum ipsum dolem aire</td>
                                <td><a class="button is-small is-primary" href="#">Action</a></td>
                            </tr>
                            <tr>
                                <td width="5%"><i class="fa fa-bell-o"></i></td>
                                <td>Lorum ipsum dolem aire</td>
                                <td><a class="button is-small is-primary" href="#">Action</a></td>
                            </tr>
                            <tr>
                                <td width="5%"><i class="fa fa-bell-o"></i></td>
                                <td>Lorum ipsum dolem aire</td>
                                <td><a class="button is-small is-primary" href="#">Action</a></td>
                            </tr>
                            <tr>
                                <td width="5%"><i class="fa fa-bell-o"></i></td>
                                <td>Lorum ipsum dolem aire</td>
                                <td><a class="button is-small is-primary" href="#">Action</a></td>
                            </tr>
                            <tr>
                                <td width="5%"><i class="fa fa-bell-o"></i></td>
                                <td>Lorum ipsum dolem aire</td>
                                <td><a class="button is-small is-primary" href="#">Action</a></td>
                            </tr>
                            <tr>
                                <td width="5%"><i class="fa fa-bell-o"></i></td>
                                <td>Lorum ipsum dolem aire</td>
                                <td><a class="button is-small is-primary" href="#">Action</a></td>
                            </tr>
                            <tr>
                                <td width="5%"><i class="fa fa-bell-o"></i></td>
                                <td>Lorum ipsum dolem aire</td>
                                <td><a class="button is-small is-primary" href="#">Action</a></td>
                            </tr>
                            <tr>
                                <td width="5%"><i class="fa fa-bell-o"></i></td>
                                <td>Lorum ipsum dolem aire</td>
                                <td><a class="button is-small is-primary" href="#">Action</a></td>
                            </tr>
                            <tr>
                                <td width="5%"><i class="fa fa-bell-o"></i></td>
                                <td>Lorum ipsum dolem aire</td>
                                <td><a class="button is-small is-primary" href="#">Action</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <footer class="card-footer">
                <a href="#" class="card-footer-item">View All</a>
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
