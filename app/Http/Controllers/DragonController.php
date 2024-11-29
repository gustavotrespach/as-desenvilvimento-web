<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dragon;
use App\Models\Trainer;
    
class DragonController extends Controller
{
    public function index()
{
    $dragon = Dragon::all();
    return view('dragons.index', compact('dragon'));
}

public function create()
{   
    $trainer = Trainer::all();
    return view('dragons.create', compact('trainer'));
 
}

public function store(Request $request)
{
    $dragon = new Dragon();
    
    $request->validate([
        'name' => 'required',
        'age' => 'required',
        'element' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    ]);

    if(!is_null($request->image)) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $dragon->image = 'images/'.$imageName;
    }

    $dragon->name = $request->name;
    $dragon->age = $request->age;
    $dragon->element = $request->element;
    $dragon->trainer_id = $request->trainer_id;
    $dragon->save();

    return redirect('dragons')->with('success', 'Dragon created successfully.');
}

public function edit($id)
{
    $dragon = Dragon::findOrFail($id);
    $trainer = Trainer::all();
    return view('dragons.edit', compact(['dragon', 'trainer']));
}

public function update(Request $request, $id)
{

    $dragon = Dragon::findOrFail($id);
    
    if(!is_null($request->image)) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $dragon->image = 'images/'.$imageName;
    }

    $dragon->name = $request->name;
    $dragon->age = $request->age;
    $dragon->element = $request->element;
    $dragon->trainer_id = $request->trainer_id;
    $dragon->save();

    return redirect('dragons')->with('success', 'Dragon updated successfully.');
}

public function destroy($id)
{
    $dragon = Dragon::findOrFail($id);
    $dragon->delete();
    return redirect('dragons')->with('success', 'Dragon deleted successfully.');
}
}
