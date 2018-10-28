@extends('layouts.public')

@section('content')

<div class="section">
    <div class="box">
        <div class="field has-addons">
            <div class="control is-expanded">
                <input class="input has-text-centered" type="search" placeholder="» » » » » scrivi qualcosa « « « « «">
            </div>
            <div class="control">
                <a class="button is-info">Cerca</a>
            </div>
        </div>
    </div>

    @if (sizeof($bookmarks)>0)
    <div class="tile is-ancestor">
        @foreach ($bookmarks as $bookmark)
        <div class="tile is-3 is-parent">
            <article class="tile is-child box">
                <figure class="image">
                    <img width="240" src="https://images.unsplash.com/photo-1475778057357-d35f37fa89dd?dpr=1&auto=compress,format&fit=crop&w=1920&h=&q=80&cs=tinysrgb&crop=" alt="Image">
                </figure>
                <p class="title is-4 no-padding">{{ $bookmark->title}} <a href="{{ route('admin.bookmarks_goto', ['id' => $bookmark->id]) }}"><i class="mdi mdi-24px mdi-open-in-new"></i></a></p>
                <p class="subtitle is-6">{{ $bookmark->category->title}}</p>
                @if (sizeof($bookmark->tags)>0)
                <div class="field is-grouped is-grouped-multiline">
                    @foreach ($bookmark->tags as $tag)
                    <div class="control">
                        <a class="tag is-link">{{ $tag->title }}</a>
                    </div>
                    @endforeach
                </div>
                @endif
            </article>
        </div>
        @endforeach
    </div>
    @endif

</div>

@endsection
