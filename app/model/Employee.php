<?php

class Employee
{
    private int $id;
    private string $name;
    private int $grades;
    private int $age;
    private string $joinDate;

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getId():int
    {
        return $this->id;
    }
    
    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName():string
    {
        return $this->name;
    }

    public function setGrades(int $grades)
    {
        $this->grades = $grades;
    }

    public function getGrades():int
    {
        return $this->grades;
    }

    public function setAge(int $age)
    {
        $this->age = $age;
    }

    public function getAge():int
    {
        return $this->age;
    }

    public function setJoinDate(string $joinDate)
    {
        $this->joinDate = date($joinDate);
    }

    public function getJoinDate():string
    {
        return $this->joinDate;
    }

    public function toArray(): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "grades" => $this->grades,
            "age" => $this->age,
            "join_date" => $this->joinDate
        ];
    }

}