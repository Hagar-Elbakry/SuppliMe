<?php

namespace App\Repositories;

use App\Models\SupportMessage;

class SupportMessageRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function storeMessage($data)
    {
        SupportMessage::query()->create($data);
    }
}
