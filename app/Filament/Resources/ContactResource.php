<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Filament\Resources\ContactResource\RelationManagers;
use App\Models\Contact;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;


class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';




    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Name')->sortable()->searchable()->toggleable(),
                TextColumn::make('email')->label('Email')->sortable()->searchable()->toggleable(),
                TextColumn::make('phone')->label('Phone')->sortable()->searchable()->toggleable(),
                TextColumn::make('subject')->label('Subject')->sortable()->searchable()->toggleable(),
                TextColumn::make('message')->label('Message')->limit(50)->toggleable(),
                BooleanColumn::make('status')->label('Status')->sortable()->toggleable(),
                TextColumn::make('created_at')->label('Submitted At')->dateTime()->toggleable(),
            ])
            ->filters([
                // Add filters if needed
            ])
            ->actions([
                Action::make('toggleStatus')
                    ->label(fn(Contact $record) => $record->status ? '' : '') // Empty label
                    ->icon(fn(Contact $record) => $record->status ? 'heroicon-o-eye' : 'heroicon-o-eye-slash') // Dynamic icon
                    ->color(fn(Contact $record) => $record->status ? 'success' : 'warning') // Dynamic color
                    ->tooltip(fn(Contact $record) => $record->status ? 'Mark as Unread' : 'Mark as Read') // Dynamic tooltip
                    ->action(function (Contact $record) {
                        $record->status = !$record->status;
                        $record->save();

                        // Show a notification
                        Notification::make()
                            ->title($record->status ? 'Marked as Read' : 'Marked as Unread')
                            ->success()
                            ->send();
                    }),
                Tables\Actions\DeleteAction::make(),
            ])
            ->headerActions([
                // Explicitly define header actions (leave this empty to remove all actions)
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
            'index' => Pages\ListContacts::route('/'),
            // 'create' => Pages\CreateContact::route('/create'),
            // 'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}
