<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index(Request $request)
    {
        $publishers = Publisher::query();

        if ($request->has('q')) {
            $publishers->where('name', 'LIKE', '%' . $request->get('q') . '%');
        }

        if ($request->json()) {
            return response()->json($publishers->paginate(10, ['*'], 'page', $request->get('page', 1)));
        } else {
            return view('admin.publisher.index');
        }
    }
}
