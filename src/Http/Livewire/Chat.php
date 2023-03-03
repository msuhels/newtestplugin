<?php
namespace msuhels\newtestplugin\Http\Livewire;

use Filament\Facades\Filament;
use Filament\Forms;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
// use JeffGreco13\FilamentBreezy\FilamentBreezy;
use Livewire\Component;


class Chat extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $message;
    
    // public function mount()
    // {
    //     if (Filament::auth()->check()) {
    //         return redirect(config("filament.home_url"));
    //     }
    // }

    // public function messages(): array
    // {
    //     return [
    //         'email.unique' => __('filament-breezy::default.registration.notification_unique'),
    //     ];
    // }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('message')
                ->required(),
            
        ];
    }

    protected function prepareModelData($data): array
    {
        $preparedData = [
            'message' => $data['message'],
        
        ];

        return $preparedData;
    }

    public function createchat()
    {
        // $preparedData = $this->prepareModelData($this->form->getState());

        // $user = config('filament-breezy.user_model')::create($preparedData);

        // event(new Registered($user));
        // Filament::auth()->login($user, true);

        // return redirect()->to(config('filament-breezy.registration_redirect_url'));
    }

    public function render(): View
    {
        $view = view('newtestplugin::chat');

        $view->layout('filament::components.layouts.base', [
            'title' => __('ChatPage'),
        ]);

        return $view;
    }
}
