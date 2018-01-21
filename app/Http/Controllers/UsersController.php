<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Menu;
use App\Report;
use App\Mail\UserCreated;

class UsersController extends Controller
{
    public function index(){
        $users=User::latest()->get();
        return view('pages.adminpages.kullaniciislemleri',compact('users'));
    }

    /**
     * Hata mesajları
     */
    public function messages(){
        return [
            'name.required' => 'Ad Soyad boş kalamaz.',
            'sicilno.required'  => 'Sicil no boş kalamaz.',
            'email.required'  => 'E-mail boş kalamaz.',
            'password.required'  => 'Şifre boş kalamaz.',
            'sicilno.unique' => 'Bu sicil no veritabanında bulunmaktadır.',
            'password.confirmed' => 'Şifreler aynı değildir.',
        ];
    }

    public function store(Request $request){

        $this->validate(request(), [
            'name' => 'required',
            'sicilno' => 'required|unique:users',
            'email' => 'required',
            'password' => 'required|confirmed',
            'password-confirmation' => 'sometimes|required_with:password',
        ], $this->messages());

        $user=new User;

        $user->name = $request->name;
        $user->sicilno = $request->sicilno;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->group = $request->group;
        $user->save();

        // \Mail::to($user)->send(new UserCreated($user));

        return redirect('/admin/kullaniciislemleri');
    }

    public function show($id){
        $user = User::find($id);
        return view('pages.adminpages.kullaniciislemleri.show')->withUser($user);
    }

    public function edit($id){
        $users = User::all();
        $edited_user = User::find($id);
        // return view('pages.adminpages.kullaniciislemleri.edit')->withUser($user)->withUser($users);
        return view('pages.adminpages.kullaniciislemleri.edit',compact('users', 'edited_user'));
    }

    public function update(Request $request, $id){
        $user=User::find($id);
        $user->update($request->except('password'));

        return redirect()->route('kullaniciislemleri.index');
    }

}
