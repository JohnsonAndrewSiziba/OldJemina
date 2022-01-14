<?php



namespace App\Http\Controllers;



use http\Message;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;



class MessagesAPIController extends Controller

{

    /**

     * Display a listing of the resource.

     */

    public function index()

    {

        //

    }



    /**

     * Store a newly created resource in storage.

     *

     */

    public function store(Request $request)

    {

        $name = $request->name;

        $company = $request->company;

        $email = $request->email;

        $phone = $request->phone;

        $interest = $request->interest;

//        $loan_sanction = $request->interest;

//        $mutual_funds = $request->interest;

//        $insurance_consulting = $request->interest;

//        $taxes_consulting = $request->interest;

//        $others = $request->interest;

        $best_time_to_reach = $request->reach;

        $hear_about_us = $request->hear;

        $message = $request->message;



        $data = [

            "name" => $name,

            "email" => $email,

            "phone" => $phone,

            "company" => $company,

            "investment_planning" => $interest,

            "best_time_to_reach" => $best_time_to_reach,

            "hear_about_us" => $hear_about_us,

            "message" => $message,

        ];



        $details = [

            'title' => 'Mail from jemina.capital',

            'body' => 'Thank you for your message. We will contact you soon.',

            'message' => $message,

            'services' => explode(",",$interest),

            'name' => $name

        ];



        try {

            \Mail::to($email)->send(new \App\Mail\MessageEmail($details));

        }

        catch (\Exception $e){

            error_log("Could not send email");

        }



        return \App\Models\Message::create(

            $data

        );

    }



    /**

     * Display the specified resource.

     *



     */

    public function show($id)

    {

        //

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

        //

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        //

    }

}

