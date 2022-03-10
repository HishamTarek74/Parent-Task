<?php

namespace Tests\Unit;

use Tests\TestCase;

class ProvidersTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function it_can_list_all_providers()
    {
        $this->getJson(route('users.index'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'providers' => [
                    '*' => [
                        'id',
                        'email',
                        'amount',
                        'currency',
                        'status',
                        'created_at'
                    ],
                ],
            ]);
    }

    /** @test */
    public function it_can_list_users_by_provider()
    {
        $this->getJson('/api/v1/users?provider=DataProviderY')
            ->assertSuccessful()
            ->assertJsonStructure([
                'providers' => [
                    '*' => [
                        'id',
                        'email',
                        'amount',
                        'currency',
                        'status',
                        'created_at'
                    ],
                ],
            ]);
    }

    /** @test */
    public function it_can_list_users_by_currency()
    {
        $this->getJson('/api/v1/users?currency=USD')
            ->assertSuccessful()
            ->assertJsonStructure([
                'providers' => [
                    '*' => [
                        'id',
                        'email',
                        'amount',
                        'currency',
                        'status',
                        'created_at'
                    ],
                ],
            ]);
    }

    /** @test */
    public function it_can_list_users_by_status()
    {
        $this->getJson('/api/v1/users?statusCode=authorised')
            ->assertSuccessful()
            ->assertJsonStructure([
                'providers' => [
                    '*' => [
                        'id',
                        'email',
                        'amount',
                        'currency',
                        'status',
                        'created_at'
                    ],
                ],
            ]);
    }

    /** @test */
    public function it_can_list_users_by_rang_balance()
    {
        $this->getJson('/api/v1/users?balanceMin=354&balanceMax=1000')
            ->assertSuccessful()
            ->assertJsonStructure([
                'providers' => [
                    '*' => [
                        'id',
                        'email',
                        'amount',
                        'currency',
                        'status',
                        'created_at'
                    ],
                ],
            ]);
    }

    /** @test */
    public function it_can_list_users_by_combine_all_filter()
    {
        $this->getJson('/api/v1/users?provider=DataProviderY&currency=USD&status=authorised&balanceMin=354&balanceMax=1000')
            ->assertSuccessful()
            ->assertJsonStructure([
                'providers' => [
                    '*' => [
                        'id',
                        'email',
                        'amount',
                        'currency',
                        'status',
                        'created_at'
                    ],
                ],
            ]);
    }


}
