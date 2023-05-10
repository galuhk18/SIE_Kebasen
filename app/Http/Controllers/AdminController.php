<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function index() {
        
        return view('admin.index');
    }

    // Population
    public function population_index() {

    }
    public function population_create() {
        
    }

    public function population_store() {
        
    }
    // Facility
    public function facility_index() {
        $data['facility'] = DB::table('facility')->get();
        return view('admin.facility.index', $data);
    }

    public function facility_create() {
        return view('admin.facility.create');
    }

    public function facility_store(Request $req) {
        $req->validate([
            'name' => 'required',
            'amount' => 'required',
            'information' => 'required',
            'condition' => 'required',
        ]);
        try {
    
            DB::table('facility')->insert([
                'name' => $req->name,
                'amount' => $req->amount,
                'information' => $req->information,
                'condition' => $req->condition,
                'created_at' => Carbon::now()
            ]);

            Alert::success('Success');

            return redirect(route('facility.index'));
        } catch (\Exception $e) {         
            Alert::error($e->getMessage());
            return back();
        }
    }

    public function facility_edit($id) {
        $data['facility'] = DB::table('facility')
                            ->where('id', $id)
                            ->first();
        return view('admin.facility.edit', $data);
    }

    public function facility_update(Request $req, $id) {
        $req->validate([
            'name' => 'required',
            'amount' => 'required',
            'information' => 'required',
            'condition' => 'required',
        ]);
        try {
    
            DB::table('facility')
            ->where('id', $id)    
            ->update([
                'name' => $req->name,
                'amount' => $req->amount,
                'information' => $req->information,
                'condition' => $req->condition,
                'updated_at' => Carbon::now()
            ]);

            Alert::success('Success');

            return redirect(route('facility.index'));
        } catch (\Exception $e) {         
            Alert::error($e->getMessage());
            return back();
        }
    }

    public function facility_destroy($id) {
        try {   
            $check = DB::table('facility')
                        ->where('id', $id)
                        ->first();
            if(!$check) {
                Alert::error('Facility not found');
                return back();
            }

            DB::table('facility')
                        ->where('id', $id)
                        ->delete();

            Alert::success('Success');

            return redirect(route('facility.index'));
        } catch (\Exception $e) {         
            Alert::error($e->getMessage());
            return back();
        }
    }

    // User Admin
    public function user_admin_index() {
        $data['admin'] = DB::table('admin')->get();
        return view('admin.user-admin.index', $data);
    }

    public function user_admin_create() {
        
        return view('admin.user-admin.create');
    }

    public function user_admin_store(Request $req) {
        $req->validate([
            'name' => 'required',
            'username' => 'required|unique:admin,username',
            'email' => 'required|email|unique:admin,email',
            'phone_number' => 'required',
            'password' => 'required|same:password_confirm',
            'password_confirm' => 'required|same:password',
            'address' => 'required',
        ]);
        try {
    
            DB::table('admin')->insert([
                'name' => $req->name,
                'username' => $req->username,
                'email' => $req->email,
                'phone_number' => $req->phone_number,
                'password' => Hash::make($req->password),
                'address' => $req->address,
                'created_at' => Carbon::now()
            ]);

            Alert::success('Success');

            return redirect(route('user.admin.index'));
        } catch (\Exception $e) {         
            Alert::error($e->getMessage());
            return back();
        }
    }

    public function user_admin_edit($id) {
        $data['admin'] = DB::table('admin')
                            ->where('id', $id)
                            ->first();
        return view('admin.user-admin.edit', $data);
    }

    public function user_admin_update(Request $req, $id) {
        $req->validate([
            'name' => 'required',
            'username' => 'required|unique:admin,username,'.$id.',id',
            'email' => 'required|email|unique:admin,email,'.$id.',id',
            'phone_number' => 'required',
            'address' => 'required',
        ]);
        try {
    
            DB::table('admin')
            ->where('id', $id)
            ->update([
                'name' => $req->name,
                'username' => $req->username,
                'email' => $req->email,
                'phone_number' => $req->phone_number,
                'password' => Hash::make($req->password),
                'address' => $req->address,
                'updated_at' => Carbon::now()
            ]);

            Alert::success('Success');

            return redirect(route('user.admin.index'));
        } catch (\Exception $e) {         
            Alert::error($e->getMessage());
            return back();
        }
    }

    public function user_admin_pass($id) {
        $data['admin'] = DB::table('admin')
                            ->where('id', $id)
                            ->first();
        return view('admin.user-admin.pass', $data);
    }

    public function user_admin_pass_act(Request $req, $id) {
        $req->validate([
            'password' => 'required|same:password_confirm',
            'password_confirm' => 'required|same:password',
        ]);
        try {
    
            DB::table('admin')
            ->where('id', $id)
            ->update([
               
                'password' => Hash::make($req->password),
                'updated_at' => Carbon::now()
            ]);

            Alert::success('Success');

            return redirect(route('user.admin.index'));
        } catch (\Exception $e) {         
            Alert::error($e->getMessage());
            return back();
        }
    }

    public function user_admin_destroy($id) {
        try {
    
            $check = DB::table('admin')
                        ->where('id', $id)
                        ->first();
            if(!$check) {
                Alert::error('User admin not found');
                return back();
            }

            DB::table('admin')
                        ->where('id', $id)
                        ->delete();

            Alert::success('Success');

            return redirect(route('user.admin.index'));
        } catch (\Exception $e) {         
            Alert::error($e->getMessage());
            return back();
        }
    }
}
