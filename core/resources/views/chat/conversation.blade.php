@foreach($chats as $chat)
      @if($chat->admin_id=='')
          <div class="row no-gutters">
            <div class="col-md-8">
              <div class="chat-bubble chat-bubble--left">
                {{$chat->content}}
                <span>{{ date('d-M H:i', strtotime($chat->created_at))  }}</span>
              </div>
            </div>
          </div>
      @else
          <div class="row no-gutters">
            <div class="col-md-8 offset-md-4">
              <div class="chat-bubble chat-bubble--right">
                {{$chat->content}}
                <span>{{ date('d-M H:i', strtotime($chat->created_at))  }}</span>
              </div>
            </div>
          </div>
      @endif
  @endforeach
