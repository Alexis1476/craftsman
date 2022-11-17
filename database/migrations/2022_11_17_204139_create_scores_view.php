<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    const VIEW_NAME = 'scores';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement($this->createView());
    }

    private function createView(): string
    {
        $viewName = self::VIEW_NAME;
        return "CREATE VIEW $viewName AS SELECT users.anonymousID AS user, SUM(points) AS total
                FROM activities INNER JOIN user_activities ON activities.id = user_activities.activity_id
                INNER JOIN users ON users.id = user_activities.user_id WHERE finished = 1
                GROUP BY users.anonymousID ORDER BY total DESC LIMIT 10;";
    }

    private function dropView(): string
    {
        $viewName = self::VIEW_NAME;
        return "SQL DROP VIEW IF EXISTS $viewName; SQL;";
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement($this->dropView());
    }
};
