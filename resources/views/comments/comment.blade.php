@foreach($items as $item)

    <li id="li-comment-{{$item->id}}" class="comment">
        <div id="comment-{{$item->id}}" class="comment-container">
            <div class="comment-meta commentmetadata">
                <div class="intro">
                    <div class="commentDate">
                        @if($item->user_id == \Illuminate\Support\Facades\Auth::user()->id)
                                <span class="font-weight-bold mr-2">You</span>
                            @else
                            <span class="font-weight-bold mr-2">Manager</span>
                        @endif
                        {{ is_object($item->created_at) ? $item->created_at->format('d.m.Y в H:i') : ''}}
                    </div>
                    <hr>
                </div>
                <div class="comment-body">
                    <p>{{ $item->text }}</p>
                </div>
                @if($item->user_id !== \Illuminate\Support\Facades\Auth::user()->id)
                    <div class="reply group">
                        <a class="comment-reply-link btn btn-secondary" href="#respond"
                           onclick="return addComment.moveForm(&quot;comment-{{$item->id}}&quot;, &quot;{{$item->id}}&quot;, &quot;respond&quot;, &quot;{{$item->message_id}}&quot;)">Ответить</a>
                    </div>
                    @else
                    <div class="reply group">
                        <button class="comment-reply-link btn btn-secondary" href="#respond"
                           onclick="return addComment.moveForm(&quot;comment-{{$item->id}}&quot;, &quot;{{$item->id}}&quot;, &quot;respond&quot;, &quot;{{$item->message_id}}&quot;)" disabled>Ответить</button>
                    </div>
                @endif
            </div>
        </div>
        @if(isset($com[$item->id]))
            <ul class="children">
                @include('comments.comment', ['items' => $com[$item->id]])
            </ul>
        @endif
    </li>

@endforeach