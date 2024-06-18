<?php

namespace Tests\Unit;
use App\Http\Controllers\EmployeeController;
//use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeControllerTest extends TestCase
{  
     //use RefreshDatabase;
  
    /** 
     * @test
     * display all records of employee */
   
    public function it_can_display_employee_index_page()
    {
        $controller = new EmployeeController();
        $response = $controller->index();
        $this->assertEquals('employee.index', $response->getName());
    }
   
    /** 
     * @test
     * display employee create page  */
     
    public function it_can_display_employee_create_page()
    {
        $controller = new EmployeeController();
        $response = $controller->create();
        $this->assertEquals('employee.create', $response->getName());
    }
   

     /** 
     * @test
     * display employee create page  */
     
    public function it_can_display_employee_edit_page()
    {
        $controller = new EmployeeController();
        $response = $controller->edit(1);
        $this->assertEquals('employee.edit', $response->getName());
    }
   
}
