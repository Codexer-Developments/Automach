<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarResource\Pages;
use App\Filament\Resources\CarResource\RelationManagers;
use App\Models\Car;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class CarResource extends Resource
{
    protected static ?string $model = Car::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';
    protected static ?string $navigationGroup = 'Car Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Car Name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('miles')
                    ->label('Miles')
                    ->numeric()
                    ->required(),
                Forms\Components\Select::make('fuel_type')
                    ->label('Fuel Type')
                    ->options([
                        'Petrol' => 'Petrol',
                        'Diesel' => 'Diesel',
                        'Electric' => 'Electric',
                        'Hybrid' => 'Hybrid',
                    ])
                    ->required(),
                Forms\Components\Select::make('transmission')
                    ->label('Transmission')
                    ->options([
                        'Automatic' => 'Automatic',
                        'Manual' => 'Manual',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('owners')
                    ->label('Owners')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->label('Price')
                    ->numeric()
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->label('Description')
                    ->rows(5) // Increase the number of rows
                    ->columnSpanFull() // Make the field span the full width
                    ->nullable(),
                Forms\Components\Select::make('condition')
                    ->label('Condition')
                    ->options([
                        'New' => 'New',
                        'Used' => 'Used',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('cylinders')
                    ->label('Cylinders')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('chassis_number')
                    ->label('Chassis Number')
                    ->nullable(),
                Forms\Components\TextInput::make('doors')
                    ->label('Doors')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('year')
                    ->label('Year')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('color')
                    ->label('Color')
                    ->required(),
                Forms\Components\TextInput::make('seats')
                    ->label('Seats')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('city_mpg')
                    ->label('City MPG')
                    ->numeric()
                    ->nullable(),
                Forms\Components\TextInput::make('highway_mpg')
                    ->label('Highway MPG')
                    ->numeric()
                    ->nullable(),
                Forms\Components\TextInput::make('engine_size')
                    ->label('Engine Size')
                    ->required(),
                Forms\Components\Select::make('drive_type')
                    ->label('Drive Type')
                    ->options([
                        'FWD' => 'FWD',
                        'RWD' => 'RWD',
                        'AWD' => 'AWD',
                        '4WD' => '4WD',
                    ])
                    ->required(),
                Forms\Components\Select::make('brand_id')
                    ->label('Brand')
                    ->relationship('brand', 'name')
                    ->required()
                    ->reactive(), // Make the field reactive
                Forms\Components\Select::make('car_model_id')
                    ->label('Car Model')
                    ->options(function (callable $get) {
                        // Get the selected brand_id
                        $brandId = $get('brand_id');

                        // If a brand is selected, filter car models by brand_id
                        if ($brandId) {
                            return \App\Models\CarModel::where('brand_id', $brandId)->pluck('name', 'id');
                        }

                        // Otherwise, return an empty array
                        return [];
                    })
                    ->required(),
                Repeater::make('image_urls')
                    ->label('Images')
                    ->schema([
                        FileUpload::make('url') // Store the file path in the 'url' key
                            ->label('Image')
                            ->directory('car-images') // Folder to store images in the `storage/app/public` directory
                            ->image() // Restrict to image files
                            ->required(),
                    ])
                    ->orderable('url') // Allow reordering of images
                    ->defaultItems(1), // Default number of image upload fields

                Forms\Components\CheckboxList::make('features')
                    ->label('Features')
                    ->relationship('features', 'name')
                    ->columns(3) // Display checkboxes in 3 columns (adjust as needed)
                    ->required(),
            ]);
    }

    // public static function table(Table $table): Table
    // {
    //     return $table
    //         ->columns([
    //             Tables\Columns\TextColumn::make('name')
    //                 ->label('Car Name')
    //                 ->sortable()
    //                 ->searchable(),
    //             Tables\Columns\TextColumn::make('brand.name')
    //                 ->label('Brand')
    //                 ->sortable()
    //                 ->searchable(),
    //             Tables\Columns\TextColumn::make('carModel.name')
    //                 ->label('Car Model')
    //                 ->sortable()
    //                 ->searchable(),
    //             Tables\Columns\TextColumn::make('price')
    //                 ->label('Price')
    //                 ->sortable()
    //                 ->money('USD'),
    //             Tables\Columns\TextColumn::make('condition')
    //                 ->label('Condition')
    //                 ->sortable(),
    //             Tables\Columns\TextColumn::make('created_at')
    //                 ->label('Created At')
    //                 ->dateTime()
    //                 ->sortable(),
    //         ])
    //         ->filters([
    //             // Add filters if needed
    //         ])
    //         ->actions([
    //             EditAction::make(), // Add Edit action
    //             DeleteAction::make(), // Add Delete action
    //         ])
    //         ->defaultSort('created_at', 'desc');
    // }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_urls')
                    ->label('Images')
                    ->getStateUsing(function ($record) {
                        // Display the first image
                        return $record->image_urls[0]['url'] ?? null;
                    })
                    ->circular() // Optional: Display the image as a circle
                    ->toggleable()
                    ->searchable(), // Visible by default

                TextColumn::make('name')
                    ->label('Car Name')
                    ->sortable()
                    ->searchable(), // Visible by default

                TextColumn::make('miles')
                    ->label('Miles')
                    ->toggledHiddenByDefault(), // Hidden by default

                TextColumn::make('price')
                    ->label('Price')
                    ->sortable(), // Visible by default

                TextColumn::make('year')
                    ->label('Year')
                    ->sortable(), // Visible by default

                TextColumn::make('fuel_type')
                    ->label('Fuel Type')
                    ->toggleable()
                    ->toggledHiddenByDefault(), // Hidden by default

                TextColumn::make('transmission')
                    ->label('Transmission')
                    ->toggleable()
                    ->toggledHiddenByDefault(), // Hidden by default

                TextColumn::make('owners')
                    ->label('Owners')
                    ->toggleable()
                    ->toggledHiddenByDefault(), // Hidden by default

                TextColumn::make('description')
                    ->label('Description')
                    ->limit(50)
                    ->toggleable()
                    ->toggledHiddenByDefault(), // Hidden by default

                TextColumn::make('condition')
                    ->label('Condition')
                    ->toggleable()
                    ->toggledHiddenByDefault(), // Hidden by default

                TextColumn::make('cylinders')
                    ->label('Cylinders')
                    ->toggleable()
                    ->toggledHiddenByDefault(), // Hidden by default

                TextColumn::make('chassis_number')
                    ->label('Chassis Number')
                    ->toggleable()
                    ->toggledHiddenByDefault(), // Hidden by default

                TextColumn::make('doors')
                    ->label('Doors')
                    ->toggleable()
                    ->toggledHiddenByDefault(), // Hidden by default

                TextColumn::make('color')
                    ->label('Color')
                    ->toggleable()
                    ->sortable(), // Visible by default

                TextColumn::make('seats')
                    ->label('Seats')
                    ->toggleable()
                    ->toggledHiddenByDefault(), // Hidden by default

                TextColumn::make('city_mpg')
                    ->label('City MPG')
                    ->toggleable()
                    ->toggledHiddenByDefault(), // Hidden by default

                TextColumn::make('highway_mpg')
                    ->label('Highway MPG')
                    ->toggleable()
                    ->toggledHiddenByDefault(), // Hidden by default

                TextColumn::make('engine_size')
                    ->label('Engine Size')
                    ->toggleable()
                    ->toggledHiddenByDefault(), // Hidden by default

                TextColumn::make('drive_type')
                    ->label('Drive Type')
                    ->toggleable()
                    ->toggledHiddenByDefault(), // Hidden by default

                TextColumn::make('brand.name') // Assuming a relationship with the Brand model
                    ->label('Brand')
                    ->toggleable()
                    ->sortable(), // Visible by default

                TextColumn::make('carModel.name') // Assuming a relationship with the CarModel model
                    ->label('Car Model')
                    ->toggleable()
                    ->sortable(), // Visible by default



                TextColumn::make('user.name') // Assuming a relationship with the User model
                    ->label('User')
                    ->toggleable()
                    ->toggledHiddenByDefault(), // Hidden by default
            ])
            ->filters([
                // Add filters if needed
            ])
            ->actions([
                EditAction::make(), // Add Edit action
                DeleteAction::make(), // Add Delete action
            ])
            ->defaultSort('created_at', 'desc')
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
            'index' => Pages\ListCars::route('/'),
            'create' => Pages\CreateCar::route('/create'),
            'edit' => Pages\EditCar::route('/{record}/edit'),
        ];
    }
}
