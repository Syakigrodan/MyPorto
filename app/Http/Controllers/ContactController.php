<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\ContactSubmission;

class ContactController extends Controller
{
    public function send(ContactRequest $request)
    {
        ContactSubmission::create($request->validated());

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Request received',
            ]);
        }

        return back()->with('success', 'Pesan Anda berhasil dikirim. Terima kasih telah menghubungi saya!');
    }
}
