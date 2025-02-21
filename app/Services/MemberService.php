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

        // 아이디 중복 체크
        $existingMember = $this->memberRepository->findByMemberId($data['member_id']);
        if ($existingMember) {
            Log::error('아이디 중복 오류', ['member_id' => $data['member_id']]);
            throw new \Exception('이미 사용 중인 아이디입니다.');
        }

        // 비밀번호와 비밀번호 확인의 일치 여부 확인
        if ($data['password'] !== $data['password_check']) {
            Log::error('비밀번호 불일치 오류', ['password' => $data['password'], 'password_check' => $data['password_check']]);
            throw new \Exception('비밀번호와 비밀번호 확인이 일치하지 않습니다.');
        }

        // 비밀번호 암호화
        $data['password'] = bcrypt($data['password']);

        // 데이터베이스에 저장
        return $this->memberRepository->create($data);
    }
}
