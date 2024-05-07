<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Connectors\Connector;
use Illuminate\Database\Connectors\MySqlConnector;

class CreateDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dbName = $this->argument('name');

        $dbConfig = Config::get('database.connections.' . Config::get('database.default'));

        if ($dbConfig['driver'] === 'mysql') {
            $charset = $dbConfig['charset'] ?? 'utf8mb4';
            $collation = $dbConfig['collation'] ?? 'utf8mb4_unicode_ci';

            $connection = (new MySqlConnector)->connect([
                'host' => $dbConfig['host'],
                'port' => $dbConfig['port'],
                'username' => $dbConfig['username'],
                'password' => $dbConfig['password'],
                'database' => null,
                'charset' => $charset,
                'collation' => $collation,
                'prefix' => '',
            ]);

            $query = "CREATE DATABASE IF NOT EXISTS $dbName CHARACTER SET $charset COLLATE $collation;";
            $connection->prepare($query)->execute();

            $this->info("MySQL database '$dbName' created successfully!");
        } else {
            $this->error("Unsupported database driver: " . $dbConfig['driver']);
        }
    }
}
