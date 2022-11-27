<?php declare(strict_types=1);

require_once "app/services/EmployeeServices.php";
require_once "app/services/NotificationServices.php";
require_once "app/repository/EmployeeRepository.php";
require_once "app/repository/AccountRepository.php";
require_once "app/model/Employee.php";

use PHPUnit\Framework\TestCase;

class EmployeeServicesTest extends TestCase
{
    /**
     * @test
     * @dataProvider employeeAdditionProvider
     */
    public function testGetEmployeeById( Employee $employee )
    {
        $employeeRepository = $this->createMock(EmployeeRepository::class);

        $employeeRepository->method("getEmployeeById")->willReturn($employee);

        $services = new EmployeeServices($employeeRepository);

        $employeeResult = $services->getEmployeeById($employee->getId());

        $this->assertEquals($employee, $employeeResult, "Get employee data by id");
    }

    /**
     * @test
     * @dataProvider employeeAdditionProvider
     */
    public function testGetEmployeeSalary( Employee $employee, float $expectedSalary)
    {
        $employeeRepository = $this->createMock(EmployeeRepository::class);

        $services = $services = new EmployeeServices($employeeRepository);

        $this->assertSame($expectedSalary, $services->getEmployeeSalary($employee), "Get employee salary");

    }

    /**
     * @test
     * @dataProvider employeeAdditionProvider
     */
    public function testGetYearOfService( Employee $employee, float $expectedSalary, int $yearsOfServices)
    {

        $employeeRepository = $this->createMock(EmployeeRepository::class);

        $services = new EmployeeServices($employeeRepository);

        $this->assertSame($yearsOfServices, $services->getYearOfService($employee), "Get employee years of services");

    }

    /**
     * @test
     * @dataProvider employeeAdditionProvider
     */
    public function testSendMessageToEmployee( Employee $employee )
    {
        $employeeRepository = $this->createMock(EmployeeRepository::class);
        $employeeRepository->method("getEmployeeById")->willReturn($employee);

        $accountRepository = $this->createMock(AccountRepository::class);
        $accountRepository->method("isActiveAccount")->willReturn(true);

        $notificationServices = $this->createMock(NotificationServices::class);

        $services   = new EmployeeServices($employeeRepository,$accountRepository);

        $this->assertNull($services->sendMessageToEmployee($notificationServices,$employee),"Send email to employee");

    }

    /**
     * provide employee data for testing
     */
    public function employeeAdditionProvider():array
    {
        $employee1 = new Employee();
        $employee1->setId(10);
        $employee1->setName("Sandro Tonali");
        $employee1->setAge(25);
        $employee1->setGrades(3);
        $employee1->setJoinDate("2012-10-01");
        $salaryEmployee1 = 7500000;
        $yearsOfServicesEmployee1 = 10;

        $testSuitesEmployee1 = [ $employee1, $salaryEmployee1, $yearsOfServicesEmployee1 ];

        $employee2 = new Employee();
        $employee2->setId(11);
        $employee2->setName("Kevin De Bruyne");
        $employee2->setAge(31);
        $employee2->setGrades(8);
        $employee2->setJoinDate("2002-10-01");
        $salaryEmployee2 = 248000000;
        $yearsOfServicesEmployee2 = 20;

        $testSuitesEmployee2 = [ $employee2, $salaryEmployee2, $yearsOfServicesEmployee2 ];

        return [
            $testSuitesEmployee1,
            $testSuitesEmployee2
        ];
    }

}

