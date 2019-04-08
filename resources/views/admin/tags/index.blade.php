@extends('layouts.admin')

@section('breadcrumb')
{{ Breadcrumbs::render('admin.tags_index') }}
@endsection

@section('content')
<div class="tile is-ancestor">
    <div class="tile is-parent">
        <article class="tile is-child box">
            <nav class="level">
                <div class="level-left">
                    <div class="level-item"><h4 class="title">Tag</h4></div>
                </div>
                <div class="level-right">
                    <div class="level-item"><a href="{{ route('admin.tags_add') }}" class="is-icon has-text-info" title="Nuova categoria"><i class="mdi mdi-36px mdi-plus-box"></i></a></div>
                </div>
            </nav>
            <div id="tag_table">
                <tag-table :default-sort="created_at"></tag-table>
            </div>
        </article>
    </div>
</div>
@endsection
