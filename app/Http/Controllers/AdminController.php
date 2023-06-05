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
        $data['death'] = DB::table('death')->get();
        return view('admin.death.index', $data);
    }

    public function death_create() {
        return view('admin.death.create');
    }

    public function death_store(Request $req) {
        $req->validate([
            'nik' => 'required',
            'family_card' => 'required',
            'name' => 'required',
            'address' => 'required',
            'date_of_death' => 'required',
            'informer' => 'required',
            'informer_status' => 'required',
        ]);

        try {
            //code...
            DB::table('death')->insert([
                'nik' => $req->nik,
                'family_card' => $req->family_card,
                'name' => $req->name,
                'address' => $req->address,
                'date_of_death' => $req->date_of_death,
                'informer' => $req->informer,
                'informer_status' => $req->informer_status,
                'created_at' => Carbon::now()
            ]);

            Alert::success('Success');

            return redirect(route('death.index'));
        } catch (\Exception $e) {
            //throw $th;
            Alert::error($e->getMessage());
            return back();
        }
    }

    public function death_edit($id) {
        $data['death'] = DB::table('death')
                        ->where('id', $id)
                        ->first();
        return view('admin.death.edit', $data);
    }

    public function death_update(Request $req, $id) {
        $req->validate([
            'nik' => 'required',
            'family_card' => 'required',
            'name' => 'required',
            'address' => 'required',
            'date_of_death' => 'required',
            'informer' => 'required',
            'informer_status' => 'required',
        ]);

        try {
            //code...
            DB::table('death')
                ->where('id', $id)
                ->update([
                'nik' => $req->nik,
                'family_card' => $req->family_card,
                'name' => $req->name,
                'address' => $req->address,
                'date_of_death' => $req->date_of_death,
                'informer' => $req->informer,
                'informer_status' => $req->informer_status,
                'updated_at' => Carbon::now()
            ]);

            Alert::success('Success');

            return redirect(route('death.index'));
        } catch (\Exception $e) {
            //throw $th;
            Alert::error($e->getMessage());
            return back();
        }
    }

    public function death_destroy($id) {
        try {   
            $check = DB::table('death')
                        ->where('id', $id)
                        ->first();
            if(!$check) {
                Alert::error('Death not found');
                return back();
            }

            DB::table('death')
                        ->where('id', $id)
                        ->delete();

            Alert::success('Success');

            return redirect(route('death.index'));
        } catch (\Exception $e) {         
            Alert::error($e->getMessage());
            return back();
        }
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

    // Decision
    public function decision_index() {
        $data['decision'] = DB::table('decision')->get();
        
        return view('admin.decision.index', $data);
    }

    public function decision_create() {
        return view('admin.decision.create');
    }

    public function decision_store(Request $req) {
        $req->validate([
            'decision' => 'required',
            'type_of_decision' => 'required',
            'decision_date' => 'required',
            'problem' => 'required',
            'documentasion' => 'max:1000|file|image',
            'realization_date' => 'required',
        ]);
        try {
            if($req->hasFile('documentasion')) {
                $extFile = $req->documentasion->getClientOriginalExtension();
                $namaFile = 'decision-'.time().".".$extFile;
                $path = $req->documentasion->move('img/decision', $namaFile);
                
                DB::table('decision')->insert([
                    'decision' => $req->decision,
                    'type_of_decision' => $req->type_of_decision,
                    'decision_date' => $req->decision_date,
                    'problem' => $req->problem,
                    'documentasion' => $path,
                    'realization_date' => $req->realization_date,
                    'created_at' => Carbon::now()
                ]);
            } else {
                DB::table('decision')->insert([
                    'decision' => $req->decision,
                    'type_of_decision' => $req->type_of_decision,
                    'decision_date' => $req->decision_date,
                    'problem' => $req->problem,
                    'documentasion' => null,
                    'realization_date' => $req->realization_date,
                    'created_at' => Carbon::now()
                ]);
            }
            

            Alert::success('Success');

            return redirect(route('decision.index'));
        } catch (\Exception $e) {         
            Alert::error($e->getMessage());
            return back();
        }
    }

    public function decision_edit($id) {
        $data['decision'] = DB::table('decision')
                            ->where('id', $id)
                            ->first();
        return view('admin.decision.edit', $data);
    }

    public function decision_update(Request $req, $id) {
        $req->validate([
            'decision' => 'required',
            'type_of_decision' => 'required',
            'decision_date' => 'required',
            'problem' => 'required',
            'documentasion' => 'max:1000|file|image',
            'realization_date' => 'required',
        ]);
        try {
    
            if($req->hasFile('documentasion')) {
                $extFile = $req->documentasion->getClientOriginalExtension();
                $namaFile = 'decision-'.time().".".$extFile;
                $path = $req->documentasion->move('img/decision', $namaFile);
                
                DB::table('decision')
                ->where('id', $id)
                ->update([
                    'decision' => $req->decision,
                    'type_of_decision' => $req->type_of_decision,
                    'decision_date' => $req->decision_date,
                    'problem' => $req->problem,
                    'documentasion' => $path,
                    'realization_date' => $req->realization_date,
                    'updated_at' => Carbon::now()
                ]);
            } else {
                DB::table('decision')
                ->where('id', $id)
                ->update([
                    'decision' => $req->decision,
                    'type_of_decision' => $req->type_of_decision,
                    'decision_date' => $req->decision_date,
                    'problem' => $req->problem,
                    'realization_date' => $req->realization_date,
                    'updated_at' => Carbon::now()
                ]);
            }

            Alert::success('Success');

            return redirect(route('decision.index'));
        } catch (\Exception $e) {         
            Alert::error($e->getMessage());
            return back();
        }
    }

    public function decision_destroy($id) {
        try {   
            $check = DB::table('decision')
                        ->where('id', $id)
                        ->first();
            if(!$check) {
                Alert::error('decision not found');
                return back();
            }

            DB::table('decision')
                        ->where('id', $id)
                        ->delete();

            Alert::success('Success');

            return redirect(route('decision.index'));
        } catch (\Exception $e) {         
            Alert::error($e->getMessage());
            return back();
        }
    }
    // Service
    public function service_index() {
        $data['service'] = DB::table('service')->get();
        
        return view('admin.service.index', $data);
    }

    public function service_create() {
        $data['service_type'] =  Config::get('enums.service_type');
        return view('admin.service.create', $data);
    }

    public function service_store(Request $req) {
        $req->validate([
            'nik' => 'required',
            'name' => 'required',
            'date_of_service' => 'required',
            'information' => 'required',
            'service_type' => 'required',
        ]);
        try {
    
            DB::table('service')->insert([
                'nik' => $req->nik,
                'name' => $req->name,
                'date_of_service' => $req->date_of_service,
                'information' => $req->information,
                'service_type' => $req->service_type,
                'created_at' => Carbon::now()
            ]);

            Alert::success('Success');

            return redirect(route('service.index'));
        } catch (\Exception $e) {         
            Alert::error($e->getMessage());
            return back();
        }
    }

    public function service_edit($id) {
        $data['service'] = DB::table('service')
                            ->where('id', $id)
                            ->first();
        $data['service_type'] =  Config::get('enums.service_type');
        return view('admin.service.edit', $data);
    }

    public function service_update(Request $req, $id) {
        $req->validate([
            'nik' => 'required',
            'name' => 'required',
            'date_of_service' => 'required',
            'information' => 'required',
            'service_type' => 'required',
        ]);
        try {
    
            DB::table('service')
            ->where('id', $id)    
            ->update([
                'nik' => $req->nik,
                'name' => $req->name,
                'date_of_service' => $req->date_of_service,
                'information' => $req->information,
                'service_type' => $req->service_type,
                'updated_at' => Carbon::now()
            ]);

            Alert::success('Success');

            return redirect(route('service.index'));
        } catch (\Exception $e) {         
            Alert::error($e->getMessage());
            return back();
        }
    }

    public function service_destroy($id) {
        try {   
            $check = DB::table('service')
                        ->where('id', $id)
                        ->first();
            if(!$check) {
                Alert::error('Service not found');
                return back();
            }

            DB::table('service')
                        ->where('id', $id)
                        ->delete();

            Alert::success('Success');

            return redirect(route('service.index'));
        } catch (\Exception $e) {         
            Alert::error($e->getMessage());
            return back();
        }
    }
    // Activity
    public function activity_index() {
        $data['activity'] = DB::table('activity')->get();
        return view('admin.activity.index', $data);
    }

    public function activity_create() {
        return view('admin.activity.create');
    }

    public function activity_store(Request $req) {
        $req->validate([
            'name' => 'required',
            'date_of_activity' => 'required',
            'address' => 'required',
            'information' => 'required',
        ]);
        try {
    
            DB::table('activity')->insert([
                'name' => $req->name,
                'date_of_activity' => $req->date_of_activity,
                'address' => $req->address,
                'information' => $req->information,
                'created_at' => Carbon::now()
            ]);

            Alert::success('Success');

            return redirect(route('activity.index'));
        } catch (\Exception $e) {         
            Alert::error($e->getMessage());
            return back();
        }
    }

    public function activity_edit($id) {
        $data['activity'] = DB::table('activity')
                            ->where('id', $id)
                            ->first();
        return view('admin.activity.edit', $data);
    }

    public function activity_update(Request $req, $id) {
        $req->validate([
            'name' => 'required',
            'date_of_activity' => 'required',
            'address' => 'required',
            'information' => 'required',
        ]);
        try {
    
            DB::table('activity')
            ->where('id', $id)    
            ->update([
                'name' => $req->name,
                'date_of_activity' => $req->date_of_activity,
                'address' => $req->address,
                'information' => $req->information,
                'updated_at' => Carbon::now()
            ]);

            Alert::success('Success');

            return redirect(route('activity.index'));
        } catch (\Exception $e) {         
            Alert::error($e->getMessage());
            return back();
        }
    }

    public function activity_destroy($id) {
        try {   
            $check = DB::table('activity')
                        ->where('id', $id)
                        ->first();
            if(!$check) {
                Alert::error('Activity not found');
                return back();
            }

            DB::table('activity')
                        ->where('id', $id)
                        ->delete();

            Alert::success('Success');

            return redirect(route('activity.index'));
        } catch (\Exception $e) {         
            Alert::error($e->getMessage());
            return back();
        }
    }
    // Funding Petition
    public function funding_petition_index() {
        $data['funding_petition'] = DB::table('funding_petition')->get();
        $data['funding_petition_status'] = Config::get('enums.funding_petition_status');
        return view('admin.funding_petition.index', $data);
    }

    public function funding_petition_create() {
        $data['funding_petition_status'] = Config::get('enums.funding_petition_status');
        return view('admin.funding_petition.create', $data);
    }

    public function funding_petition_store(Request $req) {
        $req->validate([
            'date_of_activity' => 'required',
            'organization_name' => 'required',
            'budget_amount' => 'required',
            'event_name' => 'required',
            'person_responsible' => 'required',
            'proposal' => 'required|max:1000|file|mimes:pdf|max:2048',
        ]);
        try {

            $extFile = $req->proposal->getClientOriginalExtension();
            $namaFile = 'proposal-'.time().".".$extFile;
            $path = $req->proposal->move('pdf/funding_petition', $namaFile);
    
            DB::table('proposal')->insert([
                'date_of_activity' => $req->date_of_activity,
                'organization_name' => $req->organization_name,
                'budget_amount' => $req->budget_amount,
                'event_name' => $req->event_name,
                'person_responsible' => $req->person_responsible,
                'proposal' => $path,
                'status' => 0,
                'created_at' => Carbon::now()
            ]);

            Alert::success('Success');

            return redirect(route('funding.petition.index'));
        } catch (\Exception $e) {         
            Alert::error($e->getMessage());
            return back();
        }
    }

    public function funding_petition_edit($id) {
        $data['funding_petition'] = DB::table('funding_petition')
                            ->where('id', $id)
                            ->first();
        $data['funding_petition_status'] = Config::get('enums.funding_petition_status');
        return view('admin.activity.edit', $data);
    }

    public function funding_petition_update(Request $req, $id) {
        $req->validate([
            'date_of_activity' => 'required',
            'organization_name' => 'required',
            'budget_amount' => 'required',
            'event_name' => 'required',
            'person_responsible' => 'required',
            'proposal' => 'max:1000|file|mimes:pdf|max:2048',
            'status' => 'required'
        ]);
        try {

            if($req->hasFile('proposal')) {
                $extFile = $req->proposal->getClientOriginalExtension();
                $namaFile = 'proposal-'.time().".".$extFile;
                $path = $req->proposal->move('pdf/funding_petition', $namaFile);

                DB::table('proposal')->insert([
                    'date_of_activity' => $req->date_of_activity,
                    'organization_name' => $req->organization_name,
                    'budget_amount' => $req->budget_amount,
                    'event_name' => $req->event_name,
                    'person_responsible' => $req->person_responsible,
                    'proposal' => $path,
                    'status' => $req->status,
                    'updated_at' => Carbon::now()
                ]);
            } else {

                DB::table('proposal')->insert([
                    'date_of_activity' => $req->date_of_activity,
                    'organization_name' => $req->organization_name,
                    'budget_amount' => $req->budget_amount,
                    'event_name' => $req->event_name,
                    'person_responsible' => $req->person_responsible,
                    'status' => $req->status,
                    'updated_at' => Carbon::now()
                ]);
            }
    
            Alert::success('Success');

            return redirect(route('funding.petition.index'));
        } catch (\Exception $e) {         
            Alert::error($e->getMessage());
            return back();
        }
    }

    public function funding_petition_destroy($id) {
        try {   
            $check = DB::table('funding petition')
                        ->where('id', $id)
                        ->first();
            if(!$check) {
                Alert::error('funding petition not found');
                return back();
            }

            DB::table('petition')
                        ->where('id', $id)
                        ->delete();

            Alert::success('Success');

            return redirect(route('funding.petition.index'));
        } catch (\Exception $e) {         
            Alert::error($e->getMessage());
            return back();
        }
    }
    // User Executive
    public function user_executive_index() {
        $data['executive'] = DB::table('executive')->get();
        return view('admin.user-executive.index', $data);
    }

    public function user_executive_create() {
        
        return view('admin.user-executive.create');
    }

    public function user_executive_store(Request $req) {
        $req->validate([
            'name' => 'required',
            'username' => 'required|unique:executive,username',
            'email' => 'required|email|unique:executive,email',
            'phone_number' => 'required',
            'picture' => 'max:1000|file|image',
            'password' => 'required|same:password_confirm',
            'password_confirm' => 'required|same:password',
            'address' => 'required',
        ]);
        try {
            if($req->hasFile('picture')) {
                $extFile = $req->picture->getClientOriginalExtension();
                $namaFile = 'executive-'.time().".".$extFile;
                $path = $req->picture->move('img/executive', $namaFile);
                $exe = [
                    'name' => $req->name,
                    'username' => $req->username,
                    'email' => $req->email,
                    'phone_number' => $req->phone_number,
                    'password' => Hash::make($req->password),
                    'address' => $req->address,
                    'picture' => $path,
                    'created_at' => Carbon::now()
                ];
            } else {
                $exe = [
                    'name' => $req->name,
                    'username' => $req->username,
                    'email' => $req->email,
                    'phone_number' => $req->phone_number,
                    'password' => Hash::make($req->password),
                    'address' => $req->address,
                    'created_at' => Carbon::now()
                ];
            } 
            DB::table('executive')->insert($exe);

            Alert::success('Success');

            return redirect(route('user.executive.index'));
        } catch (\Exception $e) {         
            Alert::error($e->getMessage());
            return back();
        }
    }

    public function user_executive_edit($id) {
        $data['executive'] = DB::table('executive')
                            ->where('id', $id)
                            ->first();
        return view('admin.user-executive.edit', $data);
    }

    public function user_executive_update(Request $req, $id) {
        $req->validate([
            'name' => 'required',
            'username' => 'required|unique:executive,username,'.$id.',id',
            'email' => 'required|email|unique:executive,email,'.$id.',id',
            'phone_number' => 'required',
            'address' => 'required',
            'picture' => 'max:1000|file|image',
        ]);
        try {

            if($req->hasFile('picture')) {

                

                $extFile = $req->picture->getClientOriginalExtension();
                $namaFile = 'executive-'.time().".".$extFile;
                $path = $req->picture->move('img/executive', $namaFile);
                $exe = [
                    'name' => $req->name,
                    'username' => $req->username,
                    'email' => $req->email,
                    'phone_number' => $req->phone_number,
                    'address' => $req->address,
                    'picture' => $path,
                    'created_at' => Carbon::now()
                ];
            } else {
                $exe = [
                    'name' => $req->name,
                    'username' => $req->username,
                    'email' => $req->email,
                    'phone_number' => $req->phone_number,
                    'address' => $req->address,
                    'updated_at' => Carbon::now()
                ];
            }
    
            DB::table('executive')
            ->where('id', $id)
            ->update($exe);

            Alert::success('Success');

            return redirect(route('user.executive.index'));
        } catch (\Exception $e) {         
            Alert::error($e->getMessage());
            return back();
        }
    }

    public function user_executive_pass($id) {
        $data['executive'] = DB::table('executive')
                            ->where('id', $id)
                            ->first();
        return view('admin.user-executive.pass', $data);
    }

    public function user_executive_pass_act(Request $req, $id) {
        $req->validate([
            'password' => 'required|same:password_confirm',
            'password_confirm' => 'required|same:password',
        ]);
        try {
    
            DB::table('executive')
            ->where('id', $id)
            ->update([
               
                'password' => Hash::make($req->password),
                'updated_at' => Carbon::now()
            ]);

            Alert::success('Success');

            return redirect(route('user.executive.index'));
        } catch (\Exception $e) {         
            Alert::error($e->getMessage());
            return back();
        }
    }

    public function user_executive_destroy($id) {
        try {
    
            $check = DB::table('executive')
                        ->where('id', $id)
                        ->first();
            if(!$check) {
                Alert::error('User executive not found');
                return back();
            }

            DB::table('executive')
                        ->where('id', $id)
                        ->delete();

            Alert::success('Success');

            return redirect(route('user.executive.index'));
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

    public function user_admin_profile() {
        $id = session('admin_id');
        $data['profile'] = DB::table('admin')
                        ->where('id', $id)
                        ->first();
        return view('admin.user-admin.profile', $data);
    }
}
