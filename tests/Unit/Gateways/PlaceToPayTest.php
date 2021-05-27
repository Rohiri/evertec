<?php

namespace Tests\Unit\Gateways;

use Tests\TestCase;
use App\Models\User;
use App\Models\Order;
use App\Models\Transaction;
use Dnetix\Redirection\PlacetoPay;
use Dnetix\Redirection\Message\RedirectResponse;
use Dnetix\Redirection\Message\RedirectInformation;
use App\Strategies\Payment\Gateways\PlaceToPayGateway;

class PlaceToPayTest extends TestCase
{
    protected $stubPlaceToPay;
    protected $stubOrder;
    protected $stubUser;
    protected $stubTransaction;

    /**
     * Undocumented function
     *
     * @return void
     */
    protected function setUp() : void
    {
        parent::setUp();

        $this->stubUser = $this->createMock(User::class);
        $this->stubOrder = $this->createMock(Order::class);
        $this->stubPlaceToPay = $this->createMock(PlacetoPay::class);
        $this->stubTransaction = $this->createMock(Transaction::class);
    }

    /**
     * Mock Response Dnetix\Redirection\Message\RedirectResponse
     *
     * @param string $status  Status code
     * @param string $message Message
     *
     * @return void
     */
    public function returnRedirectResponse($status = null, $message = null)
    {
        return new RedirectResponse(
            [
            "status" => [
              "status" => $status ?? "OK",
              "message" => $message ?? "Something Wrong",
            ],
            "requestId" => 39615,
            "processUrl" => "https://dev.placetopay.com/redirection/session/39615/b46cb60c3b6c78e2db6fa6598dd89565"]
        );
    }

    /**
     * Create Payment with error response
     *
     * @test
     *
     * @return void
     */
    public function createTransactionAndResponseError()
    {
        $response = $this->returnRedirectResponse('FAILED');

        $this->stubPlaceToPay->method('request')
            ->willReturn($response);
        $this->actingAs($this->stubUser);

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage(
            "Error en Transaccion: {$response->status()->message()}."
        );

        $placeToPay = new PlaceToPayGateway($this->stubPlaceToPay, $this->stubTransaction);
        $placeToPay->createTransaction($this->stubOrder);
    }

}