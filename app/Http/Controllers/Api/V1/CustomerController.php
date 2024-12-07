<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct(private readonly CustomerService $customerService) {}

    public function index()
    {
        return $this->customerService->index();
    }

    public function store(UserRequest $request)
    {
        return $this->customerService->store($request);
    }

    public function show(User $user)
    {
        return $this->customerService->show($user);
    }

    public function update(UserRequest $request, User $user)
    {
        return $this->customerService->update($request, $user);
    }

    public function destroy(Request $request)
    {
        return $this->customerService->destroy($request->id);
    }
}
