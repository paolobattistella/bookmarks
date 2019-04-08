@extends('layouts.admin')

@section('content')
{{ Breadcrumbs::render('admin.categories_index') }}

<div class="tile is-ancestor">
    <div class="tile is-parent">
        <article class="tile is-child box">
            <nav class="level">
                <div class="level-left">
                    <div class="level-item"><h4 class="title">Categorie</h4></div>
                </div>
                <div class="level-right">
                    <div class="level-item"><a href="{{ route('admin.categories_add') }}" class="is-icon has-text-info" title="Nuova categoria"><i class="mdi mdi-36px mdi-plus-box"></i></a></div>
                </div>
            </nav>
            <div id="category_table">
                <category-table></category-table>
            </div>
        </article>
    </div>
</div>
@endsection
