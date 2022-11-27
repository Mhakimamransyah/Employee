<?php

require_once "app/services/EmployeeServices.php";
require_once "app/services/NotificationServices.php";

require_once "app/repository/EmployeeRepository.php";
require_once "app/repository/AccountRepository.php";

class EmployeeController
{

    public function getById(int $Id)
    {
        $employeeServices = new EmployeeServices( new EmployeeRepository() );
        echo json_encode($employeeServices->getEmployeeById($Id)->toArray());
    }

    public function sendEmail(int $Id, string $message)
    {
        $notificationServices = new NotificationServices($message);

        $employeeServices = new EmployeeServices(
            new EmployeeRepository(),
            new AccountRepository()
        );

        $employee = $employeeServices->getEmployeeById($Id);
        $employeeServices->sendMessageToEmployee($notificationServices, $employee);

        echo json_encode(["data" => $employee->toArray(), "messages" => $message]);
    }

    public function getEmployeeSalary(int $id){
        $employeeServices = new EmployeeServices( new EmployeeRepository() );
        $employee = $employeeServices->getEmployeeById($id);
        echo json_encode([
            "salary" => $employeeServices->getEmployeeSalary($employee)
        ]);
    }

    public function getEmployeeYearsOfService(int $id){
        $employeeServices = new EmployeeServices( new EmployeeRepository() );
        $employee = $employeeServices->getEmployeeById($id);
        echo json_encode([
            "years_of_services" => $employeeServices->getYearOfService($employee)
        ]);
    }

}