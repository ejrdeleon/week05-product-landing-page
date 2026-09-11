<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * Validate and process a contact form submission.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'    => ['required', 'string', 'max:100'],
            'email'   => ['required', 'email', 'max:150'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        // No outbound mail transport is configured for this project yet.
        // Submissions are recorded to the application log so nothing is lost
        // once mail delivery (see config/mail.php) is set up.
        Log::info('New contact form submission', $validated);

        return redirect()
            ->route('contact')
            ->with('status', 'Thanks, ' . $validated['name'] . '! Your message has been received. We\'ll get back to you soon.');
    }
}
