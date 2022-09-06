<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function Home_Country()
    {
        $country = Country::latest()->get();
        return view('site.pages.country.index', compact('country'));
    }

    public function add_Country()
    {
        return view(('site.pages.country.add'));
    }

    public function save_Country(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required',
            ],
        );

        Country::insert([
            'name' => $request->name,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('home.country')->with('success', 'Country Inserted Successfully');
    }

    public function edit_Country($id)
    {
        $edit_country = Country::findOrFail($id);
        return view(('site.pages.country.edit'), compact('edit_country'));
    }

    public function update_Country(Request $request)
    {
        $country = $request->id;

        $validated = $request->validate(
            [
                'name' => 'required',
            ],
        );

        Country::findOrFail($country)->update([
            'name' => $request->name,
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('home.country')->with('success', 'Country Updated Successfully');

    }

    public function delete_Country($id)
    {

         Country::findOrFail($id)->delete();

        return Redirect()->back()->with('success', 'Country Deleted Successfully');
    }
}
