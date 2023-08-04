<?php
class User {

    // User properties
    private $user_id;
    private $name;
    private $email;
    private $profile_picture;
    private $address;
    private $salary;
    private $created_at;
    private $updated_at;

    public function __construct()
    {
    }
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $username
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getProfilePicture()
    {
        return $this->profile_picture;
    }

    /**
     * @param mixed $profile_picture
     */
    public function setProfilePicture($profile_picture): void
    {
        $this->profile_picture = $profile_picture;
    }
    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address): void
    {
        $this->address = $address;
    } public function getSalary()
    {
        return $this->salary;
    }
    public function setSalary($salary): void
    {
        $this->salary = $salary;
    }
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at): void
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param mixed $updated_at
     */
    public function setUpdatedAt($updated_at): void
    {
        $this->updated_at = $updated_at;
    }


}
