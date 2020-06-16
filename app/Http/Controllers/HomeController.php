<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interfaces\HomeRepositoryInterface;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $homeRepository;
    public function __construct(HomeRepositoryInterface $homeRepository)
    {
        $this->homeRepository = $homeRepository;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        return view('home');
    }

    public function getProfile()
    {
        $user = Auth::user();
        return view('getProfile', ['user' => $user]);
    }

    public function getEditProfile()
    {
        $user = Auth::user();
        return view('getEditProfile', ['user' => $user]);
    }

    public function postProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'dob' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|confirmed|min:8'
        ]);

        if ($validator->fails()) {
            return redirect('/getEditProfile')
                ->withInput()
                ->withErrors($validator);
        }

        $id = Auth::user()->id;
        if ($request->hasFile('image'))
        {
            $image = $request->image;
            $imageName = $image->getClientOriginalName();
            $image->storeAs('uploads', $imageName, 'public');

            $data = [
                'name' => $request->name,
                'dob' => $request->dob,
                'email' => $request->email,
                'image' => $imageName
            ];
            $this->homeRepository->updateProfile($id, $data);
        }
        else
        {
            $data = [
                'name' => $request->name,
                'dob' => $request->dob,
                'email' => $request->email,
            ];
            $this->homeRepository->updateProfile($id, $data);
        }
        $this->homeRepository->resetPassword($id, $request->password);

        return redirect('/profile');
    }
}
