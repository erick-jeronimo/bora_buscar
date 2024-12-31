<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MetaResource\Pages;
use App\Filament\Resources\MetaResource\RelationManagers;
use App\Models\Assunto;
use App\Models\Meta;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;

class MetaResource extends Resource
{
    protected static ?string $model = Meta::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('materia_id')
                    ->required()
                    ->label('Materia')
                    ->native(false)
                    ->searchable()
                    ->preload()
                    ->relationship('materia', 'nome')
                    ->live(),
                Forms\Components\Select::make('assunto_id')
                    ->required()
                    ->label('Assunto')
                    ->native(false)
                    ->searchable()
                    ->preload()
                    ->options(fn(Get $get): Collection => Assunto::query()
                        ->where('materia_id', $get('materia_id'))
                        ->pluck('nome', 'id'))
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('materia.nome')
                    ->sortable(),
                Tables\Columns\TextColumn::make('assunto.nome')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMetas::route('/'),
            'create' => Pages\CreateMeta::route('/create'),
            'edit' => Pages\EditMeta::route('/{record}/edit'),
        ];
    }
}
