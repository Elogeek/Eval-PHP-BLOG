<?php


namespace Model\Manager;

use Model\DB;
use Model\Entity\Role;
use Model\Manager\Traits\ManagerTrait;

/**
 * Class RoleManager
 */
class RoleManager {

    use ManagerTrait;

    /**
     * Return a Role object based on a given role id.
     * @param int $roleId
     * @return Role
     */
    public static function getRole(int $roleId): Role {
        $role = new Role();
        $stmt = DB::getInstance()->prepare("SELECT * FROM Role WHERE id=:i");
        $stmt->bindValue(':i', $roleId);

        if($stmt->execute()) {
            $data = $stmt->fetch();
            // $data is false if request failed.
            if($data !== false) {
                $role->setId($data['id']);
                $role->setName($data['name']);
            }
        }
        return $role;
    }

    /**
     * Return true if the role is deletable ( not the default roles ).
     * @param string $roleName
     * @return bool
     */
    public static function isDeletable(string $roleName): bool {
        return !in_array($roleName, ['admin']);
    }

    /**
     * @param Role $role
     * @return bool
     */
    public static function isEditable(Role $role): bool {
        return self::isDeletable($role->getName());
    }


    /**
     * Return true if user is admin.
     * @param User $user
     * @return bool
     */
    public static function isAdmin(User $user) {
        return $user->getRole()->getId() && $user->getRole()->getName() === 'admin';
    }
}