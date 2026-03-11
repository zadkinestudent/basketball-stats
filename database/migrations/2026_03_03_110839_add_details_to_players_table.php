<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('players', function (Blueprint $table) {
            if (!Schema::hasColumn('players', 'age')) {
                $table->integer('age')->nullable()->after('position');
            }
            if (!Schema::hasColumn('players', 'height')) {
                $table->string('height')->nullable()->after('age');
            }
            if (!Schema::hasColumn('players', 'weight')) {
                $table->string('weight')->nullable()->after('height');
            }
            if (!Schema::hasColumn('players', 'college')) {
                $table->string('college')->nullable()->after('weight');
            }
        });
    }

    public function down()
    {
        Schema::table('players', function (Blueprint $table) {
            $table->dropColumn(['age', 'height', 'weight', 'college']);
        });
    }
};