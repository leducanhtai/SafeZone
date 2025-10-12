<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alert;
use App\Http\Resources\AlertResource;


class AlertController extends Controller
{
    public function index()
    {
        $alerts = AlertResource::collection(Alert::all());
        return view('admin.alerts.index', ['alerts' => $alerts]);
    }

    public function create()
    {
        return view('admin.alerts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ], [
            'title.string' => 'The title must be a string.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'description.string' => 'The description must be a string.',
        ]);

        $alert = new Alert();
        $alert->title = $request->input('title');
        $alert->description = $request->input('description');
        $alert->type = $request->input('type');
        $alert->severity = $request->input('severity');
        $alert->created_by = Auth()->user()->id;
        $alert->save();

        return redirect()->route('admin.alerts.index')->with('success', 'Alert created successfully.');
    }

}
