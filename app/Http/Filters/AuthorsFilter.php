<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class AuthorsFilter extends AbstractFilter
{
    public const FIRST_NAME = 'first_name';
    public const LAST_NAME = 'last_name';


    protected function getCallbacks(): array
    {
        return [
            self::FIRST_NAME => [$this, 'first_name'],
            self::LAST_NAME => [$this, 'last_name'],
        ];
    }

    public function first_name(Builder $builder, $value)
    {
        $builder->where('first_name', 'like', "%{$value}%");
    }

    public function last_name(Builder $builder, $value)
    {
        $builder->where('last_name', 'like', "%{$value}%");
    }


}
