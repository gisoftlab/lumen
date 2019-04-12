<?php

namespace Api\Users\Services;

use Api\Users\Models\User;
use Illuminate\Auth\AuthManager;
use Illuminate\Database\DatabaseManager;
use Illuminate\Events\Dispatcher;
use Api\Users\Exceptions\UserNotFoundException;
use Api\Users\Events\UserWasCreated;
use Api\Users\Events\UserWasDeleted;
use Api\Users\Events\UserWasUpdated;
use Api\Users\Repositories\UserRepository;

class UserService
{
    /**
     * @var AuthManager
     */
    private $auth;

    /**
     * @var DatabaseManager
     */
    private $database;

    /**
     * @var Dispatcher
     */
    private $dispatcher;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * UserService constructor.
     * @param AuthManager $auth
     * @param DatabaseManager $database
     * @param Dispatcher $dispatcher
     * @param UserRepository $userRepository
     */
    public function __construct(
        AuthManager $auth,
        DatabaseManager $database,
        Dispatcher $dispatcher,
        UserRepository $userRepository
    ) {
        $this->auth = $auth;
        $this->database = $database;
        $this->dispatcher = $dispatcher;
        $this->userRepository = $userRepository;
    }

    /**
     * getAll
     * @param array $options
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll($options = [])
    {
        return $this->userRepository->get($options);
    }

    /**
     * getById
     * @param $userId
     * @return User
     */
    public function getById($userId)
    {
        $user = $this->getRequestedUser($userId);

        return $user;
    }

    /**
     * create
     * @param $data
     * @return User
     */
    public function create($data)
    {
        $user = $this->userRepository->create($data);

        $this->dispatcher->fire(new UserWasCreated($user));

        return $user;
    }

    /**
     * update
     * @param $userId
     * @param array $data
     * @return User
     */
    public function update($userId, array $data)
    {
        $user = $this->getRequestedUser($userId);

        $this->userRepository->update($user, $data);

        $this->dispatcher->fire(new UserWasUpdated($user));

        return $user;
    }

    /**
     * delete
     * @param $userId
     */
    public function delete($userId)
    {
        $user = $this->getRequestedUser($userId);

        $this->userRepository->delete($userId);

        $this->dispatcher->fire(new UserWasDeleted($user));
    }

    /**
     * getRequestedUser
     * @param $userId
     * @return User
     */
    private function getRequestedUser($userId)
    {
        /**
         * @var User $user
         */
        $user = $this->userRepository->getById($userId);

        if (is_null($user)) {
            throw new UserNotFoundException();
        }

        return $user;
    }
}
