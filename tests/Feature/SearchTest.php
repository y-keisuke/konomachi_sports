<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SearchTest extends TestCase
{

    protected $repositoryMock;

    public function setUp() : void
    {
        parent::setUp();

        //Search結果の疑似データ作成
        $results = [];
        $results[] = factory(\App\Models\Team::class, 'test_search_data')->make()->toArray();

    }
}
