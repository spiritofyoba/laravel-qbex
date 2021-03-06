<div class="user-messages">
    <form role="form" action="{{action('MessageController@store')}}" method="post" enctype="multipart/form-data">

        @csrf

        <div class="form-group">
            <label for="subject">Тема сообщения</label>
            <input type="text" id="subject" name="subject" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="message_body">Текст сообщения</label>
            <textarea name="body" id="message_body" cols="30" rows="4" class="form-control" required></textarea>
        </div>
        {{--<div class="form-group">--}}
            {{--<input type="file" class="form-control-file" name="attachment" id="InputFile" aria-describedby="fileHelp">--}}
        {{--</div>--}}

        <div class="form-group">
            <input type="file" name="attachment" id="file" class="input-file">
            <label for="file" class="btn btn-tertiary js-labelFile">
                <i class="icon fa fa-check"></i>
                <span class="js-fileName">Choose a file</span>
            </label>
        </div>
        <input type="hidden" name="user_id" value="{{  \Illuminate\Support\Facades\Auth::user()->id }}">
        <button class="btn btn-success" type="submit"
                @if(\Illuminate\Support\Facades\Cookie::get('createTimeout') == 1)
                disabled
                @endif
        >Отправить
        </button>
    </form>
</div>
