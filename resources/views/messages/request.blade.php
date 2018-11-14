<div class="user-messages">
    <form role="form" action="{{action('MessageController@store')}}" method="post">

        @csrf

        <div class="form-group">
            <label for="subject">Тема сообщения</label>
            <input type="text" id="subject" name="subject" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="message_body">Текст сообщения</label>
            <textarea name="body" id="message_body" cols="30" rows="4" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <input type="file" class="form-control-file" id="InputFile" aria-describedby="fileHelp">
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
