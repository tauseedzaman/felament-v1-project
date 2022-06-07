<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubscriberResource\Pages;
use App\Filament\Resources\SubscriberResource\RelationManagers;
use App\Filament\Roles;
use App\Models\Subscriber;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;

class SubscriberResource extends Resource
{
    public static $icon = 'heroicon-o-collection';
    public static $model = Subscriber::class;


    public static function form(Form $form)
    {
        return $form
            ->schema([
                TextInput::make('email')
                ->email()
                ->autofocus()
                ->required()
                ->maxLength(255),
            ]);
    }

    public static function table(Table $table)
    {
        return $table
            ->columns([
                Columns\Text::make('email')->primary(),
            ])
            ->filters([
                //
            ]);
    }

    public static function relations()
    {
        return [
            //
        ];
    }

    public static function routes()
    {
        return [
            Pages\ListSubscribers::routeTo('/', 'index'),
            Pages\CreateSubscriber::routeTo('/create', 'create'),
            Pages\EditSubscriber::routeTo('/{record}/edit', 'edit'),
        ];
    }
}
