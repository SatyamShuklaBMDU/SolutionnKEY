<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReferralController extends Controller
{
    public function store($referral,$user)
    {
        try {
            DB::statement('CALL insert_referral(?, ?, ?, ?)', [
                $referral,
                $user,
                'Referral',
                10
            ]);
            return back();
        } catch (QueryException $e) {
            return response()->json(['error' => 'Failed to register referral'], 500);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }
}
