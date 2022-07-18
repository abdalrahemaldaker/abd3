<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('father');
            $table->string('phone');
            $table->string('mobile');
            $table->date('birthdate');
            $table->text('note');
            $table->timestamps();
        });
    }

	// 1. Id
	// 2. Fname
	// 3. Lname
	// 4. Father
	// 5. Address
	// 6. Birthdate
	// 7. Reg-date
	// 8. Note
	// 9. User_id
	// 10. Phone
	// 11. mobile







    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
