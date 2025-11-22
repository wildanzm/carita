<?php

namespace App\Filament\Resources\CulturalChunks\Pages;

use App\Filament\Resources\CulturalChunks\CulturalChunkResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditCulturalChunk extends EditRecord
{
    protected static string $resource = CulturalChunkResource::class;

    protected static ?string $title = 'Ubah Budaya';

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->label('Hapus'),
            ForceDeleteAction::make()
                ->label('Hapus Permanen'),
            RestoreAction::make()
                ->label('Pulihkan'),
        ];
    }
}
