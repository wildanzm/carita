<?php

namespace App\Filament\Resources\CulturalChunks\Pages;

use App\Filament\Resources\CulturalChunks\CulturalChunkResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCulturalChunk extends CreateRecord
{
    protected static string $resource = CulturalChunkResource::class;

    protected static ?string $title = 'Tambah Budaya';
}
