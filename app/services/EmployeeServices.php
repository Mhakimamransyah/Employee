<?php

class EmployeeServices
{

    private EmployeeRepository $employeeRepository;
    private ?AccountRepository $accountRepository;

    // depedency injections
    function __construct(
        EmployeeRepository $employeeRepository,
        AccountRepository $accountRepository = null
    )
    {
        $this->employeeRepository = $employeeRepository;
        $this->accountRepository = $accountRepository;
    }

    public function getEmployeeById(int $Id) : Employee
    {
        $employee = $this->employeeRepository->getEmployeeById($Id);
        return $employee;
    }

    public function getEmployeeSalary(Employee $employee): float
    {
        $salaryPoint = 100000;

        if ($employee->getAge() >= 30){
            $salaryPoint = 1000000;
        }

        return (float) ($employee->getAge() * $salaryPoint) * $employee->getGrades();
    }

    public function sendMessageToEmployee(NotificationServices $notificationService, Employee $employee): void
    {
        $isEmployeeAccountActive = $this->accountRepository->isActiveAccount($employee->getId());
        if ($isEmployeeAccountActive) {
            $notificationService->sendEmail($employee);
            $this->employeeRepository->updateEmployeeData($employee);
        }
    }

    public function getYearOfService(Employee $employee): int
    {
        $date1 = new DateTime($employee->getJoinDate());
        $date2 = new DateTime('now');

        $interval = $date1->diff($date2);

        return $interval->y;
    }
}