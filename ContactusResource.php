<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactusResource\Pages;
use App\Filament\Resources\ContactusResource\RelationManagers;
use App\Filament\Roles;
use Faker\Provider\ar_EG\Text;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;

class ContactusResource extends Resource
{
    public static $icon = 'heroicon-o-collection';

    public static function form(Form $form)
    {
        return $form
            ->schema([
                TextInput::make("name"),
                TextInput::make("email"),
                TextInput::make("subject"),
                TextInput::make("message"),
            ]);
    }

    public static function table(Table $table)
    {
        return $table
            ->columns([
                //
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
            Pages\ListContactuses::routeTo('/', 'index'),
            Pages\CreateContactus::routeTo('/create', 'create'),
            Pages\EditContactus::routeTo('/{record}/edit', 'edit'),
        ];
    }
}
