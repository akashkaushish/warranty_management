<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
				$table->id();
				$table->string('name');
				$table->string('email')->unique();
				$table->timestamp('email_verified_at')->nullable();
				$table->string('company_name');
				$table->string('address');
				$table->string('website')->nullable();
				$table->string('mobile_number')->nullable();
				$table->string('user_key');
				$table->boolean('is_db_created')->default(0);
				$table->boolean('is_repo_created')->default(0);
				$table->boolean('is_env_configured')->default(0);
				$table->string('setup_url')->nullable();
				$table->boolean('is_admin')->nullable();
				$table->string('password');
				$table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
