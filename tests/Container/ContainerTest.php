<?php

use Oxgit\Oxgit;

require_once __DIR__ . '/../WpOxgitTestCase.php';

class ContainerTest extends WpOxgitTestCase
{
    /**
     * @var Oxgit
     */
    private $oxgit;

    public function setUp()
    {
        $this->oxgit = new Oxgit;
    }

    /**
     * @test
     */
    public function it_is_a_container()
    {
        $this->assertInstanceOf('Oxgit\Container', $this->oxgit);
    }

    /**
     * @test
     */
    public function it_can_resolve_a_class_with_no_dependencies()
    {
        $db = $this->oxgit->make('DB');

        $this->assertInstanceOf('DB', $db);
    }

    /**
     * @test
     */
    public function it_can_resolve_a_class_with_nested_dependencies()
    {
        $manager = $this->oxgit->make('UserManager');

        $this->assertInstanceOf('UserManager', $manager);
    }

    /**
     * @test
     */
    public function it_can_bind_an_alias()
    {
        $this->oxgit->bind('UserRepository', 'DBUserRepository');

        $repository = $this->oxgit->make('UserRepository');

        $this->assertInstanceOf('DBUserRepository', $repository);
    }

    /**
     * @test
     */
    public function it_can_bind_a_closure()
    {
        $closure = function(Oxgit $oxgit) {
            return new DB;
        };

        $this->oxgit->bind('DB', $closure);

        $db = $this->oxgit->make('DB');

        $this->assertInstanceOf('DB', $db);
    }

    /**
     * @test
     */
    public function it_can_bind_an_instance()
    {
        $dbInstance = new DB;

        $this->oxgit->bind('DB', $dbInstance);

        $db = $this->oxgit->make('DB');

        $this->assertInstanceOf('DB', $db);
    }

    /**
     * @test
     */
    public function it_can_bind_a_singleton()
    {
        $this->oxgit->singleton('obj', 'StdClass');

        $this->assertSame(
            $this->oxgit->make('obj'),
            $this->oxgit->make('obj')
        );
    }
}

// Fixtures:
class DB {
    // Class with no dependencies
}

class EntityMapper {
    // Class with no dependencies
}

interface UserRepository {}

class DBUserRepository {
    public function __construct(DB $db, EntityMapper $em)
    {
        // Constructor stuff
    }
}

class UserManager {
    public function __construct(DBUserRepository $users)
    {
        // Constructor stuff
    }
}
