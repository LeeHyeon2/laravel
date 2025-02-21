<?php

namespace App\Repositories;

use App\Models\Member;
use Illuminate\Support\Facades\Log;

class MemberRepository
{

    public function create(array $data)
    {
        Log::info('리포지토리에서 받은 데이터', $data);
        return Member::create($data);
    }

    // 아이디로 회원 조회
    public function findByMemberId($memberId)
    {
        return Member::where('member_id', $memberId)->first();
    }
}
