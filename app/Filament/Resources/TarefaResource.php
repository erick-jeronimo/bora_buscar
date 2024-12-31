<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TarefaResource\Pages;
use App\Filament\Resources\TarefaResource\RelationManagers;
use App\Models\Tarefa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TarefaResource extends Resource
{
    protected static ?string $model = Tarefa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('titulo')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('tipo_tarefa_id')
                    ->required()
                    ->label('Tipo de Tarefa')
                    ->relationship('tipoTarefa', 'nome')
                    ->native(false),
                Forms\Components\Textarea::make('descricao')
                    ->columnSpanFull(),
                Forms\Components\Select::make('meta_id')
                    ->required()
                    ->native(false)
                    ->relationship('meta', 'nome'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('titulo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tipoTarefa.nome')
                    ->label('Tipo de Tarefa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('meta.nome')
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
            'index' => Pages\ListTarefas::route('/'),
            'create' => Pages\CreateTarefa::route('/create'),
            'edit' => Pages\EditTarefa::route('/{record}/edit'),
        ];
    }
}
