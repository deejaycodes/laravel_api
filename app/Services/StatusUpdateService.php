<?php

namespace App\Services;

use App\Repositories\Contracts\StatusUpdateRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use App\User;

class StatusUpdateService
{

    protected $statusUpdateRepositoryInterface;
    public function __construct(StatusUpdateRepositoryInterface $statusUpdateRepositoryInterface)
    {
        $this->statusUpdateRepositoryInterface = $statusUpdateRepositoryInterface;
    }

    public function newStatus(array $data)
    {
        $userId = Auth::user()->id;

        $newData = [
            'user_id' => $userId,
            'status'=> $data['status']
        ];

       return $this->statusUpdateRepositoryInterface->newStatus($newData);
    }


}
