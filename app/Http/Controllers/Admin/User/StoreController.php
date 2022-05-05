<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Jobs\StoreOrUpdateUserJob;
use Illuminate\Support\Facades\Hash;


class StoreController extends Controller
{

    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        StoreOrUpdateUserJob::dispatch($data);

        return redirect()->route('admin.user.index');
    }
}
