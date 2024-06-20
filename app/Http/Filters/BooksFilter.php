<?php


namespace App\Http\Filters;


use App\Http\Filters\AbstractFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class BooksFilter extends AbstractFilter
{
    public const TITLE = 'title';
    public const DESCRIPTION = 'description';
    public const CAN_ORDER = 'instock';
    public const PRICE = 'price';
    public const QUANTITY = 'quantity';
    public const AVATARS = 'avatars';
    public const ORDERS = 'orders';
    public const RANK_OR_SALES = 'rankOrSalesAbove';


    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::DESCRIPTION => [$this, 'description'],
            self::CAN_ORDER => [$this, 'instock'],
            self::PRICE => [$this, 'price'],
            self::QUANTITY => [$this, 'quantity'],
            self::AVATARS => [$this, 'avatars'],
            self::ORDERS => [$this, 'orders'],
            self::RANK_OR_SALES => [$this, 'rankOrSalesAbove'],
        ];
    }

    public function title(Builder $builder, $value)
    {
        $builder->where('title', 'ilike', "%{$value}%");
    }

    public function description(Builder $builder, $value)
    {
        $builder->where('description', 'ilike', "%{$value}%");
    }

    public function price(Builder $builder, $value)
    {
        $builder->orderBy('price', $value);
    }

    public function quantity(Builder $builder, $value)
    {
        $builder->orderBy('quantity', $value);
    }

    public function orders(Builder $builder, $value)
    {
        $builder->select('books.*', DB::raw('(SELECT COUNT(DISTINCT sales_id) FROM books_sales WHERE books_id = books.id) as sales_count'))
            ->orderBy('sales_count', $value)
            ->get();
    }

    public function instock(Builder $builder, $value)
    {
        if ($value == "true") {
            $builder->where('quantity', '>', 0);
        }
    }

    public function avatars(Builder $builder, $value)
    {
        if ($value == "true") {
            $builder->whereHas(
                'authors',
                function ($query) {
                    $query->where('avatar_url', '!=', '');
                }
            )->get();
        }
    }

    public function rankOrSalesAbove(Builder $builder, $value)
    {
        if ($value == "true") {
            $builder->whereHas('authors', function ($query) {
                $query->where('rank', '>', 95);
            })->orWhereHas('sales', function ($query) {
                $query->whereDate('sales.created_at', now()->format('Y-m-d'))
                    ->select('books_sales.books_id') // Выбираем только нужное поле
                    ->groupBy('books_sales.books_id')
                    ->havingRaw('COUNT(*) >= 3');
            })->get();
        }
    }
}
