<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;//tambah
use App\Models\Code;//tambah
use Illuminate\Support\Facades\Auth;//tambah

use Illuminate\Support\Facades\Hash; //tambahan
use App\Models\Asisten;               //tambahan
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\Role;               //tambahan
use Illuminate\Validation\Rule;//tambahan

class AdminController extends Controller
{
    public function dashboard() {//tambah
        $countDashboard = User::count();
        $countDashboard2 = Materi::count();
        $countDashboard3 = Kelas::count();
        
        return view('dashboard', compact('countDashboard','countDashboard2','countDashboard3'));//tambah
    }//tambah

    public function presensi() {//tambah
        $countDashboard = User::count();
        $countDashboard2 = Materi::count();
        $countDashboard3 = Kelas::count();
        $code = Code::All();
        
        return view('presensi', compact('countDashboard','countDashboard2','countDashboard3','code'));//tambah
    }//tambah

    public function riwayat() {//tambah
        $users = Code::All();
        return view('riwayat', compact('users'));//tambah
  
    }//tambah

    public function index()
    {
        $users = User::with('role')->get();
        $roles = Role::select(['id', 'role_name'])->get();
        return view('admin.data-asisten', ['roles' => $roles, 'users' => $users]);
    }
  
    public function create()
    {
        // $users = User::findOrFail($id);
        $users = User::with('role')->get();
        // $users = User::All();
        // $roles = Role::All();
        $roles = Role::select(['id', 'role_name'])->get();
        return view('admin.data-asisten', ['roles' => $roles, 'users' => $users]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', Rule::unique('users', 'email')], //angka,string,underscore
            'password' => ['required', 'string'],
            'role_id' => ['required', 'integer']
        ]);

        // dd($validated);
        $asisten = new User();
        $asisten -> name = $validated['name'];
        $asisten -> email = $validated['email'];
        $asisten -> password = Hash::make($validated['password']);
        $asisten -> role_id = $validated['role_id'];
        $asisten -> save();

        $users = User::with('role')->get();   
        $roles = Role::All();
        // return redirect(route('admin.data-asisten', compact('users','roles')));
        return view('admin.data-asisten', compact('users','roles'));//tambah
        // return view('dashboard');//tambah
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }

    // public function edit($id)
    // {
    //     // $roles = Role::all();
    //     // return view('admin.edit', compact('user', 'roles'));
    //     $roles = Role::select(['id', 'role_name'])->get();
    //     $users = User::findOrFail($id);
    //     return view('admin.data-asisten', ['users' => $users,'roles' => $roles]);
    // }

    public function update(Request $request, $id)
    {
        $asisten = User::findOrFail($id);
        // $asisten->update($request->all());
        // return redirect()->back();
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', Rule::unique('users', 'email')->ignore($id)], //angka,string,underscore
            'password' => ['required', 'string'],
            'role_id' => ['required', 'integer']
        ]);

        // $asisten = new User();
        $asisten -> name = $validated['name'];
        $asisten -> email = $validated['email'];
        $asisten -> password = Hash::make($validated['password']);
        $asisten -> role_id = $validated['role_id'];
        // $asisten->update($request->all());
        
        $asisten -> save();

        $users = User::with('role')->get();   
        $roles = Role::All();
        // return redirect(route('admin.data-asisten', compact('users','roles')));
        return view('admin.data-asisten', compact('users','roles'));//tambah

    }
    public function generate() {//tambah
        $randomBytes = openssl_random_pseudo_bytes(8);
        $hexString = bin2hex($randomBytes);
        $shuffledString = '';
        for ($i = 0; $i < strlen($hexString); $i++) {
            if (ctype_alpha($hexString[$i])) {
                $shuffledString .= mt_rand(0, 1) ? strtoupper($hexString[$i]) : strtolower($hexString[$i]);
            } else {
                $shuffledString .= $hexString[$i];
            }
        }
        $dataw = $shuffledString;
        $aId = Auth::user()->id;

        $code = new Code();
        $code->code = $dataw;
        $code->id_user = $aId;
        $code->save();
        return view('presensi', compact('dataw'));

    }//tambah
    public function checkin(Request $request, $id)
    {
        $asisten = Code::findOrFail($id);
        $validated = $request->validate([
            'code' => ['required', 'string'],
            'id_user' => ['required', Rule::unique('users', 'email')->ignore($id)], //angka,string,underscore
            'id_user_get' => ['required', 'integer']
        ]);

        // $asisten = new User();
        $asisten -> name = $validated['name'];
        $asisten -> email = $validated['email'];
        $asisten -> password = Hash::make($validated['password']);
        $asisten -> role_id = $validated['role_id'];
        // $asisten->update($request->all());
        
        $asisten -> save();

        $users = User::with('role')->get();   
        $roles = Role::All();
        // return redirect(route('admin.data-asisten', compact('users','roles')));
        return view('admin.data-asisten', compact('users','roles'));//tambah
    }
}
