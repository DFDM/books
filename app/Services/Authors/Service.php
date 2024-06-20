<?php

namespace App\Services\Authors;

use App\Models\Author;

class Service
{
    public static function store($data)
    {
        if (isset($data['avatar_url'])) {
            $data['avatar_url'] = self::genCoverUrl($data['avatar_url']);
        }
        $author = Author::create($data);
        return $author;
    }

    public static function update($data, $author)
    {
        if (isset($data['avatar_url'])) {
            $data['avatar_url'] = self::genCoverUrl($data['avatar_url']);
        } else {
            $data['avatar_url'] = '';
        }
        $author->update($data);
        return $author->fresh();
    }

    private static function genCoverUrl($url)
    {
        if (isset($url) && $url != '') {
            $cover_url_path = $url->store('uploads', 'public');
            $url =  asset('/storage/' . $cover_url_path);
        }
        return $url;
    }
}
