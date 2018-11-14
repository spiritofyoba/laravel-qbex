@php

    if($essence){
        $comments = $essence->comments;
        $com = $comments->where('status', 1)->groupBy('parent_id');
    } else $com = null;

@endphp

<div id="comments">

    <ol class="commentlist group">
        @if($com)
            @foreach($com as $k => $comments)

                @if($k)
                    @break
                @endif

                @include('comments.comment', ['items' => $comments])

            @endforeach
        @endif
    </ol>


    <div id="respond">
        <h3 id="reply-title">Написать <span>ответ</span>
            <small><a rel="nofollow" id="cancel-comment-reply-link" href="#respond" style="display:none;">Отменить
                    ответ</a></small>
        </h3>

        <form action="{{ route('comment')}}" method="post" id="commentform">
            <p class="comment-form-comment">
                <label for="comment">Ваш комментарий</label>
                <textarea id="comment" name="text" rows="6" class="form-control w100"></textarea>
            </p>

            <input type="hidden" id="comment_post_ID" name="comment_post_ID" value="{{ $message->id}}">
            <input type="hidden" id="parent_id" name="parent_id" value="">

            {{ csrf_field()}}

            <div class="clear"></div>
            <p class="form-submit">
                <input class="btn btn-primary" type="submit" id="submit" value="Отправить"/>
            </p>
        </form>
    </div>

</div>
</div>