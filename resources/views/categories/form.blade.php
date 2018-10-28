@extends('layouts.admin')

@section('content')
@if (!empty($category))
{{ Breadcrumbs::render('admin.categories_edit', $category) }}
@else
{{ Breadcrumbs::render('admin.categories_add') }}
@endif

<div class="tile is-ancestor">
    <div class="tile is-parent">
        <article class="tile is-child box">
            @if ($method=='add')
            <h4 class="title">Nuova Categoria</h4>
            @else
            <h4 class="title">Modifica Categoria (ID {{ $category->id }})</h4>
            @endif
            <form action="{{ route('admin.categories_store') }}" method="post">
                @if (!empty($category))<input type="hidden" name="id" value="{{ $category->id }}" />@endif
                @csrf
                <div class="field">
                    <label for="title" class="label">Titolo</label>
                    <div class="control">
                        <input type="text" id="title" name="title" value="{{ old('title') ? old('title') : (!empty($category->title) ? $category->title : '') }}" class="input">
                    </div>
                    <p class="help is-danger">{{$errors->first('title')}}</p>
                </div>

                <nav class="level">
                    <div class="level-left">
                        <div class="level-item">
                            <a href="{{ route('admin.categories_index') }}" class="button is-icon"><i class="mdi mdi-24px mdi-arrow-left"></i></a>
                        </div>
                    </div>
                    <div class="level-right">
                        <div class="level-item">
                            <div class="field is-grouped">
                                <div class="control"><button type="reset" class="button is-primary">Annulla</button></div>
                                <div class="control"><button type="submit" name="save_and_edit" class="button is-primary">Salva e Continua</button></div>
                                <div class="control"><button type="submit" name="save_and_index" class="button is-primary">Salva</button></div>
                            </div>
                        </div>
                    </div>
                </nav>

            </form>
        </article>
    </div>
</div>
@endsection
