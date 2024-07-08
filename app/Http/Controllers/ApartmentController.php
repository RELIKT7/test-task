<?php

  namespace App\Http\Controllers;

  use App\Models\Apartment;
  use Illuminate\Database\Eloquent\Collection;
  use Illuminate\Http\Request;

  class ApartmentController extends Controller {
    /**
     * Get apartments by conditions.
     * @param Request $request
     * @return Collection
     */
    public function get(Request $request): Collection {
      return Apartment::query()
        ->issetWhereLike($request)
        ->issetWhere($request, 'bedrooms')
        ->issetWhere($request, 'bathrooms')
        ->issetWhere($request, 'storeys')
        ->issetWhere($request, 'garages')
        ->issetWhereBetween($request, 'price', ['pricemin', 'pricemax'])
        ->get();
    }
  }
