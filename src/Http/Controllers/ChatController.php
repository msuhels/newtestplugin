<?php
 
namespace msuhels\newtestplugin\Http\Controllers;
 
use msuhels\newtestplugin\Models\Chat;
use msuhels\newtestplugin\Models\ChatMessages;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Auth;
use Response;
class ChatController extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function createchat(Request $request)
    {    
         $message = $request->message;
         $reciever_id = $request->reciever_id;
         
        //  if (strlen($message)) {
        //     event(new MessageSend($message));
        // }


        $chat = chat::where([
                    ['sender_id',Auth::user()->id],
                    ['reciever_id',$reciever_id]
                ])->orWhere([
                    ['reciever_id',Auth::user()->id],
                    ['sender_id',$reciever_id]
          ])->first();
      
         if(!$chat)
         {
           $chat  =  Chat::create([
                        'sender_id'=>Auth::user()->id,
                        'reciever_id'=>$reciever_id
                      ]);
           $chatMessages = ChatMessages::create([
              'chat_id'=>$chat->id,
              'sender_id'=> Auth::user()->id,
              'message'=> $message 
           ]);
         }else{
            $chatMessages = ChatMessages::create([
              'chat_id'=>$chat->id,
              'sender_id'=> Auth::user()->id,
              'message'=> $message 
           ]);
         }

      return  Response::json(['chatMessages'=>$chatMessages, 'msg'=>'success','userId'=>Auth::user()->id]);

         // return redirect()->route('filament.pages.chatpage',['id'=>$reciever_id]);

    }
}