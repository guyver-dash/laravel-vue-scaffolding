<?php

namespace App\Repo\Company;

use App\Model\Company;
use App\Repo\BaseRepository;
class CompanyRepository extends BaseRepository implements CompanyInterface
{
       public function __construct(){

            $this->modelName = new Company();
       }

       public function index($request){

        $companies = $this->modelName
        ->when( $request->filter != '', function($q) use ($request) {
            $q->where('name', 'like', '%'.$request->filter.'%');
        })
            ->orderBy('created_at', 'desc')
            ->get();

        return $this->paginate($companies);

    }
}
