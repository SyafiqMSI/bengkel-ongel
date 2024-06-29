<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Add foreign key to itemsordered table for appointment_id and sparepart_id
        Schema::table('items_ordereds', function (Blueprint $table) {
            $table->foreign('appointment_id')
                  ->references('id_appointment')
                  ->on('appointments')
                  ->onDelete('cascade');
            
            $table->foreign('sparepart_id')
                  ->references('id_spare_part')  // assuming 'id' is the primary key of 'spare_parts' table
                  ->on('spare_parts')
                  ->onDelete('cascade');
        });

        // Add foreign key to appointments table for ordered_id and user_id
        Schema::table('appointments', function (Blueprint $table) {
            $table->foreign('ordered_id')
                  ->references('id_items_ordered')
                  ->on('items_ordereds')
                  ->onDelete('cascade');
            
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        // Drop foreign keys from itemsordered table
        Schema::table('items_ordereds', function (Blueprint $table) {
            $table->dropForeign(['appointment_id']);
            $table->dropForeign(['sparepart_id']);
        });

        // Drop foreign keys from appointments table
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropForeign(['ordered_id']);
            $table->dropForeign(['user_id']);
        });
    }
}
;