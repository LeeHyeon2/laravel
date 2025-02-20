<?php

namespace App\Services;

use App\Repositories\MemberRepository;
use Illuminate\Support\Facades\Log;

class MemberService
{
    protected $memberRepository;

    public function __construct(MemberRepository $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    // 회원가입
    public function register(array $data)
    {
        Log::info('서비스단까진 왔음일단', $data);
        return $this->memberRepository->create($data);
    }
}
