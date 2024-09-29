<?php

// test-laravel-package-isolated/tests/RouteTest.php
use tyasa81\DbRepositories\Repositories\UserRepository;

// When testing inside of a Laravel installation, the base class would be Tests\TestCase
class UserRepositoryTest extends Orchestra\Testbench\TestCase
{
    // Use annotation @test so that PHPUnit knows about the test
    /** @test */
    public function true_is_true_test()
    {
        $true = true;
        $this->assertEquals(true, $true);
        // Visit /test and see "Test Laravel package isolated" on it
        // $response = $this->get('test');
        // $response->assertStatus(200);
        // $response->assertSee('Test Laravel package isolated');
    }

    public function test_user_repository()
    {
        $repo = new UserRepository;
        $user = $repo->first([
            ['id', 1],
        ]);
        echo "IN!\n";
        $this->assertEquals(1, $user['id']);
        // Visit /test and see "Test Laravel package isolated" on it
        // $response = $this->get('test');
        // $response->assertStatus(200);
        // $response->assertSee('Test Laravel package isolated');
    }

    // When testing inside of a Laravel installation, this is not needed
    protected function getPackageProviders($app)
    {
        return [
            'tyasa81\DbRepositories\DbRepositoriesServiceProvider',
        ];
    }

    // When testing inside of a Laravel installation, this is not needed
    protected function setUp(): void
    {
        parent::setUp();
    }
}
