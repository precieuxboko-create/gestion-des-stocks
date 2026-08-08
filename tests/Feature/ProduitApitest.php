<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Produit;

class ProduitApitest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_can_list_product(){
        produit::factory()->count(10)->create();
        
        $response = $this->getJson('/api/produits');

        $response->asserStatus(200)
        ->asserJsonCount(10);
        }


    public function test_can_create_product()
    {
        $data = [
            'name'=> 'leriche',
            'description'=> 'dev pro',
            'quantity'=> 3,
            'price'=> 100

        ];







        
        
        $response = $this->postJson('/api/produits', $data);

        $response->asserStatus(200)
        ->asserJsonCount(10)->asserJsonFragment('name', 'leriche');
        
    }
    public function test_can_show_product()
    {
        $produit = Produit::factory()->create();

        $response = $this->getJson('/api/produits', $produit);
        

    }



}