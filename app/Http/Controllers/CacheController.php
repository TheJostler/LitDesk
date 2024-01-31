<?php

namespace App\Http\Controllers;

use Closure;
use Illuminate\Support\Facades\Cache;

class CacheController extends Controller
{
    public function cacheTags($tag, $key, Closure $value) {
        //store the information in the normal way
        Cache::rememberForever($key, $value);

        //Store all tags with a prefix in order to avoid messy data.
        $prefixedTag = 'tag_' . $tag;

        //Remember tags in the cache
        if (!Cache::has('tags')) {
            $tags = [];
            array_push($tags, $tag);
            Cache::put('tags', $tags);
        }
        else {
            $tags = Cache::get('tags');
            if (!in_array($tag, $tags, $strict = true)) {
                array_push($tags, $tag);
                Cache::forget('tags');
                Cache::put('tags', $tags);
            }
        }

        //In the tags store, all the keys relating to a tag wil be stored in an array
        if (!Cache::has($prefixedTag)) {
            $keys = [];
            array_push($keys, $key);
        }
        else {
            $keys = Cache::get($prefixedTag);
            if (!in_array($key, $keys, $strict = true)) {
                array_push($keys, $key);
                Cache::forget($prefixedTag);
                Cache::put($prefixedTag, $keys);
            }
        }
        
        Cache::put($prefixedTag, $keys);

        return Cache::get($key);
    }

    public function flushTags($tags) {
        function flush($tag) {
            //All tags are stored with a prefix.
            $prefixedTag = 'tag_' . $tag;

            //In the tags store, all the keys relating to a tag wil be stored in an array
            $keys = [];
            if (!$keys = Cache::pull($prefixedTag)) {
                
                //return false if we can't retreive the keys relating to the tag
                return false;
            }
            foreach($keys as $key) {
                
                //Forget all the keys relating to the tag
                Cache::forget($key);
            }  
        }

        if(is_array($tags)) {
            foreach($tags as $tag) {
                flush($tag);
            }
        }
        else {
            flush($tags);
        }
        
        //return true if successful
        return true;
    }

    public function map() {
        //This function maps out the content in the cache for debgging
        $cache_map = [];
        if (Cache::has('tags')){
            foreach (Cache::get('tags') as $tag) {
                $prefixedTag = 'tag_' . $tag;
                $cache_map[$prefixedTag] = Cache::get(Cache::get($prefixedTag));
            }

            dd(['Cache Map' => $cache_map]);
        }
        else {
            dd('There are no tags in the cache');
        }
    }
}