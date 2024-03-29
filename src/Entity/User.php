<?php

namespace App\Entity;

use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface, \Serializable
{
    public const USER_ROLE_LECTURER = 'ROLE_LECTURER';
    public const USER_ROLE_ADMIN = 'ROLE_ADMIN';

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string|null
     */
    private $phone;

    /**
     * @var Lecturer|null
     */
    private $lecturer;

    /**
     * @var string|null
     */
    private $password;

    /**
     * @var array
     */
    private $roles;

    public function __construct()
    {
        $this->roles = ['ROLE_LECTURER'];
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getLecturer(): ?Lecturer
    {
        return $this->lecturer;
    }

    public function setLecturer(Lecturer $lecturer)
    {
        $this->lecturer = $lecturer;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone)
    {
        $this->phone = $phone;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password)
    {
        $this->password = $password;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function addRole(string $role)
    {
        $this->roles[] = $role;
    }

    public function removeRole($role)
    {
        $this->roles = array_diff($this->roles, [$role]);
    }

    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {
    }

    public function serialize(): ?string
    {
        return serialize([
            $this->id,
            $this->username,
            $this->password,
        ]);
    }

    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            ) = unserialize($serialized, ['allowed_classes' => false]);
    }

    public function __toString()
    {
        return $this->username;
    }
}
