<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class StateController extends Controller
{
    public function Home_State()
    {
        $state = State::latest()->get();
        return view('site.pages.state.index', compact('state'));
    }

    public function add_State()
    {
        $country = Country::orderBy('name', 'ASC')->get();
        return view(('site.pages.state.add'), compact('country'));
    }

    public function save_State(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required',
                'country_id' => 'required'
            ],
        );

        State::insert([
            'name' => $request->name,
            'country_id' => $request->country_id,
            'created_at' => Carbon::now()
        ]);


        return redirect()->route('home.state')->with('success', 'State Created Successfully');
    }

    public function edit_State($id)
    {
        $country = Country::orderBy('name', 'ASC')->get();
        $edit_state = State::findOrFail($id);
        return view(('site.pages.state.edit'), compact('edit_state', 'country'));
    }

    public function update_State(Request $request)
    {
        $state = $request->id;

        $validated = $request->validate(
            [
                'name' => 'required',
                'country_id' => 'required'
            ],
        );

        State::findOrFail($state)->update([
            'country_id' => $request->country_id,
            'name' => $request->name,
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('home.state')->with('success', 'State Updated Successfully');

    }

    public function delete_State($id)
    {

         State::findOrFail($id)->delete();

        return Redirect()->back()->with('success', 'State Deleted Successfully');
    }
}
