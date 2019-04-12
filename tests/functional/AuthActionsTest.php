<?php

use App\Models\User;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class AuthActionsTest extends TestCase
{

    private $json = [
        'email' => 'iskiles@will.net',
        'password' => '12345',
    ];

    private $jsonfake = [
        'email' => 'iskiles@will.net2',
        'password' => '12345',
    ];

    private $jsonfake2 = [
        'email' => 'iskiles@will.net',
        'password' => '123456',
    ];


    public function testAuth()
    {
        $user = User::where('id', 1)->first();
        $this->json['email'] = $user->email;

        $this->post('/auth/login',
            $this->json
        );

        $this->assertEquals(200, $this->response->status());

        $data = json_decode($this->response->getContent(),true);
        $this->assertTrue(is_array($data), "Response can not be empty");
        $this->assertTrue(isset($data['token']));

    }

    public function testAuthFake()
    {
        $this->post('/auth/login',
            $this->jsonfake2
        );

        $this->assertEquals(400, $this->response->status());
        $data = json_decode($this->response->getContent(),true);

        $this->assertTrue(isset($data['error']));
    }
}