<?php

namespace App\Http\Controllers;
use App\step;
use Illuminate\Http\Request;
/**
* @OA\Info(title="API ", version="1.0")
*
* @OA\Server(url="http://crm.com/public")
*/
class stepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $steps = step::all();
        return $steps;
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
    public function store(Request $request)
    {
        $steps = step::create($request->all());
        return $steps;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
 * @OA\Get(path="/api/steps/{id}",
 *   tags={"Step"},
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
        $steps = Step::where("id",$id)->firstOrFail();

      return [
          "message" => "Resource Found.",
          "data" => $steps
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
    public function update(Request $request, $id)
    {
$message = [];

      $steps = Step::where("id",$id)->firstOrFail();

      if (isset($request->key)){
          $steps->key = $request->key;
          $message[] = "Updated: ".$steps->key." to ".$request->key;
      }

      if (isset($request->value)){
          $steps->key = $request->value;
          $message[] = "Updated: ".$steps->value." to ".$request->value;
      }

      $steps->save();

      return [
          "message" => $message,
          "dataset" => $steps
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
              $steps = Step::where("id",$id)->firstOrFail();

      $steps->delete();
      return [
          "message" => "Resource Deleted",
          "dataset" => $steps
      ];
    }


/**
 * @OA\Post(path="/api/steps",
 *   tags={"Step"},
 *   summary="Store",
 *   description="Store step",
 *   @OA\RequestBody(
 *       required=true,
 *       description="Lead information",
 *       @OA\JsonContent(ref="#/components/schemas/Step")
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
/**
 * @OA\Put(path="/api/steps/{id}",
 *   tags={"Step"},
 *   summary="Update",
 *   description="Update Lead",
 *   @OA\RequestBody(
 *       required=true,
 *       description="Lead information",
 *       @OA\JsonContent(ref="#/components/schemas/Step")
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
 /**
 * @OA\Delete(path="/api/steps/{id}",
 *   tags={"Step"},
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
}
