@extends('layouts.admin')

@section('content')
@if (!empty($bookmark))
{{ Breadcrumbs::render('admin.bookmarks_edit', $bookmark) }}
@else
{{ Breadcrumbs::render('admin.bookmarks_add') }}
@endif

<div class="tile is-ancestor">
    <div class="tile is-parent">
        <article class="tile is-child box">
            @if ($method=='add')
            <h4 class="title">Nuovo segnalibro</h4>
            @else
            <h4 class="title">Modifica segnalibro (ID {{ $bookmark->id }})</h4>
            @endif
            <form action="{{ route('admin.bookmarks_store') }}" method="post">
                @if (!empty($bookmark))<input type="hidden" name="id" value="{{ $bookmark->id }}" />@endif
                @csrf
                <div class="field">
                    <label for="title" class="label">Titolo</label>
                    <div class="control">
                        <input type="text" id="title" name="title" value="{{ old('title') ? old('title') : (!empty($bookmark->title) ? $bookmark->title : '') }}" class="input">
                    </div>
                    <p class="help is-danger">{{$errors->first('title')}}</p>
                </div>
                <div class="field">
                    <label for="url" class="label">URL</label>
                    <div class="control">
                        <input type="text" id="url" name="url" value="{{ old('url') ? old('url') : (!empty($bookmark->url) ? $bookmark->url : '') }}" class="input">
                    </div>
                    <p class="help is-danger">{{$errors->first('url')}}</p>
                </div>
                <div class="field">
                    <label for="description" class="label">Descrizione</label>
                    <div class="control">
                        <textarea id="description" name="description" class="textarea">{{ old('description') ? old('description') : (!empty($bookmark->description) ? $bookmark->description : '') }}</textarea>
                    </div>
                    <p class="help is-danger">{{$errors->first('description')}}</p>
                </div>
                <div class="field">
                    <label for="description" class="label">Categoria</label>
                    <div class="select">
                        <select id="category_id" name="category_id">
                            <option>nessuna categoria</option>
                            @if (!empty($categories))
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ (old('category_id') && $category->id==old('category_id')) ? 'selected' : ((!empty($bookmark) && $category->id == $bookmark->category_id) ? 'selected' : '') }}>{{ $category->title }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="field">
                    <label for="tags" class="label">Tag</label>
                    <div class="control">
                        {{--<textarea id="tags" name="tags" class="textarea" rows="2">{{ old('tags') ? old('tags') : '' }}</textarea>--}}
                        <tag-multiselect :selected="{{ $bookmark->tags }}"></tag-multiselect>
                        {{ $bookmark->tags }}
                    </div>
                </div>
                <!--<div class="field">
                    <label class="checkbox">
                        <input type="checkbox" id="public" name="public" value="{{ old('title') ? old('title') : (!empty($bookmark->title) ? $bookmark->title : '') }}">
                        &Egrave; pubblico
                    </label>
                </div>-->

                <nav class="level">
                    <div class="level-left">
                        <div class="level-item">
                            <a href="{{ route('admin.bookmarks_index') }}" class="button is-icon"><i class="mdi mdi-24px mdi-arrow-left"></i></a>
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
