<?php

namespace Tests\Feature;

use App\Filament\Resources\ProductResource\Pages\CreateProduct;
use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Product;
use App\Filament\Resources\ProductResource;
use App\Filament\Resources\ProductResource\Pages\EditProduct;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Filament\Resources\ProductResource\Pages\ListProducts;
use App\Models\Category;
use Filament\Actions\DeleteAction;

class FilamentProductTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;
    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }

    public function test_can_access_product_list_page(): void
    {
        $url = ProductResource::getUrl('index');
        $this->get($url)->assertOk();
    }

    public function test_can_list_products(): void
    {
        $products = Product::factory()->count(10)->create();
        Livewire::test(ListProducts::class)
            ->assertSee($products->first()->name)
            ->assertSee($products->last()->name);
    }

    public function test_can_create_product()
    {
        $category = Category::factory()->create();
        $this->assertEquals(0, Product::count());

        Livewire::test(CreateProduct::class)
            ->set('data.name', 'Pen')
            ->set('data.category_id', $category->id)
            ->set('data.status', 'draft')
            ->call('create');

        $this->assertEquals(1, Product::count());
    }

    public function test_can_update_product()
    {
        $category = Category::factory()->create();
        $product = Product::factory()->create();
        $this->assertEquals(1, Product::count());

        Livewire::test(EditProduct::class, ['record' => $product->getRouteKey()])
            ->set('data.name', 'Pencil')
            ->set('data.category_id', $category->id)
            ->set('data.status', 'published')
            ->call('save');

        $product->refresh();

        $this->assertEquals('Pencil', $product->name);
        $this->assertEquals('published', $product->status);
        $this->assertEquals($category->id, $product
            ->category_id);
    }

    public function test_can_delete_product()
    {
        $product = Product::factory()->create();
        $this->assertEquals(1, Product::count());

        Livewire::test(EditProduct::class, ['record' => $product->getRouteKey()])
            ->callAction('delete', ['confirmation' => true]);

        $this->assertSoftDeleted($product);

        $this->assertEquals(0, Product::count());
    }
}
