<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'nullable|string|max:100',
            'email'      => 'required|email|max:255',
            'subject'    => 'nullable|string|max:255',
            'message'    => 'required|string|max:3000',
        ]);

        DB::table('contacts')->insert([
            'first_name' => $validated['first_name'],
            'last_name'  => $validated['last_name'] ?? null,
            'email'      => $validated['email'],
            'subject'    => $validated['subject'] ?? null,
            'message'    => $validated['message'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/')->with('success', 'Message sent!');
    }
}
