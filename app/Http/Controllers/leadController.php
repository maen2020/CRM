<?php

namespace App\Http\Controllers;
use App\lead;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;

class leadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leads = lead::all();
        return $leads;
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
    public function store(StoreRequest $request)
    {
      @include('lead.fragment.error');
        $leads = lead::create($request->all());
        return $leads;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ /**
 * @OA\Get(path="/api/leads/{id}",
 *   tags={"Lead"},
 *   summary="Show",
 *   description="Returns lead by id",
 *   @OA\Parameter(
 *     name="id",
 *     in="path",
 *     description="step ID",
 *     required=true,
 *     @OA\Schema(
 *         type="string"
 *     )
 *   ),
 *   @OA\Response(
 *         response=200,
 *         description="Successful operation.",
 *         @OA\JsonContent(
 *              @OA\Property(
 *                  property="message",
 *                  example="Resource Found"
 *             ),
 *              @OA\Property(
 *                  property="data",
 *                  ref="#/components/schemas/Step"
 *             ),
 *
 *          ),
 *     ),
 *     @OA\Response(
 *         response="401",
 *         description="Unauthenticated."
 *     ),
 *     @OA\Response(
 *         response="404",
 *         description="Not Found."
 *     ),
 *     @OA\Response(
 *         response="500",
 *         description="CRM failure."
 *     )
 * )
 */
    public function show($id)
    {
    $leads = Lead::where("id",$id)->firstOrFail();

      return [
          "message" => "Resource Found.",
          "data" => $leads
      ];

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(UpdateRequest $request, $id)
    {

    $message = [];
      @include('lead.fragment.error');
      $leads = Lead::where("id",$id)->firstOrFail();

      if (isset($request->name)){
          $leads->name = $request->name;
          $message[] = "Updated: ".$leads->name." to ".$request->name;
      }

      if (isset($request->email)){
          $leads->email = $request->email;
          $message[] = "Updated: ".$leads->email." to ".$request->email;
      }

      if (isset($request->phone)){
          $leads->phone = $request->phone;
          $message[] = "Updated: ".$leads->phone." to ".$request->phone;
      }

      if (isset($request->message)){
          $leads->message = $request->message;
          $message[] = "Updated: ".$leads->message." to ".$request->message;
      }

      if (isset($request->step_id)){
          $leads->step_id = $request->step_id;
          $message[] = "Updated: ".$leads->step_id." to ".$request->step_id;
      }

      $leads->save();

      return [
          "message" => $message,
          "dataset" => $leads
      ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
             $leads = Lead::where("id",$id)->firstOrFail();

      $leads->delete();
      return [
          "message" => "Resource Deleted",
          "dataset" => $leads
      ];
    }
/**
 * @OA\Post(path="/api/leads",
 *   tags={"Lead"},
 *   summary="Store",
 *   description="Store Lead",
 *   @OA\RequestBody(
 *       required=true,
 *       description="Lead information",
 *       @OA\JsonContent(ref="#/components/schemas/Lead")
 *   ),
 *   @OA\Response(
 *         response=200,
 *         description="Successful operation.",
 *         @OA\JsonContent(
 *              @OA\Property(
 *                  property="message",
 *                  example="Resource Store Success"
 *             ),
 *              @OA\Property(
 *                  property="data",
 *                  ref="#/components/schemas/Lead"
 *             ),
 *
 *          ),
 *     ),
 *     @OA\Response(
 *         response="401",
 *         description="Unauthenticated."
 *     ),
 *     @OA\Response(
 *         response="404",
 *         description="Not Found."
 *     ),
 *     @OA\Response(
 *         response="500",
 *         description="CRM failure."
 *     )
 * )
 */
/**
 * @OA\Put(path="/api/leads/{id}",
 *   tags={"Lead"},
 *   summary="Update",
 *   description="Update Lead",
 *   @OA\RequestBody(
 *       required=true,
 *       description="Lead information",
 *       @OA\JsonContent(ref="#/components/schemas/Lead")
 *   ),
 *   @OA\Parameter(
 *     name="id",
 *     in="path",
 *     description="Lead ID",
 *     required=true,
 *     @OA\Schema(
 *         type="string"
 *     )
 *   ),
 *   @OA\Response(
 *         response=200,
 *         description="Successful operation.",
 *         @OA\JsonContent(
 *              @OA\Property(
 *                  property="message",
 *                  example="Updated"
 *             ),
 *              @OA\Property(
 *                  property="data",
 *                  ref="#/components/schemas/Lead"
 *             ),
 *
 *          ),
 *     ),
 *     @OA\Response(
 *         response="401",
 *         description="Unauthenticated."
 *     ),
 *     @OA\Response(
 *         response="404",
 *         description="Not Found."
 *     ),
 *     @OA\Response(
 *         response="500",
 *         description="CRM failure."
 *     )
 * )
 */
 /**
 * @OA\Delete(path="/api/leads/{id}",
 *   tags={"Lead"},
 *   summary="Delete",
 *   description="Delete Lead",
 *
 *   @OA\Parameter(
 *     name="id",
 *     in="path",
 *     description="Lead ID",
 *     required=true,
 *     @OA\Schema(
 *         type="string"
 *     )
 *   ),
 *   @OA\Response(
 *         response=200,
 *         description="Successful operation.",
 *         @OA\JsonContent(
 *              @OA\Property(
 *                  property="message",
 *                  example="Resource Deleted"
 *             ),
 *              @OA\Property(
 *                  property="data",
 *                  ref="#/components/schemas/Lead"
 *             ),
 *
 *          ),
 *     ),
 *     @OA\Response(
 *         response="401",
 *         description="Unauthenticated."
 *     ),
 *     @OA\Response(
 *         response="404",
 *         description="Not Found."
 *     ),
 *     @OA\Response(
 *         response="500",
 *         description="CRM failure."
 *     )
 * )
 */
}