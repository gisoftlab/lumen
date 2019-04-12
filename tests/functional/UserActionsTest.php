<?php

use App\Models\User;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class UserActionsTest extends TestCase
{

    private $login = [
        'email' => 'iskiles@will.net',
        'password' => '12345',
    ];

    private function getToken(){

        $user = User::where('id', 1)->first();
        $this->login['email'] = $user->email;

        $this->post('/auth/login',
            $this->login
        );

        $data = json_decode($this->response->getContent(),true);

        return isset($data['token'])?$data['token']:null;
    }

    public function testUsersGet()
    {
        $token = $this->getToken();

        $this->get('/users', [
            'Content-Type' => 'application/json',
            'token' => $token,
        ]);

        $this->assertEquals(200, $this->response->status());

        $data = json_decode($this->response->getContent(),true);
        $this->assertTrue(is_array($data), "Response can not be empty");
    }
}