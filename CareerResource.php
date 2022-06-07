<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CareerResource\Pages;
use App\Filament\Resources\CareerResource\RelationManagers;
use App\Filament\Roles;
use App\Models\career;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;

class CareerResource extends Resource
{
    public static $icon = 'heroicon-o-collection';
    public static   $model=career::class;

    public static function form(Form $form)
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table)
    {
        return $table
            ->columns([
                Columns\Text::make('name'),
                // Columns\TextColumn::make(''),
                Columns\Text::make('email')
                    ->url(fn (career $record): string => "mailto:" . $record->email)
                    ->openUrlInNewTab(),
                Columns\Text::make('phone'),
                Columns\Text::make('post_applied'),
                Columns\Text::make('experience'),
                Columns\Text::make('current_organisation'),
                Columns\Text::make('expected_salary'),
                Columns\Text::make('cv')
                    ->url(fn (career $record): string => config("app.url") . "/storage/" . $record->cv)
                    ->openUrlInNewTab(),
                Columns\Text::make('created_at')
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
            Pages\ListCareers::routeTo('/', 'index'),
            Pages\CreateCareer::routeTo('/create', 'create'),
            Pages\EditCareer::routeTo('/{record}/edit', 'edit'),
        ];
    }
}
