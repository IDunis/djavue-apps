<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Djavue\Engine\Facades\Handler;

class CreateCmsAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('backgrounds', function (Blueprint $table) {
            $table->increments('id');
			
			$table->string('code')->default('home');
			$table->string('link')->nullable();
			$table->string('image')->nullable();
			$table->timestamp('published_at')->nullable();
			
			$table->integer('is_active')->nullable();
			$table->integer('sorted_at')->nullable()->unsigned();
			
			$locales = Handler::getLanguages();
			foreach ($locales as $locale) {
				$table->string(Handler::getProperty('subtitle', $locale))->nullable();
				$table->string(Handler::getProperty('description', $locale))->nullable();
				$table->string(Handler::getProperty('button_text', $locale))->nullable();
			}

			$table->timestamps();
			$table->softDeletes();
			$table->index(['deleted_at']);
			
            $table->unsignedInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects');
        });
		
		Schema::create('inner_backgrounds', function (Blueprint $table) {
            $table->increments('id');
			
			$table->string('image')->nullable();
			$table->timestamp('published_at')->nullable();
			
			$table->integer('is_active')->nullable();
			$table->integer('sorted_at')->nullable()->unsigned();
			
			$locales = Handler::getLanguages();
			foreach ($locales as $locale) {
				$table->string(Handler::getProperty('subtitle', $locale))->nullable();
				$table->string(Handler::getProperty('description', $locale))->nullable();
			}

			$table->timestamps();
			$table->softDeletes();
			$table->index(['deleted_at']);
			
            $table->unsignedInteger('page_id');
            $table->foreign('page_id')->references('id')->on('pages');
        });
		
		Schema::create('popups', function (Blueprint $table) {
            $table->increments('id');
			
			$table->string('link')->nullable();
			$table->string('image')->nullable();
			$table->string('background')->nullable();
			
			$table->timestamp('published_at')->nullable();
			$table->timestamp('unpublished_at')->nullable();
			
			$locales = Handler::getLanguages();
			foreach ($locales as $locale) {
				$table->string(Handler::getProperty('name', $locale))->nullable();
				$table->string(Handler::getProperty('subtitle', $locale))->nullable();
				$table->string(Handler::getProperty('description', $locale))->nullable();
			}
			
			$table->integer('is_active')->nullable();
			$table->boolean('newsletter')->default(0);

			$table->timestamps();
			$table->softDeletes();
			$table->index(['deleted_at']);
			
            $table->unsignedInteger('page_id');
            $table->foreign('page_id')->references('id')->on('pages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('backgrounds');
        Schema::dropIfExists('inner_backgrounds');
        Schema::dropIfExists('popups');
    }
}
