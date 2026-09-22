<?php

namespace App\Filament\Resources\Classrooms\Schemas;

use App\Models\Major;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;

class ClassroomForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('major_id')
                    ->label('Major')
                    ->required()
                    ->options(
                        Major::where('is_active', true)
                            ->pluck('name', 'id')
                    ),

                TextInput::make('name')
                    ->label('Nama Kelas')
                    ->required(),

                TextInput::make('level')
                    ->label('Level')
                    ->required()
                    ->numeric(),

                Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true)
                    ->required(),
            ]);
    }
}
