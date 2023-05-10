<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
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
        $data['population'] = DB::table('population')->get();
        return view('admin.population.index', $data);
    }
    public function population_create() {
        $data['religion'] = Config::get('enums.religion');
        $data['married'] = Config::get('enums.married');
        $data['gender'] = Config::get('enums.gender');
        $data['citizenship'] = Config::get('enums.citizenship');
        
        return view('admin.population.create', $data);
    }

    public function population_store(Request $req) {
        $req->validate([
            'nik' => 'required',
            'family_card' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'date_of_birth' => 'required',
            'birth_place' => 'required',
            'phone_number' => 'required',
            'religion' => 'required',
            'citizenship' => 'required',
            'married' => 'required',
            'job' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
        ]);

        try {
            //code...
            DB::table('population')->insert([
                'nik' => $req->nik,
                'family_card' => $req->family_card,
                'name' => $req->name,
                'gender' => $req->gender,
                'address' => $req->address,
                'date_of_birth' => $req->date_of_birth,
                'birth_place' => $req->birth_place,
                'phone_number' => $req->phone_number,
                'religion' => $req->religion,
                'citizenship' => $req->citizenship,
                'married' => $req->married,
                'job' => $req->job,
                'father_name' => $req->father_name,
                'mother_name' => $req->mother_name,
                'created_at' => Carbon::now()
            ]);

            Alert::success('Success');

            return redirect(route('population.index'));
        } catch (\Exception $e) {
            //throw $th;
            Alert::error($e->getMessage());
            return back();
        }
    }

    public function population_edit($id) {
        $data['religion'] = Config::get('enums.religion');
        $data['married'] = Config::get('enums.married');
        $data['gender'] = Config::get('enums.gender');
        $data['citizenship'] = Config::get('enums.citizenship');
        $data['population'] = DB::table('population')->where('id', $id)->first();
        return view('admin.population.edit', $data);
    }

    public function population_update(Request $req, $id) {
        $req->validate([
            'nik' => 'required',
            'family_card' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'date_of_birth' => 'required',
            'birth_place' => 'required',
            'phone_number' => 'required',
            'religion' => 'required',
            'citizenship' => 'required',
            'married' => 'required',
            'job' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
        ]);

        try {
            //code...
            DB::table('population')
            ->where('id', $id)    
            ->update([
                'nik' => $req->nik,
                'family_card' => $req->family_card,
                'name' => $req->name,
                'gender' => $req->gender,
                'address' => $req->address,
                'date_of_birth' => $req->date_of_birth,
                'birth_place' => $req->birth_place,
                'phone_number' => $req->phone_number,
                'religion' => $req->religion,
                'citizenship' => $req->citizenship,
                'married' => $req->married,
                'job' => $req->job,
                'father_name' => $req->father_name,
                'mother_name' => $req->mother_name,
                'updated_at' => Carbon::now()
            ]);

            Alert::success('Success');

            return redirect(route('population.index'));
        } catch (\Exception $e) {
            //throw $th;
            Alert::error($e->getMessage());
            return back();
        }
    } 

    public function population_destroy($id) {
        try {   
            $check = DB::table('population')
                        ->where('id', $id)
                        ->first();
            if(!$check) {
                Alert::error('Population not found');
                return back();
            }

            DB::table('population')
                        ->where('id', $id)
                        ->delete();

            Alert::success('Success');

            return redirect(route('population.index'));
        } catch (\Exception $e) {         
            Alert::error($e->getMessage());
            return back();
        }
    }

    // Birth
    public function birth_index() {
        $data['birth'] = DB::table('birth')->get();
        return view('admin.birth.index', $data);
    }

    public function birth_create() {
        $data['gender'] = Config::get('enums.gender');
        return view('admin.birth.create', $data);
    }

    public function birth_store(Request $req) {
        $req->validate([
            'nik' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'date_of_birth' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
        ]);

        try {
            //code...
            DB::table('birth')->insert([
                'nik' => $req->nik,
                'name' => $req->name,
                'gender' => $req->gender,
                'address' => $req->address,
                'date_of_birth' => $req->date_of_birth,
                'father_name' => $req->father_name,
                'mother_name' => $req->mother_name,
                'created_at' => Carbon::now()
            ]);

            Alert::success('Success');

            return redirect(route('birth.index'));
        } catch (\Exception $e) {
            //throw $th;
            Alert::error($e->getMessage());
            return back();
        }
    }

    public function birth_edit($id) {
        $data['birth'] = DB::table('birth')
                            ->where('id', $id)
                            ->first();
        $data['gender'] = Config::get('enums.gender');
        return view('admin.birth.edit', $data);
    }

    public function birth_update(Request $req, $id) {
        $req->validate([
            'nik' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'date_of_birth' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
        ]);

        try {
            //code...
            DB::table('birth')
            ->where('id', $id)
            ->update([
                'nik' => $req->nik,
                'name' => $req->name,
                'gender' => $req->gender,
                'address' => $req->address,
                'date_of_birth' => $req->date_of_birth,
                'father_name' => $req->father_name,
                'mother_name' => $req->mother_name,
                'updated_at' => Carbon::now()
            ]);

            Alert::success('Success');

            return redirect(route('birth.index'));
        } catch (\Exception $e) {
            //throw $th;
            Alert::error($e->getMessage());
            return back();
        }
    }

    public function birth_destroy($id) {
        try {   
            $check = DB::table('birth')
                        ->where('id', $id)
                        ->first();
            if(!$check) {
                Alert::error('Birth not found');
                return back();
            }

            DB::table('birth')
                        ->where('id', $id)
                        ->delete();

            Alert::success('Success');

            return redirect(route('birth.index'));
        } catch (\Exception $e) {         
            Alert::error($e->getMessage());
            return back();
        }
    }

    // Death
    public function death_index() {

    }

    public function death_create() {

    }

    public function death_store(Request $req) {

    }

    public function death_edit($id) {

    }

    public function death_update(Request $req) {

    }

    public function death_destroy($id) {
        
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
