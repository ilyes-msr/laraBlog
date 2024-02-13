<x-layout>
    <article>
        <h1>
            {{$post->title}}
        </h1>
        <small>
            {{$post->date}}
        </small>
        By
        <a href="/authors/{{$post->author->username}}">{{$post->author->name}}</a>
        in
        <a href="/categories/{{$post->category->slug}}"> {{$post->category->name}}</a>

        <div>
            {!! $post->body !!}
        </div>
    </article>
    <br>
    <a href="/">Back</a>
</x-layout>
