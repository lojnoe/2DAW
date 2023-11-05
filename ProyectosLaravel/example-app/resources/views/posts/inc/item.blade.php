<a href="{{ route('users.show', $post->user->id) }}" class= "text-lg font-semibold">
    {{ $post->user->name}}
</a>
    <p class="mt-1 text-xs">
        <em>
            {{$post -> created_at->format('d/m/Y') }}
        </em>
        
        {{ $post -> body}}
    </p>

    <!-- 'destroy-post' -->
    @can('delete' ,$post)
    <form action="{{ route('posts.destroy', $post-> id) }}" method = "POST">
        @csrf
        @method('DELETE')

        <button class= "text-indigo-600 text-xs">{{__('DELETE')}} </button>
    </form>
    @endcan 