<?php
namespace App\Http\Controllers;

use App\Models\Role;
use Validator;
use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Firebase\JWT\ExpiredException;
use Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Routing\Controller as BaseController;


/**
 * @group User management
 *
 * APIs for managing users
 */
class UserController extends BaseController
{
    /**
     * The request instance.
     *
     * @var \Illuminate\Http\Request
     */
    private $request;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __construct(Request $request) {
        $this->request = $request;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create_user() {
        $this->validate($this->request, [
            'name'  => 'required',
            'email'     => 'required|email',
            'password'  => 'required',
            'role_id'  => 'required|numeric',
        ]);

        // Find the user by email
        $role = Role::where('id', $this->request->input('role_id'))->first();
        if (!$role) {
            return response()->json([
                'error' => 'Role does not exist.'
            ], 400);
        }

        $result = app('db')->table('users')->insert([
            'name' => $this->request->input('name'),
            'email' => $this->request->input('email'),
            'password' => bcrypt($this->request->input('password')),
            'role_id' => $this->request->input('role_id'),
        ]);

        return response()->json($result);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_users() {
        $users = User::all();
        return response()->json($users);
    }
}