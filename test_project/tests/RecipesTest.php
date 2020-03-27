<?php

use PHPUnit\Framework\TestCase;

class RecipesTest extends TestCase
{
    /** @test */
    function canBeCreatedWithEmptyTitle()
    {
        $recipe = new Recipe();
        $this->assertInstanceOf('Recipe', $recipe);
        $this->assertEquals(
            '',
            $recipe->getTitle()
        );
    }
    /** @test */
    function ingredientMustEnterValidMeasurement()
    {
        $this->expectExceptionMessage("Please enter a valid measurement: tsp, tbsp, cup, oz, lb, fl oz, pint, quart, gallon");
        $recipe = new Recipe("Recipe Title");
        $recipe->addIngredient("garlic", 2, 'tbl');
    }
    /** @test */
    function ingredientMustEnterValidAmount()
    {
        $this->expectException(InvalidArgumentException::class);
        //$this->expectExceptionMessageRegExp('/^The amount must be a float/');
        $recipe = new Recipe("Recipe Title");
        $recipe->addIngredient("garlic", "two", 'tbl');
    }
    /** @test */
    function canCallRecipeDirectly()
    {
        $recipe = new Recipe("Recipe Title");
        $this->assertStringContainsString(
            'The following methods are available',
            $recipe
        );
    }

    /** @test */
    function canAddIngredientWithoutMeasurements()
    {
        $recipe = new Recipe("Recipe Title");
        $recipe->addIngredient("chicken");
        $ing = $recipe->getIngredients();
        $this->assertCount(
            1,
            $ing
        );
    }
    /** @test */
    function ingredientIsTitleCase()
    {
        $recipe = new Recipe("Recipe Title");
        $recipe->addIngredient("chicken");
        $ing = $recipe->getIngredients();
        $this->assertEquals(
            "Chicken",
            $ing[0]['item']
        );
    }
}