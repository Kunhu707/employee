<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Designations;
use App\Employee;
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class EmployerController extends Controller
{
    
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function employees() {
        $employees = Employee::with('designation')->orderBy('created_at', 'desc')->get();

        return view('employees.index', compact('employees'));
    }

    public function add() {
        $designations = Designations::all();

        return view('employees.add', compact('designations'));
    }

    public function create(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:employee,email,'.$request['id'],
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'designation_id' => 'required|not_in:0'
        ]);

        $file = $request->file('file');
        if ($image = $request->file('file')) {
            $image_name = 'employee_' . time() . '.' . $request->file->extension();
            $store_original = $request->file->storeAs('/public/images/photo/', $image_name);
        }

        if($request['id']) {
            $id = $request['id'];
            $employer = Employee::find($id);
            $update_data = [
                'name' => $request['name'],
                'email' => $request['email'],
                'photo' => isset($image_name) ? $image_name : $employer->photo,
                'designation_id' => $request['designation_id']
            ];
            Employee::where('id', $id)
            ->update($update_data);
        }else{
            $employee = new Employee([
                'name' => $request['name'],
                'email' => $request['email'],
                'photo' => isset($image_name) ? $image_name : null,
                'designation_id' => $request['designation_id']
             ]);
             $save = $employee->save();
            if($save){
                $random_pass = Str::random(8);
                $details = [
                   'title' => 'Mail from Employee Firm',
                   'body' => 'Your account has
                   been created',
                   'password' => $random_pass
               ];
            }
            
            \Mail::to($request['email'])->send(new \App\Mail\Employee($details));
        }
        
        return redirect('/employees');
    }
    
    public function edit(Request $request, $id) {
        $employer = Employee::find($id);
        $designations = Designations::all();

        return view('employees.edit', compact('designations', 'employer'));
    }
    
    public function delete(Request $request, $id) {
        $employer = Employee::find($id);
        if($employer){
            $employer->delete();
            Storage::delete('/public/images/photo/'.$employer->photo);
        }

        return redirect('/employees');
    }

}
