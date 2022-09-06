<?php

namespace App\Http\Controllers;

use App\Mail\CreateGig;
use App\Mail\DeleteGig;
use App\Models\Country;
use App\Models\Gigs;
use App\Models\State;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class GigController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function Home_Gigs()
    {
        $status_1 = 'generated';
        $status_2 = 'confirmed';
        $status_3 = 'rejected';
        $gigs_1 = Gigs::where('status', $status_1)->orderBy('id', 'DESC')->get();
        $gigs_count1 = Gigs::where('status', $status_1)->count();
        $gigs_count2 = Gigs::where('status', $status_2)->count();
        $gigs_count3 = Gigs::where('status', $status_3)->count();
        $gigs_2 = Gigs::where('status', $status_2)->orderBy('id', 'DESC')->get();
        $gigs_3 = Gigs::where('status', $status_3)->orderBy('id', 'DESC')->get();
        return view('site.pages.gigs.index', compact('gigs_1', 'gigs_2', 'gigs_3', 'gigs_count1', 'gigs_count2', 'gigs_count3'));
    }

    public function add_Gigs()
    {
        $state = State::orderBy('name', 'ASC')->get();
        $country = Country::orderBy('name', 'ASC')->get();
        return view('site.pages.gigs.add', compact('state', 'country'));
    }

    public function Get_State($country_id)
    {
        $get_state = State::where('country_id', $country_id)->orderBy('name', 'ASC')->get();

        return json_encode($get_state);
    }

    public function save_Gigs(Request $request)
    {
        $validated = $request->validate(
            [
                'role' => 'required',
                'company' => 'required',
                'country_id' => 'required',
                'state_id' => 'required',
                'address' => 'required',
                'tags' => 'required',
                'min_salary' => 'required',
                'max_salary' => 'required',
            ],
        );

        Gigs::insert([
            'role' => $request->role,
            'company' => $request->company,
            'state_id' => $request->state_id,
            'country_id' => $request->country_id,
            'address' => $request->address,
            'tags' => $request->tags,
            'min_salary' => $request->min_salary,
            'max_salary' => $request->max_salary,
            'created_at' => Carbon::now()
        ]);

        Mail::to('kebidegozi@meme.com')->send(new CreateGig());

        return redirect()->route('home.gigs')->with('success', 'Gig Created Successfully');
    }

    public function edit_Gigs($id)
    {
        $country = Country::orderBy('name', 'ASC')->get();
        $state = State::orderBy('name', 'ASC')->get();
        $edit_gigs = Gigs::findOrFail($id);
        return view(('site.pages.gigs.edit'), compact('edit_gigs', 'country', 'state'));
    }

    public function update_Gigs(Request $request)
    {
        $gigs = $request->id;

        $validated = $request->validate(
            [
                'role' => 'required',
                'company' => 'required',
                'country_id' => 'required',
                'state_id' => 'required',
                'address' => 'required',
                'tags' => 'required',
                'min_salary' => 'required',
                'max_salary' => 'required',
            ],
        );

        Gigs::findOrFail($gigs)->update([
            'role' => $request->role,
            'company' => $request->company,
            'state_id' => $request->state_id,
            'country_id' => $request->country_id,
            'address' => $request->address,
            'tags' => $request->tags,
            'min_salary' => $request->min_salary,
            'max_salary' => $request->max_salary,
            'updated_at' => Carbon::now()
        ]);


        return redirect()->route('home.state')->with('success', 'State Updated Successfully');

    }

    public function delete_Gigs($id)
    {

         Gigs::findOrFail($id)->delete();

         Mail::to('metoyou@meme.com')->send(new DeleteGig());

        return Redirect()->back()->with('success', 'Gig Deleted Successfully');
    }

    public function edit_Status($id)
    {
        $edit_status = Gigs::findOrFail($id);
        return view(('site.pages.gigs.status'), compact('edit_status'));
    }

    public function update_Status(Request $request)
    {
        $gigs = $request->id;

        Gigs::findOrFail($gigs)->update([
            'status' => $request->status,
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('home.gigs')->with('success', 'Status Updated');

    }

    public function show_Gigs($id)
    {
        $country = Country::orderBy('name', 'ASC')->get();
        $state = State::orderBy('name', 'ASC')->get();
        $show_gig = Gigs::findOrFail($id);
        return view(('site.pages.gigs.show'), compact('show_gig', 'country', 'state'));
    }
}
