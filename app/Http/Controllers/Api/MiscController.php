<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Tag;
use Illuminate\Http\Request;

class MiscController extends Controller
{

    public function getCompanies(Request $request)
    {
        $data = Company::query()
            ->where('name', 'like', '%' . $request->input('q') . '%')
            ->limit(10)
            ->get();

        if (blank($data)) {
            return [
                [
                    'id' => -1,
                    'name' => $request->input('q')
                ]
            ];
        }

        return $data;
    }

    public function getTags(Request $request)
    {
        $data = Tag::query()
            ->where('name', 'like', '%' . $request->input('q') . '%')
            ->limit(10)
            ->get();

        return $data;
    }

}
