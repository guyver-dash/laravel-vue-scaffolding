<?php

namespace App\Repo\Employee;

use App\Model\Employee;
use App\Model\User;
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
            ->with(['company', 'user'])
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($v) {
                return [
                    'id' => $v->id,
                    'company' => $v->company['name'],
                    'name' => $v->lastname . ', ' . $v->firstname,
                    'email' => $v->user['email'],
                    'phone' => $v->phone,
                ];
            });

        return $this->paginate($employees);

    }

    public function store($request)
    {

        $user = User::create([
            'email' => $request->email,
            'password' => str_random(6),
        ]);

        $user = User::where('id', $user->id)->first();

        $user->roles()->attach($user->id, [
            'user_id' => $user->id,
            'role_id' => $request->roleId,
        ]);

        $newRequest = $request->all();
        $newRequest['user_id'] = $user->id;
        $this->create($newRequest);

    }
}
