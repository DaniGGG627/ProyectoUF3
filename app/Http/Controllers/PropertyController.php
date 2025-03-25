<?php
namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    // Mostrar todas las propiedades
    public function index()
    {
        $properties = Property::all();
        return view('properties.index', compact('properties'));
    }

    // Mostrar la propiedad específica
    public function show($id)
    {
        // Cargar las valoraciones junto con los usuarios (Eager Loading)
        $property = Property::with('ratings.user')->findOrFail($id);

        return view('properties.show', compact('property'));
    }

    // Función para crear propiedad (Admin)
    public function create()
    {
        return view('properties.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'type' => 'required|in:sale,rent',
            'location' => 'required',
        ]);

        Property::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'type' => $request->type,
            'location' => $request->location,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('properties.index');
    }

    // Función para editar propiedad (Admin)
    public function edit($id)
    {
        $property = Property::findOrFail($id);
        return view('properties.edit', compact('property'));
    }

    public function update(Request $request, $id)
    {
        $property = Property::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'type' => 'required|in:sale,rent',
            'location' => 'required',
        ]);

        $property->update($request->all());

        return redirect()->route('properties.index');
    }

    // Función para eliminar propiedad (Admin)
    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        $property->delete();
        return redirect()->route('properties.index');
    }
}
