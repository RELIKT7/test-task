<?php

  namespace App\Builders;

  use Illuminate\Database\Eloquent\Builder;
  use Illuminate\Http\Request;

  class HelpQueryBuilder extends Builder {
    public function issetWhereLike(Request $request, string $argName = 'name'): self {
      if (isset($request->$argName))
        return $this->where($argName, 'like', "%{$request->$argName}%");

      return $this;
    }

    public function issetWhere(Request $request, string $argName = 'rooms'): self {
      if (isset($request->$argName))
        return $this->where($argName, $request->$argName);

      return $this;
    }

    public function issetWhereBetween(Request $request, string $columnName = 'price', array $argNames = ['pricemin', 'pricemax']): self {
      if (isset($request->{$argNames[0]}) && isset($request->{$argNames[1]}))
        return $this->whereBetween('price', [$request->{$argNames[0]}, $request->{$argNames[1]}]);
      elseif (isset($request->{$argNames[0]}))
        return $this->where($columnName, '>=', $request->{$argNames[0]});
      elseif (isset($request->{$argNames[1]}))
        return $this->where($columnName, '<=', $request->{$argNames[1]});

      return $this;
    }
  }
