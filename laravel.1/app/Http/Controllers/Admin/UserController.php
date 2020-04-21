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
        $user = User::query()->where('id', '!=', Auth::id())->paginate(2);
        return view('admin.usersIndex', ['user' => $user]);
    }
    public function toggleAdmin(User $user)
    {
        if ($user->id != Auth::id()) {
            $user->role = !$user->role;
            $user->save();

            return redirect()->back()->with('success', 'Права изменены');
        } else {
            return redirect()->route('admin.updateUser')->with('error', 'Ошибка');
        }

    }
    public function destroy(User $user){

        $user->delete();
        return redirect()->back()->with('success', 'Аккаунт успешно удален!');
    }
/*
    public function delete(User $user){
        $user->delete();
        return redirect()->route('admin.updateUser')->with('success', 'Аккаунт успешно удален!');
    }
    public function edit(Request $request, User $user)
    {
        return view('admin.editUser', [
            'user' => $user
        ]);
    }
    public function update(Request $request)
    {
        $user = Auth::user();
        /*   if (Hash::check($request['password'], $user->password)) {
                $user->fill([
                    'name' => $request['name'],
                    'password' => Hash::make($request['newPassword']),
                    'email' => $request['email']
                ]);
                $request->session()->flash('success', 'Данные пользователя изменены!');
                $data = $this->validate($request, User::rules());
                $user->fill($data)->save();
                return redirect()->route('index');
            }
        return view('admin.editUser', [
            'user' => $user
        ]);
    }*/
}
