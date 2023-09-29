<?php

namespace App\Http\Controllers;

use App\Domain\Partner\Service\PartnerService;
use App\Http\Requests\Partner\StorePartnerRequest;
use App\Http\Requests\Partner\UpdatePartnerRequest;
use App\Models\Partner;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class PartnerController extends Controller
{
    private PartnerService $partnerService;

    public function __construct()
    {
        $this->partnerService = new PartnerService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('partners.index', [
            'partners' => Partner::get(),
            'SEOData' => new SEOData(
                title: 'Partners of RYCBAR software',
                description: 'List of partners, with who RYCBAR have collaboration'
            )
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('partners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePartnerRequest $request)
    {
        $partner = $this->partnerService->create($request->getDTO());
        return redirect()->route('partners.show', [$partner]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Partner $partner)
    {
        return view('partners.show', [
            'partner' => $partner
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        return view('partners.edit', [
            'partner' => $partner
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePartnerRequest $request, Partner $partner)
    {
        $this->partnerService->update($partner, $request->getDTO());
        return redirect()->route('partners.show', [$partner]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        $partner->delete();

        return redirect()->route('partners.index');
    }
}
