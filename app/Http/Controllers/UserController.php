<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
   public function index()
    {
        $user = User::latest()->paginate(10);

        return view('user.index', compact('user'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
	 public function create()
    {
        return view('user.create');
    }
	public function store(Request $request)
    {
        $request->validate([
			
            'email' => 'required|email|unique:users',
            'address' => 'required',
            'mobile_number' => 'required|numeric'
            
        ]);

        User::create($request->all());

        return redirect()->route('user.index')
            ->with('success', 'User created successfully.');
    }
	public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')
            ->with('success', 'User deleted successfully');
    }
}
