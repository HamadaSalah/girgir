<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;

    protected static bool $canCreateAnother = false;

    protected function getRedirectUrl(): string
    {
        return route('filament.manage.resources.categories.index');
    }

    protected function afterCreate(): void
    {
        $data = $this->form->getRawState();
        $record = $this->record;

        $this->handleImageUpload($record, $data['image'] ?? null);
    }
    protected function handleImageUpload(Model $record, $image): void
    {
        $fileableType = get_class($record);
        $fileableId = $record->id;

        if (is_array($image)) {
            foreach ($image as $imagePath) {
                $record->image()->create([
                    'name' => basename($imagePath),
                    'path' => $imagePath,
                    'fileable_type' => $fileableType,
                    'fileable_id' => $fileableId
                ]);
            }
        } elseif ($image) {
            $record->image()->create([
                'name' => basename($image),
                'path' => $image,
                'fileable_type' => $fileableType,
                'fileable_id' => $fileableId
            ]);
        }
    }


    protected function mutateFormDataBeforeCreate(array $data): array
    {
        unset($data['image']);
        return $data;
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Success!')
            ->body('The category has been created successfully.');
    }
}
