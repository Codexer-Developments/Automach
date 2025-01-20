<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Filament\Resources\TestimonialResource\RelationManagers;
use App\Models\Testimonial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';
    protected static ?string $navigationGroup = 'Site Management';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('position')
                    ->label('Position/Role')
                    ->maxLength(255),
                Textarea::make('message')
                    ->label('Testimonial Message')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->label('Image')
                    ->directory('testimonials') // Store images in the "testimonials" directory
                    ->image()
                    ->maxSize(2048) // 2MB max file size
                    ->nullable(),
                Toggle::make('is_visible')
                    ->label('Visible')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('name')
                ->label('Name')
                ->sortable()
                ->searchable(),
            TextColumn::make('position')
                ->label('Position/Role')
                ->sortable()
                ->searchable(),
            TextColumn::make('message')
                ->label('Message')
                ->limit(50) // Limit the message length in the table
                ->tooltip(function (TextColumn $column): ?string {
                    $state = $column->getState();
                    return strlen($state) > 50 ? $state : null; // Show full message on hover
                }),
            ImageColumn::make('image')
                ->label('Image')
                ->disk('public') // Use the "public" disk
                ->circular(), // Display image in a circular format
            BooleanColumn::make('is_visible')
                ->label('Visible')
                ->sortable(),
            TextColumn::make('created_at')
                ->label('Created At')
                ->dateTime()
                ->sortable(),
        ])
        ->filters([
            // Add filters if needed
        ])
        ->actions([
            EditAction::make(), // Add Edit action
            DeleteAction::make(), // Add Delete action
            Action::make('toggleVisibility') // Custom action to toggle visibility
                ->label(fn (Testimonial $record) => $record->is_visible ? 'Hide' : 'Show')
                ->icon(fn (Testimonial $record) => $record->is_visible ? 'heroicon-o-eye-slash' : 'heroicon-o-eye')
                ->color(fn (Testimonial $record) => $record->is_visible ? 'warning' : 'success')
                ->action(function (Testimonial $record) {
                    $record->is_visible = !$record->is_visible;
                    $record->save();

                    // Show a notification
                    Notification::make()
                        ->title($record->is_visible ? 'Testimonial is now visible' : 'Testimonial is now hidden')
                        ->success()
                        ->send();
                })
                ->tooltip(fn (Testimonial $record) => $record->is_visible ? 'Hide this testimonial' : 'Show this testimonial'),
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
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}
