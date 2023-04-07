<?php

namespace Tests\Unit;

use  Tests\TestCase;

class ImageTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_image_post()
    {
        
        $respone = $this->call('POST','/api/image',['name' => 'test', 'extension' => '.png', 'size' => 1]);
        $respone->assertStatus($respone->status(),200);
    }

    public function test_image_get()
    {
        
        $respone = $this->call('GET','/api/image/1',[]);
        $respone->assertStatus($respone->status(),200);
    }

    public function test_image_put()
    {
        
        $respone = $this->call('PUT','/api/image/1',['name' => 'test2', 'extension' => '.JPG', 'size' => 2]);
        $respone->assertStatus($respone->status(),200);
    }

    public function test_image_index()
    {
        
        $respone = $this->call('GET','/api/image',[]);
        $respone->assertStatus($respone->status(),200);
    }

    public function test_image_delete()
    {
        
        $respone = $this->call('DELETE','/api/image/1',[]);
        $respone->assertStatus($respone->status(),200);
    }
}
