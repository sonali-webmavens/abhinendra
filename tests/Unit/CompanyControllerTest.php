<?php

namespace Tests\Unit;

use App\Http\Controllers\CompanyController;
//use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyControllerTest extends TestCase
{
    //use RefreshDatabase;

    /** 
     * @test
     * display all records of companies */
    public function it_can_display_company_index_page()
    {
        $controller = new CompanyController();
        $response = $controller->index();
        $this->assertEquals('company.index', $response->getName());
    }
   
    /** 
     * @test
     * display company create page  */
    public function it_can_display_company_create_page()
    {
        $controller = new CompanyController();
        $response = $controller->create();
        $this->assertEquals('company.create', $response->getName());
    }


    /** 
     * @test
     * display company edit page  */
    public function it_can_display_company_edit_page()
    {
        $controller = new CompanyController();
        $response = $controller->edit(1);
        $this->assertEquals('company.edit', $response->getName());
    }


}
