<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePartnerRequest;
use App\Http\Requests\UpdatePartnerRequest;
use App\Models\Partner;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('partners.index', [
            'partners' => Partner::get()
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
        $partner = Partner::create($request->validated());
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
        $partner->update($request->validated());
        return redirect()->route('partners.show', [$partner]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        //
    }
}
