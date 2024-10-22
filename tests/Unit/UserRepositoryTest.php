<?php

// test-laravel-package-isolated/tests/RouteTest.php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use tyasa81\DbRepositories\Tests\Repositories\UserRepository;
use tyasa81\DbRepositories\Tests\TestCase;
use Workbench\App\Models\User;

// When testing inside of a Laravel installation, the base class would be Tests\TestCase
class UserRepositoryTest extends TestCase
{
    use DatabaseTransactions;

    protected $userRepository;

    public function setUp(): void
    {
        parent::setUp();
        $this->userRepository = new UserRepository;
    }

    // Use annotation @test so that PHPUnit knows about the test
    /** @test */
    public function true_is_true_test()
    {
        $true = true;
        $this->assertEquals(true, $true);
    }

    public function test_user_repository()
    {
        $user = User::create([
            'email' => 'test@gmail.com',
            'password' => Hash::make('12345678'),
            'name' => 'Test',
        ]);
        $user = $this->userRepository->first([
            ['id', $user['id']],
        ]);
        $this->assertEquals([
            'id' => 1,
            'email' => 'test@gmail.com',
            'name' => 'Test',
        ], [
            'id' => $user['id'],
            'email' => $user['email'],
            'name' => $user['name'],
        ]);
    }

    public function test_user_repository_count()
    {
        $user = User::create([
            'email' => 'test@gmail.com',
            'password' => Hash::make('12345678'),
            'name' => 'Test',
        ]);
        $user2 = User::create([
            'email' => 'test2@gmail.com',
            'password' => Hash::make('12345678'),
            'name' => 'Test2',
        ]);
        $count = $this->userRepository->count(wheres: [
            ['name', 'LIKE', 'TEST%'],
        ]);
        $this->assertEquals(2, $count);
    }

    public function test_user_repository_whereNull()
    {
        $user = User::create([
            'email' => 'test@gmail.com',
            'password' => Hash::make('12345678'),
            'name' => 'Test',
        ]);
        $user2 = User::create([
            'email' => 'test2@gmail.com',
            'password' => Hash::make('12345678'),
            'name' => 'Test2',
        ]);
        $count = $this->userRepository->count(wheres: [
            ['name', 'LIKE', 'TEST%'],
        ], whereNulls: ['email_verified_at']);
        $this->assertEquals(2, $count);
        $count = $this->userRepository->count(wheres: [
            ['name', 'LIKE', 'TEST%'],
        ], whereNotNulls: ['email_verified_at']);
        $this->assertEquals(0, $count);
    }

    public function test_user_repository_get()
    {
        $user = User::create([
            'email' => 'test@gmail.com',
            'password' => Hash::make('12345678'),
            'name' => 'Test',
        ]);
        $user2 = User::create([
            'email' => 'test2@gmail.com',
            'password' => Hash::make('12345678'),
            'name' => 'Test2',
        ]);
        $users = $this->userRepository->get(wheres: [
            ['name', 'LIKE', 'TEST%'],
        ]);
        $this->assertEquals(2, count($users));
    }

    public function test_user_repository_groupBys()
    {
        $user = User::create([
            'email' => 'test@gmail.com',
            'password' => Hash::make('12345678'),
            'name' => 'Test',
        ]);
        $user2 = User::create([
            'email' => 'test2@gmail.com',
            'password' => Hash::make('12345678'),
            'name' => 'Test2',
        ]);
        $user2 = User::create([
            'email' => 'test3@gmail.com',
            'password' => Hash::make('12345678'),
            'name' => 'Test2',
        ]);
        $users = $this->userRepository->get(groupBys: [
            'name',
        ], selects: ['name', DB::raw('count(*) as count')]);
        $this->assertEquals(2, count($users));
        foreach ($users as $user) {
            if ($user['name'] == 'Test2') {
                $this->assertEquals(2, $user['count']);
            } else {
                $this->assertEquals(1, $user['count']);
            }
        }
    }

    public function test_user_repository_sum()
    {
        $user = User::create([
            'email' => 'test@gmail.com',
            'password' => Hash::make('12345678'),
            'name' => 'Test',
        ]);
        $user2 = User::create([
            'email' => 'test2@gmail.com',
            'password' => Hash::make('12345678'),
            'name' => 'Test2',
        ]);
        $sum = $this->userRepository->sum(wheres: [
            ['name', 'LIKE', 'TEST%'],
        ], columnName: 'id');
        $this->assertEquals($user['id'] + $user2['id'], $sum);
    }

    public function test_user_repository_updateMany()
    {
        $user = User::create([
            'email' => 'test@gmail.com',
            'password' => Hash::make('12345678'),
            'name' => 'Test',
        ]);
        $user2 = User::create([
            'email' => 'test2@gmail.com',
            'password' => Hash::make('12345678'),
            'name' => 'Test2',
        ]);
        $updatecount = $this->userRepository->updateMany(wheres: [
            ['name', 'LIKE', 'TEST%'],
        ], updates: [
            'name' => 'CHANGED',
        ]);
        $users = $this->userRepository->get(wheres: [
            ['name', 'LIKE', 'CHANGED'],
        ]);
        $this->assertEquals(2, count($users));
    }

    public function test_user_repository_deleteMany()
    {
        $user = User::create([
            'email' => 'test@gmail.com',
            'password' => Hash::make('12345678'),
            'name' => 'Test',
        ]);
        $user2 = User::create([
            'email' => 'test2@gmail.com',
            'password' => Hash::make('12345678'),
            'name' => 'Test2',
        ]);
        $user2 = User::create([
            'email' => 'test3@gmail.com',
            'password' => Hash::make('12345678'),
            'name' => 'Survivor1',
        ]);
        $delete_count = $this->userRepository->deleteMany(wheres: [
            ['name', 'LIKE', 'TEST%'],
        ]);
        $this->assertEquals(2, $delete_count);
        $users = $this->userRepository->get(wheres: [
            ['name', 'LIKE', 'Survivor%'],
        ]);
        $this->assertEquals(1, count($users));
        $users = $this->userRepository->get(wheres: [
            ['name', 'LIKE', 'Test%'],
        ]);
        $this->assertEquals(0, count($users));
    }

    public function test_user_repository_chunk()
    {
        $user = User::create([
            'email' => 'test@gmail.com',
            'password' => Hash::make('12345678'),
            'name' => 'Test',
        ]);
        $user2 = User::create([
            'email' => 'test2@gmail.com',
            'password' => Hash::make('12345678'),
            'name' => 'Test2',
        ]);
        $user2 = User::create([
            'email' => 'test3@gmail.com',
            'password' => Hash::make('12345678'),
            'name' => 'Survivor1',
        ]);
        $count = 0;
        $this->userRepository->chunkById(perChunk: 2, handler: function ($users) use (&$count) {
            foreach ($users as $index => $user) {
                $user['name'] = "Chunked $index";
                $this->userRepository->save($user);
                $count++;
            }
        });
        $this->assertEquals(3, $count);
        $users = $this->userRepository->get(wheres: [
            ['name', 'Chunked 0'],
        ]);
        $this->assertEquals(2, count($users));
        $users = $this->userRepository->get(wheres: [
            ['name', 'Chunked 1'],
        ]);
        $this->assertEquals(1, count($users));
    }

    public function test_user_repository_cursor_paginate()
    {
        $user = User::create([
            'email' => 'test@gmail.com',
            'password' => Hash::make('12345678'),
            'name' => 'Wow',
        ]);
        $user2 = User::create([
            'email' => 'test2@gmail.com',
            'password' => Hash::make('12345678'),
            'name' => 'Test2',
        ]);
        $user2 = User::create([
            'email' => 'test3@gmail.com',
            'password' => Hash::make('12345678'),
            'name' => 'Test3',
        ]);
        $response = $this->userRepository->cursorPaginate(wheres: [
            ['name', 'LIKE', 'Test%'],
        ]);
        $this->assertEquals(2, count($response));
    }

    public function test_user_repository_update()
    {
        $user = User::create([
            'email' => 'test@gmail.com',
            'password' => Hash::make('12345678'),
            'name' => 'Test',
        ]);
        $this->userRepository->update($user, [
            'name' => 'Changed',
        ]);
        $user = $this->userRepository->first([
            ['id', $user['id']],
        ]);
        $this->assertEquals('Changed', $user['name']);
    }
}
