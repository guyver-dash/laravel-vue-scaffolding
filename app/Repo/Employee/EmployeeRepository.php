<?php

namespace App\Repo\Employee;

use App\Model\Employee;
use App\Repo\BaseRepository;

class EmployeeRepository extends BaseRepository implements EmployeeInterface
{
    public function __construct(Employee $employee)
    {

        $this->modelName = $employee;
    }

    public function index($request)
    {

        $filter = explode(' ', $request->filter);
        $employees = $this->modelName
            ->when(count($filter) > 0, function ($q) use ($filter) {
                $q->where('lastname', 'like', '%' . $filter[0] . '%');
            })
            ->when(count($filter) > 1, function ($q) use ($filter) {
                $q->where('firstname', 'like', '%' . $filter[1] . '%');
            })
            ->with(['company'])
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($v) {
                return [
                    'id' => $v->id,
                    'company' => $v->company['name'],
                    'name' => $v->lastname . ', ' . $v->firstname,
                    'email' => $v->email,
                    'phone' => $v->phone,
                ];
            });

        return $this->paginate($employees);

    }
}
