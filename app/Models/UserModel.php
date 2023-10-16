<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = [
        'username', 'active', 'first_name', 'last_name', 'avatar'
    ];

    public function getAll()
    {
        $query = $this->builder()
            ->select('users.id,
            users.username,
            users.active,
            users.first_name,
            users.last_name,
            users.avatar,
            auth_groups_users.group,
            auth_identities.secret')
            ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
            ->join('auth_identities', 'auth_identities.user_id = users.id');
        return $query->getWhere(['auth_identities.type' => 'email_password'])->getResultArray();
    }

    public function getByUser($id)
    {
        return $this->builder()->getWhere(['created_by' => $id])->getResultArray();
    }

    public function getUserLogin($id)
    {
        $query = $this->builder()
            ->select('users.id,
            users.username,
            users.active,
            users.first_name,
            users.last_name,
            users.avatar,
            auth_groups_users.group,
            auth_identities.secret')
            ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
            ->join('auth_identities', 'auth_identities.user_id = users.id');
        return $query->getWhere(['users.id' => $id])->getResultArray();
    }
}
