<?php

namespace App\Http\Controllers;

use App\Http\Requests\Buyers\StoreRequest;
use App\Http\Requests\Buyers\UpdateRequest;

use App\Models\Buyer;

class Buyers extends Controller
{
    public function index()
    {
        return view('admin.buyers.index', ['buyers' => Buyer::paginate(10)]);
    }

    public function create()
    {
        return view('admin.buyers.create');
    }

    public function store(StoreRequest $request)
    {
        $buyer = $request->validated();
        Buyer::create($buyer);

        return redirect()->route('buyers.index');
    }

    public function show(Buyer $buyer)
    {
        return view('admin.buyers.show', compact('buyer'));
    }

    public function edit(Buyer $buyer)
    {
        return view('admin.buyers.edit', compact('buyer'));
    }

    public function update(UpdateRequest $request, Buyer $buyer)
    {
        $data = $request->validated();
        $buyer->update($data);

        return redirect()->route('buyers.show', $buyer);
    }

    public function destroy(Buyer $buyer)
    {
        $buyer->delete();

        return redirect()->route('buyers.index');
    }
}
