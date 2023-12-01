<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class PaymentSaveTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function testCreatePayment()
    {
       $data = [
                        'user_id' => 1,
                        'transaction_id' => 123456,
                        'status' => "accepted",
                        'amount' => 10,
                    ];
            $payment = factory(\App\Payment::class)->create();
            $response = $this->actingAs($payment, 'api')->json('POST', '/api/save',$data);
            $response->assertStatus(200);
            $response->assertJson(['status' => true]);
            $response->assertJson(['message' => "Data has been stored successfully"]);
            $response->assertJson(['data' => $data]);
      }


}
