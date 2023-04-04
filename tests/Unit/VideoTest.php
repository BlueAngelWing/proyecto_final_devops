<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class VideoTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_video_post()
    {
        
        $respone = $this->call('POST','/api/video',['name' => 'test', 'extension' => '.png', 'size' => 1]);
        $respone->assertStatus($respone->status(),200);
    }

    public function test_video_get()
    {
        
        $respone = $this->call('GET','/api/video/1',[]);
        $respone->assertStatus($respone->status(),200);
    }

    public function test_video_put()
    {
        
        $respone = $this->call('PUT','/api/video/1',['name' => 'test2', 'extension' => '.JPG', 'size' => 2]);
        $respone->assertStatus($respone->status(),200);
    }

    public function test_video_index()
    {
        
        $respone = $this->call('GET','/api/video',[]);
        $respone->assertStatus($respone->status(),200);
    }

    public function test_video_delete()
    {
        
        $respone = $this->call('DELETE','/api/video/1',[]);
        $respone->assertStatus($respone->status(),200);
    }
}
