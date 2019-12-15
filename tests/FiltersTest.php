<?php

class FiltersTest extends TestCase
{
    /**
     * A basic functional test for the filters endpoint.
     *
     * @return void
     */
    public function testIfWorks()
    {
        $response = $this->get('/search');

        $this->seeStatusCode(200);

        $this->seeJsonStructure([
            'data' =>
                [
                    '*'=>[
                        "id"
                    ]
                ]

        ]);
    }
}