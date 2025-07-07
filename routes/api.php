<?php

use App\Models\User;
use App\Models\Admin;
use App\Models\Partner;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

// User Login
Route::post('/login/user', function (Request $request) {
    $user = User::where('phone', $request->phone)->first();
    if (! $user || ! Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Unauthorized'], 401);
    }
    return ['token' => $user->createToken('user-token')->plainTextToken];
});

// Admin Login
Route::post('/login/admin', function (Request $request) {
    $admin = Admin::where('email', $request->email)->first();
    if (! $admin || ! Hash::check($request->password, $admin->password)) {
        return response()->json(['message' => 'Unauthorized'], 401);
    }
    return ['token' => $admin->createToken('admin-token')->plainTextToken];
});

// Partner Login
Route::post('/login/partner', function (Request $request) {
    $partner = Partner::where('phone', $request->phone)->first();
    if (! $partner || ! Hash::check($request->password, $partner->password)) {
        return response()->json(['message' => 'Unauthorized'], 401);
    }
    return ['token' => $partner->createToken('partner-token')->plainTextToken];
});

//proteksi berdasarkan routes

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user/me', function (Request $request) {
        return $request->user();
    });

    Route::get('/partner/dashboard', function (Request $request) {
        return response()->json(['partner' => $request->user()]);
    });

    Route::get('/admin/dashboard', function (Request $request) {
        return response()->json(['admin' => $request->user()]);
    });
});

