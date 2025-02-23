<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Services\MemberService;
use Illuminate\Support\Facades\Log;

class MemberController extends Controller
{

    protected $memberService;

    public function __construct(MemberService $memberService)
    {
        $this->memberService = $memberService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * 이거 회원가입 인거잖아?
     * crud 형식으로 잘바꿔라잉
     */
    public function store(Request $request)
    {
        try {
            // 유효성 검사
            $validatedData = $request->validate([
                'member_id' => 'required',
                'nickname' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'password_check' => 'required|same:password',
            ]);

            Log::info('컨트롤러체크', $validatedData);
            $this->memberService->register($validatedData);
            return redirect()->route('index')->with('success', '회원가입이 완료되었습니다.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('유효성 검사 실패', ['errors' => $e->errors()]);
            return redirect()->route('user.register')->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('회원가입 실패', ['error' => $e->getMessage()]);
            return redirect()->route('user.register')->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
