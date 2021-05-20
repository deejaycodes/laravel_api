<?php

namespace App\Repositories;

use App\Repositories\Contracts\StatusUpdateRepositoryInterface;
use App\StatusUpdate;

class StatusUpdateRepository implements StatusUpdateRepositoryInterface
{

public function newStatus(array $newData){

    try {
        $newStatus = new StatusUpdate();
        $newStatus->fill($newData);
        $newStatus->save();
        return $newStatus;
    } catch (\Exception $e) {
        return $e->getMessage();
    }
}

}
