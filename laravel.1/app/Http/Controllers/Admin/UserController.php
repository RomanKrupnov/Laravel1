<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::query()->where('id', '!=', Auth::id())->paginate(5);
        return view('admin.usersIndex', ['user' => $user]);
    }

    public function toggleAdmin(User $user)
    {
        if ($user->id != Auth::id()) {
            $user->role = !$user->role;
            $user->save();

            return redirect()->back()->with('success', 'Права изменены');
        } else {
            return redirect()->route('admin.indexUser')->with('error', 'Ошибка');
        }
    }

    public function destroy(User $user)
    {

        $user->delete();
        return redirect()->back()->with('success', 'Аккаунт успешно удален!');
    }

    public function edit(Request $request, User $user)
    {
        return view('admin.editUser', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        if ($request->isMethod('post')) {
            $data = $this->validate($request, User::rules());
            $result = $user->fill([$data,
                'name' => $request['name'],
                'password' => Hash::make($request['password']),
                'email' => $request['email']
            ])->save();
            if ($result) {
                return redirect()->route('admin.indexUser')->with('success', 'Аккаунт успешно обновлен!');
            }
            else {
                $request->flash();
                return redirect()->route('admin.editUser')->with('error', 'Ошибка обновления аккаунта!');
            }
        }

    }
}
