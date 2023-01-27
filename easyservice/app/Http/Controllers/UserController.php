<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\WelcomeNotification;
use App\Mail\BienvenueNotification;
use App\Models\Compagnie;
use DB;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{

    /**
     * @OA\Get(
     *      path="/user/all",
     *      operationId="GetUserList",
     *      tags={"User"},
     *      summary="Get list of user",
     *      description="Returns list of user",
     *      @OA\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *       @OA\Response(response=400, description="Bad request"),
     *     )
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return response()->json([
            'message' => 'All users pulled out successfully',
            'status' => 'success',
            'status_code' => Response::HTTP_OK,
            'data' =>$users,
        ],Response::HTTP_OK,);
    }

     /**
     *  @OA\Post(
     *       path="/user/register",
     *      tags={"User"},
     *      summary="Create user",
     *     operationId="CreateUser",
        
     *  @OA\Parameter(
     *       name="nom",
     *           in="query",
     *           required=true,
     *          @OA\Schema(
     *               type="string"
     *          )
     *      ),    
     *  @OA\Parameter(
     *       name="prenoms",
     *      in="query",
     *      required=false,
     *    @OA\Schema(
     *       type="string"
     *    )
     *   ),   
     *  @OA\Parameter(
     *    name="telephone",
     *    in="query",
     *   required=true,
     *   @OA\Schema(
     *     type="string"
     *    )
     * ),
     *  @OA\Parameter(
    *    name="email",
    *    in="query",
    *   required=false,
    *   @OA\Schema(
    *     type="string"
    *    )
    * ),  
     *  @OA\Parameter(
     *    name="password",
     *    in="query",
    *   required=true,
    *   @OA\Schema(
    *     type="string"
    *    )
    * ),
    *  @OA\Parameter(
    *    name="category_id",
    *    in="query",
    *   required=true,
    *   @OA\Schema(
    *     type="number"
    *    )
    * ),  
    *  @OA\Response(
    *    response=201,
    *  description="Success",
    *  @OA\MediaType(
    *       mediaType="application/json",
    *     )
    *  ),
    *   @OA\Response(
    *      response=401,
    *    description="Unauthorized"
    *  ),
    *   @OA\Response(
    *     response=400,
    *     description="Invalid request"
    *  ),
    *  @OA\Response(
    *    response=404,
    *    description="not found"
    *  ),
    *    )
    * 
    */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $input = $request->all();
            $validator = Validator::make($input, [
                'nom' => 'required',
                'prenoms' => 'required',
                'email' => 'unique:users|email',
                'role' => 'nullable',
                'telephone' => 'required|unique:users',
                'password' => 'required'
            ]);

            if($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'status_code' => 400,
                    'message' => $validator->errors()
                ],400);  
            }

            $input['password'] = bcrypt($request->password);
             User::create($input);
             $user = User::latest()->first();
         
            return response()->json($user,201);
    }

    /**
     *  @OA\Get(
     *      path="/user/{id}",
     *      operationId="GetOnlyUser",
     *      tags={"User"},
     *      summary="Get list of user",
     *      description="Returns user data",
     *  @OA\Parameter(
     *          name="id",
     *          description="user id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        
        $users = User::find($user);
        return response()->json([
            'message' => 'info user pulled out successfully',
            'status' => 'success',
            'status_code' => Response::HTTP_OK,
            'data' =>$user,
        ],Response::HTTP_OK);
    }

    /**
     *  @OA\Put(
     *       path="/user/update",
     *      tags={"User"},
     *      summary="Update user",
     *     operationId="UpdateUser",
     *  @OA\Parameter(
     *       name="id",
     *        description="user id",
     *           in="query",
     *           required=true,
     *          @OA\Schema(
     *               type="integer"
     *          )
     *      ),    
     *  @OA\Parameter(
     *       name="nom",
     *           in="query",
     *           required=true,
     *          @OA\Schema(
     *               type="string"
     *          )
     *      ),    
     *  @OA\Parameter(
     *       name="prenoms",
     *      in="query",
     *      required=false,
     *    @OA\Schema(
     *       type="string"
     *    )
     *   ),  
     *  @OA\Parameter(
     *    name="telephone",
     *    in="query",
     *   required=true,
     *  @OA\Schema(
     *        type="string"
     *    )
     * ),   
     *   @OA\Response(
     *    response=200,
     *  description="Success",
     *  @OA\MediaType(
     *       mediaType="application/json",
     *     )
     *  ),
     *   @OA\Response(
     *      response=401,
     *    description="Unauthorized"
     *  ),
     *   @OA\Response(
     *     response=400,
     *     description="Invalid request"
     *  ),
     *  @OA\Response(
     *    response=404,
     *    description="not found"
     *  ),
     *    )
     * 
    */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        
        $user = User::find($request->id);

            $validator = Validator::make($request->all(), [
                'nom' => 'required|min:3',
                'prenoms' => 'min:3',
                'telephone' => 'required|unique:users',
                'email' => 'unique:users'
            ]);
            if($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'status_code' => 400,
                    'message' => $validator->errors()
                ],400);  
            }
            $user->nom = $request->nom;
            $user->prenoms = $request->prenoms;
            $user->telephone = $request->telephone;
            $user->save();
            return response()->json([
                "success" => true,
                'status_code' => Response::HTTP_OK,
                'data' =>$user,
                'message' => 'user update.'
            ],Response::HTTP_OK,);
       
    }

   

    /**
     *  @OA\Post(
     *      path="/user/login",
     *      operationId="UserLogin",
     *      tags={"User"},
     *      summary="login user ",
     *      description="user login ",
     *  @OA\Parameter(
     *          name="email",
     *          description="email",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *   @OA\Parameter(
     *          name="password",
     *          description="mots de passe",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
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
     *  @OA\Response(
     *          response=404,
     *          description="Not found"
     *      ),
     *     )
     *
     */
     /**
     * login user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function userLogin(Request $request)
    {
 
        $credentials = $request->only('email', 'password');
        $data=[];
        $message = "Mail ou mot de passe invalide";
        
        if (!auth()->attempt($credentials)) {
             return response()->json([
                    'message' => $message,
                ], 400);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        $user = auth()->user();

        $data =  [
            'id' => $user->id,
            'category_id' => $user->category_id,
            'category_name'=>$user->category_name,
            'nom' => $user->nom,
            'prenoms' => $user->prenoms,
            'telephone'=> $user->telephone,
            'photo'=> $user->photo,
            'role' => $user->role,
            'token' => $accessToken
            ];
        return response()->json($data,Response::HTTP_OK);
    }

}
