<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\Item;

class ItemControllerTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test that the index page displays a list of items.
     *
     * @return void
     */
    public function testIndexPageDisplaysItems()
    {
        // Arrange: Create some items
        $items = Item::factory()->count(3)->create();

        // Act: Access the index page
        $response = $this->get(route('items.index'));

        // Assert: Check that the response is successful and items are visible
        $response->assertStatus(200);
        foreach ($items as $item) {
            $response->assertSee($item->task);
        }
    }

    /**
     * Test that an item can be created.
     *
     * @return void
     */
    public function testItemCanBeCreated()
    {
        // Arrange: Define item data
        $data = ['task' => 'New Task'];

        // Act: Send a POST request to create the item
        $response = $this->post(route('items.store'), $data);

        // Assert: Verify redirection and database content
        $response->assertRedirect(route('items.index'));
        $this->assertDatabaseHas('items', $data);
    }

    /**
     * Test that an item can be updated.
     *
     * @return void
     */
    public function testItemCanBeUpdated()
    {
        // Arrange: Create an item
        $item = Item::factory()->create();
        $data = ['task' => 'Updated Task', 'is_complete' => 1];

        // Act: Send a PUT request to update the item
        $response = $this->put(route('items.update', $item->id), $data);

        // Assert: Verify redirection and database content
        $response->assertRedirect(route('items.index'));
        $this->assertDatabaseHas('items', $data);
    }

    /**
     * Test that an item can be deleted.
     *
     * @return void
     */
    public function testItemCanBeDeleted()
    {
        // Arrange: Create an item
        $item = Item::factory()->create();

        // Act: Send a DELETE request to delete the item
        $response = $this->delete(route('items.destroy', $item->id));

        // Assert: Verify redirection and database content
        $response->assertRedirect(route('items.index'));
        $this->assertDatabaseMissing('items', ['id' => $item->id]);
    }
}
