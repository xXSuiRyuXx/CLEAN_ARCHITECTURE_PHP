<?php

class SupplierModel
{
    private $code;
    private $name;
    private $email;
    private $contact;
    private $phone;
    private $direction;
    private $city;
    private $country;
    private $password;
    private $created_at;

    public function __construct(string $code, string $name, string $email, string $contact, string $phone, string $direction, string $city, string $country, string $password, string $created_at = null)
    {
        $code = trim($code);
        $name = trim($name);
        $email = trim($email);
        $contact = trim($contact);
        $phone = trim($phone);
        $direction = trim($direction);
        $city = trim($city);
        $country = trim($country);

        if ($code === null || empty($code)) {
            throw new InvalidArgumentException("El codigo es requerido");
        }

        if ($name === null || empty($name)) {
            throw new InvalidArgumentException("El nombre es requerido");
        }

        if ($email === null || empty($email)) {
            throw new InvalidArgumentException("El email es requerido");
        }

        if ($contact === null || empty($contact)) {
            throw new InvalidArgumentException("El contacto es requerido");
        }

        if ($phone === null || empty($phone)) {
            throw new InvalidArgumentException("El telefono es requerido");
        }

        if ($direction === null || empty($direction)) {
            throw new InvalidArgumentException("La direccion es requerida");
        }

        if ($city === null || empty($city)) {
            throw new InvalidArgumentException("La ciudad es requerida");
        }

        if ($country === null || empty($country)) {
            throw new InvalidArgumentException("El pais es requerido");
        }

        if ($created_at === null) {
            $now = new DateTime();
            $created_at = $now->format("Y-m-d H:i:s");
        }

        $this->code = $code;
        $this->name = $name;
        $this->email = $email;
        $this->contact = $contact;
        $this->phone = $phone;
        $this->direction = $direction;
        $this->city = $city;
        $this->country = $country;
        $this->password = $password;
        $this->created_at = $created_at;
    }

    public function getCode() : string
    {
        return $this->code;
    }

    public function setCode(string $code)
    {
        $this->code = $code;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getEmail() : string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }
    
    public function getContact() : string
    {
        return $this->contact;
    }

    public function setContact(string $contact)
    {
        $this->contact = $contact;
    }
    
    public function getPhone() : string
    {
        return $this->phone;
    }

    public function setPhone(string $phone)
    {
        $this->phone = $phone;
    }

    public function getDirection() : string
    {
        return $this->direction;
    }

    public function setDirection(string $direction)
    {
        $this->direction = $direction;
    }
    
    public function getCity() : string
    {
        return $this->city;
    }

    public function setCity(string $city)
    {
        $this->city = $city;
    }
    
    public function getCountry() : string
    {
        return $this->country;
    }

    public function setCountry(string $country)
    {
        $this->country = $country;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }
}
