<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class CustomerController extends Controller
{
    public function register(Request $request)
    {
        try {
            $request->merge(['dob' => Carbon::createFromFormat('d-m-Y', $request->dob)->format('Y-m-d')]);
            $validatedData = $request->validate([
                'name' => 'required|string',
                'gender' => 'nullable|in:male,female,other',
                'phone_number' => 'nullable|string',
                'email' => 'required|email|unique:customers,email',
                'marital_status' => 'nullable|string',
                'dob' => 'nullable|date',
                'city' => 'nullable|string',
                'state' => 'nullable|string',
                'address' => 'nullable|string',
                'profile_pic' => 'nullable|image|max:2048',
                'password' => 'required|string|min:6',
                'pin_no' => 'required|string|min:4',
            ]);
            $validatedData['password'] = Hash::make($validatedData['password']);
            if ($request->hasFile('profile_pic')) {
                $file = $request->file('profile_pic');
                $fileName = $file->getClientOriginalName();
                $file->move(public_path('profile_pics'), $fileName);
                $validatedData['profile_pic'] = 'profile_pics/' . $fileName;
            }
            $customer = Customer::create($validatedData);
            return response()->json(['message' => 'Customer registered successfully', 'data' => $customer], Response::HTTP_CREATED);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->validator->errors()], Response::HTTP_BAD_REQUEST);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Failed to register customer.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function update(Request $request)
    {
        try {
            $customer = Customer::findOrFail($request->id);
            $request->merge(['dob' => Carbon::createFromFormat('d-m-Y', $request->dob)->format('Y-m-d')]);
            $validatedData = $request->validate([
                'name' => 'string',
                'gender' => 'nullable|in:male,female,other',
                'phone_number' => 'nullable|string',
                'email' => 'email|unique:customers,email,' . $customer->id,
                'marital_status' => 'nullable|string',
                'dob' => 'nullable|date',
                'city' => 'nullable|string',
                'state' => 'nullable|string',
                'address' => 'nullable|string',
                'profile_pic' => 'nullable|image|max:2048',
                'password' => 'nullable|string|min:6',
                'pin_no' => 'nullable|string|min:4',
            ]);
            if ($request->hasFile('profile_pic')) {
                $file = $request->file('profile_pic');
                $fileName = $file->getClientOriginalName();
                $file->move(public_path('profile_pics'), $fileName);
                $validatedData['profile_pic'] = 'profile_pics/' . $fileName;
            }
            if (isset($validatedData['password'])) {
                $validatedData['password'] = Hash::make($validatedData['password']);
            }
            $customer->update($validatedData);
            return response()->json(['message' => 'Customer details updated successfully', 'data' => $customer]);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->validator->errors()], Response::HTTP_BAD_REQUEST);
        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function login(Request $request)
    {
        try {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
            $credentials = $request->only('email', 'password');
            if (Auth::guard('customer')->attempt($credentials)) {
                $customer = Customer::where('email', $request->email)->firstOrFail();
                $token = $customer->createToken('CustomerToken')->plainTextToken;
                return response()->json(['token' => $token], 200);
            } else {
                throw ValidationException::withMessages([
                    'email' => ['The provided credentials are incorrect.'],
                ]);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }
    public function logout(Request $request)
    {
        $request->user('customer')->tokens()->delete();
        return response()->json(['message' => 'Successfully logged out'], 200);
    }
}