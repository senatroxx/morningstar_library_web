<?php

namespace App\Http\Controllers\API\User;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\Address\AddressCollection;
use App\Models\UserAddress;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = auth()->user();

            return $next($request);
        });
    }

    public function index()
    {
        $addresses = UserAddress::with(['province', 'city'])->where('user_id', $this->user->id)
            ->paginate(10);
        return Response::status('success')
            ->message('Address retrieved successfully')
            ->result(new AddressCollection($addresses));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'street_address_1' => 'required|string',
            'street_address_2' => 'nullable|string',
            'phone' => 'required|string',
            'postal_code' => 'required|string',
            'province_id' => 'required|exists:provinces,id',
            'city_id' => 'required|exists:cities,id',
            'is_primary' => 'required|boolean',
        ]);

        if ($attributes['is_primary']) {
            foreach ($this->user->addresses as $address) {
                $address->update(['is_primary' => false]);
            }
        }

        $this->user->addresses()->create($attributes);


        return Response::status('success')
            ->message('Address created successfully')
            ->result();
    }

    public function update(Request $request, $id)
    {
        $attributes = $request->validate([
            'street_address_1' => 'required|string',
            'street_address_2' => 'nullable|string',
            'phone' => 'required|string',
            'postal_code' => 'required|string',
            'province_id' => 'required|exists:provinces,id',
            'city_id' => 'required|exists:cities,id',
            'is_primary' => 'required|boolean',
        ]);

        if ($attributes['is_primary']) {
            foreach ($this->user->addresses as $address) {
                $address->update(['is_primary' => false]);
            }
        }

        $this->user->addresses()->findOrFail($id)->update($attributes);

        return Response::status('success')
            ->message('Address updated successfully')
            ->result();
    }

    public function destroy($id)
    {
        $this->user->addresses()->findOrFail($id)->delete();

        return Response::status('success')
            ->message('Address deleted successfully')
            ->result();
    }

    public function setPrimary($id)
    {
        foreach ($this->user->addresses as $address) {
            $address->update(['is_primary' => false]);
        }

        $this->user->addresses()->findOrFail($id)->update(['is_primary' => true]);

        return Response::status('success')
            ->message('Address updated successfully')
            ->result();
    }

    public function getPrimary()
    {
        return Response::status('success')
            ->message('Address retrieved successfully')
            ->result($this->user->primaryAddress());
    }
}
