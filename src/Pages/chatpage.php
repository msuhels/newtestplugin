<?php

namespace msuhels\newtestplugin\Pages;

use Filament\Pages\Page;
use msuhels\newtestplugin\Models\Chat;
use msuhels\newtestplugin\Models\ChatMessages;
use msuhels\newtestplugin\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Contracts\View\View;
use Filament\Forms;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\TextInput;
use Illuminate\Http\Request;


class chatpage extends Page implements Forms\Contracts\HasForms
{
   
    use Forms\Concerns\InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-lock-closed';
    protected static string $view = 'newtestplugin::filament.pages.chatpage';
    protected static bool $shouldRegisterNavigation = true;

    public $message;
    public $reciever_id;
    public  $Data;
    public function mount(): void
    {
         $user = User::where('id','!=',auth()->user()->id)->get();
         $selecteduser = User::where('id',request()->get('id'))->first();
           $chat = chat::where([
                    ['sender_id',auth()->user()->id],
                    ['reciever_id',request()->get('id')]
                ])->orWhere([
                    ['reciever_id',auth()->user()->id],
                    ['sender_id',request()->get('id')]
          ])->first();


        if($chat){
         $chatMessages = ChatMessages::where('chat_id',$chat->id)->get();
        }else{
         $chatMessages = array();
        }

        $this->Data = [
            'chatMessages'=> $chatMessages,
            'user' => $user,
            'selecteduser'=>$selecteduser
        ];
    }

    protected function getFormSchema(): array
    {
        return [
          
                Forms\Components\TextInput::make('message')->required(),
                Forms\Components\Hidden::make('reciever_id')->default('5'),


        ];
    }
    
}