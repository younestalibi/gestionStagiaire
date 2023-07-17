<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role=Auth::user()->user_type;
        if($role=='admin'){
            $students=User::where('user_type','user')->paginate(10);
            return view('formateur.index',compact('students'));
        }
        elseif ($role=='user') {
            return view('student.index');
        }
        
    }

    public function note(User $user)
    {
     return view('formateur.note',compact('user'))   ;
    }

    public function update(User $user , Request $request)
    {
        # code...
        // dd($user,$request);
        $user->note->update($request->input());
        return redirect()->back();
    }
    public function absence()
    {
        $students=User::where('user_type','user')->paginate(10);
        return view('formateur.absence',compact('students'));
        # code...
    }
    public function assignAbsence(User $user)
    {
        // dd($user);
        if($user->absence){
            $user->absence()->update(['status'=>$user->absence->status+1]);        
        }else{
            $user->absence()->create(['status'=>1,'date'=>date('Y-m-d')]);        
        }
        // dd($user->absence);
        // $u=User::all();
        // foreach($u as $a){
        //     $a->absence()->create(['date'=>'2023-07-15']);
        // }
        return redirect()->back();

    }
    public function getNotes()
    {
        return view('student.note');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('name');
        
        // Perform the search logic using the $searchTerm and retrieve the matching products
        $products = User::where('user_type','user')->where('name', 'like', '%' . $searchTerm . '%')->get();
        // dd($products);
        return $products;
        
        return response()->json($products);
    }
}
