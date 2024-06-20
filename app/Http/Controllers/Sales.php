<?php

namespace App\Http\Controllers;

use App\Http\Requests\Sales\UpdateRequest;

use App\Http\Requests\Sales\WebStoreRequest;
use App\Models\Book;
use App\Models\Buyer;
use App\Models\Sale;
use App\Services\Sales\Service;

class Sales extends Controller
{
    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return view('admin.sales.index', ['sales' => Sale::paginate(10)]);
    }

    public function create()
    {
        $books = Book::where('quantity', '>', 1)->get();
        $buyers = Buyer::all();

        return view('admin.sales.create', compact('books', 'buyers'));
    }

    public function store(WebStoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);

        return redirect()->route('sales.index');
    }

    public function show(Sale $sale)
    {
        return view('admin.sales.show', compact('sale'));
    }

    public function edit(Sale $sale)
    {
        return view('admin.sales.edit', compact('sale'));
    }

    public function update(UpdateRequest $request, Sale $sale)
    {
        $data = $request->validated();
        $this->service->update($sale, $data);

        return redirect()->route('sales.show', $sale);
    }

    public function destroy(Sale $sale)
    {
        $sale->delete();
        return redirect()->route('sales.index');
    }
}
