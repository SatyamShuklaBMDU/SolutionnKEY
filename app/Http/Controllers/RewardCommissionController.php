<?php

namespace App\Http\Controllers;

use App\Models\RewardCommission;
use Illuminate\Http\Request;

class RewardCommissionController extends Controller
{
    public function index()
    {
        $reward_commissions = RewardCommission::all();
        return view('admin.all_reward_commission', compact('reward_commissions'));
    }

    public  function create()
    {
        return view('admin.create_reward');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'reward_type' => 'required|string|max:255',
            'reward_amount' => 'required',
        ], [
            'reward_type.unique' => 'The reward type is already in use.',
        ]);
        RewardCommission::updateOrCreate(
            ['reward_type' => $validatedData['reward_type']],
            ['reward_amount' => $validatedData['reward_amount']]
        );
        return redirect()->route('reward-commission')->with('success', 'Reward and Commissions created or updated successfully!');
    }
    public function edit(RewardCommission $reward)
    {
        return view('admin.create_reward', compact('reward'));
    }

    public function update(Request $request, RewardCommission $reward)
    {

        $validatedData = $request->validate([
            'reward_type' => 'required|string|max:255',
            'reward_amount' => 'required',
        ], [
            'reward_type.unique' => 'The reward type is already in use.',
        ]);

        $existingRecord = RewardCommission::where('reward_type', $validatedData['reward_type'])->first();

        if ($existingRecord) {
            $existingRecord->update(['reward_amount' => $validatedData['reward_amount']]);
        }
        return redirect()->route('reward-commission')->with('success', 'Updated successfully!');
    }

    public function destroy(RewardCommission $reward)
    {
        $reward->delete();
        return redirect()->route('reward-commission')->with('success', 'Deleted successfully!');
    }
}
