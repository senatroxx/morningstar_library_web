<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Publisher\PublisherRequest;
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

        if ($request->wantsJson()) {
            return response()->json($publishers->paginate(10, ['*'], 'page', $request->get('page', 1)));
        } else {
            return view('admin.publisher.index', [
                'publishers' => $publishers->paginate(10, ['*'], 'page', $request->get('page', 1)),
            ]);
        }
    }

    public function create()
    {
        return view('admin.publisher.create');
    }

    public function store(PublisherRequest $request)
    {
        Publisher::create($request->validated());

        return redirect()->route('admin.publishers.index')->with('success', 'Publisher created successfully');
    }

    public function edit(Publisher $publisher)
    {
        return view('admin.publisher.edit', [
            'publisher' => $publisher,
        ]);
    }

    public function update(PublisherRequest $request, Publisher $publisher)
    {
        $publisher->update($request->validated());

        return redirect()->route('admin.publishers.index')->with('success', 'Publisher updated successfully');
    }

    public function destroy(Publisher $publisher)
    {
        $publisher->delete();

        return redirect()->route('admin.publishers.index')->with('success', 'Publisher deleted successfully');
    }
}
