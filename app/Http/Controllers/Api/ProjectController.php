<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('type', 'technologies')->get();
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }

    public function show(string $slug)
    {

        try {
            $projects = Project::where('slug', $slug)->with('type', 'technologies', 'messages')->first();

            if ($projects) {
                return response()->json([
                    'success' => true,
                    'results' => $projects
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'results' => null
                ], 404);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'results' => null
            ], 500);
        }
    }
}
