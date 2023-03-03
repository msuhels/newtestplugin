<?php

namespace msuhels\newtestplugin\Resources;

use  msuhels\newtestplugin\Resources\TestpluginResources\Pages;
use  msuhels\newtestplugin\Resources\TestpluginResources\RelationManagers;
use msuhels\newtestplugin\Models\Chat;
use msuhels\newtestplugin\ChatMessages;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TestpluginResources extends Resource
{
    protected static ?string $model = Chat::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('message')
                    ->required()
                    ->maxLength(255),
              
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sender.name'),
              
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
 
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageTestplugin::route('/'),
        ];
    }    
}
