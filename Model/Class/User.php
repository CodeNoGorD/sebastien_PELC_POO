<?php
class User
{
    private int $user_id;
    private string $user_name;
    private string $user_lastname;
    private string $user_firstname;
    private string $user_password;

    /**
     * @param int $user_id
     * @param string $user_name
     * @param string $user_lastname
     * @param string $user_firstname
     * @param string $user_password
     */
    public function __construct(int $user_id, string $user_name, string $user_lastname, string $user_firstname, string $user_password)
    {
        $this->user_id = $user_id;
        $this->user_name = $user_name;
        $this->user_lastname = $user_lastname;
        $this->user_firstname = $user_firstname;
        $this->user_password = $user_password;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     */
    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->user_name;
    }

    /**
     * @param string $user_name
     */
    public function setUserName(string $user_name): void
    {
        $this->user_name = $user_name;
    }

    /**
     * @return string
     */
    public function getUserLastname(): string
    {
        return $this->user_lastname;
    }

    /**
     * @param string $user_lastname
     */
    public function setUserLastname(string $user_lastname): void
    {
        $this->user_lastname = $user_lastname;
    }

    /**
     * @return string
     */
    public function getUserFirstname(): string
    {
        return $this->user_firstname;
    }

    /**
     * @param string $user_firstname
     */
    public function setUserFirstname(string $user_firstname): void
    {
        $this->user_firstname = $user_firstname;
    }

    /**
     * @return string
     */
    public function getUserPassword(): string
    {
        return $this->user_password;
    }

    /**
     * @param string $user_password
     */
    public function setUserPassword(string $user_password): void
    {
        $this->user_password = $user_password;
    }
}