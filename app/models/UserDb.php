<?php

namespace app\models;

class UserDb
{
    public string $name = 'John';

    public string $lastName = 'Smith';
    public  string $email = 'john@gmail.com';

    /**
     * password is 123456
     * @var string password_hash(123456, PASSWORD_DEFAULT)
     */
    public string $password = '$2y$10$nlxOTwVT9OcF.ls8/v.6yuzQI2t/ZiIrP/NCVm5KKrOaQnoVeTiZO';
    public int $userId = 2;


}