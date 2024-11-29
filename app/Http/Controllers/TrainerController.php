<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function index()
    {
        $trainer = Trainer::all();
        return view('trainers.index', compact('trainer'));
    }

    public function create()
    {
        return view('trainers.create');
    }

    public function store(Request $request)
    {
        $trainer = new Trainer();

        $request->validate([
            'name' => 'required',
            'rank' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
        ]);
        
        if(!is_null($request->image)) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $trainer->image = 'images/'.$imageName;
        }

        
        
        $trainer->name = $request->name;
        $trainer->rank = $request->rank;
        $trainer->save();

        return redirect(
            'trainers')->with('success', 'Trainer created successfully.');
    }

    public function edit($id)
    {
        $trainer = Trainer::findOrFail($id);
        return view('trainers.edit', compact('trainer'));
    }

    public function update(Request $request, $id) 
    {
        $trainer = Trainer::findOrFail($id);
        
        if(!is_null($request->image)) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $trainer->image = 'images/'.$imageName;
        }

        $trainer->name = $request->name;
        $trainer->rank = $request->rank;
        $trainer->save();

        return redirect('trainers')->with('success', 'Trainer updated successfully.');
    }

    public function destroy($id)
    {
        $trainer = Trainer::findOrFail($id);
        $trainer->delete();
        return redirect('trainers')->with('success', 'Trainer deleted successfully.');
    }
}

