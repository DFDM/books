<?php

namespace App\Services\Sales;

use App\Models\Book;
use App\Models\Buyer;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;



class Service
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            $buyer_id = !isset($data['buyers_id']) ? $this->getBuyer($data['buyer']) : $data['buyers_id'];
            $books = $data['book_id'];
            $this->changeQuantity($books);

            unset($data['book_id'], $data['buyer']);

            $data['buyers_id'] = $buyer_id;
            $data['price'] = $this->cost($books);

            $sale = Sale::create($data);
            $sale->books()->attach($books);

            DB::commit();
        } catch (\Throwable $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }


        return $sale;
    }

    public static function cost($books)
    {
        $cost = 0;
        foreach ($books as $book) {
            $bookModel = Book::find($book);
            $cost += $bookModel->price;
        }

        return $cost;
    }

    public function update(Sale $sale, $data)
    {
        $books = $data['book_id'];
        unset($data['book_id']);
        $sale->update($data);
        $sale->books()->sync($books);
    }

    private function getBuyer($buyer)
    {
        $buyer = !isset($buyer['id']) ?
            Buyer::firstOrCreate(['email' => $buyer['email']], ['name' => $buyer['name'], 'email' => $buyer['email']])
            : Buyer::find($buyer['id']);
        return $buyer->id;
    }

    private function changeQuantity($books) {
        foreach($books as $bookId){
            $book = Book::find($bookId);
            if($book && $book->quantity>=1){
                $book->quantity -= 1;
                $book->save();
            } else {
                throw new \Exception("Книга не найдена или количество недостаточно.");
            }
        }
    }
}
