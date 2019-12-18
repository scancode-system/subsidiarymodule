<?php

namespace Modules\Subsidiary\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Subsidiary\Http\Requests\SubsidiaryRequest;
use Modules\Subsidiary\Repositories\SubsidiaryRepository;

class SubsidiaryController extends Controller
{

    public function store(SubsidiaryRequest $request)
    {
        SubsidiaryRepository::store($request->all());
        return back()->with('success', 'Filial criado.');
    }

}
