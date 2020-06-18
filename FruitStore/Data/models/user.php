<?php

class user
{
    private $firstname;
    private $middleInitial;
    private $lastname;
    private $username;
    private $password;
    private $email;
    private $isAdmin;
    
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function getMiddleInitial()
    {
        return $this->middleInitial;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    public function setMiddleInitial($middleInitial)
    {
        $this->middleInitial = $middleInitial;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function __construct($newFirstname, $newMiddleInitial, $newLastname, $newUsername, $newPassword, $newEmail, $newIsAdmin) {
        $this->firstname = $newFirstname;
        $this->middleInitial = $newMiddleInitial;
        $this->lastname = $newLastname;
        $this->username = $newUsername;
        $this->password = $newPassword;
        $this->email = $newEmail;
        $this->isAdmin = $newIsAdmin;
    }
    
}

