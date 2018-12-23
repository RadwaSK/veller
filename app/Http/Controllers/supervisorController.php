<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model;

class supervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = new Model("supervisor");

        $supervisors = $model->select("*");

        return view("supervisors.index" , compact('supervisors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("auth.SuperVisor");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required",
            "phone_number" => "required",
            "country" => "required", 
            "city" => "required",
            "zip" => "required",
            "password" => "required"
        ]);

        $model = new Model("supervisor");
        $requestData = $request->all();
        $name = "'".$requestData["name"]."'";
        $email = "'" . $requestData["email"] . "'";
        $country = "'" . $requestData["country"] . "'";
        $city = "'" . $requestData["city"] . "'";
        $zip = $requestData["zip"];
        $password = "'" . $requestData["password"] . "'";
        $phone_number = $requestData["phone_number"];
        $values = array(
            "name" => $name,
            "email" => $email,
            "phone_number" => $phone_number,
            "country" => $country,
            "city" => $city,
            "zip" => $zip,
            "password" => $password,
            "support_tickets_count" => 0
        );
        $model->insert($values);
        return redirect("sup_login")->with("success" , "supervisor added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = new Model("supervisor");
        $conditions = array("id = ".$id);
        $supervisor = $model->select("*" , $conditions);

        return view("supervisor.show" , compact("supervisor"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model1 = new Model("supervisor");
        $conditions = array("id = " . $id);
        $sup = $model1->select("*" , $conditions);
        $sup=$sup->fetch_assoc();
        return view("supervisor.edit")->with("sup",$sup);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required",
            "email" => "required",
            "phone_number" => "required",
            "country" => "required", 
            "city" => "required",
            "zip" => "required",
            "password" => "required"
        ]);
        $model = new Model("supervisor");
        $requestData = $request->all();
        $name = "'".$requestData["name"]."'";
        $email = "'" . $requestData["email"] . "'";
        $country = "'" . $requestData["country"] . "'";
        $city = "'" . $requestData["city"] . "'";
        $zip = $requestData["zip"];
        $password = "'" . $requestData["password"] . "'";
        $phone_number = $requestData["phone_number"];
        $values = array(
            "name" => $name,
            "email" => $email,
            "phone_number" => $phone_number,
            "country" => $country,
            "city" => $city,
            "zip" => $zip,
            "password" => $password,
        );
        $conditions = array("id = ".$id);
        $model->update($values , $conditions);
        return redirect("supervisors/".$id)->with("success" , "Supervisor updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = new Model("supervisor");
        $conditions = array("id = ".$id);
        $model->delete($conditions);
        return redirect("supervisors")->with("status" , "supervisor deleted successfully");
    }
}
