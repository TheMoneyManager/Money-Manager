<?php

namespace Tests\Unit;
namespace App\Library\Classes\Categories;

use PHPUnit\Framework\TestCase;
use App\Library\Classes\Categories;

class CategoriesTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_categories()
    {
        $category = new Categories(3, "Salidas con mi novia");
        $this->assertTrue($category->getUserId() == 3 && $category->getName() == "Salidas con mi novia");
    }
}
