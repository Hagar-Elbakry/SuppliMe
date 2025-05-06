<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\CartController;
use Illuminate\Foundation\Testing\RefreshDatabase;


class CartTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
    public function test_display_cart_index_page(): void
    {
        $user = User::factory()->create();
        Auth::shouldReceive('check')->andReturn(true);
        Auth::shouldReceive('user')->andReturn($user);
        Auth::shouldReceive('id')->andReturn($user->id);
        $cartController = new CartController() ;
        $response = $cartController->index();
        $this->assertInstanceOf(View::class, $response);
        $this->assertEquals('cart.index', $response->getName());
    }
    public function test_add_product_to_cart(): void
    {
        $user = User::factory()->create();
        $product = Product::factory()->create();
        Auth::shouldReceive('check')->andReturn(true);
        Auth::shouldReceive('user')->andReturn($user);
        Auth::shouldReceive('id')->andReturn($user->id);
        $CartController = new CartController();
        $response = $CartController->store($product->id);
        $this->assertDatabaseHas('cart_product', [
            'product_id' => $product->id,
            'quantity' => 1,
        ]);
        $this->assertInstanceOf(RedirectResponse::class, $response);
    }
    public function test_increase_product_quantity_in_cart(): void
    {
        $user = User::factory()->create();
        $product = Product::factory()->create();
        Auth::shouldReceive('check')->andReturn(true);
        Auth::shouldReceive('user')->andReturn($user);
        Auth::shouldReceive('id')->andReturn($user->id);
        $CartController = new CartController();
        $CartController->store($product->id); 
        $response = $CartController->updateQuantity($product->id, 'increase'); 
        $this->assertDatabaseHas('cart_product', [
            'product_id' => $product->id,
            'quantity' => 2,
        ]);
        $this->assertInstanceOf(RedirectResponse::class, $response);
    }
    public function test_decrease_product_quantity_in_cart(): void
    {
        $user = User::factory()->create();
        $product = Product::factory()->create();
        Auth::shouldReceive('check')->andReturn(true);
        Auth::shouldReceive('user')->andReturn($user);
        Auth::shouldReceive('id')->andReturn($user->id);
        $CartController = new CartController();
        $CartController->store($product->id); 
        $CartController->updateQuantity($product->id, 'increase'); 
        $response = $CartController->updateQuantity($product->id, 'decrease'); 
        $this->assertDatabaseHas('cart_product', [
            'product_id' => $product->id,
            'quantity' => 1,
        ]);
        $this->assertInstanceOf(RedirectResponse::class, $response);
    }
    public function test_remove_product_from_cart(): void
    {
        $user = User::factory()->create();
        $product = Product::factory()->create();
        Auth::shouldReceive('check')->andReturn(true);
        Auth::shouldReceive('user')->andReturn($user);
        Auth::shouldReceive('id')->andReturn($user->id);
        $CartController = new CartController();
        $CartController->store($product->id); 
        $response = $CartController->destroy($product->id);
        $this->assertDatabaseMissing('cart_product', [
            'product_id' => $product->id,
        ]);
        $this->assertInstanceOf(RedirectResponse::class, $response);
    }
    public function test_remove_all_products_from_cart(): void
    {
        $user = User::factory()->create();
        $product1 = Product::factory()->create();
        $product2 = Product::factory()->create();
        Auth::shouldReceive('check')->andReturn(true);
        Auth::shouldReceive('user')->andReturn($user);
        Auth::shouldReceive('id')->andReturn($user->id);
        $controller = new CartController();
        $controller->store($product1->id); 
        $controller->store($product2->id); 
        $response = $controller->destroyAll(); 
        $this->assertDatabaseMissing('cart_product', [
            'product_id' => $product1->id,
        ]);
        $this->assertDatabaseMissing('cart_product', [
            'product_id' => $product2->id,
        ]);
        $this->assertInstanceOf(RedirectResponse::class, $response);
    }
}
