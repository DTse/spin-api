<?php

class SearchTest extends TestCase
{
    /**
     * A basic functional test for the search endpoint.
     *
     * @return void
     */
    public function testNoParams()
    {
        $response = $this->get('/search');

        $this->seeStatusCode(200);

        $this->seeJsonStructure([
            'data' => ['*' =>
                [
                    'id',
                    'availability',
                    'type',
                    'location',
                    'sqMeters',
                    'price',
                    'created_at',
                    'updated_at'
                ]
            ],
            'pagination' => [
                    'total',
                    'per_page',
                    'current_page',
                    'total_pages'
            ]
        ]);
    }

    /**
     * Testing the search endpoint with some query parameters.
     *
     * @return void
     */
    public function testSomeParams()
    {
        $response = $this->get('/search?locations[0]=2&type[0]=1');

        $this->seeStatusCode(200);

        $this->seeJsonStructure([
            'data' => ['*' =>
                [
                    'id',
                    'availability',
                    'type',
                    'location',
                    'sqMeters',
                    'price',
                    'created_at',
                    'updated_at'
                ]
            ],
            'pagination' => [
                    'total',
                    'per_page',
                    'current_page',
                    'total_pages'
            ]
        ]);
    }

    /**
     * Testing the search endpoint with array query parameters.
     *
     * @return void
     */
    public function testMultipleSameParam()
    {
        $response = $this->get('/search?locations[0]=2&locations[1]=1');

        $this->seeStatusCode(200);

        $this->seeJsonStructure([
            'data' => ['*' =>
                [
                    'id',
                    'availability',
                    'type',
                    'location',
                    'sqMeters',
                    'price',
                    'created_at',
                    'updated_at'
                ]
            ],
            'pagination' => [
                    'total',
                    'per_page',
                    'current_page',
                    'total_pages'
            ]
        ]);
    }
}