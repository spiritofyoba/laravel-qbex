<div id="comments">
    <ol class="commentlist group">
        @foreach($com as $k => $comments)
        <!--Выводим только родительские комментарии parent_id = 0-->
        @if($k)
        @break
        @endif
        @include('comment', ['items' => $comments])
        @endforeach
    </ol>
</div>