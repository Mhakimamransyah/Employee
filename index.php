<?php

require_once "app/controller/EmployeeController.php";

$call = new EmployeeController();

// call api get employee by id
$call->getById(12);

// call api send employee greeting by email
//$call->sendEmail(12,"Hallo there");

// call api get employee salary by id
//$call->getEmployeeSalary(12);

// call api get employee years of services by id
//$call->getEmployeeYearsOfService(12);