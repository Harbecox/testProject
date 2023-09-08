<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AffiliateEmployeeRequest;
use App\Http\Requests\AfiliateStoreRequest;
use App\Http\Resources\AffiliateResource;
use App\Models\Affiliate;
use App\Models\Employee;
use Illuminate\Http\Request;

class AffiliateController extends Controller
{
    function index(){
        return response()->json(AffiliateResource::collection(Affiliate::all()));
    }

    function show($id){
        $affiliate = Affiliate::query()->where("id",$id)->with("employees",function ($q){
            $q->orderBy("name");
        })->firstOrFail();
        return response()->json(AffiliateResource::make($affiliate));
    }

    function store(AfiliateStoreRequest $request){
        $affiliate = new Affiliate();
        $affiliate->title = $request->get("title");
        $affiliate->address = $request->get("address");
        $affiliate->save();
        return response()->json(true);
    }

    function add_employee($id,AffiliateEmployeeRequest $request){
        $affiliate = Affiliate::find($id);
        $employee = new Employee();
        $employee->name = $request->get("name");
        $employee->role = $request->get("role");
        $employee->save();
        $affiliate->employees()->attach($employee);
        return response()->json(true);
    }

}
