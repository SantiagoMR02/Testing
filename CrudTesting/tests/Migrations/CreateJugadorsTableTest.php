<?php

namespace Tests\Migrations;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class CreateJugadorsTableTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function jugadors_table_exists()
    {
        $this->assertTrue(Schema::hasTable('jugadors'));
    }

    /** @test */
    public function jugadors_table_has_expected_columns()
    {
        $expectedColumns = ['id', 'Nombre', 'Apellido', 'Posicion', 'Dorsal', 'created_at', 'updated_at'];

        foreach ($expectedColumns as $column) {
            $this->assertTrue(Schema::hasColumn('jugadors', $column));
        }
    }

    /** @test */
    public function jugadors_table_id_is_auto_increment()
    {
        $column = Schema::getColumnType('jugadors', 'id');
        $this->assertEquals('bigint', $column);
        $this->assertTrue(Schema::getColumn('jugadors', 'id')['autoincrement']);
    }


}

