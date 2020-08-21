<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Model\Category;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function testSaveCategory()
    {
        $category =  new Category();
        $category->name = "title de test";
        $category->slug = str_slug($category->name);
        $category->save();
        $this->assertDatabaseHas('categories',[
            'name' => "title de test"
        ]);
    }

    public function testAddCategory(){

        $data = [
            "name" => "title de test",
            "slug" => str_slug("title de test")
        ];

        $this->post("/api/category",$data)
            ->assertStatus(400);


    }
}
