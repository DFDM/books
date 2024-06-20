<?php

namespace App\Services\Books;

use App\Models\Book;


class Service
{
    public static function store($data)
    {
        $authors = $data['authors'];
        unset($data['authors']);

        if (isset($data['cover_url'])) {
            $data['cover_url'] = self::genCoverUrl($data['cover_url']);
        }


        $book = Book::create($data);
        $book->authors()->attach($authors);
    }

    public static function update($data, $book)
    {
        $authors = $data['authors'];
        unset($data['authors']);

        if (isset($data['cover_url'])) {
            $data['cover_url'] = self::genCoverUrl($data['cover_url']);
        } else {
            $data['cover_url'] = '';
        }

        $book->update($data);
        $book->authors()->sync($authors);
    }

    public static function getBookAuthors($book)
    {
        return array_map(function ($author) {
            return $author['id'];
        }, $book->authors->toArray());
    }


    public static function getDirectionFilter($data, $key)
    {
        return isset($data[$key]) && $data[$key] == 'asc' ? 'desc' : 'asc';
    }

    private static function genCoverUrl($url = null)
    {
        if (isset($url)) {
            $cover_url_path = $url->store('uploads', 'public');
            $url =  asset('/storage/' . $cover_url_path);
        }
        return $url;
    }
}
