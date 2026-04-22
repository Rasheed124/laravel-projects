<?php
namespace App\Http\Controllers;

use App\Http\Requests\UpdateSettingRequest;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth']);
    }

    public function edit()
    {

        // Fetch the authenticated user
        $user = Auth::user();


        return view("setting", compact('user'));
      
    }

    public function update(UpdateSettingRequest $request)
    {
        $request->user()->updateSettings($request->getData());

        return back()->with('message', "Your changes have been saved");
    }

}
