<?php


namespace Model\User;

use PDO;
use Model\DB;
use Model\Entity\User;
use Model\Manager\Traits\ManagerTrait;

require_once 'include.php';

class UserManager {

    use ManagerTrait;

    /**
     * Return one user via son id.
     * @param int $id
     * @return User
     */
    public function getById(int $id): User {
        $user = new User();
        $request = DB::getInstance()->prepare("SELECT id, name FROM user WHERE id = :id");
        $request->bindValue(':id', $id);
        $result = $request->execute();
        if ($result) {
            $user_data = $request->fetch();
            if ($user_data) {
                $user->setId($user_data['id']);
                $user->setPassword('');
                $user->setName($user_data['name']);
            }
        }
        return $user;
    }

    /**
     * Return all users
     * @return array
     */
    public function getUsers(): array {
        $users = [];
        $request = DB::getInstance()->prepare("SELECT * FROM User");
        $request->execute();

        if ($users_response = $request->fetchAll()) {
            foreach ($users_response as $data) {
                $users[] = new User($data['id'], $data['name'], $data['pseudo'], $data['password'], $data['role_fk']);
            }
        }
        return $users;
    }

    /** Add user in the DTB
     * @param User $user
     * @return bool
     */
    public function addUser(User $user) {
        $request = DB::getInstance()->prepare('
            INSERT INTO User(name,pseudo,email,password,role_fk)
                VALUES(:name,:pseudo,:email,:password,:role_fk)
        ');
        $request->bindValue(':name', $user->getTitle());
        $request->bindValue(':pseudo', $user->getPseudo());
        $request->bindValue(':email', $user->getEmail());
        $request->bindValue(':password', $user->getPassword());
        $request->bindValue(':role', $user->getRole());

        return $request->execute() && DB::getInstance()->lastInsertId() != 0;
    }

}

