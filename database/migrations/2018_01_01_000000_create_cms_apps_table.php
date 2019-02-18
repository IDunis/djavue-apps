<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Djavue\Engine\Facades\Handler;
use Djavue\Apps\Models\Background as BackgroundModel;
use Djavue\Apps\Models\InnerBackground as InnerBackgroundModel;
use Djavue\Apps\Models\Popup as PopupModel;

class CreateCmsAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_backgrounds', function (Blueprint $table) {
            $table->increments('id');
			
			$table->string('code')->default('home');
			$table->string('link')->nullable();
			$table->string('image')->nullable();
			$table->timestamp('published_at')->nullable();
			
			$table->integer('is_active')->nullable();
			$table->integer('sorted_at')->nullable()->unsigned();
			
            $fields = BackgroundModel::getLocaleFields();
			$locales = Handler::getLanguages();
            foreach ($fields as $field => $data) {
                foreach ($locales as $locale) {
                    $table->string(Handler::getProperty($field, $locale))->nullable();
                }
			}

			$table->timestamps();
			$table->softDeletes();
			$table->index(['deleted_at']);
			
            $table->unsignedInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects');
        });
		
		Schema::create('app_inner_backgrounds', function (Blueprint $table) {
            $table->increments('id');
			
			$table->string('image')->nullable();
			$table->timestamp('published_at')->nullable();
			
			$table->integer('is_active')->nullable();
			$table->integer('sorted_at')->nullable()->unsigned();
			
            $fields = InnerBackgroundModel::getLocaleFields();
			$locales = Handler::getLanguages();
            foreach ($fields as $field => $data) {
                foreach ($locales as $locale) {
                    $table->string(Handler::getProperty($field, $locale))->nullable();
                }
			}

			$table->timestamps();
			$table->softDeletes();
			$table->index(['deleted_at']);
			
            $table->unsignedInteger('page_id');
            $table->foreign('page_id')->references('id')->on('project_pages');
        });
		
		Schema::create('app_popups', function (Blueprint $table) {
            $table->increments('id');
			
			$table->string('link')->nullable();
			$table->string('image')->nullable();
			$table->string('background')->nullable();
			
			$table->timestamp('published_at')->nullable();
			$table->timestamp('unpublished_at')->nullable();
			
            $fields = PopupModel::getLocaleFields();
			$locales = Handler::getLanguages();
            foreach ($fields as $field => $data) {
                foreach ($locales as $locale) {
                    $table->string(Handler::getProperty($field, $locale))->nullable();
                }
			}
			
			$table->integer('is_active')->nullable();
			$table->boolean('newsletter')->default(0);

			$table->timestamps();
			$table->softDeletes();
			$table->index(['deleted_at']);
			
            $table->unsignedInteger('page_id');
            $table->foreign('page_id')->references('id')->on('project_pages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_backgrounds');
        Schema::dropIfExists('app_inner_backgrounds');
        Schema::dropIfExists('app_popups');
    }
}
