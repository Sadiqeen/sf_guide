<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;
use App\User;

class ProfileController extends Controller
{
    public function index($id = null)
    {
        if ($id) {
            $user = User::find($id);
        } else {
            $user = auth()->user();
        }

        $products = $user->product()->paginate(10);

        return view('profile.index', [
            'user' => $user,
            'products' => $products,
        ]);
    }

    public function edit()
    {
        return view('profile.edit', [
            'user' => auth()->user()
        ]);
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = User::find(auth()->user()->id);
        $user->update($request->validated());
        if ($request->product_image) {
            $user->clearMediaCollection();
            $user->addMediaFromRequest('product_image')->toMediaCollection();
        }

        alert()->success('สำเร็จ', 'อัพเดทโปรไฟล์สำเร็จ');
        return redirect()->route('profile.index');
    }
}
