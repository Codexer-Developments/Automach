<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BodyTypeResource\Pages;
use App\Filament\Resources\BodyTypeResource\RelationManagers;
use App\Models\BodyType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class BodyTypeResource extends Resource
{
    protected static ?string $model = BodyType::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube-transparent';
    protected static ?string $navigationGroup = 'Car Management';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Body Type Name')
                    ->required()
                    ->maxLength(255),

                FileUpload::make('image_path')
                    ->label('Body Type Image')
                    ->directory('body-types')
                    ->acceptedFileTypes(['image/svg+xml', 'image/png']) // Allow only SVG and PNG files
                    ->required(),
            ]);
    }

    // public static function table(Table $table): Table
    // {
    //     return $table
    //         ->columns([
    //             //
    //         ])
    //         ->filters([
    //             //
    //         ])
    //         ->actions([
    //             Tables\Actions\EditAction::make(),
    //         ])
    //         ->bulkActions([
    //             Tables\Actions\BulkActionGroup::make([
    //                 Tables\Actions\DeleteBulkAction::make(),
    //             ]),
    //         ]);
    // }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_path')
                    ->label('Body Type Image')
                    ->disk('public'), // Optional: Display the image as a circle // Use the `public` disk (storage/app/public)


                TextColumn::make('name')
                    ->label('Body Type Name')
                    ->sortable()
                    ->searchable(),


            ])
            ->filters([
                // Add filters if needed
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListBodyTypes::route('/'),
            'create' => Pages\CreateBodyType::route('/create'),
            'edit' => Pages\EditBodyType::route('/{record}/edit'),
        ];
    }
}
