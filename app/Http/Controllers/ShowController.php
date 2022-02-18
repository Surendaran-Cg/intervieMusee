<?php

namespace App\Http\Controllers;

use App\Models\EducationDetails;
use App\Models\JobDetails;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show ()
    {

        $data = User::with('job_details')->with('education_details')->get();

        return view('detail', compact('data'));

    }

    public function storedetails(Request $request) {


        if (Auth::user()->user_type == 'Fresher') {

            $validated = $request->validate([
                'mobile_number' => 'required|unique:users',
                'pass_out' => 'required',
                'branch' => 'required',
                'collage' => 'required',
            ]);

        } else {

            $validated = $request->validate([
                'mobile_number' => 'required',
                'pass_out' => 'required',
                'branch' => 'required',
                'college' => 'required',
                'current_company' => 'required',
                'designation' => 'required',
                'location' => 'required',
            ]);
                
            $education = EducationDetails::updateOrCreate(
                ['user_id' => Auth::user()->id],
                ['pass_out' => $request->pass_out, 'branch' => $request->branch, 'college' => $request->college]
            );

            $job = JobDetails::updateOrCreate(
                ['user_id' => Auth::user()->id],
                ['current_company' => $request->current_company, 'designation' => $request->designation, 'location' => $request->location]
            );

        }

        $user = User::where('id',Auth::user()->id)->first();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile_number = $request->mobile_number;

        $user->save();

    }


}
