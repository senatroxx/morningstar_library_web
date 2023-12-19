<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Lend\LendRequest;
use App\Http\Services\LendService;
use App\Models\Book;
use App\Models\Lend;
use Illuminate\Support\Facades\Auth;

class LendController extends Controller
{
    protected $user;
    protected $service;

    public function __construct(LendService $service)
    {
        $this->middleware(function ($request, $next) {
            $this->user = auth()->user();

            return $next($request);
        });
        $this->service = $service;
    }

    public function index()
    {
        $lends = $this->service->getLend($this->user->id);

        return view('user.lends.index', compact('lends'));
    }

    public function store(Book $book, LendRequest $request)
    {
        $attributes = $request->validated();

        $this->service->createLend([
            ...$attributes,
            'book_slug' => $book->slug,
            'user_id' => $this->user->id,
        ]);

        return redirect()->back()->with('success', 'Book borrowed successfully');
    }
}
