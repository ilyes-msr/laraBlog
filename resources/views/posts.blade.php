<x-layout>
    @forelse($posts as $post)
        <article>
            <h1>
                <a href="/posts/{{$post->slug}}">
                    {{$post->title}}
                </a>
            </h1>

            By
            <a href="/authors/{{$post->author->username}}">{{$post->author->name}}</a>
            in
            <a href="/categories/{{$post->category->slug}}"> {{$post->category->name}}</a>

            <p><small> {{$post->excerpt}} </small></p>

        </article>
    @empty
    @endforelse
</x-layout>
