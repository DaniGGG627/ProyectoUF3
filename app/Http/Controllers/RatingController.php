<?php
namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function store(Request $request, $property_id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $property = Property::findOrFail($property_id);

        Rating::create([
            'user_id' => Auth::id(),
            'property_id' => $property->id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->route('properties.show', $property->id);
    }
}

