<x-layout>
    <article>
        <h1>
            {{$post->title}}
        </h1>
        <small>
            {{$post->date}}
        </small>
        <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>

        <div>
            {!! $post->body !!}
        </div>
    </article>
    <br>
    <a href="/">Back</a>
</x-layout>
