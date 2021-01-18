<?php

declare(strict_types=1);

namespace Tests\Database;

use CodeIgniter\Database\ResultInterface;
use stdClass;
use Tests\Support\DatabaseTestCase;
use Tests\Support\Models\ExampleModel;

use function assert;
use function is_object;

class ExampleDatabaseTest extends DatabaseTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        // Extra code to run before each test
    }

    public function testModelFindAll(): void
    {
        $model = new ExampleModel();

        // Get every row created by ExampleSeeder
        $objects = $model->findAll();

        // Make sure the count is as expected
        $this->assertCount(3, $objects);
    }

    public function testSoftDeleteLeavesRow(): void
    {
        $model = new ExampleModel();
        $this->setPrivateProperty($model, 'useSoftDeletes', true);
        $this->setPrivateProperty($model, 'tempUseSoftDeletes', true);

        $object = $model->first();
        assert($object instanceof stdClass);
        $model->delete($object->id);

        // The model should no longer find it
        $objectDeleted = $model->find($object->id);
        $this->assertNull($objectDeleted);

        // ... but it should still be in the database
        $result = $model->builder()->where('id', $object->id)->get();
        assert($result instanceof ResultInterface);
        $resultArray = $result->getResult();

        $this->assertCount(1, $resultArray);
    }
}
