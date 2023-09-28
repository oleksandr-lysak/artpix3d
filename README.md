# Test task

1. php artisan migrate
2. php artisan db:seed --class=EmployeesTableSeeder
3. php artisan db:seed --class=MachinesTableSeeder
4. php artisan db:seed --class=WorkHistorySeeder


GET http://127.0.0.1:8000/employees - get list of emloyees

GET http://127.0.0.1:8000/machines - get list of machines

POST http://127.0.0.1:8000/assign/{employeeId}/{machineId} - Assign an employee to the machine.

POST http://127.0.0.1:8000/unassign/{employeeId}/{machineId} - The employee finished work at the machine.

GET http://127.0.0.1:8000/employee/info/{employeeId} - Get current information on the employee. That is, what machines is he working on now.

GET http://127.0.0.1:8000/machine/info/{machineId} - Get current information on the machine. That is, what employee is working at the machine now.

GET http://127.0.0.1:8000/employee/history/{employeeId} - Get the history of the employee. When did the worker start and finish work and on which machine. 

GET http://127.0.0.1:8000/machine/history/{machineId} - Get a story on the machine. When and what kind of employee started and finished working on the machine.


## TASK
Create an application that will store and provide information about what machine the employee is working on or previously worked on.

** Initial data: **
There are employees:
* Andrey
* Sergey
* Mikhail
* Stas
* Artem
* Tatiana
* Yevgeny
* Katya
* Boris
There are machines
* 44
* 56
* 23
* 78 
* 102

It is necessary to implement a REST API that will provide the following opportunities:
* Get a list of employees
* Get a list of machines
* To say that such and such a worker now began to work at such and such a machine. That. temporarily tie the worker to the machine. Implement the restriction that only one worker can work on the machine at the same time. But one worker can simultaneously work on several machines.
* To say that such and such a worker has now finished working at such and such a machine. That. delete the temporary connection of the worker with the machine.
* Get current information on the employee. That. what machines is he working on now?
* Get current information on the machine. That. what employee is working for him now?
* Get the history of the employee. When did the worker start and finish work and on which machine. Implement pagination.
* Get a story on the machine. When and what kind of worker started and finished working on the machine.

Technology requirements:
* Laravel or Lumen PHP framework
* DBMS MySQL

Provide the code via GitHub or Bitbucket
