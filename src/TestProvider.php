<?php
namespace msuhels\newtestplugin;

use Filament\Facades\Filament;
use Filament\Navigation\UserMenuItem;
use Filament\Navigation\NavigationItem;
use Filament\PluginServiceProvider;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Config;
use msuhels\newtestplugin\Pages\chatpage;
use msuhels\newtestplugin\Resources\TestpluginResources;
use Spatie\LaravelPackageTools\Package;

class TestProvider extends PluginServiceProvider
{
     public static string $name = 'Testplugin';

     protected array $resources = [
         TestpluginResources::class,
    ];

     protected array $pages = [
        chatpage::class,
    ];
 
 protected array $styles = [
        'my-package-styles' => __DIR__ . '/../resources/dist/app.css',
    ];

    // protected array $scripts = [
    //     'my-package-scripts' => __DIR__ . '/../resources/dist/custom.js',
    // ];

    public function configurePackage(Package $package): void
    {

        $package->name('newtestplugin')
            ->hasViews()
            ->hasRoute('web')
             ->hasMigrations(['create_chatmessages_table', 'create_chats_table']);
    }


    // protected function getUserMenuItems(): array
    // {
    //     return [
    //         UserMenuItem::make()
    //             ->label('Settings')
    //             ->url(route('filament.pages.chatpage'))
    //             ->icon('heroicon-s-cog'),
    //     ];
    // }

    
    //   public function packageBooted(): void
    // {
    //     parent::packageBooted();
   
    //         Filament::serving(function () {
    //             Filament::registerUserMenuItems([
    //                 //'account' => UserMenuItem::make()->url(chatpage::getUrl()),
    //                 'link' => UserMenuItem::make()->label('Custom Label')->url(chatpage::getUrl())
    //       ]);

    //    //    Filament::registerNavigationItems([
    //    //      NavigationItem::make('CustomPlugin')
    //    //      ->url(chatpage::getUrl())
    //    //      ->icon('heroicon-o-presentation-chart-line')
    //    //      ->sort(2),
    //    // ]);
    // });
    // }



}
