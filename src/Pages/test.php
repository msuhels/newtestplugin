<?php

namespace msuhels\newtestplugin\Pages;

use Filament\Pages\Page;
use Filament\Tables;
use msuhels\newtestplugin\Models\Customer;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\IconColumn;


class test extends Page implements Tables\Contracts\HasTable
{
      use Tables\Concerns\InteractsWithTable; 

    protected static ?string $navigationIcon = 'heroicon-o-lock-closed';
    protected static string $view = 'newtestplugin::filament.pages.test';
    protected static bool $shouldRegisterNavigation = true;
     
    protected function getTableQuery(): Builder
    {
        $data=Customer::query()->latest();
        return $data;
    }
   

  protected function getTableColumns(): array
    {
        return [
                Tables\Columns\TextColumn::make('id')->sortable()->toggleable(false),
            
                Tables\Columns\TextColumn::make('name')->searchable(isIndividual: true, isGlobal: false),

                // BadgeColumn::make('approve')
                //               ->enum([
                //                    '0' => 'Not approve',
                //                    '1' => 'Approved',
                //        ])
                //         ->color(static function ($state): string {

                //        if ($state === 1) {
                //             return 'success';
                //         }
 
                //         return 'warning';
                // }),

                    IconColumn::make('approve')
                   ->options([
                          'heroicon-o-x-circle',
                           'heroicon-o-pencil' => 1,
                            'heroicon-o-clock' => 0,
                     ]),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')->dateTime(),
                  
            
        ];
    }
    
}