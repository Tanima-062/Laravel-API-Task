<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class PaymentUpdateTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testUpdatePayment()
    {
       $data = [
                        'status' => 'accepted',
                        'transaction_id' => 123456,
                    ];
            $payment = factory(\App\Payment::class)->update();
            $response = $this->actingAs($payment, 'api')->json('POST', '/api/update',$data);
            $response->assertStatus(200);
            $response->assertJson(['status' => true]);
            $response->assertJson(['message' => "Data has been updated successfully"]);
            $response->assertJson(['data' => $data]);
      }


}
