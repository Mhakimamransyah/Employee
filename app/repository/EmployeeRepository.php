<?php

require_once "app/model/Employee.php";

class EmployeeRepository
{
    /**
     * Mock database results set
     */
    public function getEmployeeById(int $Id) : Employee
    {
        $employee = new Employee();
        $employee->setId($Id);
        $employee->setName("Beto Goncalves");
        $employee->setAge(35);
        $employee->setGrades(5);
        $employee->setJoinDate("2002-10-01");

        return $employee;
    }

    /**
     * Mock databases operations
     */
    public function updateEmployeeData(Employee $employee) : bool
    {
        sleep(3);
        return true;
    }
}