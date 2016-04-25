<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedOauthClientScopes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        // DB::table('oauth_client_scopes')->insert(array(
        //         array('id' => "2", "client_id"=>"demo", "scope_id"=>"scope1", "created_at"=>time() ),
        //     ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
