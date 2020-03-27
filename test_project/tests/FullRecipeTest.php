<?php

use PHPUnit\Framework\TestCase;

class FullRecipeTest extends TestCase
{
    protected $recipe;

    protected function setUp(): void
    {
        $this->recipe = new Recipe("Belgian Waffles");

        $this->recipe->addIngredient("Egg", 2);
        $this->recipe->addIngredient("Butter", 1, "Cup");
        $this->recipe->addIngredient("sugar", .5, "Cup");
        $this->recipe->addIngredient("milk", 1.5, "cup");
        $this->recipe->addIngredient("vanilla", 2, "tsp");
        $this->recipe->addIngredient("flour", 2, "cup");
        $this->recipe->addIngredient("baking powder", 1, "tbsp");

        $this->recipe->addInstruction("Separate eggs. Whip egg whites until stiff peaks form. Set asside.");
        $this->recipe->addInstruction("Melt butter, and combine with sugar. Add egg yokes and mix well.");
        $this->recipe->addInstruction("Add milk and vanilla and mix well.");
        $this->recipe->addInstruction("Add flour and sugar until just combined. ");
        $this->recipe->addInstruction("Fold in egg whites.");
        $this->recipe->addInstruction("Follow instructions on waffle maker or add .5 cup of batter to waffle iron and cook for 4 minutes.");

        $this->recipe->setYield("10 waffles");
        $this->recipe->setSource("Alena Holligan");
        $this->recipe->addTag("breakfast, quick bread");
    }
    /** @test */
    function hasTitle()
    {
        $this->assertEquals(
            "Belgian Waffles",
            $this->recipe->getTitle()
        );
    }
    /** @test */
    function hasAllIngredients()
    {
        $this->assertCount(
            7,
            $this->recipe->getIngredients()
        );
    }
    /** @test */
    function hasAllInstructions()
    {
        $this->assertCount(
            6,
            $this->recipe->getInstructions()
        );
    }
    /** @test */
    function hasYield()
    {
        $this->assertEquals(
            "10 waffles",
            $this->recipe->getYield()
        );
    }
    /** @test */
    function hasSource()
    {
        $this->assertEquals(
            "Alena Holligan",
            $this->recipe->getSource()
        );
    }
    /** @test */
    function hasTags()
    {
        $this->assertCount(
            2,
            $this->recipe->getTags()
        );
        $this->assertEquals(
            ["breakfast", "quick bread"],
            $this->recipe->getTags()
        );
    }
}