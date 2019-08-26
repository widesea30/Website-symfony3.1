<?php

namespace AdminBundle\Repository;

use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\Query;
use Symfony\Bundle\FrameworkBundle\Routing\Router;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends \Doctrine\ORM\EntityRepository
{
    public function getUsers(Router $router)
    {
        $query = $this->createQueryBuilder('u');

        $query->select('u')
            ->orderBy('u.id', Criteria::DESC);

        $usersArray = $query->getQuery()->getResult(Query::HYDRATE_ARRAY);

        $result = [];
echo "<script>";
        foreach ($usersArray as $user) {
            $rolesString = 'User';

            foreach ($user['roles'] as $role) {
                if ($role == 'ROLE_ADMIN') {
                    $rolesString = 'Admin';
                }
                elseif ($role == 'ROLE_SUPERADMIN') {
                    $rolesString = 'SuperAdmin';
                }
            }
            $result[] = [
                'userId' => $user['id'],
                'username' => $user['username'],
                'email' => $user['email'],
                'enabled' => $user['enabled'],
                'roles' => $rolesString,
                'gdpr' => ($user['gdpr'] == 0) ? "No": "Yes",
                'admin_user_lock' => $router->generate(
                    'admin_user_lock',
                    ['id' => $user['id']],
                    Router::ABSOLUTE_PATH
                ),
                'admin_user_unlock' => $router->generate(
                    'admin_user_unlock',
                    ['id' => $user['id']],
                    Router::ABSOLUTE_PATH
                ),
                'admin_user_spromote' => $router->generate(
                    'admin_user_spromote',
                    ['id' => $user['id']],
                    Router::ABSOLUTE_PATH
                ),
                'admin_user_promote' => $router->generate(
                    'admin_user_promote',
                    ['id' => $user['id']],
                    Router::ABSOLUTE_PATH
                ),
                'admin_user_depromote' => $router->generate(
                    'admin_user_depromote',
                    ['id' => $user['id']],
                    Router::ABSOLUTE_PATH
                ),
                'admin_user_edit' => $router->generate(
                    'admin_user_edit',
                    ['id' => $user['id']],
                    Router::ABSOLUTE_PATH
                ),
                'admin_user_delete' => $router->generate(
                    'admin_user_delete',
                    ['id' => $user['id']],
                    Router::ABSOLUTE_PATH
                ),
            ];
        }
	    echo "</script>";
        return $result;
    }



    public function getUsersLow(Router $router)
    {
        $query = $this->createQueryBuilder('u');

        $query->select('u')
            ->orderBy('u.id', Criteria::DESC);

        $usersArray = $query->getQuery()->getResult(Query::HYDRATE_ARRAY);

        $result = [];

        foreach ($usersArray as $user) {
            $rolesString = 'User';

            foreach ($user['roles'] as $role) {
                if ($role == 'ROLE_ADMIN') {
                    $rolesString = 'Admin';
                }
                elseif ($role == 'ROLE_SUPERADMIN') {
                    $rolesString = 'SuperAdmin';
                }
            }
            $result[] = [
                'userId' => $user['id'],
                'username' => $user['username'],
                'email' => $user['email'],
                'enabled' => $user['enabled'],
                'roles' => $rolesString,
                'gdpr' => ($user['gdpr'] == 0) ? "No": "Yes",
                'admin_user_lock' => $router->generate(
                    'admin_user_lock',
                    ['id' => $user['id']],
                    Router::ABSOLUTE_PATH
                ),
                'admin_user_unlock' => $router->generate(
                    'admin_user_unlock',
                    ['id' => $user['id']],
                    Router::ABSOLUTE_PATH
                ),
                'admin_user_spromote' => $router->generate(
                    'admin_user_spromote',
                    ['id' => $user['id']],
                    Router::ABSOLUTE_PATH
                ),
                'admin_user_promote' => $router->generate(
                    'admin_user_promote',
                    ['id' => $user['id']],
                    Router::ABSOLUTE_PATH
                ),
                'admin_user_depromote' => $router->generate(
                    'admin_user_depromote',
                    ['id' => $user['id']],
                    Router::ABSOLUTE_PATH
                ),
                'admin_user_edit' => $router->generate(
                    'admin_user_edit',
                    ['id' => $user['id']],
                    Router::ABSOLUTE_PATH
                ),
                'admin_user_delete' => $router->generate(
                    'admin_user_delete',
                    ['id' => $user['id']],
                    Router::ABSOLUTE_PATH
                ),
            ];
        }

        return $result;
    }
}
