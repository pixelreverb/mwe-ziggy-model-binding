<?php

namespace App\Http\Controllers;

use App\Models\RegistrationToken;
use App\Models\Organization;
use Illuminate\Http\Request;

class RegistrationTokenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Organization $organization)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Organization $organization)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Organization $organization)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Organization $organization, RegistrationToken $registrationToken)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organization $organization, RegistrationToken $registrationToken)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organization $organization, RegistrationToken $registrationToken)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organization $organization, RegistrationToken $registrationToken)
    {
        //
    }
}
