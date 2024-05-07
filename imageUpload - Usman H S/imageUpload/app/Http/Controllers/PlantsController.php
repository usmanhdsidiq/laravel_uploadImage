<?php

namespace App\Http\Controllers;

use App\Models\Plants;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PlantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $plants = Plants::latest()->paginate(10);

        return view('index', compact('plants'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'kingdom' => 'required',
            'family' => 'required',
            'subfamily' => 'required',
            'image' => 'required|image|mimes:jpeg, jpg, png, gif, svg|max:1024',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')){
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Plants::create($input);

        return redirect()->route('plants.index')->with('success', 'Data was successfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Plants $plants)
    {
        return view('show', compact('plants'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $plants = plants::find($id);
        // $plants = $plant;
        return view('edit', compact('plants'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plants $plants, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'kingdom' => 'required',
            'family' => 'required',
            'subfamily' => 'required'
        ]);

        $input = $request->all();

        if($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }

        //dd($input);
        
        $plants = PLants::find($id);
        $plants->update($input);
        // $plants->fill($input)->save();
        // $plants->update($request->except(['_token', 'submit']));

        return redirect()->route('plants.index')->with('success', 'Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plants $plants, $id): RedirectResponse
    {
        $plants = Plants::find($id);
        $plants->delete();

        return redirect()->route('plants.index')->with('success', 'Data has been deleted');
    }
}
