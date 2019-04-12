<?php
namespace App\Http\Controllers;


use App\Models\UserTeam;
use Validator;
use App\Models\Team;
use Illuminate\Http\Request;
use Firebase\JWT\ExpiredException;
use Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Routing\Controller as BaseController;


/**
 * @group Team management
 *
 * APIs for managing teams
 */
class TeamController extends BaseController
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
     */
    public function get_teams() {

        $results =  app('db')->table('user_team')
            ->join('users', 'user_team.user_id', '=', 'users.id')
            ->join('teams', 'user_team.team_id', '=', 'teams.id')
            ->select('teams.title as team', 'users.name', 'users.email', 'user_team.owner')
            ->get();

        return response()->json($results);
    }
}