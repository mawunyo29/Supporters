<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('avatar')->nullable();
            $table->string('cover')->nullable();
            $table->text('content');
            $table->boolean('is_published')->default(false);
            $table->string('template')->nullable();
            $table->string('page_last_modify')->nullable();
            $table->string('page_last_modify_by')->nullable();
            $table->string('page_last_modify_ip')->nullable();
            $table->string('page_last_modify_agent')->nullable();
            $table->string('page_last_modify_os')->nullable();
            $table->string('page_last_modify_browser')->nullable();
            $table->string('page_last_modify_device')->nullable();
            $table->string('page_last_modify_platform')->nullable();
            $table->string('page_last_modify_language')->nullable();
            $table->string('page_last_modify_country')->nullable();
            $table->string('page_expires')->nullable();
            
            $table->text('description')->nullable();
            $table->string('laste_visite')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('github')->nullable();
            $table->string('footer')->nullable();
            $table->string('header')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_author')->nullable();
            $table->string('meta_copyright')->nullable();
            $table->string('meta_language')->nullable();
            $table->string('meta_robots')->nullable();
            $table->string('meta_revisit_after')->nullable();
            $table->string('meta_distribution')->nullable();

            $table->string('layout')->nullable();
            $table->softDeletes('deleted_at', 0);
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
        Schema::dropIfExists('pages');
    }
}
