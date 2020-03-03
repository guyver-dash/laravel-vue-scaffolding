<?php

namespace App\Repo\Company;

use App\Mail\CompanyRegistration;
use App\Model\Company;
use App\Repo\BaseRepository;
use App\User;
use Hash;
use Illuminate\Support\Facades\Mail;

class CompanyRepository extends BaseRepository implements CompanyInterface
{
    public function __construct()
    {

        $this->modelName = new Company();
    }

    public function index($request)
    {

        $companies = $this->modelName
            ->when($request->filter != '', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->filter . '%');
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return $this->paginate($companies);

    }

    public function save($request)
    {

        $url = $request->website;
        $parts = explode('www.', $url);
        $domain = $parts[1];

        $string = str_random(6);
        $stringRandom = Hash::make($string);
        $user = User::create([
            'name' => 'default user',
            'email' => 'admin@' . $domain,
            'password' => $stringRandom,
        ]);

        $newRequest = $request->all();
        $newRequest['user_id'] = $user->id;
        $company = $this->create($newRequest);
        Mail::to('bobby.gerez@yahoo.com')
            ->send(
                new CompanyRegistration([
                    'name' => $request->name,
                    'email' => 'admin@' . $domain,
                    'password' => $string,
                ])
            );
    }
}
