<?php

namespace  msuhels\newtestplugin\Resources\TestpluginResources\Pages;

use  msuhels\newtestplugin\Resources\TestpluginResources;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;


class ManagePosts extends ManageRecords
{
    protected static string $resource = TestpluginResources::class;
    

    protected function getActions(): array
    {
        return [
             Actions\CreateAction::make(),
         

        ];
    }

 

}
