<?php

namespace App\Filament\Resources\CulturalChunks\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CulturalChunkForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                FileUpload::make('reference_image_path')
                    ->label('Gambar Referensi')
                    ->image()
                    ->directory('cultural-chunks')
                    ->columnSpanFull(),
                Textarea::make('content')
                    ->label('Konten Narasi Budaya')
                    ->required()
                    ->rows(5)
                    ->columnSpanFull(),
                Textarea::make('embedding')
                    ->label('Embedding AI (JSON)')
                    ->helperText('Format JSON array untuk vektor AI')
                    ->rows(3)
                    ->columnSpanFull(),
                Textarea::make('visual_embedding')
                    ->label('Embedding Visual AI (JSON)')
                    ->helperText('Format JSON array untuk vektor visual AI')
                    ->rows(3)
                    ->columnSpanFull(),
                TextInput::make('category')
                    ->label('Kategori')
                    ->required()
                    ->maxLength(50)
                    ->helperText('Contoh: Batik, Sakral, Tradisi'),
                TextInput::make('citation')
                    ->label('Sumber Sitasi')
                    ->maxLength(255)
                    ->helperText('Sumber referensi: Wawancara, Buku, dll'),
                Toggle::make('is_sacred')
                    ->label('Apakah Sakral?')
                    ->helperText('Flag guardrail untuk konten sakral')
                    ->default(false),
            ]);
    }
}
