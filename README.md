# Test task

1. php artisan migrate
2. php artisan db:seed --class=EmployeesTableSeeder
3. php artisan db:seed --class=MachinesTableSeeder
4. php artisan db:seed --class=WorkHistorySeeder


GET http://127.0.0.1:8000/employees - Получить список работников

GET http://127.0.0.1:8000/machines - Получить список станков

POST http://127.0.0.1:8000/assign/{employeeId}/{machineId} - Сказать что такой-то работник сейчас начал работать за таким-то станком.

POST http://127.0.0.1:8000/unassign/{employeeId}/{machineId} - Сказать что такой-то работник сейчас закончил работать за таким-то станком.

GET http://127.0.0.1:8000/employee/info/{employeeId} - Получить актуальную информацию по работнику. Т.е. на каких станках он сейчас работает.

GET http://127.0.0.1:8000/machine/info/{machineId} - Получить актуальную информацию по станку. Т.е. какой работник сейчас за ним работает.

GET http://127.0.0.1:8000/employee/history/{employeeId} - Получить историю по работнику. Когда работник начинал и заканчивал работать и на каком станке. Реализовать 
пагинацию. 

GET http://127.0.0.1:8000/machine/history/{machineId} - Получить историю по станку. Когда на станке начинал и заканчивал работать и какой работник.


