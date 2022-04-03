<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBillingFormRequest;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function store(StoreBillingFormRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;

        Address::create($data);

        return response()->noContent();
    }
}
