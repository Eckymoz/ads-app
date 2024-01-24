<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdRequest;
use App\Http\Services\AdService;
use App\Models\Ads;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Benchmark;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdsController extends Controller
{
    private $adsService;

    public function __construct(AdService $adsService)
    {
        $this->adsService = $adsService;
    }

    public function create() {

        $categories = Category::all();

        return view('ads.create', compact('categories'));
    }

    public function show(Ads $ad) {

        return view('ads.show', compact('ad'));
    }

    public function store(AdRequest $request) {

        $data          = $request->validated();
        $user          = auth()->user();
        $categoryNames = $request->categories;

        $this->adsService->createAnnouncement($user, $data, $categoryNames);

        $request->session()->flash('success', 'Votre annonce a été créée avec succès.');

        return redirect()->route('home');
    }

    public function edit(Ads $ad) {

        $categories             = Category::all();
        $adCategories           = $ad->categories;

        return view('ads.edit', compact('ad','categories', 'adCategories'));
    }
    public function update(AdRequest $request, $ad) {

        $data          = $request->validated();
        $categoryNames = $request->categories;
        $this->adsService->updateAnnouncement($ad, $data, $categoryNames);

        $request->session()->flash('success', 'Votre annonce a été mise à jour avec succès.');

        return redirect()->route('home');
    }

    public function userAds($id) {

        $user = User::findOrFail($id);

        $ads = Ads::where('user_id', $user->id)->get();

        return view('ads.user', ['ads' => $ads]);
    }

    public function adsFilter(Request $request)
    {
        try {

            $categories = $request->input('categories');
            $minBudget  = $request->input('minBudget');
            $maxBudget  = $request->input('maxBudget');
            $adsOrder   = $request->input('adsOrder');

            $page  = $request->input('page', 1);
            $query = Ads::with(['categories', 'user']);

            if (!empty($categories)) {
                $query->whereHas('categories', function ($query) use ($categories) {
                    $query->whereIn('name', $categories);
                });
            }

            if ($minBudget !== null && $maxBudget !== null) {
                $query->whereBetween('budget', [$minBudget, $maxBudget]);
            }

            if ($adsOrder !== null) {
                $query->orderBy('created_at', $adsOrder);
            }

            $ads = $query->paginate(5, ['*'], 'page', $page);

            return response()->json($ads);

        } catch (\Exception $e) {

            Log::error($e->getMessage());
            return response()->json(['error' => 'Erreur interne du serveur'], 500);
        }

    }

}
