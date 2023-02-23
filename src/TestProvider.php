<?php
namespace msuhels\newtestplugin;

use Filament\Facades\Filament;
use Filament\Navigation\UserMenuItem;
use Filament\Navigation\NavigationItem;
use Filament\PluginServiceProvider;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Config;
use msuhels\newtestplugin\Pages\test;
use msuhels\newtestplugin\Resources\TestpluginResources;
use Spatie\LaravelPackageTools\Package;

class TestProvider extends PluginServiceProvider
{
     public static string $name = 'Testplugin';

     protected array $resources = [
         TestpluginResources::class,
    ];

     protected array $pages = [
        test::class,
    ];
 

    public function configurePackage(Package $package): void
    {

        $package->name('newtestplugin')
            ->hasViews()
            ->hasRoute('web')
            ->hasTranslations();
    }

      public function packageBooted(): void
    {
        parent::packageBooted();
   
            Filament::serving(function () {
                Filament::registerUserMenuItems([
                    //'account' => UserMenuItem::make()->url(test::getUrl()),
                    'link' => UserMenuItem::make()->label('Custom Label')->url(test::getUrl())
          ]);

       //    Filament::registerNavigationItems([
       //      NavigationItem::make('CustomPlugin')
       //      ->url(test::getUrl())
       //      ->icon('heroicon-o-presentation-chart-line')
       //      ->sort(2),
       // ]);
    });
    }
}
