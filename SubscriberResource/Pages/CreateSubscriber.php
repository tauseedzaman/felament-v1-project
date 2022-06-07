<?php

namespace App\Filament\Resources\SubscriberResource\Pages;

use App\Filament\Resources\SubscriberResource;
use App\Models\Subscriber;
use Filament\Resources\Pages\CreateRecord;

class CreateSubscriber extends CreateRecord
{
    public static $resource = SubscriberResource::class;
    public static $title = 'Create Subscriber';
    public static $routeName = 'subscriber.create';
    public $email;
    public function create($another=false)
    {
        $this->validateTemporaryUploadedFiles();

        $this->storeTemporaryUploadedFiles();

        $this->validate();
        $subscriber = new Subscriber();
        $subscriber->email = $this->email;
        $subscriber->save();

        $this->redirect('/admin/resources/subscribers');
    }
    // public function create($another = false)
    // {
    //     $this->callHook('beforeValidate');

    //     $this->validateTemporaryUploadedFiles();

    //     $this->storeTemporaryUploadedFiles();

    //     $this->validate();

    //     $this->callHook('afterValidate');

    //     $this->callHook('beforeCreate');

    //     $this->record = static::getModel()::create($this->record);

    //     $this->callHook('afterCreate');

    //     if ($another) {
    //         $this->fillRecord();

    //         $this->notify(__(static::$createdMessage));

    //         return;
    //     }

    //     $this->redirect($this->getRedirectUrl($this->record));
    // }

}
