<?php

namespace App\Filament\Resources\CulturalChunks\Pages;

use App\Filament\Resources\CulturalChunks\CulturalChunkResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCulturalChunks extends ListRecords
{
    protected static string $resource = CulturalChunkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Tambah Budaya'),
        ];
    }
}
