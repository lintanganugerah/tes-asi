<?php

namespace App\Http\Services;

use App\Exceptions\DatabaseException;
use App\Models\Employee;
use Exception;
use Illuminate\Support\Facades\DB;

class EmployeeServices
{
    // Menyediakan business logic bagi controller agar lebih clean

    public function get($id = null)
    {
        if ($id == null) {
            return Employee::all();
        }

        $data = Employee::find($id);

        if (!$data) {
            throw new DatabaseException('Data Not Found', [], 422);
        }

        return $data;
    }

    public function create(array $data)
    {
        DB::beginTransaction();
        try {
            $employeeCreated = Employee::create($data);
            DB::commit();
            return $employeeCreated;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new DatabaseException("Failed To Create Employee", $e);
        }
    }

    public function update(Employee $employee, array $data)
    {
        DB::beginTransaction();
        try {
            $employee->update($data);
            DB::commit();
            return $employee;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new DatabaseException("Failed To Update Employee", $e);
        }
    }

    public function delete(Employee $employee)
    {
        DB::beginTransaction();
        try {
            $employee->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new DatabaseException("Failed To Delete Employee", $e);
        }
    }
}
