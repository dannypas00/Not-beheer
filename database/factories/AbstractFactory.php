<?php

namespace Database\Factories;

use Nette\NotImplementedException;

class AbstractFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{
    public function createTestModel()
    {
        throw new NotImplementedException();
    }

    /**
     * @inheritDoc
     */
    public function definition()
    {
        // TODO: Implement definition() method.
    }
}
