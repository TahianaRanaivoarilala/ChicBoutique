<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [

             'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request,User $user): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }


       $user->update($this->extractData($user,$request));


        return Redirect::route('profile.edit',[
            'user'=>$user
        ])->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
private function extractData(User $user,ProfileUpdateRequest $request):array
    {
        $data=$request->validated();

        /**
         * @var UploadedFile | null $featuredImage
         */
        $featuredImage=$request->validated('featuredImage');

        if($featuredImage===null || $featuredImage->getError())
        {
            return $data;
        }

        if($user->featuredImage)
        {
            Storage::disk('public')->delete($user->featuredImage);
        }
        $data['featuredImage']=$featuredImage->store('UserProfil','public');;
        return $data;


    }
}
