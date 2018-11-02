@extends('layouts.admin')

@section('content')
{{ Breadcrumbs::render('admin.bookmarks_index') }}

<div class="tile is-ancestor">
    <div class="tile is-parent">
        <article class="tile is-child box">
            <nav class="level">
                <div class="level-left">
                    <div class="level-item"><h4 class="title">Segnalibri</h4></div>
                </div>
                <div class="level-right">
                    <div class="level-item"><a href="{{ route('admin.bookmarks_add') }}" class="is-icon has-text-info" title="Nuova categoria"><i class="mdi mdi-36px mdi-plus-box"></i></a></div>
                </div>
            </nav>
            <div class="table-responsive">
                <table class="table is-bordered is-striped is-hoverable is-fullwidth">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titolo</th>
                            <th>Categoria</th>
                            <th>Creata il</th>
                            <th>Modificata il</th>
                            <th colspan="2">Azioni</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Titolo</th>
                            <th>Categoria</th>
                            <th>Creata il</th>
                            <th>Modificata il</th>
                            <th colspan="2">Azioni</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if ($bookmarks->count() > 0)
                            @foreach ($bookmarks as $bookmark)
                            <tr>
                                <td>{{ $bookmark->id }}</td>
                                <td>{{ $bookmark->title }}</td>
                                <td>{{ $bookmark->category->title }}</td>
                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $bookmark->created_at)->toDayDateTimeString() }}</td>
                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $bookmark->updated_at)->toDayDateTimeString() }}</td>
                                <td><a href="{{ route('admin.bookmarks_edit', ['id' => $bookmark->id]) }}" class="is-icon has-text-info"><i class="mdi mdi-24px mdi-playlist-edit"></i></a></td>
                                <td><a href="{{ route('admin.bookmarks_edit', ['id' => $bookmark->id]) }}" class="is-icon has-text-danger"><i class="mdi mdi-24px mdi-delete"></i></a></td>
                            </tr>
                            @endforeach
                        @else
                        <tr>
                            <td colspan="7">Nessun bookmark</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            {{ $bookmarks->links('elements.pagination') }}
        </article>
    </div>
</div>
@endsection
