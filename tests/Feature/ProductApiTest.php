<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductApiTest extends TestCase
{
    use RefreshDatabase;

    protected function getProductValidData(): array
    {
        $category = Category::factory()->create();

        return [
            'name' => 'Product 1',
            'category_id' => $category->id,
            'status' => 'published',
        ];
    }

    public function test_api_can_list_products(): void
    {
        Product::factory()->count(5)->create();
        $response = $this->get(route('api.products.index'));

        $response->assertOk()
            ->assertJson(
                fn(AssertableJson $json) =>
                $json->has(
                    'data',
                    5,
                    fn(AssertableJson $json) =>
                    $json->hasAny(['id', 'name', 'category_id', 'status'])->etc()
                )->etc()
            );
    }

    public function test_api_can_create_product(): void
    {
        $data = $this->getProductValidData();
        $response = $this->post(route('api.products.store'), $data);

        $response->assertCreated()
            ->assertJson(
                fn(AssertableJson $json) =>
                $json->has(
                    'data',
                    fn(AssertableJson $json) =>
                    $json->where('name', $data['name'])
                        ->where('category_id', $data['category_id'])
                        ->where('status', $data['status'])
                        ->etc()
                )->etc()
            );
    }

    public function test_api_can_show_product(): void
    {
        $product = Product::factory()->create();
        $response = $this->get(route('api.products.show', $product->id));

        $response->assertOk()
            ->assertJson(
                fn(AssertableJson $json) =>
                $json->has(
                    'data',
                    fn(AssertableJson $json) =>
                    $json->where('id', $product->id)
                        ->where('name', $product->name)
                        ->where('category_id', $product->category_id)
                        ->where('status', $product->status)
                        ->etc()
                )->etc()
            );
    }
}
