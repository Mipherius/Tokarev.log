<?php
namespace src\models;


class User extends ActiveRecordEntity{
    protected $Nickname;
    protected $email;
    protected $IsConfirmed;
    protected $Role;
    protected $password_hash;
    protected $auth_token;
    protected $created_at;

    protected static function getTableName(): string{
        return 'users';
    }
    public function getNickname(): string{
        return $this->Nickname;
    }
    public function getIsConfirmed(): int{
        return $this->IsConfirmed;
    }
    public function getRole(): string{
        return $this->Role;
    }
    public function getCreatedAt(){

        return $this->created_at;
    }


}
