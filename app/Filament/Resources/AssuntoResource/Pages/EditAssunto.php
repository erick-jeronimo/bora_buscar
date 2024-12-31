<?php

namespace App\Filament\Resources\AssuntoResource\Pages;

use App\Filament\Resources\AssuntoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAssunto extends EditRecord
{
    protected static string $resource = AssuntoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
