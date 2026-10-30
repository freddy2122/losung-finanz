<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewFormRequest;
use App\Mail\NewReviewSubmitted;
use App\Models\Review as ReviewModel;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class Review extends Controller
{
    /**
     * Formulaire de dépôt d'un avis.
     */
    public function create()
    {
        return view('pages.testimonials');
    }

    /**
     * Enregistre l'avis et notifie l'équipe pour validation.
     */
    public function store(ReviewFormRequest $request)
    {
        $review = $request->get('review');

        $id = ReviewModel::create([
            'name'    => trim($review['name']),
            'rating'  => (int) $review['rating'],
            'message' => trim($review['message']),
            'locale'  => app()->getLocale(),
        ]);

        $approveUrl = URL::signedRoute('site.testimonials.approve', ['review' => $id], now()->addDays(30));
        $rejectUrl = URL::signedRoute('site.testimonials.reject', ['review' => $id], now()->addDays(30));

        try {
            Mail::to(SITE_EMAIL)->send(
                (new NewReviewSubmitted([
                    'name'        => trim($review['name']),
                    'rating'      => (int) $review['rating'],
                    'message'     => trim($review['message']),
                    'approve_url' => $approveUrl,
                    'reject_url'  => $rejectUrl,
                ]))->locale('fr')
            );
        } catch (\Exception $e) {
            Log::error('Review notification mail failed', ['message' => $e->getMessage()]);
        }

        return back()->withErrors(['success' => translate(708)]);
    }

    /**
     * Valide un avis depuis le lien signé envoyé par email.
     */
    public function approve(string $review)
    {
        $success = ReviewModel::approve($review);

        return view('pages.review-decision', [
            'success'  => $success,
            'decision' => 'approve',
        ]);
    }

    /**
     * Refuse un avis depuis le lien signé envoyé par email.
     */
    public function reject(string $review)
    {
        $success = ReviewModel::reject($review);

        return view('pages.review-decision', [
            'success'  => $success,
            'decision' => 'reject',
        ]);
    }
}
