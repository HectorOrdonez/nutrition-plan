<?php
namespace Src\Support;

trait TruncableTable
{
    protected function truncateTable($table)
    {
        if (env('DB_CONNECTION') === 'pgsql') {
            \DB::statement("TRUNCATE TABLE {$table} CASCADE");
        } elseif (env('DB_CONNECTION') === 'mysql') {
            \DB::statement("TRUNCATE TABLE {$table}");
        } else {
            throw new \Exception('Unknown DB connection');
        }
    }
}
