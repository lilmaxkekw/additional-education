<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GalleryPageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test  */
    public function a_user_can_browse_gallery_page()
    {
        $response = $this->get('/gallery');

        $response->assertStatus(200);
        $response->assertViewIs('gallery');
    }
}
