@extends('user')
@section('force-css','bc blog')

@section('import-css')
    <link href="{{ asset('assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">

@stop
@section('style')
  
 
@stop
@section('content')


    <style>
      html{
        overflow: hidden!important;
      }
        .padding-none{
            padding: 0 10px !important;
        }
        .chat-con{
          height: 100%!important;
          margin-top: 60px!important;
        }
        .height-60 {
            height: 60px;
        }
        .select-con{
          display: block;
              text-align: center;
              font-size: 24px;
              font-weight: bold;
              padding: 50px;
        }
        .chat-bubble span{
          position: absolute;
          bottom: 0px;
          right: 6px;
          font-size: small;
          font-style: italic;
        }
        .time{
          position: absolute;
          right: 10px;
        }
        .people{
          height: 80%;
          overflow-y: scroll;
          padding-bottom: 500px;
        }
        .chat-input{
          position: absolute;
          bottom: 0;
          width: 100%;
          height: 40px;
        }
        .chat-panel{
          height: 80%;
            overflow-x: hidden;
            overflow-y: scroll;
            padding-bottom: 200px;
        }
        

        .profile-image {
          width: 50px;
          height: 50px;
          border-radius: 40px;
        }

        .settings-tray {
          background: #eee;
          padding: 10px 15px;
          border-radius: 7px;
          
          .no-gutters {
            padding: 0;
          }
          
          &--right {
            float: right;
            
            i {
              margin-top: 10px;
              font-size: 25px;
              color: grey;
              margin-left: 14px;
              transition: .3s;
              
              &:hover {
                color: $blue;
                cursor: pointer;
              }
            }
          }
        }

        .search-box {
          background: #fafafa;
          padding: 10px 13px;
          
          .input-wrapper {
            background: #fff;
            border-radius: 40px;
            
            i {
              color: grey;
              margin-left: 7px; 
              vertical-align: middle;
            }
          }
        }

        input {
          border: none;
          border-radius: 30px;
          width: 80%;

          &::placeholder {
            color: #e3e3e3;
            font-weight: 300;
            margin-left: 20px;
          }

          &:focus {
            outline: none;
          }
        }

        .friend-drawer {
          padding: 10px 15px;
          display: flex;
          vertical-align: baseline;
          background: #fff;
          transition: .3s ease;
          
          &--grey {
            background: #eee;
          }
          
          .text {
            margin-left: 12px;
            width: 70%;
            
            h6 {
              margin-top: 6px;
              margin-bottom: 0;
            }
            
            p {
              margin: 0;
            }
          }
          
          .time {
            color: grey;
          }
          
          &--onhover:hover {
            background: $blue;
            cursor: pointer;
            
            p,
            h6,
            .time {
              color: #fff !important;
            }
          }
        }

        hr {
          margin: 5px auto;
          width: 60%;
        }

        .chat-bubble {
          padding: 10px 14px;
          background: #eee;
          margin: 10px 30px;
          border-radius: 9px;
          position: relative;
          animation: fadeIn 1s ease-in;
          
          &:after {
            content: '';
            position: absolute;
            top: 50%;
            width: 0;
            height: 0;
            border: 20px solid transparent;
            border-bottom: 0;
            margin-top: -10px;
          }
          
          &--left {
             &:after {
              left: 0;
              border-right-color: #eee;
                border-left: 0;
              margin-left: -20px;
            }
          }
          
          &--right {
            &:after {
              right: 0;
              border-left-color: $blue;
                border-right: 0;
              margin-right: -20px;
            }
          }
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }


        .offset-md-9 {
          .chat-bubble {
            background: $blue;
            color: #fff;
          }
        }

        .chat-box-tray {
          background: #eee;
          display: flex;
          align-items: baseline;
          padding: 10px 15px;
          align-items: center;
          margin-top: 19px;
          bottom: 0;
          
          input {
            margin: 0 10px;
            padding: 6px 2px;
          }
          
          i {
            color: grey;
            font-size: 30px;
            vertical-align: middle;
            
            &:last-of-type {
              margin-left: 25px;
            }
          }
          
          .page-content{
            height: 100%!important;
          }
        }
        .totop{
          display: none;
        }
    </style>
    <div class="container chat-con" >
        <div class="row no-gutters justify-content-center" style="height: 90vh;">
             
          <div class="col-md-8">
            <div class="settings-tray" id="chat_name">
               Ticket Id {{$pnr}}
            </div>
            <div class="chat-panel" >
                <div id="chat-panel">
                   
                      @foreach($chats as $chat)
                            @if($chat->user_id != Auth::user()->id)
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
                      
                </div>
            
              <div class=" chat-input">
                <div class="col-12">
                  <div class="">
                    <input id="msg_txt" type="text" placeholder="Type your message here...">
                    <input type="text" id="select_chat_id" name="select_chat_id" hidden="hidden">
                    <i id="send_msg" class="fa fa-paper-plane" aria-hidden="true" style="cursor: pointer;"></i>
                    
                        
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!--================================
        contact us part end
    =====================================-->


   
@stop

@section('script')
    <script src="{{ asset('assets/admin/js/bootstrap-fileinput.js') }}"></script>
    <script>
      $( "#send_msg" ).click(function() {
        content = $('#msg_txt').val();
        select_chat_id =$('#select_chat_id').val();
        console.log(content);
        $('.loading').show();
        $.ajax({
          type: "get",
          data: {msg_txt:content, pnr: "{{$pnr}}"},
          url: "{{route('chat.send')}}",
          // data: form.serialize(), // serializes the form's elements.
          success: function(rslt) {
            $('#chat-panel').append(rslt);
            $('.loading').hide();
            $('#msg_txt').val('');
          },
          error: function (error) {
            console.log(error);
            return false;
          }
        });
      });
    </script>
@endsection

