<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Services\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required',
        ]);

        $company = Company::query()->create($data);

        return [
            'name' => $company->name,
            'id' => $company->id,
        ];
    }
}
