<?php

namespace App\Http\Controllers;

use App\Domain\Feedback\Service\FeedbackService;
use App\Http\Requests\StoreFeedbackRequest;
use App\Models\Feedback;
use App\Notifications\FeedbackCreated;
use Illuminate\Support\Facades\RateLimiter;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('feedback.index', [
            'requests' => Feedback::orderByDesc('id')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFeedbackRequest $request, FeedbackService $feedbackService)
    {
        $response = [
            'success' => false,
            'message' => ''
        ];

        $limiterKey = 'feedback:'.$request->ip();

        $executed = RateLimiter::attempt(
            $limiterKey,
            3,
            function() {
            }
        );
        if (!$executed) {
            $response['message'] = 'Too many requests sent. Please wait 1 minute before next attempt!';
        } else {
            try {
                $feedback = $feedbackService->store($request->getDTO());
                $response['success'] = true;
                $response['message'] = 'We save you request and will contact with You soon';
            } catch (\Exception $e) {
                $response['message'] = $e->getMessage();
            }
        }

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return redirect()->route('dashboard');
    }
}
