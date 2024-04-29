<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class StatusController extends Controller
{
    public function store(StatusRequest $request)
    {
        // 3 cara untuk insert data ke database

        //pertama menggunakan model
        // Auth::user()->makeStatus($request->body);

        //kedua menggunakan request
        $request->make();

        //ketiga menggunakan Auth
        // Auth::user()->statuses()->create([
        //     'body' => $request->body,
        //     'identifier' => Str::slug($this->id . Str::random(32)),
        // ]);

        return redirect()->back();
    }
}
