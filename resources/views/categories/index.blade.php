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
            <div class="table-responsive">
                <table class="table is-bordered is-striped is-hoverable is-fullwidth">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titolo</th>
                            <th>Creata il</th>
                            <th>Modificata il</th>
                            <th colspan="2">Azioni</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Titolo</th>
                            <th>Creata il</th>
                            <th>Modificata il</th>
                            <th colspan="2">Azioni</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if (sizeof($categories)>0)
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->title }}</td>
                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $category->created_at)->toDayDateTimeString() }}</td>
                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $category->updated_at)->toDayDateTimeString() }}</td>
                                <td><a href="{{ route('admin.categories_edit', ['id' => $category->id]) }}" class="is-icon has-text-info"><i class="mdi mdi-24px mdi-playlist-edit"></i></a></td>
                                <td><a href="{{ route('admin.categories_edit', ['id' => $category->id]) }}" class="is-icon has-text-danger"><i class="mdi mdi-24px mdi-delete"></i></a></td>
                            </tr>
                            @endforeach
                        @else
                        <tr>
                            <td colspan="6">Nessuna categoria</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            {{ $categories->links('elements.pagination') }}
        </article>
    </div>
</div>
@endsection
