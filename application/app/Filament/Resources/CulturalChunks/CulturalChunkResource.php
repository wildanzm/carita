<?php

namespace App\Filament\Resources\CulturalChunks;

use App\Filament\Resources\CulturalChunks\Pages\CreateCulturalChunk;
use App\Filament\Resources\CulturalChunks\Pages\EditCulturalChunk;
use App\Filament\Resources\CulturalChunks\Pages\ListCulturalChunks;
use App\Filament\Resources\CulturalChunks\Schemas\CulturalChunkForm;
use App\Filament\Resources\CulturalChunks\Tables\CulturalChunksTable;
use App\Models\CulturalChunk;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CulturalChunkResource extends Resource
{
    protected static ?string $model = CulturalChunk::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Data Budaya';

    protected static ?string $modelLabel = 'Budaya';

    protected static ?string $pluralModelLabel = 'Data Budaya';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return CulturalChunkForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CulturalChunksTable::configure($table);
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
            'index' => ListCulturalChunks::route('/'),
            'create' => CreateCulturalChunk::route('/create'),
            'edit' => EditCulturalChunk::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
