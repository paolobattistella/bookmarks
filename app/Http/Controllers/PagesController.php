<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Bookmark;

class PagesController extends Controller
{
    public function dashboard()
    {
        $latest_bookmarks = Bookmark::orderBy('created_at', 'desc')->take(10)->get(['id','title']);

        return view('pages.dashboard', ['counters' => self::counters(), 'latest_bookmarks' => $latest_bookmarks]);
    }

    protected function counters()
    {
        $data = [];
        // numbers
        $data['bookmarks']['number'] = Bookmark::count();
        $data['tags']['number'] = \App\Tag::count();
        $data['categories']['number'] = \App\Category::count();
        $data['clicks']['number'] = \App\Click::count();
        $data['clicks_per_bookmark']['number'] = $data['clicks']['number'] / $data['bookmarks']['number'];
        // labels
        $data['bookmarks']['label'] = self::number_shorten($data['bookmarks']['number']);
        $data['tags']['label'] = self::number_shorten($data['tags']['number']);
        $data['categories']['label'] = self::number_shorten($data['categories']['number']);
        $data['clicks']['label'] = self::number_shorten($data['clicks']['number']);
        $data['clicks_per_bookmark']['label'] = self::number_shorten($data['clicks_per_bookmark']['number']);

        return $data;

    }

    public function bookmarks()
    {
        $bookmarks = Bookmark::with(['tags', 'category:id,title'])->get();

        return view('pages.bookmarks', ['bookmarks' => $bookmarks]);
    }

    public function number_shorten($number, $precision = 3, $divisors = null) {

        // Setup default $divisors if not provided
        if (!isset($divisors)) {
            $divisors = array(
                pow(1000, 0) => '', // 1000^0 == 1
                pow(1000, 1) => 'k', // Thousand
                pow(1000, 2) => 'm', // Million
                pow(1000, 3) => 'b', // Billion
                pow(1000, 4) => 't', // Trillion
                pow(1000, 5) => 'Qa', // Quadrillion
                pow(1000, 6) => 'Qi', // Quintillion
            );
        }

        // Loop through each $divisor and find the
        // lowest amount that matches
        foreach ($divisors as $divisor => $shorthand) {
            if (abs($number) < ($divisor * 1000)) {
                // We found a match!
                break;
            }
        }

        // We found our match, or there were no matches.
        // Either way, use the last defined value for $divisor.
        return 0 + number_format($number / $divisor, $precision) . $shorthand;
    }
}
