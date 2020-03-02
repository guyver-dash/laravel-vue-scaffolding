<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Company\CompanyRequest;
use App\Repo\Company\CompanyInterface;
use Mail;
class CompanyController extends Controller
{
    protected $company;
    public function __construct(CompanyInterface $company){

        $this->company = $company;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'companies' => $this->company->index( app()->make('request') )
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        
        $this->company->create( $request->all() );

        $to_name = 'Example';
        $to_email = 'bobby.gerez@yahoo.com';
        $data = array('name'=>'Monstar', 'body' => 'A test mail');
        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
        ->subject('Laravel Test Mail');
        $message->from('bobbygerezmonstar@gmail.com','Test Mail');
        });

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = $this->company->where('id', $id)->first();
        return response()->json([
            'company' => $company
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        $company = $this->company->where('id', $id)->first();
        $company->update($request->all());
        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = $this->company->where('id', $id)->first();
        $company->delete();

        return response()->json([
            'success' => true
        ]);

    }
}
