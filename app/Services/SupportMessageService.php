<?php

namespace App\Services;

use App\Repositories\SupportMessageRepository;

class SupportMessageService
{
    public $supportMessageRepository;

    /**
     * Create a new class instance.
     */
    public function __construct(SupportMessageRepository $supportMessageRepository)
    {
        $this->supportMessageRepository = $supportMessageRepository;
    }

    public function storeMessage($request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $this->supportMessageRepository->storeMessage($data);
    }
}
