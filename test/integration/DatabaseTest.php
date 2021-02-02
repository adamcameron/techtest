<?php

namespace adamcameron\techtest\tests\integration;

use PHPUnit\Framework\TestCase;
use \PDO;

class DatabaseTest extends TestCase
{
    /** @coversNothing */
    public function testDatabaseVersion()
    {
        $connectionDetails = $this->getConnectionDetails();

        $connection = new PDO(
            "mysql:dbname=$connectionDetails->database;host=database.backend",
            $connectionDetails->user,
            $connectionDetails->password
        );

        $statement = $connection->query("SELECT greeting FROM greetings WHERE id = 1");
        $statement->execute();

        $greeting = $statement->fetchAll();

        $this->assertCount(1, $greeting);
        $this->assertSame('Hello world!', $greeting[0]['greeting']);
    }

    private function getConnectionDetails()
    {
        return (object) [
            'database' => $_ENV['MYSQL_DATABASE'],
            'user' => $_ENV['MYSQL_USER'],
            'password' => $_ENV['MYSQL_PASSWORD']
        ];
    }
}
