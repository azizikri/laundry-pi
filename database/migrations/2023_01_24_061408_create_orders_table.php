<?php

use App\Models\User;
use App\Enum\Order\OrderStatus;
use App\Enum\Order\PaymentStatus;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->string('reciever_name');
            $table->string('reciever_phone');
            $table->string('reciever_address');
            $table->text('total_price');
            $table->text('evidence_of_payment')->nullable();
            $table->text('order_status')->default(OrderStatus::PENDING->value);
            $table->text('payment_status')->default(PaymentStatus::PENDING->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
