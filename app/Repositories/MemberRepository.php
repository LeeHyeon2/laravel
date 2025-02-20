<?php

namespace App\Repositories;

use App\Models\Member;

class MemberRepository
{
    public function create(array $data)
    {
        return Member::create($data);
    }
}
