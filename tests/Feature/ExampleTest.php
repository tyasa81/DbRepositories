<?php

// test-laravel-package-isolated/tests/RouteTest.php

use tyasa81\DbRepositories\Tests\TestCase;

// When testing inside of a Laravel installation, the base class would be Tests\TestCase
class ExampleTest extends TestCase
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
}
