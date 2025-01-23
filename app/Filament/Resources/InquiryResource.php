<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InquiryResource\Pages;
use App\Filament\Resources\InquiryResource\RelationManagers;
use App\Models\Inquiry;
use Filament\Tables\Actions\DeleteAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\ImageColumn;

class InquiryResource extends Resource
{
    protected static ?string $model = Inquiry::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox'; // Icon for the sidebar

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('email')->email()->required(),
                Forms\Components\TextInput::make('phone'),
                Forms\Components\Textarea::make('message')->required(),
                Forms\Components\Select::make('car_id')
                    ->relationship('car', 'name') // Display the car name
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('email')->sortable()->searchable(),
                TextColumn::make('phone')->sortable()->searchable(),
                TextColumn::make('message')->limit(50), // Limit message length
                ImageColumn::make('car.image_urls') // Display the first car image
                    ->label('Car Image')
                    ->getStateUsing(function ($record) {
                        $imageUrls = $record->car->image_urls;
                        return $imageUrls && count($imageUrls) > 0
                            ? asset('storage/' . $imageUrls[0]['url'])
                            : asset('frontend/assets/images/placeholders/placeholder.webp');
                    })
                    ->circular(), // Display the image as a circle
                TextColumn::make('car.name') // Display the car name
                    ->label('Car')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Submitted At')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                // Add filters if needed
            ])
            ->actions([
                Action::make('viewCar') // Add "View Car" action
                    ->label('View Car')
                    ->icon('heroicon-o-eye')
                    ->url(function ($record) {
                        return route('car.detail', $record->car_id); // Redirect to car detail page
                    })
                    ->openUrlInNewTab(), // Open in a new tab (optional)
                DeleteAction::make(), // Add Delete action
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListInquiries::route('/'),
            'edit' => Pages\EditInquiry::route('/{record}/edit'),
        ];
    }
}
