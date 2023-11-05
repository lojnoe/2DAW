@foreach ($posts as $post )

<div class="mt-4">
    @include('posts.inc.item')
</div>
@endforeach

<div class="mt-4">
    {{$posts->links() }}
</div>