<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTeacherIdAndPayPaidToFeeSubmittedDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fee_submitted_details', function (Blueprint $table) {
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->decimal('pay_paid', 10, 2)->nullable();

            // Add foreign key constraint
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fee_submitted_details', function (Blueprint $table) {
            $table->dropForeign(['teacher_id']);
            $table->dropColumn(['teacher_id', 'pay_paid']);
        });
    }
}
