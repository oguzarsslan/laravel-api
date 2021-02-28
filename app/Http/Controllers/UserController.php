<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function insert(UserRequest $request)
    {
        $args = $request->only('name', 'email', 'password');
        $args["password"] = bcrypt($args["password"]);

        User::create($args);

        return response('Kayıt Başarılı !');
    }

    public function list()
    {
        $users = User::get();

        return response($users);
    }

    public function update(UserRequest $request, User $user)
    {
        $args = $request->only('name');
        $user->name = $args['name'];
        $user->update();

        return response('Güncelleme Başarılı !');
    }

    public function delete(User $user)
    {
        $user->delete();

        return response('İşlem Başarılı !');
    }

    public function destroy()
    {
        User::truncate();

        return response('İşlem Başarılı !');
    }
}
