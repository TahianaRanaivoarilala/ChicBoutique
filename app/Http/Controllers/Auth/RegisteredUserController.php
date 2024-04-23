<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Storage;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $user=new User();
        return view('auth.register',[
            'user'=>$user
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(UserFormRequest $request): RedirectResponse
    {
        $user=new User();
        $data=$request->validated();

        // $data['password']=Hash::make($password);
        $user=User::create($this->extractData($user,$request));

         event(new Registered($user));

         Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
    private function extractData(User $user,UserFormRequest $request):array
    {
        $data=$request->validated();
        $password=$request->validated('password');
        $user->password=$data['password']=Hash::make($password);
        /**
         * @var UploadedFile | null $featuredImage
         */
        $featuredImage=$request->validated('featuredImage');

        if($featuredImage===null || $featuredImage->getError())
        {
            return $data;
        }
        if($user->featuredImage){
            Storage::disk('public')->delete($user->featuredImage);
        }
        $data['featuredImage']=$featuredImage->store('UserProfil','public');
        // dd($data);
        return $data;


    }
}
