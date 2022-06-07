<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FacilityResource\Pages;
use App\Filament\Resources\FacilityResource\RelationManagers;
use App\Filament\Roles;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;
use Livewire\TemporaryUploadedFile;

class FacilityResource extends Resource
{
    public static $icon = 'heroicon-o-collection';

    public static function form(Form $form)
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('image')
                    ->image()
                    ->required()
                    ->disk("public")
                    ->directory('facilities/images')
                    ->columnSpan($span = 2),
                Textarea::make('description')
                    ->maxLength(65535)
                    ->required()
                    ->columnSpan($span = 2),
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
            Pages\ListFacilities::routeTo('/', 'index'),
            Pages\CreateFacility::routeTo('/create', 'create'),
            Pages\EditFacility::routeTo('/{record}/edit', 'edit'),
        ];
    }
}
