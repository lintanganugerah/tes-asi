<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Http\Resources\EmployeeResource;
use App\Http\Services\EmployeeServices;
use App\Traits\ApiResponse;

class EmployeeController extends Controller
{
    // CRUD Employee
    use ApiResponse;

    public function __construct(protected EmployeeServices $service)
    {
        $this->service = $service;
    }

    public function showAll()
    {
        $data = $this->service->get();
        return $this->successResponse(EmployeeResource::collection($data));
    }

    public function showOne($id)
    {
        $data = $this->service->get($id);
        return $this->successResponse(new EmployeeResource($data));
    }

    public function store(EmployeeRequest $req)
    {
        $validatedReq = $req->validated();
        $dataCreated = $this->service->create($validatedReq);
        return $this->successResponse(new EmployeeResource($dataCreated), 'Employee Created', 201);
    }

    public function update(EmployeeRequest $req, $id)
    {
        $validatedReq = $req->validated();
        $employee = $this->service->get($id);
        $updatedEmployee = $this->service->update($employee, $validatedReq);
        return $this->successResponse(new EmployeeResource($updatedEmployee), 'Employee Updated');
    }

    public function delete($id)
    {
        $employee = $this->service->get($id);
        $this->service->delete($employee);
        return $this->successResponse(null, 'Employee Deleted');
    }
}
