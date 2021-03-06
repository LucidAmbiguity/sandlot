<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

class PostsTest extends TestCase
{
    use RefreshDatabase;

    protected $author, $admin;

    public function setUp(): void
    {
        static $permissionsCreated;

        parent::setUp();

        if ($permissionsCreated !== true) {
            $this->setupPermissions();
            $permissionsCreated = true;
        }

        $this->member = User::factory()->create(); //factory(\App\User::class)->create();

        $this->author = User::factory()->create();
        $this->author->assignRole('author');

        $this->admin = User::factory()->create();
        $this->admin->assignRole('admin');


        $this->setupPosts();
    }

    protected function setupPermissions()
    {
        Permission::create(['name' => 'view unpublished posts']);
        Permission::create(['name' => 'create posts']);
        Permission::create(['name' => 'edit own posts']);
        Permission::create(['name' => 'edit all posts']);
        Permission::create(['name' => 'delete own posts']);
        Permission::create(['name' => 'delete any post']);

        Role::create(['name' => 'author'])
            ->givePermissionTo(['create posts', 'edit own posts', 'delete own posts']);

        Role::create(['name' => 'admin'])
            ->givePermissionTo(['view unpublished posts', 'create posts', 'edit all posts', 'delete any post']);

        $this->app->make(PermissionRegistrar::class)->registerPermissions();
    }

    protected function setupPosts()
    {
        DB::table('posts')->truncate();

        Post::factory()->create([
            'title' => 'This is the first post. (author)',
            'published' => 1,
            'user_id' => $this->author->id,
        ]);

        Post::factory()->create([
            'title' => 'This is the second post. (admin)',
            'published' => 1,
            'user_id' => $this->admin->id,
        ]);

        Post::factory()->create([
            'title' => 'This is the third post. (author)',
            'published' => 1,
            'user_id' => $this->author->id,
        ]);

        Post::factory()->create([
            'title' => 'This is the fourth post. (admin, unpublished)',
            'published' => 0,
            'user_id' => $this->admin->id,
        ]);

        Post::factory()->create([
            'title' => 'This is the fifth post. (member)',
            'published' => 1,
            'user_id' => $this->member->id,
        ]);
    }

    /** @test */
    public function visitors_can_view_posts_index()
    {
        $this->withoutExceptionHandling();

        $this->setupPosts();

        $response = $this->get('/posts');

        $response->assertStatus(200);

        $response->assertSee('first post.');
        $response->assertSee('second post.');
    }

    /** @test */
    public function members_can_view_specific_published_post()
    {
        $this->withoutExceptionHandling();

        $this->setupPosts();

        $response = $this
            ->actingAs($this->member)
            ->get('/posts/1');

        $response->assertStatus(200);

        $response->assertSee('first post.');
    }

    /** @test */
    public function members_cannot_see_unpublished_posts()
    {
        $this->setupPosts();

        $response = $this
            ->actingAs($this->member)
            ->get('/posts/4');

        $response->assertStatus(403);
    }


    /** @test */
    public function authors_can_view_posts()
    {
        $this->withoutExceptionHandling();

        $this->setupPosts();

        $response = $this
            ->actingAs($this->author)
            ->get('/posts/1');

        $response->assertStatus(200);
        $response->assertSee('first post.');
    }

    /** @test */
    public function authors_can_edit_own_posts()
    {
        $this->withoutExceptionHandling();

        $this->setupPosts();

        $response = $this
            ->actingAs($this->author)
            ->get('/posts/1/edit');

        $response->assertStatus(200);

        $response->assertSee('first post.');
    }

    /** @test */
    public function admins_can_edit_others_posts()
    {
        $this->withoutExceptionHandling();

        $this->setupPosts();

        $response = $this
            ->actingAs($this->admin)
            ->get('/posts/5/edit');

        $response->assertStatus(200);
        $response->assertSee('fifth post.');
    }

    /** @test */
    public function members_cannot_delete_posts()
    {
        $this->withoutExceptionHandling();

        $this->setupPosts();

        $this->expectException(\Illuminate\Auth\Access\AuthorizationException::class);

        $response = $this
            ->actingAs($this->member)
            ->delete('/posts/1');

        $response->assertStatus(403);
    }

    /** @test */
    public function authors_can_delete_own_posts()
    {
        $this->setupPosts();

        $response = $this
            ->actingAs($this->author)
            ->delete('/posts/1');

        $response->assertStatus(302);
        $response->assertDontSee('first post.');
    }

    /** @test */
    public function admins_can_delete_posts()
    {
        $this->setupPosts();

        $response = $this
            ->actingAs($this->admin)
            ->delete('/posts/1');

        $response->assertStatus(302);
        $response->assertDontSee('first post.');
    }
}
