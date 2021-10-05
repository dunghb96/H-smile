<?php

namespace App\Traits;

use App\Enums\CommonStatus;

trait BaseTrait
{

    public function getStatus()
    {
        return [
            CommonStatus::Active => 'Active',
            CommonStatus::InActive => 'Inactive',
        ];
    }

}
