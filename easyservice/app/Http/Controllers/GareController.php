<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use DB;
use Auth;
use Validator;

class GareController extends Controller
{ 
    /**
     * @OA\Get(
     *      path="/category/all",
     *      operationId="AllCategory",
     *      tags={"Others"},
     *      summary="",
     *      description="",
     *      @OA\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *       @OA\Response(response=400, description="Bad request"),
     *     )
     *
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('category')->select('*')->get();
        
        return response()->json([
            'message' => 'Toutes les categories',
            'status' => 'success',
            'status_code' => Response::HTTP_OK,
            'data' =>$categories,
        ],Response::HTTP_OK,);
    }


    /**
     *  @OA\Get(
     *      path="/prestation/all",
     *      operationId="AllPrestation",
     *      tags={"Others"},
     *      summary="Toutes les demandes de prestation",
     *      description="Toutes les demandes de prestation",
     *      @OA\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *  @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *       @OA\Response(
     *           response=400, 
     *           description="Bad request"
     *       ),
     *   @OA\Response(
     *          response=404,
     *          description="Not found"
     *      ),
     *     )
     *
     */
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shows()
    {
        $prestations = DB::table('prestations')->select('*')->orderBy('id','Desc')->get();
        
        return response()->json([
            'message' => 'Toutes les prestations',
            'status' => 'success',
            'status_code' => Response::HTTP_OK,
            'data' =>$prestations,
        ],Response::HTTP_OK,);
        
    }
}
